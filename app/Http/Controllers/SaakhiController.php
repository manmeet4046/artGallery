<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Saakhi;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Gate;
use App\Comment;
class SaakhiController extends Controller
{
    
    public function index(){
    
    	return view('saakhi.index');
    }



    public function getJournals(){
        $users=Saakhi::orderBy('date','desc');

return Datatables::of($users)->editColumn('date', function ($user) 
{
    //change over here
    return date('d-M-Y', strtotime($user->date) );
})->addColumn('action', function($data){
                        //$button = '<a  name="edit" href="saakhi/'.$data->id.'" class=" btn-primary btn-sm">Edit</a>';
                        //$button .= '&nbsp;&nbsp;';
                       // $button .= '<a  name="edit" href="'.$data->id.'" class="delete btn-danger btn-sm">Delete</a>';
                       // $button .= '&nbsp;&nbsp;';
                        $button = '<a  name="edit" href="/saakhi/'.$data->id.'" class="delete btn-ghost btn-sm">View</a>';
                        return $button;
                    })->rawColumns(['action','issue'])->setRowClass('{{$id % 2==0 ? "alert-success":"alert-warning"}}')->make(true); 

   

    }
    public function create(){
        if(!(Gate::allows('isModerator') OR Gate::allows('isAdmin'))){
            abort(403,"Sorry");
        }

    	return view('saakhi.create');
    }

    public function store(Request $request){
        $this->validateData();
        $filenameWithExt = $request->file('saakhi')->getClientOriginalName();
    //get only file name
    $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
    $extension = strtolower($request->file('saakhi')->getClientOriginalExtension());
    $allowedExtensions =['pdf','jpg','png'];
    if(!in_array( $extension,$allowedExtensions)){
        return 'not in';
    }
    $filenameToStore = $filename.'_'.time().'.'.$extension;
    //Upload Image
    $location = $request->file('saakhi')->storeAs('public/Saakhi/',$filenameToStore);
//dd($request->title);

    // Create Symlink with Artisan as we don't want client to access this location i,e stroage folder
    //dd($request->date);
   // $date= Carbon::parse($request->get('datepicker'))->format('Y-m-d H:i:s');
    $date = Carbon::createFromFormat('d/M/Y', $request->date);
    //dd($date);
    $saakhi = new Saakhi;
    $saakhi->title = $request->title;
    $saakhi->publisher = $request->publisher;
    $saakhi->volume = $request->volume;
    $saakhi->issue = $request->issue;
    $saakhi->date = $date;
    $saakhi->saakhi = $filenameToStore;
    

    $saakhi->save();
    //Album::create($data);
    //Personal::create(array_merge( $data ,['user_id'=>Auth::user()->id]));
    return redirect('/saakhi/')->with('success','New Event  Added');
    	
    }

    public function show(Saakhi $saakhi){
       // $comment_id = Comment::where('saakhi_id',$saakhi)->get();
       
         $comments = Comment::with('user','saakhi','replies')->where('saakhi_id',$saakhi->id)->latest()->paginate(10);
         
       
    	return view('saakhi.show',compact('saakhi','comments'));
    }

   public function comments($id){
        $post = Saakhi::findOrFail($id);
        $comment = $post->comments()->first();
        dd($comment->name);
    }

    public function destroy(Saakhi $saakhi)
    {
        if(!Gate::allows('isAdmin')){
            abort(403,"Sorry");
        }
        if(Storage::delete(['public/Saakhi/'.$saakhi->saakhi]))
                $saakhi->delete();
        return redirect('/saakhi')->with('success','Journal/Book deleted successfully.');
    }
    public function validateData(){
    	return request()->validate([
            'title'=>'required',
            'publisher'=>'required',
            'volume'=>'required',
            'issue'=>'required',
            'date'=>'required',
            'saakhi'=>'required|max:1999|file|mimes:pdf,png,gif,jpeg,jpg',

        ]);
    }
}

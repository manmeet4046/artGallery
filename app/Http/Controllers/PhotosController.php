<?php

namespace App\Http\Controllers;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Gate;
class PhotosController extends Controller
{

    public function index(){
        $photos= Photo::latest()->limit(8)->get();

    return view('index',compact('photos'));
    }
    
   public function create($album_id){
   	if(!(Gate::allows('isModerator') OR Gate::allows('isAdmin'))){
    		abort(403,"Sorry");
    	}

   	return view('photos.create',compact('album_id'));
   }

   public function store(Request $request){


	$this->validateData();

	$filenameWithExt = $request->file('photo')->getClientOriginalName();
	//get only file name
	$filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
	$extension = strtolower($request->file('photo')->getClientOriginalExtension());
	$allowedExtensions =['pdf','jpg','jpeg'];
	if(!in_array( $extension,$allowedExtensions)){
		return 'not in valid extension';
	}
	$filenameToStore = $filename.'_'.time().'.'.$extension;
	//Upload Image
	$location = $request->file('photo')->storeAs('public/photos/'.$request->album_id,$filenameToStore);


	// Create Symlink with Artisan as we don't want client to access this location i,e stroage folder
	$photo = new Photo;
	$photo->title = $request->title;
	$photo->album_id = $request->album_id;
	$photo->description = $request->description;
	$photo->size = $request->file('photo')->getClientSize();
	$photo->photo = $filenameToStore;
	$photo->save();
	//Album::create($data);
	//Personal::create(array_merge( $data ,['user_id'=>Auth::user()->id]));
	return redirect('/albums/'.$request->album_id)->with('success','Photo uplaoded');
    }

    public function show(Photo $photo){

    	return view('photos.show',compact('photo'));
    }

    public function destroy(Photo $photo)
    {
    	if(!Gate::allows('isAdmin')){
    		abort(403,"Sorry");
    	}
    	if(Storage::delete(['public/photos/'.$photo->album_id.'/'.$photo->photo]))
        		$photo->delete();
        return redirect('/albums')->with('success','Photo deleted successfully.');
    }

     protected function validateData(){
    	return request()->validate([
    		'title'=>'required',
    		'description'=>'required',
    		'photo'=>'required|max:1999|file|mimes:png,gif,jpeg,jpg',
    	]);
    }
}

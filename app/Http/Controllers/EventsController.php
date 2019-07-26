<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Carbon\Carbon;
use Gate;
class EventsController extends Controller
{
    public function index(){
    	$pastEvents=Event::past()->paginate(3);
    	$upcomingEvents=Event::upcoming()->paginate(3);
    	$ongoingEvents=Event::ongoing()->paginate(3);
    	$events=Event::paginate(3);

    	return view('events.index',compact('pastEvents','upcomingEvents','ongoingEvents'));
    }

    public function create(){
        if(!(Gate::allows('isModerator') OR Gate::allows('isAdmin'))){
            abort(403,"Sorry");
        }
    	return view('events.create');
    }
    public function store(Request $request){
    	//dd('ss');

    	$this->validateData();
    	$filenameWithExt = $request->file('event_photo')->getClientOriginalName();
	//get only file name
	$filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
	$extension = strtolower($request->file('event_photo')->getClientOriginalExtension());
	$allowedExtensions =['pdf','jpg'];
	if(!in_array( $extension,$allowedExtensions)){
		return 'not in';
	}
	$filenameToStore = $filename.'_'.time().'.'.$extension;
	//Upload Image
	$location = $request->file('event_photo')->storeAs('public/Events/'.$request->flag.'/',$filenameToStore);
//dd($request->title);

	// Create Symlink with Artisan as we don't want client to access this location i,e stroage folder
	//dd($request->date);
	//$date= Carbon::parse($request->get('datepicker'))->format('Y-m-d H:i:s');
  

$date = Carbon::createFromFormat('d/M/Y', $request->date);
    //dd($date);
	//dd($date);
	$event = new Event;
	$event->title = $request->title;
	$event->description = $request->description;
	$event->speakers = $request->speakers;
	$event->attendees = $request->attendees;
	$event->date = $date;
	$event->event_photo = $filenameToStore;
	$event->flag = $request->flag;

	$event->save();
	//Album::create($data);
	//Personal::create(array_merge( $data ,['user_id'=>Auth::user()->id]));
	return redirect('/events/'.strtolower($request->flag).'events')->with('success','New Event  Added');
    }

    public function show(Event $event){
    	return view('events.show',compact('event'));
    }

    protected function validateData(){
    	return request()->validate([
    		'title'=>'required',
    		'description'=>'required',
    		'speakers'=>'required', 
    		'attendees'=>'required',
    		'date'=>'required',
    		'event_photo'=>'sometimes',
    		'flag'=>'required',
    	]);
    }
}

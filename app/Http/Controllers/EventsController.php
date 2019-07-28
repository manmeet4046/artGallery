<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Carbon\Carbon;
use Gate;
class EventsController extends Controller
{

    public function index(){
    	$pastEvents=Event::past()->paginate(10);
    	$upcomingEvents=Event::upcoming()->paginate(10);
    	$ongoingEvents=Event::ongoing()->paginate(10);
    	$events=Event::paginate(10);

    	return view('events.index',compact('pastEvents','upcomingEvents','ongoingEvents'));
    }

    public function create(){
        if(!(Gate::allows('isModerator') OR Gate::allows('isAdmin'))){
            abort(403,"Sorry");
        }
    	return view('events.create');
    }
    public function store(Request $request){
        $this->validateData();
        $filenameWithExt = $request->file('event_photo')->getClientOriginalName();
    	//get only file name
    	$filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
    	$extension = strtolower($request->file('event_photo')->getClientOriginalExtension());
    	$allowedExtensions =['pdf','jpg','png','jpeg','gif'];
    	if(!in_array( $extension,$allowedExtensions)){
    		return 'not in';
    	}
    	$filenameToStore = $filename.'_'.time().'.'.$extension;
    	//Upload Image
    	$location = $request->file('event_photo')->storeAs('public/Events/'.$request->flag.'/',$filenameToStore);
    	//$date= Carbon::parse($request->get('datepicker'))->format('Y-m-d H:i:s');
        $date = Carbon::createFromFormat('d/M/Y', $request->date);
    	$event = new Event;
    	$event->title = $request->title;
    	$event->description = $request->description;
    	$event->speakers = $request->speakers;
    	$event->attendees = $request->attendees;
    	$event->date = $date;
    	$event->event_photo = $filenameToStore;
    	$event->flag = $request->flag;
    	$event->save();

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

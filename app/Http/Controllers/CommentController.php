<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Saakhi;
use App\User;
use Auth;
class CommentController extends Controller
{
    public function index($id){
    	// $post = Comment::with('user','saakhi')->findOrFail($id);
        
       // dd($post->user->name,$post->comment,$post->saakhi->title);
    }

    public function create($saakhi_id){
    //dd($user_id,$saakhi_id);
    return view('comments.create',compact('saakhi_id'));
    }

    public function store(Request $request){
 //dd($request->comment, Auth()->user()->name,Auth()->user()->id,$saakhi_id);
    	$request->validate([
    'comment' => 'required',
   
	]);
    $event = new Comment;
	$event->comment = $request->comment;
	$event->name = Auth()->user()->name;
	$event->user_id=Auth()->user()->id;
	$event->saakhi_id=$request->saakhi_id;

	

	

	$event->save();

 	return redirect('/saakhi/'.$request->saakhi_id.'#cTarget')->with('comment','New Comment added Succesfully');
    }

    public function validateData(){
    	
    }
}

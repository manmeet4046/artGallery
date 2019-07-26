<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reply;
use Auth;
class ReplyController extends Controller
{
    public function store(Request $request){
    	
    	dd('fggf');
         $reply = new Reply;
         $reply->name=Auth()->user()->name;
         $reply->reply=$request->reply;
        
         $reply->comment_id=$request->comment_id;
         $reply->save();

       return redirect()->back();


    }

}

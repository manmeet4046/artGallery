<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;
use Gate;
use Illuminate\Support\Facades\Storage;
class AlbumsController extends Controller
{
    public function index(){
    	$albums = Album::with('photos')->orderBy('created_at', 'desc')->get();
    	return view('albums.index',compact('albums'));
    }
    public function create(){
    	if(!(Gate::allows('isModerator') OR Gate::allows('isAdmin'))){
    		abort(403,"Sorry");
    	}
    	return view('albums.create');
    }

    public function store(Request $request){


	$this->validateData();

	$filenameWithExt = $request->file('cover_image')->getClientOriginalName();
	//get only file name
	$filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);

	$extension = strtolower($request->file('cover_image')->getClientOriginalExtension());
	$allowedExtensions =['pdf','jpg','png','jpeg','gif'];
	if(!in_array( $extension,$allowedExtensions)){
		return redirect('/albums/create')->with('failure','Only jpg, jpeg, gif, png and pdf Formats are allowed for this upload.');
	}
	$filenameToStore = $filename.'_'.time().'.'.$extension;
	//Upload Image
	$location = $request->file('cover_image')->storeAs('public/album_covers/',$filenameToStore);
   

	// Create Symlink with Artisan as we don't want client to access this location i,e stroage folder
	$albums = new Album;
	$albums->name = $request->name;
	$albums->description = $request->description;
	$albums->cover_image = $filenameToStore;
	$albums->save();
	//Album::create($data);
	//Personal::create(array_merge( $data ,['user_id'=>Auth::user()->id]));
	return redirect('/albums')->with('success','New Album Added');
    }
  public function show(Album $album){
  	
  	return view('albums.show',compact('album'));
  }

    protected function validateData(){
    	return request()->validate([
    		'name'=>'required',
    		'description'=>'required',
    		'cover_image'=>'required|max:1999',
    	]);
    }

}

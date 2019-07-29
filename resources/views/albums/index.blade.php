@extends('layouts.master')
@section('content')
<style>
.grid { 
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
  grid-gap: 30px;
  align-items: center;
    box-sizing: border-box;
  background: #0c9a9a;
 
  padding:15px;
  box-shadow: 6px 2px 10px 0px rgba(#444, 0.4);
  
  cursor: pointer;
  
  }
.grid img {
  border: 1px solid #ccc;
  box-shadow: 6px 2px 6px 0px  rgba(0,0,0,.4);
  max-width: 100%;
 
}
.details {
    position: relative;
    z-index: 1;
    padding: 10px;
    color: #444;
    background: #F3F2AA;
    text-transform: capitalize;
    letter-spacing: 1px;
    color: #828282;
    }

.allimgsd {
    position: relative;
    top:35px;
    left:-100px;
    z-index: 999;
   margin-top: 20px;
    padding: 10px;
    color: #444;
    background: #F3F2AA;
    text-transform: capitalize;
    letter-spacing: 1px;
    color: #828282;
    }
.formcls {
    position: relative;
    top:35px;
    right:0px;
    z-index: 999;
   margin-top: 20px;
   
    color: #828282;
    }
</style>
<div class="container">
@if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
<div class="py-4 maroon" style="font-size:20px;"><b>{{__('Ablums')}}!</b></div>
@can('isAdmin')<a href="albums/create" class="btn-success btn-lg">Add New Album </a> @endcan &nbsp; {{__('big_msgs.slide_showTxt')}} @can('isAdmin')(To upload click All images btn)@endcan
@if($albums->count()>0)

<div class="grid text-center">
	@foreach($albums as $album)
		
<div><a href="{{route('albums.show',$album->id)}}" class="allimgsd">All Images</a>
 
			<a href="{{route('album.slideshow',$album->id)}}">
				<img   class="thumbnail" src="storage/album_covers/{{$album->cover_image}}" width="500" height="250px"><br><div class=" details " >{{$album->name}}</div></a>
	@can('isAdmin')
	 <form action="{{route('albums.delete',$album->id)}}"  class="" method="post" style="display: inline-block;">
@csrf

<input type="submit" name="delete" value="Delete Album"  class="btn-dark " onclick="return confirm('Are you sure? This Action will delete all the photos associated with this album ')">

  </form>

@endcan
</div>

	@endforeach

</div>


@else
<div class="container">
  <br><br>
  <div class="alert alert-danger" role="alert">
      No Album Uploaded Yet?
  </div>
</div>
@endif
</div>
<div style="position:relative;min-height:75%;height:75%"></div>

@endsection
@section('scripts')
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/superfish.js')}}"></script>
<script src="{{asset('js/sticky.js')}}"></script>
 <script src="{{asset('js/custom.js')}}"></script>
@endsection

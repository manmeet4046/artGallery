@extends('layouts.master')
@section('content')
<style>
.grid { 
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
  grid-gap: 20px;
  align-items: stretch;
  }
.grid img {
  border: 1px solid #ccc;
  box-shadow: 2px 2px 6px 0px  rgba(0,0,0,0.3);
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
</style>
<div class="container py-4">
<h3 class="text-center maroon">{{$album->name}}</h3>
<a class="btn btn-warning btn-sm" href="/albums">{{__('Go Back')}}</a>
@can('isAdmin')<a class="btn btn-primary btn-sm " href="/photos/create/{{$album->id}}">Upload Photo to Album</a> @endcan <hr>
@if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
Photos of (<span class="maroon"> {{$album->name}})</span> Album.
@if($album->count()>0)

<div class="grid">
	@foreach($album->photos as $photo)
		
	
		
		<a href="{{ route('photos.show',$photo->id) }}">
				<img  class="thumbnail" src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}"><br><div class="details text-center "  >{{$photo->title}}</div></a>
	
	

	@endforeach

</div>


@else
No Album
@endif

</div>
@endsection
@section('scripts')
 <script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/superfish.js')}}"></script>
 <script src="{{asset('js/custom.js')}}"></script>
@endsection
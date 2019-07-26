@extends('layouts.master')
@section('content')
<style>img{
border: 1px solid #ccc;
  box-shadow: 5px 5px 6px 0px  rgba(0,0,0,0.7);
  max-width: 100%;
}

  </style>
<div class="container ">
	<div class="row justify-content-center">
		<div class="col-md-12 text-center py-4">
<h3>{{$photo->title}}</h3>
  <p>{{$photo->description}}</p>
   <div class="text-right " style="margin-top:-57px;"> <a href="/albums/{{$photo->album_id}}" class="btn-warning btn-lg">Back to Album</a></div>
<hr>
<img src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}"/>
<br><br>
</div>
@can('admin')<form action="{{route('photos.delete',$photo->id)}}" method="post">
@csrf

<input type="submit" name="delete" value="Delete Photo"  class="btn" onclick="return confirm('Are you sure?')">

	</form>@endcan
	<br/>
</div>
</div>
<br><br>
@endsection
@section('scripts')
<script>
	function delete(e){
		e.preventDefault();

	}
</script>
@endsection
@section('scripts')
 <script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/superfish.js')}}"></script>
 <script src="{{asset('js/custom.js')}}"></script>
@endsection
@extends('layouts.master')
@section('content')
<style>
	


</style>
<div class="container py-lg-5 ">
	<div class="row justify-content-center py-5">
		<div class="col-lg-8 col-md-8">
 <form action="{{route('photos/store')}}" method="post" role="form" class="contactForm" enctype="multipart/form-data" data-parsley-validate>
 	@csrf
              <div class="form-group">
              	<label for="name" >Title of the Photo</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Your Name"  required="" pattern="[a-zA-Z0-9,_ ]*$"   data-parsley-pattern-message="Only Alphanumeric and -,spaces are allowed" value="{{old('title')}}" />
             
               @if ($errors->has('title'))
                                    <span class="help-block red">
                                        {{ $errors->first('title') }}
                                    </span>
                                @endif
              </div>
              <div class="form-group">
              	<label for="name" >Description of Photo</label>
                <input type="text" class="form-control" name="description" id="description" placeholder="Description of Album" value="{{old('description')}}" required="" />
                 @if ($errors->has('description'))
                                    <span class="help-block red">
                                       {{$errors->first('description') }}</
                                    </span>
                                @endif
              </div>
              
                <input type="hidden"  name="album_id" id="album_id" placeholder="Description of Album"  value="{{$album_id}}"  />
                
             
              <div class="form-group form-inline ">
              	Select Cover Image of Album:
                <input type="file"  name="photo" class="form-control" id="photo" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required="" value="{{old('photo')}}" />
               @if ($errors->has('photo'))
                                    <span class="help-block red">
                                       {{$errors->first('photo') }}</
                                    </span>
                                @endif
              </div>
             
              <div class="text-center"><button type="submit" class="btn btn-warning">Add photo to the  Album</button></div>
            </form>
        </div>
        </div>
        </div>
  <div class="py-5"></div> <div class="py-5"></div>
@endsection
@section('scripts')
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/parsley.min.js')}}"></script>

<script src="{{asset('js/superfish.js')}}"></script>
 <script src="{{asset('js/custom.js')}}"></script>

@endsection
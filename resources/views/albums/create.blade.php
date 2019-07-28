@extends('layouts.master')
@section('content')
<style>


</style>
<div class="container py-lg-5 ">
	<div class="row justify-content-center py-5">
		<div class="col-lg-8 col-md-8">
      @if (session('failure'))
                        <div class="alert alert-success" role="alert">
                            {{ session('failure') }}
                        </div>
                    @endif
 <form action="{{route('albums/store')}}" method="post" role="form" class="contactForm" enctype="multipart/form-data" data-parsley-validate>
 	@csrf
              <div class="form-group">
              	<label for="name" >Name of your Album</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name"  required="" pattern="[A-Za-z0-9\ \-\,]+"   data-parsley-pattern-message="Only Alphanumeric and -,spaces are allowed" value="{{old('name')}}" />
             
               @if ($errors->has('name'))
                                    <span class="help-block red">
                                        {{ $errors->first('name') }}
                                    </span>
                                @endif
              </div>
              <div class="form-group">
              	<label for="name" >Description of Album</label>
                <input type="text" class="form-control" name="description" id="description" placeholder="Description of Album"  required="" />
                 @if ($errors->has('description'))
                                    <span class="help-block red">
                                       {{$errors->first('description') }}</
                                    </span>
                                @endif
              </div>
              <div class="form-group">
              	Select Cover Image of Album:
                <input type="file"  name="cover_image" id="cover_image" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
               @if ($errors->has('cover_image'))
                                    <span class="help-block red">
                                       {{$errors->first('cover_image') }}</
                                    </span>
                                @endif
              </div>
             
              <div class="text-center"><button type="submit" class="btn btn-warning">Upload Cover Image for Album</button></div>
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
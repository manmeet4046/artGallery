@extends('layouts.master')
@section('content')
<style>
	



</style>
<div class="container  ">
	<div class="row justify-content-center py-5">
		<div class="col-lg-8 col-md-8">
 <form action="{{route('events/store')}}" method="post" role="form"  enctype="multipart/form-data" data-parsley-validate>
 	@csrf
              <div class="form-group">
              	<label for="name" >Title of the Event</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Your Event Title"  required=""    data-parsley-pattern-message="Only Alphanumeric and -,spaces are allowed" value="{{old('title')}}" />
             
               @if ($errors->has('title'))
                                    <span class="help-block red">
                                        {{ $errors->first('title') }}
                                    </span>
                                @endif
              </div>
            
              <div class="form-group">
              	<label for="name" >Description of Event</label>
                <textarea class="form-control" name="description" id="description" placeholder="Description of Album"  required="" rows="4" />{{old('description')}}</textarea>
                 @if ($errors->has('description'))
                                    <span class="help-block red">
                                       {{$errors->first('description') }}</
                                    </span>
                                @endif
              </div>
				<div class="row justify-content-center">
					<div class="col-lg-4 ">
               <div class="form-group">
              	<label for="flag" >Type of Event</label>
                <select class="form-control" required="" name="flag">
                	<option value="">Select one of the Events</option>
                	<option value="Past">Past Event</option>
					<option value="Ongoing">Ongoing Event</option>
					<option value="Upcoming">Upcoming Event</option>
                </select>
                 @if ($errors->has('flag'))
                                    <span class="help-block red">
                                       {{$errors->first('flag') }}</
                                    </span>
                                @endif
               </div></div>

                <div class="col-lg-4 ">
               <div class="form-group ">
              	<label for="name" >Choose date of the event</label>
                <input type="text" name="date" data-provide="datepicker" class="form-control" id="date"   required=""   value="{{old('date')}}" autocomplete="off" />

             
               @if ($errors->has('date'))
                                    <span class="help-block red">
                                        {{ $errors->first('date') }}
                                    </span>
                                @endif
              </div></div></div>
				<div class="form-group">
              	<label for="name" >Invited Speaker</label>
                <input type="text" name="speakers" class="form-control" id="speakers" placeholder="Name of the Speaker seperated by commas"  required="" pattern="[A-Za-z0-9\ \-\,]+"   data-parsley-pattern-message="Only Alphanumeric and -,spaces are allowed" value="{{old('speakers')}}" />
             
               @if ($errors->has('speakers'))
                                    <span class="help-block red">
                                        {{ $errors->first('speakers') }}
                                    </span>
                                @endif
              </div>
              <div class="form-group">
              	<label for="name" >Name of the Main Attendees</label>
                <input type="text" name="attendees" class="form-control" id="attendees" placeholder="Name of the attendees seperated by commas"  required="" pattern="[A-Za-z0-9\ \-\,]+"   data-parsley-pattern-message="Only Alphanumeric and -,spaces are allowed" value="{{old('attendees')}}" />
             
               @if ($errors->has('attendees'))
                                    <span class="help-block red">
                                        {{ $errors->first('attendees') }}
                                    </span>
                                @endif
              </div>
              
    
              <div class="form-group">
              	Select Image for Event:
                <input type="file"  name="event_photo" id="event_photo" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
               @if ($errors->has('event_photo'))
                                    <span class="help-block red">
                                       {{$errors->first('event_photo') }}</
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<script src="{{asset('js/superfish.js')}}"></script>
 <script src="{{asset('js/custom.js')}}"></script>
<script>
    $(document).ready(function(){
        var date_input=$('input[name="date"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'dd/MM/yyyy',
            input_format: 'yy-mm-dd hh:ii',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })
    })
</script>
@endsection
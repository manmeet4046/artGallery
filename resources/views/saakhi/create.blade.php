@extends('layouts.master')
@section('content')
<style>
	



</style>
<div class="container py-lg-5 ">
	<div class="row justify-content-center py-5">
		<div class="col-lg-8 col-md-8">
 <form action="{{route('saakhi/store')}}" method="post" role="form" class="contactForm" enctype="multipart/form-data" data-parsley-validate>
 	@csrf
              <div class="form-group">
              	<label for="name" >Title of Saakhi</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Your Name"  required=""  value="{{old('title')}}" />
             
               @if ($errors->has('title'))
                                    <span class="help-block red">
                                        {{ $errors->first('title') }}
                                    </span>
                                @endif
              </div>
              <div class="form-group">
              	<label for="publisher" >Publisher</label>
                <input type="text" name="publisher" class="form-control" id="publisher" placeholder="Publisher Name"  required="" value="{{old('publisher')}}" />
             
               @if ($errors->has('publisher'))
                                    <span class="help-block red">
                                        {{ $errors->first('publisher') }}
                                    </span>
                                @endif
              </div>
				<div class="row justify-content-center">
					<div class="col-lg-4 ">
               <div class="form-group">
              	<label for="Volume" >Volume</label>
                <input type="text" name="volume" class="form-control" id="volume"   required=""   value="{{old('volume')}}" autocomplete="off" />

                 @if ($errors->has('volume'))
                                    <span class="help-block red">
                                       {{$errors->first('volume') }}</
                                    </span>
                                @endif
               </div></div>

                <div class="col-lg-4 ">
               <div class="form-group ">
              	<label for="name" >Issue</label>
                <input type="text" name="issue"  class="form-control" id="issue"   required=""   value="{{old('issue')}}" autocomplete="off" />

             
               @if ($errors->has('issue'))
                                    <span class="help-block red">
                                        {{ $errors->first('issue') }}
                                    </span>
                                @endif
              </div></div></div>
		<div class="row justify-content-center">
					<div class="col-lg-8 ">
	           <div class="form-group">
              	<label for="publisher" >Date of Publication</label>
                <input type="text" name="date" class="form-control" id="date" placeholder="Date "  required=""  value="{{old('date')}}" autocomplete="off" />
             
               @if ($errors->has('date'))
                                    <span class="help-block red">
                                        {{ $errors->first('date') }}
                                    </span>
                                @endif
              </div>
          </div></div>
              <div class="form-group">
              	Upload Saakhi :
                <input type="file"  name="saakhi" id="saakhi" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required=""/>
               @if ($errors->has('saakhi'))
                                    <span class="help-block red">
                                       {{$errors->first('saakhi') }}</
                                    </span>
                                @endif
              </div>
             
              <div class="text-center"><button type="submit" class="btn btn-warning">Upload Saakhi</button></div>
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

<script src="{{asset('js/superfish.js')}}"></script>
 <script src="{{asset('js/custom.js')}}"></script>


@endsection

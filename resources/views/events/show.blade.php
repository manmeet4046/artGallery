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
<h3 class="text-center maroon">{{$event->title}}</h3>
<a class="btn btn-warning btn-sm" href="/events">Go Back</a>
<a class="btn btn-primary btn-sm " href="/events/create">Upload Photo to Album</a><hr>
@if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
<h3 class="maroon mb-3 darkmagenta"> Description  of Event.</h3>

<div class="text-justify"> 

	
		
	{{$event->description}}
		
	
	</div>
	
<div class="py-5"></div><div class="py-5"></div><div class="py-5"></div>
	




</div>
@endsection
@section('scripts')

 <script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/superfish.js')}}"></script>
 <script src="{{asset('js/custom.js')}}"></script>

@endsection
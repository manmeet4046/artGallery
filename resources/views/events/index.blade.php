@extends('layouts.master')
@section('content')
<style>
	.boxstyle{
		width: 100%;
  border: 1px solid salmon;
  
margin:10px;
padding:10px;
		-webkit-box-shadow: 0 3px 2px #777;
		-moz-box-shadow: 0 3px 2px #777;
	box-shadow: 0 3px 2px #777;
	}


.rowimg {
  border: 1px solid #ccc;
  box-shadow: 6px 2px 6px 0px  rgba(0,0,0,.4);
  width:300px;
  height: 200px;
  max-width: 400px;
  opacity: 0.8;
  filter: alpha(opacity=80);

 
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
span>i.fa {
  display: inline-block;
  border-radius: 60px;
  box-shadow: 0px 0px 2px #888;
  padding: 0.5em 0.7em;
	background-color: #199EB8;
	margin-top:0px;
}
.speaker{
	display: inline-block;
	width:400px;
	margin-left:20px;
	text-transform: capitalize;
}
.speaker>b{
	color:teal;
}
.date{

    
    background-color: green;/* Your Color */
	padding:8px;
	border:1px solid #999999;
color:white;
font-size:10px;
display:block;
float:left;
width:100;

display: block; 
overflow:auto;
margin-top: 0px;
position: absolute;
  top: 0px;
  left: 16px;
  opacity: 0.8;
  filter: alpha(opacity=80);
	border-top-right-radius: 10px;
	border-left:5px solid salmon;
}
.date b{
	font-size: 20px;
	color:yellow;
}

</style>

@php $url = request()->segment(2); @endphp




<div class="container">
	<h3 class="mt-5 maroon "><u>{{($url=='pastevents')?__('Past Events'):(($url=='ongoingevents')?__('Ongoing Events'):__('Upcoming Events'))}}:</u> </h3>
	
	<div class="text-right" style="margin-top: -30px;"><a href="/events/create" class="btn-success btn-sm">Add New Event</a></div>
	@if (session('success'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('success') }}
                        </div>
     @endif
     @if($url=='pastevents')
     @if($pastEvents->count()>0)
     @foreach($pastEvents as $event)
  
	<div class="boxstyle mb-5 mt-5">
		<div class="row">
			<div class="col-md-4"><img  class="rowimg" src="/storage/Events/Past/{{$event->event_photo}}" style="background:{{'#'.dechex(rand(0x000000, 0xFFFFFF))}};opacity: .7;"/><div class="date"><h4>{{date('d, F',strtotime($event->date))}}</h4><b>{{date('Y',strtotime($event->date))}}</b></div></div>
			<div class="col-md-8"><h3>{{$event->title}}</h3>
<h6 class="maroon">Tickets From ..</h6><h6 class="text-justify">{{str_limit($event->description,150)}}</h6><div > <span><i class=" fa fa-2x fa-microphone"></i></span><span class="speaker"> <b>Speaker: </b> <br>{{$event->speakers}}</span><div class="text-right" style="margin-top:-10px;"><a class="btn-light btn-sm darkmagenta" href="{{route('events.show',$event->id)}}">Click for Details</a></div></div>
			</div>
			
		</div>
	</div><hr>
	@endforeach
	
	<div class="row justify-content-center"> {{ $pastEvents->links() }}</div>
	@else
	<br>
	<div class="alert alert-danger" role="alert">
                            {{ 'No Event in Database' }}
                        </div><div class="py-5"></div><div class="py-5"></div><div class="py-5"></div>
	@endif

@endif

<!-- For 2nd url i,e UPCOMING EVENTS -->

     @if($url=='upcomingevents')
     @if($upcomingEvents->count()>0)
     @foreach($upcomingEvents as $event)
  
	<div class="boxstyle mb-5 mt-5">
		<div class="row">
			<div class="col-md-4"><img  class="rowimg" src="/storage/Events/Upcoming/{{$event->event_photo}}" style="background:{{'#'.dechex(rand(0x000000, 0xFFFFFF))}};opacity: .7;"/><div class="date"><h4>{{date('d, F',strtotime($event->date))}}</h4><b>{{date('Y',strtotime($event->date))}}</b></div></div>
			<div class="col-md-8"><h3>{{$event->title}}</h3>
<h6 class="maroon">Tickets From ..</h6><h6 class="text-justify">{{str_limit($event->description,150)}}</h6><div > <span><i class=" fa fa-2x fa-microphone"></i></span><span class="speaker"> <b>Speaker: </b> <br>{{$event->speakers}}</span><div class="text-right" style="margin-top:-10px;"><a class="btn-light btn-sm darkmagenta" href="{{route('events.show',$event->id)}}">Click for Details</a></div></div>
			</div>
			
		</div>
	</div><hr>
	@endforeach
	<div class="row justify-content-center">{{ $upcomingEvents->links() }}</div>
	@else
	<br>
	<div class="alert alert-danger" role="alert">
                            {{ 'No Event in Database' }}
                        </div><div class="py-5"></div><div class="py-5"></div><div class="py-5"></div>
	@endif

@endif

<!-- Third Event OnGoing -->
  @if($url=='ongoingevents')
     @if($ongoingEvents->count()>0)
     @foreach($ongoingEvents as $event)
  
	<div class="boxstyle mb-5 mt-5">
		<div class="row">
			<div class="col-md-4"><img  class="rowimg" src="/storage/Events/Ongoing/{{$event->event_photo}}" style="background:{{'#'.dechex(rand(0x000000, 0xFFFFFF))}};opacity: .7;"/><div class="date"><h4>{{date('d, F',strtotime($event->date))}}</h4><b>{{date('Y',strtotime($event->date))}}</b></div></div>
			<div class="col-md-8"><h3>{{$event->title}}</h3>
<h6 class="maroon">Tickets From ..</h6><h6 class="text-justify">{{str_limit($event->description,150)}}</h6><div > <span><i class=" fa fa-2x fa-microphone"></i></span><span class="speaker"> <b>Speaker: </b> <br>{{$event->speakers}}</span><div class="text-right" style="margin-top:-10px;"><a class="btn-light btn-sm darkmagenta" href="{{route('events.show',$event->id)}}">Click for Details</a></div></div>
			</div>
			
		</div>
	</div><hr>
	@endforeach
	<div class="row justify-content-center">{{ $ongoingEvents->links() }}</div>
	@else
	<br>
	<div class="alert alert-danger" role="alert">
                            {{ 'No Event in Database' }}
                        </div>
                        <div class="py-5"></div><div class="py-5"></div><div class="py-5"></div>
	@endif

@endif
</div>

<div class="py-5"></div>
@endsection
@section('scripts')

 <script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/superfish.js')}}"></script>
 <script src="{{asset('js/custom.js')}}"></script>

@endsection
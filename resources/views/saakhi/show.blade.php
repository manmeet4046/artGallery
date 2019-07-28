
@extends('layouts.master')



@section('content')


<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" rel="stylesheet"><style>

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
<link rel="stylesheet" type="text/css" href="{{asset('css/fonts/font-awesome.css')}}">
<div class="container py-4">
<h3 class="text-center maroon">{{$saakhi->title}}</h3>
<a class="btn btn-warning btn-sm" href="/saakhi">{{__('Go Back')}}</a>
@can('isAdmin')<a class="btn btn-primary btn-sm " href="/saakhi/create">Upload New Saakhi Issue</a> @endcan<hr>
@if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
<h5 class="maroon mb-3 salmon"> Saakhi => Issue <b>{{$saakhi->issue}}</b> Volume <b>{{$saakhi->issue}}</b></h5>
@can('isAdmin')<div class="row justify-content-center py-1">
<form action="{{route('saakhi.delete',$saakhi->id)}}" method="post">
@csrf

<input type="submit" name="delete" value="Delete Saakhi"  class="btn-danger" onclick="return confirm('Are you sure, you want to delete this volume?')">

	</form></div>@endcan
<div class="text-justify"> 

	
	
	<iframe src="/storage/Saakhi/{{$saakhi->saakhi}}" width="100%" height="700" frameborder="0" allowfullscreen></iframe>
		
	
	</div>

	<br><br>
<hr style=" height: 1px;border-bottom: 1px solid red" >
	<h3 class="maroon" id="cTarget">{{__('Comments')}}:</h3>
  @if (session('comment'))
                        <div class="alert alert-success" role="alert">
                            {{ session('comment') }}
                        </div>
                    @endif
	<div class="post-comments">
 
<form action="{{route('comments.store')}}" method="post" >
                  @csrf
      <div class="form-group">
        <label for="comment">{{__('Your Comment')}}</label>
        <textarea name="comment" class="form-control" rows="3" required=""></textarea>
        @if ($errors->has('comment'))
                                    <span class="help-block red">
                                        {{ $errors->first('comment') }}
                                    </span>
                                @endif
      </div>
      <input type="hidden" value="{{$saakhi->id}}"name="saakhi_id">
      <input type="hidden" value="0"name="comment_id">

      <div class="row justify-content-end"><button type="submit" class=" btn btn-success btn-sm" style="margin-right:20px;" {{(Auth::check())?'':'disabled'}}> {{(Auth::check())?__('Send'):__('Login to Comment')}} </button></div>
    </form>
<div class="comments-nav">
      <ul class="nav nav-pills">
        <li role="presentation" class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                  there are (<span class="maroon">{{str_pad($comments->count(), 3, '0', STR_PAD_LEFT)}}</span>) comments <span class="caret"></span>
                </a>
          
        </li>
      </ul>
    </div> @php $i = 1; @endphp
@foreach($comments as $comment)
    <!--comments -->
<div class="bound">
  <div class="row">

      <div class="media">
        <!-- first comment -->

      <i class="fas fa-2x fa-user-circle salmon" style="color:{{'#'.dechex(rand(0x000000, 0xFFFFFF))}}"></i> <span style="width:130px;padding-left: 5px;
      padding-top: 5px;"> {{$comment->user->name}}<br><span style="font-size:11px;color:teal;">{{$comment->created_at->diffForHumans()}}</span>
</span>


          <div class="media-body"  style="border-left: 1px dotted gray;padding-left: 8px;">
            <br><p> {{$comment->comment}}</p>
            



            
       @php     
           /* <form action="{{route('reply.store')}}" method="post" id="{{'myform'.$i++}}">
                  @csrf
       <div class="form-group">
        <label for="reply">Your Comment</label>
        <textarea name="reply" class="form-control" rows="1" col="2" required=""></textarea>
        @if ($errors->has('reply'))
                                    <span class="help-block red">
                                        {{ $errors->first('reply') }}
                                    </span>
                                @endif
      </div>
      <input type="hidden" value="{{$comment->id}}"name="comment_id">
      

      <button type="submit" class="btn btn-default">Send</button>
    </form> */@endphp
            <!-- comment-meta -->

          
              <!-- comments -->


                            
            <!-- answer to the first comment -->
            </div>



          </div>

         
          @foreach($comment->replies as $rep) 
                                     @if($comment->id === $rep->comment_id)
                                        <div class="media" style="margin-left: 15%">
        <!-- first comment -->

      <i class="fas fa-2x fa-user-circle salmon" style="color:{{'#'.dechex(rand(0x000000, 0xFFFFFF))}}"></i> <span style="width:130px;padding-left: 5px;
      padding-top: 5px;"> {{$rep->name}}<br><span style="font-size:11px;color:teal;">{{$rep->created_at->diffForHumans()}}</span>
</span>


          <div class="media-body"  style="border-left: 1px dotted gray;padding-left: 8px;">
            <div class="well">
                                            
                                            <span> {{ $rep->reply }} </span>
                                            <div class="comment-meta">
              <span><a href="#">delete</a></span>
              <span><a href="#">report</a></span>
              <span><a href="#">hide</a></span>
              <span><a href="#" onclick='show();'>reply</a></span>

              
             
            </div>
                                            
                                        </div></div></div>
                                    @endif 
                                @endforeach
                        


        </div>

        <!-- comments -->
        <br></div>
@endforeach

<!-- Modal -->




 
    

 

<div class="row justify-content-center">{{$comments->links()}}</div>
</div>

   <!--comments -->

      </div>
      <!-- first comment -->
      
      <!-- first comment -->
    </div>

    <!-- Comments Ends -->
<!-- post -cooment div ends -->
  </div> 

	




</div> 




@endsection

@section('script')
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/superfish.js')}}"></script>
<script src="{{asset('js/sticky.js')}}"></script>
 <script src="{{asset('js/custom.js')}}"></script>




@endsection
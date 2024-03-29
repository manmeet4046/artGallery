
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <a href="/"><img style="border-radius:2px;" src="{{ asset('/img/logo.png')}}" alt="" title="" /><span style="color:yellow;font-size: 20px;float:right;
  padding-top: 10px;
  " >&nbsp; {!!__('The, Art Gallery')!!}</span></a>
        <!-- Uncomment below if you prefer to use a text image -->
        <!--<h1><a href="#hero">Bell</a></h1>-->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li><a href="/#about" style="font-size:16px;">{!! __('About Us')!!}</a></li>
          <li><a href="/#features" style="font-size:16px;">{!!__('History')!!}</a></li>
          <li><a href="/saakhi" style="font-size:16px;"> {!! __('Saakhi')!!} </a></li>
          <li><a href="/albums" style="font-size:16px;">{!! __('Gallery')!!}</a></li>
          <li class=""><a href="" style="font-size:16px;">{{ __('Events')}}</a>
            <ul style="margin-top: -10px;">

               <li><a href="/events/ongoingevents">{{__('Ongoing Events')}}</a></li>
              <li><a href="/events/upcomingevents">{{__('Upcoming Events')}}</a>
                 <li><a href="/events/pastevents">{{__('Past Events')}}</a></li>
              </li>
             
            </ul>
          </li>
           
          <li><a href="#contact" style="font-size:16px;">{{__('Contact Us')}}</a></li>
        </ul>
      </nav>
      <!-- #nav-menu-container -->

      <nav class="nav social-nav pull-right d-none d-lg-inline" >
        <a href="#"><i class="fa fa-twitter" style="font-size:15px;"></i></a> <a href="#"><i class="fa fa-facebook" style="font-size:15px;"></i></a> <a href="#"><i class="fa fa-linkedin" style="font-size:15px;"></i></a> <a href="#"></a>
       

                        <!-- Authentication Links -->
                        @guest
                           
                                <a style="font-size:16px;" href="{{ route('login') }}">{!! __('Login') !!}</a>
                          
                            @if (Route::has('register'))
                              
                                    <a style="font-size:16px;" href="{{ route('register') }}">{!!__('Register') !!}</a>
                               
                            @endif
                        @else
                            
                                   
                                

                               
                                   
<span class="form-inline" style="display: inline-block;">
                                   <form id="" action="{{ route('logout') }}" method="POST" class="form-inline">
                                        @csrf
                                        <input type="submit" class=" btn-link btn-xs" value="Logout" style="color:white;border:none;padding:0px">
                                    </form></span>
                                   
                                <span> <a style="font-size:16px;color:darkblue;position: absolute;top:0px;right:20px;"> Hi, {{ Auth::user()->name }} </a></span>
                         
                        @endguest
                       
                        
                        @if(\Session::get('locale')=='hi')
                        
                        <a href="/locale/en"style="font-size: 16px;color:maroon;background-color: lightyellow;padding: 4px;border-radius: 5px;" ><b>English</b></a>
                        @elseif(\Session::get('locale')=='en')
                         <a href="/locale/hi" style="font-size: 18px;color:maroon;background-color: lightyellow;padding: 2px;border-radius: 5px;"><b>हिंदी</b></a>
                         @else
                         <a href="/locale/hi" style="font-size: 18px;color:maroon;background-color: lightyellow;padding: 2px;border-radius: 5px;">हिंदी</a>
                         @endif 
                    
      </nav>
   </div>
  </header>


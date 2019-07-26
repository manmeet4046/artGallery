
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <a href="/"><img src="{{ asset('/img/logo.png')}}" alt="" title="" /><span style="color:yellow;font-size: 20px;float:right;
  padding-top: 10px;
  " >&nbsp; The, Art Gallery</span></img></a>
        <!-- Uncomment below if you prefer to use a text image -->
        <!--<h1><a href="#hero">Bell</a></h1>-->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li><a href="/#about">About Us</a></li>
          <li><a href="/#features">History</a></li>
          <li><a href="/saakhi">Saakhi</a></li>
          <li><a href="/albums">Gallery</a></li>
          <li class=""><a href="">Events</a>
            <ul style="margin-top: -10px;">

               <li><a href="/events/ongoingevents">Ongoing Events</a></li>
              <li><a href="/events/upcomingevents">Upcoming Events</a>
                 <li><a href="/events/pastevents">Past Events</a></li>
              </li>
             
            </ul>
          </li>
           
          <li><a href="#contact">Contact Us</a></li>
        </ul>
      </nav>
      <!-- #nav-menu-container -->

      <nav class="nav social-nav pull-right d-none d-lg-inline" >
        <a href="#"><i class="fa fa-twitter" style="font-size:15px;"></i></a> <a href="#"><i class="fa fa-facebook" style="font-size:15px;"></i></a> <a href="#"><i class="fa fa-linkedin" style="font-size:15px;"></i></a> <a href="#"></a>
       

                        <!-- Authentication Links -->
                        @guest
                           
                                <a style="font-size:16px;" href="{{ route('login') }}">{{ __('Login') }}</a>
                          
                            @if (Route::has('register'))
                              
                                    <a style="font-size:16px;" href="{{ route('register') }}">{{ __('Register') }}</a>
                               
                            @endif
                        @else
                            
                                    Hi, {{ Auth::user()->name }} <span class="caret"></span>
                                

                               
                                    <a style="font-size:16px;" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                         
                        @endguest
                    
      </nav>
    </div>
  </header>

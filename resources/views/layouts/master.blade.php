@include('layouts.partials.head')
  <!-- Page Content
    ================================================== -->
  <!-- Header -->
@include('layouts.partials.header')
  <!-- /Header -->

 

  <!-- big Image /Slider-->
@include('layouts.partials.slider')
  <!--/#big image/ Slider  -->
 @yield('content')
 <a class="scrolltop" href="#"><span class="fa fa-angle-up"></span></a>
 
 @include('layouts.partials.footer')

 @yield('scripts')

  <!-- Required JavaScript Libraries -->
  



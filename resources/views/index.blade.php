@extends('layouts.master')
@section('content')
<section class="hero">
    <div class="container text-center " style="">
      <div class="row">
        <div class="col-md-12">
          <a class="hero-brand" href="index.html" title="Home"><img alt="Bell Logo" src="img/logo.png"></a>
        </div>
      </div>

      <div class="col-md-12">
        <h1>
            प्रेमचन्द साहित्य संस्थान
          </h1>

        <p class="tagline">
          प्रेमचन्द स्मृतिकक्ष के रूप में एक संग्रहालय
        </p>
        <a class="btn-front " href="#about">Get Started Now</a>
      </div>
    </div>

  </section>
      @include('layouts.partials.history')
  <!-- /About -->
  @include('layouts.partials.about')
  <!-- Parallax -->

  <div class="block bg-primary block-pd-lg block-bg-overlay text-center" data-bg-img="img/parallax-bg.jpg" data-settings='{"stellar-background-ratio": 0.6}' data-toggle="parallax-bg">
    <h2>
        Welcome to a perfect theme
      </h2>

    <p>
      This is the most powerful theme with thousands of options that you have never seen before.
    </p>
    <img alt="Bell - A perfect theme" class="gadgets-img hidden-md-down" src="img/gadgets.png">
  </div>

  @include('layouts.partials.photogrid')
 

  @include('layouts.partials.team')
  
@include('layouts.partials.contact')
 
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/superfish/1.7.10/js/superfish.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.sticky/1.0.4/jquery.sticky.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
  <!-- Template Specisifc Custom Javascript File -->
  <script src="{{asset('js/custom.js')}}"></script>

  <script src="js/contactform.js"></script> 
 
@endsection
@section('scripts')



 
  
@endsection
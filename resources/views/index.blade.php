@extends('layouts.master')
@section('content')
<section class="hero">
    <div class="container text-center " style="">
      <div class="row">
        <div class="col-md-12 " style="margin-top:-120px;">
          <a class="hero-brand" href="index.html" title="Home" ><div style="border:1px solid white;padding: 2px;border-radius:10px;background-color: white;"><img alt="Bell Logo" src="/img/logo.png" style="border-radius:15px;" ></div></a>
        </div>
      

      <div class="col-md-12">
        <h1>
            {{ __('Premachand Saahity Sansthaan') }}
          </h1>

        <p class="tagline">
         {{ __('A Commemorative for Premchand')}}  <!-- प्रेमचन्द स्मृतिकक्ष के रूप में एक संग्रहालय -->
        </p>
        <a class="btn-front " href="#about">{{ __('Get Started Now')}}</a>
      </div></div>
    </div>

  </section>
  
<section class="features" id="features">
    <div class="container">
     

      <div class="row">
        <div class="feature-col col-lg-12 col-xs-12">
          <div class="text-center">
           

            <div>
              <p class="badge badge-primary" style="font-size:28px;color:white">
                 एक यात्रा
                </p>
<div class="text-justify">{!!__('historypage.text')!!}</div>
            

            </div>
          </div>
        </div>

        

       
      </div>

      
    </div>
  </section>
  <!-- /About -->
  @include('layouts.partials.about')
  <!-- Parallax -->

  <div class="bg-primary  text-center " style="height: 50px;" >
   

    <p class="py-3">
      This is the most powerful theme with thousands of options that you have never seen before.
    </p>
    
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
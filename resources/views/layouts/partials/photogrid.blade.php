<section class="portfolio" id="portfolio">
    <div class="container text-center">
      <h2>
          Gallery
        </h2>

      <p>
        Latest Photographs of the events
      </p>
    </div>
  <div class="portfolio-grid">
      
      <div class="row">  
        @if($photos->count()>=8)
@foreach($photos as $photo)

    
        <div class="col-lg-3 col-sm-6 col-xs-12" >
          <div class="card card-block">
            <a href="/albums"><img alt="" src="storage/photos/{{$photo->album_id}}/{{$photo->photo}}" height="200">
              <div class="portfolio-over">
                <div>
                  <h3 class="card-title">
                    {{$photo->title}}
                  </h3>

                  <p class="card-text">
                       {{str_limit($photo->description,50)}}
                  </p>
                </div>
              </div></a>
          </div>
        </div>

       


 
    @endforeach
    @endif 
        </div>
    
   
    </div>
  </section>
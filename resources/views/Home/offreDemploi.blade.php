@include('navbar.navbarAccueil')
<div class="main-banner" style="background-image: url('./assets/img/afficheAnnonce.jpg');">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="top-text header-text">
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="recent-listing">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading">
            <h2>Les annonces réçentes</h2>
          </div>
        </div>

        @foreach ($ads as $ad)

        <div class="col-lg-12">
          <div class="owl-carousel owl-listing">
            <div class="item">
              <div class="row">
                <div class="col-lg-12">
                  <div class="listing-item">
                    <div class="left-image">
                      <a href="#"><img src="./assets/img/{{$ad->image}}" alt=""></a>
                    </div>
                    <div class="right-content align-self-center h-32 md:h-auto md:w-1/2">
                      <a href="#"><h4>{{$ad->titre}}</h4></a>
                      <span class="details"><strong>Description : </strong><em>{{$ad->message}}</em></span>
                      <ul class="info">
                        <li><img src="{{asset('assets/img/search-icon-05.png')}}" alt=""> {{$ad->region}} , {{$ad->departement}}</li>
                        <small>{{ Carbon\Carbon::parse($ad->created_at)->diffForHumans() }}</small>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
    {{-- {{$ads->links()}} --}}
  </div>

  <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/js/owl-carousel.js')}}"></script>
  <script src="{{asset('assets/js/animation.js')}}"></script>
  <script src="{{asset('assets/js/imagesloaded.js')}}"></script>
  <script src="{{asset('assets/js/custom.js')}}"></script>
{{--
  <div class="card mb-3" style="width: 100%;">
    <img class="card-img-top" src="{{$ad->image}}" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">{{$ad->titre}}</h5>
      <p class="card-text text-info">{{$ad->region}}</p>
      <p class="card-text text-info">{{$ad->departement}}</p>
      <p class="card-text">{{$ad->message}}</p>
      <small>{{ Carbon\Carbon::parse($ad->created_at)->diffForHumans() }}</small>
      <a href="#" class="btn btn-primary">Voir l'annonce</a>
    </div>
  {{$ads->links()}}
  </div> --}}




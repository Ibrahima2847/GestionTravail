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
            <h2>Les ouvriers</h2>
          </div>
        </div>
        @if (session()->has('success'))
        <div class="alert alert-success">
            {{session()->get('success')}}
        </div>
        @endif
        @foreach ($ouvriers as $ouvrier)

        <div class="col-lg-12">
          <div class="owl-carousel owl-listing">
            <div class="item">
              <div class="row">
                <div class="col-lg-12">
                  <div class="listing-item">
                    <div class="left-image">
                      {{-- <a href="#"><img src="./assets/img/{{$ouvrier->image}}" alt=""></a> --}}
                    </div>
                    <div class="right-content align-self-center h-32 md:h-auto md:w-1/2">
                      <a href="#"><h4>{{$ouvrier->prenom}} {{$ouvrier->name}}</h4></a>
                      {{-- <h6>{{$name->name}}</h6> --}}
                      <ul class="rate">
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li>(18) Reviews</li>
                      </ul>
                      {{-- <span class="price"><div class="icon"><img src="" alt=""></div> $450 - $950 / month with taxes</span> --}}
                      <span class="details"><strong>Email : </strong><em>{{$ouvrier->email}}</em></span>
                      <span class="details"><strong>Téléphone :</strong> <em>{{$ouvrier->telephone}}</em></span>
                      <span class="details"><strong>Métier : </strong><em>{{$ouvrier->profession}}</em></span>
                      <span class="details"><strong>Mes potentiels : </strong><em>{{$ouvrier->potentiel}}</em></span>

                      <ul class="info">
                        <small>Membre {{ Carbon\Carbon::parse($ouvrier->created_at)->diffForHumans() }}</small>
                      </ul>
                      <div class="main-white-button">
                        <a href="contact.html"><i class="fa fa-eye"></i>Contacter</a>
                      </div>
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

      <!-- Scripts -->
    <!-- Scripts -->
    <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/owl-carousel.js')}}"></script>
    <script src="{{asset('assets/js/animation.js')}}"></script>
    <script src="{{asset('assets/js/imagesloaded.js')}}"></script>
    <script src="{{asset('assets/js/custom.js')}}"></script>




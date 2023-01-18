@include('navbar.navbarClient')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
    @foreach ($annonceClients as $gestAnnonce)
    <div class="card mb-3" style="width: 100%;">
        <img class="card-img-left" src="./assets/img/{{$gestAnnonce->image}}" alt="Card image cap">
        <div class="card-body">
          <h2 class="card-title">{{$gestAnnonce->titre}}</h2>
          <p class="card-text">{{$gestAnnonce->message}}</p>
          <small>{{$gestAnnonce->created_at}}</small>
        </div>
        <a href="#" class="btn btn-primary">Modifer</a>
          <a href="#" class="btn btn-primary">Annuler</a>
    </div>
      @endforeach
        </div>
    </div>
</div>

{{-- <!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Agent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <link href="{{ asset('./assets/css/show.css')}}" rel="stylesheet" />

  </head>
  <div class="conteneur">
    <div class="popup">
        <img src="{{ asset('./assets/img/404-tick.png')}}">
        <h2>Detail de l'annonce</h2>

        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Téléphone</th>
                    <th>Titre</th>
                    <th>Région</th>
                    <th>Departement</th>
                    <th>Message</th>
                    <th>Nombre d'Ouvrier</th>
                </tr>
            </thead>
            <tbody>
                @if (is_array($client) || is_object($client))
                @foreach ($client as $clients)
                <tr>
                  <td>{{$clients->name}}</td>
                  <td>{{$clients->prenom}}</td>
                  <td>{{$clients->telephone}}</td>
                  <td>{{$datas->titre}}</td>
                  <td>{{$datas->region}}</td>
                  <td>{{$datas->departement}}</td>
                  <td>{{$datas->message}}</td>
                  <td>{{$datas->nombre}}</td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
        <a id="btn" class="btn" href="{{route('gererToutAnnonce')}}">D'accord</a>
    </div>
  </div>
</html>

 --}}

 @include('navbar.navbarAgence')

 <section class="text-center text-lg-start">
    <style>
      .cascading-right {
        margin-right: 0%;
        /* margin-top: -100px; */
      }

      @media (max-width: 991.98px) {
        .cascading-right {
          margin-right: 0;
        }
      }
    </style>

    <!-- Jumbotron -->
    <div class="container py-4">
      <div class="row g-0 align-items-center">
        <div class="col-lg- mb-5 mb-lg-0">
          <div class="card cascading-right" style="
              background: hsla(0, 0%, 100%, 0.55);
              backdrop-filter: blur(30px);
              ">
            <div class="card-body p-5 shadow-5 text-center">
              <h2 class="fw-bold mb-5">Détails de l'annonces</h2>
              <form action="" method="POST">
                <!-- 2 column grid layout with text inputs for the first and last names -->
                <div class="row">
                  <div class="col-md- mb-4">
                    <div class="form-outline">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Téléphone</th>
                                    <th>Titre</th>
                                    <th>Région</th>
                                    <th>Departement</th>
                                    <th>Message</th>
                                    <th>Nombre d'Ouvrier</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (is_array($client) || is_object($client))
                                @foreach ($client as $clients)
                                <tr>
                                  <td>{{$clients->name}}</td>
                                  <td>{{$clients->prenom}}</td>
                                  <td>{{$clients->telephone}}</td>
                                  <td>{{$datas->titre}}</td>
                                  <td>{{$datas->region}}</td>
                                  <td>{{$datas->departement}}</td>
                                  <td>{{$datas->message}}</td>
                                  <td>{{$datas->nombre}}</td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                  </div>
                  <a  href="{{route('gererToutAnnonce')}}" class="btn btn-primary btn-block mb-4">
                    D'accord
                  </a>
                </div>
              </form>
            </div>
          </div>
        </div>

        {{-- <div class="col-lg-6 mb-5 mb-lg-0">
          <img src="{{ asset('./assets/img/details.svg')}}" class="w-100 rounded-4 shadow-4"
            alt="" />
        </div> --}}
      </div>
    </div>
    <!-- Jumbotron -->
  </section>
  <!-- Section: Design Block -->

{{-- @if (session()->has('success'))
<script>
  toastr.warning("{!! session()->get('success') !!}");
</script>
@endif

@if (session()->has('success'))
<script>
  toastr.error("{!! session()->get('success') !!}");
</script>
@endif --}}


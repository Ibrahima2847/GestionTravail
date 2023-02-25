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
                                    <th>Image</th>
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
                                    <td class="px-4 py-3 text-sm">
                                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#diplome-modal">Afficher l'image</a>
                                        <div class="modal fade" id="diplome-modal" tabindex="-1" role="dialog" aria-labelledby="diplome-modal-label" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="diplome-modal-label">Image annonce</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img src="{{ asset('assets/img/' . $datas->image) }}" alt="Image">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
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


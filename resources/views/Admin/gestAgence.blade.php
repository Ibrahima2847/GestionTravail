@include('navbar.navbarAdmin')



<section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
          <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                  <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Créer une agence</p>

                  <form class="mx-1 mx-md-4" action="{{ route('create.Agence') }}" method="POST">
                    @csrf
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="text" id="form3Example1c" class="form-control" placeholder="Nom de l'agence" name="nom"/>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        {{-- <select id="form3Example3c" class="form-control" placeholder="Localité de l'agence" name="localite">
                            <option value="Dakar">Dakar</option>
                            <option value="Thies">Thies</option>
                            <option value="Kaolack">Kaolack</option>
                            <option value="">Saint-Louis</option>
                            <option value="">Diourbel</option>

                        </select> --}}
                        <select name="localite" id="form3Example3c" class="form-control">
                            <option>------ Choisissez un région ------</option>
                            @foreach(\App\Models\Region::all() as $region)
                                <option value="{{ $region->nomRegion }}">{{ $region->nomRegion }}</option>
                            @endforeach
                          </select>
                      </div>
                    </div>

                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                      <button type="submit" class="btn btn-primary btn-lg" style="background-color: #e21111">Créer l'agence</button>
                    </div>

                  </form>

                </div>
                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                  <img src="{{ asset('./assets/img/agence.svg')}}"
                    class="img-fluid" alt="Sample image">

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  @if (session()->has('success'))
  <script>
    toastr.success("{!! session()->get('success') !!}");
  </script>
  @endif

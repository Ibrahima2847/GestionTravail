@include('navbar.navbarOuvrier')

{{-- @if (auth()->user()->id == $metier->ouvrier_id)

    <div class="alert alert-danger" role="alert">
        Désolé mais vous ne pouvez pas avoir deux comptes !!!
    </div>
@else
    <h1>Renseigner votre domaine de travail et vos compétences</h1>
    <form action="{{ route('ouvrier.store') }}" method="POST">
        @csrf
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Donner votre métier :</span>
                <select
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    name="profession" id="profession">
                    <option value="Mécanicien">Mecanicien</option>
                    <option value="Plombier">Plombier</option>
                    <option value="Maçon">Maçon</option>
                    <option value="Ménagére">Ménagére</option>
                    <option value="Maçon">Maçon</option>
                    <option value="Maçon">Maçon</option>
                </select>
            </label>
        </div>

        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Mes diplomes :</span>
                <input type="file" name="diplome"
                    class="form-control {{ $errors->has('diplome') ? 'is-invalid' : '' }} block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-textarea" />
            </label>
            @if ($errors->has('diplome'))
                <span class="invalid-feedback">{{ $errors->first('diplome') }}</span>
            @endif
        </div>
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Mon CV :</span>
                <input type="file" name="cv"
                    class="form-control {{ $errors->has('cv') ? 'is-invalid' : '' }} block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-textarea" />
            </label>
            @if ($errors->has('cv'))
                <span class="invalid-feedback">{{ $errors->first('cv') }}</span>
            @endif
        </div>
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Ma photo :</span>
                <input type="file" name="photo"
                    class="form-control {{ $errors->has('photo') ? 'is-invalid' : '' }} block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-textarea" />
            </label>
            @if ($errors->has('photo'))
                <span class="invalid-feedback">{{ $errors->first('photo') }}</span>
            @endif
        </div>
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Mes potentiels :</span>
                <textarea name="potentiel"
                    class="form-control {{ $errors->has('potentiel') ? 'is-invalid' : '' }} block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-textarea"
                    placeholder="Expliquer en quelques mot vos potentiels"></textarea>
            </label>
            @if ($errors->has('potentiel'))
                <span class="invalid-feedback">{{ $errors->first('potentiel') }}</span>
            @endif
        </div>
        <input type="hidden" name="ouvrier_id" value="{{ auth()->user()->id }}">
        <div class="px-6 my-6">
            <input type="submit" value="Soumettre" style="background-color: #e21111"
                class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" />
        </div>
    </form>
@endif --}}

{{-- @if (auth()->user()->id == $metier->ouvrier_id)

    <div class="alert alert-danger" role="alert">
        Désolé mais vous ne pouvez pas avoir deux métiers !!!
    </div>
@else --}}

<section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
          <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                  <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Ajouter mon métier</p>

                  <form class="mx-1 mx-md-4" action="{{ route('ouvrier.store') }}" method="POST">
                    @csrf
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <span class="text-gray-700 dark:text-gray-400">Donner votre métier :</span>
                        <select  id="form3Example1c" class="form-control" name="profession">
                            <option value="Mécanicien">Mecanicien</option>
                            <option value="Plombier">Plombier</option>
                            <option value="Maçon">Maçon</option>
                            <option value="Ménagére">Ménagére</option>
                            <option value="Maçon">Electricien</option>
                            <option value="Menuisier">Menuisier</option>
                        </select>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <span class="text-gray-700 dark:text-gray-400">Mon CV :</span>
                        <input type="file" name="cv" id="form3Example3c" class="form-control" />
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <span class="text-gray-700 dark:text-gray-400">Mes diplomes :</span>
                        <input type="file" name="diplome" id="form3Example4c" class="form-control" />
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <span class="text-gray-700 dark:text-gray-400">Ma photo :</span>
                        <input type="file" name="photo" id="form3Example4cd" class="form-control"/>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                          <span class="text-gray-700 dark:text-gray-400">J'habite à :</span>

                          <select name="region" id="regions" class="form-control">
                            <option>------ Choisissez un région ------</option>
                            @foreach(\App\Models\Region::all() as $region)
                                <option value="{{ $region->nomRegion }}">{{ $region->nomRegion }}</option>
                            @endforeach
                          </select>

                        </div>
                      </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                        <div class="form-outline flex-fill mb-0">
                            <span class="text-gray-700 dark:text-gray-400">Mes potentiels :</span>
                            <textarea name="potentiel" id="form3Example4cd" class="form-control" placeholder="Expliquer en quelques mot vos potentiels">
                            </textarea>
                        </div>
                      </div>

                    <input type="hidden" name="ouvrier_id" value="{{ auth()->user()->id }}">

                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                      <button type="submit" class="btn btn-primary btn-lg" style="background-color: #e21111">Soumettre</button>
                    </div>
                  </form>
                </div>
                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                  <img src="{{ asset('./assets/img/metier.svg')}}"
                    class="img-fluid" alt="Sample image">

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  {{-- @endif --}}

  @if (session()->has('success'))
  <script>
    toastr.success("{!! session()->get('success') !!}");
  </script>
  @endif

  @if (session()->has('error'))
  <script>
    toastr.error("{!! session()->get('error') !!}");
  </script>
  @endif

  <script>
    $(document).ready(function() {
        $('#regions').on('change', function() {
            var regionName = $(this).val();
            if (regionName) {
                $.ajax({
                    url: '/departments/' + regionName,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('#departments').empty();
                        $('#departments').append('<option value="">---------Sélectionnez un département----------</option>');
                        $.each(data, function(key, value) {
                            $('#departments').append('<option value="'+ value +'">'+ value +'</option>');
                        });
                    }
                });
            } else {
                $('#departments').empty();
            }
        });
    });
</script>




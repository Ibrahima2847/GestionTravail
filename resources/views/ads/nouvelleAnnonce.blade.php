@include('navbar.navbarAccueil')

<div class="main-banner" style="background-image: url('./assets/img/annonce.jpg');">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="top-text header-text">
                    <h2></h2>
                </div>
            </div>
        </div>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> IL y'a queleques erreurs dans les champs<br><br>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="contact-page">
    <div class="container">
        <div class="row">
            <h1><strong>Partager votre annonce !</strong></h1>
            {{-- @foreach ($reg as $region) --}}
                <form id="contact" action="{{ route('ad.store') }}" method="POST">
            {{-- @endforeach --}}
                @csrf
                <div class="row">
                    <div class="col-12 mt-4">
                        <label for="titre"><strong>Titre de l'annonce :</strong></label>
                        <input class="form-control {{ $errors->has('titre') ? 'is-invalid' : '' }}" type="text"
                            name="titre" id="titre" placeholder="Donner un titre à votre annonce">
                        @if ($errors->has('titre'))
                            <span class="invalid-feedback">{{ $errors->first('titre') }}</span>
                        @endif
                    </div>
                    <div class="col-12">
                        <label for="titre"><strong>Nombre d'ouvrier :</strong></label>
                        <input class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}" type="number"
                            name="nombre" id="nombre"
                            placeholder="Donner le nombre d'ouvrier dont vous avez besoin">
                        @if ($errors->has('nombre'))
                            <span class="invalid-feedback">{{ $errors->first('nombre') }}</span>
                        @endif
                    </div>
                    <div class="col-12">
                        <label for="titre"><strong>Région :</strong></label>

                        <select id="regions" class="form-control {{ $errors->has('region') ? 'is-invalid' : '' }}"
                            placeholder="Donner votre région" name="region">
                            <option>------ Choisissez une région ------</option>
                            @foreach(\App\Models\Region::all() as $region)
                                <option value="{{ $region->nomRegion }}">{{ $region->nomRegion }}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="col-12">
                        <label for="titre"><strong>Département :</strong></label>

                        <select id="departments"
                            class="form-control {{ $errors->has('departement') ? 'is-invalid' : '' }}"
                            name="departement" placeholder="Donner votre département">
                            <option value="">------ Choisissez un département ------</option>
                        </select>

                    </div>
                    <div class="col-4">
                        <label for="image"><strong>Ajouter une image :</strong></label>
                        <input class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}" type="file"
                            class="form-control-file" id="exampleFormControlFile1" name="image">
                        @if ($errors->has('image'))
                            <span class="invalid-feedback">{{ $errors->first('image') }}</span>
                        @endif
                    </div>
                    <div class="col-12">
                        <fieldset>
                            <label for="titre"><strong>Ajouter la description :</strong></label>
                            <textarea class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}" name="message" type="text"
                                class="form-control" id="message" placeholder="Message"></textarea>
                        </fieldset>
                        @if ($errors->has('image'))
                            <span class="invalid-feedback">{{ $errors->first('image') }}</span>
                        @endif
                    </div>
                    <div class="conteneur">
                        <button type="submit" class="btn" id="form-submit"
                            class="main-button "><i class="fa fa-paper-plane"></i> Publier l'annonce</button>
                    </div>
                </div>
        </div>
    </div>
    </form>
</div>
</div>
</div>
</div>


<!-- Scripts -->
<script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/owl-carousel.js') }}"></script>
<script src="{{ asset('assets/js/animation.js') }}"></script>
<script src="{{ asset('assets/js/imagesloaded.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>

{{-- <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src=" https://cdn.jsdelivr.net/npm/axios@1.1.2/dist/axios.min.js"></script> --}}

@if (session()->has('error'))
<script>
  toastr.error("{!! session()->get('success') !!}");
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


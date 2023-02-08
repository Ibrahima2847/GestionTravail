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

<div class="contact-page">
    <div class="container">
        <div class="row">
            <h1><strong>Partager votre annonce !</strong></h1>
            <form id="contact" action="{{ route('ad.store') }}" method="POST">
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
                                <option value="{{ $region->id }}">{{ $region->nomRegion }}</option>
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
                        {{-- <input  type="text" > --}}
                        @if ($errors->has('departement'))
                            <span class="invalid-feedback">{{ $errors->first('departement') }}</span>
                        @endif
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

<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="about">
                    <div class="logo">
                        <img src="assets/images/black-logo.png" alt="Plot Listing Template">
                    </div>
                    <p>If you consider that <a rel="nofollow" href="https://templatemo.com/tm-564-plot-listing"
                            target="_parent">Plot Listing template</a> is useful for your website, please <a
                            rel="nofollow" href="https://www.paypal.me/templatemo" target="_blank">support us</a> a
                        little via PayPal.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="helpful-links">
                    <h4>Helpful Links</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul>
                                <li><a href="#">Categories</a></li>
                                <li><a href="#">Reviews</a></li>
                                <li><a href="#">Listing</a></li>
                                <li><a href="#">Contact Us</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Awards</a></li>
                                <li><a href="#">Useful Sites</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="contact-us">
                    <h4>Contact Us</h4>
                    <p>27th Street of New Town, Digital Villa</p>
                    <div class="row">
                        <div class="col-lg-6">
                            <a href="#">010-020-0340</a>
                        </div>
                        <div class="col-lg-6">
                            <a href="#">090-080-0760</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="sub-footer">
                    <p>Copyright © 2021 Plot Listing Co., Ltd. All Rights Reserved.
                        <br>
                        Design: <a rel="nofollow" href="https://templatemo.com" title="CSS Templates">TemplateMo</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Scripts -->
<script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/owl-carousel.js') }}"></script>
<script src="{{ asset('assets/js/animation.js') }}"></script>
<script src="{{ asset('assets/js/imagesloaded.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>

{{-- <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src=" https://cdn.jsdelivr.net/npm/axios@1.1.2/dist/axios.min.js"></script> --}}

<script>
    $(document).ready(function() {
        $('#regions').on('change', function() {
            var regionId = $(this).val();
            if (regionId) {
                $.ajax({
                    url: '/departments/' + regionId,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('#departments').empty();
                        $('#departments').append('<option value="">Sélectionnez un département</option>');
                        $.each(data, function(key, value) {
                            $('#departments').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                });
            } else {
                $('#departments').empty();
            }
        });
    });
</script>

{{-- <script>

import axios from 'axios';

    axios.get('/getRegion')
        .then(function (response) {
            // console.log(response);

            let regions = response.data.regions;
            let departements = response.data.departements;

            let selectRegions = document.getElementById('regions');
            let selectDepartements = document.getElementById('departements');

            regions.forEach(function(region) {
                let option = document.createElement("option");
                option.value = region.id;
                option.text = region.nomRegion;
                selectRegions.appendChild(option);
            });

            departements.forEach(function(departement) {
                let option = document.createElement("option");
                option.value = departement.id;
                option.text = departement.nomDepartement;
                selectDepartements.appendChild(option);
            });
        })
        .catch(function(error) {
            console.log(error);
        });
</script> --}}




{{-- <script>
        let popup = document.getElementById("popup");

        function onpenPopup(){
            popup.classList.add("open-popup");
        }

        function closePopup(){
            popup.classList.remove("open-popup");
        }

      </script> --}}

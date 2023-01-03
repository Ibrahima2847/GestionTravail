@include('navbar.navbarAccueil')

<div class="main-banner" style="background-image: url('./assets/img/banner-bg.jpg');">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="top-text header-text">
            <h2>Ajouter une annonce</h2>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="contact-page">
    <div class="container">
      <div class="row">
                <form id="contact" action="{{route('ad.store')}}" method="POST">
                    @csrf
                  <div class="row">
                    <div class="col-12">
                        <label for="titre">Titre :</label>
                        <input class="form-control {{ $errors->has('titre') ? 'is-invalid' : '' }}" type="text" name="titre" id="titre"  placeholder="Donner un titre à votre annonce">
                        @if ($errors->has('titre'))
                            <span class="invalid-feedback">{{ $errors->first('titre') }}</span>
                        @endif
                    </div>
                    <div class="col-12">
                        <label for="titre">Région :</label>
                        <input class="form-control {{ $errors->has('region') ? 'is-invalid' : '' }}" type="text" name="region" id="region"  placeholder="Donner votre région">
                        @if ($errors->has('region'))
                            <span class="invalid-feedback">{{ $errors->first('region') }}</span>
                        @endif
                    </div>
                    <div class="col-12">
                        <label for="titre">Département :</label>
                        <input class="form-control {{ $errors->has('departement') ? 'is-invalid' : '' }}" type="text" name="departement" id="departement"  placeholder="Donner votre département">
                        @if ($errors->has('departement'))
                            <span class="invalid-feedback">{{ $errors->first('departement') }}</span>
                        @endif
                    </div>
                    <div class="col-4">
                        <label for="image">Ajouter une image :</label>
                        <input class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}" type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
                        @if ($errors->has('image'))
                            <span class="invalid-feedback">{{ $errors->first('image') }}</span>
                        @endif
                    </div>
                    <div class="col-12">
                        <fieldset>
                        <label for="titre">Ajouter un méssage :</label>
                          <textarea  class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}" name="message" type="text" class="form-control" id="message" placeholder="Message" ></textarea>
                        </fieldset>
                        @if ($errors->has('image'))
                            <span class="invalid-feedback">{{ $errors->first('image') }}</span>
                        @endif
                    </div>
                    @guest
                        <h1>Vos informations !</h1>
                        <div class="col-12">
                            <label for="name">Votre nom :</label>
                            <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name"  placeholder="Donner votre nom">
                            @if ($errors->has('name'))
                                <span class="invalid-feedback">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <div class="col-12">
                            <label for="titre">Votre email :</label>
                            <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email"  placeholder="Donner votre email">
                            @if ($errors->has('email'))
                                <span class="invalid-feedback">{{ $errors->first('email') }}</span>
                            @endif
                        </div>

                        <div class="col-12">
                            <label for="titre">Donner un mot de passe :</label>
                            <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="paasword" id="password"  placeholder="Donner votre mot de passe">
                            @if ($errors->has('password'))
                                <span class="invalid-feedback">{{ $errors->first('password') }}</span>
                            @endif
                        </div>

                        <div class="col-12">
                            <label for="titre">Confirmation du mot de passe :</label>
                            <input class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" type="password" name="password_confirmation" id="password_confirmation"  placeholder="Confirmer votre mot de passe">
                            @if ($errors->has('password_confirmation'))
                                <span class="invalid-feedback">{{ $errors->first('password_confirmation') }}</span>
                            @endif
                        </div>

                    @endguest
                    <div class="col-12">
                      <fieldset>
                        <button type="submit" id="form-submit" class="main-button "><i class="fa fa-paper-plane"></i> Publier</button>
                      </fieldset>
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
            <p>If you consider that <a rel="nofollow" href="https://templatemo.com/tm-564-plot-listing" target="_parent">Plot Listing template</a> is useful for your website, please <a rel="nofollow" href="https://www.paypal.me/templatemo" target="_blank">support us</a> a little via PayPal.</p>
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
			Design: <a rel="nofollow" href="https://templatemo.com" title="CSS Templates">TemplateMo</a></p>
          </div>
        </div>
      </div>
    </div>
  </footer>

      <!-- Scripts -->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="./assets/js/owl-carousel.js"></script>
  <script src="./assets/js/animation.js"></script>
  <script src="./assets/js/imagesloaded.js"></script>
  <script src="./assets/js/custom.js"></script>

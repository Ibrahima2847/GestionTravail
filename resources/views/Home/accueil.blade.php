
@include('navbar.navbarAccueil')

  <div class="main-banner" style="background-image: url('./assets/img/banniere.jpg');">
    <div class="container">
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{session()->get('success')}}
            </div>
        @endif
      <div class="row">
        <div class="col-lg-12">
          <div class="top-text header-text">
            <h2>Quelle que soit votre compétence elle sera la bienvenue !</h2>
            <h2>Rechercher un ouvrier</h2>
          </div>
        </div>
        <div class="col-lg-12">
          <form id="search-form" name="gs" method="submit" role="search" action="#">
            <div class="row">
              <div class="col-lg-3 align-self-center">
                  <fieldset>
                      <select name="area" class="form-select" aria-label="Area" id="chooseCategory" onchange="this.form.click()">
                          <option selected>Région</option>
                          <option value="New Village">Dakar</option>
                          <option value="Old Town">Thies</option>
                          <option value="Old Town">Fatick</option>
                          <option value="Modern City">Kaolack</option>
                      </select>
                  </fieldset>
              </div>
              <div class="col-lg-3 align-self-center">
                <fieldset>
                    <select name="price" class="form-select" aria-label="Default select example" id="chooseCategory" onchange="this.form.click()">
                        <option selected>Département</option>
                        <option value="$100 - $250">$100 - $250</option>
                        <option value="$250 - $500">$250 - $500</option>
                        <option value="$500 - $1000">$500 - $1,000</option>
                        <option value="$1000+">$1,000 or more</option>
                    </select>
                </fieldset>
            </div>
              <div class="col-lg-3 align-self-center">
                  <fieldset>
                      <input type="address" name="address" class="searchText" placeholder="Type de métier" autocomplete="on" required>
                  </fieldset>
              </div>

              <div class="col-lg-3">
                  <fieldset>
                      <button class="main-button"><i class="fa fa-search"></i> Rechercher</button>
                  </fieldset>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


  <div class="popular-categories">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading">
            <h2>NOS SERVICES POUR UNE RECHERCHE D'EMPLOI RÉUSSIE</h2>
            <h3>KayJob te propose une large gamme de services pour trouver un emploi au Sénégal.</h3>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="naccs">
            <div class="grid">
              <div class="row">
                <div class="col-lg-3">
                  <div class="menu">
                    <div class="first-thumb active">
                      <div class="thumb">
                        <span class="icon"><img src="./assets/img/search-icon-01.png" alt=""></span>
                        Apartments
                      </div>
                    </div>
                    <div>
                      <div class="thumb">
                        <span class="icon"><img src="./assets/img/search-icon-02.png" alt=""></span>
                        Food &amp; Life
                      </div>
                    </div>
                    <div>
                      <div class="thumb">
                        <span class="icon"><img src="./assets/img/search-icon-03.png" alt=""></span>
                        Cars
                      </div>
                    </div>
                    <div>
                      <div class="thumb">
                        <span class="icon"><img src="./assets/img/search-icon-04.png" alt=""></span>
                        Shopping
                      </div>
                    </div>
                    <div class="last-thumb">
                      <div class="thumb">
                        <span class="icon"><img src="./assets/img/search-icon-05.png" alt=""></span>
                        Traveling
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-9 align-self-center">
                  <ul class="nacc">
                    <li class="active">
                      <div>
                        <div class="thumb">
                          <div class="row">
                            <div class="col-lg-5 align-self-center">
                              <div class="left-text">
                                <h4>One Of The Most Trending Stuffs Right Now!</h4>
                                <p>Plot Listing is a responsive Bootstrap 5 website template that included 4 different HTML pages. This template is provided by TemplateMo website. You can apply this layout for your static or dynamic CMS websites.</p>
                                <div class="main-white-button"><a href="#"><i class="fa fa-eye"></i> Discover More</a></div>
                              </div>
                            </div>
                            <div class="col-lg-7 align-self-center">
                              <div class="right-image">
                                <img src="./assets/img/tabs-image-01.jpg" alt="">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div>
                        <div class="thumb">
                          <div class="row">
                            <div class="col-lg-5 align-self-center">
                              <div class="left-text">
                                <h4>Food and Lifestyle category is here</h4>
                                <p>You can feel free to download, edit and apply this template for your website. Please tell your friends about TemplateMo website.</p>
                                <div class="main-white-button"><a href="#"><i class="fa fa-eye"></i> Explore More</a></div>
                              </div>
                            </div>
                            <div class="col-lg-7 align-self-center">
                              <div class="right-image">
                                <img src="./assets/img/tabs-image-02.jpg" alt="Foods on the table">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div>
                        <div class="thumb">
                          <div class="row">
                            <div class="col-lg-5 align-self-center">
                              <div class="left-text">
                                <h4>Best car rentals for your trips!</h4>
                                <p>Did you know? You can get the best free HTML templates on Too CSS blog. Visit the blog pages and explore fresh and latest website templates.</p>
                                <div class="main-white-button"><a href="listing.html"><i class="fa fa-eye"></i> More Listing</a></div>
                              </div>
                            </div>
                            <div class="col-lg-7 align-self-center">
                              <div class="right-image">
                                <img src="./assets/img/tabs-image-03.jpg" alt="cars in the city">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div>
                        <div class="thumb">
                          <div class="row">
                            <div class="col-lg-5 align-self-center">
                              <div class="left-text">
                                <h4>Shopping List: Images from Unsplash</h4>
                                <p>Image credits go to Unsplash website that provides free stock photos for anyone. Images used in this Plot Listing template are from Unsplash.</p>
                                <div class="main-white-button"><a href="#"><i class="fa fa-eye"></i> Discover More</a></div>
                              </div>
                            </div>
                            <div class="col-lg-7 align-self-center">
                              <div class="right-image">
                                <img src="./assets/img/tabs-image-04.jpg" alt="Shopping Girl">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div>
                        <div class="thumb">
                          <div class="row">
                            <div class="col-lg-5 align-self-center">
                              <div class="left-text">
                                <h4>Information and Safety Tips for Traveling</h4>
                                <p>You are allowed to use this template for your commercial websites. You are NOT allowed to redistribute this template ZIP file on any Free CSS collection websites.</p>
                                <div class="main-white-button"><a rel="nofollow" href="https://templatemo.com/contact"><i class="fa fa-eye"></i> Read More</a></div>
                              </div>
                            </div>
                            <div class="col-lg-7 align-self-center">
                              <div class="right-image">
                                <img src="./assets/img/tabs-image-05.jpg" alt="Traveling Beach">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="popular-categories">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading">
            <h2>C'est quoi KayJob ?</h2>
            <h3>KayJob est une plateforme basé au Sénégal qui permet au peuple sénégal de trouver des ouvriers qui offrent
                des services de maniére temporaire mais également aux ouvriers d'avoir d'offrir plus facilement leur service
                à travers notre plateforme.
            </h3>
            </p>
          </div>
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
              <img src="./assets/img/black-logo.png" alt="Plot Listing">
            </div>
            <p>If you consider that <a rel="nofollow" href="https://templatemo.com/tm-564-plot-listing" target="_parent">Plot Listing template</a> is useful for your website, please <a rel="nofollow" href="https://www.paypal.me/templatemo" target="_blank">support us</a> a little via PayPal.</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="helpful-links">
            <h4>Helpful Links</h4>
            <div class="row">
              <div class="col-lg-6 col-sm-6">
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

</body>

</html>

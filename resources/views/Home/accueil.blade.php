@include('navbar.navbarAccueil')
{{--

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
            <h2 style="color:#e21111">Quelle que soit votre compétence elle sera la bienvenue !</h2>
          </div>
        </div>
        <div class="col-lg-12">
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
          <div class="section-heading">
            <h2>Quelques métiers</h2>
          </div>
        <div class="col-lg-12">
          <div class="naccs">
            <div class="grid">
              <div class="row">
                <div class="col-lg-3">
                  <div class="menu">
                    <div class="first-thumb active">
                      <div class="thumb">
                        <span class="icon"><img src="" alt=""></span>
                        Plomberie
                      </div>
                    </div>
                    <div>
                      <div class="thumb">
                        <span class="icon"><img src="" alt=""></span>
                        Maçonnerie
                      </div>
                    </div>
                    <div>
                      <div class="thumb">
                        <span class="icon"><img src="" alt=""></span>
                        Mécanique
                      </div>
                    </div>
                    <div>
                      <div class="thumb">
                        <span class="icon"><img src="" alt=""></span>
                        Electricien
                      </div>
                    </div>
                    <div class="last-thumb">
                      <div class="thumb">
                        <span class="icon"><img src="" alt=""></span>
                        Menuiserie
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
                                <p>En construction neuve comme en rénovation, un réseau de plomberie sain est incontournable. Le domaine de la plomberie est vaste et regroupe d'innombrables activités. Ces dernières peuvent être du dépannage comme de la maintenance ou encore de l’installation. Les tarifs pratiqués par les professionnels sont libres mais des prix moyens sont toutefois observables.</p>
                              </div>
                            </div>
                            <div class="col-lg-7 align-self-center">
                              <div class="right-image">
                                <img src="{{asset('assets/img/plomberie.jpg')}}" alt="">
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
                                <p>Les travaux de maçonnerie concernent différentes étapes de la construction et de la rénovation. Effectués à l'intérieur ou à l'extérieur, ils demandent un grand savoir-faire qu'ils contribuent à solidifier la base d'une édification ou qu'ils améliorent l'esthétisme de l'ensemble.</p>
                              </div>
                            </div>
                            <div class="col-lg-7 align-self-center">
                              <div class="right-image">
                                <img src="{{asset('assets/img/maconnerie.jpg')}}" alt="Foods on the table">
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
                                <p>Did you know? You can get the best free HTML templates on Too CSS blog. Visit the blog pages and explore fresh and latest website templates.</p>
                                <div class="main-white-button"><a href="listing.html"><i class="fa fa-eye"></i> More Listing</a></div>
                              </div>
                            </div>
                            <div class="col-lg-7 align-self-center">
                              <div class="right-image">
                                <img src="{{asset('assets/img/tabs-image-03.jpg')}}" alt="cars in the city">
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
                                <p>Pour distribuer l'électricité dans les bâtiments, l'électricien installateur pose des lignes de câbles auxquelles il raccorde les différents équipements électriques. Travaillant sur des chantiers de construction ou de rénovation, il coordonne ses activités avec celles des autres ouvriers. Après avoir étudié les plans et schémas qui concernant la pose des câbles, il repère les futurs emplacements des disjoncteurs, tableaux ou armoires électriques.</p>
                              </div>
                            </div>
                            <div class="col-lg-7 align-self-center">
                              <div class="right-image">
                                <img src="{{asset('assets/img/electricien.jpg')}}" alt="Shopping Girl">
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
                                <p>Fabriquer des portes, des fenêtres, des parquets ou des bibliothèques, poser une cuisine ou des volets est le quotidien du menuisier. Dans son atelier, il conçoit, dessine, débite, monte, vernit ses créations, puis les installe sur les chantiers. Ce professionnel doit être habile et maîtriser les bases de la géométrie.</p>
                              </div>
                            </div>
                            <div class="col-lg-7 align-self-center">
                              <div class="right-image">
                                <img src="{{asset('assets/img/menuiserie.jpg')}}" alt="Traveling Beach">
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

  <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/js/owl-carousel.js')}}"></script>
  <script src="{{asset('assets/js/animation.js')}}"></script>
  <script src="{{asset('assets/js/imagesloaded.js')}}"></script>
  <script src="{{asset('assets/js/custom.js')}}"></script>

</body>

</html> --}}


<!--
THEME: Small Apps | Bootstrap App Landing Template
VERSION: 1.0.0
AUTHOR: Themefisher

HOMEPAGE: https://themefisher.com/products/small-apps-free-app-landing-page-template/
DEMO: https://demo.themefisher.com/small-apps/
GITHUB: https://github.com/themefisher/Small-Apps-Bootstrap-App-Landing-Template

Get HUGO Version : https://themefisher.com/products/small-apps-hugo-app-landing-theme/

WEBSITE: https://themefisher.com
TWITTER: https://twitter.com/themefisher
FACEBOOK: https://www.facebook.com/themefisher
-->

<!--====================================
=            Hero Section            =
=====================================-->
<section class="section gradient-banner">
	<div class="shapes-container">
		<div class="shape" data-aos="fade-down-left" data-aos-duration="1500" data-aos-delay="100"></div>
		<div class="shape" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="100"></div>
		<div class="shape" data-aos="fade-up-right" data-aos-duration="1000" data-aos-delay="200"></div>
		<div class="shape" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200"></div>
		<div class="shape" data-aos="fade-down-left" data-aos-duration="1000" data-aos-delay="100"></div>
		<div class="shape" data-aos="fade-down-left" data-aos-duration="1000" data-aos-delay="100"></div>
		<div class="shape" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="300"></div>
		<div class="shape" data-aos="fade-down-right" data-aos-duration="500" data-aos-delay="200"></div>
		<div class="shape" data-aos="fade-down-right" data-aos-duration="500" data-aos-delay="100"></div>
		<div class="shape" data-aos="zoom-out" data-aos-duration="2000" data-aos-delay="500"></div>
		<div class="shape" data-aos="fade-up-right" data-aos-duration="500" data-aos-delay="200"></div>
		<div class="shape" data-aos="fade-down-left" data-aos-duration="500" data-aos-delay="100"></div>
		<div class="shape" data-aos="fade-up" data-aos-duration="500" data-aos-delay="0"></div>
		<div class="shape" data-aos="fade-down" data-aos-duration="500" data-aos-delay="0"></div>
		<div class="shape" data-aos="fade-up-right" data-aos-duration="500" data-aos-delay="100"></div>
		<div class="shape" data-aos="fade-down-left" data-aos-duration="500" data-aos-delay="0"></div>
	</div>
	<div class="container">
		<div class="row align-items-center">
			<div class="col-md-6 order-2 order-md-1 text-center text-md-left">
				<h1 class="text-white font-weight-bold mb-4">Quelle que soit votre compétence elle sera la bienvenue !</h1>
				<p class="text-white mb-5">KayJob te propose une large gamme de services pour trouver un emploi au Sénégal.</p>
			</div>
			<div class="col-md-6 text-center order-1 order-md-2">
				<img class="img-fluid" src="./asssets/images/ingenier.svg" alt="screenshot">
			</div>
		</div>
	</div>
</section>
<!--====  End of Hero Section  ====-->

<section class="section pt-0 position-relative pull-top">
	<div class="container">
		<div class="rounded shadow p-5 bg-white">
			<div class="row">
				<div class="col-lg-4 col-md-6 mt-5 mt-md-0 text-center">
					<i class="ti-paint-bucket text-primary h1"></i>
					<h3 class="mt-4 text-capitalize h5 ">Rapidité</h3>
					<p class="regular text-muted"></p>
				</div>
				<div class="col-lg-4 col-md-6 mt-5 mt-md-0 text-center">
					<i class="ti-shine text-primary h1"></i>
					<h3 class="mt-4 text-capitalize h5 ">Fiabilité</h3>
					<p class="regular text-muted"></p>
				</div>
				<div class="col-lg-4 col-md-12 mt-5 mt-lg-0 text-center">
					<i class="ti-thought text-primary h1"></i>
					<h3 class="mt-4 text-capitalize h5 ">Confiance</h3>
					<p class="regular text-muted"></p>
					</p>
				</div>
			</div>
		</div>
	</div>
</section>

<!--==================================
=            Feature Grid            =
===================================-->
<section class="feature section pt-0">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 ml-auto justify-content-center">
				<!-- Feature Mockup -->
				<div class="image-content" data-aos="fade-right">
					<img class="img-fluid" src="./asssets/images/feature/ouvriers.jpg" alt="iphone">
				</div>
			</div>
			<div class="col-lg-6 mr-auto align-self-center">
				<div class="feature-content">
					<!-- Feature Title -->
					<h2>La rapidité au cœur de notre service <a
							href="https://themefisher.com/products/small-apps-free-app-landing-page-template/"></a></h2>
					<!-- Feature Description -->
					<p class="desc">Notre entreprise est fière de fournir un service rapide et efficace à tous nos clients. Nous comprenons l'importance de la rapidité dans le monde d'aujourd'hui, et c'est pourquoi nous mettons tout en œuvre pour terminer les travaux le plus rapidement possible sans sacrifier la qualité.
                        Notre équipe expérimentée utilise les dernières technologies et des processus bien établis pour s'assurer que chaque projet est terminé rapidement, sans défauts et avec un souci du détail. Nous travaillons en étroite collaboration avec nos clients pour définir les attentes et les délais impartis, ce qui nous permet de terminer les travaux dans les meilleurs délais.
                        Nous croyons que la rapidité est un élément clé du succès de notre entreprise, et nous nous efforçons de fournir un service rapide à chaque étape du processus. Contactez-nous aujourd'hui pour découvrir comment nous pouvons vous aider à atteindre vos objectifs rapidement et efficacement.</p>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="feature section pt-0">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 ml-auto align-self-center">
				<div class="feature-content">
					<!-- Feature Title -->
					<h2>La fiabilité, garantie de qualité <a
							href="https://themefisher.com/products/small-apps-free-app-landing-page-template/"></a></h2>
					<!-- Feature Description -->
					<p>Chez [KayJob], nous sommes fiers de fournir un service fiable et fiable à tous nos clients. Nous comprenons l'importance de la confiance dans les relations d'affaires, et c'est pourquoi nous nous efforçons de fournir un travail de qualité supérieure à chaque fois.
                        Notre équipe expérimentée utilise des méthodes éprouvées pour garantir que chaque projet est terminé avec précision et dans les délais impartis. Nous nous engageons à maintenir les plus hauts standards de qualité pour assurer la satisfaction de nos clients à chaque étape du processus.
                        Nous croyons que la fiabilité est la clé de la durabilité de nos relations d'affaires, et nous travaillons sans relâche pour maintenir notre réputation de fiabilité. Contactez-nous aujourd'hui pour découvrir comment nous pouvons vous aider à atteindre vos objectifs de manière fiable et fiable.</p>
				</div>
				<!-- Testimonial Quote -->
				<div class="testimonial">

					<ul class="list-inline meta">
					</ul>
				</div>
			</div>
			<div class="col-lg-6 mr-auto justify-content-center">
				<!-- Feature mockup -->
				<div class="image-content" data-aos="fade-left">
					<img class="img-fluid" src="./asssets/images/feature/ouvrier1.png" alt="ipad">
				</div>
			</div>
		</div>
	</div>
</section>

<section class="feature section pt-0">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 ml-auto justify-content-center">
				<!-- Feature Mockup -->
				<div class="image-content" data-aos="fade-right">
					<img class="img-fluid" src="./asssets/images/feature/ouvrier2.jpg" alt="iphone">
				</div>
			</div>
			<div class="col-lg-6 mr-auto align-self-center">
				<div class="feature-content">
					<!-- Feature Title -->
					<h2>Fonder notre relation sur la confiance<a
							href="https://themefisher.com/products/small-apps-free-app-landing-page-template/"></a></h2>
					<!-- Feature Description -->
					<p class="desc">La confiance est au cœur de tout ce que nous faisons chez [nom de l'entreprise]. Nous comprenons que les clients ont besoin de savoir qu'ils peuvent compter sur nous pour fournir un travail de qualité à chaque fois.
                        Notre équipe expérimentée est dévouée à la satisfaction de nos clients, et nous travaillons en étroite collaboration avec eux pour comprendre leurs besoins et leurs attentes. Nous utilisons les dernières technologies et des méthodes éprouvées pour garantir que chaque projet est terminé avec précision et dans les délais impartis.
                        Nous sommes fiers de notre réputation de fiabilité et de transparence, et nous nous engageons à maintenir ces standards élevés à chaque étape du processus. Contactez-nous aujourd'hui pour découvrir comment nous pouvons vous aider à construire une relation de confiance pour un avenir réussi.</div>
			</div>
		</div>
	</div>
</section>
<!--====  End of Feature Grid  ====-->

<!--==============================
=            Services            =
===============================-->
<section class="service section bg-gray">
	<div class="container-fluid p-0">
		<div class="row">
			<div class="col-lg-12">
				<div class="section-title">
					<h2>C'est quoi KayJob ?</h2>
					<p style="width: 100%;"><a href="https://themefisher.com/products/small-apps-free-app-landing-page-template/"></a>
                        Chez KayJob, nous sommes fiers d'être le leader du marché des métiers temporaires au Sénégal. Nous comprenons les défis liés à la gestion de la main-d'œuvre pour les entreprises de toutes tailles et nous nous efforçons de fournir une solution rapide et efficace pour répondre à leurs besoins.
                        Notre équipe dévouée et expérimentée a une connaissance approfondie des différents secteurs d'activité au Sénégal et nous travaillons en étroite collaboration avec nos clients pour comprendre leurs besoins et leurs attentes. Nous utilisons les dernières technologies pour garantir une correspondance rapide et précise avec les candidats les plus qualifiés pour chaque projet.
                        Nous croyons que les métiers temporaires peuvent jouer un rôle important dans la croissance économique du Sénégal en permettant aux entreprises de s'adapter rapidement aux fluctuations de la demande. Nous nous engageons à fournir un service de qualité supérieure pour aider les entreprises à atteindre leurs objectifs et à réussir.</p>
				</div>
			</div>
		</div>
        <h1 align="center">Les métiers que nous prennont en charge !</h1>
		<div class="row no-gutters">
			<div class="col-lg-6 align-self-center">
				<!-- Feature Image -->
				<div class="service-thumb left" data-aos="fade-right">
					<img class="img-fluid" src="./asssets/images/feature/groupeOuv.jpg" alt="iphone-ipad">
				</div>
			</div>
			<div class="col-lg-5 mr-auto align-self-center">
				<div class="service-box">
					<div class="row align-items-center">
						<div class="col-md-6 col-xs-12">
							<!-- Service 01 -->
							<div class="service-item">
								<!-- Icon -->
								<i class="ti-bookmark"></i>
								<!-- Heading -->
								<h3>Menuiserie</h3>
							</div>
						</div>
						<div class="col-md-6 col-xs-12">
							<!-- Service 01 -->
							<div class="service-item">
								<!-- Icon -->
								<i class="ti-bookmark"></i>
								<!-- Heading -->
								<h3>Plomberie</h3>
							</div>
						</div>
						<div class="col-md-6 col-xs-12">
							<!-- Service 01 -->
							<div class="service-item">
								<!-- Icon -->
								<i class="ti-bookmark"></i>
								<!-- Heading -->
								<h3>Maçonnerie</h3>
							</div>
						</div>
						<div class="col-md-6 col-xs-12">
							<!-- Service 01 -->
							<div class="service-item">
								<!-- Icon -->
								<i class="ti-bookmark"></i>
								<!-- Heading -->
								<h3>Electricité</h3>
							</div>
						</div>
                        <div class="col-md-6 col-xs-12">
							<!-- Service 01 -->
							<div class="service-item">
								<!-- Icon -->
								<i class="ti-bookmark"></i>
								<!-- Heading -->
								<h3>Peintre</h3>
								<!-- Description -->
							</div>
						</div>
                        <div class="col-md-6 col-xs-12">
							<!-- Service 01 -->
							<div class="service-item">
								<!-- Icon -->
								<i class="ti-bookmark"></i>
								<!-- Heading -->
								<h3>Mécanique</h3>
							</div>
						</div>
                        <div class="col-md-6 col-xs-12">
							<!-- Service 01 -->
							<div class="service-item">
								<!-- Icon -->
								<i class="ti-bookmark"></i>
								<!-- Heading -->
								<h3>Calloreur</h3>
							</div>
						</div>
                        <div class="col-md-6 col-xs-12">
							<!-- Service 01 -->
							<div class="service-item">
								<!-- Icon -->
								<i class="ti-bookmark"></i>
								<!-- Heading -->
								<h3>Ménagére</h3>
							</div>
						</div>
                        <div class="col-md-6 col-xs-12">
							<!-- Service 01 -->
							<div class="service-item">
								<!-- Icon -->
								<i class="ti-bookmark"></i>
								<!-- Heading -->
								<h3>Ménagére</h3>
							</div>
						</div>
                        <div class="col-md-6 col-xs-12">
							<!-- Service 01 -->
							<div class="service-item">
								<!-- Icon -->
								<i class="ti-bookmark"></i>
								<!-- Heading -->
								<h3>Ménagére</h3>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--====  End of Services  ====-->


<!--=================================
=            Video Promo            =
==================================-->
<section class="video-promo section bg-1">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="content-block">
					<!-- Heading -->
					<h2>Watch Our Promo Video</h2>
					<!-- Promotional Speech -->
					<p>Vivamus suscipit tortor eget felis porttitor volutpat. Curabitur arcu erat, accumsan id imperdiet et,
						porttitor at sem. Vivamus </p>
					<!-- Popup Video -->
					<a data-fancybox href="https://www.youtube.com/watch?v=jrkvirglgaQ">
						<i class="ti-control-play video"></i>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>
<!--====  End of Video Promo  ====-->

<!--=================================
=            Testimonial            =
==================================-->
<section class="section testimonial" id="testimonial">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<!-- Testimonial Slider -->
				<div class="testimonial-slider owl-carousel owl-theme">
					<!-- Testimonial 01 -->
					<div class="item">
						<div class="block shadow">
							<!-- Speech -->
							<p>
								Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Donec sollicitudin molestie malesuada.
								Donec sollicitudin molestie malesuada. Pellentesque in ipsum id orci porta dapibus. Lorem ipsum dolor
								sit amet, consectetur adipiscing elit. Pellentesque in ipsum id orci porta dapibus. Quisque velit nisi,
								pretium ut lacinia in, elementum id enim.
							</p>
							<!-- Person Thumb -->
							<div class="image">
								<img src="./asssets/images/testimonial/feature-testimonial-thumb.jpg" alt="image">
							</div>
							<!-- Name and Company -->
							<cite>Abraham Linkon , Themefisher.com</cite>
						</div>
					</div>
					<!-- Testimonial 01 -->
					<div class="item">
						<div class="block shadow">
							<!-- Speech -->
							<p>
								Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Donec sollicitudin molestie malesuada.
								Donec sollicitudin molestie malesuada. Pellentesque in ipsum id orci porta dapibus. Lorem ipsum dolor
								sit amet, consectetur adipiscing elit. Pellentesque in ipsum id orci porta dapibus. Quisque velit nisi,
								pretium ut lacinia in, elementum id enim.
							</p>
							<!-- Person Thumb -->
							<div class="image">
								<img src="./asssets/images/testimonial/feature-testimonial-thumb.jpg" alt="image">
							</div>
							<!-- Name and Company -->
							<cite>Abraham Linkon , Themefisher.com</cite>
						</div>
					</div>
					<!-- Testimonial 01 -->
					<div class="item">
						<div class="block shadow">
							<!-- Speech -->
							<p>
								Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Donec sollicitudin molestie malesuada.
								Donec sollicitudin molestie malesuada. Pellentesque in ipsum id orci porta dapibus. Lorem ipsum dolor
								sit amet, consectetur adipiscing elit. Pellentesque in ipsum id orci porta dapibus. Quisque velit nisi,
								pretium ut lacinia in, elementum id enim.
							</p>
							<!-- Person Thumb -->
							<div class="image">
								<img src="./asssets/images/testimonial/feature-testimonial-thumb.jpg" alt="image">
							</div>
							<!-- Name and Company -->
							<cite>Abraham Linkon , Themefisher.com</cite>
						</div>
					</div>
					<!-- Testimonial 01 -->
					<div class="item">
						<div class="block shadow">
							<!-- Speech -->
							<p>
								Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Donec sollicitudin molestie malesuada.
								Donec sollicitudin molestie malesuada. Pellentesque in ipsum id orci porta dapibus. Lorem ipsum dolor
								sit amet, consectetur adipiscing elit. Pellentesque in ipsum id orci porta dapibus. Quisque velit nisi,
								pretium ut lacinia in, elementum id enim.
							</p>
							<!-- Person Thumb -->
							<div class="image">
								<img src="./asssets/images/testimonial/feature-testimonial-thumb.jpg" alt="image">
							</div>
							<!-- Name and Company -->
							<cite>Abraham Linkon , Themefisher.com</cite>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--====  End of Testimonial  ====-->

<section class="call-to-action-app section bg-blue">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2>It's time to change your mind</h2>
				<p>Download over 2 million humans .Get <a href="https://themefisher.com/products/small-apps-free-app-landing-page-template/">Small Apps</a> free forever!
					<br>We say you won’t look back.</p>
				<ul class="list-inline">
					<li class="list-inline-item">
						<a href="" class="btn btn-rounded-icon">
							<i class="ti-apple"></i>
							Iphone
						</a>
					</li>
					<li class="list-inline-item">
						<a href="" class="btn btn-rounded-icon">
							<i class="ti-android"></i>
							Android
						</a>
					</li>
					<li class="list-inline-item">
						<a href="" class="btn btn-rounded-icon">
							<i class="ti-microsoft-alt"></i>
							Windows
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>

<!--============================
=            Footer            =
=============================-->
<footer>
  <div class="footer-main">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-12 m-md-auto align-self-center">
          <div class="block">
            <a href="index.html"><img src="./asssets/images/logo-alt.png" alt="footer-logo"></a>
            <!-- Social Site Icons -->
            <ul class="social-icon list-inline">
              <li class="list-inline-item">
                <a href="https://www.facebook.com/themefisher"><i class="ti-facebook"></i></a>
              </li>
              <li class="list-inline-item">
                <a href="https://twitter.com/themefisher"><i class="ti-twitter"></i></a>
              </li>
              <li class="list-inline-item">
                <a href="https://www.instagram.com/themefisher/"><i class="ti-instagram"></i></a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-lg-2 col-md-3 col-6 mt-5 mt-lg-0">
          <div class="block-2">
            <!-- heading -->
            <h6>Product</h6>
            <!-- links -->
            <ul>
              <li><a href="team.html">Teams</a></li>
              <li><a href="blog.html">Blogs</a></li>
              <li><a href="FAQ.html">FAQs</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-2 col-md-3 col-6 mt-5 mt-lg-0">
          <div class="block-2">
            <!-- heading -->
            <h6>Resources</h6>
            <!-- links -->
            <ul>
              <li><a href="sign-up.html">Singup</a></li>
              <li><a href="sign-in.html">Login</a></li>
              <li><a href="blog.html">Blog</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-2 col-md-3 col-6 mt-5 mt-lg-0">
          <div class="block-2">
            <!-- heading -->
            <h6>Company</h6>
            <!-- links -->
            <ul>
              <li><a href="career.html">Career</a></li>
              <li><a href="contact.html">Contact</a></li>
              <li><a href="team.html">Investor</a></li>
              <li><a href="privacy.html">Terms</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-2 col-md-3 col-6 mt-5 mt-lg-0">
          <div class="block-2">
            <!-- heading -->
            <h6>Company</h6>
            <!-- links -->
            <ul>
              <li><a href="about.html">About</a></li>
              <li><a href="contact.html">Contact</a></li>
              <li><a href="team.html">Team</a></li>
              <li><a href="privacy-policy.html">Privacy Policy</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="text-center bg-dark py-4">
    <small class="text-secondary">Copyright &copy; <script>document.write(new Date().getFullYear())</script>. Designed &amp; Developed by <a href="https://themefisher.com/">Themefisher</a></small class="text-secondary">
  </div>

	<div class="text-center bg-dark py-1">
   <small> <p>Distributed By <a href="https://themewagon.com/">Themewagon</a></p></small class="text-secondary">
  </div>
</footer>


  <!-- To Top -->
  <div class="scroll-top-to">
    <i class="ti-angle-up"></i>
  </div>

  <!-- JAVASCRIPTS -->
  <script src="{{asset('asssets/plugins/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('asssets/plugins/bootstrap/bootstrap.min.js')}}"></script>
  <script src="{{asset('asssets/plugins/slick/slick.min.js')}}"></script>
  <script src="{{asset('asssets/plugins/fancybox/jquery.fancybox.min.js')}}"></script>
  <script src="{{asset('asssets/plugins/syotimer/jquery.syotimer.min.js')}}"></script>
  <script src="{{asset('asssets/plugins/aos/aos.js')}}"></script>
  <!-- google map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAgeuuDfRlweIs7D6uo4wdIHVvJ0LonQ6g"></script>
  <script src="{{asset('asssets/plugins/google-map/gmap.js')}}"></script>

  <script src="{{asset('asssets/js/script.js')}}"></script>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
     <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Accueil</title>

     <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files-->
    <link rel="stylesheet" href="./assets/css/fontawesome.css">
    <link rel="stylesheet" href="./assets/css/templatemo-plot-listing.css">
    <link rel="stylesheet" href="./assets/css/animated.css">
    <link rel="stylesheet" href="./assets/css/owl.css">
  </head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="index.html" class="logo" ><img src="assets/img/logo.png" alt=""></a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li><a href="{{route('accueil')}}" class="active">Accueil</a></li>
              <li><a href="{{route('ad.index')}}">Offre d'Emploi</a></li>
              <li class="dropdown"><a href="listing.html">Recruteur</a></li>
            @guest
            <div class="dropdown">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  My account
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{route('app_logout')}}">Login</a></li>
                  <li><a class="dropdown-item" href="{{route('register')}}">Create account</a></li>

                </ul>
              </div>
            @endguest

            @auth
                <div class="dropdown">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ auth()->user()->name }}
                    </a>

                    <ul class="dropdown-menu">
                        <li><a href="{{route('app_ouvrier')}}">Gérer</a></li>
                        <li><a href="{{route('app_logout')}}">Logout</a></li>
                    </ul>
                  </div>
              <li><div class="main-white-button"><a href="{{route('nouvelleAnnonce')}}"><i class="fa fa-plus"></i> Add Your Listing</a></div></li>
              @endauth
            </ul>
            <a class='menu-trigger'>
                <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->
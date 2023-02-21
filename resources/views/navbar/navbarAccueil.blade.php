{{-- <!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Accueil</title>

    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('assets/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/templatemo-plot-listing.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/animated.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.css')}}">
  </head>

<body>

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

  <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">

            <a href="index.html" class="logo">
            </a>

            <ul class="nav">
              <li><a href="{{route('accueil')}}" class="active">Accueil</a></li>
              <li><a href="{{route('ad.index')}}">Annonces</a></li>
              <li class="dropdown"><a href="{{route('app_ouvrier')}}">Ouvriers</a></li>
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
                        {{ auth()->user()->prenom }} {{ auth()->user()->name }}
                    </a>

                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('redirection')}}">Gérer</a></li>
                        <li><a class="dropdown-item" href="{{route('app_logout')}}">Logout</a></li>
                    </ul>
                  </div>
              @endauth
              <li><div class="main-white-button"><a href="{{route('nouvelleAnnonce')}}"><i class="fa fa-plus"></i> Add Your Listing</a></div></li>
            </ul>
            <a class='menu-trigger'>
                <span>Menu</span>
            </a>
          </nav>
        </div>
      </div>
    </div>
  </header> --}}

  <!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title>KayJob | Accuiel</title>

  <!-- Mobile Specific Metas
  ================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Bootstrap App Landing Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Small Apps Template v1.0">

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">


  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="{{asset('asssets/images/favicon.png')}}" />

  <!-- PLUGINS CSS STYLE -->
  <link rel="stylesheet" href="{{asset('asssets/plugins/bootstrap/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('asssets/plugins/themify-icons/themify-icons.css')}}">
  <link rel="stylesheet" href="{{asset('asssets/plugins/slick/slick.css')}}">
  <link rel="stylesheet" href="{{asset('asssets/plugins/slick/slick-theme.css')}}">
  <link rel="stylesheet" href="{{asset('asssets/plugins/fancybox/jquery.fancybox.min.css')}}">
  <link rel="stylesheet" href="{{asset('asssets/plugins/aos/aos.css')}}">

  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('assets/css/fontawesome.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/templatemo-plot-listing.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/animated.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/owl.css')}}">

  <!-- CUSTOM CSS -->
  <link href="{{asset('asssets/css/style.css')}}" rel="stylesheet">

</head>

<body class="body-wrapper" data-spy="scroll" data-target=".privacy-nav">


<nav class="navbar main-nav navbar-expand-lg px-2 px-sm-0 py-2 py-lg-0">
  <div class="container">
    {{-- <a class="navbar-brand" href="index.html"><img src="./asssets/images/logo.png" alt="logo"></a> --}}
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="ti-menu"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item @@about">
            <a class="nav-link" href="{{route('accueil')}}">Accueil</a>
        </li>
        <li class="nav-item @@about">
            <a class="nav-link" href="{{route('ad.index')}}">Les annonces</a>
          </li>
          <li class="nav-item @@about">
            <a class="nav-link" href="{{route('app_ouvrier')}}">Les ouvriers</a>
          </li>
          @guest
        <li class="nav-item dropdown active">
          <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Mon compte
            <span><i class="ti-angle-down"></i></span>
          </a>
          <!-- Dropdown list -->
          <ul class="dropdown-menu">
            <li><a class="dropdown-item active" href="{{route('app_logout')}}">Se connecter</a></li>
            <li><a class="dropdown-item" href="{{route('register')}}">Créer un compte</a></li>
          </ul>
          @endguest
          @auth
          <li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">{{ auth()->user()->prenom }} {{ auth()->user()->name }}
              <span><i class="ti-angle-down"></i></span>
            </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item active" href="{{route('redirection')}}">Gérer mon compte</a></li>
            <li><a class="dropdown-item" href="{{route('app_logout')}}">Se déconnecter</a></li>
          </ul>
          @endauth
          <li class="nav-item @@about">
            <a class="nav-link" href="{{route('nouvelleAnnonce')}}">Ajouter une annonce</a>
          </li>
        </li>
      </ul>
    </div>
  </div>
</nav>

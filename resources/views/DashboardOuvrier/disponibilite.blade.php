@include('navbar.navbarOuvrier')
<!-- Section: Design Block -->
<section class="text-center text-lg-start">
    <style>
      .cascading-right {
        margin-right: -50px;
        margin-top: -100px;
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
        <div class="col-lg-6 mb-5 mb-lg-0">
          <div class="card cascading-right" style="
              background: hsla(0, 0%, 100%, 0.55);
              backdrop-filter: blur(30px);
              ">
            <div class="card-body p-5 shadow-5 text-center">
              <h2 class="fw-bold mb-5">Je suis actuellement :</h2>
              <form action="" method="POST">
                <!-- 2 column grid layout with text inputs for the first and last names -->
                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                        <a  href="{{route('dispo',auth()->user()->id)}}" class="btn btn-success">Disponible</a>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                        <a  href="{{route('indispo',auth()->user()->id)}}" class="btn btn-danger">Indisponible</a>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>

        <div class="col-lg-6 mb-5 mb-lg-0">
          <img src="{{ asset('./assets/img/dispo.svg')}}" class="w-100 rounded-4 shadow-4"
            alt="" />
        </div>
      </div>
    </div>
    <!-- Jumbotron -->
  </section>
  <!-- Section: Design Block -->

@if (session()->has('success'))
<script>
  toastr.warning("{!! session()->get('success') !!}");
</script>
@endif

@if (session()->has('success'))
<script>
  toastr.error("{!! session()->get('success') !!}");
</script>
@endif

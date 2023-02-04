<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Agent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <link href="{{ asset('./assets/css/show.css')}}" rel="stylesheet" />

  </head>
  <div class="conteneur">
    <div class="popup">
        <img src="{{ asset('./assets/img/404-tick.png')}}">
        <h2>Mise en relation reussi</h2>
        <h3>Votre mise en relation a été un succes</h3>
        {{-- <h3>Votre mise en relation a été un succes</h3> --}}
        <a id="btn" class="btn" href="{{route('gererToutAnnonce')}}">D'accord</a>
    </div>
  </div>
</html>


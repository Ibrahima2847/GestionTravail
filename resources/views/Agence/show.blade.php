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
        <h2>Detail de l'annonce</h2>

        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Téléphone</th>
                    <th>Titre</th>
                    <th>Région</th>
                    <th>Departement</th>
                    {{-- <th>Image</th> --}}
                    <th>Message</th>
                    <th>Nombre d'Ouvrier</th>
                </tr>
            </thead>
            <tbody>
                @if (is_array($client) || is_object($client))
                @foreach ($client as $clients)
                <tr>
                  <td>{{$clients->name}}</td>
                  <td>{{$clients->prenom}}</td>
                  <td>{{$clients->telephone}}</td>
                  <td>{{$datas->titre}}</td>
                  <td>{{$datas->region}}</td>
                  <td>{{$datas->departement}}</td>
                  {{-- <td>
                     <a href="{{route('voirImage')}}"><img src="./assets/img/{{$datas->image}}" alt=""></a>
                  </td> --}}
                  <td>{{$datas->message}}</td>
                  <td>{{$datas->nombre}}</td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
        <a id="btn" class="btn" href="{{route('gererToutAnnonce')}}">D'accord</a>
    </div>
  </div>
</html>

{{-- <script>
    let popup = document.getElementById("popup");

    function onpenPopup(){
        popup.classList.add("open-popup");
    }

    function closePopup(){
        popup.classList.remove("open-popup");
    }

  </script> --}}

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Agent</title>

    <link href="{{ asset('./assets/css/poppup.css')}}" rel="stylesheet" />" rel="stylesheet" />

  </head>
  <div class="conteneur">
    <div class="popup">
        <img src="">
        <h2>Thank you</h2>
        <p>Merci de nous avoir fait confiance !</p>
        <button type="button">OK</button>
    </div>
  </div>
</html>

<script>
    let popup = document.getElementById("popup");

    function onpenPopup(){
        popup.classList.add("open-popup");
    }

    function closePopup(){
        popup.classList.remove("open-popup");
    }

  </script>

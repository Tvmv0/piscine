<?php

/***************
 *              CODE CONNEXION VENDEUR ET VISU PROFIL
 *              CODEFONCTIONNEL POUR RAPH
 * ***************** */


//declaration des variables
$mail = isset($_POST["mail"]) ? $_POST["mail"] : "";
$username = isset($_POST["username"]) ? $_POST["username"] : "";

//identifier BDD
$database = "piscine";

//connectez-vous dans BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);


//si le bouton validé est cliqué
if (isset($_POST["Connexion"])) {
  if ($db_found) {
    //on cherche le client
    if (($username != "") && ($mail != "")) {
      $sql = "SELECT * FROM vendeur WHERE pseudo LIKE '%$username%' AND mail_vendeur LIKE '%$mail%'";
    }

    $result = mysqli_query($db_handle, $sql);
    if ((mysqli_num_rows($result) == 0)) {
      echo "<p>Le compte n'existe pas.</p>";
    } else {

      while ($data = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "</tr>";
      }
      echo "</table>";
    }
  } else {
    echo "<p>Database not found.</p>";
  }
}

mysqli_close($db_handle);

?>


<!--
  SOURCES

  https://getbootstrap.com/docs/5.3/
  https://getbootstrap.com/docs/5.2/examples/footers/

  google maps: https://blog.hubspot.com/website/how-to-embed-google-map-in-html
  https://www.pierre-giraud.com/bootstrap-apprendre-cours/bouton/
-->

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Compte Agora Francia</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link href="allstyles.css" type="text/css" rel="stylesheet">
  <style>
    .circle-image {
      border-radius: 50%;
      max-width: 200px;
      height: auto;
    }

    #section {
      background-image: url(imgbanniere.jpg);
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;

    }

    .round-image {
      width: 200px;
      height: 200px;
      border-radius: 50%;
      overflow: hidden;
    }

    .round-image img {
      width: 100%;
      height: auto;
      object-fit: cover;
    }

    th,
    td {
      padding: 8px;
      text-align: left;
      background-color: white;
      color: red;
    }
  </style>

</head>

<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  <div id="wrapper" class="container-fluid">

    <div id="header" class="container-fluid">
    <center> <img src="logo.png" alt="logo"> </center>
    </div>

    <div id="navigation" class="container-fluid">
      <nav class="navbar navbar-expand-lg bg-body-tertiary mx-auto">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav mx-auto">
              <a class="nav-link active px-5" aria-current="page" href="index.html">Accueil</a>
              <a class="nav-link px-5" href="parcourir.html">Tout Parcourir</a>
              <a class="nav-link px-5" href="notifications.html">Notifications</a>
              <a class="nav-link px-5" href="panier.html">Panier</a>
              <a class="nav-link px-5" href="compte.html">Votre compte</a>
            </div>
          </div>
        </div>
      </nav>
    </div>

    <div class="container" id="section">
      <center>
        <img src="pp1.jpg" class="circle-image" alt="photo_vendeur" width="200" height="200">
      </center>
      <div class="container">

        <?php
        $database = "piscine";
        $db_handle = mysqli_connect('localhost', 'root', 'root');
        $db_found = mysqli_select_db($db_handle, $database);

        $username = 'nom1';
        $mail = 'mail1';

        if (($username != "") && ($mail != "")) {
          $sql = "SELECT * FROM vendeur WHERE pseudo LIKE '%$username%' AND mail_vendeur LIKE '%$mail%'";

          $result = mysqli_query($db_handle, $sql);
          if ((mysqli_num_rows($result) == 0)) {
            echo "<p>Le compte n'existe pas.</p>";
          } else {

            //on cherche la pp du vendeur 
            $sql = "SELECT * FROM vendeur WHERE pseudo LIKE '$username'";
            $result = mysqli_query($db_handle, $sql);
            if ((mysqli_num_rows($result) == 0)) {
              echo "<p>Le vendeur n'a pas de photo de profil</p>";
            } else {
              $sql = "SELECT * FROM vendeur WHERE pseudo LIKE '$username'";
              $result = mysqli_query($db_handle, $sql);

              while ($data = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td><center>";
                $image = $data['photo_vendeur'];
                echo "<img src='$image' height='200' width='200'>";
                echo "</center></td>";
                echo "</tr>";
              }


              /*echo "<h3>" . "Vous êtes connecté :" . "</h3>";*/
              echo "<table border='1'>";
              echo "<tr>";
              /*echo "<th>" . "ID" . "</th>";*/
              echo "<th>" . "Pseudo" . "</th>";
              echo "<th>" . "Mail" . "</th>";
              //afficher le resultat
              $sql = "SELECT * FROM vendeur WHERE pseudo LIKE '%$username%'";

              $result = mysqli_query($db_handle, $sql);
              while ($data = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                /*echo "<td>" . $data['id_vendeur'] . "</td>";*/
                echo "<td>" . $data['pseudo'] . "</td>";
                echo "<td>" . $data['mail_vendeur'] . "</td>";
                echo "</tr>";
              }
            }
            echo "</table>";
          }
        }
        //fermer la connexion
        mysqli_close($db_handle);
        ?>
      </div>

    </div>

    <div class="container-fluid" id="footer">
      <div class="container">
        <footer class="py-5">
          <div class="row">
            <div class="col-6 col-md-1 offset-md-1">
              <h5>Navigation</h5>
              <ul class="nav flex-column">
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Accueil</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Tout Parcourir</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Notifications</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Panier</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Votre compte</a></li>
              </ul>
            </div>

            <div class="col-7 col-md-4 offset-md-2">
              <h5>Contact et réseaux sociaux</h5>
              <ul class="nav flex-column">
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Mail: agorafrancia.commerce@gmail.com</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Tél: 12 34 56 78 90</a></li>
                <li class="nav-item mb-2"><a href="https://www.instagram.com/r3mi.lml/" class="nav-link p-0 text-muted">Instagram</a></li>
                <li class="nav-item mb-2"><a href="https://www.facebook.com/profile.php?id=100012939098511" class="nav-link p-0 text-muted">Facebook</a></li>
              </ul>
            </div>

            <div class="col-md-4" id="map">
              <strong>
                <h5>Où sommes-nous situés?</h5>
              </strong>
              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1033.460180458264!2d2.288410797944649!3d48.85248423190897!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sfr!4v1685393929817!5m2!1sen!2sfr" width="400" height="300" style="border:5px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
              </iframe>
            </div>


          </div>

          <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
            <p>© 2022 Agora Fracia™</p>
          </div>
        </footer>
      </div>
    </div>




  </div>


</body>

</html>
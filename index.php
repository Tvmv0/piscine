<!--
  SOURCES

  https://getbootstrap.com/docs/5.3/
  https://getbootstrap.com/docs/5.2/examples/footers/

  google maps: https://blog.hubspot.com/website/how-to-embed-google-map-in-html
-->

<?php
session_start();

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Agora Francia </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
  <link href="allstyles.css" type="text/css" rel="stylesheet" />

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

    <div id="navigation" class="container-fluid" style="margin-top: 20px;">
      <nav class="navbar navbar-expand-lg bg-body-tertiary mx-auto">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav mx-auto">
              <a class="nav-link active px-5" aria-current="page" href="#">Accueil</a>
              <a class="nav-link px-5" href="parcourir.php">Tout Parcourir</a>
              <?php
              $database = "piscine";

              //connectez-vous dans BDD
              $db_handle = mysqli_connect('localhost', 'root', '');
              $db_found = mysqli_select_db($db_handle, $database);
              $id = $_SESSION['notif'];
              
              $sql = "SELECT * FROM items WHERE id_item = $id;";
              $result = mysqli_query($db_handle, $sql);
              $data = mysqli_fetch_assoc($result);

              if ($data['prix'] > $_SESSION['prix'] || $data['prix'] < $_SESSION['prix'])
              {
                echo "<a href=page_notifications.php><img src='notif2.png' name =" . "prod" . " height='60' width='180'> </a>";
              }
              else
              {
                echo "<a class=" . "nav-link px-5" . " href=" . "page_notifications.php" . ">Notifications</a>";
              }
              ?>
              <a class="nav-link px-5" href="visu_panier.php">Panier</a>
              <?php
              if (!$_SESSION['username'])
                echo "<a class=" . "nav-link px-5" . " href=" . "compte.php" . "> Connexion </a>";
              else
                echo "<a class=" . "nav-link px-5" . " href=" . "page_compte.php" . ">" . $_SESSION['username'] . "</a>";
              ?>
              <a class="nav-link px-5" href="presentation.php">About us</a>
            </div>
          </div>
        </div>
      </nav>
    </div>

    <?php
    $sql = "SELECT * FROM items order by RAND() limit 3";
    //$sql = "SELECT * FROM items WHERE id_item=1";
    $result = mysqli_query($db_handle, $sql);
    $data = mysqli_fetch_assoc($result);
    $id = $data['id_item'];
    ?>


    <div class="container-fluid" id="section" style="height: 800px;">
      <div class="row">

        <center>
          <h1>Nos produits preféres</h1>
        </center>
        <div class="col-md-8 offset-md-2">
          <br><br>
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <?php
                $image = $data['photo1'];
                echo "<center> <a href=page_produit.php?id=$id> <img src='$image' name =" . "prod" . "class=" . "d-block w-100 " . "height=" . "800px" . " width=" . "1000px" . "> </a> </center>";
                ?>
              </div>
              <div class="carousel-item">
                <?php
                $data = mysqli_fetch_assoc($result);
                $id = $data['id_item'];
                $image = $data['photo1'];
                echo "<center> <a href=page_produit.php?id=$id> <img src='$image' name =" . "prod" . "class=" . "d-block w-100 " . "height=" . "800px" . " width=" . "1000px" . "> </a> </center>";
                ?>
              </div>
              <div class="carousel-item">
                <?php
                $data = mysqli_fetch_assoc($result);
                $id = $data['id_item'];
                $image = $data['photo1'];
                echo "<center> <a href=page_produit.php?id=$id> <img src='$image' name =" . "prod" . "class=" . "d-block w-100 " . "height=" . "800px" . " width=" . "1000px" . "> </a> </center>";
                ?>
              </div>
            </div>


            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev" style="color: pink;">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next" style="color: pink;">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>

        </div>

      </div>
    </div>


  </div>

  <div class="container-fluid" id="footer">
    <div class="container">
      <footer class="py-5">
        <div class="row">
          <div class="col-6 col-md-1 offset-md-1">
            <h5>Navigation</h5>
            <ul class="nav flex-column">
              <li class="nav-item mb-2"><a href="index.php" class="nav-link p-0 text-muted">Accueil</a></li>
              <li class="nav-item mb-2"><a href="parcourir.php" class="nav-link p-0 text-muted">Tout Parcourir</a></li>
              <li class="nav-item mb-2"><a href="notifications.php" class="nav-link p-0 text-muted">Notifications</a></li>
              <li class="nav-item mb-2"><a href="panier.php" class="nav-link p-0 text-muted">Panier</a></li>
              <li class="nav-item mb-2"><a href="compte.php" class="nav-link p-0 text-muted">Votre compte</a></li>
            </ul>
          </div>

          <div class="col-7 col-md-4 offset-md-2">
            <h5>Contact et reseaux sociaux</h5>
            <ul class="nav flex-column">
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Mail: agorafrancia.commerce@gmail.com</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Tél: 12 34 56 78 90</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Instagram</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Twitter</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Facebook</a></li>
            </ul>
          </div>

          <div class="col-md-4" id="map">
            <h5>Trouvez-nous en magasin!</h5>
            <iframe src="http://maps.google.com/maps?q=48.85115638469221,2.2861335791767474&z=15&output=embed" style="width:300px; height:300px;"></iframe>
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
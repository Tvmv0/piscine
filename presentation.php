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
              <a class="nav-link px-5" href="index.php">Accueil</a>
              <a class="nav-link px-5" href="parcourir.php">Tout Parcourir</a>
              <a class="nav-link px-5" href="notifications.php">Notifications</a>
              <a class="nav-link px-5" aria-current="visu_panier.php">About us</a>
              <?php
              if (!$_SESSION['username'])
                echo "<a class=" . "nav-link px-5" . " href=" . "connexion_client.php" . "> Connexion </a>";
              else
                echo "<a class=" . "nav-link px-5" . " href=" . "compte.php" . ">" . $_SESSION['username'] . "</a>";
              ?>
              <a class="nav-link px-5" aria-current="presentation.php" href="#">About us</a>
            </div>
          </div>
        </div>
      </nav>
    </div>


    <div class="container-fluid" id="section" style="height: 800px;">
    <div class="row">
        <div class="col-md-8 offset-md-2">
        <p id="text">
        Bienvenue sur Agora Francia, votre destination de choix pour vos achats en ligne. Chez Agora Francia, nous nous efforçons de vous offrir une expérience e-commerce exceptionnelle en proposant une large gamme de produits à portée de clic. Avec une sélection diversifiée couvrant des catégories telles que l'électronique, la mode, la décoration intérieure, la beauté et bien d'autres, nous sommes votre guichet unique pour tous vos besoins.
        <br>
        Chez Agora Francia, nous sommes fiers de vous offrir commodité, qualité et valeur. Notre site web convivial et notre interface intuitive facilitent la navigation et la recherche de produits. Nous sélectionnons soigneusement nos offres de produits, en veillant à ne proposer que les marques les plus fiables et réputées. Que vous recherchiez les derniers gadgets technologiques, des articles de mode tendance ou des produits essentiels au quotidien, Agora Francia a tout ce qu'il vous faut.
        <br>
        Nous comprenons l'importance d'une expérience d'achat fluide et sécurisée. C'est pourquoi nous accordons une priorité absolue à la confidentialité et à la sécurité de vos informations personnelles. Nos modes de paiement sont sûrs et fiables, vous offrant une tranquillité d'esprit lors de vos transactions. Nous proposons également des options d'expédition fiables, garantissant que vos achats arrivent chez vous en temps voulu.
        <br>
        Chez Agora Francia, nous accordons une grande valeur à nos clients. Notre équipe dévouée du service client est toujours prête à vous aider pour toute question ou préoccupation que vous pourriez avoir. Nous nous efforçons de fournir un service client exceptionnel, en plaçant votre satisfaction au sommet de nos priorités.
        <br>
        Découvrez la joie d'un shopping en ligne sans effort avec Agora Francia. Explorez notre vaste collection de produits, trouvez de bonnes affaires et profitez d'une expérience d'achat fluide depuis le confort de votre foyer. Rejoignez notre communauté grandissante de clients satisfaits et découvrez la commodité et l'excitation d'Agora Francia dès aujourd'hui !    
    </p>
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
            Ou est-ce notre magasin?
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
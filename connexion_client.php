<!--
                CODE FORMULAIRE CONNEXION CLIENT

SOURCES
  
    https://getbootstrap.com/docs/5.3/
    https://getbootstrap.com/docs/5.2/examples/footers/
  
    google maps: https://blog.hubspot.com/website/how-to-embed-google-map-in-html
    https://www.pierre-giraud.com/bootstrap-apprendre-cours/bouton/
  -->
<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Compte Agora Francia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="allstyles.css" type="text/css" rel="stylesheet">

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
                            <a class="nav-link active px-5" aria-current="page" href="index.php">Accueil</a>
                            <a class="nav-link px-5" href="parcourir.php">Tout Parcourir</a>
                            <a class="nav-link px-5" href="notifications.php">Notifications</a>
                            <a class="nav-link px-5" href="visu_panier.php">Panier</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>

        <div class="container-fluid" id="section">
            <center>
                <div class="container">
                    <div class="form-group">
                        <br>
                        <ul class="nav nav-underline">
                            <li class="nav-item">
                                <a class="nav-link" href="compte.php">Vendeur</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Acheteur</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Admin</a>
                            </li>
                        </ul>
                        <br>
                    </div>

                    <!-- Headings for the form -->
                    <div class="headingsContainer">
                        <h3>Connexion</h3>
                    </div>

                    <form action="co_client.php" method="post">
                        <!-- Main container for all inputs -->
                        <div class="mainContainer">
                            <!-- Username -->
                            <label for="mail">Identifiant</label>
                            <input type="text" placeholder="Entrez votre identifiant" name="mail" required>

                            <br><br>

                            <!-- Password -->
                            <label for="mdp">Mot de passe</label>
                            <input type="text" placeholder="Entrez votre mot de passe" name="mdp" required>

                            <p class="register">Vous n'avez pas de compte? <a href="nouveauclient.php">Inscrivez-vous!</a></p>

                            <!-- Submit button -->
                            <button type="submit" name="Connexion">Se connecter</button>
                        </div>
                    </form>
            </center>
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
                                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Mail:
                                        agorafrancia.commerce@gmail.com</a></li>
                                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Tél: 12 34 56 78 90</a></li>
                                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Instagram</a></li>
                                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Twitter</a></li>
                                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Facebook</a></li>
                            </ul>
                        </div>

                        <div class="col-md-4" id="map">
                            <strong>
                                <h5>Où sommes-nous situés?</h5>
                            </strong>
                            <iframe src="http://maps.google.com/maps?q=48.85115638469221,2.2861335791767474&z=15&output=embed" style="width:300px; height:300px;"></iframe>
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
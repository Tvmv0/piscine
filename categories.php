<?php
session_start();

//identifier BDD
$database = "piscine";

//connectez-vous dans BDD
$db_handle = mysqli_connect('localhost', 'root', 'root');
$db_found = mysqli_select_db($db_handle, $database);


if ($db_found) {
    if (isset($_POST["categorie1"])) {
        $sql = "SELECT * FROM items WHERE categorie = 1";
        $result = mysqli_query($db_handle, $sql);
    } else if (isset($_POST["categorie2"])) {
        $sql = "SELECT * FROM items WHERE categorie = 2";
        $result = mysqli_query($db_handle, $sql);
    } else if (isset($_POST["categorie3"])) {
        $sql = "SELECT * FROM items WHERE categorie = 3";
        $result = mysqli_query($db_handle, $sql);
    } else if (isset($_POST["encheres"])) {
        $sql = "SELECT * FROM items WHERE methode_vente = 1";
        $result = mysqli_query($db_handle, $sql);
    } else if (isset($_POST["negoc"])) {
        $sql = "SELECT * FROM items WHERE methode_vente = 2";
        $result = mysqli_query($db_handle, $sql);
    } else if (isset($_POST["immed"])) {
        $sql = "SELECT * FROM items WHERE methode_vente = 3";
        $result = mysqli_query($db_handle, $sql);
    } else {
        $sql = "SELECT * FROM items ";
        $result = mysqli_query($db_handle, $sql);
    }

    if (!($data = mysqli_fetch_assoc($result))) {
        echo "<p>Aucun article trouvé</p>";
    }
} else
    echo "db not found";

//fermer la connexion
mysqli_close($db_handle);
?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Parcourir Agora Francia</title>
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

            <center><img src="logo.png" alt="logo"></center>
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
                            <a class="nav-link px-5" href="page_notifications.php">Notifications</a>
                            <a class="nav-link px-5" href="visu_panier.php">Panier</a>
                            <?php
                            if (!$_SESSION['username'])
                                echo "<a class=" . "nav-link px-5" . " href=" . "connexion_client.php" . "> Connexion </a>";
                            else
                                echo "<a class=" . "nav-link px-5" . " href=" . "compte.php" . ">" . $_SESSION['username'] . "</a>";
                            ?>
                        </div>
                    </div>
                </div>
            </nav>
        </div>

        <div class="container-fluid" id="section" style="margin-top: 50px;">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-2 offset-md-1">
                        <form action="categories.php" method="post">
                            <div class="form-group">
                                <h4>Catégorie produit</h4>
                                <div class="form-check">
                                    <button type="submit" name="categorie1" class="btn btn-sm">Articles rares</button>
                                </div>
                                <div class="form-check">
                                    <button type="submit" name="categorie2" class="btn btn-sm">Articles Haut de gamme</button>
                                </div>
                                <div class="form-check">
                                    <button type="submit" name="categorie3" class="btn btn-sm">Articles réguliers</button>
                                </div>

                                <h4>Catégorie vente</h4>
                                <div class="form-check">
                                    <button type="submit" name="encheres" class="btn btn-sm">Achat immédiat</button>
                                </div>
                                <div class="form-check">
                                    <button type="submit" name="negoc" class="btn btn-sm">Transaction vendeur-client</button>
                                </div>
                                <div class="form-check">
                                    <button type="submit" name="immed" class="btn btn-sm">Meilleure offre</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-8">
                        <?php

                        echo "<div class='row'>";

                        echo " <div class=" . "col-md-4" . ">";
                        echo "<div class = card>";
                        $image = $data['photo1'];

                        $id = $data['id_item'];
                        echo "<center> <a href=page_produit.php?id=$id><img src='$image' name =" . "prod" . " height='200' width='200'> </a> </center>";

                        echo "<h4>" . $data['nom_obj'] . "</h4>";
                        echo "<h5>" . $data['prix'] . "€ </h5>";
                        //echo "<center> <a href=ajout_pan.php?id=$id><img src='ajout_pan.jpg' name =" . "prod" . " height='50' width='170'> </a> </center>";
                        //echo "<p><button id=notif>Notification</button></p>";
                        echo "</div>";
                        echo "</div>";

                        while ($data = mysqli_fetch_assoc($result)) {
                            echo " <div class=" . "col-md-4" . ">";
                            echo "<div class = card>";
                            $image = $data['photo1'];

                            $id = $data['id_item'];
                            echo "<center> <a href=page_produit.php?id=$id><img src='$image' name =" . "prod" . " height='200' width='200'> </a> </center>";

                            echo "<h4>" . $data['nom_obj'] . "</h4>";
                            echo "<h5>" . $data['prix'] . "€ </h5>";
                            //echo "<center> <a href=ajout_pan.php?id=$id><img src='ajout_pan.jpg' name =" . "prod" . " height='50' width='170'> </a> </center>";
                            //echo "<center> <a href=notifications.php?id=$id><img src='notif.jpg' name =" . "prod" . " height='50' width='170'> </a> </center>";
                            echo "<br><br>";
                            echo "</div>";
                            echo "</div>";
                        }
                        echo "</div>";
                        echo "</div>";
                        ?>
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
                                <li class="nav-item mb-2"><a href="index.html" class="nav-link p-0 text-muted">Accueil</a></li>
                                <li class="nav-item mb-2"><a href="parcourir.php" class="nav-link p-0 text-muted">Tout Parcourir</a></li>
                                <li class="nav-item mb-2"><a href="page_notifications.php" class="nav-link p-0 text-muted">Notifications</a></li>
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
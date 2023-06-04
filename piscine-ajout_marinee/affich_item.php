<?php
session_start();
/*********************
 *              CODE AFFICHER TOUS LES ARTICLES D'UN VENDEUR
 * ********************* */

//identifier BDD
$database = "piscine";
$db_handle = mysqli_connect('localhost', 'root', 'root');
$db_found = mysqli_select_db($db_handle, $database);

$id_vendeur = 1;

?>

<!DOCTYPE html>
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

        <div id="navigation" class="container-fluid" style="margin-top: 20px;">
            <nav class="navbar navbar-expand-lg bg-body-tertiary mx-auto">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav mx-auto">
                            <a class="nav-link active px-5" aria-current="page" href="index.html">Accueil</a>
                            <a class="nav-link px-5" href="parcourir.php">Tout Parcourir</a>
                            <a class="nav-link px-5" href="notifications.html">Notifications</a>
                            <a class="nav-link px-5" href="panier.html">Panier</a>
                            <a class="nav-link px-5" href="compte.html">Votre compte</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>


        <?php
        if ($db_found) {
            //on regarde si le vendeur vend des objets
            $sql = "SELECT* FROM items WHERE id_vendeur=$id_vendeur";
            $result = mysqli_query($db_handle, $sql);

            if (($data = mysqli_fetch_assoc($result) == 0)) {
                echo "<p>Vous ne proposez aucun article </p>";
                //rediréction vers la page ajout produit
                echo "<p>Souhaitez-vous ajouter un nouvel article ? </p>";
                echo '<form method="post" action="add_item.php">';
                echo '<button type="submit">Ajouter</button>';
                echo '</form>';
            } else {
                //on affiche tous les articles du vendeur 
                $sql = "SELECT* FROM items WHERE id_vendeur=$id_vendeur";
                $result = mysqli_query($db_handle, $sql);

                echo "<h2>" . "Voici les articles :" . "</h2>";
                echo "<table border='1'>";
                echo "<tr>";
                echo "<th>" . "nom_obj" . "</th>";
                echo "<th>" . "photo" . "</th>";
                echo "<th>" . "Prix" . "</th>";
                //afficher le resultat

                while ($data = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $data['nom_obj'] . "</td>";
                    //echo "<td>" . $data['photo1'] . "</td>";
                    $image = $data['photo1'];
                    echo "<td>" . "<img src='$image' height='150' width='150'>" . "</td>";
                    echo "<td>" . $data['prix'] . "</td>";

                    echo "</tr>";
                }
                echo "</table>";
            }
        } else {
            echo "<p> database not found</p>";
        }

        mysqli_close($db_handle);
        ?>
        <div class="container-fluid" id="footer">
            <div class="container">
                <footer class="py-5">
                    <div class="row">
                        <div class="col-6 col-md-1 offset-md-1">
                            <h5>Navigation</h5>
                            <ul class="nav flex-column">
                                <li class="nav-item mb-2"><a href="index.html" class="nav-link p-0 text-muted">Accueil</a></li>
                                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Tout Parcourir</a></li>
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
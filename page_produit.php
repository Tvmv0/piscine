<?php
session_start();

$database = "piscine";

//connectez-vous dans BDD
$db_handle = mysqli_connect('localhost', 'root', 'root');
$db_found = mysqli_select_db($db_handle, $database);
$id = $_GET['id'];

$sql = "SELECT * FROM `items` WHERE id_item = $id";
$result = mysqli_query($db_handle, $sql);
$data = mysqli_fetch_assoc($result);
?>

<!--
  SOURCES

  https://getbootstrap.com/docs/5.3/
  https://getbootstrap.com/docs/5.2/examples/footers/

  google maps: https://blog.hubspot.com/website/how-to-embed-google-map-in-html
  https://www.pierre-giraud.com/bootstrap-apprendre-cours/bouton/
  https://www.w3schools.com/howto/howto_css_product_card.asp
-->


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
                            <a class="nav-link active px-5" aria-current="page" href="index.php">Accueil</a>
                            <a class="nav-link px-5" href="parcourir.php">Tout Parcourir</a>
                            <a class="nav-link px-5" href="notifications.html">Notifications</a>
                            <a class="nav-link px-5" href="visu_panier.php">Panier</a>
                            <?php
                            if (!$_SESSION['user'])
                                echo "<a class=" . "nav-link px-5" . " href=" . "connexion_client.php" . "> Connexion </a>";
                            else
                                echo "<a class=" . "nav-link px-5" . " href=" . "compte.php" . ">" . $_SESSION['user'] . "</a>";
                            ?>
                        </div>
                    </div>
                </div>
            </nav>
        </div>

        <div class="container-fluid" id="section" style="margin-top: 50px;">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-4 offset-md-2">
                        <div class="row">
                            <?php
                            echo " <div class=" . "col-md-4" . ">";
                            echo "<div class = card>";
                            $image = $data['photo1'];

                            $id = $data['id_item'];
                            echo "<center> <img src='$image' id=img_page_produit name =" . "prod" . "height=" . '500' . "width=" . '500' . ">  </center>";

                            echo "</div>";
                            echo "</div>";

                            mysqli_close($db_handle);
                            ?>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <h3>Description produit</h3>

                        <br>

                        <?php
                        echo " <h3>" . $data['nom_obj'] . "</h3>";
                        echo $data['descriptio'];
                        ?>

                        <br><br>

                        <?php
                        echo " <h5>" . $data['prix'] . "€ </h5>";
                        ?>

                        <br>

                        <?php
                        echo " <a href=ajout_pan.php?id=$id><img src='ajout_pan.jpg' name=" . "prod" . " height='50' width='170'> </a> ";
                        ?>
                         
                        <p><button id=notif>Notification</button></p>

                        <br>

                        <h4>
                            Vendu par

                            <?php
                            $id_vendeur = $data['id_vendeur'];
                            $database = "piscine";

                            //connectez-vous dans BDD
                            $db_handle = mysqli_connect('localhost', 'root', 'root');
                            $db_found = mysqli_select_db($db_handle, $database);

                            $sql = "SELECT * FROM items,vendeur WHERE items.id_vendeur = $id_vendeur AND vendeur.id_vendeur = items.id_vendeur";
                            $result = mysqli_query($db_handle, $sql);
                            $data2 = mysqli_fetch_assoc($result);

                            echo $data2['pseudo'];

                            mysqli_close($db_handle);
                            ?>
                        </h4>
                    </div>
                </div>
            </div>
        </div>


        <div class=" container-fluid" id="footer">
                                <div class="container">
                                    <footer class="py-5">
                                        <div class="row">
                                            <div class="col-6 col-md-1 offset-md-1">
                                                <h5>Navigation</h5>
                                                <ul class="nav flex-column">
                                                    <li class="nav-item mb-2"><a href="index.html" class="nav-link p-0 text-muted">Accueil</a></li>
                                                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Tout Parcourir</a></li>
                                                    <li class="nav-item mb-2"><a href="notifications.php" class="nav-link p-0 text-muted">Notifications</a></li>
                                                    <li class="nav-item mb-2"><a href="visu_panier.php" class="nav-link p-0 text-muted">Panier</a></li>
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
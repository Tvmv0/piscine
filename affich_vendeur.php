<?php

/*******************
 *          CODE POUR AFFICHER TOUS LES VENDEURS 
 *              CODE FONCTIONNEL
 * ********************** */
//session_start();

$database = "piscine";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

$sql = "SELECT * FROM vendeur ";

$result = mysqli_query($db_handle, $sql);
$data = mysqli_fetch_assoc($result);

if ($data = mysqli_fetch_assoc($result) == 0) {
    echo "<p>il n'y a pas de vendeur</p>";
} else {

    $sql = "SELECT * FROM vendeur ";

    $result = mysqli_query($db_handle, $sql);
    $data = mysqli_fetch_assoc($result);

    echo " <div class=" . "col-md-4" . ">";
    echo "<div class = card>";
    $image = $data['photo_vendeur'];

    $id = $data['id_vendeur'];
    echo "<center> <a href=suppVend.php?id=$id><img src='$image' name =" . "prod" . " height='200' width='200'> </a> </center>";

    echo "<h4>" . $data['pseudo'] . "</h4>";
    echo "</div>";
    echo "</div>";

    while ($data = mysqli_fetch_assoc($result)) {
        echo " <div class=" . "col-md-4" . ">";
        echo "<div class = card>";
        $image = $data['photo_vendeur'];

        $id = $data['id_vendeur'];
        echo "<center> <a href=suppVend.php?id=$id><img src='$image' name =" . "prod" . " height='200' width='200'> </a> </center>";

        echo "<h4>" . $data['pseudo'] . "</h4>";
        echo "</div>";
        echo "</div>";
    }
    echo "</div>";
}
mysqli_close($db_handle);
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Parcourir Agora Francia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link href="allstyles.css" type="text/css" rel="stylesheet">

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
                            <a class="nav-link px-5" href="#">Tout Parcourir</a>
                            <a class="nav-link px-5" href="notifications.html">Notifications</a>
                            <a class="nav-link px-5" href="affich_vendeur.php">Panier</a>
                            <a class="nav-link px-5" href="compte.html">Votre compte</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
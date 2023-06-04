<?php
session_start();
$_SESSION['username'] = "";
$_SESSION['userid'] = "";
/****************
 *                  CODE INSCRIPTION NOUVEAU CLIENT
 *                      CELUI CI C'EST LE BON 
 * **************** */

//declaration des variables     pour acheteur

$nom = isset($_POST["nom"]) ? $_POST["nom"] : "";
$prenom = isset($_POST["prenom"]) ? $_POST["prenom"] : "";
$mail = isset($_POST["mail"]) ? $_POST["mail"] : "";
$mdp = isset($_POST["mdp"]) ? $_POST["mdp"] : "";

//pour info paiement
$num_rue = isset($_POST["num_rue"]) ? $_POST["num_rue"] : "";
$nom_rue = isset($_POST["nom_rue"]) ? $_POST["nom_rue"] : "";
$code_postal = isset($_POST["code_postal"]) ? $_POST["code_postal"] : "";
$ville = isset($_POST["ville"]) ? $_POST["ville"] : "";
$pays = isset($_POST["pays"]) ? $_POST["pays"] : "";
$num_carte = isset($_POST["num_carte"]) ? $_POST["num_carte"] : "";
$date_exp = isset($_POST["date_exp"]) ? $_POST["date_exp"] : "";
$cvv = isset($_POST["cvv"]) ? $_POST["cvv"] : "";


//identifier BDD
$database = "piscine";

//connectez-vous dans BDD
$db_handle = mysqli_connect('localhost', 'root', 'root');
$db_found = mysqli_select_db($db_handle, $database);

if ($db_found) {
    if (($nom != "") && ($prenom != "")) {
        $sql = "SELECT * FROM acheteur WHERE nom_acheteur LIKE '%$nom%' AND prenom_acheteur LIKE '%$prenom%'";

        $result = mysqli_query($db_handle, $sql);
        //regarder s'il y a des resultats
        if ((mysqli_num_rows($result) != 0)) {
        } else {
            //le client n'existe pas donc on l'ajoute dans la base de donnée
            $sql = "INSERT INTO acheteur(nom_acheteur,prenom_acheteur,mail_acheteur,mdp_acheteur) 
                           VALUES('$nom', '$prenom', '$mail','$mdp')";
            $result = mysqli_query($db_handle, $sql);

            //il faut récupérer l'ID du client
            $id_client = mysqli_insert_id($db_handle);
            //------------------------------------------------------------------ajout dans INFO_PAIEMENT
            $sql = "INSERT INTO info_paiement(id_acheteur,num_rue,nom_rue,code_postal,ville,pays,num_carte,date_exp,cvv) 
                                       VALUES('$id_client', '$num_rue', '$nom_rue','$code_postal', '$ville', '$pays','$num_carte','$date_exp','$cvv')";

            $result = mysqli_query($db_handle, $sql);

            //SELECT * FROM `acheteur` WHERE id_acheteur = 2;
            $sql = "SELECT * FROM `acheteur` WHERE id_acheteur = $id_client;";
            $result = mysqli_query($db_handle, $sql);
            $data = mysqli_fetch_assoc($result);

            $sql = "SELECT * FROM acheteur,info_paiement WHERE acheteur.id_acheteur = $id_client AND info_paiement.id_acheteur = acheteur.id_acheteur";
            $result = mysqli_query($db_handle, $sql);
            $data2 = mysqli_fetch_assoc($result);
            
        }
    } else {
        echo "<p>NON bAH ERREUR </p>";
    }
} else {
    echo "<p> database not found</p>";
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
                            <a class="nav-link px-5" href="panier.html">Panier</a>
                            <a class="nav-link px-5" href="compte.html">Votre compte</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>

        <div class="container-fluid" id="section" style="margin-top: 50px;">
            <div class="container-fluid">
                <div class="row">

                        <center> <h1>Bienvenue!</h1> </center>
                        <br>

                            <?php
                            echo "<center> ". "Nom:" .$data['nom_acheteur'] . " " . "</center>";
                            echo "<center> ". "Prénom:".$data['prenom_acheteur'] . "</center>";
                            echo "<br>";
                            echo "<center> ". "Mail:" . $data['mail_acheteur'] . "</center>";

                            echo "<br><br>";
                            echo " <center> <h2>Adresse de paiement</h2> </center> ";

                            echo "<center> " . "Adresse:".$data2['num_rue'] . ", " . $data2['nom_rue'] . "</center>";
                            echo "<br>";
                            echo "<center> ". "Ville: " . $data2['ville'] . "</center>";
                            echo "<br>";
                            echo "<center> ". "Pays: " . $data2['pays'] . "</center>";
                            echo "<br>";
                            echo "<center> ". "Code postal: " . $data2['code_postal'] . "</center>";

                            $_SESSION['username'] = $data['nom_acheteur'];
                            $_SESSION['userid'] = $data['id_acheteur'];
                            
                            mysqli_close($db_handle);
                            ?>
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
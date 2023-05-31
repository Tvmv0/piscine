<?php

//declaration des variables
$mail = isset($_POST["mail"]) ? $_POST["mail"] : "";
$mdp = isset($_POST["mdp"]) ? $_POST["mdp"] : "";


//identifier BDD
$database = "piscine";

echo '<meta charset="utf-8">';
echo '<link rel="stylesheet" type="text/css" href="allstyles2.css">';

//connectez-vous dans BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

//si le bouton validé est cliqué
if (isset($_POST["Connexion"])) {
    if ($db_found) {
        //on cherche le client
        if (($mail != "") && ($mdp != "")) {
            $sql = "SELECT * FROM acheteur WHERE mail_acheteur LIKE '%$mail%' AND mdp_acheteur LIKE '%$mdp%'";
        }

        $result = mysqli_query($db_handle, $sql);
        if ((mysqli_num_rows($result) == 0)) {
            echo "<p>Le compte n'existe pas.</p>";
        } else {

            $result = mysqli_query($db_handle, $sql);
            echo "<h2>" . "Vous êtes connecté :" . "</h2>";
            echo "<table border='1'>";
            echo "<tr>";
            echo "<th>" . "ID" . "</th>";
            echo "<th>" . "Nom" . "</th>";
            echo "<th>" . "Prenom" . "</th>";
            echo "<th>" . "mail" . "</th>";
            //afficher le resultat


            while ($data = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $data['id_acheteur'] . "</td>";
                echo "<td>" . $data['nom_acheteur'] . "</td>";
                echo "<td>" . $data['prenom_acheteur'] . "</td>";
                echo "<td>" . $data['mail_acheteur'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
    } else {
        echo "<p>Database not found.</p>";
    }
}

//fermer la connexion
mysqli_close($db_handle);

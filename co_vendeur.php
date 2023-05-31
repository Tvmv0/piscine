<?php

//declaration des variables
$mail = isset($_POST["mail"]) ? $_POST["mail"] : "";
$username = isset($_POST["username"]) ? $_POST["username"] : "";

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
        if (($username != "") && ($mail != "")) {
            $sql = "SELECT * FROM vendeur WHERE pseudo LIKE '%$username%' AND mail_vendeur LIKE '%$mail%'";
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
            echo "<th>" . "Pseudo" . "</th>";
            echo "<th>" . "Mail" . "</th>";
            //afficher le resultat

            while ($data = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $data['id_vendeur'] . "</td>";
                echo "<td>" . $data['pseudo'] . "</td>";
                echo "<td>" . $data['mail_vendeur'] . "</td>";
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

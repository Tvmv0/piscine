<?php

/****************
 *                  CODE INSCRIPTION NOUVEAU VENDEUR
 *                      CODE FONCTIONNEL
 * **************** */

//declaration des variables     pour acheteur
$pseudo = isset($_POST["pseudo"]) ? $_POST["pseudo"] : "";
$mail_vendeur = isset($_POST["mail_vendeur"]) ? $_POST["mail_vendeur"] : "";
$photo_vendeur = isset($_POST["photo_vendeur"]) ? $_POST["photo_vendeur"] : "";
$banniere_vendeur = isset($_POST["banniere_vendeur"]) ? $_POST["banniere_vendeur"] : "";


//identifier BDD
$database = "piscine";

//connectez-vous dans BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

if ($db_found) {
    if (($pseudo != "") && ($mail_vendeur != "")) {
        $sql = "SELECT * FROM vendeur WHERE pseudo LIKE '%$pseudo%' AND mail_vendeur LIKE '%$mail_vendeur%'";

        $result = mysqli_query($db_handle, $sql);
        //regarder s'il y a des resultats
        if ((mysqli_num_rows($result) != 0)) {
        } else {
            //le Vendeur n'existe pas donc on l'ajoute dans la base de donnée
            $sql = "INSERT INTO vendeur(pseudo,mail_vendeur,photo_vendeur,banniere_vendeur)
                    VALUES('$pseudo','$mail_vendeur','$photo_vendeur','$banniere_vendeur')";
            $result = mysqli_query($db_handle, $sql);


            //********************      POUR AFFICHER TOUS LES vendeurs          ************************* */
            $sql = "SELECT * FROM vendeur";
            $result = mysqli_query($db_handle, $sql);
            echo "<table border='1'>";
            echo "<tr>";
            echo "<th>" . "ID" . "</th>";
            echo "<th>" . "pseudo" . "</th>";
            echo "<th>" . "photo" . "</th>";
            //afficher le resultat
            while ($data = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $data['id_vendeur'] . "</td>";
                echo "<td>" . $data['pseudo'] . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        }
    } else {
        echo "<p>NON bAH ERREUR </p>";
    }
} else {
    echo "<p> database not found</p>";
}

mysqli_close($db_handle);

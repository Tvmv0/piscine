<?php

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
$db_handle = mysqli_connect('localhost', 'root', '');
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

            //********************      POUR AFFICHER TOUS LES CLIENTS          ************************* */
            $sql = "SELECT * FROM acheteur";
            $result = mysqli_query($db_handle, $sql);
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

            //----------POUR AFFICHER LA TABLE info_paiement
            $sql = "SELECT * FROM info_paiement";
            $result = mysqli_query($db_handle, $sql);
            echo "<h2>" . "Informations sur le nouveau client :" . "</h2>";
            echo "<table border='1'>";
            echo "<tr>";
            echo "<th>" . "ID" . "</th>";
            echo "<th>" . "Nom rue" . "</th>";
            echo "<th>" . "num carte" . "</th>";
            //afficher le resultat

            while ($data = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $data['id_acheteur'] . "</td>";
                echo "<td>" . $data['nom_rue'] . "</td>";
                echo "<td>" . $data['num_carte'] . "</td>";
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

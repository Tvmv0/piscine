<?php

//declaration des variables     pour client
$nom = isset($_POST["nom"]) ? $_POST["nom"] : "";
$prenom = isset($_POST["prenom"]) ? $_POST["prenom"] : "";
$mail = isset($_POST["mail"]) ? $_POST["mail"] : "";
$mdp = isset($_POST["mdp"]) ? $_POST["mdp"] : "";

//pour infor paiement
$num_rue = isset($_POST["num_rue"]) ? $_POST["num_rue"] : "";
$nom_rue = isset($_POST["nom_rue"]) ? $_POST["nom_rue"] : "";
$code_postal = isset($_POST["code_postal"]) ? $_POST["code_postal"] : "";
$ville = isset($_POST["ville"]) ? $_POST["ville"] : "";
$pays = isset($_POST["pays"]) ? $_POST["pays"] : "";
$num_carte = isset($_POST["num_carte"]) ? $_POST["num_carte"] : "";
$num_cache = isset($_POST["num_cache"]) ? $_POST["num_cache"] : "";


//identifier BDD
$database = "piscine";

//connectez-vous dans BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

//si le bouton validé est cliqué
if (isset($_POST["Valider"])) {
    if ($db_found) {
        //on cherche le client avce son nom et prenom

        if (($nom != "") && ($prenom != "")) {
            $sql = "SELECT * FROM acheteur WHERE nom_acheteur LIKE '%$nom%' AND prenom_acheteur LIKE '%$prenom%'";
        }

        $result = mysqli_query($db_handle, $sql);
        //regarder s'il y a de resultat
        if ((mysqli_num_rows($result) != 0)) {
            echo "<p>Le client existe deja.</p>";
        } else {
            //on ajoute le client
            $sql = "INSERT INTO acheteur(nom_acheteur,prenom_acheteur,mail_acheteur,mdp_acheteur) 
                           VALUES('$nom', '$prenom', '$mail','$mdp')";
            $result = mysqli_query($db_handle, $sql);
            echo "<p>ajout réussi.</p>";

            //il faut récupérer l'ID du client
            $id_client = mysqli_insert_id($db_handle);
            $sql = "INSERT INTO info_paiement(id_acheteur,num_rue,nom_rue,code_postal,ville,pays,num_carte,num_cache) 
                           VALUES('$id_client', '$num_rue', '$nom_rue','$code_postal', '$ville', '$pays','$num_carte','$num_cache')";

            $result = mysqli_query($db_handle, $sql);

            //on affiche le nouveau client
            echo "<td>" . $nom . "</td>";
            echo "<td>" . $prenom . "</td>";
            echo "<td>" . $mail . "</td>";
            echo "<td>" . $mdp . "</td>";

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
        echo "<p>Database not found.</p>";
    }
}

//fermer la connexion
mysqli_close($db_handle);

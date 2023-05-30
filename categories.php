<?php

//identifier BDD
$database = "piscine";

//connectez-vous dans BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);


if ($db_found) {
    if (isset($_POST["toutC"])) {
        $sql = "SELECT * FROM items ";
        $result = mysqli_query($db_handle, $sql);
    } else if (isset($_POST["categorie1"])) {
        $sql = "SELECT * FROM items WHERE categorie = 1";
        $result = mysqli_query($db_handle, $sql);
    } else if (isset($_POST["categorie2"])) {
        $sql = "SELECT * FROM items WHERE categorie = 2";
        $result = mysqli_query($db_handle, $sql);
    } else if (isset($_POST["categorie3"])) {
        $sql = "SELECT * FROM items WHERE categorie = 3";
        $result = mysqli_query($db_handle, $sql);

        //selon les types de vente    
    } else if (isset($_POST["toutV"])) {
        $sql = "SELECT * FROM items ";
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
    }

    if (!($data = mysqli_fetch_assoc($result))) {
        echo "<p>Aucun article trouvé</p>";
    } else {
        echo "<h1>Les items disponibles : </h1>";
        echo "<table border=\"1\">";
        echo "<tr>";
        echo "<th>" . "nom_obj" . "</th>";
        echo "<th>" . "photo1" . "</th>";
        echo "<th>" . "prix" . "</th>";
        echo "</tr>";

        echo "<tr>";
        echo "<td>" . $data['nom_obj'] . "</td>";
        echo "<td>" . $data['photo1'] . "</td>";
        echo "<td>" . $data['prix'] . "</td>";
        echo "</tr>";

        while ($data = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $data['nom_obj'] . "</td>";
            echo "<td>" . $data['photo1'] . "</td>";
            echo "<td>" . $data['prix'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
}

//fermer la connexion
mysqli_close($db_handle);

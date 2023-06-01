<?php

/***************
 *                  CODE POUR AJOUTER UN ARTICLE AU PANIER
 *                  CODE FONCTIONNEL
 * *************** */

//identifier BDD
$database = "piscine";

echo '<meta charset="utf-8">';
echo '<link rel="stylesheet" type="text/css" href="panier.css">';


//connectez-vous dans BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

$id_client = 3;
$id_article = 1;

if ($db_found) {
    //echo "<p>on entre dans la DB</p>";
    //echo "<p> on essaie</p>";
    $sql = "SELECT * FROM panier p
            INNER JOIN acheteur a ON a.id_acheteur = p.id_acheteur
            INNER JOIN items i ON i.id_item = p.id_item
            WHERE i.id_item = $id_article AND a.id_acheteur = $id_client";
    $result = mysqli_query($db_handle, $sql);

    if (($data = mysqli_fetch_assoc($result) != 0)) {
        echo "<p>l' article est deja dans le panier </p>";
    } else {
        echo "<p> on va ajouter l'article dans le panier</p>";
        $sql = "INSERT INTO panier(id_item,id_acheteur) VALUES ('$id_article','$id_client')";
        $result = mysqli_query($db_handle, $sql);

        echo "<h1>voici le panier total : </h1>";
        //echo "<h1>Les items disponibles : </h1>";
        echo "<table border=\"1\">";
        echo "<tr>";
        echo "<th>" . "id_panier" . "</th>";
        echo "<th>" . "id_item" . "</th>";
        echo "<th>" . "id_acheteur" . "</th>";
        echo "</tr>";

        $sql = "SELECT * FROM panier";
        $result = mysqli_query($db_handle, $sql);
        /*echo "<tr>";
        echo "<td>" . $data['id_panier'] . "</td>";
        echo "<td>" . $data['id_item'] . "</td>";
        echo "<td>" . $data['id_acheteur'] . "</td>";
        echo "</tr>";*/

        while ($data = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $data['id_panier'] . "</td>";
            echo "<td>" . $data['id_item'] . "</td>";
            echo "<td>" . $data['id_acheteur'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
} else {
    echo "<p> database not found</p>";
}

//on ferme la connexion
mysqli_close($db_handle);

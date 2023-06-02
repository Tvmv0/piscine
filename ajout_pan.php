<?php

/***************
 *                  CODE POUR AJOUTER UN ARTICLE AU PANIER     BLINDAGE ID_item + vente immédiate
 *                  CODE FONCTIONNEL
 * *************** */

//identifier BDD
session_start();
$database = "piscine";

echo '<meta charset="utf-8">';
echo '<link rel="stylesheet" type="text/css" href="panier.css">';


//connectez-vous dans BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
$id = $_GET['id'];

$sql = "SELECT * FROM items WHERE id_item = $id";
$result = mysqli_query($db_handle, $sql);
$id_client = 1;

if ($db_found) {
    //echo "<p> on essaie</p>";
    //on regarde si l'article est dans le panier 
    $sql = "SELECT * FROM panier p
    INNER JOIN acheteur a ON a.id_acheteur = p.id_acheteur
    INNER JOIN items i ON i.id_item = p.id_item
    WHERE i.id_item = $id AND a.id_acheteur = $id_client";
    $result = mysqli_query($db_handle, $sql);

    if (($data = mysqli_fetch_assoc($result) != 0)) {
        echo "<p>l' article est deja dans le panier </p>";
    } else {
        //on regarde si c'est vente imédiate 
        $sql = "SELECT * FROM items WHERE methode_vente ='3' AND id_item=$id";
        $result = mysqli_query($db_handle, $sql);
        if (($data = mysqli_fetch_assoc($result) == 0)) {
            echo "<p> l'article n'est pas en vente immédiate</p>";
        } else {
            //on ajoute au panier
            //echo "<p> on va ajouter l'article dans le panier</p>";
            $sql = "INSERT INTO panier(id_item,id_acheteur) VALUES ('$id','$id_client')";
            $result = mysqli_query($db_handle, $sql);
            echo "<p> L'article vient d'être ajouté</p>";
            //on lui propose d'afficher son panier



            echo "<p>Souhaitez-vous voir votre panier ? </p>";
            echo '<form method="post" action="visu_panier.php">';
            echo '<button type="submit">Voir</button>';
            echo '</form>';
        }
    }
} else {
    echo "<p> database not found</p>";
}

//on ferme la connexion
mysqli_close($db_handle);

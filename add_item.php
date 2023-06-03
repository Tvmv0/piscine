<?php

/****************
 *                  CODE AJOUT PRODUIT              code qui suit nv_item.php
 *                      CODE FONCTIONNEL
 * **************** */

//declaration des variables     pour l'article
$nom_obj = isset($_POST["nom_obj"]) ? $_POST["nom_obj"] : "";
$photo1 = isset($_POST["photo1"]) ? $_POST["photo1"] : "";
$photo2 = isset($_POST["photo2"]) ? $_POST["photo2"] : "";
$photo3 = isset($_POST["photo3"]) ? $_POST["photo3"] : "";
$photo4 = isset($_POST["photo4"]) ? $_POST["photo4"] : "";
$descriptio = isset($_POST["descriptio"]) ? $_POST["descriptio"] : "";
$prix = isset($_POST["prix"]) ? $_POST["prix"] : "";
$methode_vente = isset($_POST["methode_vente"]) ? $_POST["methode_vente"] : "";
$categorie = isset($_POST["categorie"]) ? $_POST["categorie"] : "";
$stock = isset($_POST["stock"]) ? $_POST["stock"] : "";


//identifier BDD
$database = "piscine";
$id_vendeur = 4;
//connectez-vous dans BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

if ($db_found) {
    //plusieurs articles peuvent avoir le même nom donc pas de blindages
    $sql = "INSERT INTO items(nom_obj,photo1,photo2,photo3,photo4,descriptio,prix,methode_vente,id_vendeur,categorie,stock) 
            VALUES('$nom_obj','$photo1','$photo2','$photo3','$photo4','$descriptio','$prix','$methode_vente','$id_vendeur','$categorie','$stock')";

    $result = mysqli_query($db_handle, $sql);
    // Récupération de l'ID généré
    $id = mysqli_insert_id($db_handle);
    echo "<p>afficher la page produit : </p>";
    echo $id;
    echo "<center> <a href=page_produit.php?id=$id><img src='ajout_pan.jpg' name =" . "prod" . " height='50' width='170'> </a> </center>";


    echo "<p>Souhaitez-vous Afficher tous vos articles ? </p>";
    echo '<form method="post" action="affich_item.php">';
    echo '<button type="submit">afficher</button>';
    echo '</form>';


} else {
    echo "<p> database not found</p>";
}

mysqli_close($db_handle);

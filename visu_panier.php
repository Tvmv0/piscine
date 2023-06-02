<?php

/********************

        CODE POUR VISUALISER LES ARTICLES DANS LE PANIER
                            +
        BLINDAGE SI UTILISATEUR EST CLIENT OU VENDEUR


 *******************/
//identifier BDD
$database = "piscine";

//pour l'affichage CSS
echo '<meta charset="utf-8">';
echo '<link rel="stylesheet" type="text/css" href="panier.css">';

//connectez-vous dans BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);



//session du client
$client_co = 'nom3';
//mettre un blindage si personne n'est connecté

if ($db_found) {

    //il faut regarder si l'utilisateur est client ou vendeur 
    $sql = "SELECT * FROM acheteur WHERE nom_acheteur LIKE '%$client_co%' ";
    $result = mysqli_query($db_handle, $sql);
    //si vendeur 
    if (($data = mysqli_fetch_assoc($result) != 0)) {
        // on regarde si l'acheteur a des articles dans son panier
        $sql = "SELECT * FROM panier p 
        INNER JOIN acheteur a 
        ON a.id_acheteur = p.id_acheteur
        AND a.nom_acheteur LIKE '%$client_co%' ";
        //$sql = "SELECT * FROM items i INNER JOIN panier p ON i.id_item = p.id_item AND p.id_acheteur = '$client_co' ";
        $result = mysqli_query($db_handle, $sql);


        if (($data = mysqli_fetch_assoc($result) == 0)) {
            echo "<p>Votre panier est vide</p>";
            //on peut mettre un lien pour le rediriger vers "TOUT PARCOURIR"
        } else {
            echo "<h1>Les items disponibles : </h1>";
            echo "<table border=\"1\">";
            echo "<tr>";
            echo "<th>" . "nom_obj" . "</th>";
            echo "<th>" . "prix" . "</th>";
            echo "<th>" . "photo" . "</th>";
            echo "</tr>";

            //on affiche les articles du client
            $sql = "SELECT * FROM items i 
            INNER JOIN panier p 
            ON i.id_item=p.id_item
            INNER JOIN acheteur a 
            ON a.id_acheteur = p.id_acheteur
            WHERE a.nom_acheteur LIKE 'nom3'";
            $result = mysqli_query($db_handle, $sql);


            while ($data = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $data['nom_obj'] . "</td>";
                echo "<td>" . $data['prix'] . "</td>";
                $image = $data['photo1'];
                echo "<td>" . "<img src='$image' height='60' width='80'>" . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
    } else {
        echo "<p> Vous n'etes pas un client</p>";
        // on regarde s'il est vendeur 
        $sql = "SELECT * FROM vendeur WHERE pseudo LIKE '%$client_co%'";
        $result = mysqli_query($db_handle, $sql);

        if (($data = mysqli_fetch_assoc($result) != 0)) {
            //il est vendeur donc on lui propose d'ajouter des articles à la vente
            echo "<p>Voulez-vous ajouter des items ? ";
            echo '<form method="POST" action="ajout_item.php">';
            echo "<p><button id=ajout_item>Ajouter </button></p>";
            echo '</form>';
        } else {
            echo "<p>erreur</p>";
        }
    }
}

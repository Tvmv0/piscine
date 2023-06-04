<?php
session_start();

/***************
 *                  CODE POUR SUPPRIMER UN ARTICLE AU PANIER     
 *                  CODE en cours
 * *************** */

//identifier BDD
$database = "piscine";

echo '<meta charset="utf-8">';
echo '<link rel="stylesheet" type="text/css" href="panier.css">';


//connectez-vous dans BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
$id = $_GET['id'];
echo $id;

$sql = "SELECT * FROM items WHERE id_item = $id";
$result = mysqli_query($db_handle, $sql);
$id_client = $_SESSION['username'];;
echo $id_client;

if ($db_found) {

    if (($data = mysqli_fetch_assoc($result) == 0)) {
        echo "<p>l' article n'est pas dans le panier ERREUR </p>";
    } else {
        echo "<p>On va supp l'article</p>";
        //cette ligne ne fonctionne pas
        $sql = "SELECT * FROM panier WHERE id_item = $id AND id_acheteur = $id_client";

        $result = mysqli_query($db_handle, $sql);
        if ($data = mysqli_fetch_assoc($result) != 0) {
            $id_pan = $data['id_panier'];
            echo $id_pan;
        }

        //echo $data['id_panier'];
        /*header("Location: panier.php");
        exit;*/
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
        WHERE a.nom_acheteur LIKE '%$id_client%' ";
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
    echo "<p> database not found</p>";
}

//on ferme la connexion
mysqli_close($db_handle);

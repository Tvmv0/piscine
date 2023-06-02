<?php

/***************
 *                  CODE POUR SUPPRIMER UN VENDEUR
 *                              peut renvoyer sur affich_item
 *                  CODE FONCTIONNEL
 * *************** */

//identifier BDD
$database = "piscine";

//connectez-vous dans BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
$id = $_GET['id'];

//on récupere le vendeur cliqué
$sql = "SELECT * FROM vendeur WHERE id_vendeur = $id";
$result = mysqli_query($db_handle, $sql);
$data = mysqli_fetch_assoc($result);
//recuperer l'id du vendeur sur lequel on a cliqué 

if ($db_found) {
    echo "<p>on entre dans VENDBIS</p>";
    echo "La valeur cliquée est : " . $id;
    //on supprime le vendeur
    $sql = "DELETE FROM vendeur WHERE id_vendeur = $id";
    $result = mysqli_query($db_handle, $sql);

    $sql = "SELECT * FROM vendeur";
    $result = mysqli_query($db_handle, $sql);

    echo "<h2>" . "Voici les vendeurs restants :" . "</h2>";
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>" . "ID" . "</th>";
    echo "<th>" . "pseudo" . "</th>";
    //afficher le resultat

    while ($data = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $data['id_vendeur'] . "</td>";
        echo "<td>" . $data['pseudo'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";

    echo "<p>Souhaitez-vous supprimer un autre vendeur ? </p>";
    echo '<form method="post" action="affich_vendeur.php">';
    echo '<button type="submit">Supprimer</button>';
    echo '</form>';

    echo "<p>Souhaitez-vous ajouter un vendeur ? </p>";
    echo '<form method="post" action="nv_vendeur.php">';
    echo '<button type="submit">ajouter</button>';
    echo '</form>';

    /*header("Location: affich_vendeur.php");
    exit;*/
    //afficher tous les vendeurs 
} else {
    echo "<p> database not found</p>";
}

//on ferme la connexion
mysqli_close($db_handle);

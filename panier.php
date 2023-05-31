<?php

//identifier BDD
$database = "piscine";

echo '<meta charset="utf-8">';
echo '<link rel="stylesheet" type="text/css" href="panier.css">';

//connectez-vous dans BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

$client_co = 'nom1';

if ($db_found) {
    if (isset($_POST["panier"])) {
        $sql = "SELECT * FROM items i INNER JOIN panier p ON i.id_item = p.id_item AND p.id_acheteur = '$client_co' ";
        $result = mysqli_query($db_handle, $sql);
    }

    if (!($data = mysqli_fetch_assoc($result))) {
        echo "<p>Aucun article trouvé</p>";
    } else {
        echo "<h1>Les items disponibles : </h1>";
        echo "<table border=\"1\">";
        echo "<tr>";
        echo "<th>" . "nom_obj" . "</th>";
        echo "<th>" . "prix" . "</th>";
        echo "<th>" . "photo" . "</th>";
        echo "</tr>";

        echo "<tr>";
        echo "<td>" . $data['nom_obj'] . "</td>";
        echo "<td>" . $data['prix'] . "</td>";
        $image = $data['photo1'];
        echo "<td>" . "<img src='$image' height='60' width='80'>" . "</td>";
        echo "</tr>";

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
}

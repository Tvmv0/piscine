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


//on ferme la connexion
mysqli_close($db_handle);

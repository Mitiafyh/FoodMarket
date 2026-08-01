<?php
require ("include/fonction.php");

header('Content-Type: application/json; charset=utf-8');

if (isset($_POST['id_produit']) && isset($_POST['demande'])) {
    $id_produit = $_POST['id_produit'];
    $demande = $_POST['demande'];



    update_demande($demande, $id_produit);

    echo json_encode([
        "status" => "ok",
        "id_produit" => $id_produit,
        "demande" => $demande
    ]);
  
}

?>
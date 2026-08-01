<?php
require "connexion.php";
$db = dbconnect();


function get_categorie()
{
    global $db;
    $sql = "SELECT * FROM categorie";
    $stmt = $db->query($sql);

    $cat = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $cat[] = [
            'id_categorie' => $row['id_categorie'],
            'nom_categorie' => $row['nom_categorie'],
            'photo' => $row['photo'],
        ];
    }

    return $cat;
}
function get_product()
{
    global $db;
    $sql = "SELECT * FROM produit";
    $stmt = $db->query($sql);

    $prod = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $prod[] = [
            'id_produit' => $row['id_produit'],
            'id_categorie' => $row['id_categorie'],
            'nom_produit' => $row['nom_produit'],
            'prix' => $row['prix'],
            'photo' => $row['photo'],
            'note' => $row['note'],
            'demande' => $row['demande'],
        ];
    }

    return $prod;
}
function get_product_cat($cat)
{
    global $db;
    $sql = "SELECT * FROM produit WHERE id_categorie=" . $cat;
    $stmt = $db->query($sql);

    $prod = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $prod[] = [
            'id_produit' => $row['id_produit'],
            'nom_produit' => $row['nom_produit'],
            'prix' => $row['prix'],
            'photo' => $row['photo'],
            'note' => $row['note'],
            'id_categorie' => $row['id_categorie'],
            'demande' => $row['demande'],
        ];
    }

    return $prod;
}


function update_demande($qtt,$id){
    global $db;
    $sql = "UPDATE produit SET demande=? WHERE id_produit=?";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(1, intval($qtt), PDO::PARAM_INT);
    $stmt->bindValue(2, intval($id), PDO::PARAM_INT);
    $result = $stmt->execute();
    if (!$result) {
        throw new Exception("Update demande failed: " . implode(", ", $stmt->errorInfo()));
    }
    return $result;
}

function like($id){
    global $db;
    
    $sql = "SELECT jadore FROM produit WHERE id_produit=?";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(1, intval($id), PDO::PARAM_INT);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$row) {
        throw new Exception("Product not found: id=" . $id);
    }
    
    $new_value = $row['jadore'] ? 0 : 1;

    $sql2 = "UPDATE produit SET jadore=? WHERE id_produit=?";
    $stmt2 = $db->prepare($sql2);
    $stmt2->bindValue(1, $new_value, PDO::PARAM_INT);
    $stmt2->bindValue(2, intval($id), PDO::PARAM_INT);
    $result = $stmt2->execute();
    
    if (!$result) {
        throw new Exception("Update failed: " . implode(", ", $stmt2->errorInfo()));
    }
    
    return $result;
}


?>
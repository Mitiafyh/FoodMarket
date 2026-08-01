<?php
require ("include/fonction.php");

header('Content-Type: application/json; charset=utf-8');

try {
    if (!isset($_POST['id_produit'])) {
        http_response_code(400);
        echo json_encode([
            "status" => "error",
            "message" => "Missing parameter: id_produit"
        ]);
        exit;
    }

    $id_produit = intval($_POST['id_produit']);

    if ($id_produit <= 0) {
        http_response_code(400);
        echo json_encode([
            "status" => "error",
            "message" => "Invalid id_produit value"
        ]);
        exit;
    }

    like($id_produit);

    echo json_encode([
        "status" => "ok",
        "id_produit" => $id_produit,
        "message" => "Like toggled successfully"
    ]);

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        "status" => "error",
        "message" => "Server error: " . $e->getMessage()
    ]);
}
exit;
?>
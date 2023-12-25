<?php 
session_start();
 
$id_produk = $_POST["productId"];

unset($_SESSION["pesanan"][$id_produk]);

echo json_encode([
    'response' => 'True'
]);
?>
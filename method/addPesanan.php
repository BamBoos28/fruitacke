<?php
session_start();
if (!isset($_SESSION['login'])) {
    echo json_encode([
        'response' => 'False'
    ]);
}else{
    $id_produk = $_POST["productId"];
    $jumlah_pesanan = $_POST["productCount"];
    
    if (isset($_SESSION['pesanan'][$id_produk])) {
        $_SESSION['pesanan'][$id_produk] += $jumlah_pesanan;
    } else {
        $_SESSION['pesanan'][$id_produk] = $jumlah_pesanan;
    }
    echo json_encode([
        'response' => 'True'
    ]);
}
?>
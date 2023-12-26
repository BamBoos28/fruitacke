<?php
session_start();
require("../db/conn.php");
$user = $_SESSION['login'];
$totalBayar = $_POST['totalBayar'];
$totalBelanja = $_POST['totalBelanja'];
$datePesanan = date("Y-m-d");


// simpan data
$query = mysqli_query($conn, "INSERT INTO pemesan (tanggal_pemesan, total_harga, total_bayar)
                            VALUES
                        ('$datePesanan', '$totalBelanja' ,'$totalBayar')");
// ambil id yang baru
$id_pemesan = $conn->insert_id;
// simpan data ke detailpesanan
foreach ($_SESSION['pesanan'] as $id_produk => $jumlah) {
    $queryDetail = mysqli_query($conn, "INSERT INTO detail_pemesan (id_pemesan, username, id_produk, jumlah_produk)
                            VALUES ('$id_pemesan', '$user','$id_produk', '$jumlah')
                            ");
}
// Mengosongkan pesanan
unset($_SESSION["pesanan"]);

// Dialihkan ke halaman nota
echo json_encode([
    'response' => 'True'
]);
?>
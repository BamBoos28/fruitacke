<?php
// fetch_product.php
session_start();
// Kode untuk menghubungkan ke database
include("./db/conn.php");

// Mendapatkan ID produk dari permintaan AJAX
$id_produk = $_GET['id_produk'];

// Query untuk mengambil data produk berdasarkan ID
$query = "SELECT * FROM produk WHERE id_produk = '$id_produk'";
$result = mysqli_query($conn, $query);

// Mengecek apakah data produk ditemukan
$id_details = mysqli_fetch_assoc($result);

$result = mysqli_query($conn, "SELECT * FROM produk");
$rows = [];
// $filter = "semua";
while ($row = mysqli_fetch_assoc($result)) {
    if ($row['jenis_produk'] == $id_details['jenis_produk']) {
        $rows[] = $row;
    }
}

if (isset($_POST['tambahPesanan'])) {
    $jumlah_pesanan = $_POST['jumlahPesanan'];

    if (isset($_SESSION['pesanan'][$id_produk])) {
        $_SESSION['pesanan'][$id_produk] += $jumlah_pesanan;
    } else {
        $_SESSION['pesanan'][$id_produk] = $jumlah_pesanan;
    }
    echo $_SESSION['pesanan'][$id_produk];
}
?>


<?php include("./comp/header.php"); ?>
<?php include("./comp/navbar.php"); ?>

<!-- Single Product Start -->
<div class="container-fluid py-5 mt-5">
    <div class="container py-5">
        <div class="row g-4 mb-5">
            <div class="col">
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="">
                            <a href="#">
                                <img class="w-100" src="img/product/<?= $id_details['gambar']; ?>"
                                    class="img-fluid rounded" alt="Image">
                            </a>
                        </div>
                    </div>
                    <div action="" class="col-lg-6">
                        <h4 class="fw-bold mb-3" id="namaProduk":>
                            <?= $id_details['nama_produk']; ?>
                        </h4>
                        <p class="mb-3">Katogori:
                            <?= $id_details['jenis_produk']; ?>
                        </p>
                        <h5 class="fw-bold mb-3">Rp.
                            <?= number_format($id_details['harga'], 2, ",", ".") ?>
                        </h5>
                        <p class="mb-4">
                            <?= $id_details['deskripsi_produk']; ?>
                        </p>
                        <div class="input-group quantity mb-5" style="width: 100px;">
                            <div class="input-group-btn">
                                <button class="btn btn-sm btn-minus rounded-circle bg-light border">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <input type="text" class="form-control form-control-sm text-center border-0" value="1"
                                id="jumlahProduk">
                            <div class="input-group-btn">
                                <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div bs-id="<?= $id_details['id_produk']; ?>"
                            class="btn border border-secondary rounded-pill px-4 py-2 mb-4 text-primary"
                            id="addPesanan"><i class="fa fa-shopping-bag me-2 text-primary"></i> Buy</div>
                    </div>
                </div>
            </div>
        </div>
        <h1 class="fw-bold mb-0">Menu Terkait</h1>
        <div class="vesitable">
            <div class="owl-carousel vegetable-carousel justify-content-center">
                <?php foreach ($rows as $produk): ?>
                    <div class="border border-primary rounded position-relative vesitable-item">
                        <div class="vesitable-img">
                            <img src="img/product/<?= $produk['gambar']; ?>" class="img-fluid w-100 rounded-top" alt="">
                        </div>
                        <div class="text-white bg-primary px-3 py-1 rounded position-absolute"
                            style="top: 10px; right: 10px;object-fit:cover;">
                            <?= $produk['jenis_produk']; ?>
                        </div>
                        <div class="p-4 pb-0 rounded-bottom">
                            <h5>
                                <?= $produk['nama_produk']; ?>
                            </h5>
                            <p>
                                <?= $produk['deskripsi_produk']; ?>
                            </p>
                            <div class="d-flex justify-content-between flex-lg-wrap">
                                <div class="text-dark mt-1">Rp.
                                    <?= number_format($produk['harga'], 2, ",", ".") ?>
                                </div>
                                <a href="./details.php?id_produk=<?= $produk['id_produk']; ?>"
                                    class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i
                                        class="fa fa-shopping-bag me-2 text-primary"></i> Buy</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<!-- Single Product End -->
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }

    $("#addPesanan").click(function () {
        $.ajax({
            type: "POST",
            url: "method/addPesanan.php",
            data: {
                productId: $(this).attr("bs-id"),
                productCount: parseInt($(jumlahProduk).val())
            },
            dataType: "json",
            cache: false,
            success: function (data) {
                Swal.fire({
                    icon: "success",
                    title: "Pesanan Ditambah!!!",
                    text: $(namaProduk).text() + " berjumlah : " + $(jumlahProduk).val(),
                });
            }
        });
    });
</script>

<?php include("./comp/footer.php"); ?>
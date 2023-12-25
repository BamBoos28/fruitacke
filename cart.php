<?php session_start();
if (!isset($_SESSION['login'])) {
    header("Location: ./login.php");
}
include("./db/conn.php");
include("./comp/header.php"); ?>

<?php include("./comp/navbar.php"); ?>

<!-- Cart Page Start -->
<div class="container-fluid py-5">
    <div class="text-center mx-auto mb-3" style="max-width: 700px;margin-top:5em">
        <h1 class="display-4">Keranjang Anda</h1>
    </div>
    <div class="container py-5">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Products</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $totalBelanja = 0; ?>
                    <?php if (isset($_SESSION['pesanan'])): ?>
                        <?php if (!empty($_SESSION['pesanan'])): ?>
                            <?php foreach ($_SESSION['pesanan'] as $id_produk => $jumlah): ?>
                                <?php

                                $result = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk = '$id_produk'");
                                $rows = $result->fetch_assoc();
                                $subHarga = $rows['harga'] * $jumlah;
                                ?>
                                <tr>
                                    <th scope="row">
                                        <div class="d-flex align-items-center">
                                            <img src="img/product/<?= $rows['gambar'] ?>" class="img-fluid me-5 rounded-circle"
                                                style="width: 80px; height: 80px;object-fit:cover;" alt="">
                                        </div>
                                    </th>
                                    <td>
                                        <p class="mb-0 mt-4">
                                            <?= $rows['nama_produk'] ?>
                                        </p>
                                    </td>
                                    <td>
                                        <p class="mb-0 mt-4">Rp.
                                            <?= number_format($rows['harga'], 2, ",", ".") ?>
                                        </p>
                                    </td>
                                    <td>
                                        <div class="input-group quantity mt-4" style="width: 100px;">
                                            <input type="text" class="form-control bg-light form-control-sm text-center border-0"
                                                value="<?= $jumlah ?>" readonly>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="mb-0 mt-4">Rp.
                                            <?= number_format($subHarga, 2, ",", ".") ?>
                                        </p>
                                    </td>
                                    <td>
                                        <button class="btn btn-md rounded-circle bg-light border mt-4"
                                            onclick="deletePesanan(<?= $rows['id_produk'] ?>)">
                                            <i class="fa fa-times text-danger"></i>
                                        </button>
                                    </td>
                                </tr>
                                <?php $totalBelanja += $subHarga ?>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <th scope="row">
                                    <div class="d-flex align-items-center">
                                        <img src="img/product/blank.png" class="img-fluid me-5 rounded-circle"
                                            style="width: 80px; height: 80px;object-fit:cover;" alt="">
                                    </div>
                                </th>
                                <td>
                                    <p class="mb-0 mt-4">
                                    </p>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4">
                                    </p>
                                </td>
                                <td>
                                    <div class="input-group quantity mt-4" style="width: 100px;">
                                    </div>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4">
                                    </p>
                                </td>
                                <td>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="row g-4 justify-content-end">
            <div class="col-8"></div>
            <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                <div class="bg-light rounded">
                    <div class="p-4">
                        <h1 class="display-6 mb-4">Total <span class="fw-normal">Belanjaan</span></h1>
                    </div>
                    <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                        <h5 class="mb-0 ps-4 me-4">Total</h5>
                        <p class="mb-0 pe-4">Rp.
                            <?= number_format($totalBelanja, 2, ",", ".") ?>
                        </p>
                    </div>
                    <button class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4"
                        type="button">Proceed Checkout</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart Page End -->

<script>
    function deletePesanan(idProduk) {
        $.ajax({
            type: "POST",
            url: "method/deletePesanan.php",
            data: {
                productId: idProduk
            },
            dataType: "json",
            cache: false,
            success: function (data) {
                Swal.fire({
                    icon: "success",
                    title: "Pesanan Dihapus!!!",
                    text: "Pesanan berhasil dihapus",
                }).then((result) => {
                    location.reload();
                });
            }
        });
    }
</script>

<?php include("./comp/footer.php"); ?>
<?php session_start();
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
                                        style="width: 80px; height: 80px;" alt="">
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
                                    <input type="text" class="form-control form-control-sm text-center border-0"
                                        value="<?= $jumlah ?>">
                                </div>
                            </td>
                            <td>
                                <p class="mb-0 mt-4">Rp.
                                    <?= number_format($subHarga, 2, ",", ".") ?>
                                </p>
                            </td>
                            <td>
                                <button class="btn btn-md rounded-circle bg-light border mt-4">
                                    <i class="fa fa-times text-danger"></i>
                                </button>
                            </td>
                        </tr>

                        <!-- <tr>
                            <td>
                                <?= $rows['nama_produk'] ?>
                            </td>
                            <td>Rp.
                                <?= number_format($rows['harga'], 2, ",", ".") ?>
                            </td>
                            <td>
                                <?= $jumlah ?>
                            </td>
                            <td>Rp.
                                <?= number_format($subHarga, 2, ",", ".") ?>
                            </td>
                            <td>
                                <a href="hapus-pesanan.php?id_produk=<?= $rows['id_produk'] ?>"
                                    class="btn btn-danger btn-sm ">hapus</a>
                            </td>
                        </tr> -->
                        <?php $totalBelanja += $subHarga ?>
                    <?php endforeach; ?>
                    <!-- <tr>
                        <th scope="row">
                            <div class="d-flex align-items-center">
                                <img src="img/vegetable-item-3.png" class="img-fluid me-5 rounded-circle"
                                    style="width: 80px; height: 80px;" alt="">
                            </div>
                        </th>
                        <td>
                            <p class="mb-0 mt-4">Big Banana</p>
                        </td>
                        <td>
                            <p class="mb-0 mt-4">2.99 $</p>
                        </td>
                        <td>
                            <div class="input-group quantity mt-4" style="width: 100px;">
                                <input type="text" class="form-control form-control-sm text-center border-0" value="1">
                            </div>
                        </td>
                        <td>
                            <p class="mb-0 mt-4">2.99 $</p>
                        </td>
                        <td>
                            <button class="btn btn-md rounded-circle bg-light border mt-4">
                                <i class="fa fa-times text-danger"></i>
                            </button>
                        </td>
                    </tr> -->
                </tbody>
            </table>
        </div>
        <div class="row g-4 justify-content-end">
            <div class="col-8"></div>
            <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                <div class="bg-light rounded">
                    <div class="p-4">
                        <h1 class="display-6 mb-4">Cart <span class="fw-normal">Total</span></h1>
                        <div class="d-flex justify-content-between mb-4">
                            <h5 class="mb-0 me-4">Subtotal:</h5>
                            <p class="mb-0">$96.00</p>
                        </div>
                        <div class="d-flex justify-content-between mb-4">
                            <h5 class="mb-0 me-4">Subtotal:</h5>
                            <p class="mb-0">$96.00</p>
                        </div>
                    </div>
                    <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                        <h5 class="mb-0 ps-4 me-4">Total</h5>
                        <p class="mb-0 pe-4">$99.00</p>
                    </div>
                    <button class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4"
                        type="button">Proceed Checkout</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart Page End -->

<?php include("./comp/footer.php"); ?>
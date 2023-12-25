<?php
require("db/conn.php");
session_start();

$result = mysqli_query($conn, "SELECT * FROM produk");
$rows = [];
// $filter = "semua";
while ($row = mysqli_fetch_assoc($result)) {
    if ($row['best'] == 1) {
        $rows[] = $row;
    }
}
?>

<?php include("./comp/header.php"); ?>

<!-- Spinner Start -->
<div id="spinner"
    class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
    <div class="spinner-grow text-primary" role="status"></div>
</div>
<!-- Spinner End -->


<!-- Navbar start -->
<?php include("./comp/navbar.php"); ?>
<!-- Navbar End -->

<!-- Hero Start -->
<div class="container-fluid py-5 mb-5 hero-header">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-md-12 col-lg-7" style="text-shadow: 0 0 1em wheat;">
                <h4 class="mb-3 text-secondary">100% Homemade Bakery</h4>
                <h1 class="mb-5 display-3 text-primary">Menjual Bakery dengan Kualitas Premium</h1>
            </div>
            <div class="col-md-12 col-lg-5">
                <div id="carouselId" class="carousel slide position-relative" data-bs-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active rounded">
                            <img src="img/hero-img-1.jpg" class="img-fluid w-100 h-100 bg-secondary rounded"
                                alt="First slide">
                            <a href="#" class="btn px-4 py-2 text-white rounded">Cake</a>
                        </div>
                        <div class="carousel-item rounded">
                            <img src="img/hero-img-2.jpg" class="img-fluid w-100 h-100 rounded" alt="Second slide">
                            <a href="#" class="btn px-4 py-2 text-white rounded">Bread</a>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselId"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselId"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hero End -->

<!-- Featurs Start -->
<div class="container-fluid service py-5">
    <div class="container py-5">
        <div class="row g-4 justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="service-item rounded border border-secondary bg-primary">
                    <img src="img/l-halal.png" class="img-fluid rounded-top w-100 py-3" alt="">
                    <div class="px-4 rounded-bottom">
                        <div class="service-content bg-secondary text-center rounded p-4">
                            <h3 class="text-white">Halal</h3>
                            <h5 class="mb-0">Mulai dari bahan sampai pemprosesan</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="service-item rounded border border-dark bg-dark">
                    <img src="img/l-gula.png" class="img-fluid rounded-top w-100 py-3" alt="">
                    <div class="px-4 rounded-bottom">
                        <div class="service-content bg-light text-center p-4 rounded">
                            <h3 class="text-primary">Gula Murni</h3>
                            <h5 class="mb-0">Mengunakan gula asli tanpa pemanis buatan</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="service-item rounded border border-primary bg-secondary">
                    <img src="img/l-fresh.png" class="img-fluid rounded-top w-100 py-3" alt="">
                    <div class="px-4 rounded-bottom">
                        <div class="service-content bg-primary text-center p-4 rounded">
                            <h3 class="text-white">Produk Fresh</h3>
                            <h5 class="mb-0">Kualitas produk terjamin</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Featurs End -->

<!-- Bestsaler Product Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="text-center mx-auto mb-5" style="max-width: 700px;">
            <h1 class="display-4">Bestseller Products</h1>
        </div>
        <div class="row g-4">
            <?php foreach ($rows as $produk): ?>
                <div class="col-lg-6 col-xl-4">
                    <div class="p-4 rounded bg-light">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <img src="img/product/<?= $produk['gambar']; ?>" class="img-fluid rounded w-100" alt="">
                            </div>
                            <div class="col-6">
                                <a href="./details.php?id_produk=<?= $produk['id_produk']; ?>" class="h5">
                                    <?= $produk['nama_produk']; ?>
                                </a>
                                <hr>
                                <h5 class="mb-3">Rp. <?= number_format($produk['harga'], 2, ",", ".") ?>
                                </h5>
                                <a href="./details.php?id_produk=<?= $produk['id_produk']; ?>"
                                    class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                        class="fa fa-shopping-bag me-2 text-primary"></i>  Buy</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- Bestsaler Product End -->

<!-- Banner Section Start-->
<div class="container-fluid banner bg-secondary my-5">
    <div class="container py-5">
        <div class="row g-4 align-items-center">
            <div class="col-lg-6">
                <div class="py-4">
                    <h1 class="display-3 text-white">Custom Cake</h1>
                    <p class="fs-5 mb-4 text-dark">Menerima pesanan Custom Cake, hubungi kami.</p>
                    <a href="#" class="banner-btn btn border-2 border-white rounded-pill text-dark py-3 px-5">BUY</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="position-relative">
                    <img style="height : 36em;" src="img/custom.png" class="img-fluid w-100 rounded" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner Section End -->

<?php include("./comp/footer.php"); ?>
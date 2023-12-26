<?php
require("db/conn.php");
session_start();

$result = mysqli_query($conn, "SELECT * FROM produk");
$all = [];
$best = [];
$kue = [];
$roti = [];
$donat = [];
// $filter = "semua";
while ($row = mysqli_fetch_assoc($result)) {
    if ($row['best'] == 1) {
        $best[] = $row;
    }

    if ($row['jenis_produk'] == "Kue") {
        $kue[] = $row;
    }

    if ($row['jenis_produk'] == "Roti") {
        $roti[] = $row;
    }

    if ($row['jenis_produk'] == "Donat") {
        $donat[] = $row;
    }

    $all[] = $row;
}
?>

<?php include("./comp/header.php"); ?>
<?php include("./comp/navbar.php"); ?>

<!-- Bestsaler Product Start -->
<div class="container-fluid" style="margin:8em 0 2em 0 ;">
    <div class="container py-5" id="bestCon">
        <div class="text-center mx-auto mb-5" style="max-width: 700px;">
            <h1 class="display-4">Menu Favorit</h1>
        </div>
        <div class="row g-4">
            <?php foreach ($best as $produk): ?>
                <div class="col-lg-6 col-xl-4" id="best">
                    <div class="p-4 rounded bg-light">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <img src="admin/asset/img/produk/<?= $produk['gambar']; ?>" class="img-fluid rounded w-100" alt="">
                            </div>
                            <div class="col-6">
                                <a href="./details.php?id_produk=<?= $produk['id_produk']; ?>" class="h5">
                                    <?= $produk['nama_produk']; ?>
                                </a>
                                <hr>
                                <h5 class="mb-3">Rp.
                                    <?= number_format($produk['harga'], 2, ",", ".") ?>
                                </h5>
                                <a href="./details.php?id_produk=<?= $produk['id_produk']; ?>"
                                    class="btn border border-secondary rounded-pill text-primary"><i
                                        class="fa fa-shopping-bag me-2 text-primary"></i>   Buy</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- Bestsaler Product End -->


<!-- Fruits Shop Start-->
<div class="container-fluid fruite py-5">
    <div class="container py-5" id="katalogCon">
        <div class="tab-class text-center">
            <div class="row g-4">
                <div class="col-lg-4 text-start">
                    <h1>Katalog Menu</h1>
                </div>
                <div class="col-lg-8 text-end">
                    <ul class="nav nav-pills d-inline-flex text-center mb-5">
                        <li class="nav-item">
                            <a class="d-flex m-2 py-2 bg-light rounded-pill active" data-bs-toggle="pill" href="#tab-1">
                                <span class="text-dark" style="width: 130px;">All Menu</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="d-flex py-2 m-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-2">
                                <span class="text-dark" style="width: 130px;">Kue</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="d-flex m-2 py-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-3">
                                <span class="text-dark" style="width: 130px;">Roti</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="d-flex m-2 py-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-4">
                                <span class="text-dark" style="width: 130px;">Donat</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        <div class="col-lg-12">
                            <div class="row g-4">
                                <?php foreach ($all as $produk): ?>
                                    <div class="col-md-6 col-lg-4 col-xl-3" id="katalog">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img border border-secondary">
                                                <img src="admin/asset/img/produk/<?= $produk['gambar']; ?>"
                                                    class="img-fluid w-100 rounded-top" alt="">
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                                style="top: 10px; left: 10px;">
                                                <?= $produk['jenis_produk']; ?>
                                            </div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <h5>
                                                    <?= $produk['nama_produk']; ?>
                                                </h5>
                                                <hr>
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <div class="text-dark mt-2">Rp.
                                                        <?= number_format($produk['harga'], 2, ",", ".") ?>
                                                    </div>
                                                    <a href="./details.php?id_produk=<?= $produk['id_produk']; ?>"
                                                        class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                                            class="fa fa-shopping-bag me-2 text-primary"></i> Buy</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tab-2" class="tab-pane fade show p-0">
                    <div class="row g-4">
                        <div class="col-lg-12">
                            <div class="row g-4">
                            <?php foreach ($kue as $produk): ?>
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img border border-secondary">
                                                <img src="admin/asset/img/produk/<?= $produk['gambar']; ?>"
                                                    class="img-fluid w-100 rounded-top" alt="">
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                                style="top: 10px; left: 10px;">
                                                <?= $produk['jenis_produk']; ?>
                                            </div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <h5>
                                                    <?= $produk['nama_produk']; ?>
                                                </h5>
                                                <hr>
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <div class="text-dark mt-2">Rp.
                                                        <?= number_format($produk['harga'], 2, ",", ".") ?>
                                                    </div>
                                                    <a href="./details.php?id_produk=<?= $produk['id_produk']; ?>"
                                                        class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                                            class="fa fa-shopping-bag me-2 text-primary"></i> 
                                                         Buy</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tab-3" class="tab-pane fade show p-0">
                    <div class="row g-4">
                        <div class="col-lg-12">
                            <div class="row g-4">
                            <?php foreach ($roti as $produk): ?>
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img border border-secondary">
                                                <img src="admin/asset/img/produk/<?= $produk['gambar']; ?>"
                                                    class="img-fluid w-100 rounded-top" alt="">
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                                style="top: 10px; left: 10px;">
                                                <?= $produk['jenis_produk']; ?>
                                            </div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <h5>
                                                    <?= $produk['nama_produk']; ?>
                                                </h5>
                                                <hr>
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <div class="text-dark mt-2">Rp.
                                                        <?= number_format($produk['harga'], 2, ",", ".") ?>
                                                    </div>
                                                    <a href="./details.php?id_produk=<?= $produk['id_produk']; ?>"
                                                        class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                                            class="fa fa-shopping-bag me-2 text-primary"></i> 
                                                         Buy</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tab-4" class="tab-pane fade show p-0">
                    <div class="row g-4">
                        <div class="col-lg-12">
                            <div class="row g-4">
                            <?php foreach ($donat as $produk): ?>
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img border border-secondary">
                                                <img src="admin/asset/img/produk/<?= $produk['gambar']; ?>"
                                                    class="img-fluid w-100 rounded-top" alt="">
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                                style="top: 10px; left: 10px;">
                                                <?= $produk['jenis_produk']; ?>
                                            </div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <h5>
                                                    <?= $produk['nama_produk']; ?>
                                                </h5>
                                                <hr>
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <div class="text-dark mt-2">Rp.
                                                        <?= number_format($produk['harga'], 2, ",", ".") ?>
                                                    </div>
                                                    <a href="./details.php?id_produk=<?= $produk['id_produk']; ?>"
                                                        class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                                            class="fa fa-shopping-bag me-2 text-primary"></i> 
                                                         Buy</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Fruits Shop End-->

<script>
    ScrollReveal().reveal('#bestCon', {duration: 1000 });
    ScrollReveal().reveal('#best', { delay: 250 , duration: 1500 });
    ScrollReveal().reveal('#katalogCon', { delay: 500 , duration: 1000 });
    ScrollReveal().reveal('#katalog', { delay: 100 , duration: 2000 });
</script>

<?php include("./comp/footer.php"); ?>
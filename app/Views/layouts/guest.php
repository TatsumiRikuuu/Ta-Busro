<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Toko</title>
    <link href="<?= base_url('/assets/css/main.css') ?>" rel="stylesheet" />
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark mb-5">
        <div class="container">
            <a class="" href="/"><img src="<?= base_url('/assets/img/logo.png') ?>" width="50px" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= base_url() ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('makanan') ?>">Makanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('minuman') ?>">Minuman</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('promo') ?>">Promo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('menu_baru') ?>">Menu Baru</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('paket') ?>">Paket</a>
                    </li>
                </ul>
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="bi bi-bag"><?= count(session('keranjang')) != 0  ? count(session('keranjang')) : '' ?></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <nav class="navbar navbar-dark bg-dark">
            <div class="container">
                <a class="" href="/"><img src="<?= base_url('/assets/img/logo.png') ?>" width="50px" alt=""></a>
                <button type="button" class="btn btn-dark" data-bs-dismiss="offcanvas"><i class="bi bi-x"></i></button>
            </div>
        </nav>
        <div class="offcanvas-body p-2">
            <?php if (count(session('keranjang')) > 0) : ?>
                <?= view_cell('KeranjangCell::display') ?>
            <?php else : ?>
                <div class="d-flex justify-content-center align-items-center" style="height: 80vh;">
                    <h4 class="text-center">Keranjang kosong</h4>
                </div>
            <?php endif; ?>
        </div>
        <div class="offcanvas-footer">
            <div class="d-flex gap-2 py-2 px-2">
                <button data-bs-dismiss="offcanvas" class="btn btn-outline-dark w-100">Pilih Lagi</button>
                <a href="<?= count(session('keranjang')) != 0  ? base_url('pesan') : '#' ?>" class="btn btn-dark w-100">Lanjutkan Pesanan</a>
            </div>
        </div>
    </div>

    <?= $this->renderSection('content') ?>


    <script src="<?= base_url('/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
</body>

</html>

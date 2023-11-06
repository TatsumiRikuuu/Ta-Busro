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
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
        <div class="container align-items-center">
            <a class="" href="/"><img src="<?= base_url('/assets/img/logo.png') ?>" width="50px" alt=""></a>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav me-auto">
                    <a class="nav-link active pb-0" href="#" onclick="toggleMenuSidebar()"><span class="navbar-toggler-icon"></span></a>
                </div>
                <div class="navbar-nav ms-auto">
                    <div class="dropdown">
                        <!-- <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown button
                        </button> -->
                        <a class="nav-link active pb-0" href="<?= base_url('logout') ?>"><i class="bi bi-box-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </nav>


    <div class="container">
        <div id="menu-row" class="row g-0">
            <div id="sidebar" class="col-lg-3 d-none d-lg-block border-end">
                <div class="py-2 px-3">
                    <div class="d-flex align-items-top gap-3 mt-3 mb-4">
                        <i class="bi bi-person-circle"></i>
                        <div>Admin</div>
                    </div>
                    <a href="dashboard" class="btn btn-dark text-white btn-lg w-100 mb-3">Home</a>
                    <div class="">
                        <h6 class="fw-bold">Menu</h6>
                        <a href="produk" class="d-flex text-decoration-none text-dark py-2 align-items-center gap-2"><i class="bi bi-gear"></i> Kelola Produk</a>
                        <a href="pesanan" class="d-flex text-decoration-none text-dark py-2 align-items-center gap-2"><i class="bi bi-clipboard-data"></i> Data Pesanan</a>
                    </div>
                </div>
            </div>
            <div id="content" class="col-lg-9 col-12">
                <div style=" min-height: 90vh;">
                    <?= $this->renderSection('content') ?>
                </div>
                <footer class="footer bg-dark py-3">
                    <h5 style=" color:white; font-size:1vw; text-align:center;">&copy;Toko | Coffee Shop Smarthill Camp</h1>
                </footer>
            </div>
        </div>
    </div>

    <script src="<?= base_url('/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script>
        function toggleMenuSidebar() {
            $('#menu-row #sidebar').toggleClass('d-lg-block');
            $('#menu-row #content').toggleClass('col-lg-9');
            $('#menu-row #content footer').toggleClass('d-none');
            $('section#footer').toggleClass('d-none');
        }
    </script>
    <?= $this->renderSection('script') ?>
</body>

</html>
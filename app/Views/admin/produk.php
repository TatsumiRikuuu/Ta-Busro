<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>

<div class="position-relative">
    <div class="position-absolute w-100 bg-dark d-block" style="height: 20vh;z-index: -99;">
    </div>
    <div class="px-4">
        <div class="pt-5">
            <h5 class="text-white fw-bold pb-5">Produk</h5>
            <div class="card mt-2 border-0 shadow rounded-3">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div class="dropdown">
                            <button class="btn btn-outline-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Filter produk
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?= base_url('/admin/produk') ?>">Semua produk</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="<?= base_url('admin/produk/makanan') ?>">Makanan</a></li>
                                <li><a class="dropdown-item" href="<?= base_url('admin/produk/minuman') ?>">Minuman</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="<?= base_url('admin/produk/paket') ?>">Paket</a></li>
                                <li><a class="dropdown-item" href="<?= base_url('admin/produk/menu baru') ?>">Menu Baru</a></li>
                                <li><a class="dropdown-item" href="<?= base_url('admin/produk/promo') ?>">Promo</a></li>

                            </ul>
                        </div>
                        <!-- Example single danger button -->
                        <div class="btn-group">
                            <button type="button" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                Tambah Produk
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark">
                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#tambahMakananModal">Makanan</a></li>
                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#tambahMinumanModal">Minuman</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#tambahPaketModal">Paket</a></li>
                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#tambahMenuModal">Menu Baru</a></li>
                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#tambahPromoModal">promo</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="row g-4">
                        <?php foreach ($produks as $key => $produk) : ?>
                            <div class="col-6 col-md-4 col-lg-3 ">
                                <div class="card shadow-sm">
                                    <img src="<?= base_url('uploads/produk/' . $produk['foto']) ?>" alt="" class="card-img-top" style="height: 180px;object-fit: cover;object-position: center;">
                                    <div class="card-body inputEditProduk<?= $produk['id'] ?> d-none">
                                        <form action="/admin/produk/update/<?= $produk['id'] ?>" method="post">
                                            <div class="mb-1">
                                                <input class="form-control" type="text" name="nama" value="<?= $produk['nama'] ?>">
                                            </div>
                                            <div class="mb-2">
                                                <input class="form-control" type="text" name="harga" value="<?= $produk['harga'] ?>">
                                            </div>
                                            <div class="d-flex gap-2">
                                                <a href="#" onclick="batalEditProduk(<?= $produk['id'] ?>)" class="btn btn-sm btn-secondary w-100"><i class="bi bi-x"></i></a>
                                                <button class="btn btn-sm btn-dark w-100"><i class="bi bi-check"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-body detailProduk<?= $produk['id'] ?>">
                                        <div class="text-center mb-2">
                                            <h5 class="card-title fw-bold"><?= $produk['nama'] ?></h5>
                                            <p class="card-text fw-semibold">Rp. <?= number_format($produk['harga'], 0, '', '.') ?></p>
                                        </div>
                                        <div class="d-flex gap-2">
                                            <a href="#" onclick="editProduk(<?= $produk['id'] ?>)" class="btn btn-sm btn-dark w-100"><i class="bi bi-pencil-fill"></i></a>
                                            <a data-bs-toggle="modal" data-bs-target="#hapusProduk<?= $produk['id'] ?>" class="btn btn-sm btn-danger w-100"><i class="bi bi-trash"></i></a>
                                            <div class="modal fade" id="hapusProduk<?= $produk['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-sm">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title fs-5" id="exampleModalLabel">Anda Yakin ?</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="d-flex gap-2 w-100">
                                                                <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal" aria-label="Close">Batal</button>
                                                                <a href="<?= base_url('admin/produk/hapus/' . $produk['id']) ?>" class="btn btn-dark w-100">Ya</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

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

<div class="modal fade" id="tambahMakananModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-5" id="exampleModalLabel">Tambah Makanan</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/admin/produk" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Makanan</label>
                        <input type="text" class="form-control" name="nama">
                        <input type="hidden" class="form-control" name="kategori" value="makanan">
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="text" class="form-control" name="harga">
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" class="form-control" name="foto">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-dark">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="tambahMinumanModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-5" id="exampleModalLabel">Tambah Minuman</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/admin/produk" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Minuman</label>
                        <input type="text" class="form-control" name="nama">
                        <input type="hidden" class="form-control" name="kategori" value="minuman">
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="text" class="form-control" name="harga">
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" class="form-control" name="foto">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-dark">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="tambahPaketModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-5" id="exampleModalLabel">Tambah Paket</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/admin/produk" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Paket</label>
                        <input type="text" class="form-control" name="nama">
                        <input type="hidden" class="form-control" name="kategori" value="paket">
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="text" class="form-control" name="harga">
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" class="form-control" name="foto">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-dark">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="tambahPromoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-5" id="exampleModalLabel">Tambah Promo</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/admin/produk" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Promo</label>
                        <input type="text" class="form-control" name="nama">
                        <input type="hidden" class="form-control" name="kategori" value="promo">
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="text" class="form-control" name="harga">
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" class="form-control" name="foto">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-dark">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="tambahMenuModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-5" id="exampleModalLabel">Tambah Menu Baru</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/admin/produk" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Menu Baru</label>
                        <input type="text" class="form-control" name="nama">
                        <input type="hidden" class="form-control" name="kategori" value="menu baru">
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="text" class="form-control" name="harga">
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" class="form-control" name="foto">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-dark">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script>
    function editProduk(e) {
        $('.detailProduk' + e).addClass('d-none');
        $('.inputEditProduk' + e).removeClass('d-none');
    }

    function batalEditProduk(e) {
        $('.detailProduk' + e).removeClass('d-none');
        $('.inputEditProduk' + e).addClass('d-none');
    }
</script>
<?= $this->endSection() ?>

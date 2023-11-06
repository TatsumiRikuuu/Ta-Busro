<?= $this->extend('layouts/guest') ?>
<?= $this->section('content') ?>

<div class="container">
    <div class="row g-4">
        <?php foreach ($produks as $key => $produk) : ?>
            <div class="col-6 col-md-4 col-lg-3 ">
                <div class="card shadow-sm">
                    <img src="<?= base_url('uploads/produk/' . $produk['foto']) ?>" alt="" class="card-img-top" style="height: 180px;object-fit: cover;object-position: center;">
                    <div class="card-body">
                        <div class="text-center mb-2">
                            <h5 class="card-title fw-bold"><?= $produk['nama'] ?></h5>
                            <p class="card-text fw-semibold">Rp. <?= number_format($produk['harga'], 0, '', '.') ?></p>
                        </div>
                        <a href="<?= base_url('keranjang/tambah?produkId=' . $produk['id']) ?>" class="btn btn-dark w-100">Tambahkan</a>
                    </div>

                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?= $this->endSection() ?>

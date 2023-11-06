<?= $this->extend('layouts/guest') ?>
<?= $this->section('content') ?>

<div class="container">
    <div class="row g-4">
        <div class="col-md-7">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title">Keranjang</h5>
                </div>
                <div class="card-body bg-dark">
                    <table class="table table-dark table-bordered">
                        <tr>
                            <th style="width: 1%;">NO</th>
                            <th>Produk</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                        </tr>
                        <?php
                        $totalHarga = 0;
                        foreach ($keranjang as $key => $item) : ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $item['nama'] ?></td>
                                <td><?= $item['jumlah'] ?></td>
                                <td><?php echo $item['total'];
                                    $totalHarga += $item['total'];
                                    ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <tr class="table-light">
                            <td></td>
                            <td>Total Harga</td>
                            <td></td>
                            <td><?= $totalHarga ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Informasi Bank</h5>
                </div>
                <div class="card-body bg-dark text-white">
                    silahkan transfer(bisa dp terlebih dahulu) ke No. Rekening <span class="fs-5">
                        <b>0000001342143</b> <i>A.N XXXXXXXX</i>
                    </span>
                    lalu upload bukti
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Konfirmasi Pesanan</h5>
                </div>
                <div class="card-body bg-dark text-white">
                    <form action="<?= base_url('pesan') ?>" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="nama_pemesan" class="form-label">Nama</label>
                            <input required type="text" class="form-control" name="nama_pemesan" id="nama_pemesan">
                        </div>
                        <div class="mb-3">
                            <label for="wa_pemesan" class="form-label">No Whatsapp Aktif</label>
                            <input required type="text" class="form-control" name="wa_pemesan" id="wa_pemesan">
                        </div>
                        <div class="mb-3">
                            <label for="type" class="form-label">Apakah pesanan ini mau makan ditempat / dibawa pulang?</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="type" id="inlineRadio1" value="makan ditempat">
                                <label class="form-check-label" for="inlineRadio1">Makan Ditempat</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="type" id="inlineRadio2" value="dibawa pulang">
                                <label class="form-check-label" for="inlineRadio2">Dibawa Pulang</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="bukti_bayar" class="form-label">Bukti Bayar/DP</label>
                            <input required type="file" class="form-control" name="bukti_bayar" id="bukti_bayar">
                        </div>
                        <button class="btn btn-light w-100">Konfirmasi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

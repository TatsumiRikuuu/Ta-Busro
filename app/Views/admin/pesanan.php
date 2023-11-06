<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>

<div class="position-relative">
    <div class="position-absolute w-100 bg-dark d-block" style="height: 20vh;z-index: -99;">
    </div>
    <div class="px-4">
        <div class="pt-5">
            <h5 class="text-white fw-bold pb-5">Pesanan</h5>
            <div class="card mt-2 border-0 shadow rounded-3">
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>NO</th>
                            <th>Nama</th>
                            <th>No Whatsapp</th>
                            <th>Tanggal</th>
                            <th>Detail Pesanan</th>
                            <th>makan ditempat/bawa pulang</th>
                            <th>Status</th>
                        </tr>
                        <?php foreach ($pesanans as $key => $item) : ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $item['nama_pemesan'] ?></td>
                                <td><?= $item['wa_pemesan'] ?></td>
                                <td><?= $item['tanggal'] ?></td>
                                <td><button class="btn btn-dark w-100" data-bs-toggle="modal" data-bs-target="#cekDetail<?= $item['id'] ?>">Cek Detail</button></td>
                                <td><?= $item['type'] ?></td>
                                <td>
                                    <?php if ($item['status'] == 'selesai') : ?>
                                        <div class="text-success">
                                            <?= $item['status'] ?>
                                        </div>
                                    <?php else : ?>
                                        <a href="<?= base_url('/admin/pesanan/sukses/' . $item['id']) ?>" class="btn btn-dark"><i class="bi bi-check"></i></a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                    <?php foreach ($pesanans as $key => $item) : ?>
                        <div class="modal fade" id="cekDetail<?= $item['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Detail Pesanan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>NO</th>
                                                    <th>Produk</th>
                                                    <th>Jumlah</th>
                                                    <th>Harga</th>
                                                </tr>
                                            </thead>
                                            <?php
                                            $totalHarga = 0;
                                            foreach ($item['detail_pesanan'] as $key => $detail) : ?>
                                                <tr>
                                                    <td><?= $key + 1 ?></td>
                                                    <td><?= $detail['nama_produk'] ?></td>
                                                    <td><?= $detail['jumlah'] ?></td>
                                                    <td>Rp. <?php
                                                            $totalHarga += $detail['harga'];
                                                            echo number_format($detail['harga'], 0, '', '.') ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                            <tr>
                                                <td></td>
                                                <td>Total Harga</td>
                                                <td></td>
                                                <td>Rp. <?= number_format($totalHarga, 0, '', '.') ?></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td><button class="btn btn-dark w-100" data-bs-toggle="modal" data-bs-target="#cekBayar<?= $item['id'] ?>">Bukti Bayar/Dp</button></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="cekBayar<?= $item['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Bukti Bayar</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <img class="w-100" src="<?= base_url('uploads/pesanan/' . $item['bukti_bayar']) ?>" alt="">
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

<?= $this->endSection() ?>

<!-- app/Views/shared/cart_data.php -->

<!-- Display the cart data as needed -->
<table class="table table-dark">
    <?php foreach ($keranjang as $item) : ?>
        <tr>
            <td><?= $item['nama'] ?></td>
            <td>
                <div class="btn-group">
                    <a href="<?= $item['jumlah'] > 1 ? base_url('keranjang/kurang?produkId=' . $item['id']) : '#' ?>" class="btn btn-sm btn-dark">-</a>
                    <button class="btn btn-sm btn-dark"><?= $item['jumlah'] ?></button>
                    <a href="<?= base_url('keranjang/tambah?produkId=' . $item['id']) ?>" class="btn btn-sm btn-dark">+</a>
                </div>
            </td>
            <td><?= $item['total'] ?></td>
            <td><a href="<?= base_url('keranjang/hapus?produkId=' . $item['id']) ?>" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a></td>
        </tr>
        <!-- Display cart item details -->
    <?php endforeach; ?>
</table>

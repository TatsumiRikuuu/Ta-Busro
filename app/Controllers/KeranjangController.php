<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProdukModel;

class KeranjangController extends BaseController
{
    public function __construct()
    {
        $this->session = \Config\Services::session();
    }

    public function tambah()
    {
        $produkId = $this->request->getGet('produkId');
        $jumlah = 1;
        // Retrieve the product details (you can replace this with your own logic)
        $produk = $this->getProduk($produkId);

        if (!$this->session->has('keranjang')) {
            $this->session->set('keranjang', []);
        }
        // Retrieve the current cart data from the session
        $keranjang = $this->session->get('keranjang', []);

        // Check if the product is already in the cart
        $itemIndex = $this->findkeranjangItemIndex($keranjang, $produkId);

        if ($itemIndex !== false) {
            // Update quantity and total price if the item is already in the cart
            $keranjang[$itemIndex]['jumlah'] += $jumlah;
            $keranjang[$itemIndex]['total'] = $keranjang[$itemIndex]['jumlah'] * $keranjang[$itemIndex]['harga'];
        } else {
            // Add the product to the cart with quantity and total price
            $keranjangItem = [
                'id' => $produkId,
                'nama' => $produk['nama'],
                'harga' => $produk['harga'],
                'jumlah' => $jumlah,
                'total' => $produk['harga'] * $jumlah,
            ];

            $keranjang[] = $keranjangItem;
        }

        // Update the cart data in the session
        $this->session->set('keranjang', $keranjang);

        return redirect()->back(); // Redirect to the cart page or another appropriate page
    }
    public function kurang()
    {
        $produkId = $this->request->getGet('produkId');
        $jumlah = 1;
        // Retrieve the product details (you can replace this with your own logic)
        $produk = $this->getProduk($produkId);

        if (!$this->session->has('keranjang')) {
            $this->session->set('keranjang', []);
        }
        // Retrieve the current cart data from the session
        $keranjang = $this->session->get('keranjang', []);

        // Check if the product is already in the cart
        $itemIndex = $this->findkeranjangItemIndex($keranjang, $produkId);

        if ($itemIndex !== false) {
            // Update quantity and total price if the item is already in the cart
            $keranjang[$itemIndex]['jumlah'] -= $jumlah;
            $keranjang[$itemIndex]['total'] = $keranjang[$itemIndex]['jumlah'] * $keranjang[$itemIndex]['harga'];
        } else {
            // Add the product to the cart with quantity and total price
            $keranjangItem = [
                'id' => $produkId,
                'nama' => $produk['nama'],
                'harga' => $produk['harga'],
                'jumlah' => $jumlah,
                'total' => $produk['harga'] * $jumlah,
            ];

            $keranjang[] = $keranjangItem;
        }

        // Update the cart data in the session
        $this->session->set('keranjang', $keranjang);

        return redirect()->back(); // Redirect to the cart page or another appropriate page
    }

    private function getProduk($produkId)
    {
        $produkModel = new ProdukModel();
        $produk = $produkModel->find($produkId);
        // Replace this with your logic to retrieve product details from your database or wherever they are stored
        // For example, query the database for product details based on $productId
        return [
            'nama' => $produk['nama'], // Replace with actual product name
            'harga' => $produk['harga'], // Replace with actual product price
            // Add other product details as needed
        ];
    }

    private function findKeranjangItemIndex($keranjang, $produkId)
    {
        foreach ($keranjang as $index => $item) {
            if ($item['id'] === $produkId) {
                return $index;
            }
        }
        return false;
    }

    public function hapus()
    {
        $produkId = $this->request->getGet('produkId');

        // Retrieve the current cart data from the session
        $keranjang = $this->session->get('keranjang', []);

        // Check if the product is in the cart
        $itemIndex = $this->findKeranjangItemIndex($keranjang, $produkId);

        if ($itemIndex !== false) {
            // Remove the product from the cart if it exists
            unset($keranjang[$itemIndex]);

            // Re-index the array to maintain a continuous index
            $keranjang = array_values($keranjang);

            // Update the cart data in the session
            $this->session->set('keranjang', $keranjang);
        }

        return redirect()->back(); // Redirect to the cart page or another appropriate page
    }
}

<?php

namespace App\Controllers;

use App\Models\ProdukModel;

class Home extends BaseController
{
    public function index()
    {
        $produkModel = new ProdukModel();
        $data['produks'] = $produkModel->findAll();
        return view('home', $data);
    }

    public function makanan()
    {
        $produkModel = new ProdukModel();
        $data['produks'] = $produkModel->where('kategori', 'makanan')->findAll();
        return view('home', $data);
    }

    public function minuman()
    {
        $produkModel = new ProdukModel();
        $data['produks'] = $produkModel->where('kategori', 'minuman')->findAll();
        return view('home', $data);
    }

    public function promo()
    {
        $produkModel = new ProdukModel();
        $data['produks'] = $produkModel->where('kategori', 'promo')->findAll();
        return view('home', $data);
    }

    public function paket()
    {
        $produkModel = new ProdukModel();
        $data['produks'] = $produkModel->where('kategori', 'paket')->findAll();
        return view('home', $data);
    }

    public function menu_baru()
    {
        $produkModel = new ProdukModel();
        $data['produks'] = $produkModel->where('kategori', 'menu baru')->findAll();
        return view('home', $data);
    }
}

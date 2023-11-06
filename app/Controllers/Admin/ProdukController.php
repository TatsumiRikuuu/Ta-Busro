<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProdukModel;

class ProdukController extends BaseController
{


    public function index()
    {
        $produkModel = new ProdukModel();
        $data['produks'] = $produkModel->findAll();
        return view('admin/produk', $data);
    }

    public function filter($kategori)
    {
        $produkModel = new ProdukModel();
        $data['produks'] = $produkModel->where('kategori', $kategori)->findAll();
        return view('admin/produk', $data);
    }

    public function create()
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong'
                ]
            ],
            'harga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong'
                ]
            ],
            'kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong'
                ]
            ],
            'foto' => [
                'rules' => 'uploaded[foto]|mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]|max_size[foto,2048]',
                'errors' => [
                    'uploaded' => 'Harus Ada File yang diupload',
                    'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png',
                    'max_size' => 'Ukuran File Maksimal 2 MB'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $foto = $this->request->getFile('foto');
        $fileName = $foto->getRandomName();
        $produkModel = new ProdukModel();
        $produkModel->insert([
            'nama' => $this->request->getPost('nama'),
            'harga' => $this->request->getPost('harga'),
            'foto' => $fileName,
            'kategori' => $this->request->getPost('kategori'),
        ]);
        $foto->move('uploads/produk/', $fileName);
        session()->setFlashdata('success', 'Produk Berhasil ditambahkan');
        return redirect()->to(base_url('admin/produk'));
    }

    public function update($id)
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong'
                ]
            ],
            'harga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong'
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $produkModel = new ProdukModel();
        $produkModel->update($id, [
            'nama' => $this->request->getPost('nama'),
            'harga' => $this->request->getPost('harga'),
        ]);
        session()->setFlashdata('success', 'Produk Berhasil Update');
        return redirect()->to(base_url('admin/produk'));
    }


    public function hapus($id)
    {
        $produkModel = new ProdukModel();

        $produkModel->delete($id);
        return redirect()->to(base_url('admin/produk'));
    }
}

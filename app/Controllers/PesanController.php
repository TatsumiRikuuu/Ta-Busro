<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DetailPesananModel;
use App\Models\PesananModel;

class PesanController extends BaseController
{
    public function __construct()
    {
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $data['keranjang'] = $this->session->get('keranjang');
        return view('pesan', $data);
    }

    public function pesan()
    {
        // dd(date('d M Y'));
        $keranjang = $this->session->get('keranjang');
        if (!$this->validate([
            'nama_pemesan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong'
                ]
            ],
            'wa_pemesan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong'
                ]
            ],
            'type' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong'
                ]
            ],
            'bukti_bayar' => [
                'rules' => 'uploaded[bukti_bayar]|mime_in[bukti_bayar,image/jpg,image/jpeg,image/gif,image/png]|max_size[bukti_bayar,2048]',
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
        $buktiBayar = $this->request->getFile('bukti_bayar');
        $fileName = $buktiBayar->getRandomName();
        $pesanan = new PesananModel();
        $getIdPesanan = $pesanan->insert([
            'nama_pemesan' => $this->request->getPost('nama_pemesan'),
            'wa_pemesan' => $this->request->getPost('wa_pemesan'),
            'type' => $this->request->getPost('type'),
            'bukti_bayar' => $fileName,
            'tanggal' => date('Y-m-d'),
        ]);
        $buktiBayar->move('uploads/pesanan/', $fileName);
        $detailPesanan = new DetailPesananModel();
        foreach ($keranjang as $item) {
            $detailPesanan->insert(
                [
                    'id_pesanan' => $getIdPesanan,
                    'nama_produk' => $item['nama'],
                    'jumlah' => $item['jumlah'],
                    'harga' => $item['total'],
                ]
            );
        }
        $this->session->set('keranjang', []);
        session()->setFlashdata('success', 'Berhasil Memesan');
        return redirect()->to(base_url('/'));
    }
}

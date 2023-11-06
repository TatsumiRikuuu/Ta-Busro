<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\DetailPesananModel;
use App\Models\PesananModel;

class PesananController extends BaseController
{
    public function index()
    {
        $pesananModel = new PesananModel();
        $detailPesananModel = new DetailPesananModel();
        $pesanans = $pesananModel->orderBy('id', 'asc')->findAll();

        // Retrieve related "detail_pesanan" records for each "pesanan" record
        foreach ($pesanans as &$pesanan) {
            $pesanan['detail_pesanan'] = $detailPesananModel->where('id_pesanan', $pesanan['id'])->findAll();
        }
        $data['pesanans'] = $pesanans;

        return view('admin/pesanan', $data);
    }

    public function sukses($id)
    {
        $pesananModel = new PesananModel();
        // dd($pesananModel->find($id));
        $pesananModel->update($id, [
            'status' => 'selesai',
        ]);
        return redirect()->to(base_url('admin/pesanan'));
    }
}

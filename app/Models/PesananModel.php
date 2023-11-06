<?php

namespace App\Models;

use CodeIgniter\Model;

class PesananModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pesanan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_pemesan', 'wa_pemesan', 'tanggal', 'type', 'bukti_bayar', 'status'];

    public function detailPesanan($id_pesanan)
    {
        $detailPesananModel = new DetailPesananModel();
        return $detailPesananModel->where('id_pesanan', $id_pesanan)->findAll();
    }
}

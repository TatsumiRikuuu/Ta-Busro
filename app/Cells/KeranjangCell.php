<?php

namespace App\Cells;

use CodeIgniter\View\Cells\Cell;

class KeranjangCell extends Cell
{
    public function display()
    {
        $session = \Config\Services::session();

        if (!$session->has('keranjang')) {
            $session->set('keranjang', []);
        } else {
            $keranjang = $session->get('keranjang', []);
        }

        return view('shared/keranjang', ['keranjang' => $keranjang]);
    }
}

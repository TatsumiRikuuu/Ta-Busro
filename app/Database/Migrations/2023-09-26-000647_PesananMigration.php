<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PesananMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_pemesan' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'wa_pemesan' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'tanggal' => [
                'type'       => 'DATE',
            ],
            'type' => [
                'type' => 'ENUM',
                'constraint' => ['makan ditempat', 'dibawa pulang'],
                'default' => 'makan ditempat',
            ],
            'bukti_bayar' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['selesai', 'menunggu'],
                'default' => 'menunggu',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('pesanan');
    }

    public function down()
    {
        $this->forge->dropTable('pesanan');
    }
}

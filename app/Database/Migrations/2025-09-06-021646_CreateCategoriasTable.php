<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCategoriasTable extends Migration
{
    public function up()
{
    $this->forge->addField([
        'idcategoria' => [
            'type' => 'INT',
            'constraint' => 5,
            'auto_increment' => true
        ],
        'categoria' => [
            'type' => 'VARCHAR',
            'constraint' => '255',
        ]
    ]);
    $this->forge->addPrimaryKey('idcategoria');
    $this->forge->createTable('categorias');
}

public function down()
{
    $this->forge->dropTable('categorias');
}

}

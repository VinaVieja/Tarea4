<?php

namespace App\Models;

use CodeIgniter\Model;

class SubcategoriaModel extends Model
{
    protected $table = 'subcategorias';
    protected $primaryKey = 'idsubcategoria';
    protected $allowedFields = ['subcategoria', 'idcategoria'];

    // Relación con categorías
    public function categoria()
    {
        return $this->belongsTo('App\Models\CategoriaModel', 'idcategoria');
    }
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class RecursoModel extends Model
{
    protected $table = 'recursos';
    protected $primaryKey = 'idrecurso';
    protected $allowedFields = [
        'idsubcategoria', 'ideditorial', 'tipo', 'titulo', 'apublicacion',
        'isbn', 'numpaginas', 'rutaportada', 'rutarecurso', 'estado'
    ];

    // Relación con Subcategoría
    public function subcategoria()
    {
        return $this->belongsTo('App\Models\SubcategoriaModel', 'idsubcategoria');
    }

    // Relación con Editorial
    public function editorial()
    {
        return $this->belongsTo('App\Models\EditorialModel', 'ideditorial');
    }
}

<?php

namespace App\Controllers;

use App\Models\RecursoModel;
use App\Models\CategoriaModel;
use App\Models\SubcategoriaModel;
use App\Models\EditorialModel;

class RecursoController extends BaseController
{
    // Mostrar todos los recursos
    public function index()
    {
        $recursoModel = new RecursoModel();
        $recursos = $recursoModel->join('subcategorias', 'subcategorias.idsubcategoria = recursos.idsubcategoria')
                                 ->join('categorias', 'categorias.idcategoria = subcategorias.idcategoria')
                                 ->join('editoriales', 'editoriales.ideditorial = recursos.ideditorial')
                                 ->findAll();

        return view('recursos/listar', ['recursos' => $recursos]);
    }

    // Mostrar el formulario de creación
    public function create()
    {
        $categoriaModel = new CategoriaModel();
        $editorialModel = new EditorialModel();
        $subcategoriaModel = new SubcategoriaModel();

        $categorias = $categoriaModel->findAll();
        $editoriales = $editorialModel->findAll();
        $subcategorias = $subcategoriaModel->findAll();

        return view('recursos/registrar', [
            'categorias' => $categorias,
            'editoriales' => $editoriales,
            'subcategorias' => $subcategorias
        ]);
    }

    // Guardar un nuevo recurso
    public function store()
    {
        $recursoModel = new RecursoModel();
        $recursoModel->save([
            'idsubcategoria' => $this->request->getPost('idsubcategoria'),
            'ideditorial' => $this->request->getPost('ideditorial'),
            'tipo' => $this->request->getPost('tipo'),
            'titulo' => $this->request->getPost('titulo'),
            'apublicacion' => $this->request->getPost('apublicacion'),
            'isbn' => $this->request->getPost('isbn'),
            'numpaginas' => $this->request->getPost('numpaginas'),
            'rutaportada' => $this->request->getPost('rutaportada'),
            'rutarecurso' => $this->request->getPost('rutarecurso'),
            'estado' => $this->request->getPost('estado')
        ]);

        return redirect()->to('/recursos');
    }

    // Mostrar formulario para editar un recurso
    public function edit($id)
    {
        $recursoModel = new RecursoModel();
        $categoriaModel = new CategoriaModel();
        $editorialModel = new EditorialModel();
        $subcategoriaModel = new SubcategoriaModel();

        $recurso = $recursoModel->find($id); // Obtener el recurso que queremos editar
        $categorias = $categoriaModel->findAll();
        $editoriales = $editorialModel->findAll();
        $subcategorias = $subcategoriaModel->findAll();

        return view('recursos/editar', [
            'recurso' => $recurso,
            'categorias' => $categorias,
            'editoriales' => $editoriales,
            'subcategorias' => $subcategorias
        ]);
    }

    // Actualizar un recurso
    public function update($id)
    {
        $recursoModel = new RecursoModel();
        $recursoModel->update($id, [
            'idsubcategoria' => $this->request->getPost('idsubcategoria'),
            'ideditorial' => $this->request->getPost('ideditorial'),
            'tipo' => $this->request->getPost('tipo'),
            'titulo' => $this->request->getPost('titulo'),
            'apublicacion' => $this->request->getPost('apublicacion'),
            'isbn' => $this->request->getPost('isbn'),
            'numpaginas' => $this->request->getPost('numpaginas'),
            'rutaportada' => $this->request->getPost('rutaportada'),
            'rutarecurso' => $this->request->getPost('rutarecurso'),
            'estado' => $this->request->getPost('estado')
        ]);

        return redirect()->to('/recursos');
    }
    public function search()
{
    $query = $this->request->getGet('query');

    $recursoModel = new RecursoModel();
    $recursos = $recursoModel->join('subcategorias', 'subcategorias.idsubcategoria = recursos.idsubcategoria')
                             ->join('categorias', 'categorias.idcategoria = subcategorias.idcategoria')
                             ->join('editoriales', 'editoriales.ideditorial = recursos.ideditorial')
                             ->like('recursos.titulo', $query)
                             ->orLike('editoriales.editorial', $query)
                             ->orLike('subcategorias.subcategoria', $query)
                             ->orLike('recursos.estado', $query)
                             ->findAll();

    return view('recursos/listar', ['recursos' => $recursos]);
}
}

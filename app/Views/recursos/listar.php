<!DOCTYPE html>
<html lang="es">
<head>
    <?= $this->include('layouts/header') ?>
</head>
<body>
    <div class="container mt-5">
        <h2>Lista de Recursos</h2>

        <!-- Formulario de Búsqueda -->
        <form action="/recursos/search" method="get" class="mb-3">
            <input type="text" name="query" class="form-control" placeholder="Buscar por título, editorial, subcategoría o estado">
        </form>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Editorial</th>
                    <th>Subcategoría</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($recursos as $recurso): ?>
                    <tr>
                        <td><?= esc($recurso['titulo']) ?></td>
                        <td><?= esc($recurso['editorial']) ?></td>
                        <td><?= esc($recurso['subcategoria']) ?></td>
                        <td><?= esc($recurso['estado']) ?></td>
                        <td>
                            <a href="/recursos/edit/<?= esc($recurso['idrecurso']) ?>" class="btn btn-warning">Editar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <a href="/recursos/create" class="btn btn-primary">Registrar Recurso</a>
    </div>
</body>
</html>

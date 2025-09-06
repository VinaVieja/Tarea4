<!DOCTYPE html>
<html lang="es">
<head>
    <?= $this->include('layouts/header') ?>
</head>
<body>
    <div class="container mt-5">
        <h2>Registrar Recurso</h2>
        <form action="/recursos/store" method="post">
    <?= csrf_field() ?> <!-- Protección CSRF -->

    <div class="mb-3">
        <label for="titulo" class="form-label">Título</label>
        <input type="text" class="form-control" name="titulo" id="titulo" required>
    </div>

    <div class="mb-3">
        <label for="tipo" class="form-label">Tipo</label>
        <select name="tipo" id="tipo" class="form-select" required>
            <option value="Físico">Físico</option>
            <option value="DIGITAL">DIGITAL</option>
        </select>
    </div>

    <!-- Subcategoría -->
    <div class="mb-3">
        <label for="idsubcategoria" class="form-label">Subcategoría</label>
        <select name="idsubcategoria" id="idsubcategoria" class="form-select" required>
            <option value="">Selecciona una Subcategoría</option>
            <?php foreach ($subcategorias as $subcategoria): ?>
                <option value="<?= esc($subcategoria['idsubcategoria']) ?>"><?= esc($subcategoria['subcategoria']) ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <!-- Editorial -->
    <div class="mb-3">
        <label for="ideditorial" class="form-label">Editorial</label>
        <select name="ideditorial" id="ideditorial" class="form-select" required>
            <option value="">Selecciona una Editorial</option>
            <?php foreach ($editoriales as $editorial): ?>
                <option value="<?= esc($editorial['ideditorial']) ?>"><?= esc($editorial['editorial']) ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="estado" class="form-label">Estado</label>
        <select name="estado" id="estado" class="form-select" required>
            <option value="Bueno">Bueno</option>
            <option value="Regular">Regular</option>
            <option value="Malo">Malo</option>
        </select>
    </div>

    <button type="submit" class="btn btn-success">Registrar</button>
</form>
    </div>
</body>
</html>

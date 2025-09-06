<!DOCTYPE html>
<html lang="es">
<head>
    <?= $this->include('layouts/header') ?>
</head>
<body>
    <div class="container mt-5">
        <h2>Editar Recurso</h2>
        <form action="/recursos/update/<?= $recurso['idrecurso'] ?>" method="post">
            <?= csrf_field() ?>

            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" class="form-control" name="titulo" id="titulo" value="<?= esc($recurso['titulo']) ?>" required>
            </div>

            <div class="mb-3">
                <label for="tipo" class="form-label">Tipo</label>
                <select name="tipo" id="tipo" class="form-select" required>
                    <option value="Físico" <?= $recurso['tipo'] == 'Físico' ? 'selected' : '' ?>>Físico</option>
                    <option value="DIGITAL" <?= $recurso['tipo'] == 'DIGITAL' ? 'selected' : '' ?>>DIGITAL</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="idsubcategoria" class="form-label">Subcategoría</label>
                <select name="idsubcategoria" id="idsubcategoria" class="form-select" required>
                    <option value="">Selecciona una Subcategoría</option>
                    <?php foreach ($subcategorias as $subcategoria): ?>
                        <option value="<?= esc($subcategoria['idsubcategoria']) ?>" <?= $subcategoria['idsubcategoria'] == $recurso['idsubcategoria'] ? 'selected' : '' ?>>
                            <?= esc($subcategoria['subcategoria']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="ideditorial" class="form-label">Editorial</label>
                <select name="ideditorial" id="ideditorial" class="form-select" required>
                    <option value="">Selecciona una Editorial</option>
                    <?php foreach ($editoriales as $editorial): ?>
                        <option value="<?= esc($editorial['ideditorial']) ?>" <?= $editorial['ideditorial'] == $recurso['ideditorial'] ? 'selected' : '' ?>>
                            <?= esc($editorial['editorial']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="estado" class="form-label">Estado</label>
                <select name="estado" id="estado" class="form-select" required>
                    <option value="Bueno" <?= $recurso['estado'] == 'Bueno' ? 'selected' : '' ?>>Bueno</option>
                    <option value="Regular" <?= $recurso['estado'] == 'Regular' ? 'selected' : '' ?>>Regular</option>
                    <option value="Malo" <?= $recurso['estado'] == 'Malo' ? 'selected' : '' ?>>Malo</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Actualizar</button>
        </form>
    </div>
</body>
</html>

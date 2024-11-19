<?php require_once 'views/header.php'; ?>
<div class="container mt-4">
    <div class="row mb-4">
        <!-- Formulario de búsqueda por fabricante -->
        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0">Buscar por Fabricante</h5>
                </div>
                <div class="card-body">
                    <form method="POST" class="h-100 d-flex flex-column">
                        <div class="mb-3 flex-grow-1">
                            <select class="form-select" name="fabricante" required>
                                <option value="">Seleccione un fabricante</option>
                                <?php foreach($fabricantes as $fab): ?>
                                    <option value="<?= htmlspecialchars($fab) ?>">
                                        <?= htmlspecialchars($fab) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Buscar</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Formulario de búsqueda por tipo -->
        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-header bg-success text-white">
                    <h5 class="card-title mb-0">Buscar por Tipo</h5>
                </div>
                <div class="card-body">
                    <form method="POST" class="h-100 d-flex flex-column">
                        <div class="mb-3 flex-grow-1">
                            <select class="form-select" name="tipo" required>
                                <option value="">Seleccione un tipo</option>
                                <?php foreach($tipos as $tipo): ?>
                                    <option value="<?= htmlspecialchars($tipo) ?>">
                                        <?= htmlspecialchars($tipo) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success w-100">Buscar</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Formulario de búsqueda por precio -->
        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-header bg-info text-white">
                    <h5 class="card-title mb-0">Buscar por Precio Máximo</h5>
                </div>
                <div class="card-body">
                    <form method="POST" class="h-100 d-flex flex-column">
                        <div class="mb-3 flex-grow-1">
                            <div class="input-group">
                                <input type="number" class="form-control" name="precio" 
                                       step="0.01" min="0" required placeholder="Introduce precio máximo">
                                <span class="input-group-text">€</span>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info w-100 text-white">Buscar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php if (!empty($mensaje)): ?>
        <div class="alert <?= empty($productos) ? 'alert-warning' : 'alert-info' ?> alert-dismissible fade show">
            <?= htmlspecialchars($mensaje) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <?php if (!empty($productos)): ?>
        <div class="card">
            <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Resultados de la búsqueda</h5>
                <span class="badge bg-primary"><?= count($productos) ?> productos encontrados</span>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Producto</th>
                                <th>Precio</th>
                                <th>Fabricante</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($productos as $producto): ?>
                                <tr>
                                    <td><?= htmlspecialchars($producto['id_producto']) ?></td>
                                    <td><?= htmlspecialchars($producto['nombre']) ?></td>
                                    <td><?= number_format($producto['precio'], 2) ?>€</td>
                                    <td>
                                        <span class="badge bg-secondary">
                                            <?= htmlspecialchars($producto['fabricante']) ?>
                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
<?php require_once 'views/footer.php'; ?>
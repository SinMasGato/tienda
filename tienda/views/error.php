<?php require_once 'views/header.php'; ?>
<div class="container mt-4">
    <div class="alert alert-danger">
        <h4 class="alert-heading">Error</h4>
        <p><?= $mensaje ?? 'Ha ocurrido un error inesperado.' ?></p>
        <hr>
        <a href="?controller=preguntas&action=mostrarProductos" class="btn btn-outline-danger">Volver al inicio</a>
    </div>
</div>
<?php require_once 'views/footer.php'; ?>
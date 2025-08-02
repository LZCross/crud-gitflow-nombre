<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = $_POST["nombre"];
    $tarjeta = $_POST["tarjeta"];
    $monto = $_POST["monto"];

    $mensaje = "Pago procesado con éxito. Gracias, $nombre.";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pago</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h2>Formulario de Pago</h2>

    <?php if (isset($mensaje)): ?>
        <div class="alert alert-success"><?= $mensaje ?></div>
    <?php endif; ?>

    <form method="post" action="">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del titular</label>
            <input type="text" class="form-control" name="nombre" required>
        </div>
        <div class="mb-3">
            <label for="tarjeta" class="form-label">Número de tarjeta</label>
            <input type="text" class="form-control" name="tarjeta" required>
        </div>
        <div class="mb-3">
            <label for="monto" class="form-label">Monto</label>
            <input type="number" class="form-control" name="monto" required>
        </div>
        <button type="submit" class="btn btn-primary">Pagar</button>
    </form>
</body>
</html>

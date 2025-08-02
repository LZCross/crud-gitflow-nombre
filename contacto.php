<?php include 'header.php'; ?>

<div class="container mt-5">
  <h1 class="mb-4 text-center">Formulario de Contacto</h1>

  <?php if (isset($_GET['exito']) && $_GET['exito'] == 1): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      Mensaje enviado correctamente.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php endif; ?>

  <form action="guardar_contacto.php" method="POST" class="card p-4 shadow">
    <div class="mb-3">
      <label for="nombre" class="form-label">Nombre:</label>
      <input type="text" name="nombre" class="form-control" required>
    </div>
    <div class="mb-3">
      <label for="correo" class="form-label">Correo:</label>
      <input type="email" name="correo" class="form-control" required>
    </div>
    <div class="mb-3">
      <label for="mensaje" class="form-label">Mensaje:</label>
      <textarea name="mensaje" class="form-control" rows="4" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
  </form>

  <div class="mt-5">
    <h2 class="mb-3 comentario-titulo">Mensajes Recibidos</h2>

    <?php
      $archivo = 'mensajes.json';
      if (file_exists($archivo)) {
        $contenido = file_get_contents($archivo);
        $mensajes = json_decode($contenido, true);
        if (!is_array($mensajes)) $mensajes = [];

        $total = count($mensajes);
        echo "<p class='text-muted'>Total de mensajes: <strong>$total</strong></p>";

        echo '<div class="comentarios-contenedor">';
        foreach (array_reverse($mensajes) as $m) {
          echo '<div class="comentario-box">';
          echo '<div class="comentario-nombre">' . htmlspecialchars($m['nombre']) . ' (' . htmlspecialchars($m['correo']) . ')</div>';
          echo '<div class="comentario-texto">' . htmlspecialchars($m['mensaje']) . '</div>';
          echo '<div class="comentario-fecha">' . $m['fecha'] . '</div>';
          echo '</div>';
        }
        echo '</div>';
      } else {
        echo "<p>No hay mensajes aún.</p>";
      }
    ?>
  </div>
</div>

<?php include 'footer.php'; ?>


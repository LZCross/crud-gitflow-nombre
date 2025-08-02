<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = htmlspecialchars(trim($_POST["nombre"]));
    $correo = htmlspecialchars(trim($_POST["correo"]));
    $mensaje = htmlspecialchars(trim($_POST["mensaje"]));
    $fecha = date("Y-m-d H:i:s");

    $nuevo = [
        "nombre" => $nombre,
        "correo" => $correo,
        "mensaje" => $mensaje,
        "fecha" => $fecha
    ];

    $archivo = 'mensajes.json';
    if (file_exists($archivo)) {
        $mensajes = json_decode(file_get_contents($archivo), true);
    } else {
        $mensajes = [];
    }

    $mensajes[] = $nuevo;
    file_put_contents($archivo, json_encode($mensajes, JSON_PRETTY_PRINT));

    header("Location: contacto.php?exito=1");
    exit;
}
?>


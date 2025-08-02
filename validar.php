<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $usuario = trim($_POST["usuario"]);
  $pass = trim($_POST["password"]);

  if ($usuario === "" || $pass === "") {
    echo "Por favor, completa todos los campos.";
  } else {
    echo "Validación exitosa.";
  }
}
?>

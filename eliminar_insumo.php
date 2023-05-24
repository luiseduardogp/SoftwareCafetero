<?php
// eliminar_insumo.php

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
  // Obtener el ID del insumo a eliminar
  $id = $_GET['id'];

  // Realizar la lógica de eliminación en la base de datos
  // Establecer la conexión a la base de datos
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "softwarecafetero";

  // Crear la conexión
  $conn = new mysqli($servername, $username, $password, $database);

  // Verificar la conexión
  if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
  }

  // Sentencia SQL para eliminar el registro
  $sql = "DELETE FROM inventario WHERE id = $id";

  if ($conn->query($sql) === TRUE) {
    echo "Registro eliminado exitosamente.";
  } else {
    echo "Error al eliminar el registro: " . $conn->error;
  }

  // Cerrar la conexión
  $conn->close();

  // Redireccionar a la página principal después de eliminar el insumo
  header('Location: inventario_formulario.php');
  exit;
}

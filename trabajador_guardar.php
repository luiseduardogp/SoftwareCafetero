<?php
// trabajador_guardar.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Obtener los datos del formulario
  $nombre = $_POST['nombre'];
  $edad = $_POST['edad'];
  $direccion = $_POST['direccion'];
  $telefono = $_POST['telefono'];
  $email = $_POST['email'];
  $historialEmpleo = $_POST['historial_empleo'];
  $salario = $_POST['salario'];
  $certificaciones = $_POST['certificaciones'];

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

  // Preparar la sentencia SQL para insertar el trabajador
  $sql = "INSERT INTO trabajadores (nombre, edad, direccion, telefono, email, historial_empleo, salario, certificaciones) VALUES ('$nombre', '$edad', '$direccion', '$telefono', '$email', '$historialEmpleo', '$salario', '$certificaciones')";

  if ($conn->query($sql) === TRUE) {
    echo "Trabajador registrado exitosamente.";
    header("location:trabajador_formulario.php");
  } else {
    echo "Error al registrar el trabajador: " . $conn->error;
  }

  // Cerrar la conexión
  $conn->close();
}
?>

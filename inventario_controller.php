<?php
// Incluir el archivo de la clase "Inventario"
require_once 'inventario.php';

// Verificar si se ha enviado el formulario para agregar un nuevo insumo
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nombre = $_POST['nombre'];
  $cantidad = $_POST['cantidad'];
  $fechaAdquisicion = $_POST['fecha_adquisicion'];
  $tipo = $_POST['tipo'];

  $inventario = new Inventario();
  $resultado = $inventario->agregarInsumo($nombre, $cantidad, $fechaAdquisicion, $tipo);

  if ($resultado) {
    echo "Insumo agregado exitosamente.";
  } else {
    echo "Error al agregar el insumo.";
  }
}

// Verificar si se ha enviado el formulario para editar un insumo existente
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = $_POST['id'];
  $nombre = $_POST['nombre'];
  $cantidad = $_POST['cantidad'];
  $fechaAdquisicion = $_POST['fecha_adquisicion'];
  $tipo = $_POST['tipo'];

  $inventario = new Inventario();
  $resultado = $inventario->editarInsumo($id, $nombre, $cantidad, $fechaAdquisicion, $tipo);

  if ($resultado) {
    echo "Insumo actualizado exitosamente.";
  } else {
    echo "";
  }
}


// Renderizar la vista
include 'inventario_formulario.php';
?>

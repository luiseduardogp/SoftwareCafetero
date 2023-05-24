<?php
// Incluir el archivo de la clase "Inventario"
require_once 'inventario.php';

// Verificar si se ha enviado el formulario de edición
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
    echo "Error al actualizar el insumo.";
  }

  // Redirigir de vuelta a la página principal o mostrar un enlace para regresar
  echo "<a href='inventario_formulario.php'>Volver</a>";
} else {
  // Obtener el ID del insumo a editar desde la URL
  $id = $_GET['id'];

  $inventario = new Inventario();
  $insumo = $inventario->obtenerInsumoPorId($id); // Método para obtener los datos del insumo por su ID

  if ($insumo) {
    // Renderizar el formulario de edición con los datos del insumo
    ?>
    <!DOCTYPE html>
    <html>
    <head>
      <title>Editar Insumo</title>
    </head>
    <body>
      <h2>Editar Insumo</h2>
      <form action="editar_insumo.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $insumo['id']; ?>">
      
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $insumo['nombre']; ?>" required>
      
        <label for="cantidad">Cantidad:</label>
        <input type="number" name="cantidad" value="<?php echo $insumo['cantidad']; ?>" required>
      
        <label for="fecha_adquisicion">Fecha de Adquisición:</label>
        <input type="date" name="fecha_adquisicion" value="<?php echo $insumo['fecha_adquisicion']; ?>" required>
      
        <label for="tipo">Tipo:</label>
        <input type="text" name="tipo" value="<?php echo $insumo['tipo']; ?>" required>
      
        <input type="submit" value="Guardar Edición">
      </form>
    </body>
    </html>
    <?php
  } else {
    echo "Insumo no encontrado.";
    // Puedes redirigir de vuelta a la página principal o mostrar un enlace para regresar
    echo "<a href='inventario_formulario.php'>Volver</a>";
  }
}
?>

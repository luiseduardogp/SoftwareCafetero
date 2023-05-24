<?php
require_once 'Inventario.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Control de Inventario</title>
</head>
<body>
  <!-- Formulario para ingresar los datos de los insumos -->
  <form action="inventario_controller.php" method="POST">
    <!-- Agregar un campo oculto para enviar el ID del insumo a editar -->
    <input type="hidden" name="id" value="<?php echo $insumo['id']; ?>">
  
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" value="<?php echo isset($insumo['nombre']) ? $insumo['nombre'] : ''; ?>" required>
  
    <label for="cantidad">Cantidad:</label>
    <input type="number" name="cantidad" value="<?php echo $insumo['cantidad']; ?>" required>
  
    <label for="fecha_adquisicion">Fecha de Adquisición:</label>
    <input type="date" name="fecha_adquisicion" value="<?php echo $insumo['fecha_adquisicion']; ?>" required>
  
    <label for="tipo">Tipo:</label>
    <input type="text" name="tipo" value="<?php echo isset($insumo['tipo']) ? $insumo['tipo'] : ''; ?>" required>

  
    <!-- Cambiar el texto del botón para indicar que se trata de una edición -->
    <input type="submit" value="Guardar">
  </form>

  <!-- Mostrar la lista de insumos -->
  <h2>Lista de Insumos</h2>
  <table>
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Cantidad</th>
      <th>Fecha de Adquisición</th>
      <th>Tipo</th>
      <th>Acciones</th> <!-- Agregar una columna para las acciones -->
    </tr>
    <?php
    // Obtener los datos del inventario y mostrarlos en una tabla
    $inventario = new Inventario();
    $insumos = $inventario->obtenerInsumos(); // Método para obtener los insumos desde la base de datos
    
    foreach ($insumos as $insumo) {
      echo "<tr>";
      echo "<td>" . $insumo['id'] . "</td>";
      echo "<td>" . $insumo['nombre'] . "</td>";
      echo "<td>" . $insumo['cantidad'] . "</td>";
      echo "<td>" . $insumo['fecha_adquisicion'] . "</td>";
      echo "<td>" . $insumo['tipo'] . "</td>";
      echo "<td><a href='editar_insumo.php?id=" . $insumo['id'] . "'>Editar</a></td>"; // Agregar enlace para editar
      echo "<td><a href='eliminar_insumo.php?id=" . $insumo['id'] . "'>Eliminar</a></td>"; // Agregar enlace para eliminar
      echo "</tr>";
      
    }

    
    
    ?>
  </table>
</body>
</html>

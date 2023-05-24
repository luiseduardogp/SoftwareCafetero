<!-- trabajador_formulario.php -->
<!DOCTYPE html>
<html>
<head>
  <title>Registro de Trabajadores</title>
</head>
<body>
  <h2>Registro de Trabajadores</h2>
  
  <form method="POST" action="trabajador_guardar.php">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" required><br><br>
    
    <label for="edad">Edad:</label>
    <input type="number" name="edad"><br><br>
    
    <label for="direccion">Dirección:</label>
    <input type="text" name="direccion"><br><br>
    
    <label for="telefono">Teléfono:</label>
    <input type="text" name="telefono"><br><br>
    
    <label for="email">Email:</label>
    <input type="email" name="email"><br><br>
    
    <label for="historial_empleo">Historial de Empleo:</label>
    <textarea name="historial_empleo"></textarea><br><br>
    
    <label for="salario">Salario:</label>
    <input type="number" step="0.01" name="salario"><br><br>
    
    <label for="certificaciones">Certificaciones:</label>
    <textarea name="certificaciones"></textarea><br><br>
    
    <input type="submit" value="Guardar">
  </form>
</body>
</html>

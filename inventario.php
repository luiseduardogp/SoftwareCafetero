<?php

class inventario {
  private $db; // Conexión a la base de datos

  public function __construct() {
    // Establecer la conexión a la base de datos
    $this->db = new mysqli('localhost', 'root', '', 'softwarecafetero');
    
    // Manejo de errores en la conexión
    if ($this->db->connect_error) {
      die("Error de conexión a la base de datos: " . $this->db->connect_error);
    }
    
  }

  public function agregarInsumo($nombre, $cantidad, $fechaAdquisicion, $tipo) {
    // Escapar los valores ingresados por el usuario para prevenir inyección de SQL
    $nombre = $this->db->real_escape_string($nombre);
    $cantidad = intval($cantidad);
    $fechaAdquisicion = $this->db->real_escape_string($fechaAdquisicion);
    $tipo = $this->db->real_escape_string($tipo);

    // Crear la consulta SQL para insertar el nuevo insumo
    $query = "INSERT INTO inventario (nombre, cantidad, fecha_adquisicion, tipo) VALUES ('$nombre', $cantidad, '$fechaAdquisicion', '$tipo')";

    // Ejecutar la consulta
    if ($this->db->query($query) === true) {
      return true; // Insumo agregado exitosamente
    } else {
      return false; // Error al agregar el insumo
    }
  }
  public function obtenerInsumos() {
    $query = "SELECT * FROM inventario";
    $result = $this->db->query($query);
  
    $insumos = array();
  
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $insumos[] = $row;
      }
    }
  
    return $insumos;
  }
  public function editarInsumo($id, $nombre, $cantidad, $fechaAdquisicion, $tipo) {
    // Escapar los valores ingresados por el usuario para prevenir inyección de SQL
    $nombre = $this->db->real_escape_string($nombre);
    $cantidad = intval($cantidad);
    $fechaAdquisicion = $this->db->real_escape_string($fechaAdquisicion);
    $tipo = $this->db->real_escape_string($tipo);
  
    // Crear la consulta SQL para actualizar el insumo
    $query = "UPDATE inventario SET nombre = '$nombre', cantidad = $cantidad, fecha_adquisicion = '$fechaAdquisicion', tipo = '$tipo' WHERE id = $id";
  
    // Ejecutar la consulta
    if ($this->db->query($query) === true) {
      return true; // Insumo actualizado exitosamente
    } else {
      return false; // Error al actualizar el insumo
    }
  }
    
  public function obtenerInsumoPorId($id) {
    // Escapar el valor del ID para prevenir inyección de SQL
    $id = intval($id);
  
    // Crear la consulta SQL para obtener el insumo por su ID
    $query = "SELECT * FROM inventario WHERE id = $id";
  
    // Ejecutar la consulta
    $result = $this->db->query($query);
  
    if ($result->num_rows > 0) {
      return $result->fetch_assoc(); // Devolver los datos del insumo como un array asociativo
    } else {
      return null; // El insumo no fue encontrado
    }
  }
  

  // Otros métodos para interactuar con la base de datos y realizar operaciones relacionadas con el inventario
  // ...
}

?>

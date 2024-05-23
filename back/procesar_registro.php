<?php
include 'conexion.php'; 

$correo = filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL);
$contrasena = $_POST['contrasena'];
$nombreRestaurante = filter_var($_POST['nombre-restaurante'], FILTER_SANITIZE_STRING);
$direccion = filter_var($_POST['direccion'], FILTER_SANITIZE_STRING);
$tipoCocina = filter_var($_POST['tipo-cocina'], FILTER_SANITIZE_STRING);
$mesasTotales = filter_var($_POST['mesas-totales'], FILTER_SANITIZE_NUMBER_INT);
$mesasDisponibles = isset($_POST['mesas-disponibles']) ? filter_var($_POST['mesas-disponibles'], FILTER_SANITIZE_NUMBER_INT) : null;

$contrasenaHashed = password_hash($contrasena, PASSWORD_DEFAULT);

$sqlCheck = "SELECT id FROM restaurante WHERE correo = ?";
$stmtCheck = $conn->prepare($sqlCheck);
$stmtCheck->bind_param("s", $correo);
$stmtCheck->execute();
$stmtCheck->store_result();

if ($stmtCheck->num_rows > 0) {
    echo "El correo ya está registrado. Por favor, use otro correo.";
} else {
    $sql = "INSERT INTO restaurante (correo, contrasenya, nombre, direccion, tipo_cocina, mesas_totales, mesas_disponibles) VALUES (?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssis", $correo, $contrasenaHashed, $nombreRestaurante, $direccion, $tipoCocina, $mesasTotales, $mesasDisponibles);
    
    if ($stmt->execute()) {
        $last_id = $conn->insert_id;
        header("Location: dashboard.php?id=$last_id");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $stmt->close();
}

$stmtCheck->close();
$conn->close();
?>

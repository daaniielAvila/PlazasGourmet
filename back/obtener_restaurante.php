<?php
session_start();
include 'conexion.php';

if (isset($_SESSION['user_id'])) {
    $id = $_SESSION['user_id'];
    
    $sql = "SELECT id, correo, contrasenya, nombre, direccion, tipo_cocina, mesas_totales, mesas_disponibles FROM restaurante WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $restaurante = $result->fetch_assoc();
    } else {
        echo "No se encontraron datos para este restaurante.";
    }
    
    $stmt->close();
} else {
    echo "Usuario no autenticado.";
    header("Location: login.php");
    exit();
}

$conn->close();
?>

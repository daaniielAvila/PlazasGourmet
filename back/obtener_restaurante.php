<?php
session_start();
include 'conexion.php';

if (isset($_SESSION['user_id'])) {
    $id_restaurante = $_SESSION['user_id'];
    
     Obtener información del restaurante
    $sql_restaurante = "SELECT id, correo, contrasenya, nombre, direccion, tipo_cocina, mesas_totales, mesas_disponibles FROM restaurante WHERE id = ?";
    $stmt_restaurante = $conn->prepare($sql_restaurante);
    $stmt_restaurante->bind_param("i", $id_restaurante);
    $stmt_restaurante->execute();
    $result_restaurante = $stmt_restaurante->get_result();
    
    if ($result_restaurante->num_rows > 0) {
        $restaurante = $result_restaurante->fetch_assoc();
    } else {
        echo "No se encontraron datos para este restaurante.";
    }
    
    $stmt_restaurante->close();

    $sql_reservas = "SELECT fecha, hora, num_personas, codigo_reserva FROM reservas WHERE id_restaurante = ?";
    $stmt_reservas = $conn->prepare($sql_reservas);
    $stmt_reservas->bind_param("i", $id_restaurante);
    $stmt_reservas->execute();
    $result_reservas = $stmt_reservas->get_result();
    
    $reservas = [];
    if ($result_reservas->num_rows > 0) {
        while ($row = $result_reservas->fetch_assoc()) {
            $reservas[] = $row;
        }
    } 
    
    $stmt_reservas->close();
} else {
    echo "Usuario no autenticado.";
    header("Location: login.php");
    exit();
}

$conn->close();
?>

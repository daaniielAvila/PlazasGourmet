<?php
session_start();
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $correo = filter_input(INPUT_POST, 'correo', FILTER_SANITIZE_EMAIL);
    $contrasenya = filter_input(INPUT_POST, 'contrasenya', FILTER_SANITIZE_STRING);

    if ($correo && $contrasenya) {
        $sql = "SELECT id, contrasenya FROM restaurante WHERE correo = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        $stmt->store_result();
        
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $stored_password);
            $stmt->fetch();
            
            if ($contrasenya === $stored_password) {
                $_SESSION['user_id'] = $id;
                header("Location: dashboard.php");
                exit;
            } else {
                echo "Contraseña incorrecta.";
            }
        } else {
            echo "No existe una cuenta con ese correo.";
        }
        
        $stmt->close();
    } else {
        echo "Por favor, ingrese un correo y una contraseña válidos.";
    }
}

$conn->close();
?>

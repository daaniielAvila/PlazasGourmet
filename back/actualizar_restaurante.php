<?php
include 'conexion.php'; 

// Obtener y sanitizar datos del formulario
$id = $_POST['id'] ?? null;
$correo = filter_input(INPUT_POST, 'correo', FILTER_SANITIZE_EMAIL);
$nombreRestaurante = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
$direccion = filter_input(INPUT_POST, 'direccion', FILTER_SANITIZE_STRING);
$tipoCocina = filter_input(INPUT_POST, 'tipo_cocina', FILTER_SANITIZE_STRING);
$mesasTotales = filter_input(INPUT_POST, 'mesas_totales', FILTER_SANITIZE_NUMBER_INT);
$mesasDisponibles = filter_input(INPUT_POST, 'mesas_disponibles', FILTER_SANITIZE_NUMBER_INT);

if ($id !== null) {
    $sql = "UPDATE restaurante SET correo = ?, nombre = ?, direccion = ?, tipo_cocina = ?, mesas_totales = ?, mesas_disponibles = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssiii", $correo, $nombreRestaurante, $direccion, $tipoCocina, $mesasTotales, $mesasDisponibles, $id);

    if ($stmt->execute()) {
        echo "Datos actualizados con éxito";

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
} else {
    echo "Error: No se proporcionó un ID válido";
}

$conn->close();
?>

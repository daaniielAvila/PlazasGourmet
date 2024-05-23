<?php
include 'conexion.php';

$id_restaurante = filter_var($_POST['id_restaurante'], FILTER_SANITIZE_NUMBER_INT);
$fecha = filter_var($_POST['fecha'], FILTER_SANITIZE_STRING);
$hora = filter_var($_POST['hora'], FILTER_SANITIZE_STRING);
$num_personas = filter_var($_POST['num_personas'], FILTER_SANITIZE_NUMBER_INT);
$codigo_reserva = filter_var($_POST['codigo_reserva'], FILTER_SANITIZE_STRING);

if (!$id_restaurante || !$fecha || !$hora || !$num_personas || !$codigo_reserva) {
    die("Todos los campos son obligatorios.");
}

$sql = "INSERT INTO reservas (id_restaurante, fecha, hora, num_personas, codigo_reserva) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("isssi", $id_restaurante, $fecha, $hora, $num_personas, $codigo_reserva);

if ($stmt->execute()) {
    echo "Reserva confirmada. Código de reserva: " . $codigo_reserva;
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>

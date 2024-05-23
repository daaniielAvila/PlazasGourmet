<?php
include 'conexion.php'; 

$sql = "SELECT id, correo, contrasenya, nombre, direccion, tipo_cocina, mesas_totales, mesas_disponibles FROM restaurante";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<div class="card">';
        echo '<div class="card-content">';
        echo '<h2>' . $row["nombre"] . '</h2>';
        echo '<p><strong>Ubicación:</strong> ' . $row["direccion"] . '</p>';
        echo '<p><strong>Tipo de comida:</strong> ' . $row["tipo_cocina"] . '</p>';
        echo '<p><strong>Mesas Totales:</strong> ' . $row["mesas_totales"] . '</p>';
        echo '<p><strong>Mesas Disponibles:</strong> ' . $row["mesas_disponibles"] . '</p>';
        echo '<form action="back/confirmacion_reserva.php" method="get">'; 
        echo '<input type="hidden" name="restaurante_id" value="' . $row["id"] . '">';
        echo '<input type="hidden" name="restaurante_nombre" value="' . $row["nombre"] . '">';
        echo '<input type="hidden" name="restaurante_ubicacion" value="' . $row["direccion"] . '">';
        echo '<button type="submit" name="reservar">Reservar</button>';
        echo '</form>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo "0 resultados";
}
$conn->close();
?>

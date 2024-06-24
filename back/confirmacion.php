<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Reserva</title>
    <link rel="stylesheet" href="styles.css"> <!-- Asegúrate de crear un archivo CSS para estilos -->
</head>
<body>
    <div class="confirmation-container">
        <h1>Reserva Confirmada</h1>
        <?php
        if (isset($_GET['codigo_reserva'])) {
            $codigo_reserva = htmlspecialchars($_GET['codigo_reserva']);
            echo "<p>Su código de reserva es: <strong>$codigo_reserva</strong></p>";
        } else {
            echo "<p>No se ha proporcionado un código de reserva.</p>";
        }
        ?>
        <a href="../index.php" class="button">Volver al inicio</a>
    </div>
</body>
</html>

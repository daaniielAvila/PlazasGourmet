
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Reserva</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #000;
        }
        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 400px;
            width: 100%;
        }
        h1 {
            color: #000;
            text-align: center;
            margin-bottom: 20px;
        }
        p {
            color: #000;
            font-size: 16px;
            margin-bottom: 10px;
        }
        label {
            display: block;
            color: #000;
            font-weight: bold;
            margin-top: 10px;
        }
        input[type="date"],
        input[type="time"],
        input[type="number"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: greenyellow;
            color: #000;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button[type="submit"]:hover {
            background-color: #adff2f;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Confirmación de Reserva</h1>
        <?php
        
        function generarCodigoReserva($longitud = 8) {
            $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $codigo_reserva = '';
            for ($i = 0; $i < $longitud; $i++) {
                $codigo_reserva .= $caracteres[rand(0, strlen($caracteres) - 1)];
            }
            return $codigo_reserva;
        }
        
        $codigo_reserva = generarCodigoReserva(8);
        
        $restaurante_id = $_GET['restaurante_id'];
        $restaurante_nombre = $_GET['restaurante_nombre'];
        $restaurante_ubicacion = $_GET['restaurante_ubicacion'];

        echo "<p><strong>Restaurante:</strong> $restaurante_nombre</p>";
        echo "<p><strong>Ubicación:</strong> $restaurante_ubicacion</p>";

        
        ?>

        <form action="procesar_reserva.php" method="post">
            <input type="hidden" name="codigo_reserva" value="<?php echo $codigo_reserva; ?>">
            <input type="hidden" name="id_restaurante" value="<?php echo $restaurante_id; ?>">
            
            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" name="fecha" required>
            
            <label for="hora">Hora:</label>
            <input type="time" id="hora" name="hora" required>
            
            <label for="num_personas">Número de Personas:</label>
            <input type="number" id="num_personas" name="num_personas" min="1" required>

            <button type="submit" name="reservar">Confirmar Reserva</button>
        </form>
    </div>
</body>
</html>

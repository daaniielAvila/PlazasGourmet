<?php 
include 'obtener_restaurante.php'; 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>

<div class="sidebar" id="sidebar">
  
    <ul>
        <li id="infoBtn">Inicio</li>
        <li id="reservasBtn">Reservas</li>
        <li><a href="logout.php" id="logoutBtn" class="logout-link">Logout</a></li>
    </ul>
</div>

<div class="dashboard-container" id="dashboardContainer">
    <div class="header">
        <h1>Dashboard</h1>
    </div>
    
    <div class="content">
        <h2>Datos del Restaurante</h2>
        <form action="actualizar_restaurante.php" method="post">
            <input type="hidden" name="id" value="<?php echo $restaurante['id']; ?>">
            <div class="form-group">
                <label for="correo">Correo:</label>
                <input type="email" id="correo" name="correo" value="<?php echo htmlspecialchars($restaurante['correo']); ?>">
            </div>
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($restaurante['nombre']); ?>">
            </div>
            <div class="form-group">
                <label for="direccion">Dirección:</label>
                <input type="text" id="direccion" name="direccion" value="<?php echo htmlspecialchars($restaurante['direccion']); ?>">
            </div>
            <div class="form-group">
                <label for="tipo_cocina">Tipo de Cocina:</label>
                <input type="text" id="tipo_cocina" name="tipo_cocina" value="<?php echo htmlspecialchars($restaurante['tipo_cocina']); ?>">
            </div>
            <div class="form-group">
                <label for="mesas_totales">Mesas Totales:</label>
                <input type="number" id="mesas_totales" name="mesas_totales" value="<?php echo htmlspecialchars($restaurante['mesas_totales']); ?>">
            </div>
            <div class="form-group">
                <label for="mesas_disponibles">Mesas Disponibles:</label>
                <div class="mesas-disponibles">
                    <button type="button" id="decrementarMesas">-</button>
                    <span id="mesasDisponibles"><?php echo htmlspecialchars($restaurante['mesas_disponibles']); ?></span>
                    <button type="button" id="incrementarMesas">+</button>
                </div>
            </div>
            <div class="form-group">
                <button type="submit">Guardar Cambios</button>
            </div>
        </form>
    </div>
</div>

<script>
    const decrementarMesasBtn = document.getElementById('decrementarMesas');
    const incrementarMesasBtn = document.getElementById('incrementarMesas');
    const mesasDisponiblesSpan = document.getElementById('mesasDisponibles');
    const mesasDisponiblesInput = document.createElement('input');
    mesasDisponiblesInput.type = 'hidden';
    mesasDisponiblesInput.name = 'mesas_disponibles';
    mesasDisponiblesInput.value = mesasDisponiblesSpan.textContent;
    document.querySelector('form').appendChild(mesasDisponiblesInput);

    decrementarMesasBtn.addEventListener('click', () => {
        if (parseInt(mesasDisponiblesInput.value) > 0) {
            mesasDisponiblesInput.value = parseInt(mesasDisponiblesInput.value) - 1;
            mesasDisponiblesSpan.textContent = mesasDisponiblesInput.value;
        }
    });

    incrementarMesasBtn.addEventListener('click', () => {
        mesasDisponiblesInput.value = parseInt(mesasDisponiblesInput.value) + 1;
        mesasDisponiblesSpan.textContent = mesasDisponiblesInput.value;
    });
</script>

</body>
</html>

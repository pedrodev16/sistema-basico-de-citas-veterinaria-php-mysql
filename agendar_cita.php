<?php
include 'db.php';

$sql = "SELECT id, nombre FROM usuarios";
$result = $conn->query($sql);

$usuarios = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $usuarios[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Agendar Cita</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <a class="btn" href="index.php">HOME</a>
        <h2 class="mt-4">Agendar Cita</h2>
        <form action="agendar_cita_action.php" method="post">
            <div class="form-group">
                <label for="usuario_id">Usuario:</label>
                <select id="usuario_id" name="usuario_id" class="form-control" required>
                    <option value="">Seleccione un usuario</option>
                    <?php foreach ($usuarios as $usuario): ?>
                        <option value="<?= $usuario['id'] ?>"><?= $usuario['nombre'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="fecha">Fecha:</label>
                <input type="date" id="fecha" name="fecha" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="hora">Hora:</label>
                <input type="time" id="hora" name="hora" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="descripcion">Nombre mascota:</label>
                <textarea id="nombre_m" name="nombre_m" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="descripcion">Especie:</label>
                <textarea id="especie" name="especie" class="form-control" required></textarea>
            </div>
            <input type="submit" value="Agendar Cita" class="btn btn-primary">
        </form>
    </div>
</body>

</html>
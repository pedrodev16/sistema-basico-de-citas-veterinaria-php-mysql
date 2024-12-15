<?php
include 'db.php';

$id = $_GET['id'];

$sql = "SELECT * FROM citas WHERE id = $id";
$result = $conn->query($sql);
$cita = $result->fetch_assoc();

$sql_usuarios = "SELECT id, nombre FROM usuarios";
$result_usuarios = $conn->query($sql_usuarios);

$usuarios = [];
if ($result_usuarios->num_rows > 0) {
    while ($row = $result_usuarios->fetch_assoc()) {
        $usuarios[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar Cita</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <a class="btn" href="index.php">HOME</a>
        <h2 class="mt-4">Editar Cita</h2>

        <?php


        ?>
        <form action="editar_cita_action.php" method="post" class="form-group">
            <input type="hidden" name="id" value="<?= $cita['id'] ?>">
            <div class="form-group">
                <label for="usuario_id">Usuario:</label>
                <select id="usuario_id" name="usuario_id" class="form-control" required>
                    <option value="">Seleccione un usuario</option>

                    <?php
                    foreach ($usuarios as $usuario): ?>
                        <option value="<?= $usuario['id'] ?>" <?= $usuario['id'] == $cita['usuario_id'] ? 'selected' : '' ?>><?= $usuario['nombre'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="fecha">Fecha:</label>
                <input type="date" id="fecha" name="fecha" class="form-control" value="<?= $cita['fecha'] ?>" required>
            </div>
            <div class="form-group">
                <label for="hora">Hora:</label>
                <input type="time" id="hora" name="hora" class="form-control" value="<?= $cita['hora'] ?>" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" class="form-control" required><?= $cita['descripcion'] ?></textarea>
            </div>
            <div class="form-group">
                <label for="descripcion">Nombre:</label>
                <textarea id="descripcion" name="nombre_m" class="form-control" required><?= $cita['nombre_m'] ?></textarea>
            </div>
            <div class="form-group">
                <label for="descripcion">Especie:</label>
                <textarea id="descripcion" name="especie" class="form-control" required><?= $cita['especie'] ?></textarea>
            </div>
            <input type="submit" value="Guardar Cambios" class="btn btn-primary">
        </form>
    </div>
</body>

</html>
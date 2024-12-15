<?php
include 'db.php';

$sql = "SELECT c.id, u.nombre, c.fecha, c.hora, c.descripcion 
        FROM citas c 
        JOIN usuarios u ON c.usuario_id = u.id";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Ver Citas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <a class="btn" href="index.php">HOME</a>
        <h2 class="mt-4">Lista de Citas</h2>
        <?php if ($result->num_rows > 0): ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Usuario</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= $row["id"] ?></td>
                            <td><?= $row["nombre"] ?></td>
                            <td><?= $row["fecha"] ?></td>
                            <td><?= $row["hora"] ?></td>
                            <td><?= $row["descripcion"] ?></td>
                            <td>
                                <a class="btn btn-sm btn-info" href="editar_cita.php?id=<?= $row['id'] ?>">Editar</a>
                                <a class="btn btn-sm btn-danger" href="eliminar_cita.php?id=<?= $row['id'] ?>" onclick="return confirm('¿Estás seguro de que deseas eliminar esta cita?');">Eliminar</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="alert alert-primary" role="alert">
                No hay citas agendadas
            </div>
        <?php endif; ?>
    </div>
</body>

</html>
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
 <a class="btn" href="index.php">HOME</a>
 <?php
    include 'db.php';

    $id = $_POST['id'];
    $usuario_id = $_POST['usuario_id'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $descripcion = $_POST['descripcion'];
    $nombre_m = $_POST['nombre_m'];
    $especie = $_POST['especie'];
    $sql = "UPDATE citas SET usuario_id='$usuario_id', fecha='$fecha', hora='$hora', descripcion='$descripcion', nombre_m='$nombre_m', especie='$especie' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Cita actualizada exitosamente</div>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

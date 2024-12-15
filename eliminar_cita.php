<?php
include 'db.php';

$id = $_GET['id'];

$sql = "DELETE FROM citas WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "<div class='alert alert-Success'>Cita eliminada exitosamente</div>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

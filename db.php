<?php
$servername = "localhost";
$username = "root"; // Cambia si es necesario
$password = ""; // Cambia si es necesario
$dbname = "sistema_citas";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

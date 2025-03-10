<?php
$host = "localhost";
$user = "root"; // Usuario de MySQL en XAMPP
$pass = ""; // En XAMPP, la contraseña suele estar vacía
$dbname = "IdentityDB";

// Crear conexión
$mysqli = new mysqli("localhost", "root", "", "IdentityDB");

// Verificar conexión
if ($mysqli->connect_error) {
    die("Error de conexión: " . $mysqli->connect_error);
}
?>

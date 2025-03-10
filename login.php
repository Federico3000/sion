<?php
session_start();
require 'config.php'; // Conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        echo "<script>alert('Por favor, completa todos los campos'); window.location.href='index.html';</script>";
        exit();
    }

    // Verificación provisional para superadmin y rey-jesus
    if ($username === "superadmin" && $password === "superadmin") {
        $_SESSION['user_id'] = 1; // ID ficticio para superadmin
        $_SESSION['username'] = "superadmin";
        $_SESSION['iglesia_id'] = 1; // ID ficticio para iglesia
        $_SESSION['role'] = "superadmin"; // Rol de superadmin

        header("Location: dashboard.php");
        exit();
    } elseif ($username === "rey-jesus" && $password === "rey-jesus") {
        $_SESSION['user_id'] = 2; // ID ficticio para rey-jesus
        $_SESSION['username'] = "rey-jesus";
        $_SESSION['iglesia_id'] = 2; // ID ficticio para iglesia
        $_SESSION['role'] = "user"; // Rol de usuario normal

        header("Location: dashboard.php");
        exit();
    } else {
        // Buscar el usuario en la base de datos (código original)
        $stmt = $mysqli->prepare("SELECT id, iglesia_id, password, role FROM usuarios WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($user_id, $iglesia_id, $db_password, $role);
        $stmt->fetch();
        $stmt->close();

        // Verificar si el usuario existe y la contraseña es correcta
        if ($user_id && $password === $db_password) {
            $_SESSION['user_id'] = $user_id;
            $_SESSION['username'] = $username;
            $_SESSION['iglesia_id'] = $iglesia_id;
            $_SESSION['role'] = $role;

            header("Location: dashboard.php");
            exit();
        } else {
            echo "<script>alert('Usuario o contraseña incorrectos'); window.location.href='index.html';</script>";
            exit();
        }
    }
}
?>
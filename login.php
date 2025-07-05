<?php
session_start();
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $pass = $_POST["password"];

    $stmt = $conexion->prepare("SELECT id, password, tipo FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows == 1) {
        $usuario = $resultado->fetch_assoc();
        if (password_verify($pass, $usuario["password"])) {
            $_SESSION["user_id"] = $usuario["id"];
            $_SESSION["tipo"] = $usuario["tipo"];

            //  Autenticación por tipo de usuario
            if ($usuario["tipo"] == "admin") {
                header("Location: admin.php");
            } else {
                header("Location: dashboard.php");
            }
            exit();
        } else {
            $error = "Contraseña incorrecta.";
        }
    } else {
        $error = "Usuario no encontrado.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="login-container">
        <h2>Iniciar sesión</h2>

        <?php if (isset($_GET['registro']) && $_GET['registro'] == 'ok') echo "<p class='success'>Registro exitoso. Ahora puedes iniciar sesión.</p>"; ?>
        <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>

        <form method="POST" action="">
            <input type="email" name="email" placeholder="Correo electrónico" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <button type="submit">Entrar</button>
        </form>

        <p><a href="recover-password.php">¿Olvidaste tu contraseña?</a></p>
        <p><a href="index.php">Volver al inicio</a></p>
    </div>
</body>
</html>

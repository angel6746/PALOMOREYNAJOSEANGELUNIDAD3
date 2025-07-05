<?php
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $tipo = $_POST["tipo"];

    $stmt = $conexion->prepare("INSERT INTO usuarios (nombre, email, password, tipo) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nombre, $email, $password, $tipo);

    if ($stmt->execute()) {
        header("Location: login.php?registro=ok");
        exit();
    } else {
        $error = "Error al registrar usuario: " . $conexion->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="login-container">
        <h2>Registro de nuevo usuario</h2>
        <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
        
        <form method="POST" action="">
            <input type="text" name="nombre" placeholder="Nombre completo" required>
            <input type="email" name="email" placeholder="Correo electrónico" required>
            <input type="password" name="password" placeholder="Contraseña" required>

            <select name="tipo" required>
                <option value="" disabled selected>Selecciona tipo de usuario</option>
                <option value="usuario">Usuario</option>
                <option value="admin">Administrador</option>
            </select>

            <button type="submit">Registrar</button>
        </form>
        
        <p><a href="login.php">¿Ya tienes cuenta? Inicia sesión</a></p>
        <p><a href="index.php">Volver al inicio</a></p>
    </div>
</body>
</html>

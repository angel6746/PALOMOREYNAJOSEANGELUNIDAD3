<?php
include "config.php";

if (isset($_GET["token"])) {
    $token = $_GET["token"];
    $stmt = $conexion->prepare("SELECT id FROM usuarios WHERE token_recover = ? AND token_expira > NOW()");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows == 1) {
        $usuario = $resultado->fetch_assoc();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $new_pass = password_hash($_POST["password"], PASSWORD_DEFAULT);
            $stmt2 = $conexion->prepare("UPDATE usuarios SET password = ?, token_recover = NULL, token_expira = NULL WHERE id = ?");
            $stmt2->bind_param("si", $new_pass, $usuario["id"]);
            $stmt2->execute();
            $mensaje = "Contraseña actualizada. <a href='login.php'>Iniciar sesión</a>";
        }
    } else {
        $error = "El enlace no es válido o ya expiró.";
    }
} else {
    $error = "No se recibió token.";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Restablecer contraseña</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="login-container">
        <h2>Restablecer contraseña 🔑</h2>

        <?php if (isset($mensaje)) echo "<p class='success'>$mensaje</p>"; ?>
        <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>

        <?php if (!isset($mensaje) && isset($usuario)): ?>
        <form method="POST" action="">
            <input type="password" name="password" placeholder="Nueva contraseña" required>
            <button type="submit">Guardar contraseña</button>
        </form>
        <?php endif; ?>

        <p><a href="login.php">Volver al login</a></p>
    </div>
</body>
</html>

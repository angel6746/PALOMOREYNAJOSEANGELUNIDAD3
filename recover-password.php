<?php
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $token = bin2hex(random_bytes(32));
    $expira = date("Y-m-d H:i:s", strtotime("+1 hour"));

    $stmt = $conexion->prepare("UPDATE usuarios SET token_recover = ?, token_expira = ? WHERE email = ?");
    $stmt->bind_param("sss", $token, $expira, $email);

    if ($stmt->execute() && $stmt->affected_rows > 0) {
        // Enviar enlace por correo en proyecto real, aquí solo mostramos el link
        $mensaje = "Copia este enlace para recuperar tu contraseña:<br>
        <a href='reset-password.php?token=$token'>Restablecer contraseña</a>";
    } else {
        $error = "El correo no está registrado.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Recuperar contraseña</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="login-container">
        <h2>Recuperar contraseña 🔐</h2>

        <?php if (isset($mensaje)) echo "<p class='success'>$mensaje</p>"; ?>
        <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>

        <form method="POST" action="">
            <input type="email" name="email" placeholder="Correo electrónico" required>
            <button type="submit">Enviar enlace</button>
        </form>

        <p><a href="login.php">Volver al login</a></p>
    </div>
</body>
</html>

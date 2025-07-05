<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio - Mi Sitio Web</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="container">
        <h1>Saber Hacer unidad 3
        </h1>

        <?php if (isset($_SESSION["user_id"])): ?>
            <p>Estás conectado como <strong><?php echo $_SESSION["tipo"]; ?></strong></p>
            <a href="<?php echo $_SESSION['tipo'] == 'admin' ? 'admin.php' : 'dashboard.php'; ?>" class="btn">Ir a tu panel</a>
            <a href="logout.php" class="btn logout">Cerrar sesión</a>
        <?php else: ?>
            <a href="login.php" class="btn">Iniciar sesión</a>
            <a href="register.php" class="btn">Registrarse</a>
        <?php endif; ?>
    </div>
</body>
</html>

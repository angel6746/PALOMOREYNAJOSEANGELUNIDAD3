<?php
include "auth.php";
proteger("admin");
include "config.php";

$id = $_SESSION["user_id"];

$stmt = $conexion->prepare("SELECT nombre, email, tipo FROM usuarios WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();
$usuario = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Administrador</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="container">
        <h2>Bienvenido, <?php echo htmlspecialchars($usuario["nombre"]); ?> </h2>
        <p>Estos son tus datos:</p>
        <ul>
            <li><strong>Nombre:</strong> <?php echo htmlspecialchars($usuario["nombre"]); ?></li>
            <li><strong>Correo:</strong> <?php echo htmlspecialchars($usuario["email"]); ?></li>
            <li><strong>Tipo:</strong> <?php echo htmlspecialchars($usuario["tipo"]); ?></li>
        </ul>
        <a href="index.php" class="btn">Inicio</a>
        
    </div>
</body>
</html>

<?php
session_start();
function proteger($tipo_requerido) {
    if (!isset($_SESSION["user_id"]) || $_SESSION["tipo"] != $tipo_requerido) {
        header("Location: login.php");
        exit();
    }
}

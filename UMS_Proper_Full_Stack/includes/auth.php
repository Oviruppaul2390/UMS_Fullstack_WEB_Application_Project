<?php
if (session_status() === PHP_SESSION_NONE) session_start();

function require_login($role = null) {
    if (!isset($_SESSION["user"])) {
        header("Location: ../login.php");
        exit;
    }
    if ($role !== null && $_SESSION["user"]["role"] !== $role) {
        header("Location: ../login.php");
        exit;
    }
}

function e($value) {
    return htmlspecialchars((string)$value, ENT_QUOTES, "UTF-8");
}
?>
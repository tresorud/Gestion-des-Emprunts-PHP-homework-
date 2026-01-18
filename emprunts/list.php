<?php
session_start();

    require_once '../auth/login.php';
    $req = $pdo->prepare("SELECT * FROM emprunt");
?>
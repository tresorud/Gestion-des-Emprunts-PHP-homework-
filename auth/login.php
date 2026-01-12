<?php
    require_once '../config/db.php';

    // connexion à la bse de données par PDO

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$db",$user,$pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
        die("Erreur :". $e->getMessage());
    }
    
    if ($pdo) {
        echo "Connexion reussie <br>";
    }
?>
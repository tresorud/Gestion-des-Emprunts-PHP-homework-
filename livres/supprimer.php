<?php
require 'db.php';

// On vérifie si l'ID est présent dans l'URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Préparation de la requête de suppression
    $stmt = $pdo->prepare("DELETE FROM Livre WHERE CodeLivre = ?");
    $stmt->execute([$id]);
}

// Redirection vers la page principale
header("Location: index.php");
exit();
?>
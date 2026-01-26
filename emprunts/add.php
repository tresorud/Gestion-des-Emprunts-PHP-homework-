<?php 
session_start();
require '../auth/login.php'; 

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sql = "INSERT INTO emprunter (CodeLivre, CodeEtudiant, DateEmprunt, date_fin, status) VALUES (:n, :p, CURRENT_TIMESTAMP, DATE_ADD(CURRENT_TIMESTAMP, INTERVAL 3 DAY), :d)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':n' => $_POST['id_livre'],
        ':p' => $_SESSION['id'],
        ':d'=> 'en_cours',
    ]);
    header("Location: ../user/dashboard.php");
    exit();
}
?>
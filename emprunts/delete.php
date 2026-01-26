<?php
session_start();
    require_once '../auth/login.php';

    if (isset($_GET['etudiant'],$_GET['livre'])) {
        $elt = $pdo->prepare('UPDATE emprunter SET status = "remis" WHERE CodeLivre = :id_liv and CodeEtudiant = :id_etu');
        $elt->execute(array('id_liv'=>$_GET['livre'],'id_etu'=>$_GET['etudiant']));
        // redirection
        header('Location: list.php');
    }
?>
<?php
session_start();
    require_once '../auth/login.php';

    if (isset($_GET['etudiant'])) {
        $elt = $pdo->prepare('DELETE FROM etudiant WHERE CodeEtudiant = :id_etu');
        $elt->execute(array('id_etu'=>$_GET['etudiant']));
        if ($elt) {
            $_SESSION['delete_etu'] = True;
        }
        // redirection

        header('Location: list.php');
    }
?>
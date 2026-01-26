<?php
session_start();
    require_once '../auth/login.php';

    if (isset($_GET['livre'])) {
        $elt = $pdo->prepare('DELETE FROM livre WHERE CodeLivre = :id_liv');
        $elt->execute(array('id_liv'=>$_GET['livre']));
        if ($elt) {
            $_SESSION['delete_liv'] = True;
        }
        // redirection

        header('Location: list.php');
    }
?>
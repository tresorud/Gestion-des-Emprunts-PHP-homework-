<?php

session_start();

// Supprimer toutes les variables de session
$_SESSION = [];

// Détruire la session
session_destroy();

// Redirection vers la page de connexion ou d'accueil
header("Location: ./index.php");
exit;

?>
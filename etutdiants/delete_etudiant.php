
<?php
include './auth/login.php'; // chemin

if (isset($_GET['id'])) {
    $id_etudiant = $_GET['id'];

    $sql = "DELETE FROM etudiant WHERE id_etudiant = $id_etudiant";

    if ($conn->query($sql) === TRUE) {
        header("Location: etudiant.php");
        exit();
    } else {
        echo "<div class='alert alert-danger'>Erreur lors de la suppression: " . $conn->error . "</div>";
    }
} else {
    header("Location: patients.php"); // rediriger si aucun id n`est fourni
    exit();
}

$conn->close();
?>
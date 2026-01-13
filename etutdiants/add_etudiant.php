
<?php

include './auth/login.php'; // liee avec la bd

$page_title = "Ajouter un etudiant";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $adresse = $_POST['adresse'];
    $classe= $_POST['classe'];
   
    

    $sql = "INSERT INTO etudiant (`nom`, `prenom`, `adresse`, `classe`) VALUES ('$nom', '$prenom', '$adresse', '$classe')";

    if ($conn->query($sql) === TRUE) {
        header("Location: etudiant.php");
        exit();
    } else {
        echo "<div class='alert alert-danger'>Erreur: " . $sql . "<br>" . $conn->error . "</div>";
    }
}
?>


        <div id="content" class="p-4">
            <h2 class="mb-4">Ajouter un nouveau etudiant</h2> <!-- formulaire ajout -->
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom" required>
                </div>
                <div class="mb-3">
                    <label for="prenom" class="form-label">Prénom</label>
                    <input type="text" class="form-control" id="prenom" name="prenom" required>
                </div>
                <div class="mb-3">
                    <label for="adresse" class="form-label">adresse</label>
                    <input type="text" class="form-control" id="adresse" name="adresse" required>
                </div>
                <div class="mb-3">
                    <label for="classe" class="form-label">classe</label>
                    <input type="text" class="form-control" id="classe" name="classe" required>
                </div>
                
              
               
                <button type="submit" class="btn btn-success"><i class="bi bi-plus-circle me-2"></i>Ajouter</button>
                <a href="etudiant.php" class="btn btn-secondary"><i class="bi bi-x-circle me-2"></i>Annuler</a>
            </form>
        </div>

<?php
$conn->close();
?>


<?php
include './auth/login.php'; // chemin 

$page_title = "Modifier un etudiant";

if (isset($_GET['id'])) {
    $id_etudiant = $_GET['id'];

    // recuperation des donner de l`etudiant
    $sql_select = "SELECT * FROM etudiant WHERE id_etudiant = $id_etudiant";
    $result_select = $conn->query($sql_select);

    if ($result_select->num_rows > 0) {
        $etudiant= $result_select->fetch_assoc();
    } else {
        echo "<div class='alert alert-danger'>etudiant non trouvé.</div>";
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_patient = $_POST['id_patient'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $adresse = $_POST['adresse'];
    $classe = $_POST['classe'];
  
    

    $sql_update = "UPDATE etudiant SET
                    `nom` = '$nom',
                    `prenom` = '$prenom',
                    `adresse` = '$adresse',
                    `classe` = '$classe',
                    
                    WHERE `id_etudiant` = $id_etudiant";

    if ($conn->query($sql_update) === TRUE) {
        header("Location: etudiant.php");
        exit();
    } else {
        echo "<div class='alert alert-danger'>Erreur lors de la mise à jour: " . $conn->error . "</div>";
    }
}
?>


        <div id="content" class="p-4">
            <h2 class="mb-4">Modifier un etudiant</h2>
            <form method="POST" action="">
                <input type="hidden" name="id_etudiant" value="<?php echo $etudiant['id_etudiant']; ?>">
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $etudiant['nom']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="prenom" class="form-label">Prénom</label>
                    <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo $etudiant['prenom']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="adresse" class="form-label">adresse</label>
                    <input type="text" class="form-control" id="adresse" name="adresse" value="<?php echo $etudiant['adresse']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="classe" class="form-label">classe</label>
                    <input type="text" class="form-control" id="classe" name="classe" value="<?php echo $etudiant['classe']; ?>" required>
                </div>
    
             
                <button type="submit" class="btn btn-success"><i class="bi bi-check-circle me-2"></i>Mettre à jour</button>
                <a href="etudiant.php" class="btn btn-secondary"><i class="bi bi-x-circle me-2"></i>Annuler</a>
            </form>
        </div>

<?php
$conn->close();
?>

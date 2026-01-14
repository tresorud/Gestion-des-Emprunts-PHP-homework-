<?php 
require 'db.php'; 
include 'header.php';

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sql = "INSERT INTO Livre (Titre, Auteur, DateEdition) VALUES (:t, :a, :d)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':t' => $_POST['titre'],
        ':a' => $_POST['auteur'],
        ':d' => $_POST['date_ed']
    ]);
    header("Location: index.php");
    exit();
}
?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow border-0">
            <div class="card-header bg-success text-white text-center">
                <h4 class="mb-0">Ajouter un Nouveau Livre</h4>
            </div>
            <div class="card-body p-4">
                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Titre du livre</label>
                        <input type="text" name="titre" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Auteur</label>
                        <input type="text" name="auteur" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Date d'Édition</label>
                        <input type="date" name="date_ed" class="form-control" required>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-success">Enregistrer l'ouvrage</button>
                        <a href="index.php" class="btn btn-outline-secondary">Retour</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php echo '</div></body></html>'; ?>
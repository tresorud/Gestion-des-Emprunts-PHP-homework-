<?php 
require 'db.php'; 
include 'header.php';

// 1. Récupérer le livre à modifier
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM Livre WHERE CodeLivre = ?");
    $stmt->execute([$id]);
    $livre = $stmt->fetch();
}

// 2. Traiter la mise à jour
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sql = "UPDATE Livre SET Titre = ?, Auteur = ?, DateEdition = ? WHERE CodeLivre = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $_POST['titre'],
        $_POST['auteur'],
        $_POST['date_ed'],
        $id
    ]);
    header("Location: index.php");
    exit();
}
?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow border-0">
            <div class="card-header bg-warning text-dark text-center">
                <h4 class="mb-0">Modifier l'ouvrage #<?= htmlspecialchars($id) ?></h4>
            </div>
            <div class="card-body p-4">
                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Titre du livre</label>
                        <input type="text" name="titre" class="form-control" value="<?= htmlspecialchars($livre['Titre']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Auteur</label>
                        <input type="text" name="auteur" class="form-control" value="<?= htmlspecialchars($livre['Auteur']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Date d'Édition</label>
                        <input type="date" name="date_ed" class="form-control" value="<?= $livre['DateEdition'] ?>" required>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-warning fw-bold">Mettre à jour</button>
                        <a href="index.php" class="btn btn-light border">Annuler</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php echo '</div></body></html>'; ?>
<?php 
require '../auth/login.php'; 

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sql = "INSERT INTO etudiant (Nom, Prenom, Classe, Adresse, motdepasse) VALUES (:n, :p, :c, :a, :m)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':n' => $_POST['nom'],
        ':p' => $_POST['prenom'],
        ':c' => $_POST['classe'],
        ':a' => $_POST['adresse'],
        ':m' => $_POST['password']
    ]);
    header("Location: list.php");
    exit();
}
?>
<style>
    .centrer{
        position: absolute !important;
        top: 50% !important;
        left: 50% !important;
        transform: translate(-50%,-50%) !important;
    }
    @media (max-width:640px) {
        .centrer{
            width: 80% !important;
        }
    }
</style>
<body class="px-3">
    <div class="row">
        <div class="col-md-8 col-sm-6">
            <div class="centrer w-50 card shadow border-0">
                <div class="card-header bg-success text-white text-center">
                    <h4 class="mb-0">Ajouter un Nouveau etudiant</h4>
                </div>
                <div class="card-body p-4">
                    <form method="POST">
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
                         <div class="mb-3">
                            <label for="classe" class="form-label">Mot de pase</label>
                            <input type="text" class="form-control" id="classe" name="password" required>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-success">Enregistrer l'etudiant</button>
                            <a href="list.php" class="btn btn-outline-secondary">Retour</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
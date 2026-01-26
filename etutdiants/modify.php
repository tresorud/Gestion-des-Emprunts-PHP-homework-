<?php 
require '../auth/login.php'; 

// recuperation de l'identifiant de l'etudiant

if (isset($_GET['etudiant'])) {
    // recuperation des donner de l`etudiant
    $sql_select = $pdo->prepare("SELECT * FROM etudiant WHERE CodeEtudiant = :code");
    $sql_select->execute(array(':code'=>$_GET['etudiant']));
    $result_select = $sql_select->fetch(PDO::FETCH_ASSOC);
}else {
        header("Location: list.php");
}

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sql = "UPDATE etudiant SET Nom = :n, Prenom = :p, Classe = :c, Adresse = :a, motdepasse = :m WHERE CodeEtudiant = :code";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':n' => $_POST['nom'],
        ':p' => $_POST['prenom'],
        ':c' => $_POST['classe'],
        ':a' => $_POST['adresse'],
        ':m' => $_POST['password'],
        ':code' => $_GET['etudiant'],
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
                    <h4 class="mb-0">Modifier un etudiant</h4>
                </div>
                <div class="card-body p-4">
                    <form method="POST">
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="nom" name="nom" value="<?=$result_select['Nom']?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="prenom" class="form-label">Prénom</label>
                            <input type="text" class="form-control" id="prenom" name="prenom" value="<?= $result_select['Prenom']?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="adresse" class="form-label">adresse</label>
                            <input type="text" class="form-control" id="adresse" name="adresse" value="<?= $result_select['Adresse']?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="classe" class="form-label">classe</label>
                            <input type="text" class="form-control" id="classe" name="classe" value="<?= $result_select['Classe']?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="classe" class="form-label">Mot de pase</label>
                            <input type="text" class="form-control" id="classe" name="password" value="<?= $result_select['motdepasse']?>" required>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-success">Modifier l'etudiant</button>
                            <a href="list.php" class="btn btn-outline-secondary">Retour</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
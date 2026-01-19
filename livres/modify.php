<?php 
require '../auth/login.php'; 

// recuperation de l'identifiant de l'etudiant

if (isset($_GET['livre'])) {
    // recuperation des donner de l`etudiant
    $sql_select = $pdo->prepare("SELECT * FROM livre WHERE CodeLivre = :code");
    $sql_select->execute(array(':code'=>$_GET['livre']));
    $result_select = $sql_select->fetch(PDO::FETCH_ASSOC);
}else {
        header("Location: list.php");
}

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sql = "UPDATE livre SET Titre = :n, Auteur = :p, DateEdition = :c WHERE CodeLivre = :code";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':n' => $_POST['titre'],
        ':p' => $_POST['auteur'],
        ':c' => $_POST['date'],
        ':code' => $_GET['livre'],
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
                    <h4 class="mb-0">Modifier un Livre</h4>
                </div>
                <div class="card-body p-4">
                    <form method="POST">
                        <div class="mb-3">
                            <label for="titre" class="form-label">Titre</label>
                            <input type="text" class="form-control" id="titre" name="titre" value="<?=$result_select['Titre']?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="auteur" class="form-label">Auteur</label>
                            <input type="text" class="form-control" id="auteur" name="auteur" value="<?= $result_select['Auteur']?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label">Date Edition</label>
                            <input type="date" class="form-control" id="Date Edition" name="date" value="<?= $result_select['DateEdition']?>" required>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-success">Modifier le livre</button>
                            <a href="list.php" class="btn btn-outline-secondary">Retour</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
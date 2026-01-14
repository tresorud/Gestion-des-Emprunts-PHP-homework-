<?php require 'db.php'; include 'header.php'; ?>
<div class="card shadow-sm">
    <div class="card-body">
        <div class="d-flex justify-content-between mb-3">
            <h3>Liste des ouvrages</h3>
            <a href="ajouter.php" class="btn btn-success">Ajouter un livre</a>
        </div>
        <table class="table table-hover">
            <thead class="table-dark">
                <tr><th>Code</th><th>Titre</th><th>Auteur</th><th>Edition</th><th>Actions</th></tr>
            </thead>
            <tbody>
                <?php 
                $stmt = $pdo->query("SELECT * FROM Livre");
                while($l = $stmt->fetch()) { ?>
                    <tr>
                        <td><?= $l['CodeLivre'] ?></td>
                        <td><?= $l['Titre'] ?></td>
                        <td><?= $l['Auteur'] ?></td>
                        <td><?= $l['DateEdition'] ?></td>
                        <td>
                            <a href="modifier.php?id=<?= $l['CodeLivre'] ?>" class="btn btn-sm btn-warning">Modifier</a>
                            <a href="supprimer.php?id=<?= $l['CodeLivre'] ?>" class="btn btn-sm btn-danger">Supprimer</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php echo "</div></body></html>"; ?>
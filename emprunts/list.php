<?php
session_start();

    require_once '../auth/login.php';
    
    // recuperation des emprunts
    $req_emp = $pdo->prepare("SELECT * FROM emprunter");
    $req_emp->execute();
    $emprunts = $req_emp->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Étudiant | Bibliothèque</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../bootstrap-5.0.2/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f5f7fb;
            font-family: "Segoe UI", sans-serif;
        }

        .sidebar {
            position: fixed;
            width: 240px;
            height: 100vh;
            background: #0d6efd;
            color: white;
            padding-top: 20px;
        }

        .sidebar .logo {
            text-align: center;
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 12px 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 5px 15px;
            border-radius: 8px;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background-color: rgba(255, 255, 255, 0.2);
        }

        .content {
            padding: 25px;
        }

        .topbar {
            background: white;
            border-radius: 12px;
            padding: 15px 20px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            margin-bottom: 25px;
        }

        .stat-card {
            background: white;
            border-radius: 18px;
            padding: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.06);
        }

        @media (max-width: 768px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
            }

            .content {
                margin-left: 0;
            }
        }
        th{
            color: white !important;
        }
        .cursor-none{
            cursor: not-allowed !important;
            pointer-events: none !important;
            opacity: 0.85 !important;
        }
    </style>
</head>

<body>
<!-- CONTENT -->
<?php if(isset($_SESSION['delete'])):?>
    <div class='alert alert-success' role='alert'>
            l'emprunt a été supprimé avec success !!
    </div>
<?php endif?>
<div class="content">

    <!-- TOPBAR -->
    <div class="topbar d-flex justify-content-center flex-column">
    <h4 class="mb-4 fw-bold text-center py-3">📚📕 Listes Des Livres Empruntés</h4>
    <div class="container mt-3 p-0">
        <div class="row mb-3">
            <div class="col-2">
                <a href="../admin/dashboard.php" class="btn btn-success btn-sm">retour</a>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col">
                <table class="table table-responsive table-hover table-striped">
                    <thead class="bg-primary text-light">
                        <th>numero</th>
                        <th>Nom et Prenom</th>
                        <th>Nom du ivre</th>
                        <th>Date d'emprunt</th>
                        <th>Date de retour</th>
                        <th>status</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php foreach ($emprunts as $key => $emprunt) {  ?>
                            <?php 
                                $titre = $pdo->prepare("SELECT livre.Titre ,etudiant.Nom, etudiant.Prenom FROM emprunter 
                                INNER JOIN livre ON emprunter.CodeLivre = livre.CodeLivre 
                                INNER JOIN etudiant ON emprunter.CodeEtudiant = etudiant.CodeEtudiant 
                                WHERE emprunter.CodeLivre =:id");
                                $titre->execute(array('id'=> $emprunt['CodeLivre']));
                                $titre = $titre->fetch(PDO::FETCH_ASSOC);
                            ?>
                        <tr>
                            <td><?= ++$key ?></td>
                            <td><?= $titre['Nom'].' '.$titre['Prenom'] ?></td>
                            <td><?= $titre['Titre'] ?></td>
                            <td><?= $emprunt['DateEmprunt'] ?></td>
                            <td><?= $emprunt['date_fin'] ?></td>
                            <td>
                                <a href="#" class="btn cursor-none <?= $emprunt['status'] == 'en_cours' ? 'btn-info' : 'btn-success' ?> btn-sm"><?= $emprunt['status'] ?></a>
                            </td>
                            <td>
                                <a href="delete.php?etudiant=<?=$emprunt['CodeEtudiant']?>&livre=<?=$emprunt['CodeLivre']?>" class="btn btn-danger btn-sm">Retour</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</body>
</html>

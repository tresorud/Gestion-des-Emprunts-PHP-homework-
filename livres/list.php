<?php
session_start();

    require_once '../auth/login.php';
    
    // recuperation des etudiants
    $req_livre = $pdo->prepare("SELECT * FROM livre");
    $req_livre->execute();
    $livres = $req_livre->fetchAll();
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
<div class="content">

    <!-- TOPBAR -->
    <div class="topbar d-flex justify-content-center flex-column">
    <h4 class="mb-4 fw-bold text-center py-3">📚📕 Listes Des Livres</h4>
    <div class="container mt-3 p-0">
        <div class="row mb-3 ">
            <div class="col-2">
                <a href="add.php" class="btn btn-success btn-sm px-2">Ajouter un livre</a>
            </div>
             <div class="col-2 m-0 p-0">
                <a href="../admin/dashboard.php" class="btn btn-primary btn-sm px-4">retour</a>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col">
                <table class="table table-responsive table-hover table-striped">
                    <thead class="bg-primary text-light">
                        <th>numero</th>
                        <th>Nom du livre</th>
                        <th>Auteur</th>
                        <th>Date edition</th>
                        <th>Supprimer livre</th>
                        <th>Modifier</th>
                    </thead>
                    <tbody>
                        <?php foreach ($livres as $key => $livre) {  ?>
                        <tr>
                            <td><?= ++$key ?></td>
                            <td><?= $livre['Titre'] ?></td>
                            <td><?= $livre['Auteur'] ?></td>
                            <td><?= $livre['DateEdition'] ?></td>
                            <td class="text-center">
                                <a href="delete.php?livre=<?=$livre['CodeLivre']?>" class="btn btn-danger w-75">Delete</a>
                            </td>
                            <td class="text-center">
                                <a href="modify.php?livre=<?=$livre['CodeLivre']?>" class="btn btn-primary w-100">Modifier</a>
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

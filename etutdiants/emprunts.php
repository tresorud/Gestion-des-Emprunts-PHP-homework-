<?php
session_start();
require_once '../auth/login.php';

/* Sécurité minimale */
if (!isset($_SESSION['name'])) {
    header("Location: login.php");
    exit;
}
// recuperation des emprunts
    $req_emp = $pdo->prepare('SELECT * FROM emprunter WHERE CodeEtudiant = :id_etudiant');
    $req_emp->execute(
        array('id_etudiant'=> $_SESSION['id'])
    );
    $emprunts = $req_emp->fetchAll();
$path = 'mes_emprunts.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Étudiant | Bibliothèque</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

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
            margin-left: 240px;
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
        .cursor-none{
            cursor: not-allowed !important;
            pointer-events: none !important;
            opacity: 0.85 !important;
        }
    </style>
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <div class="logo">
        <i class="bi bi-book-fill"></i> Biblio Tech
    </div>

    <a href="../user/dashboard.php" class="<?php $active = ($path == 'dashboard.php' ? 'active': '') ?><?php echo $active?>">
        <i class="bi bi-book"></i> Livres
    </a>

    <a href="./emprunts.php" class="<?php $active = ($path == 'mes_emprunts.php' ? 'active': '') ?><?php echo $active?>">
        <i class="bi bi-arrow-left-right"></i> Mes emprunts
    </a>
</div>

<!-- CONTENT -->
<div class="content">

    <!-- TOPBAR -->
    <div class="topbar d-flex justify-content-between align-items-center">
        <div>
            <strong><?= htmlspecialchars($_SESSION['name']) ?></strong><br>
            <small class="text-muted">Étudiant</small>
        </div>

        <a href="../logout.php" class="btn btn-outline-danger btn-sm">
            <i class="bi bi-box-arrow-right"></i> Déconnexion
        </a>
    </div>

    <h4 class="mb-4 fw-bold">📚📕 Listes Des Livres Empruntés</h4>
    <div class="container mt-3">
        <div class="row d-flex justify-content-center">
            <div class="col">
                <table class="table table-responsive table-hover table-striped">
                    <thead class="bg-primary text-light">
                        <th>numero</th>
                        <th>Name</th>
                        <th>Date d'emprunt</th>
                        <th>Date de retour</th>
                        <th>status</th>
                    </thead>
                    <tbody>
                        <?php foreach ($emprunts as $key => $emprunt) {  ?>
                            <?php 
                                $titre = $pdo->prepare('SELECT Titre FROM livre WHERE CodeLivre = :id');
                                $titre->execute(array('id'=> $emprunt['CodeLivre']));
                                $titre = $titre->fetch(PDO::FETCH_ASSOC);
                            ?>
                        <tr>
                            <td><?= ++$key ?></td>
                            <td><?= $titre['Titre']?></td>
                            <td><?= $emprunt['DateEmprunt'] ?></td>
                            <td><?= $emprunt['date_fin'] ?></td>
                            <td>
                                <a href="#" class="btn <?= $emprunt['status'] == 'en_cours' ? 'btn-danger' : 'btn-success' ?> btn-sm"><?= $emprunt['status'] ?></a>
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

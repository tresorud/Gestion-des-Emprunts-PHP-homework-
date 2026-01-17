<?php
session_start();
require_once '../auth/login.php';

/* Sécurité minimale */
if (!isset($_SESSION['name'])) {
    header("Location: login.php");
    exit;
}

$id_etudiant = $_SESSION['name'];

/* Recherche */
$search = $_GET['search'] ?? '';

$sql = "SELECT * FROM livre WHERE titre LIKE ?";
$stmt = $pdo->prepare($sql);
$stmt->execute(['%' . $search . '%']);
$livres = $stmt->fetchAll();
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
    </style>
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <div class="logo">
        <i class="bi bi-book-fill"></i> Biblio Tech
    </div>

    <a href="dashboard.php" class="active">
        <i class="bi bi-book"></i> Livres
    </a>

    <a href="mes_emprunts.php">
        <i class="bi bi-arrow-left-right"></i> Mes emprunts
    </a>

    <a href="livres_remis.php">
        <i class="bi bi-check-circle"></i> Livres remis
    </a>
</div>

<!-- CONTENT -->
<div class="content">

    <!-- TOPBAR -->
    <div class="topbar d-flex justify-content-between align-items-center">
        <div>
            <strong><?= htmlspecialchars($_SESSION['nom']) ?></strong><br>
            <small class="text-muted">Étudiant</small>
        </div>

        <a href="../logout.php" class="btn btn-outline-danger btn-sm">
            <i class="bi bi-box-arrow-right"></i> Déconnexion
        </a>
    </div>

    <h4 class="mb-4 fw-bold">📚 Livres disponibles</h4>

    <!-- RECHERCHE -->
    <form method="GET" class="mb-4">
        <div class="input-group w-50">
            <input type="text" name="search" class="form-control"
                   placeholder="Rechercher un livre..."
                   value="<?= htmlspecialchars($search) ?>">
            <button class="btn btn-primary">
                <i class="bi bi-search"></i>
            </button>
        </div>
    </form>

    <!-- LISTE DES LIVRES -->
    <div class="row g-4">

        <?php if (count($livres) === 0): ?>
            <p class="text-muted">Aucun livre trouvé.</p>
        <?php endif; ?>

        <?php foreach ($livres as $livre): ?>
            <div class="col-12 col-md-4">
                <div class="stat-card h-100 d-flex flex-column justify-content-between">
                    <div>
                        <h5 class="fw-bold"><?= htmlspecialchars($livre['titre']) ?></h5>
                        <p class="text-muted mb-3">
                            Auteur : <?= htmlspecialchars($livre['auteur'] ?? 'Inconnu') ?>
                        </p>
                    </div>

                    <form method="POST" action="emprunts/add.php">
                        <input type="hidden" name="id_livre" value="<?= $livre['id_livre'] ?>">
                        <button class="btn btn-primary w-100">
                            <i class="bi bi-plus-circle"></i> Emprunter (3 jours)
                        </button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>

    </div>

</div>

</body>
</html>

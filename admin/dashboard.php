<?php 
    session_start();
    // recupération du nombre d'éleve
    $req_user = $pdo->prepare("SELECT * FROM etudiants");
    $req_user->execute();
    $nb_user = $req_user->rowCount();

    // recupération du nombre de livres
    $req_book = $pdo->prepare("SELECT * FROM livres");
    $req_book->execute();
    $nb_book = $req_book->rowCount();

    // recupération du nombre d'emprunts
    $req_emp = $pdo->prepare("SELECT * FROM emprunts");
    $req_emp->execute();
    $nb_emp = $req_emp->rowCount();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Biblio Tech</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../bootstrap-5.0.2/dist/css/bootstrap.min.css">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<style>
    body {
        background-color: #f5f7fb;
        font-family: "Segoe UI", sans-serif;
    }
    /* Sidebar */
    
    .sidebar {
        position: fixed;
        top: 0;
        left: 0;
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
        font-size: 15px;
    }
    
    .sidebar a:hover,
    .sidebar a.active {
        background-color: rgba(255, 255, 255, 0.2);
    }
    /* Content */
    
    .content {
        margin-left: 240px;
        padding: 25px;
    }
    /* Topbar */
    
    .topbar {
        background: white;
        border-radius: 12px;
        padding: 15px 20px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        margin-bottom: 25px;
    }
    /* Profile */
    
    .profile-box {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 10px;
    }
    /* Cards */
    
    .stat-card {
        border: none;
        border-radius: 18px;
        padding: 25px;
        background: white;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.06);
    }
    
    .icon-circle {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 26px;
        color: white;
    }
    /* Responsive */
    
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

<body>

    <!-- SIDEBAR -->
    <div class="sidebar">
        <div class="logo">
            <i class="bi bi-book-fill"></i> Biblio Tech
        </div>

        <a href="./dashboard.php" class="active"><i class="bi bi-speedometer2"></i> Dashboard</a>
        <a href="./users.php"><i class="bi bi-people"></i> Étudiants</a>
        <a href="livres.php"><i class="bi bi-book"></i> Livres</a>
        <a href="emprunts.php"><i class="bi bi-arrow-left-right"></i> Emprunts</a>
    </div>

    <!-- CONTENT -->
    <div class="content">

        <!-- TOPBAR -->
        <div class="topbar text-end">

            <!-- PROFIL -->
            <div class="profile-box justify-content-end">
                <i class="bi bi-person-circle fs-3 text-primary"></i>
                <div class="text-start">
                    <strong><?php echo $_SESSION["nom"] ?></strong><br>
                    <small class="text-muted">Administrateur</small>
                </div>
            </div>

            <!-- DECONNEXION -->
            <a href="../logout.php" class="btn btn-outline-danger btn-sm">
                <i class="bi bi-box-arrow-right"></i> Déconnexion
            </a>
        </div>

        <h4 class="mb-4 fw-bold">Tableau de bord</h4>

        <div class="row g-4">

            <!-- Étudiants -->
            <div class="col-12 col-md-4">
                <div class="stat-card">
                    <div class="d-flex align-items-center">
                        <div class="icon-circle bg-primary">
                            <i class="bi bi-people"></i>
                        </div>
                        <div class="ms-3">
                            <small class="text-muted">Total Étudiants</small>
                            <h3 class="fw-bold mb-0"><?echo $nb_user?></h3>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Livres -->
            <div class="col-12 col-md-4">
                <div class="stat-card">
                    <div class="d-flex align-items-center">
                        <div class="icon-circle bg-success">
                            <i class="bi bi-book"></i>
                        </div>
                        <div class="ms-3">
                            <small class="text-muted">Total Livres</small>
                            <h3 class="fw-bold mb-0"><?echo $nb_book?></h3>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Emprunts -->
            <div class="col-12 col-md-4">
                <div class="stat-card">
                    <div class="d-flex align-items-center">
                        <div class="icon-circle bg-warning">
                            <i class="bi bi-arrow-left-right"></i>
                        </div>
                        <div class="ms-3">
                            <small class="text-muted">Total Emprunts</small>
                            <h3 class="fw-bold mb-0"><?echo $nb_emp?></h3>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</body>

</html>
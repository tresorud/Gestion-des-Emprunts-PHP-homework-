<?php 
    session_start();
    // recupération du nombre d'éleve
    require_once "../auth/login.php";
    $req_user = $pdo->prepare("SELECT * FROM etudiant");
    $req_user->execute();
    $nb_user = $req_user->rowCount();

    // recupération du nombre de livres
    $req_book = $pdo->prepare("SELECT * FROM livre");
    $req_book->execute();
    $nb_book = $req_book->rowCount();

    // recupération du nombre d'emprunts
    $req_emp = $pdo->prepare("SELECT * FROM emprunter");
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
    .sidebar-menu .nav-link, .sidebar .nav-link {
        color: #fff !important;
        padding: 10px 15px;
    }

    .sidebar-menu .nav-link:hover, .sidebar .nav-link:hover {
        color: #fff !important;
    }

    .sidebar-menu .collapse .nav-link {
        font-size: 0.9rem;
        opacity: 0.9;
    }
</style>

<body>

    <!-- SIDEBAR -->
    <div class="sidebar">
        <div class="logo">
            <i class="bi bi-book-fill"></i> Biblio Tech
        </div>

        <a href="./dashboard.php" class="active"><i class="bi bi-speedometer2"></i> Dashboard</a>

        <!-- Les Etudiants  -->
       
        <li class="nav-item">
            <a class="nav-link d-flex justify-content-between align-items-center"
                data-bs-toggle="collapse"
                href="#menuEtudiants">
                <span>
                <i class="bi bi-people"></i> Étudiants
                </span>
                <i class="bi bi-chevron-down"></i>
            </a>

            <ul class="collapse nav flex-column ms-3" id="menuEtudiants">
                <li class="nav-item">
                    <a class="nav-link" href="../etudiants/add.php">Ajouter</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../etudiants/modify.php">Modifier</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../etudiants/delete.php">Supprimer</a>
                </li>
            </ul>
        </li>

        <!-- fin du lien etudiants -->
        
    <ul class="nav flex-column sidebar-menu">

    <!-- LIVRES -->
    <li class="nav-item">
        <a class="nav-link d-flex justify-content-between align-items-center"
        data-bs-toggle="collapse"
        href="#menuLivres"
        role="button"
        aria-expanded="false">
        <span>
            <i class="bi bi-book"></i> Livres
        </span>
        <i class="bi bi-chevron-down"></i>
        </a>

        <ul class="collapse nav flex-column ms-3" id="menuLivres">
            <li class="nav-item">
                <a class="nav-link" href="../livres/add.php">Ajouter un livre</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../livres/modify.php">Modifier un livre</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../livres/delete.php">Supprimer un livre</a>
            </li>
        </ul>
    </li>

</ul>

<!-- Lien pour les emprunts -->

<li class="nav-item">
  <a class="nav-link d-flex justify-content-between align-items-center"
     data-bs-toggle="collapse"
     href="#menuEmprunts">
    <span>
      <i class="bi bi-arrow-left-right"></i> Emprunts
    </span>
    <i class="bi bi-chevron-down"></i>
  </a>

  <ul class="collapse nav flex-column ms-3" id="menuEmprunts">
    <li class="nav-item">
      <a class="nav-link" href="../emprunts/add.php">Nouvel emprunt</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../emprunts/return.php">Retour livre</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../emprunts/list.php">Historique</a>
    </li>
  </ul>
</li>


    </div>

    <!-- CONTENT -->
    <div class="content">

        <!-- TOPBAR -->
        <div class="topbar text-end">

            <!-- PROFIL -->
            <div class="profile-box justify-content-start">
                <i class="bi bi-person-circle fs-3 text-primary"></i>
                <div class="text-start">
                    <strong><?php echo $_SESSION["name"] ?></strong><br>
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
                            <h3 class="fw-bold mb-0"><?php echo $nb_user?></h3>
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
                            <h3 class="fw-bold mb-0"><?php echo $nb_book?></h3>
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
                            <h3 class="fw-bold mb-0"><?php echo $nb_emp?></h3>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
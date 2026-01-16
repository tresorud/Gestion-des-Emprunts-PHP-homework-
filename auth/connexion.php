<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGN IN</title>
    <link rel="shortcut icon" href="../assets/4165.jpg" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/sign.css">
    <link rel="stylesheet" href="../bootstrap-5.0.2/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<!-- traitement des données du formulaire -->
    <?php
    require_once "./login.php"; //connexion à la base de donnée
    var_dump($_POST);
    if (isset($_POST["name"] ) && isset($_POST["pass"])) {
        
        $name = trim($_POST["name"]);
        $password = trim($_POST["pass"]);
        $role = trim($_POST["role"]);

        //recherche de l'utilisateur dans la base de donnée
        if ($role == "user") {
            $request = $pdo->prepare("SELECT (nom,prenom) FROM etudiants WHERE (nom = :name) && (motdepasse = :password)");
            $request->execute(
                [
                    ':name'=> $name,
                    ':password'=> $password
                ]
            );
            if ( !$request || $request->rowCount() == 0) {
                echo '
                    <div class="container-fluid min-vh-100 d-flex justify-content-center align-items-center">
                        <div class="col-8 col-md-6 d-flex gap-4 alert alert-danger justify-content-center align-content-center p-2 flex-column">
                            <div class="col p-2 mt-3">
                                    Utilisateur '.$name.' non trouvé veillez réessayer
                            </div>
                            <div class="col d-flex justify-content-end">
                                <button class="btn btn-danger p-1">
                                    <a class="texterr" href="./sign.php">réessayer</a>
                                </button>
                            </div>
                        </div>
                    </div>
                ';
            }else {
                header('Location : check_session.php');
            }
        }

        // gestion de la connexion des admins

        if ($role == "admin") {
            $request = $pdo->prepare("SELECT (nom,prenom) FROM administrateurs WHERE (nom = :name) && (motdepasse = :password)");
            $request->execute(
                [
                    ':name'=> $name,
                    ':password'=> $password
                ]
            );
            if ( !$request || $request->rowCount() == 0) {
                echo '
                    <div class="container-fluid min-vh-100 d-flex justify-content-center align-items-center">
                        <div class="col-8 col-md-6 d-flex gap-4 alert alert-danger justify-content-center align-content-center p-2 flex-column">
                            <div class="col p-2 mt-3">
                                    Utilisateur '.$name.' non trouvé veillez réessayer
                            </div>
                            <div class="col d-flex justify-content-end">
                                <button class="btn btn-danger p-1">
                                    <a class="texterr" href="./sign.php">réessayer</a>
                                </button>
                            </div>
                        </div>
                    </div>
                ';
            }else {
                header('Location : check_session.php');
            }
        }
    }
?>
</body>
</html>
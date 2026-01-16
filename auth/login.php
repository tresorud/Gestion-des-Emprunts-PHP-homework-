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
    <?php
        require_once '../config/db.php';

        // connexion à la bse de données par PDO

        try {
            $pdo = new PDO("mysql:host=$host;dbname=$db",$user,$pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            die('<div class="container-fluid min-vh-100 d-flex justify-content-center align-items-center">
                    <div class="col-8 col-md-6 d-flex gap-4 alert alert-danger justify-content-center align-content-center p-2 flex-column">
                        <div class="col d-flex justify-content-end">
                            <a class="texterr" href="./sign.php">
                                <button class="btn btn-close p-1"></button>
                            </a>
                        </div>
                        <div class="col p-2">'. $e->getMessage().'
                        </div>
                    </div>
                </div>');
        }
    ?>
</body>
</html>
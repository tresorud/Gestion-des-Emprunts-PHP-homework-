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
    <div class="global container-fluid min-vh-100 d-flex justify-content-center align-items-center p-5 p-md-3 p-sm-2">
        <div class="box-min container w-100 d-flex p-0 shadow-sm">
            <div class="col d-none d-lg-flex image align-items-center p-5">
                <div class="text-blur col p fw-semi-bold mt-xl-3 text-left">
                    Bienvenue' dans un <span class=" fw-bold text-primary">univers</span> avec une infinté de possibilté
                </div>
            </div>
            <div class="col d-flex flex-column p-3 ">
                <div class="container">
                    <div class="col">
                        <i class="bx bx-facebook text-md-center"></i>
                    </div>
                    <div class="col-12 text-xl-center text-md-start text-primary mb-md-4 mb-5 fs-4 fw-semi-bold">Connnexion</div>
                </div>
                <form action="./chech_session.php" method="post" class="d-flex flex-column g-2 w-100 h-100">
                    <div class="col">
                        <label class="d-block w-100 fs-6" for="name">Nom</label>
                        <input type="text" class="w-100 border border-primary rounded-2 p-2" name="name" id="name">
                    </div>
                    <div class="col">
                        <label class="d-block w-100 fs-6" for="pass">Mot de passe</label>
                        <input type="password" class="w-100 border border-primary rounded-2 p-2" name="pass" id="pass">
                    </div>
                    <div class="col">
                        <label class="d-block w-100 fs-6" for="role">Rôle</label>
                        <select name="role" id="role" class="w-100 border border-primary rounded-2 p-2">
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                    </div>
                    <div class="submit col">
                        <div class="btn btn-primary w-100 fs-5 rounded-3 p-2" onclick="verify()">Connexion</div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="../js/verification.js"></script>
</body>
</html>
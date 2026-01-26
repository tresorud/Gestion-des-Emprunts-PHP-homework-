<?php
    $title = "Page d'acceuil";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo "$title" ?></title>
    <link href="./assets/css/styles.css" rel="stylesheet" />
    <link rel="shortcut icon" href="./assets/4165.jpg" type="image/x-icon">
</head>
<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
        <div class="container">
            <a class="navbar-brand" href="./index.php">Biblio Tech</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="./auth/sign.php">Sign In</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Header-->
    <header class="masthead text-center text-white">
        <div class="masthead-content">
            <div class="container p-3 p-md-5">
                <h1 class="masthead-heading mt-3 mt-sm-2 pb-4">Une Bibliothèque pour vous</h1>
                <h2 class="masthead-subheading mb-0 py-3">Evadez-vous du monde avec des livres faits pour vous</h2>
                <a class="btn btn-xl rounded-pill mt-5" href="#scroll">Learn More</a>
            </div>
        </div>
    </header>
    <!-- Content section 1-->
    <section id="scroll">
        <div class="container px-5">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6 order-lg-2 d-flex justify-content-center">
                    <div class="p-5"><img class="img-fluid" src="./assets/grayscale-shot-books.jpg" alt="..." /></div>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="p-5">
                        <h2 class="display-4">For those about to rock...</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod aliquid, mollitia odio veniam sit iste esse assumenda amet aperiam exercitationem, ea animi blanditiis recusandae! Ratione voluptatum molestiae adipisci, beatae obcaecati.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Content section 2-->
    <section>
        <div class="container px-5">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6 d-flex justify-content-center">
                    <div class="p-5"><img class="img-fluid" src="./assets/abstract_hand_painted_modern_art_canvas_design_0507.jpg" alt="..." /></div>
                </div>
                <div class="col-lg-6">
                    <div class="p-5">
                        <h2 class="display-4">We salute you!</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod aliquid, mollitia odio veniam sit iste esse assumenda amet aperiam exercitationem, ea animi blanditiis recusandae! Ratione voluptatum molestiae adipisci, beatae obcaecati.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Content section 3-->
    <section>
        <div class="container px-5">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6 order-lg-2 d-flex justify-content-center">
                    <div class="p-5"><img class="img-fluid" src="./assets/4165.jpg" alt="..." /></div>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="p-5">
                        <h2 class="display-4">Let there be rock!</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod aliquid, mollitia odio veniam sit iste esse assumenda amet aperiam exercitationem, ea animi blanditiis recusandae! Ratione voluptatum molestiae adipisci, beatae obcaecati.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="py-5 bg-primary">
        <div class="container px-5"><p class="m-0 text-center text-white small">Copyright &copy; Your Website 2023</p></div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="./assets/js/scripts.js"></script>

</body>
</html>
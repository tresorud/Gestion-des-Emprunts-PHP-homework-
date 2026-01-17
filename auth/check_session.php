<?php

    session_start();
    // definissons les variables de sessions

    if ($_SESSION["role"] === 'admin') {
        echo '<script>window.location.href="../admin/dashboard.php"</script>';
        exit();
    }elseif ($_SESSION['role'] === 'user') {
        echo '    <script>window.location.href="../user/dashboard.php"</script>';
        exit();
    }

?>
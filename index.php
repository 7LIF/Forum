<?php

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 68b301b24d0b9c015fc2d00bfe5e105855021941
    session_start();
    $session_user = null;

    if (isset($_SESSION['user'])) {
        include 'header.php';

        echo '
            <div class=message">
                <strong>'. $_SESSION['user'].'</strong> Já se encontra ligado ao site.<br><br>
                <a href="forum.php">Avançar</a>
            </div>';

        include 'footer.php';
        exit;
    }

    ///////////////////////////////

    include 'header.php';

    if ($session_user == null) {
        include 'login.php';
    }

    include 'footer.php';
<<<<<<< HEAD
=======
=======
session_start();
$session_user = null;

if (isset($_SESSION['user'])) {
    include 'header.php';
    echo '<div class=mensagem">
            <strong>' . $_SESSION['user'] . '</strong> Já se encontra ligado ao site.<br><br>
            <a href="forum.php">Avançar</a>
            </div>';

            include 'footer.php';
            exit;
}

include 'header.php';

if ($session_user == null) {
    include 'login.php';
}

include 'footer.php';
>>>>>>> ece13da5d2d14e637a829ba1d11fd171a760c408
>>>>>>> 68b301b24d0b9c015fc2d00bfe5e105855021941

<?php

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

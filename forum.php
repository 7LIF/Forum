<?php
    session_start();

    if(!isset($_SESSION["user"])){
        include 'header.php';
        echo '
            <div class="error">
                Não tem permissão para ver o conteúdo do fórum.<br><br>
                <a href="index.php">Retroceder</a>
            </div>
        ';
        include 'footer.php';
        exit;
    }
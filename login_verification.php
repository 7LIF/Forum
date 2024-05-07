<?php
    session_start();

    if(isset($_SESSION['user'])){
        include 'header.php';
        echo '
            <div class="message">
                Já se encontra ligado ao site.<br><br>
                <a href="forum.php">Avançar</a>
            </div>
        ';
        include 'footer.php';
        exit;
    }



    include 'header.php';

    $user = "";
    $password_user = "";

    if(isset($_POST["txt_user"])){
        $user = $_POST["txt_user"];
        $password_user = $_POST["txt_password"];
    }

    //verificar se os campos foram preenchidos
    if($user == "" || $password_user == ""){
        echo '
            <div class="error">
                Não foram preenchidos os campos necessários!<br><br>
                <a href="index.php">Tente novamente.</a>
            </div>
        ';
        include 'footer.php';
        exit;
    }

    //verificação dos dados de login
    $password_encrypted = md5($password_user);

    include 'config.php';

    $connect = new PDO("mysql:host=$host;dbname=$database", $user, $password);
    $engine = $connect->query("SELECT * FROM users WHERE username = ? AND password = ?");
    $engine -> bindParam(1, $user, PDO::PARAM_STR);
    $engine -> bindParam(2, $password_encrypted, PDO::PARAM_STR);
    $engine -> execute();
    $engine = null;

    //verifica se os dados correspondem a valores da base de dados
    if($engine -> rowCount() == 0){
        //ERRO - dados inválidos
        echo '
            <div class="error">
                Dados de login inválidos!<br><br>
                <a href="index.php">Tente novamente.</a>
            </div>
        ';
        include 'footer.php';
        exit;
    } else {
        $user_data = $engine -> fetch(PDO::FETCH_ASSOC);
        $_SESSION['id_user'] = $user_data['id_user'];
        $_SESSION['user'] = $user_data['username'];
        $_SESSION['avatar'] = $user_data['avatar'];

        echo '
            <div class="login_successfully">
                Bem-vindo ao Fórum, <strong>'.$_SESSION['user'].'</strong>!<br><br>
                <a href="forum.php">Continuar</a>                
            </div>
        ';

        include 'footer.php';

    }
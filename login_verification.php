<?php
    session_start();

<<<<<<< HEAD
    //Se já tiver sido feito o login no site
=======
>>>>>>> ece13da5d2d14e637a829ba1d11fd171a760c408
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



<<<<<<< HEAD
    //Para fazer o login no site
    include 'header.php';

    $utilizador = "";
    $password_user = "";

    if(isset($_POST["txt_user"])){
        $utilizador = $_POST["txt_user"];
        $password_user = $_POST["txt_password"];
    }

    ////verificar se os campos foram preenchidos
    if($utilizador == "" || $password_user == ""){
=======
    include 'header.php';

    $user = "";
    $password_user = "";

    if(isset($_POST["txt_user"])){
        $user = $_POST["txt_user"];
        $password_user = $_POST["txt_password"];
    }

    //verificar se os campos foram preenchidos
    if($user == "" || $password_user == ""){
>>>>>>> ece13da5d2d14e637a829ba1d11fd171a760c408
        echo '
            <div class="error">
                Não foram preenchidos os campos necessários!<br><br>
                <a href="index.php">Tente novamente.</a>
            </div>
        ';
        include 'footer.php';
        exit;
    }

<<<<<<< HEAD
    ////verificação dos dados de login
    $passwordEncrypt = md5($password_user);

    include 'config.php';

    $connection = new PDO(
        "mysql:dbname=$database;host=$host",
        $user,
        $password
    );

    $engine = $connection->prepare("SELECT * FROM users WHERE username = ? AND pass = ?");
    $engine -> bindParam(1, $utilizador, PDO::PARAM_STR);
    $engine -> bindParam(2, $passwordEncrypt, PDO::PARAM_STR);
    $engine -> execute();
    $connection = null;

    ////verifica se os dados correspondem a valores da base de dados
    if($engine->rowCount() == 0){
=======
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
>>>>>>> ece13da5d2d14e637a829ba1d11fd171a760c408
        //ERRO - dados inválidos
        echo '
            <div class="error">
                Dados de login inválidos!<br><br>
                <a href="index.php">Tente novamente.</a>
<<<<<<< HEAD
                
                ///////////////////////////////////////
            Utilizador: ' . $utilizador . '<br>
            Password: ' . $password_user . '<br>
            Password Encriptada: ' . $passwordEncrypt . '<br>
            //////////////////////////////////
            
=======
>>>>>>> ece13da5d2d14e637a829ba1d11fd171a760c408
            </div>
        ';
        include 'footer.php';
        exit;
    } else {
<<<<<<< HEAD
        $user_data = $engine->fetch(PDO::FETCH_ASSOC);
        $_SESSION['id_user'] = $user_data['id_user'];
        $_SESSION['user'] = $user_data['username'];
        $_SESSION['avatar'] = $user_data['avatar'];
=======
        $user_data = $engine -> fetch(PDO::FETCH_ASSOC);
        $_SESSION['id_user'] = $user_data['id_user'];
        $_SESSION['user'] = $user_data['username'];
        $_SESSION['avatar'] = $user_data['avatar'];

>>>>>>> ece13da5d2d14e637a829ba1d11fd171a760c408
        echo '
            <div class="login_successfully">
                Bem-vindo ao Fórum, <strong>'.$_SESSION['user'].'</strong>!<br><br>
                <a href="forum.php">Continuar</a>                
            </div>
        ';
<<<<<<< HEAD
    }
    include 'footer.php';
=======

        include 'footer.php';

    }
>>>>>>> ece13da5d2d14e637a829ba1d11fd171a760c408

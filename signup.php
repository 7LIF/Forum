<?php
    session_start();
    unset($_SESSION['user']);

    include "header.php";

    if(!isset($_POST['btn_submit'])){
        showForm();
<<<<<<< HEAD
    } else {
        registUser();
    }

    include "footer.php";

    ////////////////////////////////////

=======
        } else {
            registUser();
        }

    include "footer.php";

>>>>>>> ece13da5d2d14e637a829ba1d11fd171a760c408
    function showForm(){
        echo '
            <form class="form_signup" method="POST" action="signup.php?a=signup" enctype="multipart/form-data">
                <h3>Signup</h3><hr><br>
                Username: <br><input type="text" name="txt_user" size="20"><br><br>
                Password: <br><input type="password" name="txt_password" size="20"><br><br>
                Re-escrever password: <br><input type="password" name="txt_repassword" size="20"><br><br>
                <input type="hidden" name="MAX_FILE_SIZE" value="51200">    <!-- 1024 bytes x 50 = 51200 bytes= 50Kb -->
                Avatar: <input type="file" name="img_avatar"><br>
                <small>(Imagem do tipo <strong>JPG</strong>, tamanho máximo: <strong>50kb</strong>)</small><br><br>
                <input type="submit" name="btn_submit" value="Registar"><br><br>
                <a href="index.php">Voltar</a>              
<<<<<<< HEAD
            </form>
        ';
    }

    function registUser(){
        //executar as operaçoes para o registo de um novo utilizador
        $utilizador = $_POST['txt_user'];
=======
            </form>';
    }


    function registUser(){
        //executar as operaçoes para o registo
        $user = $_POST['txt_user'];
>>>>>>> ece13da5d2d14e637a829ba1d11fd171a760c408
        $password = $_POST['txt_password'];
        $repassword = $_POST['txt_repassword'];
        $avatar = $_FILES['img_avatar'];
        $error = false;

        //verificação de erros do utilizador/user
<<<<<<< HEAD
        if($utilizador == "" || $password == "" || $repassword == ""){
=======
        if($user == "" || $password == "" || $repassword == ""){
>>>>>>> ece13da5d2d14e637a829ba1d11fd171a760c408
            //ERRO - não foram preenchidos os campos necessários
            echo '
                <div class="error">
                    Não foram preenchidos campos obrigatórios!
                </div>
            ';
            $error = true;
        } else if($password != $repassword){
            //ERRO - passwords não coincidem
            echo '
                <div class="error">
                    As passwords não coincidem!
                </div>
            ';
            $error = true;
<<<<<<< HEAD
        } else if ($avatar['name'] != "" && $avatar['type'] != "image/jpeg"){
=======
        }else if ($avatar['name'] != "" && $avatar['type'] != "image/jpeg"){
>>>>>>> ece13da5d2d14e637a829ba1d11fd171a760c408
            //ERRO - Ficheiro de imagem inválido
            echo '
                <div class="error">
                    Ficheiro de imagem inválido!
                </div>
            ';
            $error = true;
        } else if ($avatar['name'] != "" && $avatar['size'] > $_POST['MAX_FILE_SIZE']){
            //ERRO - ficheiro de imagem maior que o permitido
            echo '
                <div class="error">
                    Ficheiro de imagem maior do que o permitido!
                </div>
            ';
            $error = true;
        }

        //verificar se existem erros
        if($error){
            showForm();
            include 'footer.php';
            exit;
        }


        //Processamento do registo do novo utilizador
        include 'config.php';

        $connection = new PDO(
            "mysql:dbname=$database;host=$host",
            $user,
            $password
        );

        //verificar se já existe um utilizador com o mesmo username
        $engine = $connection->prepare("SELECT username FROM users WHERE username = ?");
<<<<<<< HEAD
        $engine->bindParam(1, $utilizador, PDO::PARAM_STR);
=======
        $engine->bindParam(1, $user, PDO::PARAM_STR);
>>>>>>> ece13da5d2d14e637a829ba1d11fd171a760c408
        $engine->execute();
        if($engine->rowCount() != 0){
            //ERRO - utilizador já se encontra registado
            echo '
                <div class="error">
                    Já existe um membro do fórum com o mesmo username!
                </div>
            ';
            $engine = null;
            showForm();
            include 'footer.php';
            exit;
        } else {
            //registo do novo utilizador
            $engine = $connection->prepare("SELECT MAX(id_user) AS MaxID FROM users");
            $engine->execute();
            $id_temp = $engine->fetch(PDO::FETCH_ASSOC)['MaxID'];
            if($id_temp == null){
                $id_temp = 1;
            } else {
                $id_temp++;
            }

            //encriptar a password
            $passwordEncrypt = md5($password);

<<<<<<< HEAD
            $sql = "INSERT INTO users VALUES (:id_user, :username, :pass, :avatar)";
            $engine = $connection->prepare($sql);
            $engine->bindParam(":id_user", $id_temp, PDO::PARAM_INT);
            $engine->bindParam(":username", $utilizador, PDO::PARAM_STR);
=======
            $sql = "INSERT INTO users VALUES (:id_user, :user, :pass, :avatar)";
            $engine = $connection->prepare($sql);
            $engine->bindParam(":id_user", $id_temp, PDO::PARAM_INT);
            $engine->bindParam(":user", $user, PDO::PARAM_STR);
>>>>>>> ece13da5d2d14e637a829ba1d11fd171a760c408
            $engine->bindParam(":pass", $passwordEncrypt, PDO::PARAM_STR);
            $engine->bindParam(":avatar", $avatar['name'], PDO::PARAM_STR);
            $engine->execute();
            $connection = null;

            //upload do ficheiro de imagem do avatar para o servidor
<<<<<<< HEAD
            move_uploaded_file($avatar['tmp_name'], "image/avatar/".$avatar['name']);
=======
            move_uploaded_file($avatar['tmp_name'], "image/avatars/".$avatar['name']);
>>>>>>> ece13da5d2d14e637a829ba1d11fd171a760c408

            //apresentar uma mensagem de boas-vindas ao novo utilizador
            echo '
                <div class="new_registration_successfully">
<<<<<<< HEAD
                    Bem-vindo(a) ao Fórum, <strong>'.$utilizador.'</strong>!<br><br>
=======
                    Bem-vindo(a) ao Fórum, <strong>'.$user.'</strong>!<br><br>
>>>>>>> ece13da5d2d14e637a829ba1d11fd171a760c408
                    A partir deste momento está em condições de fazer login e participar nesta comunidade online!<br><br>
                    <a href="index.php">Quadro de login</a>
                </div>
            ';
        }
    }


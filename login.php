<?php

    echo '
        <form class="form_login" method="POST" action="login_verification.php">
            <h3>Login</h3><hr><br>
            Para entrar no Fórum, necessita introduzir o seu username e password.<br>
<<<<<<< HEAD
            Se não tem conta de utilizador, pode criar uma 
            <a href="signup.php">nova conta de utilizador</a><br><br>
            
            Username: <input type="text" size="20" name="txt_user"><br><br>
=======
            Se não tem conta de utilizador, pode criar uma <a href="signup.php">nova conta de utilizador</a><br><br>
            
            Username: <input type="text" size="20" name="txt_username"><br><br>
>>>>>>> ece13da5d2d14e637a829ba1d11fd171a760c408
            Password: <input type="password" size="20" name="txt_password"><br><br>
            
            <input type="submit" name="btn_submit" value="Entrar">
        </form>
    ';
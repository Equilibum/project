<?php
    include "connect.php";
    include "func.php";

    if(isset($_POST['login'])){
        $login = $_POST['loginl'];
        $pass = $_POST['password'];
        $repass = q();

        if($pass==$repass){
            setcookie('adminauth','ww',time()+3600*3600, '/');
            header('Location: /index.php');
        }else{
            echo 'Неверный логин/Пароль.';
        }
    }

    if(isset($_POST['exit'])){
        setcookie('adminauth','ww',time()-3600*3600, '/');
        header('Location: /index.php');
    }
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <link href="/css.css" rel="stylesheet" type="text/css">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
    if(isset($_COOKIE['adminauth'])){
        menu();
    }else{
        echo '
        <form method="post">
        <div class="menu">
            <div class="upmenu">
                <label>Login</label>
                <input type="text" name="loginl" autocomplete="off">
                <label>Password</label>
                <input type="password" name="password" autocomplete="off">
            </div>
            <div class="downmenu"><input type="submit" name="login" value="Вход"></div>
        </div>
    </form>
        ';
    }
?>
</body>
</html>

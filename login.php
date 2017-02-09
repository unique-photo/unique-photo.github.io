<?php
    require "db.php";

    $data = $_POST;
    if( isset($data['do_login']) )
    {
        $errors = array();
        $user = R::findOne('test', 'login = ?', array($data['login']));
        
        if($user)
        {
            // Если логин существует, проверяем пароль:
            if (password_verify($data['password'], $user->password))
            {
              
                $_SESSION['logged_user'] = $user;
                echo '<div style="color: green;">Авторизация прошла успешно.</br> Вы можете перейти на <a href="/">Главную</a> страницу.</div><hr>';// Если пароль совпадает - логиним пользователя
            }
            else
            {
                $errors[] = 'Пароль введен неверно!';
            }
        }
        
        else
        {
            $errors[] = 'Пользователь с таким логином не найден.'; // Пользователь не найден
        }
        
    if( ! empty($errors) )
         {
            echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
         }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Вход на сайт</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="">
</head>
<body>
		<form action="/login.php" method="POST">
            <p>
                <a class="button" href="/" >На Главную</a>
            </p>
            <p>
                <p><strong>Login:</strong></p>
                <input type="test" name="login" value="<?php echo @$data['login']; ?>" >
            </p>
            <p>
                <p><strong>Password:</strong></p>
                <input type="password" name="password" value="<?php echo @$data['password']; ?>" >
            </p>
            <p>
                <button type="submit" name="do_login">Войти</button>
            </p>
        </form>
</body>
</html>
<?php
 require "db.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Главная</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="style/style.css">
        
    </head>

    <body>
    
    <div class="wrapper">
				
		<div class="header">
            <div class="inner-header">
				<img src="img/head.jpg" style="width: 100%; height: 100%;">
			</div>
        </div>
            <div class="row">
                <div class="sidebar">
                    <div class="inner-sidebar">
						<form class="login-form" action="/index.php" method="POST">
							
							<?php
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
											echo '<div style="color: green; font-size: 15px; margin-top: 7px;">Успешная авторизация</div>';// Если пароль совпадает - логиним пользователя
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
										echo '<div style="color: red; font-size: 15px; margin-top: 7px;">'.array_shift($errors).'</div>';
									 }
								}
							?>
							<p>
								<p><strong>Login:</strong></p>
								<input class="style-input" size="12" type="test" name="login" value="<?php echo @$data['login']; ?>" >
							</p>
							<p>
								<p><strong>Password:</strong></p>
								<input class="style-input" size="12" type="password" name="password" value="<?php echo @$data['password']; ?>" >
							</p>
							<p>
								<button type="submit" name="do_login">Войти</button>
							</p>
						</form>
					</div>
                </div>
                <div class="content">
					<div class="inner-content">
						<h1 class="boss">Здесь будет контент, <p class="boss1">но это не точно</p></h1><hr>
						<img class="gif-img" src="img/gif1.gif">
					</div>
				</div>
                <div class="sidebar2">
                    <div class="inner-sidebar2">
                        <ul>
							<li><a href="/">Главная</a></li>
                            <li><a href="singup.php">Регистрация</a></li>
							<li><a href="news.php">Новости</a></li>
                            <li>Контакты</li>
                            <li>Нововведения</li>
                        </ul>
                    </div>
                </div>
            </div>
        <div class="footer">
            <div class="inner-footer">Футер</div>
        </div>

    </div>




    <!--
        <div class="images">
            <img class="background" src="img/background.jpg">
            <img class="logo" src="img/logo.jpg">
        </div>
        <ul style="list-style: none; margin-left: -39px;">
            <li>
                <a href="/">Главная</a>
            </li>
            <li>
                <a href="/singup.php ?>">Регистрация</a>
            </li>
            <li>
                <a href="/login.php ?>">Авторизация</a>
            </li>
        </ul>    
        
        <?php if ( isset($_SESSION['logged_user']) ) :  ?>
            Авторизован.</br>
            Привет, <?php echo $_SESSION['logged_user']->login; ?>!</br>
            Дата рождения: <?php echo $_SESSION['logged_user']->date; ?>.
        
        <form action="/logout.php">
            <button type="submit" >Выход</button>
        </form>

        <?php else: ?>
            <form action="/login.php">
                <button type="submit" >Авторизация</button>
            </form> </br>
            <form action="singup.php">
                <button type="submit" >Регистрация</button>
            </form>
        <?php endif; ?> --> 
    </body>
</html>
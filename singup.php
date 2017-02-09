<?php
    require "db.php";
?>

<html>
	<head>
		<title>Регистрация</title>
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
                    <div class="inner-sidebar">Сайдбар</div>
                </div>
                <div class="content">
                    <div class="inner-content">
						
						<?php
							$data = $_POST;
								if( isset($data['do_signup']) ) // Если была нажата кнопка регистрации, значит...
								{
									$errors = array();
									if( trim($data['login']) == '' ) // trim - избавление от пробелов и лишнего
									{
										$errors[] = 'Введите логин!';
									}

									if( trim($data['email']) == '' )
									{
										$errors[] = 'Введите E-mail!';
									}

									if($data['password'] == '')
									{
										$errors[] = 'Введите пароль!';
									}

									if( $data['password_2'] != $data['password'] )
									{
										$errors[] = 'Неверно введен повторный пароль!';
									}

										if( R::count('test', "login = ?", array($data['login'])) > 0 ) //
										{
											$errors[] = 'Введенный вами Login уже занят!';              // Проверка Логина и Емэйла на Повтор
										}
										if( R::count('test', "email = ?", array($data['email'])) > 0 ) //
										{
											$errors[] = 'Введенный вами E-mail уже занят!';             //
										}

									if( empty($errors) ) // Если ошибок нет - регистрируем.
									{
										$test = R::dispense('test'); // Создается таблица "Пользователь"
										$test->login = $data['login']; // Создаем поля
										$test->email = $data['email'];
										$test->date = $data['date'];
										$test->password = password_hash($data['password'],PASSWORD_DEFAULT); // Хэширование
										R::store($test);

										echo '<div style="color: green;">Регистрация прошла успешно, вы можете <a href="/login.php">Войти</a> на сайт.</div><hr>'; 
									}

								else
									{
										echo '<div style="color: red; margin-top: 5px; margin-left: 5px;">'.array_shift($errors).'</div><hr>';
									}
								}
						?>
						
						<form class="reg-form" action="/singup.php" method="POST">
							<p>
							<p><strong>Придумайте логин:</strong></p>
								<input class="style-input" type="test" name="login" value="<?php echo @$data['login']; ?>">
								<p class="input-length">(8 - 16 символов)</p>
							</p>
							<p>
								<p><strong>Ваш E-Mail:</strong></p>
								<input class="style-input" type="email" name="email" value="<?php echo @$data['email']; ?>">
							</p>
							<p>
								<p><strong>Дата рождения:</strong></p>
								<input class="style-input" type="date" name="date" value="<?php echo @$data['date']; ?>">
							</p>
							<p>
								<p><strong>Придумайте пароль:</strong></p>
								<input class="style-input" type="password" name="password" value="<?php echo @$data['password']; ?>">
								<p class="input-length">(8 - 16 символов)</p>
							</p>
							<p>
								<p><strong>Повторите пароль:</strong></p>
								<input class="style-input" type="password" name="password_2" value="<?php echo @$data['password_2']; ?>">
							</p>
							<p>
								<button type="submit" name="do_signup">Зарегистрироваться</button>
							</p>
						</form>
					</div>
                </div>
                <div class="sidebar2">
                    <div class="inner-sidebar2">
                        <ul>
							<li><a href="/">Главная</a></li>
                            <li>Регистрация</li>
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
		
		
	

</body>
</html>
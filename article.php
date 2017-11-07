<?php 
	require "includes/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo $config['title'];?></title>

  <!-- Bootstrap Grid -->
  <link rel="stylesheet" type="text/css" href="/assets/bootstrap-grid-only/css/grid12.css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

  <!-- Custom -->
  <link rel="stylesheet" type="text/css" href="/css/style.css">
</head>
<body>

  <div id="wrapper">

    <?php require "includes/header.php";?>
	  
	<?php 
		$article = mysqli_query($connection, "SELECT * FROM `articles` WHERE `id` = " . (int) $_GET['id']);

		if( mysqli_num_rows($article) <= 0)
		{
			?>
			<div id="content">
			  <div class="container">
				<div class="row">
				  <section class="content__left col-md-8">
					<div class="block">
					  <h3>Данная статья не найдена</h3>
					  <div class="block__content">
						<img src="/images/404.png">
					  </div>
             		</div>
				  </section>
          			<?php require "includes/sidebar.php";?>
				</div>
			  </div>
			</div>
	  	<?php
			} else
			{
				$art = mysqli_fetch_assoc($article);
			?>
	  			<div id="content">
				  <div class="container">
					<div class="row">
					  <section class="content__left col-md-8">
						<div class="block">
							<a><?php echo $art['views'];?> просмотров</a>
						  <h3><?php echo $art['title'];?></h3>
						  <div class="block__content">
							<img src="/images/404.png">

							<div class="full-text">
								<?php echo $art['text'];?>
							</div>
						  </div>
						</div>
					  </section>
						<?php require "includes/sidebar.php";?>
					</div>
				  </div>
				</div>
	  		<?php
			}
	  	?>

    <footer id="footer">
      <div class="container">
        <div class="footer__logo">
          <h1><?php echo $config['title'];?></h1>
        </div>
        <nav class="footer__menu">
          <ul>
            <li><a href="#">Главная</a></li>
            <li><a href="#">Обо мне</a></li>
            <li><a href="#">Я Вконтакте</a></li>
            <li><a href="#">Правообладателям</a></li>
          </ul>
        </nav>
      </div>
    </footer>

  </div>

</body>
</html>
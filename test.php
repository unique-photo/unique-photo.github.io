<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
		if (isset($_GET['1'])) {
		echo 'Поле было заполнено';
		$a = $_GET['1'];
		} else {
		echo 'Поле не заполнено';
		}
	?>
</body>
</html>
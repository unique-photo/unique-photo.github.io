<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>JS - Games</title>
	<link async href="http://fonts.googleapis.com/css?family=Baumans" data-generated="http://enjoycss.com" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" type="text/css" href="/css/style_index.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
	<input type="button" class="button" value="Play">
	<script>
		$(".button").click(
			function(){
				$(this).fadeOut(2000);
				var url = function (){$(location).attr('href', "/main.php")};
				setInterval(url, 3100)}
		);
	</script>
</body>
</html>
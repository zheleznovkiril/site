<?php
	session_start();
?>
<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8" />
		<title>Мой сайтик | ДЗ</title>
		<link href="style.css" rel="stylesheet" type="text/css" media="all" />
		<link href="imghover.css" rel="stylesheet" type="text/css" media="all" />
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	</head>
	<body>

	<div id="fon">
		<div id="main">
			<div id="header" class="content">
				<div class="logotype" >
					
				</div>
			</div>
			<div id="menu" class="content">
				<ul>
					<li class="vibor"><a href="#">Главная страница</a></li>
					<li><?php echo "<a href='dontauth.php'>Что-то</a></li>"; ?>
					<li><a href="stat.php">Все статьи</a></li>
					<li><a href="author.php">Об "авторе"</a></li>
					<li><a href="#">Цитатки</a></li>
					<?php if(isset($_SESSION["username"])){
					echo "<li><a href='account.php'><img id='v1' src='pol.png'></a></li>";}
						else{echo "<li><a href='login.php'><img id='v1' src='pol.png'></a></li>";} ?>
					<?php 
						if(isset($_SESSION["username"]))
							echo "<li><a href='logout.php'><img id='v' class='logout' src='vihod.png'></a></li>" ?>
				</ul>
			</div>
		</div>
		<div id="page" class="content">
			<div class="block1">
				<div class="cent">
					<h2>Что тут?</h2>
				</div>
				<p>Вы на новостном сайте, посвящённом видеоиграм. Тут Вы можете увидеть последние события игровой индустрии и различные статьи, посвящённой этой тематике. Спасибо за то, что посетили мой гик-уголок. gl hf :)</p>
			</div>
			<div class="block2">
				<div>
					<h2>Оффлайн-новости </h2>
				</div>
				<img src="offline.jpg" width="282" height="150" alt="" />
				<p>Тут вы встретите новости, посвящённые оффлайн играм.</p>
			</div>
			<div class="block3">
				<div>
					<h2>Онлайн-новости</h2>
				</div>
				<img src="online.jpg" width="282" height="150" alt="" />
				<p>Также на этом сайте будут новости, посвященные онлайн сегменту.</p>
			</div>
			
		</div>

	</div>
	<div id="down">
		<p>&copy; ИУ4. Разработано <a href="https://vk.com/id559569521">Кириллом Железновым</a><p>Ничто не истинно, всё дозволено.</p></p>
	</div>
	</body>
</html>

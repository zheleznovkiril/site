<?php
	session_start();
?>
<!DOCTYPE html>

<html>
		<head>
			<meta charset="utf-8" />
			<title>О пользователе | ДЗ</title>
			<link href="style.css" rel="stylesheet" type="text/css" media="all" />
			<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
		</head>
		<body>

		<div id="fon">
			<div id="main">
				<div id="header" class="content">

				</div>
				<div id="menu" class="content">
					<ul>
						<li><a href="index.php">Главная страница</a></li>
						<li><?php if(isset($_SESSION["username"])){
					echo "<a href='#'>Что-то</a></li>";}
						else{echo "<a href='dontauth.php'>Что-то</a></li>";} ?></li>
						<li><a href="stat.php">Все статьи</a></li>
						<li><a href="author.php">Об "авторе"</a></li>
						<li><a href="#">Цитатки</a></li>
					<?php if(isset($_SESSION["username"])){
						echo "<li><a href='#'><img id='v1' src='pol.png'></a></li>";}
						else{echo "<li><a href='login.php'><img id='v1' src='pol.png'></a></li>";} ?>
					<?php 
						if(isset($_SESSION["username"]))
							echo "<li><a href='logout.php'><img id='v' class='logout' src='vihod.png'></a></li>" ?>
					</ul>
				</div>
			</div>
			
			<div id="page" class="content">
				<div class="me">
				<?php if($_SESSION['username'] != 'admin') echo "
						<img border='2' src='avatar.png' width=300' />
						"?>
				<?php if($_SESSION['username'] == 'admin') echo "
						<img border='2' src='admin.jpg' width=300' />
						" ?>
						
				</div>
					<div class="me2">
							<p>Думаю, Вы сами знаете, что вы зарегистрированы под ником <?php
											echo $_SESSION['username'];?>.</p>
							<?php if($_SESSION['username'] != 'admin') echo "
							<p>В будующем я добавлю и другие Ваши данные сюда, но сейчас мне лень.</p>
							"?>
							<?php if($_SESSION['username'] == 'admin') echo "
							<p> Ух ты, привет, админ. Надеюсь, ты помнишь, что с большой силой
							приходит большая ответственность, поэтому, прежде чем вершить судьбу пользователей, хорошо подумай.</p>
							<a href='admin.php'>'<input class='inp' type='submit' name='submit' value='Жмяк' /></a>
							"?>
					</div>
				
			</div>

		</div>
		<div id="down">
			<p>&copy; ИУ4. Разработано <a href="https://vk.com/id559569521">Кириллом Железновым</a><p>Ничто не истинно, всё дозволено.</p></p>
		</div>
	</body>
</html>
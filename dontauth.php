<?php
	session_start();
?>
<!DOCTYPE html>

<html>
		<head>
			<meta charset="utf-8" />
			<title>А нету | ДЗ</title>
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
				<div class="me">
						<img src="sorry.png" width="300" alt="" />
				</div>
					<div class="me2">
							<p>УПС... Похоже Вы не авторизованы/не имеете доступ к этому файлу, а может пытаетесь попасть на эту страницу, вбив её адрес в адресною строку. Уйди хацкер.</p> 
							<p>Чтобы узнать, что тут, авторизуйтесь/запросите доступ к файлу.</p>
					</div>
				
			</div>

		</div>
		<div id="down">
			<p>&copy; ИУ4. Разработано <a href="https://vk.com/id559569521">Кириллом Железновым</a><p>Ничто не истинно, всё дозволено.</p></p>
		</div>
	</body>
</html>
<?php
	session_start();
	require('db.php');
?>
<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8" />
		<title>Добавление поста | ДЗ</title>
		<link href="style.css" rel="stylesheet" type="text/css" media="all" />
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
					<li><a href="index.php">Главная страница</a></li>
					<li><?php if(isset($_SESSION["username"])){
					echo "<a href='chat.php'>Чатик</a></li>";}
						else{echo "<a href='dontauth.php'>Чатик</a></li>";} ?></li>
					<li><a href="stat.php">Все статьи</a></li>
					<li><a href="author.php">Об "авторе"</a></li>
					<li><a href="#">Цитатки</a></li>
					<?php if(isset($_SESSION["username"])){
					echo "<li><a href='#'><img id='v1' src='pol.png'></a></li>";}
						else{echo "<li><a href='login.php'><img id='v1' src='pol.png'></a></li>";} ?>
					<?php 
						if(isset($_SESSION["username"]))
							echo "<li><a href='#'><img id='v' class='logout' src='vihod.png'></a></li>" ?>
				</ul>
			</div>
		</div>
		<form name="add" method="POST">
		<div id="page" class="content">
		
				<?php
							$article = mysqli_query($con, "SELECT * FROM `articles` WHERE `id` = " . (int) $_GET['id']);
							
							if( mysqli_num_rows($article) <= 0 )
							{
								?>
								<div class="me">
										<img src="sorry.png" width="300" alt="" />
								</div>
								<div class="me2">
									<p>Извините, но кто-то украл статью.</p>
								</div>
				
							</div>
								<?php
							} else 
							{ 
								$art = mysqli_fetch_assoc($article);
								?> 
								<div class="me">
										<img src="avatar.png" width="300" alt="" />
								</div>
								<div class="me2">
									<h1><?php echo $art['title'] ?></h1>
									<p><?php echo $art['text'] ?></p>
								</div>
				<?php
							}
				?>
				
				
		</div>
		</form>		
	</div>	
				
		<div id="down">
			<p>&copy; ИУ4. Разработано <a href="https://vk.com/id559569521">Кириллом Железновым</a><p>Ничто не истинно, всё дозволено.</p></p>
		</div>
	</div>
	</body>
</html>
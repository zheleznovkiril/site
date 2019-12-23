<?php
	session_start();
	if($_SESSION['username'] != 'admin') {
	header("Location: dontauth.php");} 
?>
<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8" />
		<title>Админка | ДЗ</title>
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
					<li><a href="index.php">Главная страница</a></li>
					<li><?php if(isset($_SESSION["username"])){
					echo "<a href='chat.php'>Что-то</a></li>";}
						else{echo "<a href='dontauth.php'>Что-то</a></li>";} ?></li>
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
		<form name="add" method="POST">
		<div id="page" class="content_2">
		
				<h1 class="reg">Кто цель?</h1></br></br></br></br>
				<p>Выбери того, кого хочешь уничтожить, низвести до атомов. </p>
				<label class="label_2">Ну и кто же этот бедолага? &nbsp&nbsp <input class="input" type="text" name="username" placeholder="Введи его имя" /> </br></label><br/></br></br></br>
				<input class="inp" type="submit" name="F" value="Щёлк" /><br/><br/><br/>
			

		<?php
							require('db.php');
							if( isset($_POST['F'])){
							$username = $_POST['username'];
								if($username != '') {
								if($username == 'admin') {
									echo "<p>Не, ну ты гений.</p> 
									<p><img src='nice.jpg'></p>"; }
								
								if($username != 'admin') {
									echo "<p>28 ударов ножом! Ты действовал наверняка, да? Это была ненависть? Гнев? Он был в крови, умолял о пощаде, но ты снова и снова наносил ему удары! Я знаю, ты убийца. Почему ты не признаешь? </p>
									<p><img src='28.gif' width='500' /></p>";
									$delete = mysqli_query($con, "DELETE FROM `users` WHERE `username` = '$username'");
								}}
						  	    if($username == '')
						  	            echo "<p>Ну ты серьёзно?</p>
										<p><img src='aga.jpg' width='500' /></p>";}
										?>
			</div>
		</div>
		</form>		
	</div>	
				
		<div id="down">
			<p>&copy; ИУ4. Разработано <a href="https://vk.com/id559569521">Кириллом Железновым</a><p>Ничто не истинно, всё дозволено.</p></p>
		</div>
	</div>
	</body>
</html>
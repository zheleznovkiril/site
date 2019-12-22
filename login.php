<?php
	session_start();
		if(isset($_SESSION)){
		header("Location: index.php");
	}
?>
<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8" /> 
		<title>Авторизация | ДЗ</title>
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
					echo "<a href='#'>Что-то</a></li>";}
						else{echo "<a href='dontauth.php'>Что-то</a></li>";} ?></li>
					<li><a href="stat.php">Все статьи</a></li>
					<li><a href="author.php">Об "авторе"</a></li>
					<li><a href="#">Цитатки</a></li>
					<?php if(isset($_SESSION["username"])){
					echo "<li><a href='#'><img id='v1' src='pol.png'></a></li>";}
						else{echo "<li><a href='login.php'><img id='v1' src='pol.png'></a></li>";} ?>
				</ul>
			</div>
		</div>
		<form action="" method="post" name="login">
			<div id="page" class="content">
					<h1 class="reg">Авторизация</h1></br></br></br></br>
					<div>
						<label>Введите Ваше имя: <input class="input" type="text" name="username" placeholder="Имя пользователя" required /> </br></label><br/><br/></br></br>
			
						<label>Введите пароль:&nbsp&nbsp&nbsp&nbsp <input class="input" type="password" name="password" placeholder="Пароль" required /> </br></label><br/><br/></br></br>
				
					</div>
						<input class="inp" type="submit" name="submit" value="Войти" /><br/><br/><br/>
						<p class="not">Ещё не зарегистрированы? <a href="reg.php">Зарегистрироваться</a></p>
					<?php
					require('db.php');
					if (isset($_POST['username'])){
						 $username = stripslashes($_REQUEST['username']);
						 $username = mysqli_real_escape_string($con,$username);
						 $password = stripslashes($_REQUEST['password']);
						 $password = mysqli_real_escape_string($con,$password);
						 $query = "SELECT * FROM `users` WHERE username='$username'	and password='".md5($password)."'";
						 $result = mysqli_query($con,$query) or die(mysql_error());
						 $rows = mysqli_num_rows($result);
							if($rows==1){		
								$_SESSION['username'] = $username;
								$_SESSION['password'] = $password;
					header("Location: index.php");}
					 else{
					 echo "</br><p class='not'>Неверно введён логин/пароль.</p>
					";
					}}
				?>
			</div>
		</form>
	</div>	
			
		<div id="down">
			<p>&copy; ИУ4. Разработано <a href="https://vk.com/id559569521">Кириллом Железновым</a><p>Ничто не истинно, всё дозволено.</p></p>
		</div>
	</body>
</html>

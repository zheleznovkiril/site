<?php
	session_start();
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
					<li><a href="#">Чатик</a></li>
					<li><a href="#">Все статьи</a></li>
					<li><a href="author.php">Об "авторе"</a></li>
					<li><a href="#">Цитатки</a></li>
					<?php if(isset($_SESSION["username"])){
					echo "<li><a href='#'><img id='v1' src='pol.png'></a></li>";}
						else{echo "<li><a href='login.php'><img id='v1' src='pol.png'></a></li>";} ?>
				</ul>
			</div>
		</div>
		<div id="page" class="content">
				<h1 class="reg">Авторизация</h1></br></br></br></br></br>
					<label>Введите Ваше имя:</label><br/> </br></br>
					<label>Введите пароль:</label><br/> </br></br>
					<form action="" method="post" name="login">
					<input class="inp" type="submit" name="submit" value="Войти" /><br/><br/><br/>
					<p class="not">Ещё не зарегистрированы? <a href="reg.php">Зарегистрироваться</a></p>
				<div class="vvesti">
					<input class="input" type="text" name="username" placeholder="Имя пользователя" required /> </br>
					<input class="input" type="password" name="password" placeholder="Пароль" required /> </br>
				</form>
			</div>
			<?php
				require('db.php');
				if (isset($_POST['username'])){
					 $username = stripslashes($_REQUEST['username']);
					 $username = mysqli_real_escape_string($con,$username);
					 $password = stripslashes($_REQUEST['password']);
					 $password = mysqli_real_escape_string($con,$password);
					 $query = "SELECT * FROM `users` WHERE username='$username'
					and password='".md5($password)."'";
					 $result = mysqli_query($con,$query) or die(mysql_error());
					 $rows = mysqli_num_rows($result);
						if($rows==1){
					 $_SESSION['username'] = $username;
				header("Location: index.php");}
				 else{
				 echo "<div class='error'>
				<h3>Неверно введён логин/пароль.</h3>
				</div>";
				}}
			?>
		</div>	
			
		<div id="down">
			<p>&copy; ИУ4. Разработано <a href="https://vk.com/id559569521">Кириллом Железновым</a><p>Ничто не истинно, всё дозволено.</p></p>
		</div>
	</div>
	</body>
</html>

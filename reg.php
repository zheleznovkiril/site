<?php
	session_start();
	if(isset($_SESSION)){
		header("Location: dontauth.php");
	}
?>
<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8" />
		<title>Регистрация | ДЗ</title>
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
					<li><a href='login.php'><img id='v1' src='pol.png'></a></li>
				</ul>
			</div>
		</div>
		<form name="register" method="POST">
		<div id="page" class="content">
				<h1 class="reg">Регистрация</h1></br></br></br></br>
				<label>Введите Ваше имя:&nbsp&nbsp&nbsp <input class="input" type="text" name="username" placeholder="Имя пользователя" required /> </br></label><br/></br></br></br>
				<label>Введите Вашу почту:  <input class="input" type="email" name="email" placeholder="Почта" required /> </br></label><br/> </br></br></br>
				<label>Введите пароль: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input class="input" type="password" name="password" placeholder="Пароль" required /> </br></label><br/> </br></br></br>
				<label>Подтвердите пароль: <input class="input" type="password" name="pass2" placeholder="Подтвердите пароль" required /> </br></label><br/> </br></br></br></br>
				<input class="inp" type="submit" name="submit" value="Зарегистрироваться" /><br/><br/><br/>
				<p class="not">Уже есть аккаунт? <a href="login.php">Авторизоваться</a></p>
			<?php
							require('db.php');
							if (isset($_REQUEST['username'])){
							$username = stripslashes($_REQUEST['username']);
							$username = mysqli_real_escape_string($con,$username);
							$email = stripslashes($_REQUEST['email']);
							$email = mysqli_real_escape_string($con,$email);
							$password = stripslashes($_REQUEST['password']);
							$pass2 = stripslashes($_REQUEST['pass2']);
							if ($password == $pass2)
							{
							$password = mysqli_real_escape_string($con,$password);
							$trn_date = date("Y-m-d H:i:s");
							$query = "INSERT into `users` (username, password, email, trn_date)
							VALUES ('$username', '".md5($password)."', '$email', '$trn_date')";
							$result = mysqli_query($con,$query);
							if ($result){
							echo "</br><p class='not'>Вы успешно зарегистрировались!</p>";
							};
							};
							if ($password != $pass2)
							echo "</br><p class='not'>Пароли не совпадают, попробуйте
							еще раз. Прошу прощения за неудобство <br/></p>";
							};
					?>
		</div>	
	</div>	
			</form>		
		<div id="down">
			<p>&copy; ИУ4. Разработано <a href="https://vk.com/id559569521">Кириллом Железновым</a><p>Ничто не истинно, всё дозволено.</p></p>
		</div>
	</div>
	</body>
</html>

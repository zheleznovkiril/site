<?php
	session_start();
?>
<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8" />
		<title>Добавление поста | ДЗ</title>
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
		<div id="page" class="content_2">
				<h1 class="reg">Добавление поста</h1></br></br></br></br>
				<label class="label_2">Введите заголовок:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input class="input" type="text" name="title" placeholder="Заголовок статьи" required /> </br></label><br/></br></br></br>
				<label class="label_2">Введите текст статьи: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input class="label_3" type="text" name="text" placeholder="text" required /> </br></label><br/></br></br></br>
				<label class="label_2">Введите тип новости: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input class="input" type="text" name="categorie_id" placeholder="1 - онлайн, 2 - оффлайн" required /> </br></label><br/></br></br></br>
				<input class="inp" type="submit" name="submit" value="Жмяк" /><br/><br/><br/>
			<?php
							require('db.php');
							$title = stripslashes($_REQUEST['title']);
							$title = mysqli_real_escape_string($con,$title);
							$text = stripslashes($_REQUEST['text']);
							$text = mysqli_real_escape_string($con,$text);
							$categorie_id = stripslashes($_REQUEST['categorie_id']);
							$categorie_id = mysqli_real_escape_string($con,$categorie_id);
							$trn_date = date("Y-m-d H:i:s");
							$query = "INSERT INTO articles (title, text, categorie_id, datetime) VALUES('$title', '$text', '$categorie_id', '$trn_date')";
							$result = mysqli_query($con,$query);
							if ($result){
							echo "</br><p class='not'>работает, неужели</p>";
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
<?php
	session_start();
?>
<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8" />
		<title>Статьи | ДЗ</title>
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
						else{echo "<a href='dontauth.php'>Что-то</a></li>";} ?>
					<li class="vibor"><a href="#">Все статьи</a></li>
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
			
			<?php
					require('db.php');
					$articles = mysqli_query($con, "SELECT * FROM `articles`");
			?>
			
			<?php
				while( $art = mysqli_fetch_assoc($articles) )
				{
					?>
						<article>	
							<div class='block_1'>
								<a href="post.php?id=<?php echo $art['id']; ?>"><h2><?php echo $art['title']; ?></h2>
								<p><?php if($art['categorie_id']==1) echo '<img width=195 src="online.jpg">';
										if($art['categorie_id']==2) echo '<img width=195 src="offline.jpg">'; ?></p></a>
								<p><?php echo $art['text']; ?></p>
							</div>
						</article>

				<?php
				}
			?>
				<?php if($_SESSION['username'] == 'admin') echo "
			<div class='block_1'><a href='addpost.php'><h2>Добавить статью</h2>
			<p><img width=195 src='write.jpg'></p></a>
			<p>Неужели ТЫ, ОДМЕН, ХОЧЕШЬ РАЗРУШИТЬ ТО, ЧТО Я ДЕЛАЛ?! Ладно, дерзай.</p>
			</div>
			 "
			?>
			</div>
	</div>
	<div id="down">
		<p>&copy; ИУ4. Разработано <a href="https://vk.com/id559569521">Кириллом Железновым</a><p>Ничто не истинно, всё дозволено.</p></p>
	</div>
	</body>
</html>

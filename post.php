<?php
	session_start();
	require('db.php');
?>
<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8" />
		<title>Пост | ДЗ</title>
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
								mysqli_query($con, "UPDATE `articles` SET `views` = `views` + 1 WHERE `id` = " . $art['id']);
								?> 
								<div class="me">
										<img src="avatar.png" width="300" alt="" />
								</div>
								<div class="me2">
									<h1><?php echo $art['title']; ?></h1>
									<p><?php echo $art['text']; ?></p>
									<a><?php echo $art['views']; ?> просмотров</a><br/>
									<a>Дата создания: <?php echo $art['datetime']; ?></a>
									<?php if(isset($_SESSION['username'])) {if($_SESSION['status'] == 'admin') {?> <p><form>
										<input name='delete' type='submit' method='POST' action='/post.php' value="Удалить статью" />
										</form></p><?php } ?>
									<?php  if( isset($_POST['delete'])){
										$delete = mysqli_query($con, "DELETE FROM `articles` WHERE `id` = " . (int) $_GET['id']);
									}}?>
								</div>
			
				
				
		</div>
		</form>		
	</div>

		<div align="center" class="comm" >
			<h3>Комментарии</h3>
				<?php
					require('db.php');
					$comments = mysqli_query($con, "SELECT * FROM `comments` WHERE articles_id = '".$art['id']."'");
			?>
			
			<?php
				while( $com = mysqli_fetch_assoc($comments) )
				{
					?>
						<article>	
							<div class="commain">
								<h4><?php echo $com['author']; ?></h4>
								<p>Комментарий:<?php echo $com['text']; ?></p></a>
								<p>Дата комментирования:<?php echo $com['pubdate']; ?></p>
							</div>
						</article>

				<?php
				}
			?>
					
					
					<div class="commain">
					<h4>Добавить комментарий</h4>
							<form method="POST" action="/post.php?id=<?php echo $art['id']; ?>">
							<label class="label_2">Ваше мнение: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input class="input" type="text" name="text" placeholder="Ваш комментарий"  /> </br></label><br/></br></br></br>
							<input class="inp_2" type="submit" name="do_post" value="Хоба" /><br/><br/><br/>
							</form>
							<?php if(isset($_SESSION['username'])) {
							$author = $_SESSION['username'];
								if( isset($_POST['do_post']) )
								{
									$errors = array();
									
									if( $_POST['text'] == '')
									{
										$errors[] = 'Серьёзно думал, что это пройдёт?<img src ="da.jpg">';
									}
									if( empty($errors) )
									{
										mysqli_query($con, "INSERT INTO `comments` (`author`, `text`, `pubdate`, `articles_id`) VALUES ('$author', '".$_POST['text']."', NOW(), '".$art['id']."')");
									}	 else {
										echo $errors['0'];
									}
								}}
								if(!isset($_SESSION['username'])) {echo "<a href='login.php'>Авторизуйся</a> сначала.";}
							?>
					</div>
		</div>
		<?php
							}
				?>
		<div id="down">
			<p>&copy; ИУ4. Разработано <a href="https://vk.com/id559569521">Кириллом Железновым</a><p>Ничто не истинно, всё дозволено.</p></p>
		</div>
	</div>
	</body>
</html>
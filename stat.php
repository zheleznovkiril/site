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
					<li><?php echo "<a href='dontauth.php'>Что-то</a></li>"; ?>
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
					$per_page = 10;
				$page = 1;
				
				if(isset($_GET['page'])) {
					$page = (int) $_GET['page'];
				}
				
				$total_count_q = mysqli_query($con, "SELECT COUNT('id') AS `total_count` FROM `articles`");
				$total_count = mysqli_fetch_assoc($total_count_q);
				$total_count = $total_count['total_count'];
				
				$total_pages = ceil($total_count / $per_page);
				if($page <= 1 || $page > $total_pages){
					$page = 1;
				}
				
				$offset = ($per_page * $page) - $per_page;
				$articles = mysqli_query($con, "SELECT * FROM `articles` ORDER BY `id` DESC LIMIT $offset,$per_page");
				
				$articles_exist = true;				
				if(mysqli_num_rows($articles) <= 0 ){
					echo 'А статей то нет.';
					$articles_exist = false;
				}
				?>
				
					<?php
				
					if($articles_exist == true){
						echo "<div class='pagin'>";
						if($page > 1){
						echo "<a href='/stat.php?page=".($page - 1)."'>Прошлая страница </a>";
						}
						if($page < $total_pages){
							echo "<a href='/stat.php?page=".($page + 1)."'>Следующая страница</a>";
						}
						echo "</div>";
					}
				
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
				<?php if($_SESSION['status'] == 'admin') echo "
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

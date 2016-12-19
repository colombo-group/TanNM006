	
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tranee 006 |</title>
	<link rel="stylesheet" href="<?=$base ?>/apps/public/css/style.css">
</head>
<body>

	<header id="header">
		<div class="container">

			<div id="logo">
				<a href="<?=$base ?>"><h2>Trainee 006</h2></a>
			</div><!--end logo-->

			<nav>
			<?php
				if(isset($_SESSION['user']) && $_SESSION['user'] !=""){ ?>
					<span><a href="<?=$base ?>?ctr=User&act=N&name="><?=$_SESSION['username'] ?>  |</a></span>
					<span><a href="<?=$base ?>?ctr=User&act=LogOut">Đăng xuất</a></span>
				<?php }

				else{ ?>
					<span><a href="<?=$base ?>?ctr=User&act=Register">Đăng ký  |</a></span>
					<span><a href="<?=$base ?>?ctr=User&act=Login">Đăng nhập</a></span>
				<?php }
			?>
			</nav><!--end nav-->
		</div>

	</header><!--end- header-->

	<?php  require_once('route.php'); ?>

		<footer>
			<p>Colombo @ 2016.</p>
		</footer><!--end footer-->
</body>
</html>

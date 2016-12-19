<?php
	if(isset($_COOKIE['login-time']) && $_COOKIE['login-time']==3){
		echo "bạn đã đăng nhập quá qui định chờ 3 tiếng sau để đăgn nhập lại!";
	}else{ ?>
		<div class="login">
			<h2>Login</h2>
			<form action="?ctr=User&act=Login" method='POST'>
				<p><?php if(isset($_SESSION['login_error'])){echo $_SESSION['login_error'];
				if(!isset($_COOKIE['login-time'])){setcookie('login-time', 1, time() + 10800, "/");}
				else{
					setcookie('login-time', $_COOKIE['login-time']+1, time() + 10800, "/");
				}
				} ?></p>
				<p><?php if(isset($_SESSION['Register_success'])){echo $_SESSION['Register_success'];} ?></p>
				<?php session_destroy(); ?>
				<input type="text" placeholder="email or username" required name='username' /><br/>
				<input type="password" placeholder="password" required name='password' /><br/>
				<a href="#"><button type='submit'>login</button></a>
			</form>
		</div>
	<?php }


 ?>

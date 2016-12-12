		<div class="login">
			<h2>Login</h2>
			<form action="?ctr=User&act=Login" method='POST'>
				<p><?php if(isset($_SESSION['login_error'])){echo $_SESSION['login_error'];} ?></p>
				<p><?php if(isset($_SESSION['Register_success'])){echo $_SESSION['Register_success'];} ?></p>
				<?php session_destroy(); ?>
				<input type="text" placeholder="email or username" required name='username' /><br/>
				<input type="password" placeholder="password" required name='password' /><br/>
				<a href="#"><button type='submit'>login</button></a>
			</form>
		</div>
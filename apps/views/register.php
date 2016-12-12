	<div class="login">
			<h2>Register</h2>
			<form action="http://localhost/Tt/TanNM006/?ctr=User&act=Save"  method="post" enctype="multipart/form-data">
				<label >ảnh đại diện :</label>
				<input type="file" name='avatar' accept="image/*" />
				<input type="text" placeholder="họ tên " name='full_name' required /><br/>
				<input type="text" placeholder="username " name='username' required /><br/>
				<p><?php if(isset($_SESSION['Register_username'])){echo $_SESSION['Register_username'];} ?></p>
				<input type="email" placeholder="email " name='email' required /><br/>
				<p><?php if(isset($_SESSION['Register_email'])){echo $_SESSION['Register_email'];} ?></p>
				<input type="text" placeholder="phone" name='phone' required /><br/>
				<p><?php if(isset($_SESSION['Register_phone'])){echo $_SESSION['Register_phone'];} ?></p>
				<input type="password" placeholder="password" name='password' required /><br/>
				<input type="password" placeholder="nhập lại password" name='repassword'  required /><br/>
				<p><?php if(isset($_SESSION['Register_password'])){echo $_SESSION['Register_password'];} ?></p>
				<input type="text" placeholder="người giới thiệu" name='friend'>
						<p><?php if(isset($_SESSION['Register_friend'])){echo $_SESSION['Register_friend'];} ?></p>
				<a href="#"><button type='submit'>register</button></a>
			</form>
		</div>
	<div class="login">
			<h2>update</h2>
			<form action="?ctr=User&act=Update"  method="post" enctype="multipart/form-data">
				<input type="hidden" name='id' value="<?=$user['id'] ?>">
				<label >ảnh đại diện :</label>
				<img src="./<?=$user['avatar'] ?>" alt="avatar">
				<input type="file" name='avatar' accept="image/*" />
				<input type="text" placeholder="họ tên " name='full_name' required value="<?=$user['fullname'] ?>"/><br/>
				<?php
					if((int)$user['user_level'] > (int)$_SESSION['user_level']){ ?>
						Level:
						<select name="user_level" >
							<option value="2">User</option>
							<option value="1">Mode</option>
						</select>
					<?php }
				?>
				<input type="text" placeholder="username " value="<?=$user['username'] ?>" name='username' required /><br/>
				<p><?php if(isset($_SESSION['update_username'])){echo $_SESSION['update_username'];} ?></p>
				<input type="email" placeholder="email " value="<?=$user['email'] ?>" name='email' required /><br/>
				<p><?php if(isset($_SESSION['update_email'])){echo $_SESSION['update_email'];} ?></p>
				<input type="text" placeholder="phone" name='phone' required value="<?=$user['phone'] ?>" /><br/>
				<p><?php if(isset($_SESSION['update_phone'])){echo $_SESSION['update_phone'];} ?></p>
				<label >mô tả	</label>
				<textarea name="intro" id="intro" cols="30" rows="10" style="width:60%"><?=$user['intro']?></textarea>
				<input type="radio" name='sex' value='nam' checked >nam
				<input type="radio" name='sex' value='nữ'>nữ
				<input type="date" name='birthday' value="12/12/2016" required>
				<a href="#"><button type='submit'>Update</button></a>

			</form>
		</div>

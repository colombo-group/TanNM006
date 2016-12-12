	<div class="container">
	<div id="content">
		<!-- <p id='user-limit'>123 users</p> -->
		<div id='num'>
			<form action="http://localhost/Tt/TanNM006/?ctr=User&act=Index" method='GET' >
				<input type="hidden" value='<?=$page ?>' name='page'>
				<label >Hiển thị :</label>
				<select name="limit" id="limit">
					<option value="10">10</option>
					<option value="20" >20</option>
					<option value="50" >50</option>
					<option value="100" >100</option>
				</select>
				<label >Sắp xếp theo:</label>
				<select  id="order" name='order'>
					<option value="fullname" selected>Tên</option>
					<option value="time" selected>Ngày tháng</option>
				</select>
				<button type="submit" >Lọc</button>
			</form>

		</div>

		<ul id='userList'>
			<?php
				$arr = ['Admin' , 'Mod' , 'User']; 
			foreach ($userList as $user ): ?>
				<li>
					<div class="avatar">
						<?php 
							if($user['avatar'] !=""){
								echo "<img src='http://localhost/Tt/TanNM006/".$user['avatar']."' alt='avatar' />";
							}
						?>
					</div><!--end avatar-->
					<div class="username">
						<a href='#' class="name"><?=$user['fullname'] ?></a>
						<p class="email"><?=substr($user['time'] , 0 ,10) ?></p>
					</div><!--end username-->
					<div class="role">
						<button class='role-button'><?=$arr[$user['user_level']] ?></button>
					</div><!--end role-->
					<?php 
						if((int)$user['user_level'] > (int)$_SESSION['user_level']){ ?>
							<div class="optional">
							<a href="?ctr=User&act=Del&Id=<?=$user['id'] ?>" id='del'>Del</a>
							<a href="?ctr=User&act=Update&Id=<?=$user['id'] ?>" id='update'>Update</a>
					</div><!--end user optional-->
						<?php }
					?>
					
				</li>
			<?php endforeach ?>
		</ul>
		<div id="paginator">
			<ul>
				<?php 
					if($page>1){
				
						echo "<li><a href='http://localhost/Tt/TanNM006/?ctr=User&act=Index&page=".($page-1)."'>prev</a></li>";
					}
				?>
				<?php 
					for ($i=1; $i <=$pageLimit ; $i++)  { ?> 
							<li><a href="http://localhost/Tt/TanNM006?ctr=User&act=Index&page=<?=$i; ?>"><?=$i; ?></a></li>
					<?php }
				?>
				<?php 
					if($page < $pageLimit){
				
						echo "<li><a href='http://localhost/Tt/TanNM006?ctr=User&act=Index&page=".($page+1)."'>next</a></li>";
					}
				?>
			</ul>
		</div><!--end paginator-->
		</div><!--end .content-->
		</div>
<script>
	function loadDoc() {
 		 var xhttp = new XMLHttpRequest();
  	xhttp.onreadystatechange = function() {
    	if (this.readyState == 4 && this.status == 200) {
     		document.getElementById("demo").innerHTML = this.responseText;
    		}
  		};
  			xhttp.open("GET", "ajax_info.txt", true);
  			xhttp.send();
}
</script>
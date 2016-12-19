<?php

class UserController{

	//hàm hiển thị danh sách user
	public static function Index(){
		$userLimit = UserModel::GetAll();
		$_SESSION['user_level'] = 3; // khách
		//kiểm tra level của user
		if(isset($_SESSION['user'])){
			$user = new UserModel($_SESSION['user'] , null,null,null,null,null,null,null,null,null,null);
			$_SESSION['user_level'] = $user->GetLevel($user);
		}
		//lấy ra dữ liệu show trang chủ
		$limit  = 10;
		$page = 1;
		$order = 'fullname';
		if(isset($_GET['limit'])){
			$limit = intval($_GET['limit']);
		}
		if(isset($_GET['page'])){
			$page = $_GET['page'];
			if($page <0){
				$page =1;
			}
		}
		if(isset($_GET['order'])){
			$order = $_GET['order'];
		}
		$start = ($page * $limit) - $limit;
		$userList = UserModel::GetUser($start , $limit , $order);
		//phân trang
		if($userLimit % $limit == 0){
			$pageLimit = $userLimit / $limit;
		}
		else{
			$pageLimit = ((int)($userLimit / $limit))+1;
		}
		require_once('apps/views/index.php');
	}

	//hàm đăng ký
	public static function Register(){
		//gọi view
		require_once('./apps/views/register.php');
	}

	//hàm lưu user
	public static function Save(){
		$_SESSION['Register_phone'] = null;
		$_SESSION['Register_password'] = null;
		$_SESSION['Register_username'] = null;
		$_SESSION['Register_email'] = null;
		$_SESSION['Register_friend'] = null;

		$error = 0;
			//validate form
		$username = $_POST['username'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$fullName = $_POST['full_name'];
		$friend  = $_POST['friend'];
		$password = $_POST['password'];
		$rePassword = $_POST['repassword'];
		$pass = password_hash($password , PASSWORD_DEFAULT);
		if(preg_match('/[^0-9]/', $password)){
			$_SESSION['Register_password'] = 'mật khẩu nhập không đúng!';
			header('location: ..?ctr=User&act=Register');
		}
			if(!isset($_POST['id'])){//thêm mới
				if(self::Validate($username , $email , $phone ,$friend) ==false){
					$error++;
				}
			}
			if($password != $rePassword){
				$_SESSION['Register_password'] = 'mật khẩu nhập không đúng!';
				$error++;;
			}
			if($error!=0){
				header('location: ../?ctr=User&act=Register');
			}
			else{
				//upload avatar
				if($_FILES['avatar']['name']!=""){
					$folder = 'apps/public/upload/';
					$avatarFileType = pathinfo($_FILES['avatar']['name'],PATHINFO_EXTENSION);
					$_FILES['avatar']['name'] = $_FILES['avatar']['name'];
					move_uploaded_file($_FILES['avatar']['tmp_name'],$folder.$_FILES['avatar']['name']);
					$_FILES['avatar']['name'] = $folder.$_FILES['avatar']['name'];
				}
				//Lưu uses
				//lấy id của friend
				$friendId = UserModel::GetId($friend);
				$user = new UserModel(null,$username,$email,$phone,$fullName,$pass,null,$friendId,$_FILES['avatar']['name'],2,null);
				if($user->Save($user)){
					$_SESSION['Register_phone'] = null;
					$_SESSION['Register_password'] = null;
					$_SESSION['Register_username'] = null;
					$_SESSION['Register_email'] = null;
					$_SESSION['Register_friend'] = null;
					$_SESSION['Register_success'] = "Bạn đã đăng ký thành công , mời đăng nhập !";
					header('location: ./?ctr=User&act=Login');
				}
			}


		}


	//Hàm xác nhận form đăng ký
		public static function Validate($username , $email , $phone , $friend){
			$user = new UserModel(null,$username , $email , $phone , null,null,null,$friend,null,null,null);
			return $user ->Validate($user);
		}

		//Đăng nhập
		public static function Login(){
			if(!isset($_SESSION['user'])){
				if($_SERVER['REQUEST_METHOD']=='GET'){
					require_once('./apps/views/login.php');
				}
				else{
					$tmp = $_POST['username'];
					$password = $_POST['password'];
					if(preg_match('/[@]/',$tmp)){//email
						//kiểm tra username
						$user = new UserModel(null,null,$tmp,null,null,$password,null,null,null,null,null);
						$rs = $user->EmailExist($user);
						if($rs!=false){
							$_SESSION['user'] = $rs['id'];
							$_SESSION['username'] = $rs['username'];
							//lấy về level của user vừa đăng nhập
							$_SESSION['user_level'] = $rs['user_level'];
							header('location: ./');
						}
						else{
							$_SESSION['login_error'] = 'Email hoặc mật khẩu không đúng!';
							header('location: ./?ctr=User&act=Login');
						}
					}
					else{//username
						$user = new UserModel(null,$tmp,null,null,null,$password,null,null,null,null,null);
						$rs = $user->UserNameExist($user);
						if($rs!=false){
							$_SESSION['user'] = $rs['id'];
							$_SESSION['username'] = $tmp;
							$_SESSION['user_level'] = $rs['user_level'];
							header('location: ./');
						}
						else{
							$_SESSION['login_error'] = 'Tên đăng nhập hoặc mật khẩu không đúng!';
							header('location: ./?ctr=User&act=Login');
						}
					}
				}
			}
		}

		//Đăng xuất
		public static function LogOut(){
			session_destroy();
			header('location: ./');
		}

	//Xóa user
		public static function Del(){
			if(isset($_GET['Id'])){
				$id = $_GET['Id'];
				//kiểm tra id xem có đúng k
				$check = UserModel::idExist($id);
				if($check!=false){
				//Kiểm tra quyền xóa
					//echo $_SESSION['user_level'];
					if((int)$_SESSION['user_level'] < (int)$check['user_level']){
						UserModel::Del($id);
						header('location: ./');
					}
					else{
						header('location: ./');
					}
				}
				else{
					header('location: ./');
				}
			}
		}

		//update

		public static function Update(){
			if(isset($_GET['Id'])){
				$id = $_GET['Id'];
				//kiểm tra id xem có đúng k
				$check = UserModel::idExist($id);
				if($check!=false){
				//Kiểm tra quyền xóa
					//echo $_SESSION['user_level'];
					if((int)$_SESSION['user_level'] < (int)$check['user_level']){
						//lấy ra thông tin user cần update
						$user = UserModel::GetOne($id);
						require_once('./apps/views/update.php');
					}
					else{
						header('location: ./');
					}
				}
				else{
					header('location: ./');
				}
			}

			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$user_level = $_POST['user_level'];
				$id = $_POST['id'];
				$username = $_POST['username'];
				$email = $_POST['email'];
				$phone = $_POST['phone'];
				$sex = $_POST['sex'];
				$birthday = $_POST['birthday'];
				$intro = $_POST['intro'];
				$fullname = $_POST['full_name'];

				//lấy ra các dữ liệu cũ để so sánh
				$user = UserModel::GetOne($id);
				$error = 0;
				if($username != $user['username']){
					if(!UserModel::UsernameUpdate($username)){
						$error++;
					}
				}
				if($email != $user['email']){
					if(!UserModel::EmailUpdate($email)){
						$error++;
					}
				}
				if($phone != $user['phone'] && !UserModel::PhoneUpdate($phone)){
					$error++;
				}

				if($error !=0){
					header('location: ./?ctr=User&act=Update&Id='.$id);
				}
				else{
					//Lưu ảnh
					if($_FILES['avatar']['name']!=""){
						$folder = 'apps/public/upload/';
						$avatarFileType = pathinfo($_FILES['avatar']['name'],PATHINFO_EXTENSION);
						$_FILES['avatar']['name'] = $_FILES['avatar']['name'];
						move_uploaded_file($_FILES['avatar']['tmp_name'],$folder.$_FILES['avatar']['name']);
						$_FILES['avatar']['name'] = $folder.$_FILES['avatar']['name'];
						$user['avatar'] = $_FILES['avatar']['name'];
				}
					UserModel::Update($id,$username,$phone,$fullname, $sex,$birthday,$email,$intro,$user_level,$user['avatar']);
					header('location: ./');
				}
			}
		}

		//hàm hiển thị chi tiết thành viên
		public static function Name(){
			if (isset($_GET['id'])) {
				//Kiểm tra id có tồn
				$id= $_GET['id'];
				if(UserModel::idExist($id) !=false){
					//Lấy ra thông tin thành viên
					$user = UserModel::GetOne($id);
					require_once('./apps/views/detail.php');
				}
				else{
					header('location: ./');
				}
			}
		}


	}

	?>

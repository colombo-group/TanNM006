<?php 
class UserModel{

	public $id;
	public $username;
	public $email;
	public $fullName;
	public $phone;
	public $password;
	public $intro;
	public $friend;
	public $avatar;
	public $userLevel;
	public $time;

	function __construct($id=null,$username=null ,$email = null,$phone=null,$fullName = null,$password=null,$intro=null,$friend=null,$avatar = null,$level =null ,$time=null){
		$this->id = $id;
		$this->username = $username;
		$this->email = $email;
		$this->phone = $phone;
		$this->fullName = $fullName;
		$this->password = $password;
		$this->intro = $intro;
		$this->friend = $friend;
		$this->avatar = $avatar;
		$this->userLevel = $level;
		$this->time = $time;
	}

		//hàm kiểm tra form đăng ký
	public function Validate($UserModel){
		$error = 0;
		$db = DB::GetDB();
		$stmt = $db->prepare("select username from users where username = '$UserModel->username'");
		$stmt->execute();
		if($stmt->rowCount()){
			$_SESSION['Register_username'] = 'Username đã tồn tại!';
			$error++;
		}

		$stmt = $db->prepare("select email from users where email = '$UserModel->email'");
		$stmt->execute();
		if($stmt->rowCount()){
			$_SESSION['Register_email'] = 'Email đã tồn tại!';
			$error++;
		}
		if($UserModel->friend!=""){
			echo $UserModel->friend;
			if(preg_match('/[@]/', $friend)){
				$stmt = $db->prepare("select email from users where email = '$UserModel->friend'");
				$stmt->execute();
				if($stmt->rowCount()==0){
					$_SESSION['Register_friend'] = 'Người dùng không tồn tại!';
					$error++;
				}
			}
			else{
				$stmt = $db->prepare("select username from users where username = '$UserModel->friend'");
				$stmt->execute();
				if($stmt->rowCount()==0){
					$_SESSION['Register_friend'] = 'Người dùng không tồn tại!';
					$error++;
				}
			}
		}

		$stmt = $db->prepare("select phone from users where phone = '$UserModel->phone'");
		$stmt->execute();
		if($stmt->rowCount()){
			$_SESSION['Register_phone'] = 'SDT đã tồn tại!';
			$error++;
		}
		if($error > 0){
			return false;
		}
		else{
			return true;
		}

	}

		//Hàm lưu user



	public function Save($UserModel){
		$db = Db::GetDB();
		$stmt = $db->prepare("insert into users(id,username,email,phone,fullname,password,friend,avatar,intro,user_level,time)
			values(null,:username,:email,:phone,:fullname,:password,:friend,:avatar,:intro,2,now())");
		$stmt->bindParam(':username',$UserModel->username,PDO::PARAM_STR);
		$stmt->bindParam(':email',$UserModel->email,PDO::PARAM_STR);
		$stmt->bindParam(':phone',$UserModel->phone,PDO::PARAM_STR);
		$stmt->bindParam(':fullname',$UserModel->fullName,PDO::PARAM_STR);
		$stmt->bindParam(':password',$UserModel->password,PDO::PARAM_STR);
		$stmt->bindParam(':friend',$UserModel->friend,PDO::PARAM_STR);
		$stmt->bindParam(':avatar',$UserModel->avatar,PDO::PARAM_STR);
		$stmt->bindParam(':intro',$UserModel->intro,PDO::PARAM_STR);
		$stmt->execute();
		return true;
	}

		//kiểm tra đăng nhập bằng email
	public function EmailExist($UserModel){
		$db = Db::GetDB();
		$stmt = $db->prepare("select id, username ,password ,user_level from users where email = :email");
		$stmt->bindParam(':email',$UserModel->email,PDO::PARAM_STR);
		$stmt->execute();
		if($stmt->rowCount()>0){
			$arr = $stmt->fetch();
			if(password_verify($UserModel->password,$arr['password'])){
				return $arr;
			}
			else{
				return false;
			}
		}
	}	

	//kiểm tra update
	public static function EmailUpdate($email){
		$db = DB::GetDB();
		$stmt = $db->prepare("select email from users where email = '$email'");
		$stmt->execute();
		if($stmt->rowCount() >0){
			$_SESSION['update_email'] = 'Email đã tồn tại!';
			return false;
		}
		return true;
	}
	//kiểm tra update
	public static function UsernameUpdate($username){
		$db = DB::GetDB();
		$stmt = $db->prepare("select username from users where username = '$username'");
		$stmt->execute();
		if($stmt->rowCount() >0){
			$_SESSION['update_username'] = 'Username đã tồn tại!';
			return false;
		}
		return true;
	}
	//kiểm tra update
	public static function PhoneUpdate($phone){
		$db = DB::GetDB();
		$stmt = $db->prepare("select phone from users where phone = '$phone'");
		$stmt->execute();
		if($stmt->rowCount() >0){
			$_SESSION['update_phone'] = 'SĐT đã tồn tại!';
			return false;
		}
		return true;
	}

	//kiểm tra đăng nhập bằng username
	public function UserNameExist($UserModel){
		$db = Db::GetDB();
		$stmt = $db->prepare("select id,password ,user_level from users where username = :username");
		$stmt->bindParam(':username',$UserModel->username,PDO::PARAM_STR);
		$stmt->execute();
		if($stmt->rowCount()>0){
			$arr = $stmt->fetch();
			if(password_verify($UserModel->password,$arr['password'])){
				return $arr;
			}
			else{
				return false;
			}
		}
	}

	//GEt Level
	public function GetLevel($UserModel){
		$db = Db::GetDB();
		$stmt = $db->prepare("select user_level from users where id = :id");
		$stmt->bindParam(':id',$UserModel->id,PDO::PARAM_INT);
		$stmt->execute();
		$tmp =  $stmt->fetch();
		return $tmp['user_level'];
	}

	//Get all user
	public static function GetAll(){
		$db = Db::GetDB();
		$stmt = $db->prepare("select id
								from users	");
		$stmt->execute();
		return $stmt->rowCount() ;
	}
	//Get User List
	public static function GetUser($start , $limit , $order){
		
		$db = Db::GetDB();
		$stmt = $db->prepare("select id , fullname , email , time , user_level , avatar 
								from users
								order by $order DESC limit :start , :limit  
			");
		$stmt->bindParam(':start',$start,PDO::PARAM_INT);
		$stmt->bindParam(':limit',$limit,PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetchAll() ;
	}

	//kiểm tra id có tồn tại không
	public static function idExist($id){
		$db = Db::GetDB();
		$stmt = $db->prepare("select user_level 
								from users
								where id = '$id'  
			");
		$stmt->execute();
		if($stmt->rowCount()>0){
			return $stmt->fetch();
		}
		else{
			return false;
		}
	}
	//Del
	public static function Del($id){
		$db = Db::GetDB();
		$stmt = $db->prepare("delete  
								from users
								where id = '$id'  
			");
		$stmt->execute();
	}

	//lấy ra 1 user đểchỉnh sửa

	public static function GetOne($id){
		$db = Db::GetDB();
		$stmt = $db->prepare("select id , username, fullname,email,phone,avatar,intro,user_level , sex 
								from users
								where id = '$id'  
			");
		$stmt->execute();
		return $stmt->fetch();
	}

	//Update

	public static function Update($id,$username,$phone,$fullname, $sex,$birthday,$email,$intro,$level,$avatar){
		$db = Db::GetDB();
		$stmt = $db->prepare("update users set username = '$username' , phone = '$phone' , fullname ='$fullname',
								email = '$email' , sex = '$sex' , birthday = '$birthday' , intro = '$intro' , user_level ='$level' , avatar = '$avatar'
								where id = '$id'  
			");
		$stmt->execute();
	}
}
?>
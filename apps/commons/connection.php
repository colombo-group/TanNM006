<?php 
	class Db{
	private static  $host 		= 'localhost';
	private static  $dbName 	= 'trainee_006';
	private static  $dbUser 	= 'root';
	private static  $dbPassword = '';
	public static   $db 	= null;

	public static function GetDb(){
		if(self::$db == null){
			try {
				self::$db = new PDO('mysql:host=' .self::$host . ';dbname=' .self::$dbName , self::$dbUser , self::$dbPassword  
					);
			} catch (PDOException $e) {
				print "Error!: " . $e->getMessage() . "<br/>";
				die();
			}
		}
		return self::$db;
	}
}
?>
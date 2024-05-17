<?php
class Database {
    public static $db;
    public static $con;

    public function __construct(){
        $this->user = "root"; // Ensure this matches your MySQL username
        $this->pass = "root"; // Ensure this matches your MySQL password
        $this->host = "localhost";
        $this->ddbb = "repositorio";
		$this->port = '3307';
    }

    function connect(){
		$dsn = 'mysql:host=localhost;port=3307;dbname=repositorio;charset=utf8mb4';
		$username = 'root';
		$password = 'root';

		try {
			$pdo = new PDO($dsn, $username, $password);
		} catch (PDOException $e) {
			die("Connection failed: ". $e->getMessage());
		}

		//$con = new PDO('mysql:host=localhost;port=3307;dbname=repositorio', 'root', 'root');
        $con = new mysqli($this->host,$this->user,$this->pass,$this->ddbb, $this->port);
        return $con;
    }

    public static function getCon(){
        if(self::$con==null && self::$db==null){
            self::$db = new Database();
            self::$con = self::$db->connect();
        }
        return self::$con;
    }   
}
?>

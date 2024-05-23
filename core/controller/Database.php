<?php
class Database {
    public static $db;
    public static $con;
    public static $pdo;

    public function __construct(){
        $this->user = "root"; // Ensure this matches your MySQL username
        $this->pass = ""; // Ensure this matches your MySQL password
        $this->host = "localhost";
        $this->ddbb = "repositorio";
		$this->port = '3306';
        $this->charset = 'utf8mb4';
    }

    function connect(){
		$dsn = 'mysql:host=localhost;port=3306;dbname=repositorio;charset=utf8mb4';
		$username = 'root';
		$password = '';

		try {
			$pdo = new PDO($dsn, $username, $password);
		} catch (PDOException $e) {
			die("Connection failed: ". $e->getMessage());
		}

		//$con = new PDO('mysql:host=localhost;port=3306;dbname=repositorio', 'root', 'root');
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

    function pdo(){
        $dsn = "mysql:host=$this->host;dbname=$this->ddbb;port=$this->port;charset=$this->charset";
        // Set options
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        $pdo = new PDO($dsn, $this->user, $this->pass, $options);

        return $pdo;
    } 

     public static  function getPDO(){
         if(self::$pdo==null && self::$db==null){
            self::$db = new Database();
            self::$pdo = self::$db->pdo();
        }
        return self::$pdo;
    }
}
?>

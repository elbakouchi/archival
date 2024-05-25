<?php
//require_once realpath(__DIR__ . '/vendor/autoload.php');

// Looing for .env at the root directory
class Database {
    public static $db;
    public static $con;
    public static $pdo;
    public static $env;
    public function __construct(){
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ .'\\..\\..\\');
        $dotenv->load();

        $this->user = isset($_ENV['user'])? $_ENV['user'] : 'root'; // Ensure this matches your MySQL username
        $this->pass = isset($_ENV['pass'])? $_ENV['pass'] : 'root'; // Ensure this matches your MySQL password
        $this->host = isset($_ENV['host'])? $_ENV['host'] : 'localhost';
        $this->ddbb = isset($_ENV['ddbb'])? $_ENV['ddbb'] :'repositorio';
		$this->port = isset($_ENV['port'])? $_ENV['port'] :'3306';
        $this->charset = isset($_ENV['charset'])? $_ENV['charset'] : 'utf8mb4';
    }

    function connect(){
		$dsn = 'mysql:host=localhost;port=3307;dbname=repositorio;charset=utf8mb4';
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

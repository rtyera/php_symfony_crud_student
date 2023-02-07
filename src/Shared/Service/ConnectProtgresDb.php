<?php
namespace App\Shared\Service;

use PDO;

final class ConnectPostgresDb{
	private static $instance = null;
	private $conn;
	private $host = 'localhost';
	private $user = 'postgres';
	private $pass = '*';
	private $name = 'student';

	private function __construct(){
		$this->conn = new PDO("pgsql:host={$this->host};
    		dbname={$this->name}", $this->user,$this->pass,
    		array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'")
		);
	}

	public static function getInstance(){
		if(!self::$instance){
			self::$instance = new ConnectPostgresDb();
		}
		return self::$instance;
	} 

	public function getConnection(){
		return $this->conn;
	}
}

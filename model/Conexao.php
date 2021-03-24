<?php

class Conexao extends PDO{

	private $servidor;
	private $usuario;
	private $senha;
	private $dbname;
	private static $pdo;

public function __construct(){
	
	$this->servidor = "localhost";
	$this->usuario = "root";
	$this->senha = "";
	$this->dbname = "forum";

}

public function conectar(){
	try{
		if(is_null(self::$pdo)){
			self::$pdo = new PDO("mysql:dbname=$this->dbname; host=$this->servidor", $this->usuario, $this->senha);
		}else{
		return self::$pdo;		
		}
	}
	catch(PDOException $ex){
		return $ex;
	}
}



}

?>

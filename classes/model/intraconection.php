<?php
class Conexao{

	private $conn;

	function __construct(){
		$endereco = "127.0.0.1";
		$porta = "3306";
		$usuario = "root";
		$senha = "";
		$database = "intranet";
	
		$msg[0] = "Não foi possível conexão no banco de dados";
		
		$this->conn = mysqli_connect($endereco.":".$porta, $usuario, $senha, $database) or die ($msg[0]);
	}

	function executarMysql($sql){
		$saida = mysqli_query($this->conn, $sql);
		return $saida;
	}

	function getConn(){
		return $this->conn;
	}

	function close()
	{
		
	}
}

?>
<?php

	class Acesso{

		var $id_acesso;
		var $tipo_acesso;
		var $ip_id_acesso;
		var $usuario_acesso;
		var $senha_acesso;
		var $local_acesso;
		var $loja_id_loja;

		function __construct($id="", $tipo="", $ip="", $usuario="", $senha="", $local="", $loja=""){

			$this->setId_acesso($id);
			$this->setTipo_acesso($tipo);
			$this->setIp_id_acesso($ip);
			$this->setUsuario_acesso($usuario);
			$this->setSenha_acesso($senha);
			$this->setLocal_acesso($local);
			$this->setLoja_id_loja($loja);
		}


		//SET`s
		function setIp_id_acesso($ip_id_acesso){
			$this->ip_id_acesso = $ip_id_acesso;
		}

		function setId_acesso($id_acesso){
			$this->id_acesso = $id_acesso;
		}

		function setLocal_acesso($local_acesso){
			$this->local_acesso = strtoupper($local_acesso);
		}

		function setLoja_id_loja($idLojas){
			$this->loja_id_loja = strtoupper($idLojas);
		}

		function setSenha_acesso($senha_acesso){
			$this->senha_acesso = $senha_acesso;
		}

		function setTipo_acesso($tipo_acesso){
			$this->tipo_acesso = strtoupper($tipo_acesso);
		}

		function setUsuario_acesso($usuario_acesso){
			$this->usuario_acesso = $usuario_acesso;
		}



		// GET`s
		function getIp_id_acesso(){
			return $this->ip_id_acesso;
		}

		function getId_acesso(){
			return $this->id_acesso;
		}

		function getLocal_acesso(){
			return $this->local_acesso;
		}

		function getLoja_id_loja(){
			return $this->loja_id_loja;
		}

		function getSenha_acesso(){
			return $this->senha_acesso;
		}

		function getTipo_acesso(){
			return $this->tipo_acesso;
		}

		function getUsuario_acesso(){
			return $this->usuario_acesso;
		}
	}
?>

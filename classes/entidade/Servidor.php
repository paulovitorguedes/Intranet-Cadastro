<?php

	class Servidor {
	
		var $id_servidor;
		var $mod_servidor;
		var $ip_servidor;
		var $ser_princ_servidor;
		var $ssh_servidor;
		var $port_ssh_servidor;
		var $web_servidor;
		var $port_web_servidor;
		var $loja_id_loja;

		function __construct($id="", $modelo="", $ip="", $serv="", $ssh="", $pssh="", $web="", $pweb="", $loja=""){

			$this->setId_servidor($id);
			$this->setMod_servidor($modelo);
			$this->setIp_servidor($ip);
			$this->setSer_princ_servidor($serv);
			$this->setSsh_servidor($ssh);
			$this->setPort_ssh_servidor($pssh);
			$this->setWeb_servidor($web);
			$this->setPort_web_servidor($pweb);
			$this->setLoja_id_loja($loja);
		}


		//SET`s
		function setSsh_servidor($ssh_servidor){
			$this->ssh_servidor = strtoupper($ssh_servidor);
		}

		function setWeb_servidor($web_servidor){
			$this->web_servidor = $web_servidor;
		}

		function setId_servidor($id_servidor){
			$this->id_servidor = strtoupper($id_servidor);
		}

		function setIp_servidor($ip_servidor){
			$this->ip_servidor = strtoupper($ip_servidor);
		}

		function setLoja_id_loja($idLojas){
			$this->loja_id_loja = strtoupper($idLojas);
		}

		function setMod_servidor($mod_servidor){
			$this->mod_servidor = strtoupper($mod_servidor);
		}

		function setPort_ssh_servidor($port_ssh_servidor){
			$this->port_ssh_servidor = strtoupper($port_ssh_servidor);
		}

		function setPort_web_servidor($port_web_servidor){
			$this->port_web_servidor = strtoupper($port_web_servidor);
		}

		function setSer_princ_servidor($ser_princ_servidor){
			$this->ser_princ_servidor = strtoupper($ser_princ_servidor);
		}





		//GET`s
		function getSsh_servidor(){
			return $this->ssh_servidor;
		}

		function getWeb_servidor(){
			return $this->web_servidor;
		}

		function getId_servidor(){
			return $this->id_servidor;
		}

		function getIp_servidor(){
			return $this->ip_servidor;
		}

		function getLoja_id_loja(){
			return $this->loja_id_loja;
		}

		function getMod_servidor(){
			return $this->mod_servidor;
		}

		function getPort_ssh_servidor(){
			return $this->port_ssh_servidor;
		}

		function getPort_web_servidor(){
			return $this->port_web_servidor;
		}

		function getSer_princ_servidor(){
			return $this->ser_princ_servidor;
		}

	}
?>
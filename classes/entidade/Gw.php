<?php

	class Gw {
		
	
		var $id_gw;
		var $tipo_gw;
		var $modelo_gw;
		var $ip_gw;
		var $acesso_gw;
		var $po_acesso_gw;
		var $loja_id_loja;

		function __construct($id="", $tipo="", $model="", $ip="", $acesso="", $portaAcesso="", $loja=""){

			$this->setId_gw($id);
			$this->setTipo_gw($tipo);
			$this->setModelo_gw($model);
			$this->setIp_gw($ip);
			$this->setAcesso_gw($acesso);
			$this->setPo_acesso_gw($portaAcesso);
			$this->set_Loja_id_loja($loja);
		}


		//SET`s
		function setAcesso_gw($acesso_gw){
			$this->acesso_gw = $acesso_gw;
		}

		function setId_gw($id_gw){
			$this->id_gw = $id_gw;
		}

		function setIp_gw($ip_gw){
			$this->ip_gw = strtoupper($ip_gw);
		}

		function set_Loja_id_loja($idLojas){
			$this->loja_id_loja = $idLojas;
		}

		function setModelo_gw($modelo_gw){
			$this->modelo_gw = $modelo_gw;
		}

		function setPo_acesso_gw($po_acesso_gw){
			$this->po_acesso_gw = strtoupper($po_acesso_gw);
		}

		function setTipo_gw($tipo_gw){
			$this->tipo_gw = strtoupper($tipo_gw);
		}



		//GET`s
		function getAcesso_gw(){
			return $this->acesso_gw;
		}

		function getId_gw(){
			return $this->id_gw;
		}

		function getIp_gw(){
			return $this->ip_gw;
		}

		function getLoja_id_loja(){
			return $this->loja_id_loja;
		}

		function getModelo_gw(){
			return $this->modelo_gw;
		}

		function geTpo_acesso_gw(){
			return $this->po_acesso_gw;
		}

		function getTipo_gw(){
			return $this->tipo_gw;
		}

	}
?>
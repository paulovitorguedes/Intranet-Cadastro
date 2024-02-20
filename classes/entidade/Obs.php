<?php

	class Obs {
	
		var $id_obs;
		var $possui_mesa_virtual_obs;
		var $licenca_mesa_obs;
		var $possui_tel_ip_obs;
		var $ip_tel_obs;
		var $modelo_tel_obs;
		var $possui_g729;
		var $qtd_g729;
		var $rang_ramal_obs;
		var $geral_obs;
		var $loja_id_loja;
	
		function __construct($id="", $possuiMesa="", $licenca="", $possuiTelIp="", $ipTel="", $modelo="", $possuiG729="", $qtdG729="", $ranger="", $obs="", $loja=""){

			$this->setId_obs($id);
			$this->setPossui_mesa_virtual_obs($possuiMesa);
			$this->setLicenca_mesa_obs($licenca);
			$this->setPossui_tel_ip_obs($possuiTelIp);
			$this->setIp_Tel_obs($ipTel);
			$this->setModelo_tel_obs($modelo);
			$this->sePossui_g729($possuiG729);
			$this->setQtd_g729($qtdG729);
			$this->setRang_ramal_obs($ranger);
			$this->setGeral_obs($obs);
			$this->setLoja_id_loja($loja);
		}


		//SET`s
		function setId_obs($id_obs){
			$this->id_obs = $id_obs;
		}

		function setPossui_mesa_virtual_obs($possuiMesa){
			//if($possuiMesa == 0) $this->possui_mesa_virtual_obs = false;
			//else if($possuiMesa == 1) $this->possui_mesa_virtual_obs = true;
			$this->possui_mesa_virtual_obs = $possuiMesa;
		}

		function setLicenca_mesa_obs($licenca){
			$this->licenca_mesa_obs = $licenca;
		}

		function setPossui_tel_ip_obs($possuiTelIp){
			//if($possuiTelIp == 0) $this->possui_tel_ip_obs = false;
			//else if($possuiTelIp == 1) $this->possui_tel_ip_obs = true;
			$this->possui_tel_ip_obs = $possuiTelIp;
		}

		function setIp_Tel_obs($ipTel){
			$this->ip_tel_obs = strtoupper($ipTel);
		}

		function setModelo_tel_obs($modelo){
			$this->modelo_tel_obs = strtoupper($modelo);
		}

		function sePossui_g729($possuiG729){
			//if($possuiG729 == 0) $this->possui_g729 = false;
			//else if($possuiG729 == 1) $this->possui_g729 = true;
			$this->possui_g729 = $possuiG729;
		}

		function setQtd_g729($qtdG729){
			$this->qtd_g729 = strtoupper($qtdG729);
		}

		function setRang_ramal_obs($ranger){
			$this->rang_ramal_obs = strtoupper($ranger);
		}

		function setGeral_obs($ranger){
			$this->geral_obs = $ranger;
		}

		function setLoja_id_loja($loja){
			$this->loja_id_loja = $loja;
		}





		//GET`s
		function getId_obs(){
			return $this->id_obs;
		}

		function getPossui_mesa_virtual_obs(){
			//if($this->possui_mesa_virtual_obs) return 1; 
			//else return 0;
			return $this->possui_mesa_virtual_obs;
		}

		function getLicenca_mesa_obs(){
			return $this->licenca_mesa_obs;
		}

		function getPossui_tel_ip_obs(){
			//if($this->possui_tel_ip_obs) return 1;
			//else return 0;
			return $this->possui_tel_ip_obs;
		}

		function getIp_Tel_obs(){
			return $this->ip_tel_obs;
		}

		function getModelo_tel_obs(){
			return $this->modelo_tel_obs;
		}

		function getPossui_g729(){
			//if($this->possui_g729) return 1;
			//else return 0;
			return $this->possui_g729;
		}

		function getQtd_g729(){
			return $this->qtd_g729;
		}

		function getRang_ramal_obs(){
			return $this->rang_ramal_obs;
		}

		function getGeral_obs(){
			return $this->geral_obs;
		}

		function getLoja_id_loja(){
			return $this->loja_id_loja;
		}
	}
?>
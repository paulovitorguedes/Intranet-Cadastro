<?php

	class E1 {
		
		var $num_e1;
		var $tecn_e1;
		var $rang_ddr_e1;
		var $dispositivo_e1;
		var $operadora_e1;
		var $qtdcanais_e1;
		var $loja_id_loja;
	
		function __construct($numero="", $tecn="", $ranger="", $disp="", $oper="", $canais="", $loja=""){

			$this->setNum_e1($numero);
			$this->setTecn_e1($tecn);
			$this->setRang_ddr_e1($ranger);
			$this->setDispositivo_e1($disp);
			$this->setOperadora_e1($oper);
			$this->setQtdcanais_e1($canais);
			$this->setLoja_id_loja($loja);	
		}


		//SET`s
		function setDispositivo_e1($dispositivo_e1){
			$this->dispositivo_e1 = strtoupper($dispositivo_e1);
		}

		function setLoja_id_loja($idLojas){
			$this->loja_id_loja = strtoupper($idLojas);
		}

		function setNum_e1($num_e1) {
			$this->num_e1 = $num_e1;
		}

		function setOperadora_e1($operadora_e1){
			$this->operadora_e1 = strtoupper($operadora_e1);
		}

		function setRang_ddr_e1($rang_ddr_e1){
			$this->rang_ddr_e1 = strtoupper($rang_ddr_e1);
		}

		function setQtdcanais_e1($qtdcanais_e1){
			$this->qtdcanais_e1 = strtoupper($qtdcanais_e1);
		}

		function setTecn_e1($tecn_e1){
			$this->tecn_e1 = strtoupper($tecn_e1);
		}



		//GET`s
		function getDispositivo_e1(){
			return $this->dispositivo_e1;
		}

		function getLoja_id_loja(){
			return $this->loja_id_loja;
		}

		function getNum_e1() {
			return $this->num_e1;
		}

		function getOperadora_e1(){
			return $this->operadora_e1;
		}

		function getRang_ddr_e1(){
			return $this->rang_ddr_e1;
		}

		function getQtdcanais_e1(){
			return $this->qtdcanais_e1;
		}

		function getTecn_e1(){
			return $this->tecn_e1;
		}

	}
?>
<?php

	class Gsm {
		
		var $num_gsm;
		var $dispositivo_gsm;
		var $operadora_gsm;
		var $loja_id_loja;
	
		function __construct($numero="", $disp="", $oper="", $loja=""){

			$this->setNum_gsm($numero);
			$this->setDispositivo_gsm($disp);
			$this->setOperadora_gsm($oper);
			$this->setLoja_id_loja($loja);
		}


		//SET`s
		function setDispositivo_gsm($dispositivo_gsm){
			$this->dispositivo_gsm = strtoupper($dispositivo_gsm);
		}

		function setLoja_id_loja($idLojas){
			$this->loja_id_loja = strtoupper($idLojas);
		}

		function setNum_gsm($num_gsm){
			$this->num_gsm = strtoupper($num_gsm);
		}

		function setOperadora_gsm($operadora_gsm){
			$this->operadora_gsm = strtoupper($operadora_gsm);
		}



		//GET`s
		function getDispositivo_gsm(){
			return $this->dispositivo_gsm;
		}

		function getLoja_id_loja(){
			return $this->loja_id_loja;
		}

		function getNum_gsm(){
			return $this->num_gsm;
		}

		function getOperadora_gsm(){
			return $this->operadora_gsm;
		}
	}
?>
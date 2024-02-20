<?php

	class Analogica{

		var $num_analogica;
		var $dispositivo_analogica;
		var $operadora_analogica;
		var $loja_id_loja;


		function __construct($numero="", $dispositivo="", $operadora="", $loja=""){
			$this->setNum_analogica($numero);
			$this->setDispositivo_analogica($dispositivo);
			$this->setOperadora_analogica($operadora);
			$this->setLoja_id_loja($loja);
		}

		//SET`s
		function setDispositivo_analogica($dispositivo_analogica){
			$this->dispositivo_analogica = strtoupper($dispositivo_analogica);
		}

		function setLoja_id_loja($idLojas){
			$this->loja_id_loja = strtoupper($idLojas);
		}

		function setNum_analogica($num_analogica){
			$this->num_analogica = strtoupper($num_analogica);
		}

		function setOperadora_analogica($operadora_analogica){
			$this->operadora_analogica = strtoupper($operadora_analogica);
		}

		


		// GET`s
		function getDispositivo_analogica(){
			return $this->dispositivo_analogica;
		}

		function getLoja_id_loja(){
			return $this->loja_id_loja;
		}

		function getNum_analogica(){
			return $this->num_analogica;
		}

		function getOperadora_analogica(){
			return $this->operadora_analogica;
		}
	}
?>
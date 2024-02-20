<?php
	class Num_0800{

		var $num_0800;
		var $ddr_0800;
		var $chave_0800;
		var $fila_vdt_0800;
		var $loja_id_loja;
		

		function __construct($numero="", $ddr="", $chave="", $fila="", $loja="") {

			$this->setNum_0800($numero);
			$this->setDdr_0800($ddr);
			$this->setChave_0800($chave);
			$this->setFila_vdt_0800($fila);
			$this->setLoja_id_loja($loja);
		}

		//SET`s
		function setNum_0800($numero){
			$this->num_0800 = strtoupper($numero);
		}

		function setDdr_0800($ddr){
			$this->ddr_0800 = strtoupper($ddr);
		}

		function setChave_0800($chave){
			$this->chave_0800 = strtoupper($chave);
		}

		function setFila_vdt_0800($fila){
			$this->fila_vdt_0800 = strtoupper($fila);
		}

		function setLoja_id_loja($loja){
			$this->loja_id_loja = strtoupper($loja);
		}

	

		// GET`s
		function getNum_0800(){
			return $this->num_0800;
		}

		function getDdr_0800(){
			return $this->ddr_0800;
		}

		function getChave_0800(){
			return $this->chave_0800;
		}

		function getFila_vdt_0800(){
			return $this->fila_vdt_0800;
		}

		function getLoja_id_loja(){
			return $this->loja_id_loja;
		}

	}
?>
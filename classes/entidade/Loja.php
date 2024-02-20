<?php

	class Loja {
		
	
		var $id_loja;
		var $nome_loja;
		var $lograd_loja;
		var $bairro_loja;
		var $cidade_loja;
		var $cnpj_loja;
		var $rsoc_loja;
		var $cliente_id_cliente;

		function __construct($id="", $nome="", $log="", $bairro="", $cid="", $cnpj="", $rsoc="", $cliente=""){

			$this->setId_loja($id);
			$this->setNome_loja($nome);
			$this->setLograd_loja($log);
			$this->setBairro_loja($bairro);
			$this->setCidade_loja($cid);
			$this->setCnpj_loja($cnpj);
			$this->setRsoc_loja($rsoc);
			$this->setCliente_id_cliente($cliente);
		}


		//SET`s
		function setBairro_loja($bairro_loja){
			$this->bairro_loja = strtoupper($bairro_loja);
		}

		function setCidade_loja($cidade_loja){
			$this->cidade_loja = strtoupper($cidade_loja);
		}

		function setCliente_id_cliente($idCliente){
			$this->cliente_id_cliente = strtoupper($idCliente);
		}

		function setCnpj_loja($cnpj_loja){
			$this->cnpj_loja = strtoupper($cnpj_loja);
		}

		function setId_loja($id_loja){
			$this->id_loja = strtoupper($id_loja);
		}

		function setLograd_loja($lograd_loja){
			$this->lograd_loja = strtoupper($lograd_loja);
		}

		function setNome_loja($nome_loja){
			$this->nome_loja = strtoupper($nome_loja);
		}

		function setRsoc_loja($rsoc_loja){
			$this->rsoc_loja = strtoupper($rsoc_loja);
		}



		//GET`s
		function getBairro_loja(){
			return $this->bairro_loja;
		}

		function getCidade_loja(){
			return $this->cidade_loja;
		}

		function getCliente_id_cliente(){
			return $this->cliente_id_cliente;
		}

		function getCnpj_loja(){
			return $this->cnpj_loja;
		}

		function getId_loja(){
			return $this->id_loja;
		}

		function getLograd_loja(){
			return $this->lograd_loja;
		}

		function getNome_loja(){
			return $this->nome_loja;
		}

		function getRsoc_loja(){
			return $this->rsoc_loja;
		}

	}
?>
<?php

	class Contato {

		var $id_contato;
		var $nome_contato;
		var $cargo_contato;
		var $tel_contato;
		var $ramal_contato;
		var $email_contato;
		var $loja_id_loja;

		function __construct($id="", $nome="", $cargo="", $tel="", $ramal="", $email="", $loja=""){

			$this->setId_contato($id);
			$this->setNome_contato($nome);
			$this->setCargo_contato($cargo);
			$this->setTel_contato($tel);
			$this->setRamal_contato($ramal);
			$this->setEmail_contato($email);
			$this->setLoja_id_loja($loja);
			
				
		}

		//SET`s
		function setCargo_contato($cargo_contato){
			$this->cargo_contato = strtoupper($cargo_contato);
		}

		function setEmail_contato($email_contato){
			$this->email_contato = $email_contato;
		}

		function setId_contato($id_contato){
			$this->id_contato = $id_contato;
		}

		function setLoja_id_loja($idLojas){
			$this->loja_id_loja = $idLojas;
		}

		function setNome_contato($nome_contato){
			$this->nome_contato = strtoupper($nome_contato);
		}

		function setTel_contato($tel_contato){
			$this->tel_contato = strtoupper($tel_contato);
		}
		
		function setRamal_contato($ramal){
			$this->ramal_contato = strtoupper($ramal);
		}

		


		// GET`s
		function getCargo_contato(){
			return $this->cargo_contato;
		}

		function getEmail_contato(){
			return $this->email_contato;
		}

		function getId_contato(){
			return $this->id_contato;
		}

		function getLoja_id_loja(){
			return $this->loja_id_loja;
		}

		function getNome_contato(){
			return $this->nome_contato;
		}

		function getTel_contato(){
			return $this->tel_contato;
		}
		
		function getRamal_contato(){
			return $this->ramal_contato;
		}
	}
?>
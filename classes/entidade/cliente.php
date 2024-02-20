<?php

	class Cliente {

		var $id_cliente;
		var $nome_cliente;
		var $grp_cliente;
		
		function __construct($id="", $nome="", $grupo=""){

			$this->setId_cliente($id);
			$this->setNome_cliente($nome);
			$this->setGrp_cliente($grupo);
		}



		//SET`s
		function setId_cliente($id){
			$this->id_cliente = strtoupper($id);
		}

		function setGrp_cliente($grupo){
			$this->grp_cliente = strtoupper($grupo);
		}

		function setNome_cliente($nome){
			$this->nome_cliente = strtoupper($nome);
		}



		//GET`s
		function getId_cliente(){
			return $this->id_cliente;
		}

		function getGrp_cliente(){
			return $this->grp_cliente;
		}

		function getNome_cliente(){
			return $this->nome_cliente;
		}
	}
?>
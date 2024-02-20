<?php

	require_once($_SERVER["DOCUMENT_ROOT"]."/intranet/classes/model/clientemodel.php");
	require_once($_SERVER["DOCUMENT_ROOT"]."/intranet/classes/entidade/cliente.php");
	require_once($_SERVER["DOCUMENT_ROOT"]."/intranet/classes/entidade/E1.php");
	require_once($_SERVER["DOCUMENT_ROOT"]."/intranet/classes/entidade/Num_0800.php");
	require_once($_SERVER["DOCUMENT_ROOT"]."/intranet/classes/entidade/Analogica.php");
	require_once($_SERVER["DOCUMENT_ROOT"]."/intranet/classes/entidade/Gsm.php");
	require_once($_SERVER["DOCUMENT_ROOT"]."/intranet/classes/entidade/Servidor.php");
	require_once($_SERVER["DOCUMENT_ROOT"]."/intranet/classes/entidade/Gw.php");
	require_once($_SERVER["DOCUMENT_ROOT"]."/intranet/classes/entidade/Acesso.php");
	require_once($_SERVER["DOCUMENT_ROOT"]."/intranet/classes/entidade/Loja.php");
	require_once($_SERVER["DOCUMENT_ROOT"]."/intranet/classes/entidade/Contato.php");
	require_once($_SERVER["DOCUMENT_ROOT"]."/intranet/classes/entidade/Obs.php");
	


	function search($texto){
		
		$clienteModel = new ClienteModel();
		$searchArray = array();
		$arrayCliente = array();

		$arrayLoja = $clienteModel->searchTextoEmLoja($texto);
		for($i = 0; $i < count($arrayLoja); $i++){
			$arrayCliente[$i] = $clienteModel->searchClienteGrupoPorId($arrayLoja[$i]['idCliente']);
			$searchArray[$i] = array(0 => $arrayLoja[$i]['loja'], 1 => $arrayCliente[$i]['grupo'], 2 => $arrayCliente[$i]['cliente']);
		}
		return $searchArray;

		/*
		$acesso = $clienteModel->searchTextoEmAcesso($texto);
		for($ac = 0; $ac < count($acesso); $ac++){
			$bol = false;
			$id = $acesso[$ac];
			for($i = 0; $i < count($searchArray); $i++){
				if($searchArray[$i] === $id){
					$bol = true;
					break;
				}	
			}
			if(!$bol){
				$searchArray[] = $id;
			}
		}

		$analogica = $clienteModel->searchTextoEmAnalogica($texto);
		for($an = 0; $an < count($analogica); $an++){
			$bol = false;
			$id = $analogica[$an];
			for($i = 0; $i < count($searchArray); $i++){
				if($searchArray[$i] === $id){
					$bol = true;
					break;
				}	
			}
			if(!$bol){
				$searchArray[] = $id;
			}
		}

		
		echo print_r($searchArray, true);
		return;
		//return $searchArray;
		*/
	}







	// FUNCAO INSERIR


	function inserirCliente($nomeCliente){

		$client = new Cliente("", $nomeCliente, "");
		$clienteModel = new ClienteModel();
		$saida = $clienteModel->cadastrarCliente($client);
		return $saida;
	}


	function inserirGrupoCliente($nomeCliente, $grupoCliente){

		$client = new Cliente("", $nomeCliente, $grupoCliente);
		$clienteModel = new ClienteModel();
		$saida = $clienteModel->cadastrarGrupoCliente($client);
		return $saida;
	}


	function inserirSubGrupoCliente($nomeCliente, $grupoCliente, $subGrupoCliente){

		$client = new Cliente("", $nomeCliente, $grupoCliente);
		$clienteModel = new ClienteModel();
		$saida = $clienteModel->cadastrarSubGrupoCliente($client, strtoupper($subGrupoCliente));
		return $saida;
	}






	// FUNCAO CADASTRAR


	function cadastrarE1($numero, $canais, $operadora, $tecnologia, $placa, $ddr, $nomeLoja, $nomeGrupo, $nomeCliente){

		$clienteModel = new ClienteModel();
		$result = "CADASTRO E1 N&Atilde;O REALIZADO";

		if($numero != ""){

			$arrayDadosE1 = $clienteModel->buscarCadTroncoE1($numero);
			if($arrayDadosE1 == ""){

				$idCliente = $clienteModel->buscarIdCliente($nomeGrupo, $nomeCliente);
				if($idCliente != ""){
					$idLoja = $clienteModel->buscarIdLoja($nomeLoja, $idCliente);
					if($idLoja != ""){
						$obje1 = new E1($numero, $tecnologia, $ddr, $placa, $operadora, $canais, $idLoja);
						if($clienteModel->cadastrarE1($obje1)) $result = "CADASTRO REALIZADO COM SUCESSO";
					}				
				}
			} else {
				$result = "FOI DETECTADO REGISTRO DO TRONCO E1";
			}
		} else {
			$result = "PREENCHIMENTO DO CAMPO N&Uacute;MERO E1 &Eacute; OBRIGAT&Oacute;RIO";
		}
		return $result;
	}


	function cadastrar0800($numero, $ddr, $chave, $fila, $nomeLoja, $nomeGrupo, $nomeCliente){

		$clienteModel = new ClienteModel();
		$result = "CADASTRO 0800 N&AtildeO REALIZADO";

		if($numero != ""){

			$arrayDados0800 = $clienteModel->buscarCad0800($numero);
			if($arrayDados0800 == ""){

				$idCliente = $clienteModel->buscarIdCliente($nomeGrupo, $nomeCliente);
				if($idCliente != ""){
					$idLoja = $clienteModel->buscarIdLoja($nomeLoja, $idCliente);
					if($idLoja != ""){
						$obj0800 = new Num_0800($numero, $ddr, $chave, $fila, $idLoja);
						if($clienteModel->cadastrar0800($obj0800)) $result = "CADASTRO REALIZADO COM SUCESSO";
					}				
				}
			} else {
				$result = "FOI DETECTADO REGISTRO DO N&Uacute;MERO E1";
			}
		} else {
			$result = "PREENCHIMENTO DO CAMPO N&Uacute;MERO 0800 &Eacute; OBRIGAT&Oacute;RIO";
		}
		return $result;
	}


	function cadastrarLanalogica($numero, $placa, $operadora, $nomeLoja, $nomeGrupo, $nomeCliente){

		$clienteModel = new ClienteModel();
		$result = "CADASTRO LINHA ANAL&Oacute;GICA N&Atilde;O REALIZADO";

		if($numero != ""){

			$arrayDadosLa = $clienteModel->buscarCadLanalogica($numero);
			if($arrayDadosLa == ""){

				$idCliente = $clienteModel->buscarIdCliente($nomeGrupo, $nomeCliente);
				if($idCliente != ""){
					$idLoja = $clienteModel->buscarIdLoja($nomeLoja, $idCliente);
					if($idLoja != ""){
						$objLa = new Analogica($numero, $placa, $operadora, $idLoja);
						if($clienteModel->cadastrarLanalogica($objLa)) $result = "CADASTRO REALIZADO COM SUCESSO";
					}				
				}
			} else {
				$result = "FOI DETECTADO REGISTRO DO TRONCO ANAL&Oacute;GICO";
			}
		} else {
			$result = "PREENCHIMENTO DO CAMPO N&Uacute;MERO LINHA ANAL&Oacute;GICA &Eacute; OBRIGAT&Oacute;RIO";
		}
		return $result;
	}


	function cadastrarServidor($modelo, $ip, $servico, $ssh, $portaSsh, $web, $portaWeb, $nomeLoja, $nomeGrupo, $nomeCliente){

		$clienteModel = new ClienteModel();
		$result = "CADASTRO SERVIDOR N&Atilde;O REALIZADO";

		if($modelo != ""){

			$idCliente = $clienteModel->buscarIdCliente($nomeGrupo, $nomeCliente);
			if($idCliente != ""){
				$idLoja = $clienteModel->buscarIdLoja($nomeLoja, $idCliente);
				if($idLoja != ""){
					if(!$clienteModel->buscarServidorPorModelo($modelo, $idLoja)){
						$objServidor = new Servidor("", $modelo, $ip, $servico, $ssh, $portaSsh, $web, $portaWeb, $idLoja);
						if($clienteModel->cadastrarServidor($objServidor)) $result = "CADASTRO REALIZADO COM SUCESSO";
					
					} else $result = "SERVIDOR J&Aacute; CADASTRADO PARA ESSE CLIENTE";
					
				}				
			}

		} else {
			$result = "PREENCHIMENTO DO CAMPO MODELO SERVIDOR &Eacute; OBRIGAT&Oacute;RIO";
		}
		return $result;
	}


	function cadastrarGateway($gateway, $modelo, $ip, $acesso, $porta, $nomeLoja, $nomeGrupo, $nomeCliente){

		$clienteModel = new ClienteModel();
		$result = "CADASTRO GATEWAY N&Atilde;O REALIZADO";

		if($gateway != ""){

			$idCliente = $clienteModel->buscarIdCliente($nomeGrupo, $nomeCliente);
			if($idCliente != ""){
				$idLoja = $clienteModel->buscarIdLoja($nomeLoja, $idCliente);
				if($idLoja != ""){
					if(!$clienteModel->buscarGatewayPorModelo($gateway, $modelo, $idLoja)){
						$objGateway = new Gw("", $gateway, $modelo, $ip, $acesso, $porta, $idLoja);
						if($clienteModel->cadastrarGateway($objGateway)) $result = "CADASTRO REALIZADO COM SUCESSO";
					
					} else $result = "GATEWAY J&Aacute; CADASTRADO PARA ESSE CLIENTE";
					
				}				
			}

		} else {
			$result = "PREENCHIMENTO DO CAMPO GW &Eacute; OBRIGAT&Oacute;RIO";
		}
		return $result;
	}


	function cadastrarOutrosAcessos($acesso, $endereco, $usuario, $senha, $servidor, $nomeLoja, $nomeGrupo, $nomeCliente){

		$clienteModel = new ClienteModel();
		$result = "CADASTRO DE ACESSO N&Atilde;O REALIZADO";

		if($acesso != ""){

			$idCliente = $clienteModel->buscarIdCliente($nomeGrupo, $nomeCliente);
			if($idCliente != ""){
				$idLoja = $clienteModel->buscarIdLoja($nomeLoja, $idCliente);
				if($idLoja != ""){
					if(!$clienteModel->buscarAcessosPorTipo($acesso, $idLoja)){
						$objAcesso = new Acesso("", $acesso, $endereco, $usuario, $senha, $servidor, $idLoja);
						if($clienteModel->cadastrarOutrosAcessos($objAcesso)) $result = "CADASTRO REALIZADO COM SUCESSO";
					
					} else $result = "ACESSO J&Aacute; CADASTRADO PARA ESSE CLIENTE";
					
				}				
			}

		} else {
			$result = "PREENCHIMENTO DO CAMPO TIPO ACESSO &Eacute; OBRIGAT&Oacute;RIO";
		}
		return $result;
	}


	function cadastrarGsm($loja, $grupo, $cliente, $numero, $operadora, $placa, $tipo){

		$result = "CADASTRO GSM N&Atilde;O REALIZADO";
		$clienteModel = new ClienteModel();
		if($numero != ""){

			$existGsm = $clienteModel->consultarNumeroGsm($numero);
			
			if($existGsm && $tipo == "antigo"){

				$objGsm = new Gsm($numero, $placa, $operadora, "");			
				if($clienteModel->alterarGsm($objGsm)) $result = "CADASTRO GSM REALIZADO COM SUCESSO";
			
			} else if($existGsm && $tipo == "novo"){

				$result = "FOI DETECTADO REGISTRO DO N&Uacute;MERO GSM";

			} else {

				$idCliente = $clienteModel->buscarIdCliente($grupo, $cliente);
				
				if($idCliente != ""){

					$idLoja = $clienteModel->buscarIdLoja($loja, $idCliente);
					if($idLoja != ""){

						$objGsm = new Gsm($numero, $placa, $operadora, $idLoja);
						if($clienteModel->cadastrarNumeroGsm($objGsm)) $result = "CADASTRO GSM REALIZADO COM SUCESSO";
					}
				}	
			}
		
		} else {

			$result = "PREENCHIMENTO DO CAMPO GSM &Eacute; OBRIGAT&Oacute;RIO";
		}
		return $result;
	}


	function cadastrarObsGeral($id, $possuiMesa, $licenca, $possuiTelIp, $modelo, $ip, $possuiG729, $qtdCanais, $range, $obs, $nomeLoja, $nomeGrupo, $nomeCliente){

		$clienteModel = new ClienteModel();
		$result = "ERRO AO TENTAR ALTERAR OBS GERAL";

		$idCliente = $clienteModel->buscarIdCliente($nomeGrupo, $nomeCliente);
		if($idCliente != ""){
			$idLoja = $clienteModel->buscarIdLoja($nomeLoja, $idCliente);

			if($idLoja != ""){

				$objObs = new Obs($id, $possuiMesa, $licenca, $possuiTelIp, $ip, $modelo, $possuiG729, $qtdCanais, $range, $obs, $idLoja);

				if($id != ""){
					//return $clienteModel->alterarCadastroObsGeral($objObs);
					if($clienteModel->alterarCadastroObsGeral($objObs)) $result = "OBS ALTERADO COM SUCESSO";

				} else {
					//return $clienteModel->cadastrarObsGeral($objObs);
					if($clienteModel->cadastrarObsGeral($objObs)) $result = "OBS ALTERADO COM SUCESSO";
				}
			} 
		}
		return $result;
	}

	








	// FUNCAO ALTERAR

	function alterarE1($numero, $canais, $operadora, $tecnologia, $placa, $ddr, $nomeLoja, $nomeGrupo, $nomeCliente){

		$clienteModel = new ClienteModel();
		$result = "ERRO AO TENTAR ALTERAR CADASTRO";

		if($numero != ""){

			$obje1 = new E1($numero, $tecnologia, $ddr, $placa, $operadora, $canais, "");
			if($clienteModel->alterarE1($obje1)) $result = "CADASTRO ALTERADO COM SUCESSO";
		
		} else {
			$result = "E1 N&Atilde;O DETECTADO";
		}
		return $result;
	}


	function alterar0800($numero, $ddr, $chave, $fila, $nomeLoja, $nomeGrupo, $nomeCliente){

		$clienteModel = new ClienteModel();
		$result = "ERRO AO TENTAR ALTERAR CADASTRO";

		if($numero != ""){

			$ojb0800 = new num_0800($numero, $ddr, $chave, $fila, "");
			if($clienteModel->alterar0800($ojb0800)) $result = "CADASTRO ALTERADO COM SUCESSO";
		
		} else {
			$result = "0800 N&Atilde;O DETECTADO";
		}
		return $result;
	}


	function alterarLanalogica($numero, $placa, $operadora, $nomeLoja, $nomeGrupo, $nomeCliente){

		$clienteModel = new ClienteModel();
		$result = "ERRO AO TENTAR ALTERAR CADASTRO";

		if($numero != ""){

			$ojbLa = new Analogica($numero, $placa, $operadora, "");
			if($clienteModel->alterarLanalogica($ojbLa)) $result = "CADASTRO ALTERADO COM SUCESSO";
		
		} else {
			$result = "LINHA ANAL&Oacute;GICA N&Atilde;O DETECTADA";
		}
		return $result;
	}


	function alterarServidor($modelo, $id, $ip, $servico, $ssh, $portaSsh, $web, $portaWeb, $nomeLoja, $nomeGrupo, $nomeCliente){

		$clienteModel = new ClienteModel();
		$result = "ERRO AO TENTAR ALTERAR CADASTRO";

		if($modelo != ""){

			$ojbServidor = new Servidor($id, $modelo, $ip, $servico, $ssh, $portaSsh, $web, $portaWeb, "");
			if($clienteModel->alterarServidor($ojbServidor)) $result = "CADASTRO ALTERADO COM SUCESSO";
		
		} else {

			$result = "SERVIDOR N&Atilde;O DETECTADO";
		}
		return $result;
	}


	function alterarGateway($id, $gateway, $modelo, $ip, $acesso, $porta, $nomeLoja, $nomeGrupo, $nomeCliente){

		$clienteModel = new ClienteModel();
		$result = "ERRO AO TENTAR ALTERAR CADASTRO";

		if($gateway != ""){

			$objGateway = new Gw($id, $gateway, $modelo, $ip, $acesso, $porta, "");
			if($clienteModel->alterarGateway($objGateway)) $result = "CADASTRO ALTERADO COM SUCESSO";
		
		} else {

			$result = "GATEWAY N&Atilde;O DETECTADO";
		}
		return $result;
	}


	function alterarOutrosAcessos($acesso, $id, $endereco, $usuario, $senha, $servidor, $nomeLoja, $nomeGrupo, $nomeCliente){

		$clienteModel = new ClienteModel();
		$result = "ERRO AO TENTAR ALTERAR ACESSO";

		if($acesso != ""){

			$objAcesso = new Acesso($id, $acesso, $endereco, $usuario, $senha, $servidor, "");
			if($clienteModel->alterarOutrosAcessos($objAcesso)) $result = "ACESSO ALTERADO COM SUCESSO";
		
		} else {

			$result = "ACESSO N&Atilde;O DETECTADO";
		}
		return $result;
	}


	function alterCadastroDadosLOja($id, $rua, $bairro, $cidade, $cnpj, $razaoSocial, $nome, $telefone, $email, $cargo, $ramal, $nomeLoja, $nomeGrupo, $nomeCliente){

		$clienteModel = new ClienteModel();
		$result = "ERRO AO TENTAR ALTERAR DADOS CADASTRAIS";

		if($id != ""){

			$objLoja = new Loja($id, $nomeLoja, $rua, $bairro, $cidade, $cnpj, $razaoSocial, "");
			$objContato = new Contato("", $nome, $cargo, $telefone, $ramal, $email);

			if($clienteModel->buscarCadastroContato($id)){
				if($clienteModel->alterCadastroDadosLOja($objLoja, $objContato)) $result = "DADOS ALTERADO COM SUCESSO";
			
			} else {
				if($clienteModel->cadastrarDadosLoja($objLoja, $objContato)) $result = "DADOS ALTERADO COM SUCESSO";
			}	
		
		} else {

			$result = "DADOS CADASTRAIS N&Atilde;O DETECTADO";
		}
		return $result;
	}



	






	// FUNCAO APAGAR


	function apagarCliente($nomeCliente){

		$clienteModel = new ClienteModel();
		$arrayGrupo = $clienteModel->buscarGrClientes($nomeCliente);
		//echo print_r($arrayGrupo, true);
		//return;
		$grupo = $arrayGrupo[0]['grupos'];

		$saida = false;
		if($grupo == "") {
			$saida = $clienteModel->apagarCliente($nomeCliente);		
		} 
		return $saida;
	}


	function apagarGrupoCliente($nomeCliente, $nomeGrupo){

		$clienteModel = new ClienteModel();
		$arraySubGrupo = $clienteModel->buscarSubGrupoClientes($nomeCliente, $nomeGrupo);
		$contador = 0;
		$saida = false;
		if(count($arraySubGrupo) == 0) {
			$clientes = $clienteModel->buscarColunaCliente();
			for($i = 0; $i < count($clientes); $i++ ){
				if($clientes[$i]["clientes"] == $nomeCliente) $contador++;
			}
			if($contador > 1) $saida = $clienteModel->apagarGrupoCliente($nomeCliente, $nomeGrupo);
            else $saida = $clienteModel->apagarColunaGrupoCliente($nomeCliente, $nomeGrupo);
		} 
		return $saida;
	}


	function apagarSubGrupoCliente($nomeCliente, $nomeGrupo, $nomeSubGrupo){
		

		$clienteModel = new ClienteModel();
		$idCliente = $clienteModel->buscarIdCliente($nomeGrupo, $nomeCliente);
		$idLoja = $clienteModel->buscarIdLoja($nomeSubGrupo, $idCliente);
		
		$clienteModel->apagarOutrosAcessosPorIdLoja($idLoja);
		$clienteModel->apagarLanalogicaPorIdLoja($idLoja);
		$clienteModel->apagarContatoPorIdLoja($idLoja);
		$clienteModel->apagarE1PorIdLoja($idLoja);
		$clienteModel->apagarGsmPorIdLoja($idLoja);
		$clienteModel->apagarGwPorIdLoja($idLoja);
		$clienteModel->apagar0800PorIdLoja($idLoja);
		$clienteModel->apagarObsPorIdLoja($idLoja);
		$clienteModel->apagarServidorPorIdLoja($idLoja);

		$saida = $clienteModel->apagarSubGrupoCliente($nomeCliente, $nomeGrupo, $nomeSubGrupo);
		return $saida;
	}


	function apagarE1($numero){

		$clienteModel = new ClienteModel();
		$result = "ERRO AO TENTAR DELETAR CADASTRO";

		if($numero != "") {
			if($clienteModel->apagarE1($numero)) $result = "E1 DELETADO COM SUCESSO";
		}
		else {
			$result = "E1 N&Atilde;O DETECTADO";
		}
		return $result;
	}


	function apagar0800($numero){

		$clienteModel = new ClienteModel();
		$result = "ERRO AO TENTAR DELETAR CADASTRO";

		if($numero != "") {
			if($clienteModel->apagar0800($numero)) $result = "0800 DELETADO COM SUCESSO";
		}
		else {
			$result = "0800 N&Atilde;O DETECTADO";
		}
		return $result;
	}


	function apagarLanalogica($numero){

		$clienteModel = new ClienteModel();
		$result = "ERRO AO TENTAR DELETAR CADASTRO";

		if($numero != "") {
			if($clienteModel->apagarLanalogica($numero)) $result = "LINHA ANAL&Oacute;GICA DELETADA COM SUCESSO";
		}
		else {
			$result = "LINHA ANAL&Oacute;GICA N&Atilde;O DETECTADA";
		}
		return $result;
	}


	function apagarGsm($numero){

		$clienteModel = new ClienteModel();
		$result = "ERRO AO TENTAR DELETAR CADASTRO";

		if($numero != "") {
			if($clienteModel->apagarGsm($numero)) $result = "GSM DELETADO COM SUCESSO";
		}
		else {
			$result = "";
		}
		return $result;
	}


	function apagarServidor($id, $servidor){

		$clienteModel = new ClienteModel();
		$result = "ERRO AO TENTAR DELETAR CADASTRO";

		if($servidor != "") {
			if($clienteModel->apagarServidor($id)) $result = "SERVIDOR DELETADO COM SUCESSO";
		}
		else {
			$result = "SERVIDOR N&Atilde;O DETECTADO";
		}
		return $result;
	}


	function apagarGateway($id, $gateway){

		$clienteModel = new ClienteModel();
		$result = "ERRO AO TENTAR DELETAR CADASTRO";

		if($gateway != "") {
			if($clienteModel->apagarGateway($id, $gateway)) $result = "GATEWAY DELETADO COM SUCESSO";
		}
		else {
			$result = "GATEWAY N&Atilde;O DETECTADO";
		}
		return $result;
	}


	function apagarOutrosAcessos($id, $acesso){

		$clienteModel = new ClienteModel();
		$result = "ERRO AO TENTAR DELETAR ACESSO";

		if($acesso != "") {
			if($clienteModel->apagarOutrosAcessos($id)) $result = "ACESSO DELETADO COM SUCESSO";
		}
		else {
			$result = "ACESSO N&Atilde;O DETECTADO";
		}
		return $result;
	}






	// FUNCAO BUSCAR


	function buscarClientesOption($tipo, $client=''){

		if($tipo == "option"){
			
			$clienteModel = new ClienteModel();
			$optionC = $clienteModel->buscarClientes();
			$result = "";
			for($i = 0; $i < count($optionC); $i++){

				if($client != "" && $optionC[$i]["clientes"] == $client) $result .= "<option value=\"".$optionC[$i]["clientes"]."\" selected>".$optionC[$i]["clientes"]."</option>";
				else $result .= "<option value=\"".$optionC[$i]["clientes"]."\">".$optionC[$i]["clientes"]."</option>";
				
			}
			return $result;
		}
	}


	function buscarGrupoClientesOption($cliente){

		$clienteModel = new ClienteModel();
		$optionGr = $clienteModel->buscarGrClientes($cliente);
		$result = "";
		for($i = 0; $i < count($optionGr); $i++){

			$result .= "<option value=\"".$optionGr[$i]["grupos"]."\">".$optionGr[$i]["grupos"]."</option>";
		}
		return $result;
	}


	function buscarNumeroE1Options($loja, $grupo, $cliente){

		$clienteModel = new ClienteModel();
		$idCliente = $clienteModel->buscarIdCliente($grupo, $cliente);
		//return $idCliente;
		$result = "";
		if($idCliente != ""){
			$idLoja = $clienteModel->buscarIdLoja($loja, $idCliente);

			if($idLoja != ""){
				$numerosE1 = $clienteModel->buscarNumeroE1($idLoja);

				if(count($numerosE1) >= 0){

					for($i = 0; $i < count($numerosE1); $i++){

						$result .= "<option value=\"".$numerosE1[$i]["numeroE1"]."\">".$numerosE1[$i]["numeroE1"]."</option>";
					}
				}
			}	
		}
		return $result;
	}


	function buscarNumero0800Options($loja, $grupo, $cliente){

		$clienteModel = new ClienteModel();
		$idCliente = $clienteModel->buscarIdCliente($grupo, $cliente);
		$result = "";
		if($idCliente != ""){

			$idLoja = $clienteModel->buscarIdLoja($loja, $idCliente);

			if($idLoja != ""){

				$numeros0800 = $clienteModel->buscarNumero0800($idLoja);

				if(count($numeros0800) >= 0){

					for($i = 0; $i < count($numeros0800); $i++){

						$result .= "<option value=\"".$numeros0800[$i]["numero0800"]."\">".$numeros0800[$i]["numero0800"]."</option>";
					}
				}
			}	
		}
		return $result;
	}


	function buscarNumeroLanalogicaOptions($loja, $grupo, $cliente){

		$clienteModel = new ClienteModel();
		$idCliente = $clienteModel->buscarIdCliente($grupo, $cliente);
		$result = "";
		if($idCliente != ""){

			$idLoja = $clienteModel->buscarIdLoja($loja, $idCliente);

			if($idLoja != ""){

				$numerosLa = $clienteModel->buscarNumeroLanalogica($idLoja);

				if(count($numerosLa) >= 0){

					for($i = 0; $i < count($numerosLa); $i++){

						$result .= "<option value=\"".$numerosLa[$i]["analogica"]."\">".$numerosLa[$i]["analogica"]."</option>";
					}
				}
			}	
		}
		return $result;
	}


	function buscarServidorOptions($loja, $grupo, $cliente){

		$clienteModel = new ClienteModel();
		$idCliente = $clienteModel->buscarIdCliente($grupo, $cliente);
		$result = "";
		if($idCliente != ""){

			$idLoja = $clienteModel->buscarIdLoja($loja, $idCliente);

			if($idLoja != ""){

				$servidor = $clienteModel->buscarServidor($idLoja);

				if(count($servidor) >= 0){

					for($i = 0; $i < count($servidor); $i++){

						$result .= "<option value=\"".$servidor[$i]["servidor"]."\">".$servidor[$i]["servidor"]."</option>";
					}
				}
			}	
		}
		return $result;
	}


	function buscarGatewayOptions($tipo, $loja, $grupo, $cliente){

		$clienteModel = new ClienteModel();
		$idCliente = $clienteModel->buscarIdCliente($grupo, $cliente);
		$result = "";
		if($idCliente != ""){

			$idLoja = $clienteModel->buscarIdLoja($loja, $idCliente);

			if($idLoja != ""){

				$gateway = $clienteModel->buscarGatewayE1($tipo, $idLoja);

				if(count($gateway) >= 0){

					for($i = 0; $i < count($gateway); $i++){

						$result .= "<option value=\"".$gateway[$i]["gateway"]."\">".$gateway[$i]["gateway"]."</option>";
					}
				}
			}	
		}
		return $result;
	}


	function buscarAcessosOptions($loja, $grupo, $cliente){

		$clienteModel = new ClienteModel();
		$idCliente = $clienteModel->buscarIdCliente($grupo, $cliente);
		$result = "";
		if($idCliente != ""){

			$idLoja = $clienteModel->buscarIdLoja($loja, $idCliente);

			if($idLoja != ""){

				$acesso = $clienteModel->buscarOutrosAcessos($idLoja);

				if(count($acesso) >= 0){

					for($i = 0; $i < count($acesso); $i++){

						$result .= "<option value=\"".$acesso[$i]["acesso"]."\">".$acesso[$i]["acesso"]."</option>";
					}
				}
			}	
		}
		return $result;
	}


	function buscarCadTroncoE1($numeroE1){
		$clienteModel = new ClienteModel();
		$dadosE1 = $clienteModel->buscarCadTroncoE1($numeroE1);
		$obje1 = "";
		if($dadosE1 != ""){
			$obje1 = new E1($dadosE1['num_e1'], $dadosE1['tecn_e1'], $dadosE1['rang_rddr_e1'], $dadosE1['dispositivo_e1'],
				$dadosE1['operadora_e1'], $dadosE1['qtdcanais_e1'], $dadosE1['loja_id_loja']);
		}
		return $obje1;
	}


	function buscarCad0800($numero0800){

		$clienteModel = new ClienteModel();
		$dados0800 = $clienteModel->buscarCad0800($numero0800);
		//echo print_r($dados0800, true);
		//return;
		$obj0800 = "";
		if($dados0800 != ""){
			$obj0800 = new Num_0800($dados0800['num_0800'], $dados0800['ddr_0800'], $dados0800['chave_0800'], $dados0800['fila_vdt_0800'], $dados0800['loja_id_loja']);
		}
		
		return $obj0800;
	}


	function buscarCadLanalogica($numeroLa){

		$clienteModel = new ClienteModel();
		$dadosLa = $clienteModel->buscarCadLanalogica($numeroLa);
		//echo print_r($dados0800, true);
		//return;
		$objLa = "";
		if($dadosLa != ""){
			$objLa = new Analogica($dadosLa['num_analogica'], $dadosLa['dispositivo_analogica'], $dadosLa['operadora_analogica'], $dadosLa['loja_id_loja']);
		}
		
		return $objLa;
	}


	function buscarCadServidor($servidor, $loja, $grupo, $cliente){

		$clienteModel = new ClienteModel();
		$idLoja = buscarIdLoja($loja, $grupo, $cliente);
		$dadosServidor = $clienteModel->buscarCadServidor($servidor, $idLoja);
		$objServidor = "";
		if($dadosServidor != ""){
			$objServidor = new Servidor($dadosServidor['id_servidor'], $dadosServidor['mod_servidor'], $dadosServidor['ip_servidor'], $dadosServidor['ser_princ_servidor'],
				$dadosServidor['ssh_servidor'], $dadosServidor['port_ssh_servidor'], $dadosServidor['web_servidor'], $dadosServidor['port_web_servidor'], $dadosServidor['loja_id_loja']);
		}
		
		return $objServidor;
	}


	function buscarCadGateway($gateway, $model, $loja, $grupo, $cliente){

		$clienteModel = new ClienteModel();
		$idLoja = buscarIdLoja($loja, $grupo, $cliente);
		$dadosGateway = $clienteModel->buscarCadGateway($gateway, $model, $idLoja);
		$objGateway = "";
		if($dadosGateway != ""){
			$objGateway = new Gw($dadosGateway['id_gw'], $dadosGateway['tipo_gw'], $dadosGateway['modelo_gw'], $dadosGateway['ip_gw'], $dadosGateway['acesso_gw'], 
				$dadosGateway['po_acesso_gw'], $dadosGateway['loja_id_loja']);
		}
		
		return $objGateway;
	}


	function buscarCadAcesso($acessos, $loja, $grupo, $cliente){

		$clienteModel = new ClienteModel();
		$idLoja = buscarIdLoja($loja, $grupo, $cliente);
		$dadosAcesso = $clienteModel->buscarCadAcesso($acessos, $idLoja);
		$objAcesso = "";
		if($dadosAcesso != ""){
			$objAcesso = new Acesso($dadosAcesso['id_acesso'], $dadosAcesso['tipo_acesso'], $dadosAcesso['ip_id_acesso'], $dadosAcesso['usuario_acesso'],
				$dadosAcesso['senha_acesso'], $dadosAcesso['local_acesso'], $dadosAcesso['loja_id_loja']);
		}
		
		return $objAcesso;
	}


	function buscarCadastroLoja($loja, $grupo, $cliente){

		$clienteModel = new ClienteModel();
		$idCliente = $clienteModel->buscarIdCliente($grupo, $cliente);
		$objDadosLoja = "";
		if($idCliente != ""){

			$idLoja = $clienteModel->buscarIdLoja($loja, $idCliente);

			if($idLoja != ""){

				$dadosLoja = $clienteModel->buscarCadastroLoja($idLoja);
				if($dadosLoja != ""){

					$objDadosLoja = new Loja($dadosLoja['id_loja'], $dadosLoja['nome_loja'], $dadosLoja['lograd_loja'], $dadosLoja['bairro_loja'],
						$dadosLoja['cidade_loja'], $dadosLoja['cnpj_loja'], $dadosLoja['rsoc_loja']);
				}				
			}	
		}
		return $objDadosLoja;
	}


	function buscarCadastroContato($loja, $grupo, $cliente){

		$clienteModel = new ClienteModel();
		$idCliente = $clienteModel->buscarIdCliente($grupo, $cliente);
		$objDadosContato = "";
		if($idCliente != ""){

			$idLoja = $clienteModel->buscarIdLoja($loja, $idCliente);

			if($idLoja != ""){

				$dadosContato = $clienteModel->buscarCadastroContato($idLoja);
				if($dadosContato != ""){
					$objDadosContato = new Contato($dadosContato['id_contato'], $dadosContato['nome_contato'], $dadosContato['cargo_contato'], $dadosContato['tel_contato'],
						$dadosContato['ramal_contato'], $dadosContato['email_contato']);
				}				
			}	
		}
		return $objDadosContato;
	}

	function buscarCadastroObsGeral($loja, $grupo, $cliente){

		$clienteModel = new ClienteModel();
		$idCliente = $clienteModel->buscarIdCliente($grupo, $cliente);
		$objObsGeral = "";
		if($idCliente != ""){

			$idLoja = $clienteModel->buscarIdLoja($loja, $idCliente);

			if($idLoja != ""){

				$dadosObsGeral = $clienteModel->buscarCadastroObsGeral($idLoja);
				if($dadosObsGeral != ""){
					$objObsGeral = new Obs($dadosObsGeral['id_obs'], (boolean)$dadosObsGeral['possui_mesa_virtual_obs'], $dadosObsGeral['licenca_mesa_obs'], (boolean)$dadosObsGeral['possui_tel_ip_obs'],
						$dadosObsGeral['ip_tel_obs'], $dadosObsGeral['modelo_tel_obs'], (boolean)$dadosObsGeral['possui_g729'], $dadosObsGeral['qtd_g729'], $dadosObsGeral['rang_ramal_obs'], 
						$dadosObsGeral['geral_obs'], $dadosObsGeral['loja_id_loja']);
				}				
			}	
		}
		return $objObsGeral;
	}

	function buscarSubGrupoClientesOption($cliente, $grupo){

		$clienteModel = new ClienteModel();
		$optionSGr = $clienteModel->buscarSubGrupoClientes($cliente, $grupo);
		//echo print_r($optionSGr, true);
		//return;
		$result = "";
		for($i = 0; $i < count($optionSGr); $i++){

			$result .= "<option value=\"".$optionSGr[$i]["loja"]."\">".$optionSGr[$i]["loja"]."</option>";
		}
		return $result;
	}


	function buscarNumeroGsm($loja, $grupo, $cliente){


		$clienteModel = new ClienteModel();
		$idCliente = $clienteModel->buscarIdCliente($grupo, $cliente);
		$result = array();
		if($idCliente != ""){

			$idLoja = $clienteModel->buscarIdLoja($loja, $idCliente);

			if($idLoja != ""){

				$dadosGsm = $clienteModel->buscarDadosGsm($idLoja);
				for($i = 0; $i < count($dadosGsm); $i++){

					$objGsm = new Gsm($dadosGsm[$i]['num_gsm'], $dadosGsm[$i]['dispositivo_gsm'], $dadosGsm[$i]['operadora_gsm'], $dadosGsm[$i]['loja_id_loja']);
					$result[] = $objGsm;
				}				
			}	
		}
		return $result;
	}

	function buscarIdLoja($loja, $grupo, $cliente){

		$clienteModel = new ClienteModel();
		$idCliente = $clienteModel->buscarIdCliente($grupo, $cliente);
		$result = "";
		if($idCliente != ""){

			$idLoja = $clienteModel->buscarIdLoja($loja, $idCliente);

			if($idLoja != ""){

				$result = $idLoja;
			}	
		}
		return $result;
	}





	function validarAcesso($login, $senha){

		$clienteModel = new ClienteModel();
		$result = false;
		if($clienteModel->buscarLogin($login, $senha)){
			$_SESSION['login'] = true;
			$result = true;
		}
		return $result;
	}





	function criarMenu(){

		$clienteModel = new ClienteModel();
		$clientes = $clienteModel->buscarClientes();
		$menu = "";
		for($c = 0; $c < count($clientes); $c++){

			$idDivCl = str_replace(" ", "_", $clientes[$c]["clientes"]);

			$menu .= "<span class=\"btn_menu_cliente\" onclick=\"exibeMenuGrupo('".$idDivCl."');\">".$clientes[$c]["clientes"]."</span>";
			$grupos = $clienteModel->buscarGrClientes($clientes[$c]["clientes"]);

			if(count($grupos) > 0){
				

				$menu .="<div id=\"div_igrupo_".$idDivCl."\" class=\"div_grupo\" style=\"display:none;\">";

				for($g = 0; $g < count($grupos); $g++) {

					$idDivGrupo = str_replace(" ", "_", $grupos[$g]["grupos"]);

					$menu .="<span class=\"btn_menu_grupo\" onclick=\"exibeMenuSubGrupo('".$idDivGrupo."');\">".$grupos[$g]["grupos"]."</span>";
					$subGrupo = $clienteModel->buscarSubGrupoClientes ($clientes[$c]["clientes"], $grupos[$g]["grupos"]);
					$menu .="<div id=\"div_isubgrupo_".$idDivGrupo."\" class=\"div_sub\" style=\"display:none;\">";

					if(count($subGrupo) > 0){

						for($s = 0; $s < count($subGrupo); $s++) {
							$menu .="<div><span id=\"iSubGrupo_".$subGrupo[$s]["loja"]."\" class=\"btn_menu_sub\" 
							onclick=\"exibeCadastroLoja('".$subGrupo[$s]["loja"]."','".$grupos[$g]["grupos"]."','".$clientes[$c]["clientes"]."');\">&raquo;&nbsp;&nbsp;&nbsp;".$subGrupo[$s]["loja"]."</span></div>";
						}
					}
					$menu .="</div>";
				}
				$menu .="</div>";
			}
		}
		return $menu;
	}
?>
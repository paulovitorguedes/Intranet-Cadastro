<?php

	require("intraconection.php");
	require_once($_SERVER["DOCUMENT_ROOT"]."/intranet/classes/entidade/cliente.php");

	class ClienteModel{

		private $conectBd;
		
		function __construct(){
			$this->conectBd = new Conexao();
		}

		function cadastrarCliente($client){

			$cont = "SELECT COUNT(*) as qtd FROM cliente WHERE nome_cliente='".$client->getNome_cLiente()."'";
			$saida = $this->conectBd->executarMysql($cont);
			$cont = $saida->fetch_array(MYSQLI_ASSOC); 

			//echo print_r($cont, true);
			if($cont['qtd'] == '0'){
				$sql = "INSERT INTO cliente (nome_cliente) VALUE ('".$client->getNome_cLiente()."')";
				$saida = $this->conectBd->executarMysql($sql);
				return $saida;
			
			}else {
				return "exist";
			}
		}


		// FUNCAO CADASTRAR

		function cadastrarGrupoCliente($client){

			$sql = "SELECT grp_cliente as grupo FROM cliente WHERE nome_cliente='".$client->getNome_cliente()."'";
			$result = $this->conectBd->executarMysql($sql);
			$sql = $result->fetch_array(MYSQLI_ASSOC);

			if($sql['grupo'] == ""){

				$sql = "UPDATE cliente SET grp_cliente='".$client->getGrp_cliente()."' WHERE nome_cliente='".$client->getNome_cLiente()."'";
				$saida = $this->conectBd->executarMysql($sql);
				return $saida;
			
			}else {
				$i = false;
				while ($sql) {
					if ($sql['grupo'] == $client->getGrp_cliente()){
						$i = true;
						break;
					}
					$sql = $result->fetch_array(MYSQLI_ASSOC);
				}

				if($i){
					return "existGr";

				}else {
					$sql = "INSERT INTO cliente (nome_cliente, grp_cliente) VALUE ('".$client->getNome_cLiente()."', '".$client->getGrp_cliente()."')";
					$saida = $this->conectBd->executarMysql($sql);
					return $saida;
				}
			}	
		}


		function cadastrarSubGrupoCliente($client, $subGrupo){


			$id = "SELECT id_cliente as id FROM cliente WHERE nome_cliente='".$client->getNome_cLiente()."' AND grp_cliente='".$client->getGrp_cliente()."'";
			$saida = $this->conectBd->executarMysql($id);
			
			//echo print_r($id, true);

			if($saida){

				$id = $saida->fetch_array(MYSQLI_ASSOC);

				$sgrp = "SELECT nome_loja as loja FROM loja WHERE cliente_id_cliente=".$id['id'];
				$saida = $this->conectBd->executarMysql($sgrp);

				$sgrp = $saida->fetch_array(MYSQLI_ASSOC);

				$i = false;
				while ($sgrp) {
					if($sgrp['loja'] == $subGrupo) {
						$i = true;
						break;
					}
					$sgrp = $saida->fetch_array(MYSQLI_ASSOC);
				}

				if($i){

					return "existSGr";

				} else {

					$sql = "INSERT INTO loja (nome_loja, cliente_id_cliente) VALUE ('".$subGrupo."', ".$id['id'].")";
					$saida = $this->conectBd->executarMysql($sql);
					return $saida;
				}

			}else {
				return $saida;
			}
		}


		function cadastrarE1($objE1){

			$sql = "INSERT INTO e1 (num_e1, tecn_e1, rang_rddr_e1, dispositivo_e1, operadora_e1, qtdcanais_e1, loja_id_loja) VALUE". 
			"('".$objE1->getNum_e1()."', '".$objE1->getTecn_e1()."', '".$objE1->getRang_ddr_e1()."', '".$objE1->getDispositivo_e1().
			"', '".$objE1->getOperadora_e1()."', '".$objE1->getQtdcanais_e1()."', '".$objE1->getLoja_id_loja()."')";

			$saida = $this->conectBd->executarMysql($sql);
			return $saida;
		}


		function cadastrar0800($obj0800){

			$sql = "INSERT INTO num_0800 (num_0800, ddr_0800, chave_0800, fila_vdt_0800, loja_id_loja) VALUE". 
			"('".$obj0800->getNum_0800()."', '".$obj0800->getDdr_0800()."', '".$obj0800->getChave_0800()."', '".$obj0800->getFila_vdt_0800().
			"', '".$obj0800->getLoja_id_loja()."')";

			$saida = $this->conectBd->executarMysql($sql);
			return $saida;
		}


		function cadastrarLanalogica($objLa){

			$sql = "INSERT INTO analogica (num_analogica, dispositivo_analogica, operadora_analogica, loja_id_loja) VALUE". 
			"('".$objLa->getNum_analogica()."', '".$objLa->getDispositivo_analogica()."', '".$objLa->getOperadora_analogica().
			"', '".$objLa->getLoja_id_loja()."')";

			$saida = $this->conectBd->executarMysql($sql);
			return $saida;
		}


		function cadastrarNumeroGsm($objGsm){

			$sql = "INSERT INTO gsm (num_gsm, dispositivo_gsm, operadora_gsm, loja_id_loja) VALUE". 
			"('".$objGsm->getNum_gsm()."', '".$objGsm->getDispositivo_gsm()."', '".$objGsm->getOperadora_gsm().
			"', '".$objGsm->getLoja_id_loja()."')";

			$saida = $this->conectBd->executarMysql($sql);
			return $saida;
		}


		function cadastrarServidor($objServidor){

			$sql = "INSERT INTO servidor (mod_servidor, ip_servidor, ser_princ_servidor, ssh_servidor, port_ssh_servidor, web_servidor, port_web_servidor, loja_id_loja) VALUE". 
			"('".$objServidor->getMod_servidor()."', '".$objServidor->getIp_servidor()."', '".$objServidor->getSer_princ_servidor()."', '".$objServidor->getSsh_servidor().
			"', '".$objServidor->getPort_ssh_servidor()."', '".$objServidor->getWeb_servidor()."', '".$objServidor->getPort_web_servidor()."', '".$objServidor->getLoja_id_loja()."')";

			$saida = $this->conectBd->executarMysql($sql);
			return $saida;
		}


		function cadastrarGateway($objGateway){

			$sql = "INSERT INTO gw (tipo_gw, modelo_gw, ip_gw, acesso_gw, po_acesso_gw, loja_id_loja) VALUE". 
			"('".$objGateway->getTipo_gw()."', '".$objGateway->getModelo_gw()."', '".$objGateway->getIp_gw()."', '".$objGateway->getAcesso_gw().
			"', '".$objGateway->geTpo_acesso_gw()."', '".$objGateway->getLoja_id_loja()."')";

			$saida = $this->conectBd->executarMysql($sql);
			return $saida;
		}


		function cadastrarOutrosAcessos($objAcesso){

			$sql = "INSERT INTO acesso (tipo_acesso, ip_id_acesso, usuario_acesso, senha_acesso, local_acesso, loja_id_loja) VALUE". 
			"('".$objAcesso->getTipo_acesso()."', '".$objAcesso->getIp_id_acesso()."', '".$objAcesso->getUsuario_acesso()."', '".$objAcesso->getSenha_acesso().
			"', '".$objAcesso->getLocal_acesso()."', '".$objAcesso->getLoja_id_loja()."')";

			$saida = $this->conectBd->executarMysql($sql);
			return $saida;
		}


		function cadastrarDadosLoja($objLoja, $objContato){

			$sqlLoja = "UPDATE loja SET nome_loja='".$objLoja->getNome_loja()."', lograd_loja='".$objLoja->getLograd_loja()."', bairro_loja='".
			$objLoja->getBairro_loja()."', cidade_loja='".$objLoja->getCidade_loja()."', cnpj_loja='".$objLoja->getCnpj_loja().
			"', rsoc_loja='".$objLoja->getRsoc_loja()."' WHERE id_loja='".$objLoja->getId_loja()."'";

			$sqlContato = "INSERT INTO contato (nome_contato, cargo_contato, tel_contato, ramal_contato, email_contato, lojas_id_loja) VALUE".
			"('".$objContato->getNome_contato()."', '".$objContato->getCargo_contato()."', '".$objContato->getTel_contato()."', '".$objContato->getRamal_contato().
			"', '".$objContato->getEmail_contato()."', '".$objLoja->getId_loja()."')";

			$saida1 = $this->conectBd->executarMysql($sqlLoja);
			$saida2 = $this->conectBd->executarMysql($sqlContato);

			if($saida1 && $saida2) return true;
			else return false;
		}


		function cadastrarObsGeral($objObs){

			$sqlObs = "INSERT INTO obs (possui_mesa_virtual_obs, licenca_mesa_obs, possui_tel_ip_obs, ip_tel_obs, modelo_tel_obs, possui_g729, qtd_g729, rang_ramal_obs, geral_obs, loja_id_loja) VALUE".
			"(".$objObs->getPossui_mesa_virtual_obs().", '".$objObs->getLicenca_mesa_obs()."', ".$objObs->getPossui_tel_ip_obs().", '".$objObs->getIp_Tel_obs().
			"', '".$objObs->getModelo_tel_obs()."', ".$objObs->getPossui_g729().", '".$objObs->getQtd_g729()."', '".$objObs->getRang_ramal_obs()."', '".$objObs->getGeral_obs().
			"', '".$objObs->getLoja_id_loja()."')";
			//return $sqlObs;
			$saida = $this->conectBd->executarMysql($sqlObs);
			return $saida;
		}






		// FUNCAO ALTERAR

		function alterarE1($objE1){

			$sql = "UPDATE e1 SET tecn_e1='".$objE1->getTecn_e1()."', rang_rddr_e1='".$objE1->getRang_ddr_e1()."', dispositivo_e1='".
			$objE1->getDispositivo_e1()."', operadora_e1='".$objE1->getOperadora_e1()."', qtdcanais_e1='".$objE1->getQtdcanais_e1().
			"' WHERE num_e1='".$objE1->getNum_e1()."'";

			$saida = $this->conectBd->executarMysql($sql);
			return $saida;
		}


		function alterar0800($obj0800){

			$sql = "UPDATE num_0800 SET ddr_0800='".$obj0800->getDdr_0800()."', chave_0800='".$obj0800->getChave_0800()."', fila_vdt_0800='".
			$obj0800->getFila_vdt_0800()."' WHERE num_0800='".$obj0800->getNum_0800()."'";

			$saida = $this->conectBd->executarMysql($sql);
			return $saida;
		}


		function alterarLanalogica($objLa){

			$sql = "UPDATE analogica SET dispositivo_analogica='".$objLa->getDispositivo_analogica()."', operadora_analogica='".
			$objLa->getOperadora_analogica()."' WHERE num_analogica='".$objLa->getNum_analogica()."'";

			$saida = $this->conectBd->executarMysql($sql);
			return $saida;
		}


		function alterarGsm($objGsm){

			$sql = "UPDATE gsm SET dispositivo_gsm='".$objGsm->getDispositivo_gsm()."', operadora_gsm='".
			$objGsm->getOperadora_gsm()."' WHERE num_gsm='".$objGsm->getNum_gsm()."'";

			$saida = $this->conectBd->executarMysql($sql);
			return $saida;
		}


		function alterarServidor($objServidor){

			$sql = "UPDATE servidor SET ip_servidor='".$objServidor->getIp_servidor()."', ser_princ_servidor='".$objServidor->getSer_princ_servidor()."', ssh_servidor='".$objServidor->getSsh_servidor().
			"', port_ssh_servidor='".$objServidor->getPort_ssh_servidor()."', web_servidor='".$objServidor->getWeb_servidor()."', port_web_servidor='".$objServidor->getPort_web_servidor().
			"' WHERE id_servidor='".$objServidor->getId_servidor()."'";

			$saida = $this->conectBd->executarMysql($sql);
			return $saida;
		}


		function alterarGateway($objGateway){

			$sql = "UPDATE gw SET ip_gw='".$objGateway->getIp_gw()."', acesso_gw='".$objGateway->getAcesso_gw()."', po_acesso_gw='".$objGateway->geTpo_acesso_gw().
			"' WHERE id_gw='".$objGateway->getId_gw()."'";

			$saida = $this->conectBd->executarMysql($sql);
			return $saida;
		}


		function alterarOutrosAcessos($objAcesso){

			$sql = "UPDATE acesso SET ip_id_acesso='".$objAcesso->getIp_id_acesso()."', usuario_acesso='".$objAcesso->getUsuario_acesso()."', senha_acesso='".
			$objAcesso->getSenha_acesso()."', local_acesso='".$objAcesso->getLocal_acesso()."' WHERE id_acesso='".$objAcesso->getId_acesso()."'";
			$saida = $this->conectBd->executarMysql($sql);
			return $saida;
		}


		function alterCadastroDadosLOja($objLoja, $objContato){

			$sqlLoja = "UPDATE loja SET nome_loja='".$objLoja->getNome_loja()."', lograd_loja='".$objLoja->getLograd_loja()."', bairro_loja='".
			$objLoja->getBairro_loja()."', cidade_loja='".$objLoja->getCidade_loja()."', cnpj_loja='".$objLoja->getCnpj_loja().
			"', rsoc_loja='".$objLoja->getRsoc_loja()."' WHERE id_loja='".$objLoja->getId_loja()."'";

			$sqlContato = "UPDATE contato SET nome_contato='".$objContato->getNome_contato()."', cargo_contato='".$objContato->getCargo_contato()."', tel_contato='".
			$objContato->getTel_contato()."', ramal_contato='".$objContato->getRamal_contato()."', email_contato='".$objContato->getEmail_contato().
			"' WHERE lojas_id_loja='".$objLoja->getId_loja()."'";


			$saida1 = $this->conectBd->executarMysql($sqlLoja);
			$saida2 = $this->conectBd->executarMysql($sqlContato);

			if($saida1 && $saida2) return true;
			else return false;
		}

		function alterarCadastroObsGeral($objObs){

			$sqlObs = "UPDATE obs SET possui_mesa_virtual_obs=".$objObs->getPossui_mesa_virtual_obs().", licenca_mesa_obs='".$objObs->getLicenca_mesa_obs()."', possui_tel_ip_obs=".
			$objObs->getPossui_tel_ip_obs().", ip_tel_obs='".$objObs->getIp_Tel_obs()."', modelo_tel_obs='".$objObs->getModelo_tel_obs().
			"', possui_g729=".$objObs->getPossui_g729().", qtd_g729='".$objObs->getQtd_g729()."', rang_ramal_obs='".$objObs->getRang_ramal_obs().
			"', geral_obs='".$objObs->getGeral_obs()."' WHERE loja_id_loja='".$objObs->getLoja_id_loja()."'";

			//return $sqlObs;
			$saida1 = $this->conectBd->executarMysql($sqlObs);
			return $saida1;
		}







		// FUNCAO APAGAR


		function apagarCliente($nomeCliente){

			$cont = "DELETE FROM cliente WHERE nome_cliente='".$nomeCliente."'";
			$saida = $this->conectBd->executarMysql($cont);
			return $saida;
		}

		function apagarColunaGrupoCliente($nomeCliente, $nomeGrupo){

			$result = "UPDATE cliente SET grp_cliente=\"\" WHERE nome_cliente='".$nomeCliente."' AND grp_cliente='".$nomeGrupo."'";
			$saida = $this->conectBd->executarMysql($result);
			return $saida;
		}

		function apagarGrupoCliente($nomeCliente, $nomeGrupo){

			$cont = "DELETE FROM cliente WHERE nome_cliente='".$nomeCliente."' AND grp_cliente='".$nomeGrupo."'";
			$saida = $this->conectBd->executarMysql($cont);
			return $saida;
		}

		function apagarSubGrupoCliente($nomeCliente, $nomeGrupo, $nomeSubGrupo){

			$idCliente = "SELECT id_cliente as id FROM cliente WHERE nome_cliente='".$nomeCliente."' AND grp_cliente='".$nomeGrupo."'";
			$saida = $this->conectBd->executarMysql($idCliente);


			if($saida){

				$id = $saida->fetch_array(MYSQLI_ASSOC);
				$result = "DELETE FROM loja WHERE nome_loja='".$nomeSubGrupo."' AND cliente_id_cliente=".$id['id'];
				$saida = $this->conectBd->executarMysql($result);
			}
			return $saida;
		}


		function apagarE1($numero){

			$sql = "DELETE FROM e1 WHERE num_e1='".$numero."'";
			$saida = $this->conectBd->executarMysql($sql);
			return $saida;
		}

		function apagar0800($numero){

			$sql = "DELETE FROM num_0800 WHERE num_0800='".$numero."'";
			$saida = $this->conectBd->executarMysql($sql);
			return $saida;
		}

		function apagarLanalogica($numero){

			$sql = "DELETE FROM analogica WHERE num_analogica='".$numero."'";
			$saida = $this->conectBd->executarMysql($sql);
			return $saida;
		}

		function apagarGsm($numero){

			$sql = "DELETE FROM gsm WHERE num_gsm='".$numero."'";
			$saida = $this->conectBd->executarMysql($sql);
			return $saida;
		}

		function apagarServidor($id){

			$sql = "DELETE FROM servidor WHERE id_servidor='".$id."'";
			$saida = $this->conectBd->executarMysql($sql);
			return $saida;
		}

		function apagarGateway($id, $gateway){

			$sql = "DELETE FROM gw WHERE id_gw='".$id."' AND tipo_gw='".$gateway."'";
			$saida = $this->conectBd->executarMysql($sql);
			return $saida;
		}


		function apagarOutrosAcessos($id){

			$sql = "DELETE FROM acesso WHERE id_acesso='".$id."'";
			$saida = $this->conectBd->executarMysql($sql);
			return $saida;
		}

		function apagarOutrosAcessosPorIdLoja($id){

			$sql = "DELETE FROM acesso WHERE loja_id_loja='".$id."'";
			$saida = $this->conectBd->executarMysql($sql);
			return $saida;
		}

		function apagarLanalogicaPorIdLoja($id){

			$sql = "DELETE FROM analogica WHERE loja_id_loja='".$id."'";
			$saida = $this->conectBd->executarMysql($sql);
			return $saida;
		}

		function apagarContatoPorIdLoja($id){

			$sql = "DELETE FROM contato WHERE lojas_id_loja='".$id."'";
			$saida = $this->conectBd->executarMysql($sql);
			return $saida;
		}

		function apagarE1PorIdLoja($id){

			$sql = "DELETE FROM e1 WHERE loja_id_loja='".$id."'";
			$saida = $this->conectBd->executarMysql($sql);
			return $saida;
		}

		function apagarGsmPorIdLoja($id){

			$sql = "DELETE FROM gsm WHERE loja_id_loja='".$id."'";
			$saida = $this->conectBd->executarMysql($sql);
			return $saida;
		}

		function apagarGwPorIdLoja($id){

			$sql = "DELETE FROM gw WHERE loja_id_loja='".$id."'";
			$saida = $this->conectBd->executarMysql($sql);
			return $saida;
		}

		function apagar0800PorIdLoja($id){

			$sql = "DELETE FROM num_0800 WHERE loja_id_loja='".$id."'";
			$saida = $this->conectBd->executarMysql($sql);
			return $saida;
		}

		function apagarObsPorIdLoja($id){

			$sql = "DELETE FROM obs WHERE loja_id_loja='".$id."'";
			$saida = $this->conectBd->executarMysql($sql);
			return $saida;
		}

		function apagarServidorPorIdLoja($id){

			$sql = "DELETE FROM servidor WHERE loja_id_loja='".$id."'";
			$saida = $this->conectBd->executarMysql($sql);
			return $saida;
		}






		// FUNCAO BUSCAR


		//busca os clientes retirando os repetidos
		function buscarClientes(){

			$clientes = "SELECT nome_cliente as clientes FROM cliente  GROUP BY clientes ORDER BY clientes";
			$saida = $this->conectBd->executarMysql($clientes);
			$clientes = $saida->fetch_array(MYSQLI_ASSOC);
			$arrayClientes = array();
			
			while($clientes){

				$arrayClientes[] = $clientes;
				$clientes = $saida->fetch_array(MYSQLI_ASSOC);
			}
			return $arrayClientes;
		}


		// Busca todos os clientes, mesmo que repetidos
		function buscarColunaCliente(){

			$clientes = "SELECT nome_cliente as clientes FROM cliente";
			$saida = $this->conectBd->executarMysql($clientes);
			$clientes = $saida->fetch_array(MYSQLI_ASSOC);
			$arrayClientes = array();
			
			while($clientes){

				$arrayClientes[] = $clientes;
				$clientes = $saida->fetch_array(MYSQLI_ASSOC);
			}
			return $arrayClientes;
		}


		function buscarGrClientes($cliente){

			$grupos = "SELECT grp_cliente as grupos FROM `intranet`.`cliente` WHERE nome_cliente='".$cliente."' ORDER BY grupos";
			$saida = $this->conectBd->executarMysql($grupos);
			$grupos = $saida->fetch_array(MYSQLI_ASSOC);
			$arrayGrupo = array();

			while($grupos) {
				$arrayGrupo[] = $grupos;
				$grupos = $saida->fetch_array(MYSQLI_ASSOC);
			}
			return $arrayGrupo;	
		}


		function buscarSubGrupoClientes($client, $grupo){

			$id = "SELECT id_cliente as id FROM `intranet`.`cliente` WHERE nome_cliente='".$client."' AND grp_cliente='".$grupo."'";
			$saida = $this->conectBd->executarMysql($id);

			if($saida){

				$id = $saida->fetch_array(MYSQLI_ASSOC);
				$sgrp = "SELECT nome_loja as loja FROM loja WHERE cliente_id_cliente=".$id['id'];
				$saida = $this->conectBd->executarMysql($sgrp);
				if(!$saida) return array();
				$sgrp = $saida->fetch_array(MYSQLI_ASSOC);

				$sGrupos = array();
				while ($sgrp) {
					$sGrupos[] = $sgrp;
					$sgrp = $saida->fetch_array(MYSQLI_ASSOC);
				}
			}
			return $sGrupos;
		}


		function buscarIdCliente($grupo, $cliente){

			$idCLiente = "SELECT id_cliente FROM `intranet`.`cliente` WHERE grp_cliente='".$grupo."' AND nome_cliente='".$cliente."'";
			//return $idCLiente;
			$id = $this->conectBd->executarMysql($idCLiente);
			$resultIdCli = $id->fetch_array(MYSQLI_ASSOC);
			//echo print_r($resultIdCli, true);
			//return;
			$idCli = "";
			if($resultIdCli){
				$idCli = $resultIdCli['id_cliente'];
			}
			return $idCli;
		}


		function buscarIdLoja($loja, $idCliente){

			$idLoja = "SELECT id_loja FROM loja WHERE nome_loja='".$loja."' AND cliente_id_cliente='".$idCliente."'";
			$id = $this->conectBd->executarMysql($idLoja);
			$resultIdLoja = $id->fetch_array(MYSQLI_ASSOC);
			
			$idLoja = "";
			if($resultIdLoja){
				$idLoja = $resultIdLoja['id_loja'];
			}			
			return $idLoja;
		}


		function buscarNumeroE1($idLoja){

			$e1 = "SELECT num_e1 as numeroE1 FROM e1 WHERE loja_id_loja='".$idLoja."' ORDER BY numeroE1";
			$saida = $this->conectBd->executarMysql($e1);
			$resultE1 = $saida->fetch_array(MYSQLI_ASSOC);
			$arrayE1 = array();
			
			while($resultE1) {
				$arrayE1[] = $resultE1;
				$resultE1 = $saida->fetch_array(MYSQLI_ASSOC);
			}
			//echo print_r($arrayE1, true);
			//return;
			return $arrayE1;	
		}


		function buscarNumero0800($idLoja){

			$num0800 = "SELECT num_0800 as numero0800 FROM num_0800 WHERE loja_id_loja='".$idLoja."' ORDER BY numero0800";
			$saida = $this->conectBd->executarMysql($num0800);
			$result0800 = $saida->fetch_array(MYSQLI_ASSOC);
			$array0800 = array();
			
			while($result0800) {
				$array0800[] = $result0800;
				$result0800 = $saida->fetch_array(MYSQLI_ASSOC);
			}
			//echo print_r($arrayE1, true);
			//return;
			return $array0800;	
		}


		function buscarNumeroLanalogica($idLoja){

			$numLa = "SELECT num_analogica as analogica FROM analogica WHERE loja_id_loja='".$idLoja."' ORDER BY analogica";
			$saida = $this->conectBd->executarMysql($numLa);
			$resultLa = $saida->fetch_array(MYSQLI_ASSOC);
			$arrayLa = array();
			
			while($resultLa) {
				$arrayLa[] = $resultLa;
				$resultLa = $saida->fetch_array(MYSQLI_ASSOC);
			}
			//echo print_r($arrayE1, true);
			//return;
			return $arrayLa;	
		}


		function buscarServidorPorModelo($servidor, $idLoja){

			$servidor = "SELECT * FROM servidor WHERE loja_id_loja='".$idLoja."' AND mod_servidor='".$servidor."'";
			$saida = $this->conectBd->executarMysql($servidor);
			$resultServidor = $saida->fetch_array(MYSQLI_ASSOC);
			
			return $resultServidor;	
		}


		function buscarGatewayPorModelo($gateway, $modelo, $idLoja){

			$gateway = "SELECT * FROM gw WHERE loja_id_loja='".$idLoja."' AND tipo_gw='".$gateway."' AND modelo_gw='".$modelo."'";
			$saida = $this->conectBd->executarMysql($gateway);
			$resultGateway = $saida->fetch_array(MYSQLI_ASSOC);
			
			return $resultGateway;	
		}


		function buscarAcessosPorTipo($acesso, $idLoja){

			$acesso = "SELECT * FROM acesso WHERE loja_id_loja='".$idLoja."' AND tipo_acesso='".$acesso."'";
			$saida = $this->conectBd->executarMysql($acesso);
			$resultAcesso = $saida->fetch_array(MYSQLI_ASSOC);
			
			return $resultAcesso;	
		}


		function buscarServidor($idLoja){

			$servidor = "SELECT mod_servidor as servidor FROM servidor WHERE loja_id_loja='".$idLoja."' ORDER BY servidor";
			$saida = $this->conectBd->executarMysql($servidor);
			$resultServidor = $saida->fetch_array(MYSQLI_ASSOC);
			$arrayServidor = array();
			
			while($resultServidor) {
				$arrayServidor[] = $resultServidor;
				$resultServidor = $saida->fetch_array(MYSQLI_ASSOC);
			}
			//echo print_r($arrayE1, true);
			//return;
			return $arrayServidor;	
		}


		function buscarDadosGsm($idLoja){

			$numGsm = "SELECT * FROM gsm WHERE loja_id_loja='".$idLoja."' ORDER BY operadora_gsm";
			$saida = $this->conectBd->executarMysql($numGsm);
			$resultGsm = $saida->fetch_array(MYSQLI_ASSOC);
			$arrayGsm = array();

			while($resultGsm) {
				$arrayGsm[] = $resultGsm;
				$resultGsm = $saida->fetch_array(MYSQLI_ASSOC);
			}
			//echo print_r($arrayGsm, true);
			//return;
			return $arrayGsm;	
		}


		function buscarGatewayE1($tipo, $idLoja){

			$gateway = "SELECT tipo_gw as gateway FROM gw WHERE loja_id_loja='".$idLoja."' AND modelo_gw='".$tipo."' ORDER BY gateway";
			$saida = $this->conectBd->executarMysql($gateway);
			$resultGateway = $saida->fetch_array(MYSQLI_ASSOC);
			$arrayGateway = array();
			
			while($resultGateway) {
				$arrayGateway[] = $resultGateway;
				$resultGateway = $saida->fetch_array(MYSQLI_ASSOC);
			}
			//echo print_r($arrayE1, true);
			//return;
			return $arrayGateway;	
		}


		function buscarOutrosAcessos($idLoja){

			$acesso = "SELECT tipo_acesso as acesso FROM acesso WHERE loja_id_loja='".$idLoja."' ORDER BY acesso";
			$saida = $this->conectBd->executarMysql($acesso);
			$resultAcesso = $saida->fetch_array(MYSQLI_ASSOC);
			$arrayAcesso = array();
			
			while($resultAcesso) {
				$arrayAcesso[] = $resultAcesso;
				$resultAcesso = $saida->fetch_array(MYSQLI_ASSOC);
			}
			//echo print_r($arrayAcesso, true);
			//return;
			return $arrayAcesso;	
		}


		function consultarNumeroGsm($numero){

			$result = false;
			$numGsm = "SELECT COUNT(num_gsm) as qtdGsm FROM gsm WHERE num_gsm LIKE '".$numero."'";

			$saida = $this->conectBd->executarMysql($numGsm);
			$resultGsm = $saida->fetch_array(MYSQLI_ASSOC);

			if($resultGsm['qtdGsm'] > 0){
				$result = true;
			}

			return $result;
		}


		function buscarCadTroncoE1($numeroE1){

			$cadE1 = "SELECT * FROM e1 WHERE num_e1 like '".$numeroE1."'";
			$saida = $this->conectBd->executarMysql($cadE1);
			$resultE1 = $saida->fetch_array(MYSQLI_ASSOC);
			$result = "";
			if($resultE1){
				$result = $resultE1;
			}
			return $result;	
		}


		function buscarCad0800($numero0800){

			$cad0800 = "SELECT * FROM num_0800 WHERE num_0800 like '".$numero0800."'";
			$saida = $this->conectBd->executarMysql($cad0800);
			$result0800 = $saida->fetch_array(MYSQLI_ASSOC);
			$result = "";
			if($result0800){
				$result = $result0800;
			}
			return $result;	
		}


		function buscarCadLanalogica($numeroLa){

			$cadLa = "SELECT * FROM analogica WHERE num_analogica like '".$numeroLa."'";
			$saida = $this->conectBd->executarMysql($cadLa);
			$resultLa = $saida->fetch_array(MYSQLI_ASSOC);
			$result = "";
			if($resultLa){
				$result = $resultLa;
			}
			return $result;	
		}


		function buscarCadServidor($servidor, $idloja){

			$cadServidor = "SELECT * FROM servidor WHERE mod_servidor like '".$servidor."' AND loja_id_loja like ".$idloja;
			$saida = $this->conectBd->executarMysql($cadServidor);
			$resultServidor = $saida->fetch_array(MYSQLI_ASSOC);
			$result = "";
			if($resultServidor){
				$result = $resultServidor;
			}
			return $result;	
		}


		function buscarCadGateway($gateway, $model, $idloja){

			$cadGateway = "SELECT * FROM gw WHERE tipo_gw like '".$gateway."' AND modelo_gw like '".$model."' AND loja_id_loja like ".$idloja;
			$saida = $this->conectBd->executarMysql($cadGateway);
			$resultGateway = $saida->fetch_array(MYSQLI_ASSOC);
			$result = "";
			if($resultGateway){
				$result = $resultGateway;
			}
			return $result;	
		}


		function buscarCadAcesso($acessos, $idloja){

			$cadAcesso = "SELECT * FROM acesso WHERE tipo_acesso like '".$acessos."' AND loja_id_loja like ".$idloja;
			$saida = $this->conectBd->executarMysql($cadAcesso);
			$resultAcesso = $saida->fetch_array(MYSQLI_ASSOC);
			$result = "";
			if($resultAcesso){
				$result = $resultAcesso;
			}
			return $result;	
		}


		function buscarCadastroLoja($idLoja){

			$cadLoja = "SELECT * FROM loja WHERE id_loja like '".$idLoja."'";
			$saida = $this->conectBd->executarMysql($cadLoja);
			$resultLoja = $saida->fetch_array(MYSQLI_ASSOC);
			$result = "";
			if($resultLoja){
				$result = $resultLoja;
			}
			return $result;	
		}


		function buscarCadastroContato($idLoja){

			$cadContato = "SELECT * FROM contato WHERE lojas_id_loja like '".$idLoja."'";
			$saida = $this->conectBd->executarMysql($cadContato);
			$resultContato = $saida->fetch_array(MYSQLI_ASSOC);
			$result = "";
			if($resultContato){
				$result = $resultContato;
			}
			return $result;
		}

		function buscarCadastroObsGeral($idLoja){

			$cadObsGeral = "SELECT * FROM obs WHERE loja_id_loja like '".$idLoja."'";
			$saida = $this->conectBd->executarMysql($cadObsGeral);
			$resultObsGeral = $saida->fetch_array(MYSQLI_ASSOC);
			$result = "";
			if($resultObsGeral){
				$result = $resultObsGeral;
			}
			return $result;
		}

		function buscarLogin($login, $senha){

			$sql = "SELECT * FROM login WHERE usuario like '".$login."' AND senha like '".$senha."'";
			$saida = $this->conectBd->executarMysql($sql);
			$resultValidar = $saida->fetch_array(MYSQLI_ASSOC);
			return $resultValidar;
		}









		// SERSCH

		function searchTextoEmLoja($texto){
			$sql = "SELECT nome_loja as loja, cliente_id_cliente as idCliente FROM loja WHERE nome_loja like '%".$texto."%' ORDER BY loja";
			$executa = $this->conectBd->executarMysql($sql);
			$arrayLoja = $executa->fetch_array(MYSQLI_ASSOC);
			$result = array();
			while($arrayLoja){
				$result[] = $arrayLoja;
				$arrayLoja = $executa->fetch_array(MYSQLI_ASSOC);
			}
			return $result;
		}

		function searchClienteGrupoPorId($id){
			$sql = "SELECT nome_cliente as cliente, grp_cliente as grupo FROM cliente WHERE id_cliente like ".$id;
			$executa = $this->conectBd->executarMysql($sql);
			$arrayClientes = $executa->fetch_array(MYSQLI_ASSOC);
			return $arrayClientes;
		}

		/*
		function searchTextoEmAcesso($texto){

			$acesso = "SELECT loja_id_loja as loja FROM acesso WHERE tipo_acesso like '%".$texto."%' OR ip_id_acesso like '%".$texto."%' OR usuario_acesso like '%".$texto.
			"%' OR senha_acesso like '%".$texto."%' OR local_acesso like '%".$texto."%'";
			$saida = $this->conectBd->executarMysql($acesso);
			$resultAcesso = $saida->fetch_array(MYSQLI_ASSOC);
			$result = array();
			while($resultAcesso){
				$result[] = $resultAcesso['loja'];
				$resultAcesso = $saida->fetch_array(MYSQLI_ASSOC);
			}
			return $result;
		}


		function searchTextoEmAnalogica($texto){

			$analogica = "SELECT loja_id_loja as loja FROM analogica WHERE num_analogica like '%".$texto."%' OR dispositivo_analogica like '%".$texto.
			"%' OR operadora_analogica like '%".$texto."%'";
			$saida = $this->conectBd->executarMysql($analogica);
			$resultAnalogica = $saida->fetch_array(MYSQLI_ASSOC);
			$result = array();
			while($resultAnalogica){
				$result[] = $resultAnalogica['loja'];
				$resultAnalogica = $saida->fetch_array(MYSQLI_ASSOC);
			}
			return $result;
		}
		*/
	}
?>
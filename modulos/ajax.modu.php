<?php

	require_once($_SERVER["DOCUMENT_ROOT"]."/intranet/modulos/cliente.modu.php");

	if(isset($_GET['acao'])){
		
		if($_GET['acao'] == "buscarGrClientes"){

			$optionGr = buscarGrupoClientesOption($_GET['nomeCliente']);
			echo $optionGr;
		
		} else if($_GET['acao'] == "buscarSubGrClientes"){

			$optionSubGr = buscarSubGrupoClientesOption($_GET['nomeCliente'], $_GET['nomeGrupo']);
			echo $optionSubGr;
		
		} else if($_GET['acao'] == "buscarNumeroE1"){

			$numeroE1 = buscarNumeroE1Options($_GET['nomeLoja'], $_GET['nomeGrupo'], $_GET['nomeCliente']);
			echo $numeroE1;
		
		} else if($_GET['acao'] == "buscarCadTroncoE1"){

			$numeroE1 = buscarCadTroncoE1($_GET['numE1']);
			echo json_encode($numeroE1);
		
		} else if($_GET['acao'] == "cadastrarE1"){

			if(($_GET['funcao']) == "cadastar"){

				$numeroE1 = cadastrarE1($_GET['numE1'], $_GET['qtdCanais'], $_GET['operadora'], $_GET['tecnologia'], $_GET['placa'], $_GET['ddr'],
				$_GET['nomeLoja'], $_GET['nomeGrupo'], $_GET['nomeCliente']);
				echo $numeroE1;
			
			} else if(($_GET['funcao']) == "alterar"){

				$numeroE1 = alterarE1($_GET['numE1'], $_GET['qtdCanais'], $_GET['operadora'], $_GET['tecnologia'], $_GET['placa'], $_GET['ddr'],
				$_GET['nomeLoja'], $_GET['nomeGrupo'], $_GET['nomeCliente']);
				echo $numeroE1;
			
			} else if(($_GET['funcao']) == "apagar"){

				$numeroE1 = apagarE1($_GET['numE1']);
				echo $numeroE1;
			} 
		
		} else if($_GET['acao'] == "buscarNumero0800"){

			$numero0800 = buscarNumero0800Options($_GET['nomeLoja'], $_GET['nomeGrupo'], $_GET['nomeCliente']);
			echo $numero0800;
		
		} else if($_GET['acao'] == "buscarCad0800"){

			$numero0800 = buscarCad0800($_GET['num0800']);
			echo json_encode($numero0800);
		
		} else if($_GET['acao'] == "cadastrar0800"){

			if(($_GET['funcao']) == "cadastar"){

				$numero0800 = cadastrar0800($_GET['num0800'], $_GET['numDdr'], $_GET['numChave'], $_GET['fila'], $_GET['nomeLoja'], 
				$_GET['nomeGrupo'], $_GET['nomeCliente']);
				echo $numero0800;
			
			} else if(($_GET['funcao']) == "alterar"){

				$numero0800 = alterar0800($_GET['num0800'], $_GET['numDdr'], $_GET['numChave'], $_GET['fila'], $_GET['nomeLoja'], 
				$_GET['nomeGrupo'], $_GET['nomeCliente']);
				echo $numero0800;
			
			} else if(($_GET['funcao']) == "apagar"){

				$numero0800 = apagar0800($_GET['num0800']);
				echo $numero0800;
			}
		
		} else if($_GET['acao'] == "buscarNumeroLanalogica"){

			$numeroLanalogica = buscarNumeroLanalogicaOptions($_GET['nomeLoja'], $_GET['nomeGrupo'], $_GET['nomeCliente']);
			echo $numeroLanalogica;
		
		} else if($_GET['acao'] == "buscarCadLanalogica"){

			$numeroLa = buscarCadLanalogica($_GET['numLa']);
			echo json_encode($numeroLa);
		
		} else if($_GET['acao'] == "cadastrarLanalogica"){

			if(($_GET['funcao']) == "cadastar"){

				$numeroLa = cadastrarLanalogica($_GET['numLa'], $_GET['placa'], $_GET['operadora'], $_GET['nomeLoja'], $_GET['nomeGrupo'], 
				$_GET['nomeCliente']);
				echo $numeroLa;
			
			} else if(($_GET['funcao']) == "alterar"){

				$numeroLa = alterarLanalogica($_GET['numLa'], $_GET['placa'], $_GET['operadora'], $_GET['nomeLoja'], $_GET['nomeGrupo'], 
				$_GET['nomeCliente']);
				echo $numeroLa;
			
			} else if(($_GET['funcao']) == "apagar"){

				$numeroLa = apagarLanalogica($_GET['numLa']);
				echo $numeroLa;
			}
		
		} else if($_GET['acao'] == "buscarNumeroGsm"){

			$numeroGsm = buscarNumeroGsm($_GET['nomeLoja'], $_GET['nomeGrupo'], $_GET['nomeCliente']);
			echo json_encode($numeroGsm);
		
		} else if($_GET['acao'] == "cadastrarGsm"){

			$gsm = cadastrarGsm($_GET['nomeLoja'], $_GET['nomeGrupo'], $_GET['nomeCliente'], $_GET['numGsm'],
			 $_GET['operadoraGsm'], $_GET['placaGsm'], $_GET['tipo']);
			echo $gsm;
		
		} else if($_GET['acao'] == "apagarGsm"){

			$gsm = apagarGsm($_GET['numGsm']);
			echo $gsm;
		
		} else if($_GET['acao'] == "buscarServidor"){

			$servidor = buscarServidorOptions($_GET['nomeLoja'], $_GET['nomeGrupo'], $_GET['nomeCliente']);
			echo $servidor;
		
		} else if($_GET['acao'] == "buscarCadServidor"){

			$servidor = buscarCadServidor($_GET['servidor'], $_GET['nomeLoja'], $_GET['nomeGrupo'], $_GET['nomeCliente']);
			echo json_encode($servidor);
		
		} else if($_GET['acao'] == "cadastrarServidor"){

			if(($_GET['funcao']) == "cadastar"){

				$servidor = cadastrarServidor($_GET['servidor'], $_GET['ip'], $_GET['servico'], $_GET['ssh'], $_GET['portaSsh'], 
				$_GET['web'], $_GET['portaWeb'], $_GET['nomeLoja'], $_GET['nomeGrupo'], $_GET['nomeCliente']);
				echo $servidor;
			
			} else if(($_GET['funcao']) == "alterar"){

				$servidor = alterarServidor($_GET['servidor'], $_GET['id'], $_GET['ip'], $_GET['servico'], $_GET['ssh'], $_GET['portaSsh'], 
				$_GET['web'], $_GET['portaWeb'], $_GET['nomeLoja'], $_GET['nomeGrupo'], $_GET['nomeCliente']);
				echo $servidor;
			
			} else if(($_GET['funcao']) == "apagar"){

				$servidor = apagarServidor($_GET['id'], $_GET['servidor']);
				echo $servidor;
			}
		
		} else if($_GET['acao'] == "buscarGateway"){

			$gateway = buscarGatewayOptions($_GET['gateway'], $_GET['nomeLoja'], $_GET['nomeGrupo'], $_GET['nomeCliente']);
			echo $gateway;
		
		} else if($_GET['acao'] == "buscarCadGateway"){

			$gateway = buscarCadGateway($_GET['gateway'], $_GET['model'], $_GET['nomeLoja'], $_GET['nomeGrupo'], $_GET['nomeCliente']);
			echo json_encode($gateway);
		
		} else if($_GET['acao'] == "cadastrarGateway"){

			if(($_GET['funcao']) == "cadastar"){

				$gateway = cadastrarGateway($_GET['gateway'], $_GET['modelo'], $_GET['ip'], $_GET['acesso'], $_GET['porta'], $_GET['nomeLoja'], 
					$_GET['nomeGrupo'], $_GET['nomeCliente']);
				echo $gateway;
			
			} else if(($_GET['funcao']) == "alterar"){

				$gateway = alterarGateway($_GET['id'], $_GET['gateway'], $_GET['modelo'], $_GET['ip'], $_GET['acesso'], $_GET['porta'], $_GET['nomeLoja'], 
					$_GET['nomeGrupo'], $_GET['nomeCliente']);
				echo $gateway;
			
			} else if(($_GET['funcao']) == "apagar"){

				$gateway = apagarGateway($_GET['id'], $_GET['gateway']);
				echo $gateway;
			}
		
		} else if($_GET['acao'] == "buscarOutrosAcessos"){

			$acessos = buscarAcessosOptions($_GET['nomeLoja'], $_GET['nomeGrupo'], $_GET['nomeCliente']);
			echo $acessos;
		
		} else if($_GET['acao'] == "buscarCadAcesso"){

			$acessos = buscarCadAcesso($_GET['acessos'], $_GET['nomeLoja'], $_GET['nomeGrupo'], $_GET['nomeCliente']);
			echo json_encode($acessos);
		
		} else if($_GET['acao'] == "cadastrarOutrosAcessos"){

			if(($_GET['funcao']) == "cadastar"){

				$acesso = cadastrarOutrosAcessos($_GET['acesso'], $_GET['endereco'], $_GET['usuario'], $_GET['senha'], $_GET['servidor'], 
				$_GET['nomeLoja'], $_GET['nomeGrupo'], $_GET['nomeCliente']);
				echo $acesso;
			
			} else if(($_GET['funcao']) == "alterar"){

				$acesso = alterarOutrosAcessos($_GET['acesso'], $_GET['id'], $_GET['endereco'], $_GET['usuario'], $_GET['senha'], $_GET['servidor'], 
				$_GET['nomeLoja'], $_GET['nomeGrupo'], $_GET['nomeCliente']);
				echo $acesso;
			
			} else if(($_GET['funcao']) == "apagar"){

				$acesso = apagarOutrosAcessos($_GET['id'], $_GET['acesso']);
				echo $acesso;
			}
		
		} else if($_GET['acao'] == "buscarCadastroLoja"){

			$loja = buscarCadastroLoja($_GET['nomeLoja'], $_GET['nomeGrupo'], $_GET['nomeCliente']);
			//echo print_r($loja, true);
			//return;
			if($loja != ""){
				echo json_encode($loja);
			} else  {
				echo $loja;
			}
			
		
		} else if($_GET['acao'] == "buscarCadastroContato"){
			$contato = buscarCadastroContato($_GET['nomeLoja'], $_GET['nomeGrupo'], $_GET['nomeCliente']);
			//echo print_r($contato, true);
			//return;
			if($contato != ""){
				echo json_encode($contato);	

			} else {
				echo "";
			}
			
		
		} else if($_GET['acao'] == "cadastroDadosLOja"){
			$loja = alterCadastroDadosLOja($_GET['id'], $_GET['rua'], $_GET['bairro'], $_GET['cidade'], $_GET['cnpj'], $_GET['razaoSocial'], $_GET['nome'], $_GET['telefone'], $_GET['email'], $_GET['cargo'], $_GET['ramal'], $_GET['nomeLoja'], $_GET['nomeGrupo'], $_GET['nomeCliente']);
			echo $loja;

		} else if($_GET['acao'] == "buscarCadastroObsGeral"){

			$obs = buscarCadastroObsGeral($_GET['nomeLoja'], $_GET['nomeGrupo'], $_GET['nomeCliente']);
			//echo $obs;
			if($obs != ""){
				echo json_encode($obs);
			} else  {
				echo $obs;
			}
				
		} else if($_GET['acao'] == "cadastroObsGeral"){
			//echo print_r($_GET, true);
			//return;
			$obs = cadastrarObsGeral($_GET['id'], $_GET['possuiMesa'], $_GET['licenca'], $_GET['possuiTelIp'], $_GET['modelo'], $_GET['ip'], $_GET['possuiG729'],
			 $_GET['qtdCanais'], $_GET['range'], $_GET['obs'], $_GET['nomeLoja'], $_GET['nomeGrupo'], $_GET['nomeCliente']);
			echo $obs;	
		
		} else if($_GET['acao'] == "buscarIdLoja"){
			//echo print_r($_GET, true);
			//return;
			$id = buscarIdLoja($_GET['nomeLoja'], $_GET['nomeGrupo'], $_GET['nomeCliente']);
			echo $id;	
		
		} else if($_GET['acao'] == "search"){
	
			$array = search($_GET['texto']);
			//echo $array;
			echo json_encode($array);	
		
		} else if($_GET['acao'] == "validar"){

			$validar = validarAcesso($_GET['usuario'], $_GET['senha']);
			echo $validar;
		}
	}
	return;
?>
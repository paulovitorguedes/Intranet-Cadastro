<?php

require_once($_SERVER["DOCUMENT_ROOT"] . "\intranet\modulos\cliente.modu.php");

// session_start();
// if(isset($_SESSION['login'])){
// 	if($_SESSION['login']){
// 		$displayLogin = "none";
// 	} else {
// 		$displayLogin = "block";
// 	}
// } else{
// 	$_SESSION['login'] = false;
// 	$displayLogin = "block";
// }


$mudaTitulo = "INTRANET VDT";
$opCliente = buscarClientesOption("option");

$optionSubGr = "";
$optionGr = "";
$menu = criarMenu();

$displayCadDadosCliente = "none";
$displayExistCl = "none";
$displayExistGr = "none";
$displayExistSGr = "none";
$displaySuce = "none";
$displayNsuce = "none";
$displayDelSuce = "none";
$displayNotDelSuce = "none";
$displayDelGrupoSuce = "none";
$displayNotDelGrupoSuce = "none";
$displayNotDelSubGrupoSuce = "none";
$displayDelSubGrupoSuce = "none";
$display = "none";
$displayC = "none";
$displayG = "none";
$displayS = "none";
//$displayLogin = "block";

if (isset($_GET["obrg"])) {
	$display = "block";
	if ($_GET["obrg"] == 'c') {
		$obrigatorio = "<span>Preenchimento Obrigat&oacute;rio</span>";
		$displayC = "block";
		$displayCadDadosCliente = "none";
		$mudaTitulo = "CADASTRO MENU DE CLIENTES";
		//$displayLogin = "none";

	} else
			if ($_GET["obrg"] == 'g') {
		$obrigatorio = "<span>Preenchimento Obrigat&oacute;rio</span>";
		$displayG = "block";
		$mudaTitulo = "CADASTRO MENU DE CLIENTES";
		//$displayLogin = "none";

	} else
				if ($_GET["obrg"] == 's') {
		$obrigatorio = "<span>Preenchimento Obrigat&oacute;rio</span>";
		$displayS = "block";
		$opCliente = buscarClientesOption("option", $_GET['nomeCliente']);
		$optionGr = buscarGrupoClientesOption($_GET['nomeCliente']);
		$optionSubGr = buscarSubGrupoClientesOption($_GET['nomeCliente'], $_GET['nomeGrupo']);
		$mudaTitulo = "CADASTRO MENU DE CLIENTES";
		//$displayLogin = "none";
	}
} else {
	$obrigatorio = "";
}

if (isset($_GET["suce"])) {
	if ($_GET["suce"] == '1') {
		$displaySuce = "block";
		$display = "block";
		$displayC = "block";
		$mudaTitulo = "CADASTRO MENU DE CLIENTES";
		//$displayLogin = "none";

	} else
			if ($_GET["suce"] == '2') {
		$displayNsuce = "block";
		$display = "block";
		$displayC = "block";
		$mudaTitulo = "CADASTRO MENU DE CLIENTES";
		//$displayLogin = "none";

	} else
				if ($_GET["suce"] == '3') {
		$displaySuce = "block";
		$display = "block";
		$displayG = "block";
		$mudaTitulo = "CADASTRO MENU DE CLIENTES";
		//$displayLogin = "none";

	} else
					if ($_GET["suce"] == '4') {
		$displayNsuce = "block";
		$display = "block";
		$displayG = "block";
		$mudaTitulo = "CADASTRO MENU DE CLIENTES";
		//$displayLogin = "none";

	} else
						if ($_GET["suce"] == '5') {
		$displaySuce = "block";
		$display = "block";
		$displayS = "block";
		$opCliente = buscarClientesOption("option", $_GET['nomeCliente']);
		$optionGr = buscarGrupoClientesOption($_GET['nomeCliente']);
		$optionSubGr = buscarSubGrupoClientesOption($_GET['nomeCliente'], $_GET['nomeGrupo']);
		$mudaTitulo = "CADASTRO MENU DE CLIENTES";
		//$displayLogin = "none";

	} else
							if ($_GET["suce"] == '6') {
		$displayNsuce = "block";
		$display = "block";
		$displayS = "block";
		$opCliente = buscarClientesOption("option", $_GET['nomeCliente']);
		$optionGr = buscarGrupoClientesOption($_GET['nomeCliente']);
		$optionSubGr = buscarSubGrupoClientesOption($_GET['nomeCliente'], $_GET['nomeGrupo']);
		$mudaTitulo = "CADASTRO MENU DE CLIENTES";
		//$displayLogin = "none";

	} else
								if ($_GET["suce"] == '7') {
		$displayDelSuce = "block";
		$display = "block";
		$displayC = "block";
		$mudaTitulo = "CADASTRO MENU DE CLIENTES";
		//$displayLogin = "none";

	} else
									if ($_GET["suce"] == '8') {
		$displayNotDelSuce = "block";
		$display = "block";
		$displayC = "block";
		$mudaTitulo = "CADASTRO MENU DE CLIENTES";
		//$displayLogin = "none";

	} else
										if ($_GET["suce"] == '9') {
		$displayDelGrupoSuce = "block";
		$display = "block";
		$displayG = "block";
		$mudaTitulo = "CADASTRO MENU DE CLIENTES";
		//$displayLogin = "none";

	} else
											if ($_GET["suce"] == '10') {
		$displayNotDelGrupoSuce = "block";
		$display = "block";
		$displayG = "block";
		$mudaTitulo = "CADASTRO MENU DE CLIENTES";
		//$displayLogin = "none";

	} else
												if ($_GET["suce"] == '11') {
		$displayDelSubGrupoSuce = "block";
		$display = "block";
		$displayS = "block";
		$opCliente = buscarClientesOption("option", $_GET['nomeCliente']);
		$optionGr = buscarGrupoClientesOption($_GET['nomeCliente']);
		$optionSubGr = buscarSubGrupoClientesOption($_GET['nomeCliente'], $_GET['nomeGrupo']);
		$mudaTitulo = "CADASTRO MENU DE CLIENTES";
		//$displayLogin = "none";

	} else
													if ($_GET["suce"] == '12') {
		$displayNotDelSubGrupoSuce = "block";
		$display = "block";
		$displayS = "block";
		$opCliente = buscarClientesOption("option", $_GET['nomeCliente']);
		$optionGr = buscarGrupoClientesOption($_GET['nomeCliente']);
		$optionSubGr = buscarSubGrupoClientesOption($_GET['nomeCliente'], $_GET['nomeGrupo']);
		$mudaTitulo = "CADASTRO MENU DE CLIENTES";
		//$displayLogin = "none";
	}
}

if (isset($_GET["exist"])) {
	$displayCadDadosCliente = "none";
	if ($_GET["exist"] == 'y') {
		$displayExistCl = "block";
		$display = "block";
		$displayC = "block";
		$mudaTitulo = "CADASTRO MENU DE CLIENTES";
		//$displayLogin = "none";
	}
}

if (isset($_GET["existGr"])) {
	$displayCadDadosCliente = "none";
	if ($_GET["existGr"] == 'y') {
		$displayExistGr = "block";
		$display = "block";
		$displayG = "block";
		$mudaTitulo = "CADASTRO MENU DE CLIENTES";
		//$displayLogin = "none";
	}
}

if (isset($_GET["existSGr"])) {
	$displayCadDadosCliente = "none";
	if ($_GET["existSGr"] == 'y') {
		$displayExistSGr = "block";
		$display = "block";
		$displayS = "block";
		$opCliente = buscarClientesOption("option", $_GET['nomeCliente']);
		$optionGr = buscarGrupoClientesOption($_GET['nomeCliente']);
		$optionSubGr = buscarSubGrupoClientesOption($_GET['nomeCliente'], $_GET['nomeGrupo']);
		$mudaTitulo = "CADASTRO MENU DE CLIENTES";
		//$displayLogin = "none";
	}
}
?>



<!DOCTYPE html>
<html>

<head>
	<title>Intranet de Clientes</title>
	<meta charset="ISO-8859-1" />
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>


	<script type="text/javascript" src="scripts/intra_script.js"></script>
</head>

<!-- onload busca o metodo alturaDiv para pegar sua medicao(tamanho) que esta no momento-->

<!-- <body id="body" onload="alturaDiv()"> -->
<body id="body">

	<div id="interface">

		<!-- Caixa do login -->
		<!-- 
			<div id="hider" style="display:<?= $displayLogin; ?>;">
				<div id="senha">
					<div id="cabeca">
						<h1>PASSWORD</h1>
					</div>
					<div id="cx">
						<table id="tabLogin">
								<tr>
									<td>Login:&nbsp;</td>
									<td><input style="display:block" id="iLogin" type="text" name="text_login"/></td>
								</tr>

								<tr>
									<td>Senha:&nbsp;</td>
									<td><input style="display:block" id="iSenha" type="password" onkeypress="validarEvent(event)" name="text_login"/></td>
								</tr>
						</table>	
					</div>

					<div id="pe">
						<button class="Button" type="button" onclick="validar()">Emviar</button>
					</div>
				</div>
			</div> 
		-->



		<header id="cabecalho">

			<form action="modulos/index.modu.php" method="get">
				<input id="logoff" type="submit" value="logoff" />
			</form>

			<h1 id="titulo" value=<?= $mudaTitulo; ?>><?= $mudaTitulo; ?></h1>


			<!--Sistema de busca-->
			<div id="busca">
				<input id="cBusca" type="text" size="27" onkeypress="searchEvent(event)" placeholder="Buscar Cliente..." />
				<button onclick="search()">Buscar</button>
			</div>

		</header>


		<section id="site">

			<div id="pontaCima">
				<button class="Button" type="button" onclick="exibe('cadastroClientes'); titulo('CADASTRO MENU DE CLIENTES')">Incluir Clientes</button>
			</div>

			<div id="iCentro"><?= $menu; ?></div>

			<div id="pontaBaixo"></div>

		</section>

		<aside>


			<div id="divSearch" style="display: none;">
				<table id="search" style="display:block"></table>
			</div>




			<fieldset id="cadastroClientes" style="display:<?= $display; ?>;">

				<span id="iSuce" class='suce' style="display:<?= $displaySuce; ?>;">CADASTRO REALIZADO COM SUCESSO</span>
				<span id="iNsuce" class='nsuce' style="display:<?= $displayNsuce; ?>;">OCORREU UMA FALHA AO TENTAR REALIZAR O CADASTRO</span>
				<span id="existCl" class='existCl' style="display:<?= $displayExistCl; ?>;">CLIENTE J&aacute; POSSUI CADASTRO</span>
				<span id="existGr" class='existGr' style="display:<?= $displayExistGr; ?>;">CLIENTE J&aacute; POSSUI O GRUPO CADASTRADO</span>
				<span id="existSGr" class='existSGr' style="display:<?= $displayExistSGr; ?>;">CLIENTE J&aacute; POSSUI O SUBGRUPO CADASTRADO</span>
				<span id="procSuce" class='procSuce' style="display:<?= $displayDelSuce; ?>;">CLIENTE DELETADO COM CUSUCESSO</span>
				<span id="procNotSuce" class='procNotSuce' style="display:<?= $displayNotDelSuce; ?>;">N&atilde;O É POSSÍVEL DELETAR CLIENTE COM GRUPO</span>
				<span id="delGrupoSuce" class='delGrupoSuce' style="display:<?= $displayDelGrupoSuce; ?>;">GRUPO DELETADO COM SUCESSO</span>
				<span id="notDelGrupoSuce" class='notDelGrupoSuce' style="display:<?= $displayNotDelGrupoSuce; ?>;">N&atilde;O É POSSÍVEL DELETAR GRUPO COM SUBGRUPO</span>
				<span id="notDelSubGrupoSuce" class='notDelSubGrupoSuce' style="display:<?= $displayNotDelSubGrupoSuce; ?>;">PROCESSO N&atilde;O REALIZADO</span>
				<span id="delSubGrupoSuce" class='delSubGrupoSuce' style="display:<?= $displayDelSubGrupoSuce; ?>;">SUBGRUPO DELETADO COM SUCESSO</span>

				<legend>&nbsp; Cadastro Menu de Cliente &nbsp;</legend class="cLegend">
				<label><input type="radio" onclick="exibe('cadastrocl')" name="cadcl" value="radioCliente" />Cliente</label>
				<label><input type="radio" onclick="exibe('cadastrogcl')" name="cadcl" value="radioGrupo" />Grupo de Clientes</label>
				<label><input type="radio" onclick="exibe('cadastrosgcl')" name="cadcl" value="radioSubgrupo" />Subgrupo de Clientes</label>


				<!-- DIV que sera oculta ou exibida na tela de cadastro de cliente-->
				<div id='cadastrocl' class="cadcl" style="display:<?= $displayC; ?>;">

					<!--onsubmit="return verificarTextEmBranco()" primeiro ira executar o metodo
						se o retorno do metodo for false nao sera enviado o submit-->
					<form action="modulos/index.modu.php" method="get" onsubmit="return verificarTextEmBranco('cliente')">

						<input type="hidden" name="rd_nClient" value="c" />
						<input type="hidden" id="botaoC" name="botao" />
						<input type="hidden" id="tipoDisplayC" name="tipoDisplay" />

						<table>
							<tr>
								<td><label for="iClient">Cliente:&nbsp;</label></td>
								<td>
									<input style="display:block" id="iClient" type="text" name="text_cliente" />
									<select style="display:none" name="slc_gClient" id="iApagaCliente"><?= $opCliente; ?></select>
								</td>
								<td><span class="obrig" id='obrigC' style="display:<?= $displayC; ?>;"><?= $obrigatorio; ?></span></td>
							</tr>

							<tr>
								<td><input type="submit" class="Button" value="Salvar" onclick="document.getElementById('botaoC').value = 'salvar'" /></td>
								<td><input type="submit" class="Button" value="Apagar" onclick="document.getElementById('botaoC').value = 'apagarC' " /></td>
							</tr>
						</table>
					</form>
				</div>



				<!-- DIV que sera oculta ou exibida na tela de cadastro de cliente-->
				<div id='cadastrogcl' class="cadcl" style="display:<?= $displayG; ?>;">

					<form action="modulos/index.modu.php" method="get" onsubmit="return verificarTextEmBranco('grupo')">

						<input type="hidden" name="rd_nClient" value="g" />
						<input type="hidden" id="botaoG" name="botao" />

						<table>
							<tr>
								<td>Cliente:&nbsp;</td>
								<td>
									<select name="slc_nClient" id="iApagaGrupoCliente" onchange="buscarGrupoClientes('iApagaGrupoCliente')">
										<!--<option value="optioncl">Options</option>-->
										<?= $opCliente; ?>
									</select>
								</td>
							</tr>

							<tr>
								<td><label for="iGprClient">Grupo Cliente:&nbsp;</label></td>
								<td>
									<input style="display:block" id="iGprClient" type="text" name="text_grpCliente" />
									<select style="display:none" name="slc_gClient" id="iApagaGrCliente"></select>
								</td>
								<td><span class="obrig" id='obrigG' style="display:<?= $displayG; ?>;"><?= $obrigatorio; ?></span></td>
							</tr>

							<tr>
								<td><input type="submit" class="Button" value="Salvar" onclick="document.getElementById('botaoG').value = 'salvar';" /></td>
								<td><input type="submit" class="Button" value="Apagar" onclick="document.getElementById('botaoG').value = 'apagarG';" /></td>
							</tr>
						</table>
					</form>
				</div>



				<!-- DIV que sera oculta ou exibida na tela de cadastro de cliente-->
				<div id='cadastrosgcl' class="cadcl" style="display:<?= $displayS; ?>;">

					<form action="modulos/index.modu.php" method="get" onsubmit="return verificarTextEmBranco('sub')">

						<input type="hidden" name="rd_nClient" value="s" />
						<input type="hidden" id="botaoS" name="botao" />

						<table>
							<tr>
								<td> Cliente:&nbsp; </td>
								<td>
									<select name="slc_nClient" id="iCliente" onchange="buscarGrupoClientes('iCliente', 'grupo')">
										<!--<option value="optioncl">Options</option>-->
										<?= $opCliente; ?>
									</select>
								</td>
							</tr>

							<tr>
								<td> Grupo Cliente:&nbsp;</td>
								<td>
									<select name="slc_GrupoClient" id="iGrCliente" onchange="buscarSubGrupoClientes('iCliente', 'iGrCliente')">
										<?= $optionGr; ?>
									</select>
								</td>
							</tr>

							<tr>
								<td><label for="iSubGprClient">Subgrupo Cliente:&nbsp;</label></td>
								<td>
									<input style="display:block" id="iSubGprClient" type="text" name="text_subgrpcliente" />
									<select style="display:none" name="slc_gClient" id="iApagaSubGrCliente">
										<?= $optionSubGr; ?>
									</select>
								</td>
								<td><span class="obrig" id='obrigS' style="display:<?= $displayS; ?>;"><?= $obrigatorio; ?></span></td>
							</tr>

							<tr>
								<td><input type="submit" class="Button" value="Salvar" onclick="document.getElementById('botaoS').value = 'salvar';" /></td>
								<td><input type="submit" class="Button" value="Apagar" onclick="document.getElementById('botaoS').value = 'apagarS';" /></td>
							</tr>
						</table>
					</form>
				</div>
			</fieldset>



			<!-- DIV Corpo -->
			<div style="display:<?= $displayCadDadosCliente; ?>;" id="cadDadosCliente">

				<!-- Fieldset Troncos E1 -->
				<fieldset id="formTronco">

					<legend class="cLegend" onclick="exibeFieldset('troncoDigital')">&nbsp;Troncos E1&nbsp;</legend class="cLegend">

					<span id="iResultTroncoE1" style="display:none"></span>
					<input type="hidden" class="CNomeLoja" id="iNomeLojaE1" name="nomeLoja" />
					<input type="hidden" class="CNomeGrupo" id="iNomeGrupoE1" name="nomeGrupo" />
					<input type="hidden" class="CNomeCliente" id="iNomeClienteE1" name="nomeCliente" />

					<div id="div_troncoDigital" style="display: none;">

						<table class="corpoIntranet">
							<tr>
								<td><label>N&uacute;mero E1:&nbsp;</label></td>
								<td>
									<input style="display:none" id="iTextTroncoE1" type="text" name="text_troncoE1" />
									<select style="display:block" name="slc_nTroncoE1" id="iSlcTroncoE1" onchange="buscarCadastroTroncoE1(this.value)"></select>
								</td>
								<td><button class="Button" type="button" onclick="alteraTextParaCadastro('troncoE1')">Cadastrar</button></td>
							</tr>

							<tr>
								<td><label>Qtd. Canais:&nbsp;</label></td>
								<td><input id="iQuantidadeCanaisE1" type="text" name="text_quantidadeCanaisE1" /></td>
							</tr>

							<tr>
								<td><label>Operadora:&nbsp;</label></td>
								<td><input id="iOperadoraE1" type="text" name="text_operadoraE1" /></td>
							</tr>

							<tr>
								<td><label>Tecnologia:&nbsp;</label></td>
								<td><input id="iTecnoTroncoE1" type="text" name="text_tecnoE1" /></td>
							</tr>

							<tr>
								<td><label>Placa:&nbsp;</label></td>
								<td><input id="iPlacaTronco" type="text" name="text_placaE1" /></td>
							</tr>

							<tr>
								<td><label>Ranger DDR:&nbsp;</label></td>
								<td><input id="iRangerDdrTronco" type="text" name="text_rangerE1" /></td>
							</tr>

							<tr>
								<td style="padding:30px 10px 0px 15px;" colspan="3">
									<button class="Button" type="button" onclick="cadastroE1()">Salvar</button>
									<button class="Button" type="button" onclick="apagaE1()">Apagar</button>
								</td>
							</tr>
						</table>
					</div>
				</fieldset>



				<!-- Formulario 0800-->
				<fieldset id="form08000">

					<legend class="cLegend" onclick="exibeFieldset('zero')">&nbsp;0800&nbsp;</legend class="cLegend">

					<span id="iResult0800" style="display:none"></span>
					<input type="hidden" class="CNomeLoja" id="iNomeLoja0800" name="nomeLoja" />
					<input type="hidden" class="CNomeGrupo" id="iNomeGrupo0800" name="nomeGrupo" />
					<input type="hidden" class="CNomeCliente" id="iNomeCliente0800" name="nomeCliente" />

					<div id="div_zero" style="display: none;">
						<table class="corpoIntranet">
							<tr>
								<td><label>N&uacute;mero 0800:&nbsp;</label></td>
								<td>
									<input style="display:none" id="iText0800" type="text" name="text_0800" />
									<select style="display:block" name="slc_n0800" id="iSlc0800" onchange="buscarCadastro0800(this.value)"></select>
								</td>
								<td><button class="Button" type="button" onclick="alteraTextParaCadastro('0800')">Cadastrar</button></td>
							</tr>

							<tr>
								<td><label>DDR:&nbsp;</label></td>
								<td><input id="iDdr0800" type="text" name="text_ddr0800" /></td>
							</tr>

							<tr>
								<td><label>Chave:&nbsp;</label></td>
								<td><input id="iChave0800" type="text" name="text_chave0800" /></td>
							</tr>

							<tr>
								<td><label>Fila Atendimeto:&nbsp;</label></td>
								<td><input id="iFilaAtend" type="text" name="text_fila0800" /></td>
							</tr>


							<tr>
								<td style="padding:30px 10px 0px 15px;" colspan="2">
									<button class="Button" type="button" onclick="cadastro0800()">Salvar</button>
									<button class="Button" type="button" onclick="apaga0800()">Apagar</button>
								</td>
							</tr>
						</table>
					</div>
				</fieldset>




				<!-- Formulario Linhas Analogicas-->
				<fieldset id="formAnalogicas">

					<legend class="cLegend" onclick="exibeFieldset('analogica')">&nbsp;Linha Anal&oacute;gica&nbsp;</legend class="cLegend">

					<span id="iResultLanalogica" style="display:none"></span>
					<input type="hidden" class="CNomeLoja" id="iNomeLojaLanalogica" name="nomeLoja" />
					<input type="hidden" class="CNomeGrupo" id="iNomeGrupoLanalogica" name="nomeGrupo" />
					<input type="hidden" class="CNomeCliente" id="iNomeClienteLanalogica" name="nomeCliente" />

					<div id="div_analogica" style="display: none;">
						<table class="corpoIntranet">
							<tr>
								<td><label>N&uacute;mero Linha Anal&oacute;gica:&nbsp;</label></td>
								<td>
									<input style="display:none" id="iTextLanalogica" type="text" name="text_lanalogica" />
									<select style="display:block" name="slc_lanalogica" id="iSlcLanalogica" onchange="buscarCadastroLanalogica(this.value)"></select>
								</td>
								<td><button class="Button" type="button" onclick="alteraTextParaCadastro('analogica')">Cadastrar</button></td>
							</tr>

							<tr>
								<td><label>Operadora:&nbsp;</label></td>
								<td><input id="iOperadoraLanalogica" type="text" name="text_operLanalogica" /></td>
							</tr>

							<tr>
								<td><label>Placa:&nbsp;</label></td>
								<td><input id="iPlacaLanalogica" type="text" name="text_placaLanalogica" /></td>
							</tr>

							<tr>
								<td style="padding:30px 10px 0px 15px;" colspan="2">
									<button class="Button" type="button" onclick="cadastroLanalogica()">Salvar</button>
									<button class="Button" type="button" onclick="apagaLanalogica()">Apagar</button>
								</td>
							</tr>
						</table>
					</div>
				</fieldset>




				<!-- Formulario Linhas GSM-->
				<fieldset id="formGsm">

					<legend class="cLegend" onclick="exibeFieldset('gsm')">&nbsp;Linha GSM&nbsp;</legend class="cLegend">

					<span id="iResultGsm" style="display:none"></span>
					<input type="hidden" class="CNomeLoja" id="iNomeLojaGsm" name="nomeLoja" />
					<input type="hidden" class="CNomeGrupo" id="iNomeGrupoGsm" name="nomeGrupo" />
					<input type="hidden" class="CNomeCliente" id="iNomeClienteGsm" name="nomeCliente" />
					<input type="hidden" id="iQuantidadeResultGsm" />

					<div id="div_gsm" style="display: none;">
						<table class="corpoIntranet" id="itableGsm"></table>
						<table>
							<tr>
								<td colspan="2" style="padding:15px 10px 0px 15px;">
									<button class="Button" type="button" onclick="cadastroGsm()">Salvar</button>
									<button class="Button" type="button" onclick="adicionaLinhaTabelaGsm()">Adicionar</button>
								</td>
							</tr>
						</table>
					</div>
				</fieldset>




				<!-- Formulario Servidor-->
				<fieldset id="formServidor">

					<legend class="cLegend" onclick="exibeFieldset('servidor')">&nbsp; Servidor &nbsp;</legend class="cLegend">

					<span id="iResultServidor" style="display:none"></span>
					<input type="hidden" class="CNomeLoja" id="iNomeLojaServidor" name="nomeLoja" />
					<input type="hidden" class="CNomeGrupo" id="iNomeGrupoServidor" name="nomeGrupo" />
					<input type="hidden" class="CNomeCliente" id="iNomeClienteServidor" name="nomeCliente" />
					<input type="hidden" id="idServidor" />

					<div id="div_servidor" style="display: none;">
						<table class="corpoIntranet">
							<tr>
								<td><label>Modelo Servidor:&nbsp;</label></td>
								<td>
									<input style="display:none" id="iTextServidor" type="text" name="text_servidor" />
									<select style="display:block" name="slc_servidor" id="iSlcServidor" onchange="buscarCadastroServidor(this.value, document.getElementById('iNomeLojaServidor').value,
										 document.getElementById('iNomeGrupoServidor').value, document.getElementById('iNomeClienteServidor').value);"></select>
								</td>
								<td colspan="2"><button class="Button" type="button" onclick="alteraTextParaCadastro('servidor')">Cadastrar</button></td>
							</tr>

							<tr>
								<td><label>IP:&nbsp;</label></td>
								<td><input id="iServidorIp" type="text" name="text_servidorIp" /></td>
							</tr>

							<tr>
								<td><label>Servi&ccedil;os:&nbsp;</label></td>
								<td><input id="iServidorServico" type="text" name="text_servidorServ"></td>
							</tr>

							<tr>
								<td><label>Asesso SSH:&nbsp;</label></td>
								<td><input id="iServidorSsh" type="text" name="text_servidorSsh" /></td>
								<td><label>Porta:&nbsp;</label></td>
								<td><input id="iServidorPortaSsh" type="text" name="text_servidorPortaSsh" /></td>
							</tr>

							<tr>
								<td><label>Acesso WEB:&nbsp;</label></td>
								<td><input id="iServidorAcessoWeb" type="text" name="text_servidorWeb" /></td>
								<td><label>Porta:&nbsp;</label></td>
								<td><input id="iServidorPortaWeb" type="text" name="text_servidorPortaWeb" /></td>
							</tr>

							<tr>
								<td style="padding:30px 10px 0px 15px;" colspan="2">
									<button class="Button" type="button" onclick="cadastroServidor()">Salvar</button>
									<button class="Button" type="button" onclick="apagaServidor()">Apagar</button>
								</td>
							</tr>
						</table>
					</div>
				</fieldset>




				<!-- Formulario Gateway-->
				<fieldset id="formGateway">

					<legend class="cLegend" onclick="exibeFieldset('gw')">&nbsp; Gateway &nbsp;</legend class="cLegend">

					<span id="iResultGw" style="display:none"></span>
					<input type="hidden" class="CNomeLoja" id="iNomeLojaGateway" name="nomeLoja" />
					<input type="hidden" class="CNomeGrupo" id="iNomeGrupoGateway" name="nomeGrupo" />
					<input type="hidden" class="CNomeCliente" id="iNomeClienteGateway" name="nomeCliente" />
					<input type="hidden" id="idGwE1" />
					<input type="hidden" id="idGwFxs" />
					<input type="hidden" id="idGwFxo" />
					<input type="hidden" id="idGwGsm" />

					<div id="div_gw" style="display: none;">
						<table class="corpoIntranet">

							<!-- GATEWAY E1 -->
							<tr>
								<td><label>GW E1:&nbsp;</label></td>
								<td>
									<input style="display:none" id="iTextGatewayE1" type="text" name="text_GatewayE1" />
									<select style="display:block" name="slc_GatewayE1" id="iSlcGatewayE1" onchange="buscarCadastroGateway(this.value, document.getElementById('iNomeLojaGateway').value,
										document.getElementById('iNomeGrupoGateway').value, document.getElementById('iNomeClienteGateway').value, 'e1')"></select>
								</td>
								<td colspan="5">
									<button class="Button" type="button" style="margin-right: 150px;" onclick="alteraTextParaCadastro('gatewayE1')">Cadastrar</button>
									<button class="Button" type="button" onclick="cadastroGateway('e1')">Salvar</button>
									<button class="Button" type="button" onclick="apagaGateway('e1')">Apagar</button>
								</td>
							</tr>

							<tr>
								<td><label>IP:&nbsp;</label></td>
								<td><input id="iGatewayE1Ip" type="text" name="text_gatewayE1Ip" /></td>

								<td><label>Acesso:&nbsp;</label></td>
								<td><input id="iGatewayE1Acesso" type="text" name="text_gatewayE1Acesso"></td>

								<td><label>Porta:&nbsp;</label></td>
								<td><input id="iGatewayE1Porta" type="text" name="text_gatewayE1Porta" /></td>
							</tr>

							<tr>
								<td id="vazia"></td>
							</tr>


							<!-- GATEWAY FXS -->
							<tr>
								<td><label>GW FXS:&nbsp;</label></td>
								<td>
									<input style="display:none" id="iTextGatewayFxs" type="text" name="text_GatewayFxs" />
									<select style="display:block" name="slc_GatewayFxs" id="iSlcGatewayFxs" onchange="buscarCadastroGateway(this.value, document.getElementById('iNomeLojaGateway').value,
										document.getElementById('iNomeGrupoGateway').value, document.getElementById('iNomeClienteGateway').value, 'fxs')"></select>
								</td>
								<td colspan="5">
									<button class="Button" type="button" style="margin-right: 150px;" onclick="alteraTextParaCadastro('gatewayFxs')">Cadastrar</button>
									<button class="Button" type="button" onclick="cadastroGateway('fxs')">Salvar</button>
									<button class="Button" type="button" onclick="apagaGateway('fxs')">Apagar</button>
								</td>
							</tr>

							<tr>
								<td><label>IP:&nbsp;</label></td>
								<td><input id="iGatewayFxsIp" type="text" name="text_gatewayFxsIp" /></td>

								<td><label>Acesso:&nbsp;</label></td>
								<td><input id="iGatewayFxsAcesso" type="text" name="text_gatewayFxsAcesso" /></td>

								<td><label>Porta:&nbsp;</label></td>
								<td><input id="iGatewayFxsPorta" type="text" name="text_gatewayFxsPorta" /></td>
							</tr>

							<tr>
								<td id="vazia"></td>
							</tr>


							<!-- GATEWAY FXO -->
							<tr>
								<td><label>GW FXO:&nbsp;</label></td>
								<td>
									<input style="display:none" id="iTextGatewayFxo" type="text" name="text_GatewayFxo" />
									<select style="display:block" name="slc_GatewayFxo" id="iSlcGatewayFxo" onchange="buscarCadastroGateway(this.value, document.getElementById('iNomeLojaGateway').value,
										document.getElementById('iNomeGrupoGateway').value, document.getElementById('iNomeClienteGateway').value, 'fxo')"></select>
								</td>
								<td colspan="5">
									<button class="Button" type="button" style="margin-right: 150px;" onclick="alteraTextParaCadastro('gatewayFxo')">Cadastrar</button>
									<button class="Button" type="button" onclick="cadastroGateway('fxo')">Salvar</button>
									<button class="Button" type="button" onclick="apagaGateway('fxo')">Apagar</button>
								</td>
							</tr>

							<tr>
								<td><label>IP:&nbsp;</label></td>
								<td><input id="iGatewayFxoIp" type="text" name="text_gatewayFxoIp" /></td>

								<td><label>Acesso:&nbsp;</label></td>
								<td><input id="iGatewayFxoAcesso" type="text" name="text_gatewayFxoAcesso" /></td>

								<td><label>Porta:&nbsp;</label></td>
								<td><input id="iGatewayFxoPorta" type="text" name="text_gatewayFxoPorta" /></td>
							</tr>

							<tr>
								<td id="vazia"></td>
							</tr>


							<!-- GATEWAY GSM -->
							<tr>
								<td><label>GW GSM:&nbsp;</label></td>
								<td>
									<input style="display:none" id="iTextGatewayGsm" type="text" name="text_GatewayGsm" />
									<select style="display:block" name="slc_GatewayGsm" id="iSlcGatewayGsm" onchange="buscarCadastroGateway(this.value, document.getElementById('iNomeLojaGateway').value,
										document.getElementById('iNomeGrupoGateway').value, document.getElementById('iNomeClienteGateway').value, 'gsm')"></select>
								</td>
								<td colspan="5">
									<button class="Button" type="button" style="margin-right: 150px;" onclick="alteraTextParaCadastro('gatewayGsm')">Cadastrar</button>
									<button class="Button" type="button" onclick="cadastroGateway('gsm')">Salvar</button>
									<button class="Button" type="button" onclick="apagaGateway('gsm')">Apagar</button>
								</td>
							</tr>

							<tr>
								<td><label>IP:&nbsp;</label></td>
								<td><input id="iGatewayGsmIP" type="text" name="text_gatewayGsmIp" /></td>

								<td><label>Acesso:&nbsp;</label></td>
								<td><input id="iGatewayGsmAcesso" type="text" name="text_gatewayGsmAcesso" /></td>

								<td><label>Porta:&nbsp;</label></td>
								<td><input id="iGatewayGsmPorta" type="text" name="text_gatewayGsmPorta" /></td>
							</tr>
						</table>
					</div>
				</fieldset>





				<!-- Formulario Outros Acessos em Geral-->
				<fieldset id="formAcessoGeral">

					<legend class="cLegend" onclick="exibeFieldset('acesso')">&nbsp; Outros Acessos &nbsp;</legend class="cLegend">

					<span id="iResultOutrosAcessos" style="display:none"></span>
					<input type="hidden" class="CNomeLoja" id="iNomeLojaOutrosAcessos" name="nomeLoja" />
					<input type="hidden" class="CNomeGrupo" id="iNomeGrupoOutrosAcessos" name="nomeGrupo" />
					<input type="hidden" class="CNomeCliente" id="iNomeClienteOutrosAcessos" name="nomeCliente" />
					<input type="hidden" id="idOutrosAcessos" />

					<div id="div_acesso" style="display: none;">
						<table class="corpoIntranet">
							<tr>
								<td><label>Tipo Acesso:&nbsp;</label></td>
								<td>
									<input style="display:none" id="iTextOutrosAcessos" type="text" name="text_OutrosAcessos" />
									<select style="display:block" name="slc_OutrosAcessos" id="iSlcOutrosAcessos" onchange="buscarCadastroOutrosAcessos(this.value, document.getElementById('iNomeLojaOutrosAcessos').value,
										document.getElementById('iNomeGrupoOutrosAcessos').value, document.getElementById('iNomeClienteOutrosAcessos').value)"></select>
								</td>
								<td><button class="Button" type="button" onclick="alteraTextParaCadastro('outros')">Cadastrar</button></td>
							</tr>

							<tr>
								<td><label>End/ID:&nbsp;</label></td>
								<td><input id="iEndOutrosAcessos" type="text" name="text_endOutrosAcessos" /></td>
							</tr>

							<tr>
								<td><label>Usu&aacute;rio:&nbsp;</label></td>
								<td><input id="iUsuOutrosAcessos" type="text" name="text_usuOutrosAcessos" /></td>
							</tr>

							<tr>
								<td><label>Senha:&nbsp;</label></td>
								<td><input id="iSenhaOutrosAcessos" type="text" name="text_senhaOutrosAcessos" /></td>
							</tr>

							<tr>
								<td><label>Servidor:&nbsp;</label></td>
								<td><input id="iServidorOutrosAcessos" type="text" name="text_servidorOutrosAcessos" /></td>
							</tr>

							<tr>
								<td style="padding:30px 10px 0px 15px;" colspan="2">
									<button class="Button" type="button" onclick="cadastroOutrosAcessos()">Salvar</button>
									<button class="Button" type="button" onclick="apagaOutrosAcessos()">Apagar</button>
								</td>
							</tr>
						</table>
					</div>
				</fieldset>





				<!-- Formulario Dados Cadastrais-->
				<fieldset id="formDadosCadastrais">

					<legend class="cLegend" onclick="exibeFieldset('dados')">&nbsp; Dados Cadastrais &nbsp;</legend class="cLegend">

					<span id="iResultDadosLoja" style="display:none"></span>
					<input type="hidden" class="CNomeLoja" id="iNomeLojaDadosLoja" name="nomeLoja" />
					<input type="hidden" class="CNomeGrupo" id="iNomeGrupoDadosLoja" name="nomeGrupo" />
					<input type="hidden" class="CNomeCliente" id="iNomeClienteDadosLoja" name="nomeCliente" />
					<input type="hidden" id="idDadosLoja" />
					<input type="hidden" id="idDadosContato" />

					<div id="div_dados" style="display: none;">
						<table class="corpoIntranet">
							<tr>
								<td><label>Endere&ccedil;o:&nbsp;</label></td>
								<td><input id="iEndDadosCadastrais" type="text" name="text_EndDadosCadastrais" /></td>
							</tr>

							<tr>
								<td><label>Bairro:&nbsp;</label></td>
								<td><input id="iBairroDadosCadastrais" type="text" name="text_BairroDadosCadastrais" /></td>

								<td><label>Cidade:&nbsp;</label></td>
								<td><input id="iCidadeDadosCadastrais" type="text" name="text_CidadeDadosCadastrais" /></td>
							</tr>

							<tr>
								<td><label>CNPJ:&nbsp;</label></td>
								<td><input id="iCnpjDadosCadastrais" type="text" name="text_CnpjDadosCadastrais" /></td>
							</tr>

							<tr>
								<td><label>Raz&atilde;o Social:&nbsp;</label></td>
								<td><input id="iRazaoSocialDadosCadastrais" type="text" name="text_RazaoSocialDadosCadastrais" /></td>
							</tr>

							<tr>
								<td id="vazia"></td>
							</tr>

							<tr>
								<td><label>Nome Contato:&nbsp;</label></td>
								<td><input id="iNomeContatoDadosCadastrais" type="text" name="text_NomeContatoDadosCadastrais" /></td>

								<td><label>Telefone:&nbsp;</label></td>
								<td><input id="iTelefoneDadosCadastrais" type="text" name="text_TelefoneDadosCadastrais" /></td>
							</tr>

							<tr>
								<td><label>E-mail:&nbsp;</label></td>
								<td><input id="iEmailDadosCadastrais" type="text" name="text_EmailDadosCadastrais" /></td>

								<td><label>Cargo:&nbsp;</label></td>
								<td><input id="iCargoDadosCadastrais" type="text" name="text_CargoDadosCadastrais" /></td>
							</tr>

							<tr>
								<td><label>Ramal:&nbsp;</label></td>
								<td><input id="iRamalDadosCadastrais" type="text" name="text_RamalDadosCadastrais" /></td>
							</tr>

							<tr>
								<td style="padding:30px 10px 0px 15px;" colspan="2">
									<button class="Button" type="button" onclick="cadastroDadosLOja()">Salvar</button>
								</td>
							</tr>
						</table>
					</div>
				</fieldset>





				<!-- Formulario Geral-->
				<fieldset id="formGeral">

					<legend class="cLegend" onclick="exibeFieldset('geral')">&nbsp; Geral &nbsp;</legend class="cLegend">

					<span id="iResultGeral" style="display:none"></span>
					<input type="hidden" class="CNomeLoja" id="iNomeLojaGeral" name="nomeLoja" />
					<input type="hidden" class="CNomeGrupo" id="iNomeGrupoGeral" name="nomeGrupo" />
					<input type="hidden" class="CNomeCliente" id="iNomeClienteGeral" name="nomeCliente" />
					<input type="hidden" id="idGeral" />

					<div id="div_geral" style="display: none;">
						<table class="corpoIntranet">
							<tr>
								<td><label>Possui Mesa VDT:&nbsp;</label></td>
								<td><input type="checkbox" name="nMesaGeral" id="iMesaGeral" /></td>

								<td style="padding-left: 50px;"><label>Licen&ccedil;a:&nbsp;</label></td>
								<td><input id="iLicencaGeral" type="text" name="nLicencaGeral"></td>
							</tr>

							<tr>
								<td><label>Possui Telefone IP:&nbsp;</label></td>
								<td><input type="checkbox" name="nTelefoneIpGeral" id="iTelefoneIpGeral" /></td>

								<td style="padding-left: 50px;"><label>Modelo:&nbsp;</label></td>
								<td><input id="iModeloGeral" type="text" name="nModeloGeral" /></td>

								<td><label>IP:&nbsp;</label></td>
								<td><input id="iIpGeral" type="text" name="nModeloGeral" /></td>
							</tr>

							<tr>
								<td><label>Possui G729:&nbsp;</label></td>
								<td><input type="checkbox" name="nG729Geral" id="iG729Geral" /></td>

								<td style="padding-left: 50px;"><label>Qtd. Canais:&nbsp;</label></td>
								<td><input id="iQtdCanaisGeral" type="text" name="nQtdCanaisGeral"></td>
							</tr>

							<tr>
								<td><label>Ranger Ramais:&nbsp;</label></td>
								<td colspan="3"><input id="iRangerRamaisGeral" type="text" name="nRangerRamaisGeral" /></td>
							</tr>

							<tr>
								<td id="vazia"></td>
							</tr>

							<tr>
								<td><label for="cMsg">Observa&ccedil;&otilde;es:</label></td>
							</tr>

						</table>

						<textarea name="nMsgObservacaoGeral" id="iTextArea" class="cTextarea" style="width: 780px;">
							</textarea><br />

						<!--
							<button onclick="adicionarNiceEditor('iTextArea')">Adicionar</button>
							<button onclick="removerNiceEditor('iTextArea')">Remover</button>
							-->

						<button class="Button" type="button" style="margin:30px 10px 0px 15px;" onclick="cadastroObsGeral()">Salvar</button>
					</div>
				</fieldset>
			</div>
		</aside>


		<footer id="rodape">
			<p> &copy; Voice Data:. VDT .</p>
		</footer>
	</div>
</body>

</html>
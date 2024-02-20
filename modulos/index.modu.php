
<?php

	require_once("../classes/entidade/cliente.php");
	require("cliente.modu.php");

	if (isset($_GET["rd_nClient"])) {

		if($_GET["botao"] == "salvar") {


			$radio = $_GET["rd_nClient"];

			switch ($radio) {
				case 'c':
					if($_GET["text_cliente"] != ""){

						$saida = inserirCliente($_GET["text_cliente"]);

						if($saida === "exist"){
							header('Location: http://'.$_SERVER['HTTP_HOST'].'/intranet/index.php?exist=y');				
						} else {
							if($saida) header('Location: http://'.$_SERVER['HTTP_HOST'].'/intranet/index.php?suce=1');
							else header('Location: http://'.$_SERVER['HTTP_HOST'].'/intranet/index.php?suce=2');
						}
						
					} else {
						header('Location: http://'.$_SERVER['HTTP_HOST'].'/intranet/index.php?obrg=c');
					}
				break;


				
				case 'g':
					if($_GET["text_grpCliente"] != ""){

						$saida = inserirGrupoCliente($_GET["slc_nClient"], $_GET["text_grpCliente"]);
						if($saida === "existGr"){
							header('Location: http://'.$_SERVER['HTTP_HOST'].'/intranet/index.php?existGr=y');
						
						}else {
							if($saida) header('Location: http://'.$_SERVER['HTTP_HOST'].'/intranet/index.php?suce=3');
							else header('Location: http://'.$_SERVER['HTTP_HOST'].'/intranet/index.php?suce=4');
						}					
					}else{
						header('Location: http://'.$_SERVER['HTTP_HOST'].'/intranet/index.php?obrg=g');
					}
				break;



				case 's':

					if($_GET["text_subgrpcliente"] != ""){

						$saida = inserirSubGrupoCliente($_GET["slc_nClient"], $_GET["slc_GrupoClient"], $_GET["text_subgrpcliente"]);

						if($saida === "existSGr") {

							header('Location: http://'.$_SERVER['HTTP_HOST'].'/intranet/index.php?existSGr=y&nomeCliente='.$_GET["slc_nClient"].'&nomeGrupo='.$_GET["slc_GrupoClient"]);
						
						} else {
							if($saida) header('Location: http://'.$_SERVER['HTTP_HOST'].'/intranet/index.php?suce=5&nomeCliente='.$_GET["slc_nClient"].'&nomeGrupo='.$_GET["slc_GrupoClient"]);
							else header('Location: http://'.$_SERVER['HTTP_HOST'].'/intranet/index.php?suce=6&nomeCliente='.$_GET["slc_nClient"].'&nomeGrupo='.$_GET["slc_GrupoClient"]);
						}
					
					}else{
						header('Location: http://'.$_SERVER['HTTP_HOST'].'/intranet/index.php?obrg=s&nomeCliente='.$_GET["slc_nClient"].'&nomeGrupo='.$_GET["slc_GrupoClient"]);
					}
				break;
			} 
		
		} else if($_GET["botao"] == "apagarC") {

			if(apagarCliente($_GET['slc_gClient'])){
				header('Location: http://'.$_SERVER['HTTP_HOST'].'/intranet/index.php?suce=7');
			
			} else {
				header('Location: http://'.$_SERVER['HTTP_HOST'].'/intranet/index.php?suce=8');
			}
		
		} else if($_GET["botao"] == "apagarG") {

			//apagarGrupoCliente($_GET['slc_nClient'], $_GET['slc_gClient']);

			if(apagarGrupoCliente($_GET['slc_nClient'], $_GET['slc_gClient'])){
				header('Location: http://'.$_SERVER['HTTP_HOST'].'/intranet/index.php?suce=9');
			
			} else {
				header('Location: http://'.$_SERVER['HTTP_HOST'].'/intranet/index.php?suce=10');
			}
		
		} else if($_GET["botao"] == "apagarS") {

			if(apagarSubGrupoCliente($_GET['slc_nClient'], $_GET['slc_GrupoClient'] , $_GET['slc_gClient'])){

				header('Location: http://'.$_SERVER['HTTP_HOST'].'/intranet/index.php?suce=11&nomeCliente='.$_GET["slc_nClient"].'&nomeGrupo='.$_GET["slc_GrupoClient"]);
			
			} else {
				header('Location: http://'.$_SERVER['HTTP_HOST'].'/intranet/index.php?suce=12&nomeCliente='.$_GET["slc_nClient"].'&nomeGrupo='.$_GET["slc_GrupoClient"]);
			}
		}
	
	} else{
		$_SESSION['login'] = false;
		header('Location: http://'.$_SERVER['HTTP_HOST'].'/intranet/index.php');
	} 
?>


var niceEditor = false;

function exibe(id) {  

    var campos = document.getElementsByClassName('cadcl');
    for (var i = campos.length - 1; i >= 0; i--) {
        campos[i].style.display = "none";
    }

    document.getElementById("divSearch").style.display = "none";

    document.getElementById('iSuce').style.display = "none";
    document.getElementById('iNsuce').style.display = "none";
    document.getElementById('existCl').style.display = "none";
    document.getElementById('existGr').style.display = "none";
    document.getElementById('existSGr').style.display = "none";
    document.getElementById('procSuce').style.display = "none";
    document.getElementById('procNotSuce').style.display = "none";
    document.getElementById('delGrupoSuce').style.display = "none";
    document.getElementById('notDelGrupoSuce').style.display = "none";
    document.getElementById('notDelSubGrupoSuce').style.display = "none";
    document.getElementById('delSubGrupoSuce').style.display = "none";

    document.getElementById('obrigC').style.display = "none";
    document.getElementById('obrigG').style.display = "none";
    document.getElementById('obrigS').style.display = "none";

    // div de cadastro geral de clientes
    document.getElementById('cadDadosCliente').style.display = "none";

    document.getElementById('iApagaCliente').style.display = "none";
    document.getElementById('iApagaGrCliente').style.display = "none";
    document.getElementById('iApagaSubGrCliente').style.display = "none";
    document.getElementById('iClient').style.display = "block";
    document.getElementById('iGprClient').style.display = "block";
    document.getElementById('iSubGprClient').style.display = "block";
  
    document.getElementById(id).style.display = "block";

    if(id == "cadastrosgcl"){

        buscarGrupoClientes("iCliente");   

    } else if(id == "cadastrogcl")  {

        buscarGrupoClientes("iApagaGrupoCliente"); 
    }        
}

function validarEvent(e){
    if(e.keyCode === 13){

        validar();
    }
}


function validar(){
    var login = document.getElementById('iLogin').value;
    var senha = document.getElementById('iSenha').value;
    if(login == "vdt" && senha == "senha"){
        document.getElementById('hider').style.display = "none";
    }
    document.getElementById('iLogin').value = "";
    document.getElementById('iSenha').value = "";
}

function confirmDelete() {
 
    var ans;
    ans = window.confirm("Deseja excluir o registro?");
    return ans;
}

function alturaDiv(){
    var alturaAtual = document.getElementById('interface').clientHeight;
    var comprimentoaAtual = document.getElementById('interface').clientWidth;
    document.getElementById('hider').style.height = alturaAtual + "px";
    document.getElementById('hider').style.width = comprimentoaAtual + "px";
}

//JQUERY
function exibeMenuGrupo(cliente){

   var nome = "#div_igrupo_" + cliente;
   
    $(nome).animate({
        height: 'toggle'
    });
}

//JQUERY
function exibeMenuSubGrupo(grupo){

   var nome  = "#div_isubgrupo_" + grupo;

   $(nome).animate({
        height: 'toggle'
    });
}

function exibeCadastroLoja(loja, grupo, cliente){

    //var id = document.getElementById("iTextarea").value;
    removerNiceEditor("iTextArea");

    titulo(loja);
    //atribuirIdTextAreaObsGeral(loja, grupo, cliente);
    buscarNumeroE1(loja, grupo, cliente);
    buscarNumero0800(loja, grupo, cliente);
    buscarNumeroLanalogica(loja, grupo, cliente);
    buscarNumeroGsm(loja, grupo, cliente);
    buscarServidor(loja, grupo, cliente);
    buscarGatewayE1(loja, grupo, cliente);
    buscarGatewayFxs(loja, grupo, cliente);
    buscarGatewayFxo(loja, grupo, cliente);
    buscarGatewayGsm(loja, grupo, cliente);
    buscarOutrosAcessos(loja, grupo, cliente);
    buscarCadastroLoja(loja, grupo, cliente);
    buscarCadastroContato(loja, grupo, cliente);
    buscarCadastroObsGeral(loja, grupo, cliente);
    verificarNomeGrupo(grupo);
    verificarNomeCliente(cliente);

    
    adicionarNiceEditor("iTextArea");
    exibeFieldsetGateway();
    exibeFieldsetCadastrosLoja();
    exibeFieldsetCadastroGeral();

    document.getElementById("divSearch").style.display = "none";
    
    document.getElementById('iSuce').style.display = "none";
    document.getElementById('iNsuce').style.display = "none";
    document.getElementById('existCl').style.display = "none";
    document.getElementById('existGr').style.display = "none";
    document.getElementById('existSGr').style.display = "none";
    document.getElementById('procSuce').style.display = "none";
    document.getElementById('procNotSuce').style.display = "none";
    document.getElementById('delGrupoSuce').style.display = "none";
    document.getElementById('notDelGrupoSuce').style.display = "none";
    document.getElementById('notDelSubGrupoSuce').style.display = "none";
    document.getElementById('delSubGrupoSuce').style.display = "none";

    document.getElementById('obrigC').style.display = "none";
    document.getElementById('obrigG').style.display = "none";
    document.getElementById('obrigS').style.display = "none";

    document.getElementById('iApagaCliente').style.display = "none";
    document.getElementById('iApagaGrCliente').style.display = "none";
    document.getElementById('iApagaSubGrCliente').style.display = "none";
    document.getElementById('iClient').style.display = "none";
    document.getElementById('iGprClient').style.display = "none";
    document.getElementById('iSubGprClient').style.display = "none";

    document.getElementById('cadastroClientes').style.display = "none";
    document.getElementById('cadastrocl').style.display = "none";
    document.getElementById('cadastrogcl').style.display = "none";
    document.getElementById('cadastrosgcl').style.display = "none";

    document.getElementById('iTextTroncoE1').style.display = "none";
    document.getElementById('iTextTroncoE1').value = "";
    document.getElementById('iSlcTroncoE1').style.display = "block";

    document.getElementById('iText0800').style.display = "none";
    document.getElementById('iText0800').value = "";
    document.getElementById('iSlc0800').style.display = "block";

    document.getElementById('iTextLanalogica').style.display = "none";
    document.getElementById('iTextLanalogica').value = "";
    document.getElementById('iSlcLanalogica').style.display = "block";

    document.getElementById('iTextServidor').style.display = "none";
    document.getElementById('iTextServidor').value = "";
    document.getElementById('iSlcServidor').style.display = "block";

    document.getElementById('iTextGatewayE1').style.display = "none";
    document.getElementById('iTextGatewayE1').value = "";
    document.getElementById('iSlcGatewayE1').style.display = "block";

    document.getElementById('iTextGatewayFxs').style.display = "none";
    document.getElementById('iTextGatewayFxs').value = "";
    document.getElementById('iSlcGatewayFxs').style.display = "block";

    document.getElementById('iTextGatewayFxo').style.display = "none";
    document.getElementById('iTextGatewayFxo').value = "";
    document.getElementById('iSlcGatewayFxo').style.display = "block";

    document.getElementById('iTextGatewayGsm').style.display = "none";
    document.getElementById('iTextGatewayGsm').value = "";
    document.getElementById('iSlcGatewayGsm').style.display = "block";

    document.getElementById('iTextOutrosAcessos').style.display = "none";
    document.getElementById('iTextOutrosAcessos').value = "";
    document.getElementById('iSlcOutrosAcessos').style.display = "block";

    document.getElementById('iResultTroncoE1').style.display = "none";
    document.getElementById('iResult0800').style.display = "none";
    document.getElementById('iResultLanalogica').style.display = "none";
    document.getElementById("iResultGsm").style.display = 'none';
    document.getElementById("iResultServidor").style.display = 'none';
    document.getElementById("iResultGw").style.display = 'none';
    document.getElementById("iResultOutrosAcessos").style.display = 'none';
    document.getElementById("iResultDadosLoja").style.display = 'none';
    document.getElementById("iResultGeral").style.display = 'none';

    document.getElementById('cadDadosCliente').style.display = "block";

    document.getElementById('cBusca').value = "";
}


// altera o ritulo da pagina
function titulo(title){

    document.getElementById('titulo').innerHTML = title;
    document.getElementById('titulo').value = title;
}

function verificarNomeLoja(){

    var titulo = document.getElementById('titulo').value;
    var lojas = document.getElementsByClassName('CNomeLoja');
    for (var i = lojas.length - 1; i >= 0; i--) {
        lojas[i].value = titulo;
    }
}

function verificarNomeGrupo(nomeGrupo){

    var grupo = document.getElementsByClassName('CNomeGrupo');
    for (var i = grupo.length - 1; i >= 0; i--) {
        grupo[i].value = nomeGrupo;
    }
}

function verificarNomeCliente(nomeCliente){

    var cliente = document.getElementsByClassName('CNomeCliente');
    for (var i = cliente.length - 1; i >= 0; i--) {
        cliente[i].value = nomeCliente;
    }
}

function alteraTextParaCadastro(tipo){

    if(tipo == "troncoE1"){
        var displayTroncoE1 = document.getElementById('iTextTroncoE1').style.display;
        document.getElementById('iResultTroncoE1').style.display = "none";
        document.getElementById('iTextTroncoE1').value = "";

        if(displayTroncoE1 == 'none'){
            document.getElementById('iTextTroncoE1').style.display = "block";
            document.getElementById('iSlcTroncoE1').style.display = "none";
        } else {
            document.getElementById('iTextTroncoE1').style.display = "none";
            document.getElementById('iSlcTroncoE1').style.display = "block";
        }
    
    } else if(tipo == "0800"){
        var display0800 = document.getElementById('iText0800').style.display;
        document.getElementById('iResult0800').style.display = "none";
        document.getElementById('iText0800').value = "";

        if(display0800 == 'none'){
            document.getElementById('iText0800').style.display = "block";
            document.getElementById('iSlc0800').style.display = "none";
        } else {
            document.getElementById('iText0800').style.display = "none";
            document.getElementById('iSlc0800').style.display = "block";
        }
    
    } else if(tipo == "analogica"){
        var displayLanalogica = document.getElementById('iTextLanalogica').style.display;
        document.getElementById('iResultLanalogica').style.display = "none";
        document.getElementById('iTextLanalogica').value = "";

        if(displayLanalogica == 'none'){
            document.getElementById('iTextLanalogica').style.display = "block";
            document.getElementById('iSlcLanalogica').style.display = "none";
        } else {
            document.getElementById('iTextLanalogica').style.display = "none";
            document.getElementById('iSlcLanalogica').style.display = "block";
        }
    
    } else if(tipo == "servidor"){
        var displayServidor = document.getElementById('iTextServidor').style.display;
        document.getElementById('iResultServidor').style.display = "none";
        document.getElementById('iTextServidor').value = "";
        if(displayServidor == 'none'){
            document.getElementById('iTextServidor').style.display = "block";
            document.getElementById('iSlcServidor').style.display = "none";
        } else {
            document.getElementById('iTextServidor').style.display = "none";
            document.getElementById('iSlcServidor').style.display = "block";
        }
    
    } else if(tipo == "gatewayE1"){
        var displayGateway = document.getElementById('iTextGatewayE1').style.display;
        document.getElementById('iResultGw').style.display = "none";
        document.getElementById('iTextGatewayE1').value = "";
        if(displayGateway == 'none'){
            document.getElementById('iTextGatewayE1').style.display = "block";
            document.getElementById('iSlcGatewayE1').style.display = "none";
        } else {
            document.getElementById('iTextGatewayE1').style.display = "none";
            document.getElementById('iSlcGatewayE1').style.display = "block";
        }
    
    } else if(tipo == "gatewayFxs"){
        var displayGateway = document.getElementById('iTextGatewayFxs').style.display;
        document.getElementById('iResultGw').style.display = "none";
        document.getElementById('iTextGatewayFxs').value = "";
        if(displayGateway == 'none'){
            document.getElementById('iTextGatewayFxs').style.display = "block";
            document.getElementById('iSlcGatewayFxs').style.display = "none";
        } else {
            document.getElementById('iTextGatewayFxs').style.display = "none";
            document.getElementById('iSlcGatewayFxs').style.display = "block";
        }

    } else if(tipo == "gatewayFxo"){
        var displayGateway = document.getElementById('iTextGatewayFxo').style.display;
        document.getElementById('iResultGw').style.display = "none";
        document.getElementById('iTextGatewayFxo').value = "";
        if(displayGateway == 'none'){
            document.getElementById('iTextGatewayFxo').style.display = "block";
            document.getElementById('iSlcGatewayFxo').style.display = "none";
        } else {
            document.getElementById('iTextGatewayFxo').style.display = "none";
            document.getElementById('iSlcGatewayFxo').style.display = "block";
        }
    
    } else if(tipo == "gatewayGsm"){
        var displayGateway = document.getElementById('iTextGatewayGsm').style.display;
        document.getElementById('iResultGw').style.display = "none";
        document.getElementById('iTextGatewayGsm').value = "";
        if(displayGateway == 'none'){
            document.getElementById('iTextGatewayGsm').style.display = "block";
            document.getElementById('iSlcGatewayGsm').style.display = "none";
        } else {
            document.getElementById('iTextGatewayGsm').style.display = "none";
            document.getElementById('iSlcGatewayGsm').style.display = "block";
        }
    
    } else if(tipo == "outros"){
        var displayOutrosAcessos = document.getElementById('iTextOutrosAcessos').style.display;
        document.getElementById('iResultOutrosAcessos').style.display = "none";
        document.getElementById('iTextOutrosAcessos').value = "";
        if(displayOutrosAcessos == 'none'){
            document.getElementById('iTextOutrosAcessos').style.display = "block";
            document.getElementById('iSlcOutrosAcessos').style.display = "none";
        } else {
            document.getElementById('iTextOutrosAcessos').style.display = "none";
            document.getElementById('iSlcOutrosAcessos').style.display = "block";
        }
    } 
}

function verificarTextEmBranco(tipo){

    if(tipo === "cliente"){
        var acaoBotao = document.getElementById('botaoC').value;
    } else if(tipo === "grupo"){
        var acaoBotao = document.getElementById('botaoG').value;
        buscarGrupoClientes("iApagaGrupoCliente");
    } else if(tipo === "sub"){
        var acaoBotao = document.getElementById('botaoS').value;
        //buscarGrupoClientes("iCliente");
        //buscarSubGrupoClientes("iCliente", "iGrCliente");
    }
    
    if(acaoBotao == 'apagarC' || acaoBotao == 'apagarG' || acaoBotao == 'apagarS'){

        var displayCliente = document.getElementById('iClient').style.display;
        var displayGrupoCliente = document.getElementById('iGprClient').style.display;
        var displaySubGrupoCliente = document.getElementById('iSubGprClient').style.display;

        if(displayCliente == 'block' && displayGrupoCliente == 'block' && displaySubGrupoCliente == 'block'){

            document.getElementById('iClient').style.display = "none";
            document.getElementById('iGprClient').style.display = "none";
            document.getElementById('iSubGprClient').style.display = "none";

            document.getElementById('iApagaCliente').style.display = "block";
            document.getElementById('iApagaGrCliente').style.display = "block";
            document.getElementById('iApagaSubGrCliente').style.display = "block";

            document.getElementById('obrigC').style.display = "none";
            document.getElementById('obrigG').style.display = "none";
            document.getElementById('obrigS').style.display = "none";

            return false;
            // se houver um return false para um form utilisando onsubmit, o
			// form nao realizara o submit
        } else if(tipo === "sub"){
            if(confirmDelete()) return true;
            else return false;
        
        } else {
            return true;
        }

    } else if(acaoBotao == 'salvar' || acaoBotao == 'salvar' || acaoBotao == 'salvar'){

        var displayCliente = document.getElementById('iClient').style.display;
        var displayGrupoCliente = document.getElementById('iGprClient').style.display;
        var displaySubGrupoCliente = document.getElementById('iSubGprClient').style.display;

        if(displayCliente == 'block' && displayGrupoCliente == 'block' && displaySubGrupoCliente == 'block'){
            return true;
        
        } else {
            return false;
        }
    
    } 
}


function alteraSelectTextApagaCliente(ida, idb){

    var display = document.getElementById(ida).style.display;
    if(display == "block"){

        document.getElementById(ida).style.display = "none";
        document.getElementById(idb).style.display = "block";


    } else {

        document.getElementById(ida).style.display = "block";
        document.getElementById(idb).style.display = "none";
        

    }
    
}

function adicionaLinhaTabelaGsm(){

    var qtdLinhas = document.getElementById('iQuantidadeResultGsm').value;
 
    if(qtdLinhas >= 0){

        var tableGsm = document.getElementById("itableGsm").innerHTML;
        tableGsm += "<tr><td><label>GSM:&nbsp;</label></td>"+
      "<td><input id=\"iGsm_"+qtdLinhas+"\" type=\"text\" name=\"text_tecnoE1\"></td>"+
      "<td><label>Operadora:&nbsp;</label></td>"+
      "<td><input id=\"iOperadoraLinGsm_"+qtdLinhas+"\" type=\"text\" name=\"text_tecnoE1\"/></td>"+
      "<td><label>Placa:&nbsp;</td></label></td>"+
      "<td><input id=\"iPlacaLinGsm_"+qtdLinhas+"\" type=\"text\" name=\"text_tecnoE1\"></td>"+
      "<td><input type=\"submit\" class=\"ButtonX\" type=\"button\" value=\"X\" onclick=\"apagaGsm("+qtdLinhas+")\"/></td>"+
      "<td><input type=\"hidden\" id=\"iTipoLine_"+qtdLinhas+"\" value=\"novo\"/></td></tr>";

      document.getElementById("itableGsm").innerHTML = tableGsm;

      document.getElementById('iQuantidadeResultGsm').value = parseInt(qtdLinhas) + 1;

      document.getElementById("iResultGsm").style.display = 'none';
    
    } 
}


// utiliza o AJAX para peenchimento automatico dos selects (options)
function buscarGrupoClientes(id, tipo){
    // caso a busca dessa função for passado apenas 1 parametro, o 2º sera
	// undefined
    if(typeof tipo == undefined) tipo = null;

    var cliente = document.getElementById(id).value;

    var xmlhttp;
    if (window.XMLHttpRequest){ // faz uma verificação de o navegador ira
								// aceitar o XMLHttpRequest (se existe o
								// XMLHttpRequest no
    // motor Java script do navegador utilizado) normalmente soe os navegadores
	// do tipo webkit (mozilla, Chrome)
    // o IE nao possui essa classe em seu motor
    // o retorno sera do tipo boolean

        xmlhttp = new XMLHttpRequest(); // caso TRUE, cria o objeto
										// XMLHttpRequest() onde sera realizado
										// a manipulação do AJAX

    } else {

        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); // o objeto
															// ActiveXObject("Microsoft.XMLHTTP")
															// é criado
															// normalmente
                                                        // para o Explorer
    }

    xmlhttp.onreadystatechange = function(){ // o (onreadystatechange) é
												// executado a cada mudança de
												// estado do readyState
                                             // o (onreadystatechange) é um
												// atributo do xmlhttp (obijeto
												// criado)
                                             // esse atributo recebera uma
												// funcao onde vou decidir o que
												// fazer em cada mudança de
												// estado

        if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
            // o readyState monitora cada mudança de estado
            // 0 = Os pedidos não são inicializados
            // 1 = Que o pedido foi ajustado acima
            // 2 = O pedido foi emitido
            // 3 = O pedido está no processo
            // 4 = O pedido está completo

            // console.log(xmlhttp.responseText);
            document.getElementById("iGrCliente").innerHTML = xmlhttp.responseText;
            document.getElementById("iApagaGrCliente").innerHTML = xmlhttp.responseText;
            // o responseText ira obter o resultado que foi obitido pela
			// requisição (open())
            // para o AJAX o retorno sempre utiliza um ECHO e nao um return

            
            if(tipo != null) {
                buscarSubGrupoClientes(id, "iGrCliente");
            }
        }
    }

    xmlhttp.open("GET","http://localhost/intranet/modulos/ajax.modu.php?acao=buscarGrClientes&nomeCliente="+cliente,true);
    // é feita uma requisição do tipo GET / o thue no final significa (Sincrono
	// ou assincrono)
    // O método open() faz um exame de três argumentos. O primeiro argumento
	// define que
    // método para se usar quando emitindo o pedido (GET ou POST). O segundo
	// argumento
    // especifica o URL do server-side script. O terceiro argumento especifica
	// que o pedido
    // deve ser segurado asynchronously.

    xmlhttp.send();
    // envia a requisição, no caso de sincrono, ficara aguardando a resposta do
	// servidor
}

function buscarSubGrupoClientes(idClient, idGrupo){
    var cliente = document.getElementById(idClient).value;
    var grupo = document.getElementById(idGrupo).value;

    var xmlhttp;
    if (window.XMLHttpRequest){ 
        xmlhttp = new XMLHttpRequest(); // caso TRUE, cria o objeto
										// XMLHttpRequest() onde sera realizado
										// a manipulação do AJAX
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); 
    }

    xmlhttp.onreadystatechange = function(){ 
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
            document.getElementById("iApagaSubGrCliente").innerHTML = xmlhttp.responseText;
        }
    }

    xmlhttp.open("GET","http://localhost/intranet/modulos/ajax.modu.php?acao=buscarSubGrClientes&nomeCliente="+cliente+
    "&nomeGrupo="+grupo,true);
    xmlhttp.send();
}

function buscarNumeroE1(loja, grupo, cliente){

    var xmlhttp;
    if (window.XMLHttpRequest){

        xmlhttp = new XMLHttpRequest(); // caso TRUE, cria o objeto
										// XMLHttpRequest() onde sera realizado
										// a manipulação do AJAX
    } else {

        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){ 
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){

            if(xmlhttp.responseText != "") document.getElementById("div_troncoDigital").style.display = 'block';
            else document.getElementById("div_troncoDigital").style.display = 'none';

            // console.log(xmlhttp.responseText);
            document.getElementById("iSlcTroncoE1").innerHTML = xmlhttp.responseText;

            var numE1 = document.getElementById("iSlcTroncoE1").value;

            if(numE1 != ""){
                buscarCadastroTroncoE1(numE1);
            } else {
                document.getElementById("iQuantidadeCanaisE1").value = "";
                document.getElementById("iOperadoraE1").value = "";
                document.getElementById("iTecnoTroncoE1").value = "";
                document.getElementById("iPlacaTronco").value = "";
                document.getElementById("iRangerDdrTronco").value = "";
            }
            
        }
    }
    xmlhttp.open("GET","http://localhost/intranet/modulos/ajax.modu.php?acao=buscarNumeroE1&nomeLoja="+loja+
    "&nomeGrupo="+grupo+"&nomeCliente="+cliente,true);   
    xmlhttp.send();
}


function buscarCadastroTroncoE1(numE1){
    
    var xmlhttp;
    if (window.XMLHttpRequest){

        xmlhttp = new XMLHttpRequest(); // caso TRUE, cria o objeto
										// XMLHttpRequest() onde sera realizado
										// a manipulação do AJAX
    } else {

        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){ 
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){

            // console.log(xmlhttp.responseText);
            var array = JSON.parse(xmlhttp.responseText);
            // console.log(array);
            document.getElementById("iQuantidadeCanaisE1").value = array['qtdcanais_e1'];
            document.getElementById("iOperadoraE1").value = array['operadora_e1'];
            document.getElementById("iTecnoTroncoE1").value = array['tecn_e1'];
            document.getElementById("iPlacaTronco").value = array['dispositivo_e1'];
            document.getElementById("iRangerDdrTronco").value = array['rang_ddr_e1'];
            
        }
    }
    xmlhttp.open("GET","http://localhost/intranet/modulos/ajax.modu.php?acao=buscarCadTroncoE1&numE1="+numE1,true); 
    xmlhttp.send();  
}


function cadastroE1(){

    verificarNomeLoja();

    var displayText = document.getElementById("iTextTroncoE1").style.display;
    
    var canais = document.getElementById("iQuantidadeCanaisE1").value;
    var operadora = document.getElementById("iOperadoraE1").value;
    var tecnologia = document.getElementById("iTecnoTroncoE1").value;
    var placa = document.getElementById("iPlacaTronco").value;
    var ddr = document.getElementById("iRangerDdrTronco").value;
    
    var nomeLoja = document.getElementById("iNomeLojaE1").value;
    var nomeGrupo = document.getElementById("iNomeGrupoE1").value;
    var nomeCliente = document.getElementById("iNomeClienteE1").value;

    if(displayText == 'none') {
        var numero = document.getElementById("iSlcTroncoE1").value;
        var funcao = "alterar";

    } else {
        var numero = document.getElementById("iTextTroncoE1").value;
        var funcao = "cadastar";
    }

    var xmlhttp;
    if (window.XMLHttpRequest){

        xmlhttp = new XMLHttpRequest(); // caso TRUE, cria o objeto
										// XMLHttpRequest() onde sera realizado
										// a manipulação do AJAX
    } else {

        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){ 
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){

            // console.log(xmlhttp.responseText);
            document.getElementById("iResultTroncoE1").innerHTML = xmlhttp.responseText;
            document.getElementById("iResultTroncoE1").style.display = 'block';
            document.getElementById("iTextTroncoE1").style.display = 'none';
            document.getElementById("iSlcTroncoE1").style.display = 'block';
            buscarNumeroE1(nomeLoja, nomeGrupo, nomeCliente);
            
        }
    }
    xmlhttp.open("GET","http://localhost/intranet/modulos/ajax.modu.php?acao=cadastrarE1&numE1="+numero+"&qtdCanais="+canais+
        "&operadora="+operadora+"&tecnologia="+tecnologia+"&placa="+placa+"&ddr="+ddr+"&nomeLoja="+nomeLoja+"&nomeGrupo="+nomeGrupo+
        "&nomeCliente="+nomeCliente+"&funcao="+funcao,true); 
    xmlhttp.send();  
}

function apagaE1(){

    verificarNomeLoja();
    // confirmDelete();

    var displayText = document.getElementById("iTextTroncoE1").style.display;

    var nomeLoja = document.getElementById("iNomeLojaE1").value;
    var nomeGrupo = document.getElementById("iNomeGrupoE1").value;
    var nomeCliente = document.getElementById("iNomeClienteE1").value;

    if(displayText == 'none') {
        var numero = document.getElementById("iSlcTroncoE1").value;
        var funcao = "apagar";
        if(numero != ""){
            if(!confirmDelete()) return;
        }

    } else {
        var numero = "";
        var funcao = "";
    }

    var xmlhttp;
    if (window.XMLHttpRequest){

        xmlhttp = new XMLHttpRequest(); // caso TRUE, cria o objeto
										// XMLHttpRequest() onde sera realizado
										// a manipulação do AJAX
    } else {

        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){ 
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){

            // console.log(xmlhttp.responseText);
            document.getElementById("iResultTroncoE1").innerHTML = xmlhttp.responseText;
            document.getElementById("iResultTroncoE1").style.display = 'block';
            document.getElementById("iTextTroncoE1").style.display = 'none';
            document.getElementById("iSlcTroncoE1").style.display = 'block';
            buscarNumeroE1(nomeLoja, nomeGrupo, nomeCliente);
            
        }
    }
    if(funcao != ""){
        xmlhttp.open("GET","http://localhost/intranet/modulos/ajax.modu.php?acao=cadastrarE1&numE1="+numero+"&funcao="+funcao,true); 
        xmlhttp.send();
    } 
      
}

function buscarNumero0800(loja, grupo, cliente){

    var xmlhttp;
    if (window.XMLHttpRequest){

        xmlhttp = new XMLHttpRequest(); // caso TRUE, cria o objeto
										// XMLHttpRequest() onde sera realizado
										// a manipulação do AJAX
    } else {

        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){ 
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){

            if(xmlhttp.responseText != "") document.getElementById("div_zero").style.display = 'block';
            else document.getElementById("div_zero").style.display = 'none';

            // console.log(xmlhttp.responseText);
            //document.getElementById("div_zero").style.display = 'block'; 
            document.getElementById("iSlc0800").innerHTML = xmlhttp.responseText;

            var num0800 = document.getElementById("iSlc0800").value;

            if(num0800 != ""){
                buscarCadastro0800(num0800);
            } else {
                document.getElementById("iDdr0800").value = "";
                document.getElementById("iChave0800").value = "";
                document.getElementById("iFilaAtend").value = "";
            }         
            
        }
    }
    xmlhttp.open("GET","http://localhost/intranet/modulos/ajax.modu.php?acao=buscarNumero0800&nomeLoja="+loja+
    "&nomeGrupo="+grupo+"&nomeCliente="+cliente,true);   
    xmlhttp.send();
}

function buscarCadastro0800(num0800){
    
    var xmlhttp;
    if (window.XMLHttpRequest){

        xmlhttp = new XMLHttpRequest(); // caso TRUE, cria o objeto
										// XMLHttpRequest() onde sera realizado
										// a manipulação do AJAX
    } else {

        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){ 
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){

            // console.log(xmlhttp.responseText);
            var array = JSON.parse(xmlhttp.responseText);
            // console.log(array);
            document.getElementById("iDdr0800").value = array['ddr_0800'];
            document.getElementById("iChave0800").value = array['chave_0800'];
            document.getElementById("iFilaAtend").value = array['fila_vdt_0800'];
        }
    }
    xmlhttp.open("GET","http://localhost/intranet/modulos/ajax.modu.php?acao=buscarCad0800&num0800="+num0800,true); 
    xmlhttp.send();  
}


function cadastro0800(){

    verificarNomeLoja();

    var displayText = document.getElementById("iText0800").style.display;
    
    var ddr = document.getElementById("iDdr0800").value;
    var chave = document.getElementById("iChave0800").value;
    var fila = document.getElementById("iFilaAtend").value;

    var nomeLoja = document.getElementById("iNomeLoja0800").value;
    var nomeGrupo = document.getElementById("iNomeGrupo0800").value;
    var nomeCliente = document.getElementById("iNomeCliente0800").value;

    if(displayText == 'none') {
        var numero = document.getElementById("iSlc0800").value;
        var funcao = "alterar";

    } else {
        var numero = document.getElementById("iText0800").value;
        var funcao = "cadastar";
    }

    var xmlhttp;
    if (window.XMLHttpRequest){

        xmlhttp = new XMLHttpRequest(); // caso TRUE, cria o objeto
										// XMLHttpRequest() onde sera realizado
										// a manipulação do AJAX
    } else {

        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){ 
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){

            // console.log(xmlhttp.responseText);
            document.getElementById("iResult0800").innerHTML = xmlhttp.responseText;
            document.getElementById("iResult0800").style.display = 'block';
            document.getElementById("iText0800").style.display = 'none';
            document.getElementById("iSlc0800").style.display = 'block';
            buscarNumero0800(nomeLoja, nomeGrupo, nomeCliente);
            
        }
    }
    xmlhttp.open("GET","http://localhost/intranet/modulos/ajax.modu.php?acao=cadastrar0800&num0800="+numero+"&numDdr="+ddr+
    "&numChave="+chave+"&fila="+fila+"&nomeLoja="+nomeLoja+"&nomeGrupo="+nomeGrupo+"&nomeCliente="+nomeCliente+"&funcao="+funcao,true);
    xmlhttp.send();  
}


function apaga0800(){

    verificarNomeLoja();

    var displayText = document.getElementById("iText0800").style.display;

    var nomeLoja = document.getElementById("iNomeLoja0800").value;
    var nomeGrupo = document.getElementById("iNomeGrupo0800").value;
    var nomeCliente = document.getElementById("iNomeCliente0800").value;

    if(displayText == 'none') {
        var numero = document.getElementById("iSlc0800").value;
        var funcao = "apagar";
        if(numero != ""){
            if(!confirmDelete()) return;
        }

    } else {
        var numero = "";
        var funcao = "";
    }

    var xmlhttp;
    if (window.XMLHttpRequest){

        xmlhttp = new XMLHttpRequest(); // caso TRUE, cria o objeto
										// XMLHttpRequest() onde sera realizado
										// a manipulação do AJAX
    } else {

        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){ 
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){

            // console.log(xmlhttp.responseText);
            document.getElementById("iResult0800").innerHTML = xmlhttp.responseText;
            document.getElementById("iResult0800").style.display = 'block';
            document.getElementById("iText0800").style.display = 'none';
            document.getElementById("iSlc0800").style.display = 'block';
            buscarNumero0800(nomeLoja, nomeGrupo, nomeCliente);
            
        }
    }
    if(funcao != ""){
        xmlhttp.open("GET","http://localhost/intranet/modulos/ajax.modu.php?acao=cadastrar0800&num0800="+numero+"&funcao="+funcao,true); 
        xmlhttp.send();
    } 
      
}


function buscarNumeroLanalogica(loja, grupo, cliente){

    var xmlhttp;
    if (window.XMLHttpRequest){

        xmlhttp = new XMLHttpRequest(); // caso TRUE, cria o objeto
										// XMLHttpRequest() onde sera realizado
										// a manipulação do AJAX
    } else {

        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){ 
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){

            if(xmlhttp.responseText != "") document.getElementById("div_analogica").style.display = 'block';
            else document.getElementById("div_analogica").style.display = 'none';

            // console.log(xmlhttp.responseText);
            document.getElementById("iSlcLanalogica").innerHTML = xmlhttp.responseText;

           var numLa = document.getElementById("iSlcLanalogica").value;

            if(numLa != ""){
                buscarCadastroLanalogica(numLa);
            } else {
                document.getElementById("iOperadoraLanalogica").value = "";
                document.getElementById("iPlacaLanalogica").value = "";
           }          
        }
    }
    xmlhttp.open("GET","http://localhost/intranet/modulos/ajax.modu.php?acao=buscarNumeroLanalogica&nomeLoja="+loja+
    "&nomeGrupo="+grupo+"&nomeCliente="+cliente,true);   
    xmlhttp.send();
}

function buscarCadastroLanalogica(numLa){
    
    var xmlhttp;
    if (window.XMLHttpRequest){

        xmlhttp = new XMLHttpRequest(); // caso TRUE, cria o objeto
										// XMLHttpRequest() onde sera realizado
										// a manipulação do AJAX
    } else {

        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){ 
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){

            // console.log(xmlhttp.responseText);
            var array = JSON.parse(xmlhttp.responseText);
            // console.log(array);
            document.getElementById("iOperadoraLanalogica").value = array['operadora_analogica'];
            document.getElementById("iPlacaLanalogica").value = array['dispositivo_analogica'];
        }
    }
    xmlhttp.open("GET","http://localhost/intranet/modulos/ajax.modu.php?acao=buscarCadLanalogica&numLa="+numLa,true); 
    xmlhttp.send();  
}

function cadastroLanalogica(){

    verificarNomeLoja();

    var displayText = document.getElementById("iTextLanalogica").style.display;
    
    var placa = document.getElementById("iPlacaLanalogica").value;
    var operadora = document.getElementById("iOperadoraLanalogica").value;

    var nomeLoja = document.getElementById("iNomeLojaLanalogica").value;
    var nomeGrupo = document.getElementById("iNomeGrupoLanalogica").value;
    var nomeCliente = document.getElementById("iNomeClienteLanalogica").value;

    if(displayText == 'none') {
        var numero = document.getElementById("iSlcLanalogica").value;
        var funcao = "alterar";

    } else {
        var numero = document.getElementById("iTextLanalogica").value;
        var funcao = "cadastar";
    
    }

    var xmlhttp;
    if (window.XMLHttpRequest){

        xmlhttp = new XMLHttpRequest(); // caso TRUE, cria o objeto
										// XMLHttpRequest() onde sera realizado
										// a manipulação do AJAX
    } else {

        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){ 
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){

            // console.log(xmlhttp.responseText);
            document.getElementById("iResultLanalogica").innerHTML = xmlhttp.responseText;
            document.getElementById("iResultLanalogica").style.display = 'block';
            document.getElementById("iTextLanalogica").style.display = 'none';
            document.getElementById("iSlcLanalogica").style.display = 'block';
            buscarNumeroLanalogica(nomeLoja, nomeGrupo, nomeCliente);
            
        }
    }
    xmlhttp.open("GET","http://localhost/intranet/modulos/ajax.modu.php?acao=cadastrarLanalogica&numLa="+numero+"&placa="+placa+
    "&operadora="+operadora+"&nomeLoja="+nomeLoja+"&nomeGrupo="+nomeGrupo+"&nomeCliente="+nomeCliente+"&funcao="+funcao,true);
    xmlhttp.send();  
}

function apagaLanalogica(){

    verificarNomeLoja();

    var displayText = document.getElementById("iTextLanalogica").style.display;

    var nomeLoja = document.getElementById("iNomeLojaLanalogica").value;
    var nomeGrupo = document.getElementById("iNomeGrupoLanalogica").value;
    var nomeCliente = document.getElementById("iNomeClienteLanalogica").value;

    if(displayText == 'none') {
        var numero = document.getElementById("iSlcLanalogica").value;
        var funcao = "apagar";
        if(numero != ""){
            if(!confirmDelete()) return;
        }

    } else {
        var numero = "";
        var funcao = "";
    }

    var xmlhttp;
    if (window.XMLHttpRequest){

        xmlhttp = new XMLHttpRequest(); // caso TRUE, cria o objeto
										// XMLHttpRequest() onde sera realizado
										// a manipulação do AJAX
    } else {

        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){ 
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){

            // console.log(xmlhttp.responseText);
            document.getElementById("iResultLanalogica").innerHTML = xmlhttp.responseText;
            document.getElementById("iResultLanalogica").style.display = 'block';
            document.getElementById("iTextLanalogica").style.display = 'none';
            document.getElementById("iSlcLanalogica").style.display = 'block';
            buscarNumeroLanalogica(nomeLoja, nomeGrupo, nomeCliente);
            
        }
    }
    if(funcao != ""){
        xmlhttp.open("GET","http://localhost/intranet/modulos/ajax.modu.php?acao=cadastrarLanalogica&numLa="+numero+"&funcao="+funcao,true); 
        xmlhttp.send();
    }     
}

function buscarNumeroGsm(loja, grupo, cliente){

    var xmlhttp;
    if (window.XMLHttpRequest){

        xmlhttp = new XMLHttpRequest(); // caso TRUE, cria o objeto
										// XMLHttpRequest() onde sera realizado
										// a manipulação do AJAX
    } else {

        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){ 
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){

           
            //console.log(xmlhttp.responseText);

            var array = JSON.parse(xmlhttp.responseText);
            var tableGsm = "";
            var qtd = 1;
            if(array.length != 0){
                qtd = array.length;
                document.getElementById("div_gsm").style.display = 'block';
            
            }else {
                document.getElementById("div_gsm").style.display = 'none';
            }

            //console.log(array);

            document.getElementById('iQuantidadeResultGsm').value = qtd;
            
            if(array.length > 0){

                for(var i = 0; i < array.length; i++){

                    tableGsm += "<tr><td><label>GSM:&nbsp;</label></td>"+
                  "<td><input id=\"iGsm_"+i+"\" type=\"text\" name=\"text_tecnoE1\" value=\""+array[i]['num_gsm']+"\" readonly/></td>"+
                  "<td><label>Operadora:&nbsp;</label></td>"+
                  "<td><input id=\"iOperadoraLinGsm_"+i+"\" type=\"text\" name=\"text_tecnoE1\" value=\""+array[i]['operadora_gsm']+"\"/></td>"+
                  "<td><label>Placa:&nbsp;</td></label></td>"+
                  "<td><input id=\"iPlacaLinGsm_"+i+"\" type=\"text\" name=\"text_tecnoE1\" value=\""+array[i]['dispositivo_gsm']+"\"></td>"+
                  "<td><input type=\"submit\" id=\"iButtonApagaGsm_"+i+"\" class=\"ButtonX\" type=\"button\" value=\"X\" onclick=\"apagaGsm("+i+")\"/></td>"+
                  "<td><input type=\"hidden\" id=\"iTipoLine_"+i+"\" value=\"antigo\"/></td></tr>";
                  
                }
            
            } else {

                tableGsm = "<tr><td><label>GSM:&nbsp;</label></td>"+
              "<td><input id=\"iGsm_0\" type=\"text\" name=\"text_tecnoE1\"></td>"+
              "<td><label>Operadora:&nbsp;</label></td>"+
              "<td><input id=\"iOperadoraLinGsm_0\" type=\"text\" name=\"text_tecnoE1\"/></td>"+
              "<td><label>Placa:&nbsp;</td></label></td>"+
              "<td><input id=\"iPlacaLinGsm_0\" type=\"text\" name=\"text_tecnoE1\"></td>"+
              "<td><input type=\"submit\" class=\"ButtonX\" type=\"button\" value=\"X\" onclick=\"apagaGsm(0)\"/></td>"+
              "<td><input type=\"hidden\" id=\"iTipoLine_0\" value=\"novo\"/></td></tr>";
            }

            document.getElementById("itableGsm").innerHTML = tableGsm;
        }
    }
    xmlhttp.open("GET","http://localhost/intranet/modulos/ajax.modu.php?acao=buscarNumeroGsm&nomeLoja="+loja+
    "&nomeGrupo="+grupo+"&nomeCliente="+cliente,true);   
    xmlhttp.send();
}


function cadastroGsm(){

    verificarNomeLoja();

    var nomeLoja = document.getElementById("iNomeLojaGsm").value;
    var nomeGrupo = document.getElementById("iNomeGrupoGsm").value;
    var nomeCliente = document.getElementById("iNomeClienteGsm").value;

    var qtdLinhas = document.getElementById('iQuantidadeResultGsm').value;
    var linha = 0;

    while(linha < qtdLinhas){
        var tipoLine = document.getElementById("iTipoLine_"+linha).value;
        var numero = document.getElementById("iGsm_"+linha).value;
        var operadora = document.getElementById("iOperadoraLinGsm_"+linha).value;
        var placa = document.getElementById("iPlacaLinGsm_"+linha).value;

        var result = cadastroGsmAjax(nomeLoja, nomeGrupo, nomeCliente, numero, operadora, placa, tipoLine);
        if(result == "PROCEDIMENTO NÃO REALIZADO" || result == "FOI DETECTADO REGISTRO DO NÚMERO GSM"){

            document.getElementById("iResultGsm").innerHTML = result;
            document.getElementById("iResultGsm").style.display = 'block';
            break;
        
        } else {

            document.getElementById("iResultGsm").innerHTML = result;
            document.getElementById("iResultGsm").style.display = 'block';
        }

        linha++;
    }

    buscarNumeroGsm(nomeLoja, nomeGrupo, nomeCliente);     
}

function cadastroGsmAjax(loja, grupo, cliente, numero, operadora, placa, tipo){
    var xmlhttp;
    if (window.XMLHttpRequest){

        xmlhttp = new XMLHttpRequest(); // caso TRUE, cria o objeto
										// XMLHttpRequest() onde sera realizado
										// a manipulação do AJAX
    } else {

        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){ 
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){

            // console.log(xmlhttp.responseText);
            
        }

    }

    xmlhttp.open("GET","http://localhost/intranet/modulos/ajax.modu.php?acao=cadastrarGsm&numGsm="+numero+"&operadoraGsm="+operadora+
        "&placaGsm="+placa+"&nomeLoja="+loja+"&nomeGrupo="+grupo+"&nomeCliente="+cliente+"&tipo="+tipo,false);
    xmlhttp.send();
    return xmlhttp.responseText;
}

function apagaGsm(num){

    verificarNomeLoja();

    var numero = document.getElementById('iGsm_'+num).value;
    var nomeLoja = document.getElementById("iNomeLojaGsm").value;
    var nomeGrupo = document.getElementById("iNomeGrupoGsm").value;
    var nomeCliente = document.getElementById("iNomeClienteGsm").value;

    if(numero != ""){
        if(!confirmDelete()) return;
    }

    var xmlhttp;
    if (window.XMLHttpRequest){

        xmlhttp = new XMLHttpRequest(); // caso TRUE, cria o objeto
										// XMLHttpRequest() onde sera realizado
										// a manipulação do AJAX
    } else {

        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){ 
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){

            // console.log(xmlhttp.responseText);
            document.getElementById("iResultGsm").innerHTML = xmlhttp.responseText;
            document.getElementById("iResultGsm").style.display = 'block';
            buscarNumeroGsm(nomeLoja, nomeGrupo, nomeCliente);
        }

    }

    xmlhttp.open("GET","http://localhost/intranet/modulos/ajax.modu.php?acao=apagarGsm&numGsm="+numero,true);
    xmlhttp.send();
}

function buscarServidor(loja, grupo, cliente){

    var xmlhttp;
    if (window.XMLHttpRequest){

        xmlhttp = new XMLHttpRequest(); // caso TRUE, cria o objeto
										// XMLHttpRequest() onde sera realizado
										// a manipulação do AJAX
    } else {

        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){ 
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){

            if(xmlhttp.responseText != "") document.getElementById("div_servidor").style.display = 'block';
            else document.getElementById("div_servidor").style.display = 'none';

            // console.log(xmlhttp.responseText);
            document.getElementById("iSlcServidor").innerHTML = xmlhttp.responseText;

           var servidor = document.getElementById("iSlcServidor").value;

            if(servidor != ""){
                buscarCadastroServidor(servidor, loja, grupo, cliente);
            } else {
                document.getElementById("iServidorIp").value = "";
                document.getElementById("iServidorServico").value = "";
                document.getElementById("iServidorSsh").value = "";
                document.getElementById("iServidorPortaSsh").value = "";
                document.getElementById("iServidorAcessoWeb").value = "";
                document.getElementById("iServidorPortaWeb").value = "";
           }          
        }
    }
    xmlhttp.open("GET","http://localhost/intranet/modulos/ajax.modu.php?acao=buscarServidor&nomeLoja="+loja+
    "&nomeGrupo="+grupo+"&nomeCliente="+cliente,true);   
    xmlhttp.send();
}

function buscarCadastroServidor(servidor, loja, grupo, cliente){
    
    var xmlhttp;
    if (window.XMLHttpRequest){

        xmlhttp = new XMLHttpRequest(); // caso TRUE, cria o objeto
										// XMLHttpRequest() onde sera realizado
										// a manipulação do AJAX
    } else {

        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){ 
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){

            // console.log(xmlhttp.responseText);
            var array = JSON.parse(xmlhttp.responseText);
            // console.log(array);
            document.getElementById("idServidor").value = array['id_servidor'];
            document.getElementById("iServidorIp").value = array['ip_servidor'];
            document.getElementById("iServidorServico").value = array['ser_princ_servidor'];
            document.getElementById("iServidorSsh").value = array['ssh_servidor'];
            document.getElementById("iServidorPortaSsh").value = array['port_ssh_servidor'];
            document.getElementById("iServidorAcessoWeb").value = array['web_servidor'];
            document.getElementById("iServidorPortaWeb").value = array['port_web_servidor'];
        }
    }
    xmlhttp.open("GET","http://localhost/intranet/modulos/ajax.modu.php?acao=buscarCadServidor&servidor="+servidor+"&nomeLoja="+loja+
    "&nomeGrupo="+grupo+"&nomeCliente="+cliente,true);  
    xmlhttp.send();  
}

function cadastroServidor(){

    verificarNomeLoja();

    var displayText = document.getElementById("iTextServidor").style.display;
    
    var id = document.getElementById("idServidor").value;
    var ip = document.getElementById("iServidorIp").value;
    var servico = document.getElementById("iServidorServico").value;
    var ssh = document.getElementById("iServidorSsh").value;
    var portaSsh = document.getElementById("iServidorPortaSsh").value;
    var web = document.getElementById("iServidorAcessoWeb").value;
    var portaWeb = document.getElementById("iServidorPortaWeb").value;

    var nomeLoja = document.getElementById("iNomeLojaServidor").value;
    var nomeGrupo = document.getElementById("iNomeGrupoServidor").value;
    var nomeCliente = document.getElementById("iNomeClienteServidor").value;

    if(displayText == 'none') {
        var tipoServidor = document.getElementById("iSlcServidor").value;
        var funcao = "alterar";

    } else {
        var tipoServidor = document.getElementById("iTextServidor").value;
        var funcao = "cadastar";
    }

    var xmlhttp;
    if (window.XMLHttpRequest){

        xmlhttp = new XMLHttpRequest(); // caso TRUE, cria o objeto
										// XMLHttpRequest() onde sera realizado
										// a manipulação do AJAX
    } else {

        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){ 
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){

            //console.log(xmlhttp.responseText);
            document.getElementById("iResultServidor").innerHTML = xmlhttp.responseText;
            document.getElementById("iResultServidor").style.display = 'block';
            document.getElementById("iTextServidor").style.display = 'none';
            document.getElementById("iSlcServidor").style.display = 'block';
            buscarServidor(nomeLoja, nomeGrupo, nomeCliente);
            
        }
    }
    xmlhttp.open("GET","http://localhost/intranet/modulos/ajax.modu.php?acao=cadastrarServidor&servidor="+tipoServidor+"&id="+id+"&ip="+ip+
    "&servico="+servico+"&ssh="+ssh+"&portaSsh="+portaSsh+"&web="+web+"&portaWeb="+portaWeb+"&nomeLoja="+nomeLoja+"&nomeGrupo="+nomeGrupo+
    "&nomeCliente="+nomeCliente+"&funcao="+funcao,true);
    xmlhttp.send();  
}

function apagaServidor(){

    verificarNomeLoja();

    var displayText = document.getElementById("iTextServidor").style.display;

    var nomeLoja = document.getElementById("iNomeLojaServidor").value;
    var nomeGrupo = document.getElementById("iNomeGrupoServidor").value;
    var nomeCliente = document.getElementById("iNomeClienteServidor").value;

    if(displayText == 'none') {
        var servidor = document.getElementById("iSlcServidor").value;
        var id = document.getElementById("idServidor").value;
        var funcao = "apagar";
        if(servidor != ""){
            if(!confirmDelete()) return;
        }

    } else {
        var id = "";
        var funcao = "";
    }

    var xmlhttp;
    if (window.XMLHttpRequest){

        xmlhttp = new XMLHttpRequest(); // caso TRUE, cria o objeto
										// XMLHttpRequest() onde sera realizado
										// a manipulação do AJAX
    } else {

        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){ 
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){

            // console.log(xmlhttp.responseText);
            document.getElementById("iResultServidor").innerHTML = xmlhttp.responseText;
            document.getElementById("iResultServidor").style.display = 'block';
            document.getElementById("iTextServidor").style.display = 'none';
            document.getElementById("iSlcServidor").style.display = 'block';
            buscarServidor(nomeLoja, nomeGrupo, nomeCliente);         
        }
    }
    if(funcao != ""){
        xmlhttp.open("GET","http://localhost/intranet/modulos/ajax.modu.php?acao=cadastrarServidor&id="+id+"&servidor="+servidor+"&funcao="+funcao,true); 
        xmlhttp.send();
    }     
}


function buscarGatewayE1(loja, grupo, cliente){

    var xmlhttp;
    if (window.XMLHttpRequest){

        xmlhttp = new XMLHttpRequest(); // caso TRUE, cria o objeto
										// XMLHttpRequest() onde sera realizado
										// a manipulação do AJAX
    } else {

        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){ 
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){

            //console.log(xmlhttp.responseText);
            document.getElementById("iSlcGatewayE1").innerHTML = xmlhttp.responseText;

           var gateway = document.getElementById("iSlcGatewayE1").value;

            if(gateway != ""){
                buscarCadastroGateway(gateway, loja, grupo, cliente, "e1");
            } else {
                document.getElementById("iGatewayE1Ip").value = "";
                document.getElementById("iGatewayE1Acesso").value = "";
                document.getElementById("iGatewayE1Porta").value = "";
           }          
        }
    }
    xmlhttp.open("GET","http://localhost/intranet/modulos/ajax.modu.php?acao=buscarGateway&gateway=e1&nomeLoja="+loja+
    "&nomeGrupo="+grupo+"&nomeCliente="+cliente,true);   
    xmlhttp.send();
}

function buscarGatewayFxs(loja, grupo, cliente){

    var xmlhttp;
    if (window.XMLHttpRequest){

        xmlhttp = new XMLHttpRequest(); // caso TRUE, cria o objeto
                                        // XMLHttpRequest() onde sera realizado
                                        // a manipulação do AJAX
    } else {

        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){ 
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){

            //console.log(xmlhttp.responseText);
            document.getElementById("iSlcGatewayFxs").innerHTML = xmlhttp.responseText;

           var gateway = document.getElementById("iSlcGatewayFxs").value;

            if(gateway != ""){
                buscarCadastroGateway(gateway, loja, grupo, cliente, "fxs");
            } else {
                document.getElementById("iGatewayFxsIp").value = "";
                document.getElementById("iGatewayFxsAcesso").value = "";
                document.getElementById("iGatewayFxsPorta").value = "";
           }          
        }
    }
    xmlhttp.open("GET","http://localhost/intranet/modulos/ajax.modu.php?acao=buscarGateway&gateway=fxs&nomeLoja="+loja+
    "&nomeGrupo="+grupo+"&nomeCliente="+cliente,true);   
    xmlhttp.send();
}

function buscarGatewayFxo(loja, grupo, cliente){

    var xmlhttp;
    if (window.XMLHttpRequest){

        xmlhttp = new XMLHttpRequest(); // caso TRUE, cria o objeto
                                        // XMLHttpRequest() onde sera realizado
                                        // a manipulação do AJAX
    } else {

        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){ 
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){

            //console.log(xmlhttp.responseText);
            document.getElementById("iSlcGatewayFxo").innerHTML = xmlhttp.responseText;

           var gateway = document.getElementById("iSlcGatewayFxo").value;

            if(gateway != ""){
                buscarCadastroGateway(gateway, loja, grupo, cliente, "fxo");
            } else {
                document.getElementById("iGatewayFxoIp").value = "";
                document.getElementById("iGatewayFxoAcesso").value = "";
                document.getElementById("iGatewayFxoPorta").value = "";
           }          
        }
    }
    xmlhttp.open("GET","http://localhost/intranet/modulos/ajax.modu.php?acao=buscarGateway&gateway=fxo&nomeLoja="+loja+
    "&nomeGrupo="+grupo+"&nomeCliente="+cliente,true);   
    xmlhttp.send();
}

function buscarGatewayGsm(loja, grupo, cliente){

    var xmlhttp;
    if (window.XMLHttpRequest){

        xmlhttp = new XMLHttpRequest(); // caso TRUE, cria o objeto
                                        // XMLHttpRequest() onde sera realizado
                                        // a manipulação do AJAX
    } else {

        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){ 
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){

            //console.log(xmlhttp.responseText);
            document.getElementById("iSlcGatewayGsm").innerHTML = xmlhttp.responseText;

           var gateway = document.getElementById("iSlcGatewayGsm").value;

            if(gateway != ""){
                buscarCadastroGateway(gateway, loja, grupo, cliente, "gsm");
            } else {
                document.getElementById("iGatewayGsmIP").value = "";
                document.getElementById("iGatewayGsmAcesso").value = "";
                document.getElementById("iGatewayGsmPorta").value = "";
           }          
        }
    }
    xmlhttp.open("GET","http://localhost/intranet/modulos/ajax.modu.php?acao=buscarGateway&gateway=gsm&nomeLoja="+loja+
    "&nomeGrupo="+grupo+"&nomeCliente="+cliente,true);   
    xmlhttp.send();
}

function buscarCadastroGateway(gateway, loja, grupo, cliente, model){
    
    var xmlhttp;
    if (window.XMLHttpRequest){

        xmlhttp = new XMLHttpRequest(); // caso TRUE, cria o objeto
                                        // XMLHttpRequest() onde sera realizado
                                        // a manipulação do AJAX
    } else {

        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){ 
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){

            //console.log(xmlhttp.responseText);
            var array = JSON.parse(xmlhttp.responseText);
            //console.log(array);

            if(array['modelo_gw'] == "e1"){
                document.getElementById("idGwE1").value = array['id_gw'];
                document.getElementById("iGatewayE1Ip").value = array['ip_gw'];
                document.getElementById("iGatewayE1Acesso").value = array['acesso_gw'];
                document.getElementById("iGatewayE1Porta").value = array['po_acesso_gw'];
            
            } else if(array['modelo_gw'] == "fxs"){
                document.getElementById("idGwFxs").value = array['id_gw'];
                document.getElementById("iGatewayFxsIp").value = array['ip_gw'];
                document.getElementById("iGatewayFxsAcesso").value = array['acesso_gw'];
                document.getElementById("iGatewayFxsPorta").value = array['po_acesso_gw'];
            
            } else if(array['modelo_gw'] == "fxo"){
                document.getElementById("idGwFxo").value = array['id_gw'];
                document.getElementById("iGatewayFxoIp").value = array['ip_gw'];
                document.getElementById("iGatewayFxoAcesso").value = array['acesso_gw'];
                document.getElementById("iGatewayFxoPorta").value = array['po_acesso_gw'];
            
            } else if(array['modelo_gw'] == "gsm"){
                document.getElementById("idGwGsm").value = array['id_gw'];
                document.getElementById("iGatewayGsmIP").value = array['ip_gw'];
                document.getElementById("iGatewayGsmAcesso").value = array['acesso_gw'];
                document.getElementById("iGatewayGsmPorta").value = array['po_acesso_gw'];
            
            }
        }
    }
    xmlhttp.open("GET","http://localhost/intranet/modulos/ajax.modu.php?acao=buscarCadGateway&gateway="+gateway+"&model="+model+"&nomeLoja="+loja+
        "&nomeGrupo="+grupo+"&nomeCliente="+cliente,false);
    xmlhttp.send();  
}

function cadastroGateway(tipo){

    verificarNomeLoja();

    if(tipo == "e1"){
        var displayText = document.getElementById("iTextGatewayE1").style.display; 
        var id = document.getElementById("idGwE1").value;
        var ip = document.getElementById("iGatewayE1Ip").value;
        var acesso = document.getElementById("iGatewayE1Acesso").value;
        var porta = document.getElementById("iGatewayE1Porta").value;

        if(displayText == 'none') {
        var gateway = document.getElementById("iSlcGatewayE1").value;
        var funcao = "alterar";

        } else {
            var gateway = document.getElementById("iTextGatewayE1").value;
            var funcao = "cadastar";
        }

    } else if(tipo == "fxs"){
        var displayText = document.getElementById("iTextGatewayFxs").style.display; 
        var id = document.getElementById("idGwFxs").value;
        var ip = document.getElementById("iGatewayFxsIp").value;
        var acesso = document.getElementById("iGatewayFxsAcesso").value;
        var porta = document.getElementById("iGatewayFxsPorta").value;

        if(displayText == 'none') {
        var gateway = document.getElementById("iSlcGatewayFxs").value;
        var funcao = "alterar";

        } else {
            var gateway = document.getElementById("iTextGatewayFxs").value;
            var funcao = "cadastar";
        }
    
    } else if(tipo == "fxo"){
        var displayText = document.getElementById("iTextGatewayFxo").style.display; 
        var id = document.getElementById("idGwFxo").value;
        var ip = document.getElementById("iGatewayFxoIp").value;
        var acesso = document.getElementById("iGatewayFxoAcesso").value;
        var porta = document.getElementById("iGatewayFxoPorta").value;

        if(displayText == 'none') {
        var gateway = document.getElementById("iSlcGatewayFxo").value;
        var funcao = "alterar";

        } else {
            var gateway = document.getElementById("iTextGatewayFxo").value;
            var funcao = "cadastar";
        }
    
    } else if(tipo == "gsm"){
        var displayText = document.getElementById("iTextGatewayGsm").style.display; 
        var id = document.getElementById("idGwGsm").value;
        var ip = document.getElementById("iGatewayGsmIP").value;
        var acesso = document.getElementById("iGatewayGsmAcesso").value;
        var porta = document.getElementById("iGatewayGsmPorta").value;

        if(displayText == 'none') {
        var gateway = document.getElementById("iSlcGatewayGsm").value;
        var funcao = "alterar";

        } else {
            var gateway = document.getElementById("iTextGatewayGsm").value;
            var funcao = "cadastar";
        }
    }
     
    var nomeLoja = document.getElementById("iNomeLojaGateway").value;
    var nomeGrupo = document.getElementById("iNomeGrupoGateway").value;
    var nomeCliente = document.getElementById("iNomeClienteGateway").value;

    var xmlhttp;
    if (window.XMLHttpRequest){

        xmlhttp = new XMLHttpRequest(); // caso TRUE, cria o objeto
                                        // XMLHttpRequest() onde sera realizado
                                        // a manipulação do AJAX
    } else {

        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){ 
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){

            //console.log(xmlhttp.responseText);
            document.getElementById("iResultGw").innerHTML = xmlhttp.responseText;
            document.getElementById("iResultGw").style.display = 'block';

            if(tipo == "e1"){
                document.getElementById("iTextGatewayE1").style.display = 'none';
                document.getElementById("iSlcGatewayE1").style.display = 'block';
                buscarGatewayE1(nomeLoja, nomeGrupo, nomeCliente);
            } else if(tipo == "fxs"){
                document.getElementById("iTextGatewayFxs").style.display = 'none';
                document.getElementById("iSlcGatewayFxs").style.display = 'block';
                buscarGatewayFxs(nomeLoja, nomeGrupo, nomeCliente);
            } else if(tipo == "fxo"){
                document.getElementById("iTextGatewayFxo").style.display = 'none';
                document.getElementById("iSlcGatewayFxo").style.display = 'block';
                buscarGatewayFxo(nomeLoja, nomeGrupo, nomeCliente);
            } else if(tipo == "gsm"){
                document.getElementById("iTextGatewayGsm").style.display = 'none';
                document.getElementById("iSlcGatewayGsm").style.display = 'block';
                buscarGatewayGsm(nomeLoja, nomeGrupo, nomeCliente);
            }
        }
    }
    xmlhttp.open("GET","http://localhost/intranet/modulos/ajax.modu.php?acao=cadastrarGateway&modelo="+tipo+"&gateway="+gateway+"&id="+id+"&ip="+ip+
    "&acesso="+acesso+"&porta="+porta+"&nomeLoja="+nomeLoja+"&nomeGrupo="+nomeGrupo+"&nomeCliente="+nomeCliente+"&funcao="+funcao,true);
    xmlhttp.send();  
}


function apagaGateway(tipo){

    verificarNomeLoja();

    if(tipo == "e1"){
        var displayText = document.getElementById("iTextGatewayE1").style.display;

        if(displayText == 'none') {
            var gateway = document.getElementById("iSlcGatewayE1").value;
            var id = document.getElementById("idGwE1").value;
            var funcao = "apagar";

            if(gateway != ""){
                if(!confirmDelete()) return;
            }
        }
    
    } else if(tipo == "fxs"){
        var displayText = document.getElementById("iTextGatewayFxs").style.display;

        if(displayText == 'none') {
            var gateway = document.getElementById("iSlcGatewayFxs").value;
            var id = document.getElementById("idGwFxs").value;
            var funcao = "apagar";

            if(gateway != ""){
                if(!confirmDelete()) return;
            }
        }

    } else if(tipo == "fxo"){
        var displayText = document.getElementById("iTextGatewayFxo").style.display;

        if(displayText == 'none') {
            var gateway = document.getElementById("iSlcGatewayFxo").value;
            var id = document.getElementById("idGwFxo").value;
            var funcao = "apagar";

            if(gateway != ""){
                if(!confirmDelete()) return;
            }
        }

    } else if(tipo == "gsm"){
        var displayText = document.getElementById("iTextGatewayGsm").style.display;

        if(displayText == 'none') {
            var gateway = document.getElementById("iSlcGatewayGsm").value;
            var id = document.getElementById("idGwGsm").value;
            var funcao = "apagar";

            if(gateway != ""){
                if(!confirmDelete()) return;
            }
        }

    } else {
        var gateway = "";
        var id = "";
        var funcao = "";
    }
    
    var nomeLoja = document.getElementById("iNomeLojaGateway").value;
    var nomeGrupo = document.getElementById("iNomeGrupoGateway").value;
    var nomeCliente = document.getElementById("iNomeClienteGateway").value; 

    var xmlhttp;
    if (window.XMLHttpRequest){

        xmlhttp = new XMLHttpRequest(); // caso TRUE, cria o objeto
                                        // XMLHttpRequest() onde sera realizado
                                        // a manipulação do AJAX
    } else {

        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){ 
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){

            // console.log(xmlhttp.responseText);
            document.getElementById("iResultGw").innerHTML = xmlhttp.responseText;
            document.getElementById("iResultGw").style.display = 'block';
            
            if(tipo == "e1"){   
                document.getElementById("iTextGatewayE1").style.display = 'none';
                document.getElementById("iSlcGatewayE1").style.display = 'block';
                exibeFieldsetGateway();
                buscarGatewayE1(nomeLoja, nomeGrupo, nomeCliente);
                
            
            } else if(tipo == "fxs"){   
                document.getElementById("iTextGatewayFxs").style.display = 'none';
                document.getElementById("iSlcGatewayFxs").style.display = 'block';
                exibeFieldsetGateway();
                buscarGatewayFxs(nomeLoja, nomeGrupo, nomeCliente);
                
            
            } else if(tipo == "fxo"){   
                document.getElementById("iTextGatewayFxo").style.display = 'none';
                document.getElementById("iSlcGatewayFxo").style.display = 'block';
                exibeFieldsetGateway();
                buscarGatewayFxo(nomeLoja, nomeGrupo, nomeCliente);
                
            
            } else if(tipo == "gsm"){   
                document.getElementById("iTextGatewayGsm").style.display = 'none';
                document.getElementById("iSlcGatewayGsm").style.display = 'block';
                exibeFieldsetGateway();
                buscarGatewayGsm(nomeLoja, nomeGrupo, nomeCliente);
                
            }
                     
        }
    }
    if(funcao != ""){
        xmlhttp.open("GET","http://localhost/intranet/modulos/ajax.modu.php?acao=cadastrarGateway&id="+id+"&gateway="+gateway+"&funcao="+funcao,true); 
        xmlhttp.send();
    }     
}

function exibeFieldsetGateway(){
    var e1 =  document.getElementById("iSlcGatewayE1").value;
    var fxs =  document.getElementById("iSlcGatewayFxs").value;
    var fxo =  document.getElementById("iSlcGatewayFxo").value;
    var gsm =  document.getElementById("iSlcGatewayGsm").value;

    if(e1 != "" || fxs != "" || fxo != "" || gsm != ""){
        document.getElementById("div_gw").style.display = 'block';
    } else {
        document.getElementById("div_gw").style.display = 'none';
    }
}

function buscarOutrosAcessos(loja, grupo, cliente){

    var xmlhttp;
    if (window.XMLHttpRequest){

        xmlhttp = new XMLHttpRequest(); // caso TRUE, cria o objeto
                                        // XMLHttpRequest() onde sera realizado
                                        // a manipulação do AJAX
    } else {

        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){ 
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){

            //console.log(xmlhttp.responseText);
            document.getElementById("iSlcOutrosAcessos").innerHTML = xmlhttp.responseText;

           var acessos = document.getElementById("iSlcOutrosAcessos").value;

            if(acessos != ""){
                document.getElementById("div_acesso").style.display = 'block';
                buscarCadastroOutrosAcessos(acessos, loja, grupo, cliente);
            } else {
                document.getElementById("iEndOutrosAcessos").value = "";
                document.getElementById("iUsuOutrosAcessos").value = "";
                document.getElementById("iSenhaOutrosAcessos").value = "";
                document.getElementById("iServidorOutrosAcessos").value = "";
                document.getElementById("div_acesso").style.display = 'none';
           }          
        }
    }
    xmlhttp.open("GET","http://localhost/intranet/modulos/ajax.modu.php?acao=buscarOutrosAcessos&nomeLoja="+loja+
    "&nomeGrupo="+grupo+"&nomeCliente="+cliente,true);   
    xmlhttp.send();
}

function buscarCadastroOutrosAcessos(acessos, loja, grupo, cliente){
    
    var xmlhttp;
    if (window.XMLHttpRequest){

        xmlhttp = new XMLHttpRequest(); // caso TRUE, cria o objeto
                                        // XMLHttpRequest() onde sera realizado
                                        // a manipulação do AJAX
    } else {

        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){ 
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){

            // console.log(xmlhttp.responseText);
            var array = JSON.parse(xmlhttp.responseText);
            //console.log(array);
            document.getElementById("idOutrosAcessos").value = array['id_acesso'];
            document.getElementById("iEndOutrosAcessos").value = array['ip_id_acesso'];
            document.getElementById("iUsuOutrosAcessos").value = array['usuario_acesso'];
            document.getElementById("iSenhaOutrosAcessos").value = array['senha_acesso'];
            document.getElementById("iServidorOutrosAcessos").value = array['local_acesso'];
        }
    }
    xmlhttp.open("GET","http://localhost/intranet/modulos/ajax.modu.php?acao=buscarCadAcesso&acessos="+acessos+"&nomeLoja="+loja+
    "&nomeGrupo="+grupo+"&nomeCliente="+cliente,true);
    xmlhttp.send();
}


function cadastroOutrosAcessos(){

    verificarNomeLoja();

    var displayText = document.getElementById("iTextOutrosAcessos").style.display;
    
    var id = document.getElementById("idOutrosAcessos").value;
    var endereco = document.getElementById("iEndOutrosAcessos").value;
    var usuario = document.getElementById("iUsuOutrosAcessos").value;
    var senha = document.getElementById("iSenhaOutrosAcessos").value;
    var servidor = document.getElementById("iServidorOutrosAcessos").value;

    var nomeLoja = document.getElementById("iNomeLojaOutrosAcessos").value;
    var nomeGrupo = document.getElementById("iNomeGrupoOutrosAcessos").value;
    var nomeCliente = document.getElementById("iNomeClienteOutrosAcessos").value;

    if(displayText == 'none') {
        var tipoAcessos = document.getElementById("iSlcOutrosAcessos").value;
        var funcao = "alterar";

    } else {
        var tipoAcessos = document.getElementById("iTextOutrosAcessos").value;
        var funcao = "cadastar";
    }

    var xmlhttp;
    if (window.XMLHttpRequest){

        xmlhttp = new XMLHttpRequest(); // caso TRUE, cria o objeto
                                        // XMLHttpRequest() onde sera realizado
                                        // a manipulação do AJAX
    } else {

        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){ 
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){

            //console.log(xmlhttp.responseText);
            document.getElementById("iResultOutrosAcessos").innerHTML = xmlhttp.responseText;
            document.getElementById("iResultOutrosAcessos").style.display = 'block';
            document.getElementById("iTextOutrosAcessos").style.display = 'none';
            document.getElementById("iSlcOutrosAcessos").style.display = 'block';
            buscarOutrosAcessos(nomeLoja, nomeGrupo, nomeCliente);
            
        }
    }
    xmlhttp.open("GET","http://localhost/intranet/modulos/ajax.modu.php?acao=cadastrarOutrosAcessos&acesso="+tipoAcessos+"&id="+id+"&endereco="+endereco+
    "&usuario="+usuario+"&senha="+senha+"&servidor="+servidor+"&nomeLoja="+nomeLoja+"&nomeGrupo="+nomeGrupo+"&nomeCliente="+nomeCliente+"&funcao="+funcao,true);
    xmlhttp.send();  
}

function apagaOutrosAcessos(){

    verificarNomeLoja();

    var displayText = document.getElementById("iTextOutrosAcessos").style.display;

    var nomeLoja = document.getElementById("iNomeLojaOutrosAcessos").value;
    var nomeGrupo = document.getElementById("iNomeGrupoOutrosAcessos").value;
    var nomeCliente = document.getElementById("iNomeClienteOutrosAcessos").value;

    if(displayText == 'none') {
        var acesso = document.getElementById("iSlcOutrosAcessos").value;
        var id = document.getElementById("idOutrosAcessos").value;
        var funcao = "apagar";
        if(acesso != ""){
            if(!confirmDelete()) return;
        }

    } else {
        var id = "";
        var funcao = "";
    }

    var xmlhttp;
    if (window.XMLHttpRequest){

        xmlhttp = new XMLHttpRequest(); // caso TRUE, cria o objeto
                                        // XMLHttpRequest() onde sera realizado
                                        // a manipulação do AJAX
    } else {

        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){ 
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){

            // console.log(xmlhttp.responseText);
            document.getElementById("iResultOutrosAcessos").innerHTML = xmlhttp.responseText;
            document.getElementById("iResultOutrosAcessos").style.display = 'block';
            document.getElementById("iResultOutrosAcessos").style.display = 'none';
            document.getElementById("iResultOutrosAcessos").style.display = 'block';
            buscarOutrosAcessos(nomeLoja, nomeGrupo, nomeCliente);         
        }
    }
    if(funcao != ""){
        xmlhttp.open("GET","http://localhost/intranet/modulos/ajax.modu.php?acao=cadastrarOutrosAcessos&id="+id+"&acesso="+acesso+"&funcao="+funcao,true); 
        xmlhttp.send();
    }     
}

function buscarCadastroLoja(loja, grupo, cliente){

    verificarNomeLoja();
    
    var xmlhttp;
    if (window.XMLHttpRequest){

        xmlhttp = new XMLHttpRequest(); // caso TRUE, cria o objeto
                                        // XMLHttpRequest() onde sera realizado
                                        // a manipulação do AJAX
    } else {

        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){ 
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){

            if(xmlhttp.responseText != ""){
                //console.log(xmlhttp.responseText);
                array = JSON.parse(xmlhttp.responseText);
                document.getElementById("idDadosLoja").value = array['id_loja'];
                document.getElementById("iEndDadosCadastrais").value = array['lograd_loja'];
                document.getElementById("iBairroDadosCadastrais").value = array['bairro_loja'];
                document.getElementById("iCidadeDadosCadastrais").value = array['cidade_loja'];
                document.getElementById("iCnpjDadosCadastrais").value = array['cnpj_loja'];
                document.getElementById("iRazaoSocialDadosCadastrais").value = array['rsoc_loja'];
                //exibeFieldsetCadastrosLoja();
            
            } else {
                document.getElementById("idDadosLoja").value = "";
                document.getElementById("iEndDadosCadastrais").value = "";
                document.getElementById("iBairroDadosCadastrais").value = "";
                document.getElementById("iCidadeDadosCadastrais").value = "";
                document.getElementById("iCnpjDadosCadastrais").value = "";
                document.getElementById("iRazaoSocialDadosCadastrais").value = "";
                //exibeFieldsetCadastrosLoja();
            }   
        }
    }
    xmlhttp.open("GET","http://localhost/intranet/modulos/ajax.modu.php?acao=buscarCadastroLoja&nomeLoja="+loja+
    "&nomeGrupo="+grupo+"&nomeCliente="+cliente,false);
    xmlhttp.send();  
}

function buscarCadastroContato(loja, grupo, cliente){

    verificarNomeLoja();
    
    var xmlhttp;
    if (window.XMLHttpRequest){

        xmlhttp = new XMLHttpRequest(); // caso TRUE, cria o objeto
                                        // XMLHttpRequest() onde sera realizado
                                        // a manipulação do AJAX
    } else {

        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){ 
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){

            //console.log(xmlhttp.responseText);
            var array = null;
            if(xmlhttp.responseText == ""){
                document.getElementById("idDadosContato").value = "";
                document.getElementById("iNomeContatoDadosCadastrais").value = "";
                document.getElementById("iTelefoneDadosCadastrais").value = "";
                document.getElementById("iEmailDadosCadastrais").value = "";
                document.getElementById("iCargoDadosCadastrais").value = "";
                document.getElementById("iRamalDadosCadastrais").value = "";
                //exibeFieldsetCadastrosLoja();
            
            } else {
                array = JSON.parse(xmlhttp.responseText);
                document.getElementById("idDadosContato").value = array['id_contato'];
                document.getElementById("iNomeContatoDadosCadastrais").value = array['nome_contato'];
                document.getElementById("iTelefoneDadosCadastrais").value = array['tel_contato'];
                document.getElementById("iEmailDadosCadastrais").value = array['email_contato'];
                document.getElementById("iCargoDadosCadastrais").value = array['cargo_contato'];
                document.getElementById("iRamalDadosCadastrais").value = array['ramal_contato'];
                //exibeFieldsetCadastrosLoja();
            }      
        }
    }
    xmlhttp.open("GET","http://localhost/intranet/modulos/ajax.modu.php?acao=buscarCadastroContato&nomeLoja="+loja+
    "&nomeGrupo="+grupo+"&nomeCliente="+cliente,false);
    xmlhttp.send();  
}

function exibeFieldsetCadastrosLoja(){
    //var idContato = document.getElementById("idDadosContato").value;
    var nome = document.getElementById("iNomeContatoDadosCadastrais").value;
    var tel = document.getElementById("iTelefoneDadosCadastrais").value;
    var email = document.getElementById("iEmailDadosCadastrais").value;
    var cargo = document.getElementById("iCargoDadosCadastrais").value;
    var ramal = document.getElementById("iRamalDadosCadastrais").value;

    //var idLoja = document.getElementById("idDadosLoja").value;
    var end = document.getElementById("iEndDadosCadastrais").value;
    var bairro = document.getElementById("iBairroDadosCadastrais").value;
    var cidade = document.getElementById("iCidadeDadosCadastrais").value;
    var cnpj = document.getElementById("iCnpjDadosCadastrais").value;
    var razao = document.getElementById("iRazaoSocialDadosCadastrais").value;

    if(nome == "" && tel == "" && email == "" && cargo == "" && ramal == "" && end == "" && bairro == "" && cidade == "" && cnpj == "" && razao == ""){
        document.getElementById("div_dados").style.display = 'none';
    } else {
        document.getElementById("div_dados").style.display = 'block';
    }
}


function cadastroDadosLOja(){

    verificarNomeLoja();
    
    var id = document.getElementById("idDadosLoja").value;

    var rua = document.getElementById("iEndDadosCadastrais").value;
    var bairro = document.getElementById("iBairroDadosCadastrais").value;
    var cidade = document.getElementById("iCidadeDadosCadastrais").value;
    var cnpj = document.getElementById("iCnpjDadosCadastrais").value;
    var razaoSocial = document.getElementById("iRazaoSocialDadosCadastrais").value;

    var nome = document.getElementById("iNomeContatoDadosCadastrais").value;
    var telefone = document.getElementById("iTelefoneDadosCadastrais").value;
    var email = document.getElementById("iEmailDadosCadastrais").value;
    var cargo = document.getElementById("iCargoDadosCadastrais").value;
    var ramal = document.getElementById("iRamalDadosCadastrais").value;

    var nomeLoja = document.getElementById("iNomeLojaDadosLoja").value;
    var nomeGrupo = document.getElementById("iNomeGrupoDadosLoja").value;
    var nomeCliente = document.getElementById("iNomeClienteDadosLoja").value;


    var xmlhttp;
    if (window.XMLHttpRequest){

        xmlhttp = new XMLHttpRequest(); // caso TRUE, cria o objeto
                                        // XMLHttpRequest() onde sera realizado
                                        // a manipulação do AJAX
    } else {

        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){ 
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){

            //console.log(xmlhttp.responseText);
            document.getElementById("iResultDadosLoja").innerHTML = xmlhttp.responseText;
            document.getElementById("iResultDadosLoja").style.display = 'block';
            buscarCadastroLoja(nomeLoja, nomeGrupo, nomeCliente);
            buscarCadastroContato(nomeLoja, nomeGrupo, nomeCliente);
        }
    }
    xmlhttp.open("GET","http://localhost/intranet/modulos/ajax.modu.php?acao=cadastroDadosLOja&id="+id+"&rua="+rua+"&bairro="+bairro+"&cidade="+cidade+
    "&cnpj="+cnpj+"&razaoSocial="+razaoSocial+"&nome="+nome+"&telefone="+telefone+"&email="+email+"&cargo="+cargo+"&ramal="+ramal+
    "&nomeLoja="+nomeLoja+"&nomeGrupo="+nomeGrupo+"&nomeCliente="+nomeCliente,true);
    xmlhttp.send();  
}


function buscarCadastroObsGeral(loja, grupo, cliente){

    verificarNomeLoja();
    
    var xmlhttp;
    if (window.XMLHttpRequest){

        xmlhttp = new XMLHttpRequest(); // caso TRUE, cria o objeto
                                        // XMLHttpRequest() onde sera realizado
                                        // a manipulação do AJAX
    } else {

        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){ 
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){

            //console.log(xmlhttp.responseText);
            var array = null;
            if(xmlhttp.responseText == ""){
                document.getElementById("idGeral").value = "";
                document.getElementById("iMesaGeral").checked = false;
                document.getElementById("iLicencaGeral").value = "";
                document.getElementById("iTelefoneIpGeral").checked = false;
                document.getElementById("iModeloGeral").value = "";
                document.getElementById("iIpGeral").value = "";
                document.getElementById("iG729Geral").checked = false;
                document.getElementById("iQtdCanaisGeral").value = "";
                document.getElementById("iRangerRamaisGeral").value = "";
                document.getElementById("iTextArea").value = "";
                //document.getElementById("div_geral").style.display = 'none';
            
            } else {
                array = JSON.parse(xmlhttp.responseText);
                document.getElementById("idGeral").value = array['id_obs'];
                document.getElementById("iMesaGeral").checked = array['possui_mesa_virtual_obs'];
                document.getElementById("iLicencaGeral").value = array['licenca_mesa_obs'];
                document.getElementById("iTelefoneIpGeral").checked = array['possui_tel_ip_obs'];
                document.getElementById("iModeloGeral").value = array['modelo_tel_obs'];
                document.getElementById("iIpGeral").value = array['ip_tel_obs'];
                document.getElementById("iG729Geral").checked = array['possui_g729'];
                document.getElementById("iQtdCanaisGeral").value = array['qtd_g729'];
                document.getElementById("iRangerRamaisGeral").value = array['rang_ramal_obs'];
                document.getElementById("iTextArea").value = rhtmlspecialchars(array['geral_obs']);
                //document.getElementById("div_geral").style.display = 'block';
            }      
        }
    }
    xmlhttp.open("GET","http://localhost/intranet/modulos/ajax.modu.php?acao=buscarCadastroObsGeral&nomeLoja="+loja+
    "&nomeGrupo="+grupo+"&nomeCliente="+cliente,false);
    xmlhttp.send();  
}


function cadastroObsGeral(){

    verificarNomeLoja();

    var id = document.getElementById("idGeral").value;

    var possuiMesa = document.getElementById("iMesaGeral").checked;
    var licenca = document.getElementById("iLicencaGeral").value;
    var possuiTelIp = document.getElementById("iTelefoneIpGeral").checked;
    var modelo = document.getElementById("iModeloGeral").value;
    var ip = document.getElementById("iIpGeral").value;
    var possuiG729 = document.getElementById("iG729Geral").checked;
    var qtdCanais = document.getElementById("iQtdCanaisGeral").value;
    var range = document.getElementById("iRangerRamaisGeral").value;

    //var obs = nl2br(document.getElementById("cMsg").value);
    //var obs = document.getElementById("cMsg").value;
    //var nicE = new nicEditors.findEditor(document.getElementById("iTextarea").value);
    var nicE = new nicEditors.findEditor("iTextArea");
    var obs = htmlspecialchars(nicE.getContent());
    var nomeLoja = document.getElementById("iNomeLojaGeral").value;
    var nomeGrupo = document.getElementById("iNomeGrupoGeral").value;
    var nomeCliente = document.getElementById("iNomeClienteGeral").value;


    var xmlhttp;
    if (window.XMLHttpRequest){

        xmlhttp = new XMLHttpRequest(); // caso TRUE, cria o objeto
                                        // XMLHttpRequest() onde sera realizado
                                        // a manipulação do AJAX
    } else {

        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){ 
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){

            //console.log(xmlhttp.responseText);
            document.getElementById("iResultGeral").innerHTML = xmlhttp.responseText;
            document.getElementById("iResultGeral").style.display = 'block';
            buscarCadastroObsGeral(nomeLoja, nomeGrupo, nomeCliente);
        }
    }

    xmlhttp.open("GET","http://localhost/intranet/modulos/ajax.modu.php?acao=cadastroObsGeral&id="+id+"&possuiMesa="+possuiMesa+"&licenca="+licenca+"&possuiTelIp="+possuiTelIp+
    "&modelo="+modelo+"&ip="+ip+"&possuiG729="+possuiG729+"&qtdCanais="+qtdCanais+"&range="+range+"&nomeLoja="+nomeLoja+"&nomeGrupo="+
    nomeGrupo+"&nomeCliente="+nomeCliente+"&obs="+obs,true);
    xmlhttp.send();  
}

function exibeFieldsetCadastroGeral(){
    //var id = document.getElementById("idGeral").value;
    var mesa = document.getElementById("iMesaGeral").checked;
    var licenca = document.getElementById("iLicencaGeral").value;
    var telIp = document.getElementById("iTelefoneIpGeral").checked;
    var model = document.getElementById("iModeloGeral").value;
    var ip = document.getElementById("iIpGeral").value;
    var codec = document.getElementById("iG729Geral").checked;
    var canais = document.getElementById("iQtdCanaisGeral").value;
    var range = document.getElementById("iRangerRamaisGeral").value;
    var obs = document.getElementById("iTextArea").value;

    if(mesa == false && licenca == "" && telIp == false && model == "" && ip == "" && codec == false && canais == "" && range == ""){
        if(obs == "<br>" || obs == ""){
            document.getElementById("div_geral").style.display = 'none';
        }else {
            document.getElementById("div_geral").style.display = 'block';
        }
        
    } else {
        document.getElementById("div_geral").style.display = 'block';
    }
}

function searchEvent(e){
    if(e.keyCode === 13){

        search();
    }
}

function search(){

    var texto = document.getElementById("cBusca").value;

    var xmlhttp;
    if (window.XMLHttpRequest){

        xmlhttp = new XMLHttpRequest(); // caso TRUE, cria o objeto
                                        // XMLHttpRequest() onde sera realizado
                                        // a manipulação do AJAX
    } else {

        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){ 
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){

            //console.log(xmlhttp.responseText);
         var array = JSON.parse(xmlhttp.responseText);
            console.log(array);
            var tableSearch = "<caption>Resultado da busca de clientes</caption><tbody><tr id=\"trTitulo\"><td class=\"cTitulo\">LOJA</td><td class=\"cTitulo\">GRUPO"+
                            "</td><td class=\"cTitulo\">CLIENTE</td class=\"cTitulo\"></tr>"

            for(var i = 0; i < array.length; i++){
                tableSearch += "<tr><td class=\"cTdSearch\" onclick=\"exibeCadastroLoja('"+array[i][0]+"', '"+array[i][1]+"', '"+array[i][2]+"')\">"+array[i][0]+"</td><td>"+array[i][1]+"</td><td>"+array[i][2]+"</td></tr>";
            }
            
            document.getElementById("search").innerHTML = tableSearch+"</tbody>";
            document.getElementById("cadastroClientes").style.display = "none";
            document.getElementById("cadDadosCliente").style.display = "none";
            document.getElementById("divSearch").style.display = "block";

        }
    }

    xmlhttp.open("GET","http://localhost/intranet/modulos/ajax.modu.php?acao=search&texto="+texto,false);
    xmlhttp.send();  
}

/*
function validar(){
    var login = document.getElementById('iLogin').value;
    var senha = document.getElementById('iSenha').value;
    if(login == "vdt" && senha == "senha"){
        document.getElementById('hider').style.display = "none";
    }
    document.getElementById('iLogin').value = "";
    document.getElementById('iSenha').value = "";
}
*/

function validar(){

    var login = document.getElementById('iLogin').value;
    var senha = document.getElementById('iSenha').value;
    var xmlhttp;

    if (window.XMLHttpRequest) xmlhttp = new XMLHttpRequest();
    else xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    
    xmlhttp.onreadystatechange = function(){ 
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){

            console.log(xmlhttp.responseText);
            if(xmlhttp.responseText){
                document.getElementById('hider').style.display = "none";
                document.getElementById('iLogin').value = "";
                document.getElementById('iSenha').value = "";
            } else {
                document.getElementById('iLogin').value = "";
                document.getElementById('iSenha').value = "";
            }
         
        }
    }
    xmlhttp.open("GET","http://localhost/intranet/modulos/ajax.modu.php?acao=validar&usuario="+login+"&senha="+senha,true);
    xmlhttp.send();  
}




function nl2br(str, is_xhtml) {
  var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br ' + '/>' : '<br>'; // Adjust comment to avoid issue on phpjs.org display

  return (str + '')
    .replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
}


function htmlspecialchars(str) {
    if (typeof(str) == "string") {
      str = str.replace(/"/g, "_aspas_");
      str = str.replace(/'/g, "_saspas_");
      str = str.replace(/#/g, "_sustenido_");
    }
    return str;
}

function rhtmlspecialchars(str) {
    if (typeof(str) == "string") {
      str = str.replace(/_aspas_/ig, '"');
      str = str.replace(/_saspas_/ig, "'");
      str = str.replace(/_sustenido_/ig, "#");
    }
    return str;
}


function adicionarNiceEditor(id){
    //var id = document.getElementById("iTextarea").value;
    niceEditor = new nicEditor({fullPanel : true}).panelInstance(id);
}

function removerNiceEditor(id){
    //var id = document.getElementById("iTextarea").value;
    if(niceEditor){
        niceEditor.removeInstance(id);
    }  
}


function exibeFieldset(valor){

   var nome = "#div_" + valor;
   
    $(nome).animate({
        height: 'toggle'
    });
}


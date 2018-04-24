<html>
<?php
error_reporting(0);

require       ('config/configSYS.php');
require      ('config/importFileXml.php');
require      ('dadosdi.php');

if ($numeroDI == 0){
    header('location:http://127.0.0.1/importDI-1.0/index.php?acao=errolog');
}
$nome = "masterdaweb";
$valor = $informacaoComplementar;
$expira = time() + 3600;
setcookie($nome, $valor, $expira);
$dolarValue = $_POST['dolarValue'];
echo'<head>

<script language="JavaScript">
function popitup(url) {
	newwindow=window.open(url,\'name\',\'height=800,width=900\');
	if (window.focus) {newwindow.focus()}
	return false;
}

</script>

    <title>DI - '.$numeroDI.'</title>
    <style>
        body{font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; color: #006666;}
        #formulario{position:absolute; top:10%; left:5%;}
        #detalhes{ width:50px; height:50px;background-image: url("images/edit.png");  background-size: 50px 50px;  color: #f2f2f2; padding:10px; border-radius:10px 10px 10px 10px; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif;  cursive;} #detalhes2{ width:50px; height:50px;background-image: url("images/viewer.png");  background-size: 50px 50px;  color: #f2f2f2; padding:10px; border-radius:10px 10px 10px 10px; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif;  cursive;}
        #buttonDiv{  float: right; position:relative;}
        #inputGigante{width: 980;  } #inputGrande{width: 450; }#inputMedio{width: 100; }#inputMini{width: 35px;} #inputGrande,#inputGigante, #inputMedio, #inputMini, #inputCalcMedio, #inputCalcMedio0, #inputCalcPequeno {border:none; border-radius:10px 10px 10px 10px; padding:5px; color: #5c8a8a;} #inputCalcMedio{width:140px;}#inputCalcPequeno{width:100px;}#inputCalcMedio0{width:100px;} #inputCalcMedio, #inputCalcMedio0, #inputCalcPequeno{text-align: center;}
        fieldset{ border: solid 1px #d1e0e0; padding-bottom: 20px;}
        #menuSuperior{z-index:10; background: #5e5e5e; color:#5bc0de; position: fixed; left: 0; top:0px; width: 100%; } li, ul{list-style-type:none;float: left; padding-right: 10px; } li {border-left: 1px solid #FFFFFF; padding-right: 10px; padding-left: 10px;}
        th{padding:8px;  background: #f2f2f2; position:relative; width:400px; text-align:justify; left:0px;} tr{padding:100px;} #thDetalhesPequeno{position:relative; width:74px; background:#f2f2f2;}#thDetalhesMedio{position:relative; width:50px; background:#f2f2f2;}#thDetalhesGrande{position:relative; width:820px; background:#f2f2f2;}#thCalcPequeno{width:50px;}  #thCalcMedio{ width:117px;}#thCalcMedio0{ width:141px; }
        a{text-decoration: none; color: #f2f2f2; } a:hover{color: #FFFFFF;}
    </style>
</head>
<body onunload="window.opener.location.reload();">
<div id="menuSuperior">
    <ul>
        <li><a href="index.php">Pagina Inicial</a></li>
        <li>Localzar DI</li>
    </ul>
</div>
<form method="post" action="gerenciador.php?acao=salvar" >
   <div id="formulario">
   <input type="hidden" name="nameFileToClean" value="'.$nome_final.'">
               <fieldset>
                   <legend>Dados do Importador:</legend>
                   <div id="inputPosition">
                      <table>
                      <tr><th>Codigo Tipo:<br><br><input id="inputGrande" type="text" name="importadorCodigoTipo" value="'.$importadorCodigoTipo.'"></th><th>CPF RepresentanteLegal:<br><br><input id="inputGrande" type="text" name="importadorCodigoTipo" value="'.$importadorCpfRepresentanteLegal.'"></th><th>Endereço Bairro:<br><br><input id="inputGrande" type="text" name="importadorEnderecoBairro" value="'.$importadorEnderecoBairro.'"></th></tr>
                      <tr><th>CEP:<br><br><input id="inputGrande" type="text" name="importadorEnderecoCep" value="'.$importadorEnderecoCep.'"></th><th>Endereço Logradouro:<br><br><input id="inputGrande" type="text" name="importadorEnderecoLogradouro" value="'.$importadorEnderecoLogradouro.'"></th><th>Endereço Municipio:<br><br><input id="inputGrande" type="text" name="importadorEnderecoMunicipio" value="'.$importadorEnderecoMunicipio.'"></th></tr>
                      <tr><th>Endereço Número:<br><br><input id="inputGrande" type="text" name="importadorEnderecoNumero" value="'.$importadorEnderecoNumero.'"></th><th>UF:<br><br><input id="inputGrande" type="text" name="importadorEnderecoUf" value="'.$importadorEnderecoUf.'"></th><th>Nome:<br><br><input id="inputGrande" type="text" name="importadorNome" value="'.$importadorNome.'"></th></tr>
                      <tr><th>Representante Legal:<br><br><input id="inputGrande" type="text" name="importadorNomeRepresentanteLegal" value="'.$importadorNomeRepresentanteLegal.'"></th><th>Numero:<br><br><input id="inputGrande" type="text" name="importadorNumero" value="'.$importadorNumero.'"></th><th>Telefone:<br><br><input id="inputGrande" type="text" name="importadorNumeroTelefone" value="'.$importadorNumeroTelefone.'"></th></tr>                   
                      <tr><th>Cotação do Dolar:<br><br><input id="inputGrande" type="text" name="dolarValue" value="'.$dolarValue.'"></th>              
                      </table><br>
                      <a  href="detalhes.php?acao=ViaLink"><button id="detalhes"></button></a>
                        
                     
                   <br>
                </fieldset>

';

require ('database/di/data_base_hidden2.php');
require ('adicao.php');
require ('database/di/data_base_hidden2.php');

// <a class="texto_preto" href="" onclick="window.open('detalhes.php','dd'); return false;"> click aqui para abrir a pop-up</a> 
?>
<div id="buttonDiv">
    <input type="submit" value="Salvar">
</div>
</form>
</div>
</html>



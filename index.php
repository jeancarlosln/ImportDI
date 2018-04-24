<!DOCTYPE html>
<?php
if($_REQUEST['acao'] == 'errolog'){
    echo'<script>alert("Não foi possível a leitura de dados, por favor tente novamente");</script>';
}
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Importar DI</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div id="topDiv">

</div>

    <form id="formINdex" method="post" action="viewerdoc.php" enctype="multipart/form-data">
        <div id="divFileImpot">
            <table>
            <h3>Importar DI</h3>
                <hr>
            <h4>Cotação do dolar:</h4>
            <input type="text" name="dolarValue" /><br>
            <h4>Selecione o arquivo XML:</h4>
            <input type="file" name="arquivo" /><br><br>
                <div id="buttonImport">
            <input type="reset" value="Remover" />
            <input type="submit" value="Importar" /><br>
                </div>
            </table>
        </div>


    </form>

</body>
</html>
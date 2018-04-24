<?php

if($_REQUEST['acao'] = ''){
    header('location:http://127.0.0.1/importDI-1.0/viewerdoc.php');
}
if($_REQUEST['acao'] = 'salvar' ) {
    $fileName = $_POST['nameFileToClean'];
    array_map('unlink', glob("\importDI-1.0\uploads\xml\.$fileName."));

    echo 'arquivo excluido com sucesso';
}
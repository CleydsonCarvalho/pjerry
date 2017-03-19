
<?php
require_once '../classes/TipoDespesas.php';

$db_tipoDespesas = new TipoDespesas ();

$acao = $_GET['acao'];

if(isset($acao) && $acao == "listarFornecedor"){
	
	$id = $_GET['id_fornecedor'];
	$despesas = $db_tipoDespesas->readLine($id);
	print json_encode($despesas);
}

//if(isset($acao) && $acao == "listarTodos"){

if(1==1){
	$tipoDespesas = $db_tipoDespesas->readAll();
	print json_encode($tipoDespesas);
}

?>



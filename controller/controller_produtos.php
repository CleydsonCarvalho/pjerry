
<?php
require_once '../classes/Fornecedor.php';

$db_fornecedor = new Fornecedor ();

$acao = $_GET['acao'];

if(isset($acao) && $acao == "listarFornecedor"){
	
	$id = $_GET['id_fornecedor'];
	$fornecedor = $db_fornecedor->readLine($id);
	print json_encode($fornecedor);
}

if(isset($acao) && $acao == "listarTodos"){

	$fornecedor = $db_fornecedor->readAll();
	print json_encode($fornecedor);
}

?>



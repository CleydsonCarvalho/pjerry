
<?php
require_once '../classes/Produtos.php';
require_once '../classes/Funcionario.php';


$db_produtos = new Produtos ();
$db_funcionarios = new Funcionario ();
	
if(isset($_GET['acao']) && $_GET['acao'] == "listarProdutos"){
	
	$produtos = $db_produtos->readProdutos();
	echo json_encode ($produtos); 
}


if(isset($_GET['acao']) && $_GET['acao'] == "lerProduto"){
$id = $_GET['id'];
	//$data = file_get_contents("php://input");
 	
 		// Cria um stdClass
		//$objData = json_decode($data);

		// Como objData passa a ser um objeto, vamos capturar apenas o parametro que queremos
		//$search = $objData->data;


	$produto = $db_produtos->lerProduto($id);
	echo json_encode ($produto); 
}

if(isset($_GET['acao']) && $_GET['acao'] == "buscarVendedores"){
	
	$funcionarios = $db_funcionarios->buscarVendedores();
	echo json_encode ($funcionarios); 
}




	




?>




<?php
require_once '../classes/Cliente.php';


$db_clientes = new Cliente ();
	

if(isset($_GET['acao']) && $_GET['acao'] == "listarClientes"){
	
	$clientes = $db_clientes->lerClientes();
	echo json_encode ($clientes); 
}


//if(isset($_GET['acao']) && $_GET['acao'] == "lerProduto"){
//$id = $_GET['id'];
	//$data = file_get_contents("php://input");
 	
 		// Cria um stdClass
		//$objData = json_decode($data);

		// Como objData passa a ser um objeto, vamos capturar apenas o parametro que queremos
		//$search = $objData->data;


	//$produto = $db_produtos->lerProduto($id);
	//echo json_encode ($produto); 
//}




	




?>



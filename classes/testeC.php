<?php
	
	require_once 'Produtos.php';
	$db_teste = new Produtos();



	//$sql = "SELECT produtos.nome FROM nome"; 
	//$result = $mysqli->query($sql);
	

// foreach($db_teste->readAll() as $key => $todos){ 
//$array = (array) $todos;


	//foreach($db_teste->readAll() as $key => $array){
		//$array = (array) $array;
	   // $json[] = $array['nome'];
	
	//}
$produtos = $db_teste->readProdutos();
	//foreach($produtos as $key => $ValueProdutos){
		//-$ValueProdutos = (array) $ValueProdutos;
	   // $todosProdutos[] = array('id_produto'=>$ValueProdutos->id_produto, 'nome' =>$ValueProdutos->nome);
		//}
var_dump()


//}


	
		
	print_r ($db_teste->readProdutos()); 




?>
	
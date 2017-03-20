
<?php
require_once '../classes/carro.php';

$db_carro = new Carro ();

$acao = $_GET['acao'];



if(isset($acao) && $acao == "listarTodos"){


	$carros = $db_carro->readAll();
	print json_encode($carros);
}

?>




<?php
require_once '../classes/TipoDespesas.php';

$db_tipoDespesas = new TipoDespesas ();

$acao = $_GET['acao'];


if(isset($acao) && $acao == "listarTodos"){


	$tipoDespesas = $db_tipoDespesas->readAll();
	print json_encode($tipoDespesas);
}

?>



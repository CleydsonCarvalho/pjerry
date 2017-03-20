
<?php
require_once '../classes/Funcionario.php';

$db_funcionario = new Funcionario ();

$acao = $_GET['acao'];


if(isset($acao) && $acao == "listarMotoristas"){


	$motoristas = $db_funcionario->buscarMotorista();
	print json_encode($motoristas);
}

?>



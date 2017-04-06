
<?php
require_once '../classes/Funcionario.php';

$funcionarios = new Funcionario ();

$acao = $_GET['acao'];

if(isset($acao) && $acao == "listarFuncionario"){

	$funcionarios = $funcionarios->readAll();
	print json_encode($funcionarios);
}

?>



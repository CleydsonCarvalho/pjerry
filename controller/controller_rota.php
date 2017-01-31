
<?php
require_once '../classes/Rota2.php';
require_once '../classes/Estados.php';

$db_rota = new Rotas ();
$db_estados = new Estados ();

//Recuperando objeto com dados do POST do angular
$dados =  json_decode(file_get_contents("php://input"));

//Convertendo objeto em Array
$POST = (array) $dados;

if(isset($POST[ 'acao' ]) && $POST[ 'acao' ] == "cadastrar"){
	
	$acao = $POST[ 'acao' ];
	//Removendo acao do POST
	$rota = array_diff( $POST, array($acao) );
	
	if ( $nColunas > 2 ) {
		$erro = 'sim';
		
	} else {
		$db_rota->create($rota);
	}
	
	print_r($rota);
}


$acao = $_GET['acao'];
if(isset($acao) && $acao == "listar"){
	
	$lista = $db_estados->readAll();
	
	print json_encode($lista);
}

?>



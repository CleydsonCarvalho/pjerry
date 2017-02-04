
<?php
require_once '../classes/Rota2.php';
require_once '../classes/Estados.php';

$db_rota = new Rotas ();
$db_estados = new Estados ();

//Recuperando objeto com dados do POST do angular
$dados =  json_decode(file_get_contents("php://input"));

//Convertendo objeto em Array
$POST = (array) $dados;
$acao = $_GET['acao'];

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

if(isset($acao) && $acao == "listarEstados"){
	
	$lista = $db_estados->readAll();
	
	print json_encode($lista);
}

if(isset($acao) && $acao == "listarRotas"){

	$dados = $db_rota->readAll(); 
		
	$count = count($dados);
		
		for($i=0;$i<$count;$i++){
			
		$value_rota = (array) $dados[$i];
		$idEstado=$value_rota['idEstado'];
		
		$dadosEstado = $db_estados->readLine($idEstado);
		$dadosEstado = (array) $dadosEstado;
		
		$dadosRotas[$i] = ["idRota"=>$value_rota['idRota'],"nome"=>$value_rota['nome'],"idEstado"=>$idEstado,
			  	  "estado"=>$dadosEstado['estado']];
	}
		
	print json_encode($dadosRotas);	
}

?>



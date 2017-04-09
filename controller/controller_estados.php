
<?php

require_once '../classes/Estados.php';



$db_estados = new Estados ();



if(isset($acao) && $acao == "listarEstados"){
	
	$lista = $db_estados->lerEstados();
	
	print json_encode($lista);
}



?>



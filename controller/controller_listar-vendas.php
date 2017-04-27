
<?php
require_once '../classes/Produtos.php';
require_once '../classes/Funcionario.php';
require_once '../classes/Cliente.php';
require_once '../classes/Vendas.php';
require_once '../classes/Produtos_Vendidos.php';
require_once '../classes/Rota.php';


$db_produtos = new Produtos ();
$db_funcionarios = new Funcionario ();
$db_venda = new Vendas ();
$db_produtos_vendidos = new Produtos_Vendidos ();
$db_clientes = new Cliente ();
$db_rota = new Rota ();



if ( isset($_GET['acao']) && $_GET['acao'] == 'listarVendas' ) {

	$vendas = $db_venda->readAll();
	
	$result = array();
	$count = count( $vendas );
	
	for ( $i = 0; $i < $count; $i++ ) {

		$vendaSelecionado = $vendas[ $i ];
		
		$cliente = $db_clientes->lerCliente($vendaSelecionado->id_cliente);
		$vendedor = $db_funcionarios->lerFuncionario ($vendaSelecionado->id_vendedor);
		$rota = $db_rota->lerRota ($vendaSelecionado->id_rota);

		$produto = Array(
			
			'id_venda' => $vendaSelecionado->id_venda,
			'id_cliente' => $vendaSelecionado->id_cliente,
			'nome_cliente' => $cliente->nome,
			'id_vendedor' => $vendaSelecionado->id_vendedor,
			'nome_vendedor' => $vendedor->nome,
			'data_venda' => $vendaSelecionado->data_venda,
			'id_rota' => $vendaSelecionado->id_rota,
			'nome_rota' => $rota->nome,
			'sub_total' => $vendaSelecionado->sub_total,
			'entrada' => $vendaSelecionado->entrada,
			'total' => $vendaSelecionado->total,
			
			'modo_pagamento' => $vendaSelecionado->modo_pagamento,
			'quantidade_parcelas' => $vendaSelecionado->quantidade_parcelas,
			'valor_prestacao' => $vendaSelecionado->valor_prestacao,
			'data_prestacao1' => $vendaSelecionado->data_prestacao1,
			'data_prestacao2' => $vendaSelecionado->data_prestacao2,
			'data_prestacao3' => $vendaSelecionado->data_prestacao3,
			'data_prestacao4' => $vendaSelecionado->data_prestacao4,
			'data_prestacao5' => $vendaSelecionado->data_prestacao5,
			'data_prestacao6' => $vendaSelecionado->data_prestacao6,
			'data_registro'	  => $vendaSelecionado->data_registro
		);


	array_push($result,$produto);
		
	};
	
	print json_encode( $result );
}

if ( isset($_GET['acao']) && $_GET['acao'] == 'buscarVendidos' ) {
	
	$vendidos = $db_produtos_vendidos->buscarVendidos( $_GET['id'] );

	
	$produtos = array();
	$count = count( $vendidos );
	
	for ( $i = 0; $i < $count; $i++ ) {

		$produtoSelecionado = $vendidos[ $i ];
		
		
		$produto = $db_produtos->produtoVendido ($produtoSelecionado->id_produto);
		

		$produtosprodutos = Array(
			
			'id_vendidos' => $produtoSelecionado->id_vendidos,
			'id_venda' => $produtoSelecionado->id_venda,
			'id_produto' => $produtoSelecionado->id_produto,
			'nome_produto' => $produto->nome,
			'valor_produto' => $produtoSelecionado->valor_produto,
			'quantidade' => $produtoSelecionado->quantidade,
			'total_produto' => $produtoSelecionado->total_produto
			
		);


	array_push($produtos, $produtosprodutos);
		
	};
	
	print json_encode ( $produtos );




}










	
if ( isset( $_GET[ 'acao' ] ) && $_GET[ 'acao' ] == "listarProdutos" ) {

	$produtos = $db_produtos->readProdutos();
	echo json_encode( $produtos );
}

if ( isset( $_GET[ 'acao' ] ) && $_GET[ 'acao' ] == "lerProduto" ) {

	$id = $_GET[ 'id' ];

	$produto = $db_produtos->lerProduto( $id );
	echo json_encode( $produto );
}

if ( isset( $_GET[ 'acao' ] ) && $_GET[ 'acao' ] == "buscarVendedores" ) {

	$funcionarios = $db_funcionarios->buscarVendedores();
	echo json_encode( $funcionarios );
}

if(isset($_GET['acao']) && $_GET['acao'] == "calcularParcelas"){

	$result = array();	
	// DATA PARA A PRIMEIRA PARCELA A PAGAR
/////////// ANO, MÊS, DIA
	
$DP =  explode ('-', $_GET['data']);

// QUANTIDADE DE PARCELAS
$parcelas = $_GET['parcelas'];

// ARRAY PARA AS DATAS
$data_array = $DP;
$data_array2 = $DP;


// ARMAZENANDO MÊS DA DATA MENOS 1
$n = $data_array[ 1 ] - 1;
$v_i = $n;


// FOR PRINCIPAL
for ( $i = 0; $i < $parcelas; $i++ ) {
	$v_i++;

	// BASE PARA SOMAR OS MESES
	$v = strtotime( '+' . $i . ' month', strtotime( implode( "-", $data_array ) ) );
	$v2 = strtotime( '+' . $i . ' month', strtotime( implode( "-", $data_array2 ) ) );
	$nd = date( 'Y-m-d', $v );
	$nd2 = date( 'Y-m-d', $v2 );

	// PEDAÇOS DA DATA DO LAÇO
	$p = explode( "-", $nd );

	// ATÉ 12 MÊSES
	if ( $v_i <= 12 ) {

		// BASE DO MÊS ATUAL
		$base_mes = date( "Y-m-t", strtotime( $nd ) );

		// PEGANDO O ÚLTIMO DIA DO MÊS DO LAÇO
		$forma_data = $p[ 0 ] . '-' . $v_i . '-01';
		$ultimo_dia_do_mes = date( "Y-m-t", strtotime( $forma_data ) );
		$b1 = explode( "-", $base_mes ); // EXPLODE DO BASE MES
		$b2 = explode( "-", $ultimo_dia_do_mes ); // EXPLODE DO ULTIMO DIA DO MÊS

		if ( $b1[ 2 ] != $b2[ 2 ] ) {
			$demo =  "{$b2[0]}-{$b2[1]}-{$b2[2]}";
		} else {
			$demo =  "{$b1[0]}-{$b1[1]}-{$data_array[2]}";
		}
		
		array_push( $result, $demo );
			//

	}
	// ATÉ 12 MÊSES

	// DE 12 À 24 MESES
	elseif ( $v_i > 12 && $v_i <= 24 ) {

			// BASE DO MÊS ATUAL
			$base_mes = date( "Y-m-t", strtotime( $nd ) );

			// PEGANDO O ÚLTIMO DIA DO MÊS DO LAÇO
			$forma_data = $p[ 0 ] . '-' . ( $v_i - 12 ) . '-01';
			$ultimo_dia_do_mes = date( "Y-m-t", strtotime( $forma_data ) );
			$b1 = explode( "-", $base_mes ); // EXPLODE DO BASE MES
			$b2 = explode( "-", $ultimo_dia_do_mes ); // EXPLODE DO ULTIMO DIA DO MÊS

			if ( $b1[ 2 ] != $b2[ 2 ] ) {
				$demo =  "{$b2[0]}-{$b2[1]}-{$b2[2]}";
			} else {
				$demo =  "{$b1[0]}-{$b1[1]}-{$data_array[2]}";
			}
array_push( $result, $demo );
		}
		// DE 12 À 24 MESES

	

	else {
		
	} // FIM DO ELSEIF
} // FIM DO FOR PRINCIPAL
	print json_encode($result);
}

if ( isset( $_GET[ 'acao' ] ) && $_GET[ 'acao' ] == "cadastrarVenda" ) {

	$micro_date = microtime();
	$date_array = explode( " ", $micro_date );
	$date_dd = explode( ".", $date_array[ 0 ] );
	$ms = explode( "00", $date_dd[ 1 ] )[ 0 ];
	$data = date( "Y-m-d H:i:s.$ms" );

	$dadosVenda = json_decode( file_get_contents( "php://input" ) );

	if ( $dadosVenda->quantidade_parcelas == 0 ) {

		$venda = Array(
			'id_cliente' => $dadosVenda->id_cliente,
			'id_vendedor' => $dadosVenda->id_vendedor,
			'data_venda' => $dadosVenda->data_venda,
			'id_rota' => $dadosVenda->id_rota,
			'sub_total' => $dadosVenda->sub_total,
			'entrada' => $dadosVenda->entrada,
			'total' => $dadosVenda->total,
			'modo_pagamento' => $dadosVenda->modo_pagamento,

			'quantidade_parcelas' => $dadosVenda->quantidade_parcelas,
			'data_registro' => $data
		);
	}
	
	elseif ( $dadosVenda->quantidade_parcelas == 1 ) {

			$venda = Array(
				'id_cliente' => $dadosVenda->id_cliente,
				'id_vendedor' => $dadosVenda->id_vendedor,
				'data_venda' => $dadosVenda->data_venda,
				'id_rota' => $dadosVenda->id_rota,
				'sub_total' => $dadosVenda->sub_total,
				'entrada' => $dadosVenda->entrada,
				'total' => $dadosVenda->total,
				'modo_pagamento' => $dadosVenda->modo_pagamento,

				'quantidade_parcelas' => $dadosVenda->quantidade_parcelas,
				'valor_prestacao' => $dadosVenda->valor_prestacao,
				'data_prestacao1' => $dadosVenda->data_prestacao1,
				'data_registro' => $data

			);		
	}
	
	elseif ( $dadosVenda->quantidade_parcelas == 2 ) {

			$venda = Array(
				'id_cliente' => $dadosVenda->id_cliente,
				'id_vendedor' => $dadosVenda->id_vendedor,
				'data_venda' => $dadosVenda->data_venda,
				'id_rota' => $dadosVenda->id_rota,
				'sub_total' => $dadosVenda->sub_total,
				'entrada' => $dadosVenda->entrada,
				'total' => $dadosVenda->total,
				'modo_pagamento' => $dadosVenda->modo_pagamento,

				'quantidade_parcelas' => $dadosVenda->quantidade_parcelas,
				'valor_prestacao' => $dadosVenda->valor_prestacao,
				'data_prestacao1' => $dadosVenda->data_prestacao1,
				'data_prestacao2' => $dadosVenda->data_prestacao2,
				'data_registro' => $data

			);	
	}
	
	elseif($dadosVenda->quantidade_parcelas ==3){
		
		$venda = Array(
			'id_cliente' => $dadosVenda->id_cliente,
			'id_vendedor' => $dadosVenda->id_vendedor,
			'data_venda' => $dadosVenda->data_venda,
			'id_rota' => $dadosVenda->id_rota,
			'sub_total' => $dadosVenda->sub_total,
			'entrada' => $dadosVenda->entrada,
			'total' => $dadosVenda->total,
			'modo_pagamento' => $dadosVenda->modo_pagamento,

			'quantidade_parcelas' => $dadosVenda->quantidade_parcelas,
			'valor_prestacao' => $dadosVenda->valor_prestacao,
			'data_prestacao1' => $dadosVenda->data_prestacao1,
			'data_prestacao2' => $dadosVenda->data_prestacao2,
			'data_prestacao3' => $dadosVenda->data_prestacao3,
			'data_registro' => $data

		);
	}
	
	elseif($dadosVenda->quantidade_parcelas ==4){
		
		$venda = Array(
			'id_cliente' => $dadosVenda->id_cliente,
			'id_vendedor' => $dadosVenda->id_vendedor,
			'data_venda' => $dadosVenda->data_venda,
			'id_rota' => $dadosVenda->id_rota,
			'sub_total' => $dadosVenda->sub_total,
			'entrada' => $dadosVenda->entrada,
			'total' => $dadosVenda->total,
			'modo_pagamento' => $dadosVenda->modo_pagamento,

			'quantidade_parcelas' => $dadosVenda->quantidade_parcelas,
			'valor_prestacao' => $dadosVenda->valor_prestacao,
			'data_prestacao1' => $dadosVenda->data_prestacao1,
			'data_prestacao2' => $dadosVenda->data_prestacao2,
			'data_prestacao3' => $dadosVenda->data_prestacao3,
			'data_prestacao4' => $dadosVenda->data_prestacao4,
			'data_registro' => $data

		);	
	}
	
	elseif($dadosVenda->quantidade_parcelas ==5){
		
		$venda = Array(
			'id_cliente' => $dadosVenda->id_cliente,
			'id_vendedor' => $dadosVenda->id_vendedor,
			'data_venda' => $dadosVenda->data_venda,
			'id_rota' => $dadosVenda->id_rota,
			'sub_total' => $dadosVenda->sub_total,
			'entrada' => $dadosVenda->entrada,
			'total' => $dadosVenda->total,
			'modo_pagamento' => $dadosVenda->modo_pagamento,

			'quantidade_parcelas' => $dadosVenda->quantidade_parcelas,
			'valor_prestacao' => $dadosVenda->valor_prestacao,
			'data_prestacao1' => $dadosVenda->data_prestacao1,
			'data_prestacao2' => $dadosVenda->data_prestacao2,
			'data_prestacao3' => $dadosVenda->data_prestacao3,
			'data_prestacao4' => $dadosVenda->data_prestacao4,
			'data_prestacao5' => $dadosVenda->data_prestacao5,
			'data_registro' => $data

		);
	}
	
	elseif($dadosVenda->quantidade_parcelas ==6){
		
		$venda = Array(
			'id_cliente' => $dadosVenda->id_cliente,
			'id_vendedor' => $dadosVenda->id_vendedor,
			'data_venda' => $dadosVenda->data_venda,
			'id_rota' => $dadosVenda->id_rota,
			'sub_total' => $dadosVenda->sub_total,
			'entrada' => $dadosVenda->entrada,
			'total' => $dadosVenda->total,
			'modo_pagamento' => $dadosVenda->modo_pagamento,

			'quantidade_parcelas' => $dadosVenda->quantidade_parcelas,
			'valor_prestacao' => $dadosVenda->valor_prestacao,
			'data_prestacao1' => $dadosVenda->data_prestacao1,
			'data_prestacao2' => $dadosVenda->data_prestacao2,
			'data_prestacao3' => $dadosVenda->data_prestacao3,
			'data_prestacao4' => $dadosVenda->data_prestacao4,
			'data_prestacao5' => $dadosVenda->data_prestacao5,
			'data_prestacao6' => $dadosVenda->data_prestacao6,
			'data_registro' => $data

		);	
	}
	
	else {echo "Deu erro";};

	$db_venda->create( $venda );

	$id_venda = $db_venda->buscarVenda( $data );

	echo json_encode( $id_venda );
}

if ( isset( $_GET[ 'acao' ] ) && $_GET[ 'acao' ] == "cadastrarProdutos" ) {

	$idd_venda = $_GET[ 'id_venda' ];
	$dadosProduto = json_decode( file_get_contents( "php://input" ) );

	$count = count( $dadosProduto );
	for ( $i = 0; $i < $count; $i++ ) {

		$produtoSelecionado = $dadosProduto[ $i ];

		$produto = Array(
			'id_venda' => $idd_venda,
			'id_produto' => $produtoSelecionado->id_produto,
			'valor_produto' => $produtoSelecionado->preco,
			'quantidade' => $produtoSelecionado->quantidade,
			'total_produto' => $produtoSelecionado->total
		);

		$db_produtos_vendidos->create( $produto );
		$prod = $db_produtos->lerProduto($produtoSelecionado->id_produto)[0];
		$produtoSub = $prod->quantidade - $produtoSelecionado->quantidade;
		$db_produtos->atualizar_estoque($produtoSelecionado->id_produto, $produtoSub);
		$prod = $db_produtos->lerProduto($produtoSelecionado->id_produto)[0];
		print_r( $prod );
	};

}

?>



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

if ( isset($_GET['acao']) && $_GET['acao'] == 'buscarVendaId' ) {

	$id = $_GET['id'];
	
	$venda = $db_venda->buscarVendaId( $id );
	
	print json_encode ( $venda );
}

if ( isset( $_GET[ 'acao' ] ) && $_GET[ 'acao' ] == "listarProdutos" ) {

	$produtos = $db_produtos->readProdutos();
	echo json_encode( $produtos );
}

if ( isset( $_GET[ 'acao' ] ) && $_GET[ 'acao' ] == "atualizarProduto" ) {

	$id = $_GET[ 'id' ];
	$produtoForm = json_decode( file_get_contents( "php://input" ) );
	$id_vendidos = $produtoForm->id_vendidos;

	$id_produto = $produtoForm->id_produto;

	$quantidade = $produtoForm->quantidade;

	$produto_anterior = $produtoForm->produto_anterior;
	$quantidade_anterior = $produtoForm->quantidade_anterior;

	$produtoAnterior = $db_produtos->readProduto($produto_anterior);
	$quantProd = $produtoAnterior->quantidade;

	if ($id_produto == $produto_anterior && $quantidade == $quantidade_anterior){
			
			echo json_encode( 'O produto não foi alterado!');
	}

	elseif ($id_produto == $produto_anterior && $quantidade == 0) {

		
		$updateQuantidade = $quantProd + $quantidade_anterior;

		$db_produtos->atualizar_estoque($produto_anterior, $updateQuantidade);
		$db_produtos_vendidos->delete($id_vendidos);

	$produtos_vendidos = $db_produtos_vendidos->buscarVendidos ($produtoForm->id_venda);
	$venda = $db_venda->readLine($produtoForm->id_venda);

	$entrada = $venda->entrada;
	$parcelas = $venda->quantidade_parcelas;
	$sub_total = 0;
	$total = 0;

	foreach ($produtos_vendidos as $produto) {

		$sub_total += $produto->total_produto;
	}

	$total = $sub_total - $entrada;

	if ($parcelas == 0){
		$v_prestação = 0;
	}
	else{  $v_prestação = $total / $parcelas;}
	
	$venda = array(  'id_venda' => $venda->id_venda,
				     'id_cliente' => $venda->id_cliente,
					 'id_vendedor' => $venda->id_vendedor,
					 'data_venda' => $venda->data_venda,
					 'id_rota' => $venda->id_rota,
					 'sub_total' => $sub_total,
	      			 'entrada' => $venda->entrada,
					 'total' => $total,
					 'modo_pagamento' => $venda->modo_pagamento,
					 'quantidade_parcelas' => $venda->quantidade_parcelas,
					 'valor_prestacao' => $v_prestação,
					 'data_prestacao1' => $venda->data_prestacao1,
					 'data_prestacao2' => $venda->data_prestacao2,
					 'data_prestacao3' => $venda->data_prestacao3,
					 'data_registro' => $venda->data_registro
	 );

		$db_venda->update($venda);
		
		print json_encode($venda);		
	}

	elseif ($id_produto == $produto_anterior && $quantidade > $quantidade_anterior) {

		$novaQuantidade = $quantidade - $quantidade_anterior;
		
		if ($quantProd >= $novaQuantidade) {

			$updateQuantidade = $quantProd - $novaQuantidade;

			$db_produtos->atualizar_estoque($produto_anterior, $updateQuantidade);

			$produto = Array(
				'id_vendidos'=> $produtoForm->id_vendidos,
				'id_venda' => $produtoForm->id_venda,
				'id_produto' => $produtoForm->id_produto,
				'valor_produto' => $produtoForm->valor_produto,
				'quantidade' => $produtoForm->quantidade,
				'total_produto' => $produtoForm->total_produto
			);

			$db_produtos_vendidos->atualizar($produto);
			echo json_encode( 'Atualizou quantidade maior');
		}
		else {

			echo json_encode( 'Não Pode Alterar');
		}
	}

	elseif ($id_produto == $produto_anterior && $quantidade < $quantidade_anterior) {

		$novaQuantidade = $quantidade_anterior - $quantidade;
		$updateQuantidade = $quantProd + $novaQuantidade;

		$db_produtos->atualizar_estoque($produto_anterior, $updateQuantidade);

		$produto = Array(
				'id_vendidos'=> $produtoForm->id_vendidos,
				'id_venda' => $produtoForm->id_venda,
				'id_produto' => $produtoForm->id_produto,
				'valor_produto' => $produtoForm->valor_produto,
				'quantidade' => $produtoForm->quantidade,
				'total_produto' => $produtoForm->total_produto
			);

		$db_produtos_vendidos->atualizar($produto);
		echo json_encode( 'Atualizou quantidade menor');
		
	}
	elseif ($id_produto != $produto_anterior) {







		$updateQuantidade = $quantProd + $quantidade_anterior;

		

		$produtoNovo = $db_produtos->readProduto($id_produto);


		if ($produtoNovo->quantidade >= $quantidade) {

			$updateQuantidade = $quantProd + $quantidade_anterior;

			$db_produtos->atualizar_estoque($produto_anterior, $updateQuantidade);

			$updateQuantidade = $produtoNovo->quantidade - $quantidade;
			$db_produtos->atualizar_estoque($id_produto, $updateQuantidade);

			$produto = Array(
				'id_vendidos'=> $produtoForm->id_vendidos,
				'id_venda' => $produtoForm->id_venda,
				'id_produto' => $produtoForm->id_produto,
				'valor_produto' => $produtoForm->valor_produto,
				'quantidade' => $produtoForm->quantidade,
				'total_produto' => $produtoForm->total_produto
			);

			$db_produtos_vendidos->atualizar($produto);
			echo json_encode( 'Atualizou Produto Diferente');
		}
		else {

			echo json_encode( 'Não Pode Alterar');
		}

		
	}
	
	else{

		echo json_encode( "Erro ao validar o produto");
	}

	//echo json_encode( $quantProd);
}

if ( isset( $_GET[ 'acao' ] ) && $_GET[ 'acao' ] == "deletarProduto" ) {

	$id = $_GET[ 'id' ];
	$produtoForm = json_decode( file_get_contents( "php://input" ) );

	$id_produto = $produtoForm->id_produto;

	$quantidade = $produtoForm->quantidade;

	$produtoNovo = $db_produtos->readProduto($id_produto);

	$novaQuantidade = $produtoNovo->quantidade;

	$updateQuantidade = $novaQuantidade + $quantidade;

	$db_produtos->atualizar_estoque($id_produto, $updateQuantidade);

	$produtos = $db_produtos_vendidos->delete($id);










	$produtos_vendidos = $db_produtos_vendidos->buscarVendidos ($produtoForm->id_venda);
	$venda = $db_venda->readLine($produtoForm->id_venda);

	$entrada = $venda->entrada;
	$parcelas = $venda->quantidade_parcelas;
	$sub_total = 0;
	$total = 0;

	foreach ($produtos_vendidos as $produto) {

		$sub_total += $produto->total_produto;

	}

	$total = $sub_total - $entrada;

	if ($parcelas == 0){
		$v_prestação = 0;

	}else{$v_prestação = $total / $parcelas;}
	

	$venda = array(  'id_venda' => $venda->id_venda,
				     'id_cliente' => $venda->id_cliente,
					 'id_vendedor' => $venda->id_vendedor,
					 'data_venda' => $venda->data_venda,
					 'id_rota' => $venda->id_rota,
					 'sub_total' => $sub_total,
	      			 'entrada' => $venda->entrada,
					 'total' => $total,
					 'modo_pagamento' => $venda->modo_pagamento,
					 'quantidade_parcelas' => $venda->quantidade_parcelas,
					 'valor_prestacao' => $v_prestação,
					 'data_prestacao1' => $venda->data_prestacao1,
					 'data_prestacao2' => $venda->data_prestacao2,
					 'data_prestacao3' => $venda->data_prestacao3,
					 'data_registro' => $venda->data_registro
	 );


	$db_venda->update($venda);
		
		//print json_encode($venda);	








	
	echo json_encode( $venda );
}

if ( isset( $_GET[ 'acao' ] ) && $_GET[ 'acao' ] == "lerProduto" ) {

	$id = $_GET[ 'id' ];

	$produto = $db_produtos->readProduto($id);
	echo json_encode( $produto );
}

if ( isset( $_GET[ 'acao' ] ) && $_GET[ 'acao' ] == "adicionarProduto" ) {

	
	$dadosProduto = json_decode( file_get_contents( "php://input" ) );

	$id = $dadosProduto->id_produto;
	$id_venda = $dadosProduto->id_venda;

	$produtoSelecionado = $db_produtos->readProduto($id);
	$quantidadeUpdate = $produtoSelecionado->quantidade - $dadosProduto->quantidade;
	$db_produtos->atualizar_estoque($id, $quantidadeUpdate);

	
	$dadosProduto = (array) $dadosProduto;
	$db_produtos_vendidos->create( $dadosProduto );

	$produtos_vendidos = $db_produtos_vendidos->buscarVendidos ($id_venda);
	$venda = $db_venda->readLine($id_venda);

	$entrada = $venda->entrada;
	$parcelas = $venda->quantidade_parcelas;
	$sub_total = 0;
	$total = 0;

	

	foreach ($produtos_vendidos as $produto) {

		$sub_total += $produto->total_produto;

	}

	$total = $sub_total - $entrada;

	if ($parcelas == 0){
		$v_prestação = 0;

	}

	else{  $v_prestação = $total / $parcelas;}
	

	$venda = array(  'id_venda' => $venda->id_venda,
				     'id_cliente' => $venda->id_cliente,
					 'id_vendedor' => $venda->id_vendedor,
					 'data_venda' => $venda->data_venda,
					 'id_rota' => $venda->id_rota,
					 'sub_total' => $sub_total,
	      			 'entrada' => $venda->entrada,
					 'total' => $total,
					 'modo_pagamento' => $venda->modo_pagamento,
					 'quantidade_parcelas' => $venda->quantidade_parcelas,
					 'valor_prestacao' => $v_prestação,
					 'data_prestacao1' => $venda->data_prestacao1,
					 'data_prestacao2' => $venda->data_prestacao2,
					 'data_prestacao3' => $venda->data_prestacao3,
					 'data_registro' => $venda->data_registro
	 );






	$db_venda->update($venda);
		
	
		print json_encode($venda);	
}

if( isset( $_GET[ 'acao' ] ) && $_GET[ 'acao' ] == "deletarVenda" ){

	$id = $_GET[ 'id' ];

	$venda = $db_venda->buscarVendaId($id);
	$produtoVendidos = $db_produtos_vendidos->buscarVendidos($id);

	foreach ($produtoVendidos as $produto) {

		
		$id_venda = $produto->id_venda;
		$id_produto = $produto->id_produto;
		$quantidade_produto = $produto->quantidade;
		$id_vendidos = $produto->id_vendidos;

		$produtoSelecionado = $db_produtos->readProduto($id_produto);
		$quantidadeUpdate = $produtoSelecionado->quantidade + $quantidade_produto;

		$db_produtos_vendidos->delete($id_vendidos);
		$db_produtos->atualizar_estoque($id_produto, $quantidadeUpdate);

		$db_venda->delete($id_venda);




		
	}

	
print_r( 'A venda com id '.$id_venda. ' foi deletada com sucesso!');
	
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
			'valor_prestacao' => 0,
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
				'valor_prestacao' => $dadosVenda->valor_prestacao,
				'quantidade_parcelas' => $dadosVenda->quantidade_parcelas,
				'data_registro' => $data,

				'data_prestacao1' => $dadosVenda->data_prestacao1

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
				'valor_prestacao' => $dadosVenda->valor_prestacao,
				'quantidade_parcelas' => $dadosVenda->quantidade_parcelas,
				'data_registro' => $data,

				'data_prestacao1' => $dadosVenda->data_prestacao1,
				'data_prestacao2' => $dadosVenda->data_prestacao2
			

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
				'valor_prestacao' => $dadosVenda->valor_prestacao,
				'quantidade_parcelas' => $dadosVenda->quantidade_parcelas,
				'data_registro' => $data,

				'data_prestacao1' => $dadosVenda->data_prestacao1,
				'data_prestacao2' => $dadosVenda->data_prestacao2,
				'data_prestacao3' => $dadosVenda->data_prestacao3
			
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


<?php

// DATA PARA A PRIMEIRA PARCELA A PAGAR
/////////// ANO, MÊS, DIA
$DP = Array( 2017, 03, 31 );

// QUANTIDADE DE PARCELAS
$parcelas = 18;

// ARRAY PARA AS DATAS
$data_array = Array( $DP[ 0 ], $DP[ 1 ], $DP[ 2 ] );
$data_array2 = Array( $DP[ 0 ], $DP[ 1 ], $DP[ 2 ] );


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
			echo "{$b2[0]}-{$b2[1]}-{$b2[2]}<br>";
		} else {
			echo "{$b1[0]}-{$b1[1]}-{$data_array[2]}<br>";
		}

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
				echo "{$b2[0]}-{$b2[1]}-{$b2[2]}<br>";
			} else {
				echo "{$b1[0]}-{$b1[1]}-{$data_array[2]}<br>";
			}

		}
		// DE 12 À 24 MESES

	// DE 24 À 36 MESES
	elseif ( $v_i > 24 && $v_i <= 36 ) {

			// BASE DO MÊS ATUAL
			$base_mes = date( "Y-m-t", strtotime( $nd ) );

			// PEGANDO O ÚLTIMO DIA DO MÊS DO LAÇO
			$forma_data = $p[ 0 ] . '-' . ( $v_i - 24 ) . '-01';
			$ultimo_dia_do_mes = date( "Y-m-t", strtotime( $forma_data ) );
			$b1 = explode( "-", $base_mes ); // EXPLODE DO BASE MES
			$b2 = explode( "-", $ultimo_dia_do_mes ); // EXPLODE DO ULTIMO DIA DO MÊS

			if ( $b1[ 2 ] != $b2[ 2 ] ) {
				echo "{$b2[0]}-{$b2[1]}-{$b2[2]}<br>";
			} else {
				echo "{$b1[0]}-{$b1[1]}-{$data_array[2]}<br>";
			}

		}
		// DE 24 À 36 MESES

	// DE 36 À 48 MESES
	elseif ( $v_i > 36 && $v_i <= 48 ) {

			// BASE DO MÊS ATUAL
			$base_mes = date( "Y-m-t", strtotime( $nd ) );

			// PEGANDO O ÚLTIMO DIA DO MÊS DO LAÇO
			$forma_data = $p[ 0 ] . '-' . ( $v_i - 36 ) . '-01';
			$ultimo_dia_do_mes = date( "Y-m-t", strtotime( $forma_data ) );
			$b1 = explode( "-", $base_mes ); // EXPLODE DO BASE MES
			$b2 = explode( "-", $ultimo_dia_do_mes ); // EXPLODE DO ULTIMO DIA DO MÊS

			if ( $b1[ 2 ] != $b2[ 2 ] ) {
				echo "{$b2[0]}-{$b2[1]}-{$b2[2]}<br>";
			} else {
				echo "{$b1[0]}-{$b1[1]}-{$data_array[2]}<br>";
			}

		}
		// DE 36 À 48 MESES

	// DE 48 À 60 MESES
	elseif ( $v_i > 48 && $v_i <= 60 ) {

			// BASE DO MÊS ATUAL
			$base_mes = date( "Y-m-t", strtotime( $nd ) );

			// PEGANDO O ÚLTIMO DIA DO MÊS DO LAÇO
			$forma_data = $p[ 0 ] . '-' . ( $v_i - 48 ) . '-01';
			$ultimo_dia_do_mes = date( "Y-m-t", strtotime( $forma_data ) );
			$b1 = explode( "-", $base_mes ); // EXPLODE DO BASE MES
			$b2 = explode( "-", $ultimo_dia_do_mes ); // EXPLODE DO ULTIMO DIA DO MÊS

			if ( $b1[ 2 ] != $b2[ 2 ] ) {
				echo "{$b2[0]}-{$b2[1]}-{$b2[2]}<br>";
			} else {
				echo "{$b1[0]}-{$b1[1]}-{$data_array[2]}<br>";
			}

		}
		// DE 48 À 60 MESES

	else {} // FIM DO ELSEIF
} // FIM DO FOR PRINCIPAL
?>
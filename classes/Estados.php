<?php
require_once('DB.php');
class Estados {

    protected $table = 'estados';
		
	public function create( $criar ) {
		// PEGA OS INDICES DO ARRAY
		$indices = array_keys( $criar );
		// PEGA OS VALORES DO ARRAY  
		$valores = array_values( $criar );
		// TRANSFORMA PRO FORMATO DE QUERY = nome, email, etc
		$k = implode( ',', array_values( $indices ) );
		// TRANSFORMA PRO FORMATO DE QUERY = :nome, :email, :etc
		$v = ':' . implode( ',:', array_values( $indices ) );
		// COMBINA OS ARRAYS PARA GERAR OS BINDPARAM
		$params = array_combine( $indices, $valores );		
		$sql = "INSERT INTO $this->table ($k) VALUES ($v)";
		$stmt = DB::prepare( $sql );
		
	//	foreach ( $params as $key => & $val ):
	//		$stmt->bindParam( $key, $val );
	//	endforeach;
		
		
		
		
		foreach ( $params as $key => & $val ):
			
		if($key == 'senha'){
				$senha = md5($val);
				$stmt->bindParam( $key, $senha);
				
			} else {
				
				$stmt->bindParam( $key, $val );
			}
		endforeach;
		
		return $stmt->execute();
	}	


	
	public function update( $atualizar ) {

		// PEGA OS INDICES DO ARRAY
		$indices = array_keys( $atualizar );
		// PEGA OS VALORES DO ARRAY 
		$valores = array_values( $atualizar );
		// COMBINA OS ARRAYS PARA GERAR OS BINDPARAM
		$params = array_combine( $indices, $valores );
		// SEPARA POR IGUAL DOIS PONTOS PRA FORMA A QUERY EX: =:nome,   
		$separadoPorDoisPontos = ':' . implode( '=:', $indices );
		// COMBINA OS INDICES COM A $separadoPorDoisPontos EX: nome=:nome,
		$c = array_combine( $indices, explode( '=', $separadoPorDoisPontos ) );

		$query = null;
		// RETIRA DA QUERY A ULTIMA VIRGULA EX: nome=:nome, email=:email, senha=:senha
		foreach ( $c as $key => $value ) {
			$query .= $key . '=' . $value . ',';
		}
		// CRIA UM NOVA QUERY SEM A VIRGULA FINAL
		$novaQuery = rtrim( $query, ',' );

		$sql = "UPDATE $this->table SET $novaQuery WHERE id = :id";
		$stmt = DB::prepare( $sql );
		
		
		foreach ( $params as $key => & $val ):
			
		if($key == 'senha'){
				$senha = md5($val);
				$stmt->bindParam( $key, $senha);
				
			} else {
				
				$stmt->bindParam( $key, $val );
			}
		endforeach;
		return $stmt->execute();

}
	
	//PRECISA USAR O foreach PARA LER TODOS
	public function readAll() {
		$sql = "SELECT * FROM $this->table ORDER BY estado DESC";
		$stmt = DB::prepare( $sql );
		$stmt->execute();
		return $stmt->fetchAll();
	}
	
	public function lerEstados() {
		$sql = "SELECT * FROM $this->table ORDER BY estado ASC";
		$stmt = DB::prepare( $sql );
		$stmt->execute();
		return $stmt->fetchAll();
	}

	
	//PRECISA USAR O foreach PARA trazer todas as linhas com o id
	public function readLine( $idEstado ) {
		$sql = "SELECT * FROM $this->table WHERE idEstado = :idEstado";
		$stmt = DB::prepare( $sql );
		$stmt->bindParam( ':idEstado', $idEstado, PDO::PARAM_INT );
		$stmt->execute();
		return $stmt->fetchAll();
	}


	public function delete( $id ) {
		$sql = "DELETE FROM $this->table WHERE id = :id";
		$stmt = DB::prepare( $sql );
		$stmt->bindParam( ':id', $id, PDO::PARAM_INT );
		return $stmt->execute();
	}
	
	

}
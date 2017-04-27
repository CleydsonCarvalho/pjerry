<?php
require_once 'DB.php';
class Produtos {

    protected $table = 'produtos';
		
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

		$indices = array_keys( $atualizar );
		$valores = array_values( $atualizar );
		$params = array_combine( $indices, $valores );
		$separadoPorDoisPontos = ':' . implode( '=:', $indices );
		$c = array_combine( $indices, explode( '=', $separadoPorDoisPontos ) );

		$query = null;
		foreach ( $c as $key => $value ) {
			$query .= $key . '=' . $value . ',';
		}
		$novaQuery = rtrim( $query, ',' );

		$sql = "UPDATE $this->table SET $novaQuery WHERE id_produto = :id_produto";
		$stmt = DB::prepare( $sql );
		
		
		foreach ( $params as $key => & $val ){
				
				$stmt->bindParam( $key, $val );
			
		};
		return $stmt->execute();

}
	
	public function atualizar_estoque( $id_produto, $quantidade  ) {
		
		$sql = "UPDATE $this->table SET quantidade = :quantidade WHERE id_produto = :id_produto";
		$stmt = DB::prepare( $sql );	
		$stmt->bindParam( ':id_produto', $id_produto, PDO::PARAM_INT );
		$stmt->bindParam( ':quantidade', $quantidade, PDO::PARAM_INT );		
		return $stmt->execute();
}

	
	//PRECISA USAR O foreach PARA LER TODOS
	public function readAllAdmin() {
		$sql = "SELECT * FROM $this->table WHERE tipo = '1' ORDER BY id DESC";
		$stmt = DB::prepare( $sql );
		$stmt->execute();
		return $stmt->fetchAll();
	}
	//PRECISA USAR O foreach PARA LER TODOS
	//foreach($user->readAllCliente() as $key => $value_users): ?

	//endforeach;
	public function readProdutos() {
		$sql = "SELECT id_produto, nome FROM $this->table  ORDER BY nome ASC";
		$stmt = DB::prepare( $sql );
		$stmt->execute();
		$produtos =  $stmt->fetchAll();
		
	return ($produtos); 
	}
	
	
	public function lerProdutos($search) {
		
		
		$sql = "SELECT id_produto, nome FROM $this->table WHERE nome LIKE '%".$search."%' LIMIT 0,3 ";
		$stmt = DB::prepare( $sql );
		$stmt->execute();
		$produtos =  $stmt->fetchAll();
		
		//foreach($produtos as $key => $ValueProdutos){
	    //$todosProdutos[] = array('id_produto'=>$ValueProdutos->id_produto, 'nome' =>$ValueProdutos->nome);
		//}
		
	return ($produtos); 
	}
	
	
	
	

	public function readAllTecnico() {
		$sql = "SELECT * FROM $this->table WHERE tipo = '2' ORDER BY id DESC";
		$stmt = DB::prepare( $sql );
		$stmt->execute();
		return $stmt->fetchAll();
	}
	
	//PRECISA USAR O foreach PARA trazer todas as linhas com o id
	//foreach($user->readId($id = $resultado de outra class->tipo_empresa ) as $key => $value): ?

	//endforeach;
	public function readAll() {
		$sql = "SELECT * FROM $this->table ORDER BY nome ASC";
		$stmt = DB::prepare( $sql );
		$stmt->execute();
		return $stmt->fetchAll();
	}
	
	//PRECISA USAR O foreach PARA trazer todas as linhas com o id
	public function lerProduto( $id ) {
		$sql = "SELECT * FROM $this->table WHERE id_produto = :id";
		$stmt = DB::prepare( $sql );
		$stmt->bindParam( ':id', $id, PDO::PARAM_INT );
		$stmt->execute();
		return $stmt->fetchAll();
	}

		public function produtoVendido( $id ) {
		$sql = "SELECT * FROM $this->table WHERE id_produto = :id";
		$stmt = DB::prepare( $sql );
		$stmt->bindParam( ':id', $id, PDO::PARAM_INT );
		$stmt->execute();
		return $stmt->fetch();
	}
	
	



	public function delete( $id ) {
		$sql = "DELETE FROM $this->table WHERE id_produto = :id";
		$stmt = DB::prepare( $sql );
		$stmt->bindParam( ':id', $id, PDO::PARAM_INT );
		return $stmt->execute();
	}
	
	

}
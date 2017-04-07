<?php
require_once 'DB.php';
class Cliente {

    protected $table = 'clientes';
		
	public function create( $criar ) {
	
		$indices = array_keys( $criar );
		$valores = array_values( $criar );
		$k = implode( ',', array_values( $indices ) );
		$v = ':' . implode( ',:', array_values( $indices ) );
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
	
	
	public function lerClientes() {
		$sql = "SELECT id, nome FROM $this->table  ORDER BY nome ASC";
		$stmt = DB::prepare( $sql );
		$stmt->execute();
		return $stmt->fetchAll(); 
	}
	
	public function lerCliente( $id ) {
		$sql = "SELECT * FROM $this->table WHERE id = :id";
		$stmt = DB::prepare( $sql );
		$stmt->bindParam( ':id', $id, PDO::PARAM_INT );
		$stmt->execute();
		return $stmt->fetchAll();
	}
	
	public function readAllAdmin() {
		$sql = "SELECT * FROM $this->table WHERE tipo = '1' ORDER BY id DESC";
		$stmt = DB::prepare( $sql );
		$stmt->execute();
		return $stmt->fetchAll();
	}

	public function readAllCliente() {
		$sql = "SELECT * FROM $this->table WHERE tipo = '3' ORDER BY id DESC";
		$stmt = DB::prepare( $sql );
		$stmt->execute();
		return $stmt->fetchAll();
	}
	
	public function readAllTecnico() {
		$sql = "SELECT * FROM $this->table WHERE tipo = '2' ORDER BY id DESC";
		$stmt = DB::prepare( $sql );
		$stmt->execute();
		return $stmt->fetchAll();
	}
	
	public function readAll() {
		$sql = "SELECT * FROM $this->table ORDER BY nome ASC";
		$stmt = DB::prepare( $sql );
		$stmt->execute();
		return $stmt->fetchAll();
	}
	
	public function readLine( $id ) {
		$sql = "SELECT * FROM $this->table WHERE id = :id";
		$stmt = DB::prepare( $sql );
		$stmt->bindParam( ':id', $id, PDO::PARAM_INT );
		$stmt->execute();
		return $stmt->fetch();
	}

	public function delete( $id ) {
		$sql = "DELETE FROM $this->table WHERE id = :id";
		$stmt = DB::prepare( $sql );
		$stmt->bindParam( ':id', $id, PDO::PARAM_INT );
		return $stmt->execute();
	}
	
	

}
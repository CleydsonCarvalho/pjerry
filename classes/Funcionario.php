<?php
require_once( 'DB.php' );
class Funcionario {

	protected $table = 'funcionarios';

	public
	function create( $criar ) {
		// PEGA OS INDICES DO ARRAY
		$indices = array_keys( $criar );
		// PEGA OS VALORES DO ARRAY  
		$valores = array_values( $criar );
		// TRANSFORMA PRO FORMATO DE QUERY = nome, email, etc
		$k = implode( ',', array_values( $indices ) );
		// TRANSFORMA PRO FORMATO DE QUERY = :nome, :email, :etc
		$v = ':' . implode( ',:', array_values( $indices ) );

		$params = array_combine( $indices, $valores );
		$sql = "INSERT INTO $this->table ($k) VALUES ($v)";
		$stmt = DB::prepare( $sql );


		foreach ( $params as $key => & $val ):

			if ( $key == 'senha' ) {
				$senha = md5( $val );
				$stmt->bindParam( $key, $senha );

			} else {

				$stmt->bindParam( $key, $val );
			}
		endforeach;

		return $stmt->execute();
	}

	public
	function update( $atualizar ) {

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

		$sql = "UPDATE $this->table SET $novaQuery WHERE id_funcionario = :id_funcionario";
		$stmt = DB::prepare( $sql );


		foreach ( $params as $key => & $val ):

			if ( $key == 'senha' ) {
				$senha = md5( $val );
				$stmt->bindParam( $key, $senha );

			} else {

				$stmt->bindParam( $key, $val );
			}
		endforeach;
		return $stmt->execute();

	}

	public
	function buscarMotorista() {
		$sql = "SELECT * FROM $this->table WHERE funcao = 'Motorista' ORDER BY nome ASC";
		$stmt = DB::prepare( $sql );
		$stmt->execute();
		return $stmt->fetchAll();
	}

	public
	function buscarVendedores() {
		$sql = "SELECT * FROM $this->table WHERE funcao = 'Vendedor' ORDER BY nome ASC";
		$stmt = DB::prepare( $sql );
		$stmt->execute();
		return $stmt->fetchAll();
	}

	public
	function readAllCliente() {
		$sql = "SELECT * FROM $this->table WHERE tipo = '3' ORDER BY id DESC";
		$stmt = DB::prepare( $sql );
		$stmt->execute();
		return $stmt->fetchAll();
	}


	public
	function readAllTecnico() {
		$sql = "SELECT * FROM $this->table WHERE tipo = '2' ORDER BY id DESC";
		$stmt = DB::prepare( $sql );
		$stmt->execute();
		return $stmt->fetchAll();
	}

	//PRECISA USAR O foreach PARA trazer todas as linhas com o id
	//foreach($user->readId($id = $resultado de outra class->tipo_empresa ) as $key => $value): ?

	//endforeach;
	public
	function readAll() {
		$sql = "SELECT * FROM $this->table ORDER BY nome ASC";
		$stmt = DB::prepare( $sql );
		$stmt->execute();
		return $stmt->fetchAll();
	}

	//PRECISA USAR O foreach PARA trazer todas as linhas com o id
	public function readLine( $id ) {
		$sql = "SELECT * FROM $this->table WHERE id_funcionario = :id";
		$stmt = DB::prepare( $sql );
		$stmt->bindParam( ':id', $id, PDO::PARAM_INT );
		$stmt->execute();
		return $stmt->fetchAll();
	}
	
	public function lerFuncionario( $id ) {
		$sql = "SELECT * FROM $this->table WHERE id_funcionario = :id";
		$stmt = DB::prepare( $sql );
		$stmt->bindParam( ':id', $id, PDO::PARAM_INT );
		$stmt->execute();
		return $stmt->fetch();
	}



	public
	function delete( $id ) {
		$sql = "DELETE FROM $this->table WHERE id_funcionario = :id";
		$stmt = DB::prepare( $sql );
		$stmt->bindParam( ':id', $id, PDO::PARAM_INT );
		return $stmt->execute();
	}



}
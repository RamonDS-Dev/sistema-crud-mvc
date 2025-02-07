<?php 

class LoginDAO {
	private $conexao;

	public function __construct() {
		$dsn = "mysql:host=localhost;port=3306;dbname=sistema_ramon";

		try{
			$this->conexao = new PDO($dsn, "ramon", "Ramon0912@05");
		} catch(PDOException $e) {
			die("Erro de conexão" . $e->getMessage());
		}
	}

	public function authenticate($User, $password) {
		$sql = "SELECT * FROM users WHERE User = ?";
		$stmt = $this->conexao->prepare($sql);
		$stmt->bindValue(1, $User);
		$stmt->execute();

		$user = $stmt->fetch(PDO::FETCH_OBJ);

		if($user && password_verify($password, $user->password)) {
			return $user; // retorna o usuário autenticado
		}

		return false;
	}
}



?>
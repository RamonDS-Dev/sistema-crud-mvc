<?php 


class PessoaDAO {

	private $conexao;

	public function __construct() {
		$dsn = "mysql:host=localhost;port=3306;dbname=system_ramondsdev";

		try {
			$this->conexao = new PDO($dsn, "ramon", "Ramon0912@05");
		} catch (PDOException $e) {
			die("Erro de conexao" . $e->getMessage());
		}
	}



	public function formatarNumerosBanco($valor) {

		
		$valor = str_replace(',', '.', $valor);		
			
		return floatval($valor);

	}

	public function insert(PessoaModel $model) {
		$sql = "INSERT INTO SR_Produtos (Name, Code, Unit, Amount, Sale_Price, Price_Cost, Gross_Margin) VALUES (?, ?, ?, ?, ?, ?, ?) ";

		$stmt = $this->conexao->prepare($sql);

		$stmt->bindValue(1, $model->Name);
		$stmt->bindValue(2, $model->Code);
		$stmt->bindValue(3, $model->Unit);
		$stmt->bindValue(4, $model->Amount);
		$stmt->bindValue(5, $this->formatarNumerosBanco($model->Sale_Price));
		$stmt->bindValue(6, $this->formatarNumerosBanco($model->Price_Cost));
		$stmt->bindValue(7, $this->formatarNumerosBanco($model->Gross_Margin));

		$stmt->execute();
	}

	public function update(PessoaModel $model) {
		$sql = "UPDATE SR_Produtos SET Name=?, Code=?, Unit=?, Amount=?, Sale_Price=?, Price_Cost=?, Gross_Margin=? WHERE ID_Products=? ";

		$stmt = $this->conexao->prepare($sql);


		$Sale_Price = $this->formatarNumerosBanco($model->Sale_Price);
		$Price_Cost = $this->formatarNumerosBanco($model->Price_Cost);
		$Gross_Margin = $this->formatarNumerosBanco($model->Gross_Margin);


		$stmt->bindValue(1, $model->Name);
		$stmt->bindValue(2, $model->Code);
		$stmt->bindValue(3, $model->Unit);
		$stmt->bindValue(4, $model->Amount);
		$stmt->bindValue(5, $Sale_Price);
		$stmt->bindValue(6, $Price_Cost);
		$stmt->bindValue(7, $Gross_Margin);
		

		$stmt->bindValue(8,$model->ID_Products);

		$stmt->execute();
	}

	public function select() {
		$sql = "SELECT * FROM SR_Produtos";
		$stmt = $this->conexao->prepare($sql);
		$stmt->execute();

		$result = $stmt->fetchAll(PDO::FETCH_CLASS);

		if(!$result) {
			die("Erro: Nenhum dado encontrado na tabela 'Produtos'. ");
		}

		return $result;
	}

	public function selectById(int $id) {
		include_once 'Model/PessoaModel.php';

		$sql = "SELECT * FROM SR_Produtos WHERE ID_Products = ?";
		$stmt = $this->conexao->prepare($sql);
		$stmt->bindValue(1, $id);
		$stmt->execute();

		return $stmt->fetchObject("PessoaModel");
	}

	public function delete(int $id) {
		$sql = "DELETE FROM SR_Produtos WHERE ID_Products = ?";

		$stmt = $this->conexao->prepare($sql);
		$stmt->bindValue(1, $id);
		$stmt->execute();
	}
}



?>
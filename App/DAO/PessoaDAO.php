<?php 


class PessoaDAO {

	private $conexao;

	public function __construct() {
		$dsn = "mysql:host=localhost;port=3306;dbname=sistema_ramon";

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
		$sql = "INSERT INTO Produtos (Nome, Codigo, Unidade, Quantidade, Preco_Venda, Preco_Custo, Margem_Bruta) VALUES (?, ?, ?, ?, ?, ?, ?) ";

		$stmt = $this->conexao->prepare($sql);

		$stmt->bindValue(1, $model->Nome);
		$stmt->bindValue(2, $model->Codigo);
		$stmt->bindValue(3, $model->Unidade);
		$stmt->bindValue(4, $model->Quantidade);
		$stmt->bindValue(5, $this->formatarNumerosBanco($model->Preco_Venda));
		$stmt->bindValue(6, $this->formatarNumerosBanco($model->Preco_Custo));
		$stmt->bindValue(7, $this->formatarNumerosBanco($model->Margem_Bruta));

		$stmt->execute();
	}

	public function update(PessoaModel $model) {
		$sql = "UPDATE Produtos SET Nome=?, Codigo=?, Unidade=?, Quantidade=?, Preco_Venda=?, Preco_Custo=?, Margem_Bruta=? WHERE ID_Produto=? ";

		$stmt = $this->conexao->prepare($sql);


		$PrecoVenda = $this->formatarNumerosBanco($model->Preco_Venda);
		$PrecoCusto = $this->formatarNumerosBanco($model->Preco_Custo);
		$MargemBruta = $this->formatarNumerosBanco($model->Margem_Bruta);


		$stmt->bindValue(1, $model->Nome);
		$stmt->bindValue(2, $model->Codigo);
		$stmt->bindValue(3, $model->Unidade);
		$stmt->bindValue(4, $model->Quantidade);
		$stmt->bindValue(5, $PrecoVenda);
		$stmt->bindValue(6, $PrecoCusto);
		$stmt->bindValue(7, $MargemBruta);
		

		$stmt->bindValue(8,$model->ID_Produto);

		$stmt->execute();
	}

	public function select() {
		$sql = "SELECT * FROM Produtos";
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

		$sql = "SELECT * FROM Produtos WHERE ID_Produto = ?";
		$stmt = $this->conexao->prepare($sql);
		$stmt->bindValue(1, $id);
		$stmt->execute();

		return $stmt->fetchObject("PessoaModel");
	}

	public function delete(int $id) {
		$sql = "DELETE FROM Produtos WHERE ID_Produto = ?";

		$stmt = $this->conexao->prepare($sql);
		$stmt->bindValue(1, $id);
		$stmt->execute();
	}
}



?>
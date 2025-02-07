<?php 


class PessoaModel {

	public int $ID_Produto;
	
	public string $Nome;

	public int $Codigo;

	public string $Unidade;

	public int $Quantidade;

	public float $Preco_Venda;

	public float $Preco_Custo;

	public float $Margem_Bruta;

	public $rows;

	public function save() {
		$dao = new PessoaDAO();

		if(empty($this->ID_Produto)) {
			$dao->insert($this);
		} else {
			$dao->update($this);
		}
	}

	public function getAllRows() {
		$dao = new PessoaDAO();
		$this->rows = $dao->select();

		if(empty($this->rows)) {
			die("Erro: nenhum dado retornado pelo DAO");
		}
	}

	public function getById(int $ID_Produto) {

		$dao = new PessoaDAO();

		$obj = $dao->selectById($ID_Produto);

		return ($obj) ? $obj : new PessoaModel();
	}

	public function delete(int $ID_Produto) {
		$dao = new PessoaDAO();

		$dao->delete($ID_Produto);
	}
}


?>
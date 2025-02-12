<?php 


class PessoaModel {

	public int $ID_Products;
	
	public string $Name;

	public int $Code;

	public string $Unit;

	public int $Amount;

	public float $Sale_Price;

	public float $Price_Cost;

	public float $Gross_Margin;

	public $rows;

	public function save() {
		$dao = new PessoaDAO();

		if(empty($this->ID_Products)) {
			$dao->insert($this);
		} else {
			$dao->update($this);
		}
	}

	public function getAllRows() {
		$dao = new PessoaDAO();
		$this->rows = $dao->select();

		if(empty($this->rows)) {
			die("Erro: None data returned from DAO");
		}
	}

	public function getById(int $ID_Products) {

		$dao = new PessoaDAO();

		$obj = $dao->selectById($ID_Products);

		return ($obj) ? $obj : new PessoaModel();
	}

	public function delete(int $ID_Products) {
		$dao = new PessoaDAO();

		$dao->delete($ID_Products);
	}
}


?>
<?php

class DashModel {

    public int $ID_Username;
    public string $Username;
    public int $Orders;
    public int $ID_Products;
    public string $Name;
    public float $Sale_Price;
    public $rows;
   
    public function infoData() {
        $dashDAO = new DashDAO();
        $this->rows = $dashDAO->infoData();

        if(empty($this->rows)) {
            throw new Exception("None data returned of DAO");
        }

        // inicializando as propriedades com os dados retornados
        $this->Username = $this->rows['total'] ?? 0;
        $this->ID_Username = $this->rows->ID_Username ?? 0;
        $this->Orders = $this->rows->Orders ?? 0;

    }

    public function listProducts(){
        $dashDAO = new DashDAO();
        $this->rows = $dashDAO->listProducts();

        if(empty($this->rows)) {
            throw new Exception("None product returned of DAO");
        }
    }


}
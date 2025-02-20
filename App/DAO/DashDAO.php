<?php

class DashDAO
{

    private $conexao;

    public function __construct()
    {
        $dsn = "mysql:host=localhost;port=3306;dbname=system_ramondsdev";

        try {
            $this->conexao = new PDO($dsn, "ramon", "Ramon0912@05");
        } catch (PDOException $e) {
            die("Erro de conexao" . $e->getMessage());
        }
    }

    public function infoData() {
        $query = "SELECT COUNT(*) AS total FROM SR_Login WHERE Username IS NOT NULL;";
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();

        $infoData = $stmt->fetch(PDO::FETCH_ASSOC);

        // var_dump($infoData);

        if(!$infoData) {
            throw new Exception('None data found in dash.');
        }

        return $infoData;
    }


    public function listProducts() {
        $query = "SELECT * FROM SR_Produtos";
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();

        $products = $stmt->fetchAll(PDO::FETCH_CLASS);

        if(!$products) {
            throw new Exception("None product found in dash.");
        }

        return $products;
    }
}

<?php 

class RegisterDAO {

    private $conexao;

    public function __construct() {
        $dsn = "mysql:host=localhost;port=3306;dbname=system_ramondsdev";

        try{
            $this->conexao = new PDO($dsn, "ramon", "Ramon0912@05");
            $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e){
            die("Connection with database failed." . $e->getMessage());
        }
    }

    public function createAcc($Username, $Password) {

        // Verifica se o usuário já existe
        $sqlCheck = "SELECT COUNT(*) FROM SR_Login WHERE Username = ?";
        $stmtCheck = $this->conexao->prepare($sqlCheck);
        $stmtCheck->execute([$Username]);

        if ($stmtCheck->fetchColumn() > 0) {
            echo "Usuário já existe!";
            return false;
        }


        $sql = "INSERT INTO SR_Login (Username, Password) VALUES (?, ?)";
        $stmt = $this->conexao->prepare($sql);

        try{
            $stmt->bindValue(1, $Username);
            $stmt->bindValue(2, $Password);
            
            return $stmt->execute();

        } catch(PDOException $e){
            echo "Erro ao criar usuário: " . $e->getMessage(); // Exibe o erro para depuração
            return false;
        }

    }

}



?>
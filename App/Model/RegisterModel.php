<?php 

// ini_set('display_errors', 1); // Ativa a exibição de erros
// ini_set('display_startup_errors', 1); // Mostra erros de inicialização
// error_reporting(E_ALL); // Relata todos os tipos de erros


class RegisterModel {

    private string $Username;
    private string $Password;


    public function setUsername(string $Username){
        if(is_numeric($Username)) {
            throw new Exception("Die! value of your username must be of type text!");
        } else {
            $this->Username = $Username;
        }
    }

    public function getUsername() {
        return $this->Username;
    }

    public function setPassword(string $Password) {
        $hashedPassword = password_hash($Password, PASSWORD_DEFAULT);
    
        if (!$hashedPassword) {
            throw new Exception("Failed to hash password.");
        }

        $this->Password = $hashedPassword;
    }

    public function getPassword() {
        return $this->Password;
    }

    public function createAcc() {
        $regDAO = new RegisterDAO();
        return $regDAO->createAcc($this->Username, $this->Password);
    }


}



?>
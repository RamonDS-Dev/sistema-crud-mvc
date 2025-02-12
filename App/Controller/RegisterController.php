<?php 


ini_set('display_errors', 1); // Ativa a exibição de erros
ini_set('display_startup_errors', 1); // Mostra erros de inicialização
error_reporting(E_ALL); // Relata todos os tipos de erros

class RegisterController {

    public static function registerForm() {
        include 'View/modules/Register/RegisterForm.php';
    }

    public static function createAcc() {
        
        try{
            $regModel = new RegisterModel();
            
            if(empty($_POST['Username']) || empty($_POST['Password'])) {
                throw new Exception("Incomplet username or password input.");
            }
            
            $username = htmlspecialchars($_POST['Username'], ENT_QUOTES, 'UTF-8');
            $password = htmlspecialchars($_POST['Password'], ENT_QUOTES, 'UTF-8');
            
            $regModel->setUsername($username);
            $regModel->setPassword($password);

            $userCreate = $regModel->createAcc();

            // var_dump("hello world");


            if($userCreate) {
                session_start();
                $_SESSION['User'] = $userCreate; //armazena o usuario criado na sessão
                header("Location: /login");
                exit;
            } else {
                throw new Exception("Failed to create the account");
            }

        } catch(Exception $e){
            echo "Erro " . $e->getMessage();
        }

    }

}




?>
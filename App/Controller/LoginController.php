<?php 

class LoginController {
	public static function loginForm() {
		include 'View/modules/Login/LoginForm.php';
	}

	public static function authenticate() {
		$model = new LoginModel();
		$model->setUsername($_POST['User']);
		$model->setPassword($_POST['password']);

		$user = $model->authenticate();

		if($user) {
			session_start();
			$_SESSION['user'] = $user; // armazena o usuario na sessão
			header("Location: /pessoa");
		} else {
			header("Location: /login?erro=invalid_credentials");
		}
	}

	public static function logout() {
		session_start();
		session_destroy();

		header("Location: /login");
	}
}



?>
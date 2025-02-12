<?php 

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// midleware simples para proteger as rotas

function requireLogin() {

	session_start();

	if(!isset($_SESSION['User'])) {
		header("Location: /login");
		exit;
	}
}

switch($url) {
	case '/':
		requireLogin();
		PessoaController::index();
	break;

	case '/login':
		LoginController::loginForm();
	break;

	case '/login/authenticate':
		LoginController::authenticate();
	break;

	case '/logout':
		LoginController::logout();
	break;

	case '/register':
		RegisterController::registerForm();
	break;

	case '/register/createAcc':
		RegisterController::createAcc();
	break;

	case '/pessoa':
		requireLogin();
		PessoaController::index();
	break;

	case '/pessoa/form':
		requireLogin();
		PessoaController::form();
	break;

	case '/pessoa/form/save':
		PessoaController::save();
	break;

	case '/pessoa/delete':
		PessoaController::delete();
	break;

	default:
		echo "Erro 404 - Página Inexistente";
	break;
}


?>
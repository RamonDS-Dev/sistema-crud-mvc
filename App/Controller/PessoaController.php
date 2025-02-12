<?php 

// ini_set('display_errors', 1); // Ativa a exibição de erros
// ini_set('display_startup_errors', 1); // Mostra erros de inicialização
// error_reporting(E_ALL); // Relata todos os tipos de erros

	class PessoaController {

		public static function index() {

			$model = new PessoaModel();
			$model->getAllRows();

			if(empty($model->rows)) {
				die("Nenhum dado a exibir");
			}

			include 'View/modules/Pessoa/ListaPessoa.php';
		}

		public static function form() {

			$model = new PessoaModel();

			if(isset($_GET['id']) && !empty($_GET['id'])) {
				$model = $model->getById((int) $_GET['id']);
			}

			include 'View/modules/Pessoa/FormPessoa.php';
		}

		public static function save() {

			$model = new PessoaModel();
 
			$model->ID_Products = (int)$_POST['ID_Products'];

			$model->Name = htmlspecialchars($_POST['Name']);
			$model->Code = intval($_POST['Code']);
			$model->Unit = htmlspecialchars($_POST['Unit']);
			$model->Amount = intval($_POST['Amount']);
			$model->Sale_Price = self::formatarDecimal($_POST['Sale_Price']);
			$model->Price_Cost = self::formatarDecimal($_POST['Price_Cost']);
			$model->Gross_Margin = self::formatarDecimal($_POST['Gross_Margin']);

			// echo "<pre>";
			// print_r($_POST);
			// print_r($model);
			// exit;

			try {
				$model->save();
				header("Location: /pessoa");

			} catch(Exception $e) {

				echo $e->getMessage();
			}

			

		}

		private static function formatarDecimal($valor) {

			$valor = str_replace(',', '.', $valor);		
			
			return floatval($valor);

		}

		public static function delete() {

			$model = new PessoaModel();

			$model->delete((int) $_GET['id']);

			header("Location: /pessoa");
		}
	}


?>
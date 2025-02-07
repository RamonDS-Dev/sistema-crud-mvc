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
 
			$model->ID_Produto = (int)$_POST['ID_Produto'];

			$model->Nome = htmlspecialchars($_POST['Nome']);
			$model->Codigo = intval($_POST['Codigo']);
			$model->Unidade = htmlspecialchars($_POST['Unidade']);
			$model->Quantidade = intval($_POST['Quantidade']);
			$model->Preco_Venda = self::formatarDecimal($_POST['Preco_Venda']);
			$model->Preco_Custo = self::formatarDecimal($_POST['Preco_Custo']);
			$model->Margem_Bruta = self::formatarDecimal($_POST['Margem_Bruta']);

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
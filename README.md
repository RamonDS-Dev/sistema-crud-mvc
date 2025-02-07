# sistema-crud-mvc
CRUD PHP + MySQL 
-> Desenvolvido usando o padrão de arquitetura MVC e PHP Orientado a Objetos.

-> Developed using the MVC and Object Oriented PHP architecture pattern.

🇧🇷 Entendendo o sistema:

🔄 Fluxo completo:
1. Requisição HTTP através do roteamento das nossas rotas, feito pelo nosso arquivo rotas.php graças ao autoload feito dentro do index.php.
2. O controller processa a requisição, valida os dados e interage com a Model e o DAO.
3. A Model define a estrutura dos dados e inclui métodos de validação e manipulação de dados.
4. O DAO executa nossas consultas SQL para acessar e modificar dados no banco de dados.
5. e por fim o nosso controlador redireciona / renderiza a View apropriada.

______

🇺🇸 Understanding the system: 

🔄 Full Flow:

1. HTTP request through the routing of our routes, done by our routes.php file thanks to the autoload done within index.php.
2. The controller processes the request, validates the data and interacts with the Model and the DAO.
3. The Model defines the structure of the data and includes data validation and manipulation methods.
4. The DAO runs our SQL queries to access and modify data in the database.
5. and finally our controller redirects / renders the appropriate View.



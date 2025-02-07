# sistema-crud-mvc
CRUD PHP + MySQL 
-> Desenvolvido usando o padrão de arquitetura MVC e PHP Orientado a Objetos.


🇧🇷 Entendendo o sistema:

🔄 Fluxo completo:
1. Requisição HTTP através do roteamento das nossas rotas, feito pelo nosso arquivo rotas.php graças ao autoload feito dentro do index.php.
2. O controller processa a requisição, valida os dados e interage com a Model e o DAO.
3. A Model define a estrutura dos dados e inclui métodos de validação e manipulação de dados.
4. O DAO executa nossas consultas SQL para acessar e modificar dados no banco de dados.
5. e por fim o nosso controlador redireciona / renderiza a View apropriada.



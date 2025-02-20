<?php

// a lógica do dash está em o controller receber a requisição, e instanciar a DAO para tratar dos dados, na model está a lógica do produto e dados do meu usuário usados na DAO para retornar os valores.

class DashController
{

    public static function handleDashboard() {
        
        // Instancia o modelo
        $dashModel = new DashModel();

        // Busca os dados
        try {

            // Usamos $products = $dashModel->rows; porque listProducts() retorna um ARRAY de objetos.
            // Usamos $infoData = $dashModel->infoData(); porque infoData() retorna APENAS UM objeto.
            $dashModel->listProducts(); // Pega os produtos
            $products = $dashModel->rows;

            // Pega as infos gerais
            $dashModel->infoData();
            $infoData = $dashModel->rows;


        } catch (Exception $e) {
            $error = "Erro ao buscar dados: " . $e->getMessage();
        }

        // Inclui a view e passa os dados
        include 'View/modules/Dashboard/Dashboard.php';
    }
    
}

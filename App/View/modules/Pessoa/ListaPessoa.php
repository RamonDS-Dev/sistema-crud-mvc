<?php 

// ini_set('display_errors', 1); // Ativa a exibição de erros
// ini_set('display_startup_errors', 1); // Mostra erros de inicialização
// error_reporting(E_ALL); // Relata todos os tipos de erros


    function numeroFormatado($valor) {
        $valorFormatado = number_format($valor, 2, ',', '');

        return $valorFormatado;
    }

?>




<!DOCTYPE html>
<html>

<head>
    <title>Lista de Usuários</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Parkinsans:wght@300..800&display=swap" rel="stylesheet">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<style>
    body {
        background: #262835;
        overflow: hidden;
        font-family: "Parkinsans", sans-serif;
        display: flex;
        height: 100%;
        width: 100%;
    }

    .corpo{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 10px;
        height: 100%;
        width: 100%;
    }

    .container {
        display:flex;
        height: 100%;
        width: 100%;
    }

    table {
        border-collapse: collapse;
        margin: 20px 0;
        font-size: 16px;
        text-align: left;
        border-radius: 8px;
        width: 100%;
        height: calc(100% - 40px);
        height: -moz-calc(100% - 40px);
        overflow: auto;
        background: rgba(255, 255, 255, 0.8);
    }

    /* Estilo para as bordas da tabela */
    table th,
    table td {
        border: 1px solid #dddddd;
        padding: 10px 15px;
        color: #333 !important;
    }

    .nome-btn{
        text-decoration: underline;
        color: #333;
        transition: color 0.3s ease;
    }

    .nome-btn:hover {
        color: #477be1;
    }

    /* Cabeçalhos da tabela com destaque */
    table th {
        background-color: #f4f4f4;
        color: #333;
        font-weight: bold;
        text-decoration: none;
    }

    /* Linhas alternadas para melhor visualização */
    table tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    table tr:nth-child(odd) {
        background-color: #ffffff;
    }

    /* Efeito de hover nas linhas */
    table tr:hover {
        background-color: #f1f1f1;
    }

    .delete-btn{
        display: flex;
        align-items: center;
        justify-content: center;
        background: #aa2b3c;
        width: 65%;
        color: white;
        font-size: 18px;
        border-radius: 6px;
        padding: 8px;
        text-decoration: none;
    }

    .btn-cadastro{
        padding: 10px;
        margin-top: 50px;
        border: none;
        background: #477be1;
        color: white;
        transition: background 0.3s ease;
        border-radius: 5px;
        cursor: pointer;
        width: 250px;
        text-decoration: none;
        text-align: center;
    }

    .btn-cadastro:hover {
        background: #75b2fe;
    }

</style>

<body>

    <div class="corpo">
        <a class="btn-cadastro" href="/pessoa/form">Novo Produto</a>

        <div class="container">

            <?php 
    
                include 'Includes/menu.phtml';

            ?>


            <table width="100%" border="0" cellpadding="1" cellspacing="1">
                <tr>
                    <th></th>
                    <th>ID</th>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Un</th>
                    <th>Qtd</th>
                    <th>Preço Venda</th>
                    <th>Preço Custo</th>
                    <th>Margem Bruta</th>
                    <th>Total</th>
                </tr>
                <?php foreach ($model->rows as $item): ?>
                    <tr>
                        <td>
                            <a href="/pessoa/delete?id=<?= $item->ID_Produto ?>" class="delete-btn"> <i class='bx bx-trash'></i> </a>
                        </td>
                        <td><?= $item->ID_Produto ?></td>
                        <td>
                            <a class="nome-btn" href="/pessoa/form?id=<?= $item->ID_Produto ?>"><?= $item->Codigo ?></a>
                        </td>
                        <td><?= $item->Nome ?></td>
                        <td><?= $item->Unidade ?></td>
                        <td><?= $item->Quantidade ?></td>
                        <td>R$ <?= numeroFormatado($item->Preco_Venda); ?></td>
                        <td>R$ <?= numeroFormatado($item->Preco_Custo); ?></td>
                        <td>R$ <?= numeroFormatado($item->Margem_Bruta); ?></td>
                        <td></td>
                    </tr>

                    <?php 
                       
                    ?>
                <?php endforeach; ?>

                <?php if (count($model->rows) == 0): ?>
                    <tr>
                        <td colspan="5">Nenhum registro encontrado.</td>
                    </tr>
                <?php endif; ?>
            </table>
        </div>


    </div>
        


</body>

</html>
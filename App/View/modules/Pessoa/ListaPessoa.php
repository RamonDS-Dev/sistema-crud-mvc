<?php 

// ini_set('display_errors', 1); // Ativa a exibição de erros
// ini_set('display_startup_errors', 1); // Mostra erros de inicialização
// error_reporting(E_ALL); // Relata todos os tipos de erros

session_start();

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

    .new-product-div{
        margin-top: 20px;
    }

    .new-product-div .btn-cadastro{
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

    .new-product-div .btn-cadastro:hover {
        background: #75b2fe;
    }

    p {
        color: white;
    }

    .welcome-message-div {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .welcome-message-div a{
        text-decoration: none;
        color: white;
        transition: color 0.3s ease;
    }

    .welcome-message-div a:hover{
        color: #75b2fe;
    }

</style>

<body>

    <div class="corpo">

        <div class="welcome-message-div">
            <?php if (isset($_SESSION['User'])): ?>
                <p>Bem vindo, <strong>
                    <?= htmlspecialchars($_SESSION['User']->Username, ENT_QUOTES, 'UTF-8'); ?>
                    </strong>
                </p>
                <a href="/logout" id="logout">Logout</a>
            <?php endif; ?>


            <div class="new-product-div">
                <a class="btn-cadastro" href="/pessoa/form">Novo Produto</a>
            </div>
        </div>
        
        
        <div class="container">

            <?php 
    
                include 'Includes/menu.phtml';

            ?>


            <table width="100%" border="0" cellpadding="1" cellspacing="1">
                <tr>
                    <th></th>
                    <th>ID</th>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Un</th>
                    <th>Amount</th>
                    <th>Sale Price</th>
                    <th>Price Cost</th>
                    <th>Gross Margin</th>
                    <th>Total</th>
                </tr>
                <?php foreach ($model->rows as $item): ?>
                    <tr>
                        <td>
                            <a href="/pessoa/delete?id=<?= $item->ID_Products ?>" class="delete-btn"> <i class='bx bx-trash'></i> </a>
                        </td>
                        <td><?= $item->ID_Products ?></td>
                        <td>
                            <a class="nome-btn" href="/pessoa/form?id=<?= $item->ID_Products ?>"><?= $item->Code ?></a>
                        </td>
                        <td><?= $item->Name ?></td>
                        <td><?= $item->Unit ?></td>
                        <td><?= $item->Amount ?></td>
                        <td>R$ <?= numeroFormatado($item->Sale_Price); ?></td>
                        <td>R$ <?= numeroFormatado($item->Price_Cost); ?></td>
                        <td>R$ <?= numeroFormatado($item->Gross_Margin); ?></td>
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
        

    <script src="../jquery/dist/jquery.min.js">
    
        $("#logout").on('click', ()=> {
    
            $.ajax({
                url: "/logout",
                type: "POST",
                success: function() {
                    location.reload();
                }
            })
        });
    
    
    </script>

</body>



</html>
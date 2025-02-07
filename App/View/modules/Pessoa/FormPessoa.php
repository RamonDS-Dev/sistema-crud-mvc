<?php 

// ini_set('display_errors', 1); // Ativa a exibição de erros
// ini_set('display_startup_errors', 1); // Mostra erros de inicialização
// error_reporting(E_ALL); // Relata todos os tipos de erros


?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Usuários</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Parkinsans:wght@300..800&display=swap" rel="stylesheet">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<style>
        
    body{
        background: #262835;
        color: white;
        overflow: hidden;
        font-family: "Parkinsans", sans-serif;
    }

    .box-shadow {
        background: radial-gradient(circle, rgba(0,0,0, 0.2) 0%, rgba(0,0,0, 0.7) 100%);
        position: fixed;
        z-index: -1;
        width: 100vw;
        height: 100vh;
        left: 0;
        top:0;
    }

    .container{
        width: 100vw;
        height: 80vh;
        display: flex;
        justify-content:center;
        align-items:center;

    }

    fieldset {
        width:50%;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        border-radius: 8px;
    }

    form {
        display: flex;
        flex-wrap: wrap; /* Permite que os itens quebrem a linha */
        gap: 20px; /* Espaçamento entre os itens */
        justify-content: flex-start; /* Alinha os itens à esquerda (opcional) */
        width: 90%; /* Largura total do container */
        padding: 10px;
        box-sizing: border-box; /* Garante que o padding não afete o tamanho total */
    }

    .campo-form{
        display: flex;
        flex-direction: column;
        gap: 5px;
    }

    .campo-form > input {
        padding: 10px;
        margin: 10px 0px 10px 0px;
        border-radius: 5px;
        border: none;
        font-size: 16px;
    }

    input:focus {
        outline: 0;
    }

    .btn-salvar {
        padding: 10px;
        border: none;
        background: #477be1;
        color: white;
        transition: background 0.3s ease;
        border-radius: 5px;
        cursor: pointer;
        width: 50%;
    }

    .btn-salvar:hover{
        background: #75b2fe;
    }

    .seta-voltar {
        font-size: 32px;
        color: white;
        text-decoration: none;
        margin: 80px;
    }


</style>

<body>
    
    <div class="box-shadow"></div>

    <a href="/pessoa" class="seta-voltar"><i class='bx bx-arrow-back'></i></a>

    <div class="container">

        <fieldset>
            <legend>Cadastro de Produto:</legend>
            <form method="post" action="/pessoa/form/save">
                <input type="hidden" value="<?= $model->ID_Produto ?? '' ?>" name="ID_Produto" autocomplete="off">

                <div class="campo-form">
                    <label for="Nome">Nome: </label>
                    <input style="width: 600px;" type="text" id="Nome" name="Nome" value="<?= $model->Nome ?? '' ?>" autocomplete="off">
                </div>
                    
                <div class="campo-form">
                    <label for="Codigo">Codigo: </label>
                    <input style="width: 120px;" type="number" id="Codigo" name="Codigo" value="<?= $model->Codigo ?? '' ?>" autocomplete="off">
                </div>

                <div class="campo-form">
                    <label for="Unidade">Unidade: </label>
                    <input style="width: 120px;" id="Unidade" name="Unidade" value="<?= $model->Unidade ?? '' ?>" type="text" autocomplete="off">
                </div>

                <div class="campo-form">
                    <label for="Quantidade">Quantidade: </label>
                    <input style="width: 120px" id="Quantidade" name="Quantidade" value="<?= $model->Quantidade ?? '' ?>" type="number" autocomplete="off">
                </div>

                <div class="campo-form">
                    <label for="Preco_Venda">Preço de Venda: </label>
                    <input style="width: 120px;" type="text" id="Preco_Venda" name="Preco_Venda" value="<?= $model->Preco_Venda ?? ''?>" autocomplete="off">
                </div>

                <div class="campo-form">
                    <label for="Preco_Custo">Preço de Custo: </label>
                    <input style="width: 120px;"type="text" id="Preco_Custo" name="Preco_Custo" value="<?= $model->Preco_Custo ?? '' ?>" autocomplete="off">
                </div>

                <div class="campo-form">
                    <label for="Margem_Bruta">Margem Bruta: </label>
                    <input style="width: 120px;" type="text" id="Margem_Bruta" name="Margem_Bruta" value="<?= $model->Margem_Bruta ?? '' ?>" autocomplete="off">
                </div>

                <button class="btn-salvar" type="submit">Salvar</button>
            </form>



        </fieldset>
    </div>



</body>

</html>

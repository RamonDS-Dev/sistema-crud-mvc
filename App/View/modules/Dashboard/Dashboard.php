<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
</head>

<style type="text/css">
    /* Reset */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, sans-serif;
    }

    /* Layout */
    body {
        display: flex;
    }

    /* Sidebar */
    .sidebar {
        width: 250px;
        height: 100vh;
        background: #333;
        color: white;
        padding: 20px;
    }

    .sidebar h2 {
        margin-bottom: 20px;
    }

    .sidebar ul {
        list-style: none;
    }

    .sidebar ul li {
        margin-bottom: 15px;
    }

    .sidebar ul li a {
        color: white;
        text-decoration: none;
        font-size: 18px;
    }

    /* Conteúdo */
    .content {
        flex: 1;
        padding: 20px;
        background: #f4f4f4;
    }

    header h1 {
        margin-bottom: 20px;
    }

    /* Cards */
    .cards {
        display: flex;
        gap: 20px;
    }

    .card {
        flex: 1;
        background: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .card h3 {
        margin-bottom: 10px;
    }

    /* Gráficos e Tabelas */
    .dashboard-data {
        display: flex;
        gap: 20px;
        margin-top: 20px;
    }

    .chart, .table {
        flex: 1;
        height: 500px;
        background: white;
        border-radius: 8px;
        box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 10px;
    }

    /* Ajustando tabela */
    .table {
        overflow: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 10px;
        border: 1px solid #ddd;
        text-align: left;
    }

    th {
        background-color: #f0f0f0;
    }


</style>
<body>

    <!-- Sidebar -->
    <aside class="sidebar"> 
        <h2>Dashboard</h2>
        <ul>
            <li><a href="/pessoa">Início</a></li>
            <li><a href="#">Relatórios</a></li>
            <li><a href="#">Configurações</a></li>
        </ul>
    </aside>

    <!-- Conteúdo Principal -->
    <main class="content">
        <header>
            <h1>Visão Geral</h1>
        </header>

        <!-- Cards -->
        <section class="cards">
            <div class="card">
                <h3>Users</h3>
                <p><?= $infoData['total']; ?></p>
            </div>
            <div class="card">
                <h3>Sales</h3>
                <p>R$ 15,300</p>
            </div>
            <div class="card">
                <h3>Orders</h3>
                <p>586</p>
            </div>
        </section>

        <!-- Gráficos e Tabelas -->
        <section class="dashboard-data">
            <div class="chart">
                <canvas id="myChart"></canvas>
            </div>
            <div class="table">
                <table id="dataTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $product): ?>
                        <tr>
                            <td><?= htmlspecialchars($product->ID_Products, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?= htmlspecialchars($product->Name, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td>R$ <?= number_format($product->Sale_Price, 2, ',', '.') ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    
                       
                </table>
            </div>
        </section>
    </main>

    <!-- Scripts -->
    <script src="../jquery/dist/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        
        $(document).ready(function() {

            // fazendo requisição de produtos pelo ajax

            // Inicializando DataTable
            $('#dataTable').DataTable();

            // Criando o gráfico com Chart.js
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio'],
                    datasets: [{
                        label: 'Vendas (R$)',
                        data: [1200, 2500, 1800, 3000, 5000],
                        backgroundColor: ['#3498db', '#e74c3c', '#f1c40f', '#2ecc71', '#9b59b6']
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        }
                    }
                }
            });
        });


    </script>

</body>
</html>

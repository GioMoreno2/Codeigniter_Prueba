<!DOCTYPE html>
<html>
<head>
    <title>Gráfica de Usuarios</title>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            text-align: center;
        }

        .contenedor-grafica{
            width: 500px;
            height: 300px;
            margin: 30px auto;
        }
    </style>

</head>
<body>

    <h2>Total de usuarios: <?php echo $total; ?></h2>

    <div class="contenedor-grafica">
        <canvas id="graficaSexo"></canvas>
    </div>

<script>

const ctx = document.getElementById('graficaSexo');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Hombres', 'Mujeres'],
        datasets: [{
            label: 'Usuarios registrados',
            data: [
                <?php echo $hombres; ?>,
                <?php echo $mujeres; ?>
            ],
            backgroundColor: [
                '#36A2EB',
                '#FF6384'
            ]
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    precision: 0
                }
            }
        }
    }
});

</script>

</body>
</html>
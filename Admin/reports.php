<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Home</a>
        </li>
        <li class="breadcrumb-item">
            <a href="#">Library</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
            <a class="dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Data</a>
            <ul class="dropdown-menu">
                <li>
                    <a class="dropdown-item" href="#">Action</a>
                </li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
        </li>
    </ol>
</nav>
<?php
$con = new mysqli('localhost', 'root', 'fundador142', 'cugondb');
$query = $con->query("
    SELECT 
        MONTH(posted_at) as monthname,
        SUM(rating_data) as amount
    FROM ratings
    GROUP BY MONTH(posted_at)
    ORDER BY MONTH(posted_at)
");
$month = [];
$amount = [];
foreach ($query as $data) {
    $month[] = DateTime::createFromFormat('!m', $data['monthname'])->format('F');
    $amount[] = $data['amount'];
}
?>

<div style="width: 100%; height: 50vh; justify-content:center">
    <canvas id="myChart"></canvas>
</div>

<div class="table-responsive">
    <table class="table table-hover text-center text-nowrap">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Product Detail Views</th>
                <th scope="col">Unique Purchases</th>
                <th scope="col">Quantity</th>
                <th scope="col">Product Revenue</th>
                <th scope="col">Avg. Price</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">Percentage change</th>
                <td>
                    <span class="text-danger">
                        <i class="fas fa-caret-down me-1"></i><span>-48.8%</span>
                    </span>
                </td>
                <td>
                    <span class="text-success">
                        <i class="fas fa-caret-up me-1"></i><span>14.0%</span>
                    </span>
                </td>
                <td>
                    <span class="text-success">
                        <i class="fas fa-caret-up me-1"></i><span>46.4%</span>
                    </span>
                </td>
                <td>
                    <span class="text-success">
                        <i class="fas fa-caret-up me-1"></i><span>29.6%</span>
                    </span>
                </td>
                <td>
                    <span class="text-danger">
                        <i class="fas fa-caret-down me-1"></i><span>-11.5%</span>
                    </span>
                </td>
            </tr>
            <tr>
                <th scope="row">Absolute change</th>
                <td>
                    <span class="text-danger">
                        <i class="fas fa-caret-down me-1"></i><span>-17,654</span>
                    </span>
                </td>
                <td>
                    <span class="text-success">
                        <i class="fas fa-caret-up me-1"></i><span>28</span>
                    </span>
                </td>
                <td>
                    <span class="text-success">
                        <i class="fas fa-caret-up me-1"></i><span>111</span>
                    </span>
                </td>
                <td>
                    <span class="text-success">
                        <i class="fas fa-caret-up me-1"></i><span>$1,092.72</span>
                    </span>
                </td>
                <td>
                    <span class="text-danger">
                        <i class="fas fa-caret-down me-1"></i><span>$-1.78</span>
                    </span>
                </td>
            </tr>
        </tbody>
    </table>
</div>


<script>
    const labels = <?php echo json_encode($month) ?>;
    const data = {
        labels: labels,
        datasets: [{
            label: 'My First Dataset',
            data: <?php echo json_encode($amount) ?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(201, 203, 207, 0.2)'
            ],
            borderColor: [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)',
                'rgb(201, 203, 207)'
            ],
            borderWidth: 1
        }]
    };
    const config = {
        type: 'bar',
        data: data,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        },
    };
    var myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
</script>
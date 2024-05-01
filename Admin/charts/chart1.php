<?php
require_once('../database/Connection.php');
$db = new Dbh();
$con = $db->connect();

$stmt = $con->query("SELECT YEAR(created_at) AS year, MONTH(created_at) AS month, COUNT(*) AS bookings FROM res_tb WHERE YEAR(created_at) = YEAR(CURDATE()) GROUP BY year, month ORDER BY year, month");

$bookingsData = [];
$bookingsYear = [];
while ($row = $stmt->fetch_assoc()) {
    $bookingsData[] = $row['bookings'];
    $bookingsYear[] = $row['year'];
} ?>

<div style="justify-content:center"> <canvas id="bookings-per-month"></canvas> </div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('bookings-per-month').getContext('2d');
    const bookingsPerMonth = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            datasets: [{
                label: 'Number of Bookings',
                data: <?php echo json_encode($bookingsData); ?>,
                backgroundColor: ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)', 'rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)'],
                borderColor: ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)', 'rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)'],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                title: {
                    display: true,
                    text: 'Number of Bookings per Month in ' + <?php echo json_encode($bookingsYear[0]); ?>
                }
            }
        }
    });
</script>
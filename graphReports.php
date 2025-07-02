<?php include 'navbar.php'; ?>
<h1>Graph Reports</h1>

<?php
include 'db.php';
$data = ['Male' => 0, 'Female' => 0, 'Other' => 0];

$result = $conn->query("SELECT Gender, COUNT(*) as total FROM employee GROUP BY Gender");
while ($row = $result->fetch_assoc()) {
    $data[$row['Gender']] = $row['total'];
}
?>
<div>
    <canvas id="genderChart" width="100" height="100"></canvas>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('genderChart').getContext('2d');
const chart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ['Male', 'Female', 'Other'],
        datasets: [{
            label: 'Gender Distribution',
            data: [<?= $data['Male'] ?>, <?= $data['Female'] ?>, <?= $data['Other'] ?>],
            backgroundColor: ['#36A2EB', '#FF6384', '#FFCE56'],
        }]
    }
});
</script>
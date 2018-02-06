<div class="container">
    <div class="row">
        <div class="col s12">
            <canvas id="chart_ruang"></canvas>
        </div>
    </div>
</div>

<script type="text/javascript">
    var ctx_ruang     = document.getElementById("chart_ruang").getContext("2d");

    var data    = {
        labels: [<?php while ($row = $ruang_query->fetch_object()) {
                    echo '"' . $row->nama_ruang . '", ';
                } ?>],
        datasets: [{
            label: "Grafik Ruang yang Dipinjam",
            data: [<?php while ($row = $total_ruang->fetch_object()) {
                        echo '"' . $row->total . '", ';
                    } ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderWidth: 1
        }]
    };
    var myBarChart = new Chart(ctx_ruang, {
        type: 'bar',
        data: data,
        options: {
            responsive: true,
            scales: {
                yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
            }
        }
    });
</script>
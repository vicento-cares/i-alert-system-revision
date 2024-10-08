<script type="text/javascript">
    $(document).ready(function () {
        load_graph();

    });
    const load_graph = () => {
        $.ajax({
            url: '../../process/admin/dashboard.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_graph',

            }, success: function (response) {
                document.getElementById('list_of_totals').innerHTML = response;
                var section = [];
                $('.section').each(function () {
                    section.push($(this).html());
                });

                var total = [];
                $('.total').each(function () {
                    total.push($(this).html());
                });
                chart(section, total);
            }
        });
    }

    const chart = (section, total) => {
        var ctx = document.getElementById('total_chart');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: section,
                datasets: [{
                    label: 'Total',
                    data: total,
                    backgroundColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'

                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'

                    ],
                    borderWidth: 2
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                indexAxis: 'x'
            }
        });
    }


    const export_total = () => {
        window.open('../../process/admin/export_graph.php?');
    }
</script>
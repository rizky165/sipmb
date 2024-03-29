<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><?php echo !empty($title) ? $title : null ?></h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div id="pendaftar"></div>
        </div>
    </div>
</main>
<script>

        let data = <?= $grafik['data'] ?>;
        let categories = <?= $grafik['categories'] ?>;
        let title = "Grafik Pendapatan Bank";

        let subtitle = "Grafik Pendapatan";
        getGrafik('pendaftar', data, categories, title, subtitle);

        function getGrafik(selector, data, categories, title, subtitle) {
            var chart = Highcharts.chart(selector, {

                chart: {
                    type: 'column'
                },

                title: {
                    text: title
                },

                subtitle: {
                    text: subtitle
                },

                legend: {
                    align: 'right',
                    verticalAlign: 'middle',
                    layout: 'vertical'
                },

                xAxis: {
                    categories: categories,
                    labels: {
                        x: -10
                    }
                },

                yAxis: {
                    allowDecimals: false,
                    title: {
                        text: title
                    }
                },

                series: data,

                responsive: {
                    rules: [{
                        condition: {
                            maxWidth: 500
                        },
                        chartOptions: {
                            legend: {
                                align: 'center',
                                verticalAlign: 'bottom',
                                layout: 'horizontal'
                            },
                            yAxis: {
                                labels: {
                                    align: 'left',
                                    x: 0,
                                    y: -5
                                },
                                title: {
                                    text: title
                                }
                            },
                            subtitle: {
                                text: subtitle
                            },
                            credits: {
                                enabled: false
                            }
                        }
                    }]
                }
            });

            document.getElementById('small').addEventListener('click', function() {
                chart.setSize(400);
            });

            document.getElementById('large').addEventListener('click', function() {
                chart.setSize(600);
            });

            document.getElementById('auto').addEventListener('click', function() {
                chart.setSize(null);
            });
        }
    </script>
</body>

</html>
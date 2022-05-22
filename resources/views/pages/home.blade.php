@extends('layouts.main')

@section('page')
    <div class="row">
        <div class="col-lg-8 col-md-12 col-sm-12 my-3">
            <div class="card card-primary card-outline">
                <h5 class="card-header m-0 me-2 pb-4">Traffic User Chart</h5>
                <div class="card-body">
                    <canvas id="timelineScore"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12">
            <div class="row">
                <div class="col-lg-12 col-md-6">
                    <div class="card card-primary card-outline my-3">
                        <h5 class="card-header m-0 me-2 pb-3">Alltime Traffic</h5>
                        <div class="card-body">
                            <h5 class="font-weight-light" style="font-weight: 100"><i class="bx bx-user me-2"
                                    style="font-size: 32px"></i> {{ $allVisitors }} Visit</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-6">
                    <div class="card card-primary card-outline my-3">
                        <h5 class="card-header m-0 me-2 pb-3">Product Chart</h5>
                        <div class="card-body">
                            <canvas id="productChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-plugins')
    <script src="/resources/assets/plugins/chartjs/Chart.min.js"></script>
    <script src="/resources/assets/plugins/chartjs/chart-plugin-labels.min.js"></script>
    <script>
        $.get('/data/visitors', function(data) {
            var areaData = {
                labels: data.categories,
                datasets: [{
                    label: 'Visitor',
                    data: data.total,
                    backgroundColor: '#00000000',
                    borderColor: '#e1a10c',
                    borderWidth: 2,
                    fill: true, // 3: no fill
                }]
            };

            var areaOptions = {
                plugins: {
                    filler: {
                        propagate: true
                    },
                    datalabels: {
                        display: false
                    }
                }
            }
            var lineChartCanvas = $("#timelineScore").get(0).getContext("2d");
            var lineChart = new Chart(lineChartCanvas, {
                type: 'line',
                data: areaData,
                options: areaOptions
            });
        })

        $.get('/data/products', function(data) {
            var pie = document.getElementById("productChart");
            var myChart = new Chart(pie, {
                type: 'pie',
                data: {
                    labels: data.categories,
                    datasets: [{
                        label: 'Score',
                        data: data.data,
                        backgroundColor: [
                            '#28D094',
                            '#efd007',
                            '#ce0600'
                        ],
                        borderColor: [
                            '#00000000',
                            '#00000000',
                            '#00000000'
                        ],
                        datalabels: {
                            color: 'white',
                            font: {
                                weight: 'bold'
                            }
                        }
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: false,
                        title: {
                            display: false,
                        },
                        datalabels: {
                            formatter: (value, ctx) => {
                                let sum = 0;
                                let dataArr = ctx.chart.data.datasets[0].data;
                                dataArr.map(data => {
                                    sum += data;
                                });
                                let percentage = (value * 100 / sum) > 0 ? (value * 100 / sum) + "%" :
                                    null;
                                return percentage;
                            },
                            color: '#fff',
                        }
                    },
                },
            });
        })
    </script>
@endsection

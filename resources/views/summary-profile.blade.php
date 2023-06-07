<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Resumen del perfil</title>
    <!-- Styles -->
    <link rel="stylesheet" href="{{$inBackground ? public_path('css/document.css') : asset('css/document.css')}}">
</head>
<body>
<div class="grid-layout">
    <div class="header">
        <div class="left title">
            Resumen de perfil
        </div>
        <div class="right">
            <div class="requested-by">
                Solicitado por: <b>Mr. X</b>
            </div>
            <div class="requested-date">
                Fecha: <b>23.06.2023</b>
            </div>
        </div>
    </div>

    <div class="third-row">
        <div id="credit-history"></div>
    </div>
</div>
</body>
</html>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://blacklabel.github.io/grouped_categories/grouped-categories.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script type="text/javascript">
    Highcharts.chart('credit-history', {
        chart: {
            animation: false,
            type: 'column',
            backgroundColor: '#9FA8C3',
            responsive: true,
        },
        legend: {enabled: false},
        title: {
            text: 'Historial',
            style: {
                color: 'white',
                fontSize: '25px',
                fontWeight: 'bold'
            }
        },
        credits: {
            enabled: false
        },
        plotOptions: {
            column: {
                color: '#15ADEE',
                borderColor: '#15ADEE'
            },
            series: {
                animation: false
            }
        },
        xAxis: {
            labels: {
                autoRotation: false,
                style: {
                    fontSize: 12,
                    color: 'white',
                },
                distance: 5
            },
            scrollbar: {
                enabled: false
            },
            categories: [{
                name: '2021',
                categories: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Nov', 'Dic']
            }, {
                name: '2022',
                categories: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Nov', 'Dic']
            }],
        },
        yAxis: {
            title: {
                text: 'Monto',
                style: {
                    fontSize: 12,
                    color: '#506269',
                },
            },
            labels: {
                style: {
                    fontSize: 12,
                    color: '#506269',
                },
            },
            gridLineWidth: 0.5,
            gridLineColor: '#506269'
        },
        series: [{
            name: 'months',
            data: [200000, 257892, 181328, 305971, 542657, 203459, 223688, 355000, 288000, 201000, 315458, 198765.3, 525978, 410000, 228639, 452654, 288325, 208942, 198217, 611500],
            dataLabels: {
                enabled: true,
                rotation: -90,
                inside: false,
                style: {
                    fontSize: 12,
                    color: 'white',
                    fontWeight: 'normal',
                    textOutline: false
                }
            }
        }]
    });
</script>


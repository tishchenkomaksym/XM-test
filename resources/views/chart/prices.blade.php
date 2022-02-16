<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Chartisan example</title>
</head>
<body>
<!-- Chart's container -->
<div id="chart" style="height: 300px;"></div>
<!-- Charting library -->
{{--<script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>--}}
{{--<!-- Chartisan -->--}}
{{--<script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>--}}
<script src="https://unpkg.com/chart.js@^2.9.3/dist/Chart.min.js"></script>
<!-- Chartisan -->
<script src="https://unpkg.com/@chartisan/chartjs@^2.1.0/dist/chartisan_chartjs.umd.js"></script>
<!-- Your application script -->
<script>
    const chart = new Chartisan({
        el: '#chart',
        url: "@chart('chart_prices')",
        hooks: new ChartisanHooks()
            .beginAtZero()
            .colors(['#4299E1', '#ECC94B'])
            .borderColors()
            .datasets([ 'bar']),

        loader: {
            color: '#11ff00',
            size: [60, 60],
            type: 'bar',
            textColor: '#11ff00',
            text: 'Loading some chart data...',
        }
    });
</script>
</body>
</html>

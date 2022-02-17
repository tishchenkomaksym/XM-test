@extends('layouts.app')

@section('content')
@if($history->isNotEmpty())
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Date</th>
            <th scope="col">Open</th>
            <th scope="col">High</th>
            <th scope="col">Low</th>
            <th scope="col">Close</th>
            <th scope="col">Volume</th>
        </tr>
        </thead>
        <tbody>
        @foreach($history as $key => $value)
            <tr>
                <th scope="row">{{ $key }}</th>
                <td>{{ date('Y-m-d', $value->date) }}</td>
                <td>{{ $value->open }}</td>
                <td>{{ $value->high }}</td>
                <td>{{ $value->low }}</td>
                <td>{{ $value->close }}</td>
                <td>{{ $value->volume }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
     <p>No data for this time period</p>
@endif


<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script>
    let history = JSON.parse('{!! $history !!}');
    console.log(history);
    let open = [];
    let close = [];
    for (const key in history) {
        console.log(`${key}: ${history[key].date}`);
        let date = new Date(history[key].date * 1000);
        open.push({ x: new Date(date.getFullYear(), date.getMonth(), date.getDate()), y: history[key].open});
        close.push({ x: new Date(date.getFullYear(), date.getMonth(), date.getDate()), y: history[key].close})
    }

    window.onload = function () {
        var chart = new CanvasJS.Chart("chartContainer", {
            title:{
                text: "Chart Open -> Close"
            },
            axisY:[{
                title: "Open",
                lineColor: "#C24642",
                tickColor: "#C24642",
                labelFontColor: "#C24642",
                titleFontColor: "#C24642",
                includeZero: true,
                suffix: "k"
            },
            ],
            axisY2: {
                title: "Close",
                lineColor: "#7F6084",
                tickColor: "#7F6084",
                labelFontColor: "#7F6084",
                titleFontColor: "#7F6084",
                includeZero: true,
                prefix: "$",
                suffix: "k"
            },
            toolTip: {
                shared: true
            },
            legend: {
                cursor: "pointer",
                itemclick: toggleDataSeries
            },
            data: [{
                type: "line",
                name: "Open",
                color: "#369EAD",
                showInLegend: true,
                axisYIndex: 1,
                dataPoints: open
            },
                {
                    type: "line",
                    name: "Close",
                    color: "#C24642",
                    axisYIndex: 0,
                    showInLegend: true,
                    dataPoints: close
                },
            ]
        });
        if(history.length !== 0){
            chart.render();
        }


        function toggleDataSeries(e) {
            if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                e.dataSeries.visible = false;
            } else {
                e.dataSeries.visible = true;
            }
            e.chart.render();
        }

    }
</script>
@endsection

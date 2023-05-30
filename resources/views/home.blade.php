@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <ul>
                        <li>{{ Auth::user()->name }}</li>
                        <li>{{ Auth::user()->email }}</li>
                        <li>{{ Auth::user()->created_at }}</li>
                    </ul>
                    <div id="chart_div"></div>

                    <script type="text/javascript">
                    google.charts.load('current', {packages: ['corechart', 'bar']});
                    google.charts.setOnLoadCallback(drawBasic);

                    function drawBasic() {
                        var data = new google.visualization.DataTable();
                        data.addColumn('timeofday', 'Time of Day');
                        data.addColumn('number', 'Motivation Level');

                        data.addRows([
                            [{v: [8, 0, 0], f: '8 am'}, 1],
                            [{v: [9, 0, 0], f: '9 am'}, 2],
                            [{v: [10, 0, 0], f:'10 am'}, 3],
                            [{v: [11, 0, 0], f: '11 am'}, 4],
                            [{v: [12, 0, 0], f: '12 pm'}, 5],
                            [{v: [13, 0, 0], f: '1 pm'}, 6],
                            [{v: [14, 0, 0], f: '2 pm'}, 7],
                            [{v: [15, 0, 0], f: '3 pm'}, 8],
                            [{v: [16, 0, 0], f: '4 pm'}, 9],
                            [{v: [17, 0, 0], f: '5 pm'}, 10],
                        ]);

                        var options = {
                            title: 'Motivation Level Throughout the Day',
                            hAxis: {
                                title: 'Time of Day',
                                format: 'h:mm a',
                                viewWindow: {
                                    min: [7, 30, 0],
                                    max: [17, 30, 0]
                                }
                            },
                            vAxis: {
                                title: 'Rating (scale of 1-10)'
                            }
                        };

                        var chart = new google.visualization.ColumnChart(
                            document.getElementById('chart_div'));

                        chart.draw(data, options);
                    }
                </script>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

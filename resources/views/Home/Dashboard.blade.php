@extends('layouts.template')
@section('title', 'Tableau de bord')
@section('content')
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Tableau de bord</h2>
                    <h5 class="text-white op-7 mb-2">Contrôlez la comptabilité à partir de cette interface</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="page-inner mt--5">
        <div class="row mt--2">
            <div class="col-md-6">
                <div class="card full-height">
                    <div class="card-body">
                        <div class="card-title">Statistiques</div>
                        <!--<div class="card-category">Daily information about statistics in system</div>-->
                        <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                            <div class="px-2 pb-2 pb-md-0 text-center">
                                <div id="circles-1"><div class="circles-wrp" style="position: relative; display: inline-block;"><svg xmlns="http://www.w3.org/2000/svg" width="90" height="90"><path fill="transparent" stroke="#f1f1f1" stroke-width="7" d="M 44.99154756204665 3.500000860767564 A 41.5 41.5 0 1 1 44.942357332570026 3.500040032273624 Z" class="circles-maxValueStroke"></path><path fill="transparent" stroke="#FF9E27" stroke-width="7" d="M 44.99154756204665 3.500000860767564 A 41.5 41.5 0 1 1 20.64435763625984 78.60137921350231 " class="circles-valueStroke"></path></svg><div class="circles-text" style="position: absolute; top: 0px; left: 0px; text-align: center; width: 100%; font-size: 31.5px; height: 90px; line-height: 90px;">{{ $new_users }}</div></div></div>
                                <h6 class="fw-bold mt-3 mb-0">Nouveaux utilisateurs</h6>
                            </div>
                            <div class="px-2 pb-2 pb-md-0 text-center">
                                <div id="circles-2"><div class="circles-wrp" style="position: relative; display: inline-block;"><svg xmlns="http://www.w3.org/2000/svg" width="90" height="90"><path fill="transparent" stroke="#f1f1f1" stroke-width="7" d="M 44.99154756204665 3.500000860767564 A 41.5 41.5 0 1 1 44.942357332570026 3.500040032273624 Z" class="circles-maxValueStroke"></path><path fill="transparent" stroke="#2BB930" stroke-width="7" d="M 44.99154756204665 3.500000860767564 A 41.5 41.5 0 1 1 5.5495771787290025 57.88076625138973 " class="circles-valueStroke"></path></svg><div class="circles-text" style="position: absolute; top: 0px; left: 0px; text-align: center; width: 100%; font-size: 31.5px; height: 90px; line-height: 90px;"> {{ $sales }}</div></div></div>
                                <h6 class="fw-bold mt-3 mb-0">Ventes</h6>
                            </div>
                            <div class="px-2 pb-2 pb-md-0 text-center">
                                <div id="circles-3"><div class="circles-wrp" style="position: relative; display: inline-block;"><svg xmlns="http://www.w3.org/2000/svg" width="90" height="90"><path fill="transparent" stroke="#f1f1f1" stroke-width="7" d="M 44.99154756204665 3.500000860767564 A 41.5 41.5 0 1 1 44.942357332570026 3.500040032273624 Z" class="circles-maxValueStroke"></path><path fill="transparent" stroke="#F25961" stroke-width="7" d="M 44.99154756204665 3.500000860767564 A 41.5 41.5 0 0 1 69.44267714510887 78.53812060894248 " class="circles-valueStroke"></path></svg><div class="circles-text" style="position: absolute; top: 0px; left: 0px; text-align: center; width: 100%; font-size: 31.5px; height: 90px; line-height: 90px;">{{ $bookings }}</div></div></div>
                                <h6 class="fw-bold mt-3 mb-0">Voyage</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card full-height">
                    <div class="card-body">

                        <div class="card-title">Réservations</div>
                        <div class="row py-3">
                            <div class="col-md-4 d-flex flex-column justify-content-around">
                                <div>
                                    <h6 class="fw-bold text-uppercase text-success op-8">Total</h6>
                                    <h3 class="fw-bold">{{ $bookings }}</h3>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div id="chart-container"><div style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;" class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                    <canvas id="totalIncomeChart" style="display: block; width: 255px; height: 150px;" width="255" height="150" class="chartjs-render-monitor"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title fw-mediumbold">Planning de voyages</div>
                        <div class="table-responsive">
                            <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="add-row" class="display table table-striped table-hover dataTable"
                                            role="grid" aria-describedby="add-row_info">
                                            <thead>
                                                <tr role="row">
                                                    <th scope="col">#</th>
                                                    <th scope="col">Départ</th>
                                                    <th scope="col">Arrivée</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Heure</th>
                                                    <th scope="col">Etat</th>
                                                    <th scope="col">Options</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($elements as $item)
                                                    <tr>
                                                        <td>{{ $item->id }}</td>
                                                        <td>{{ $item->trip->departure }}</td>
                                                        <td>{{ $item->trip->destination }}</td>
                                                        <td>{{ $item->date }}</td>
                                                        <td>{{ $item->time  }}</td>
                                                        <td><span class="badge badge-{{ $item->getColor() }}">{{ $item->getState() }}</span></td>
                                                        <td>
                                                            @if ($item->cancelled == 0)
                                                                <a href="{{ route('planning.cancel', $item->id) }}" class="btn btn-round btn-danger btn-sm"><i class="icon icon-close"></i></a>
                                                            @else
                                                                <a href="{{ route('planning.cancel', $item->id) }}" class="btn btn-round btn-success btn-sm"><i class="fa fa-check" aria-hidden="true"></i></a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@stop

@section('script')
    <script>
        $(document).ready(function(){
            Circles.create({
                id:'circles-1',
                radius:45,
                value: "{{ $quota_users }}",
                maxValue:100,
                width:7,
                text: "{{ $new_users }}",
                colors:['#f1f1f1', '#FF9E27'],
                duration:400,
                wrpClass:'circles-wrp',
                textClass:'circles-text',
                styleWrapper:true,
                styleText:true
            })

            Circles.create({
                id:'circles-2',
                radius:45,
                value:70,
                maxValue:100,
                width:7,
                text: "{{ $sales }}",
                colors:['#f1f1f1', '#2BB930'],
                duration:400,
                wrpClass:'circles-wrp',
                textClass:'circles-text',
                styleWrapper:true,
                styleText:true
            })

            Circles.create({
                id:'circles-3',
                radius:45,
                value: "{{ $trips }}",
                maxValue:100,
                width:7,
                text: "{{ $trips }}",
                colors:['#f1f1f1', '#F25961'],
                duration:400,
                wrpClass:'circles-wrp',
                textClass:'circles-text',
                styleWrapper:true,
                styleText:true
            })

            var totalIncomeChart = document.getElementById('totalIncomeChart').getContext('2d');

            var mytotalIncomeChart = new Chart(totalIncomeChart, {
                type: 'bar',
                data: {
                    labels: ["L", "M", "M", "J", "V", "S", "D", "A"],
                    datasets : [{
                        label: "Total Income",
                        backgroundColor: '#ff9e27',
                        borderColor: 'rgb(23, 125, 255)',
                        data: [
                            {{ App\Booking::where("created_at", Carbon\Carbon::now()->subDays(7))->count() }},
                            {{ App\Booking::where("created_at", Carbon\Carbon::now()->subDays(6))->count() }},
                            {{ App\Booking::where("created_at", Carbon\Carbon::now()->subDays(5))->count() }},
                            {{ App\Booking::where("created_at", Carbon\Carbon::now()->subDays(4))->count() }},
                            {{ App\Booking::where("created_at", Carbon\Carbon::now()->subDays(3))->count() }},
                            {{ App\Booking::where("created_at", Carbon\Carbon::now()->subDays(2))->count() }},
                            {{ App\Booking::where("created_at", Carbon\Carbon::now()->subDays(1))->count() }},
                            {{ App\Booking::where("created_at", Carbon\Carbon::now())->count() }},
                        ],
                    }],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    legend: {
                        display: false,
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                display: false //this will remove only the label
                            },
                            gridLines : {
                                drawBorder: false,
                                display : false
                            }
                        }],
                        xAxes : [ {
                            gridLines : {
                                drawBorder: false,
                                display : false
                            }
                        }]
                    },
                }
            });

            $('#lineChart').sparkline([105,103,123,100,95,105,115], {
                type: 'line',
                height: '70',
                width: '100%',
                lineWidth: '2',
                lineColor: '#ffa534',
                fillColor: 'rgba(255, 165, 52, .14)'
            });
        })
    </script>
@endsection

@extends('layouts.template')
@section('title', 'Statistiques')
@section('content')
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Statistiques globale</h2>
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
                        <div class="card-title">Statistiques Générales</div>
                        <!--<div class="card-category">Daily information about statistics in system</div>-->
                        <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                            <div class="px-2 pb-2 pb-md-0 text-center">
                                <div id="circles-1"><div class="circles-wrp" style="position: relative; display: inline-block;"><svg xmlns="http://www.w3.org/2000/svg" width="90" height="90"><path fill="transparent" stroke="#f1f1f1" stroke-width="7" d="M 44.99154756204665 3.500000860767564 A 41.5 41.5 0 1 1 44.942357332570026 3.500040032273624 Z" class="circles-maxValueStroke"></path><path fill="transparent" stroke="#FF9E27" stroke-width="7" d="M 44.99154756204665 3.500000860767564 A 41.5 41.5 0 1 1 20.64435763625984 78.60137921350231 " class="circles-valueStroke"></path></svg><div class="circles-text" style="position: absolute; top: 0px; left: 0px; text-align: center; width: 100%; font-size: 31.5px; height: 90px; line-height: 90px;"></div></div></div>
                                <h6 class="fw-bold mt-3 mb-0">Nouveaux utilisateurs</h6>
                            </div>
                            <div class="px-2 pb-2 pb-md-0 text-center">
                                <div id="circles-2"><div class="circles-wrp" style="position: relative; display: inline-block;"><svg xmlns="http://www.w3.org/2000/svg" width="90" height="90"><path fill="transparent" stroke="#f1f1f1" stroke-width="7" d="M 44.99154756204665 3.500000860767564 A 41.5 41.5 0 1 1 44.942357332570026 3.500040032273624 Z" class="circles-maxValueStroke"></path><path fill="transparent" stroke="#FF9E27" stroke-width="7" d="M 44.99154756204665 3.500000860767564 A 41.5 41.5 0 1 1 20.64435763625984 78.60137921350231 " class="circles-valueStroke"></path></svg><div class="circles-text" style="position: absolute; top: 0px; left: 0px; text-align: center; width: 100%; font-size: 31.5px; height: 90px; line-height: 90px;"></div></div></div>
                                <h6 class="fw-bold mt-3 mb-0">Nombres utilisateurs</h6>
                            </div>
                            <div class="px-2 pb-2 pb-md-0 text-center">
                                <div id="circles-3"><div class="circles-wrp" style="position: relative; display: inline-block;"><svg xmlns="http://www.w3.org/2000/svg" width="90" height="90"><path fill="transparent" stroke="#f1f1f1" stroke-width="7" d="M 44.99154756204665 3.500000860767564 A 41.5 41.5 0 1 1 44.942357332570026 3.500040032273624 Z" class="circles-maxValueStroke"></path><path fill="transparent" stroke="#F25961" stroke-width="7" d="M 44.99154756204665 3.500000860767564 A 41.5 41.5 0 0 1 69.44267714510887 78.53812060894248 " class="circles-valueStroke"></path></svg><div class="circles-text" style="position: absolute; top: 0px; left: 0px; text-align: center; width: 100%; font-size: 31.5px; height: 90px; line-height: 90px;"></div></div></div>
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
    </div>
    <div class="page-inner mt--5">
        <div class="row mt--2">
            <div class="col-md-5">
                <div class="card full-height">
                    <div class="card-body">
                        <div class="card-title">Estimation financière</div>
                        <!--<div class="card-category">Daily information about statistics in system</div>-->
                        <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                            <div class="col-md-4 d-flex flex-column justify-content-around">
                                <div>
                                    <h6 class="fw-bold text-uppercase text-info op-8">Voyages</h6>
                                    <h6 class="fw-bold">{{ $trip_amount }} Fcfa</h6>
                                </div>
                            </div>
                            <div class="col-md-4 d-flex flex-column justify-content-around">
                                <div>
                                    <h6 class="fw-bold text-uppercase text-info op-8">Colis</h6>
                                    <h6 class="fw-bold">{{ $mail_amount }} Fcfa</h6>
                                </div>
                            </div>
                            <div class="col-md-4 d-flex flex-column justify-content-around">
                                <div>
                                    <h6 class="fw-bold text-uppercase text-info op-8">Factures</h6>
                                    <h6 class="fw-bold">{{ $bill_amount }} Fcfa</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card full-height">
                    <div class="card-body">
                        <div class="card-title">Rapport disciplinaire</div>
                        <!--<div class="card-category">Daily information about statistics in system</div>-->
                        <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                            <div class="px-2 pb-2 pb-md-0 text-center">
                                <div id="circles-4"><div class="circles-wrp" style="position: relative; display: inline-block;"><svg xmlns="http://www.w3.org/2000/svg" width="90" height="90"><path fill="transparent" stroke="#f1f1f1" stroke-width="7" d="M 44.99154756204665 3.500000860767564 A 41.5 41.5 0 1 1 44.942357332570026 3.500040032273624 Z" class="circles-maxValueStroke"></path><path fill="transparent" stroke="#FF9E27" stroke-width="7" d="M 44.99154756204665 3.500000860767564 A 41.5 41.5 0 1 1 20.64435763625984 78.60137921350231 " class="circles-valueStroke"></path></svg><div class="circles-text" style="position: absolute; top: 0px; left: 0px; text-align: center; width: 100%; font-size: 31.5px; height: 90px; line-height: 90px;"></div></div></div>
                                <h6 class="fw-bold mt-3 mb-0">Taux d'absence</h6>
                            </div>
                            <div class="px-2 pb-2 pb-md-0 text-center">
                                <div id="circles-5"><div class="circles-wrp" style="position: relative; display: inline-block;"><svg xmlns="http://www.w3.org/2000/svg" width="90" height="90"><path fill="transparent" stroke="#f1f1f1" stroke-width="7" d="M 44.99154756204665 3.500000860767564 A 41.5 41.5 0 1 1 44.942357332570026 3.500040032273624 Z" class="circles-maxValueStroke"></path><path fill="transparent" stroke="#FF9E27" stroke-width="7" d="M 44.99154756204665 3.500000860767564 A 41.5 41.5 0 1 1 20.64435763625984 78.60137921350231 " class="circles-valueStroke"></path></svg><div class="circles-text" style="position: absolute; top: 0px; left: 0px; text-align: center; width: 100%; font-size: 31.5px; height: 90px; line-height: 90px;"></div></div></div>
                                <h6 class="fw-bold mt-3 mb-0">Charge travail</h6>
                            </div>
                            <div class="px-2 pb-2 pb-md-0 text-center">
                                <div id="circles-6"><div class="circles-wrp" style="position: relative; display: inline-block;"><svg xmlns="http://www.w3.org/2000/svg" width="90" height="90"><path fill="transparent" stroke="#f1f1f1" stroke-width="7" d="M 44.99154756204665 3.500000860767564 A 41.5 41.5 0 1 1 44.942357332570026 3.500040032273624 Z" class="circles-maxValueStroke"></path><path fill="transparent" stroke="#F25961" stroke-width="7" d="M 44.99154756204665 3.500000860767564 A 41.5 41.5 0 0 1 69.44267714510887 78.53812060894248 " class="circles-valueStroke"></path></svg><div class="circles-text" style="position: absolute; top: 0px; left: 0px; text-align: center; width: 100%; font-size: 31.5px; height: 90px; line-height: 90px;"></div></div></div>
                                <h6 class="fw-bold mt-3 mb-0">Employé du mois</h6>
                                <h6 class="fw-bold mt-3 mb-0 text-success">{{ $best_employee }}</h6>
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
                value: "{{ $new_users }}",
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
                value:"{{ $all_users }}",
                maxValue:100,
                width:7,
                text: "{{ $all_users }}",
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

            Circles.create({
                id:'circles-4',
                radius:45,
                value: 30,
                maxValue:100,
                width:7,
                text: "30%",
                colors:['#f1f1f1', '#c4b93f'],
                duration:400,
                wrpClass:'circles-wrp',
                textClass:'circles-text',
                styleWrapper:true,
                styleText:true
            })

            Circles.create({
                id:'circles-5',
                radius:45,
                value: "{{ $work_load }}" * 100 / 7 ,
                maxValue:100,
                width:7,
                text: "{{ $work_load }}j/7",
                colors:['#f1f1f1', '#F25961'],
                duration:400,
                wrpClass:'circles-wrp',
                textClass:'circles-text',
                styleWrapper:true,
                styleText:true
            })

            Circles.create({
                id:'circles-6',
                radius:45,
                value: 100,
                maxValue:100,
                width:7,
                text: 1,
                colors:['#f1f1f1', '#2BB930'],
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

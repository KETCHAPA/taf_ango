@extends('layouts.template')
@section('title', 'Incident n° ' . $sinister->id)
@section('content')
    <div class="page-inner">
        <h4 class="page-title">Incident n°<strong>{{ $sinister->id }}</strong></h4>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-with-nav">
                    <div class="card-title" style="margin-left: 10px">
                        Informations le converné par l'incident
                    </div>
                    <div class="card-body">
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label>Nom du client:</label>
                                    <input type="text" class="form-control" value = "{{ $ticket->first_name }} {{ $ticket->last_name }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label>Email:</label>
                                    <input type="email" class="form-control"  value="{{ $ticket->email }}">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <div class="form-group form-group-default">
                                    <label>Carte nationale: </label>
                                    <input type="text" class="form-control" value="{{ $ticket->cni }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group form-group-default">
                                    <label>Téléphone</label>
                                    <input type="text" class="form-control" value="{{ $ticket->tel }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group form-group-default">
                                    @if($sinister->isClose == 1)
                                        <label>Etat<i style="margin-left: 5px" class="fas fa-circle text-success"></i></label>
                                        <input type="text" class="form-control" value="Résolu">
                                    @else
                                        <label>Etat<i style="margin-left: 5px" class="fas fa-circle text-warning"></i></label>
                                        <input type="text" class="form-control" value="En cours">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-title" style="margin-left: 10px">
                        Informations sur l'incident
                    </div>
                    <div class="card-body">
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label>Intitulé:</label>
                                    <input type="text" class="form-control" value = "{{ $sinister->label }}">
                                </div>
                            </div>
                        </div>
                        <div class="text-right mt-3 mb-3">
                            <form method="POST" action="/sinister/close/{{ $sinister->id }}">
                                @csrf
                                @if ($sinister->isClose == 0)
                                    <button type="submit" class="btn btn-success">Clore l'incident</button>
                                @endif
                                <a href="/sinisters" class="btn btn-danger">Retour</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        @if(Session::has('message'))
            var type = "{{Session::get('alert-type')}}";
            switch(type) {
                case 'info': 
                    toastr.info("{{ Session::get('message') }}");
                    break;
                case 'success': 
                    toastr.success("{{ Session::get('message') }}");
                    break;
                case 'error': 
                    toastr.error("{{ Session::get('message') }}");
                    break;
                case 'warning': 
                    toastr.warning("{{ Session::get('message') }}");
                    break;
            }
        @endif
    </script>
@endsection
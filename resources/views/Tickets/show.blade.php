@extends('layouts.template')
@section('title', 'Ticket Passager n° ' . $ticket->id)
@section('content')
    <div class="page-inner">
        <h4 class="page-title">Passager n°<strong>{{ $ticket->id }}</strong></h4>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-with-nav">
                    <div class="card-title" style="margin-left: 10px">
                        Informations le ticket
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
                                    @if($ticket->isValidate == 1)
                                        <label>Etat<i style="margin-left: 5px" class="fas fa-circle text-success"></i></label>
                                        <input type="text" class="form-control" value="validé">
                                    @else
                                        <label>Etat<i style="margin-left: 5px" class="fas fa-circle text-warning"></i></label>
                                        <input type="text" class="form-control" value="Non validé">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-title" style="margin-left: 10px">
                        Informations sur le Voyage
                    </div>
                    <div class="card-body">
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label>Ville de départ:</label>
                                    <input type="text" class="form-control" value = "{{ $trip->departure }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label>Ville de destination:</label>
                                    <input type="email" class="form-control"  value="{{ $trip->destination }}">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <div class="form-group form-group-default">
                                    <label>Date: </label>
                                    <input type="text" class="form-control" value="{{ $trip->date }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group form-group-default">
                                    <label>Heure</label>
                                    <input type="text" class="form-control" value="{{ $trip->time }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                    <div class="form-group form-group-default">
                                        <label>Montant</label>
                                        <input type="text" class="form-control" value="{{ $trip->amount }}">
                                    </div>
                                </div>
                        </div>
                        <div class="text-right mt-3 mb-3">
                            
                            @if ($ticket->isValidate == 1)
                                <a href="/ticket/print/{{ $ticket->id }}" class="btn btn-info">Imprimer</a>
                                <button onclick="window.location.href='/tickets/{{ $trip->id }}'" class="btn btn-danger">Retour</button>
                            @else 
                                <a href="/ticket/validate/{{ $ticket->id }}" class="btn btn-success">Valider</a>
                                <button onclick="window.location.href='/tickets/{{ $trip->id }}'" class="btn btn-danger">Retour</button>
                                <div style="display: block; margin-top: 7px" class="btn btn-warning">
                                    <span class="">Valider le ticket pour pouvoir l'imprimer</span>
                                </div>
                            @endif
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
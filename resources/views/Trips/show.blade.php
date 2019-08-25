@extends('layouts.template')
@section('title', 'Voyage ' . $trip->id)
@section('content')
    <div class="page-inner">
        <div class="card-body">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Tickets du voyage {{ $trip->departure }} vers {{ $trip->destination }} </h4>
                    <button onclick="window.location.href='/tickets/{{ $trip->id }}'" class="btn btn-info btn-round ml-auto">
                        Ticket du bus
                    </button>
                </div>
            </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-with-nav">
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
                            <a href="/trip/edit/{{ $trip->id }}" class="btn btn-success">Modifier</a>
                            <button onclick="window.location.href='/trips'" class="btn btn-danger">Retour</button>
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
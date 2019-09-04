@extends('layouts.template')
@section('title', 'Réservation n° ' . $booking->id)
@section('content')
    <div class="page-inner">
        <h4 class="page-title">Réservation n°<strong>{{ $booking->id }}</strong></h4>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-with-nav">
                    <div class="card-title" style="margin-left: 10px">
                        Informations la réservation
                    </div>
                    <div class="card-body">
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label>Nom du client:</label>
                                    <input type="text" class="form-control" value = "{{ $booking->passenger->first_name }} {{ $booking->passenger->last_name }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label>Email:</label>
                                    <input type="email" class="form-control"  value="{{ $booking->passenger->email }}">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <div class="form-group form-group-default">
                                    <label>Carte nationale: </label>
                                    <input type="text" class="form-control" value="{{ $booking->passenger->cni }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group form-group-default">
                                    <label>Téléphone</label>
                                    <input type="text" class="form-control" value="{{ $booking->passenger->tel }}">
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
                        <form action="/booking/confirm/{{ $booking->id }}" method="POST">
                            @csrf
                            <div class="text-right mt-3 mb-3">
                                <button type="submit" class="btn btn-success">Confirmer</button>
                                <a href="/bookings" class="btn btn-danger">Retour</a>
                                <div style="display: block; margin-top: 7px" class="btn btn-info">
                                    <span class="">Une fois valider, la réservation ira dans le voyage {{ $trip->id }} ({{ $trip->departure }} - {{ $trip->destination }})</span>
                                </div>
                            </div>
                        </form>
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

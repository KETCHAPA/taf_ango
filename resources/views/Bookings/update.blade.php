@extends('layouts.template')
@section('title', 'Mise à jour')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Mise à jour réservation n° {{ $booking->id }}</div>
                </div>
                <form action="/booking/update/{{ $booking->id }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="first_name">Nom</label>
                                    <input type="text" name="first_name" placeholder="{{ $booking->first_name }}" class="form-control" id="first_name">
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Prénom</label>
                                    <input type="text" placeholder="{{ $booking->last_name }}" class="form-control" id="last_name" name="last_name">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="email">email</label>
                                    <input type="email" placeholder="{{ $booking->email }}" name="email" class="form-control" id="email">
                                </div>
                                <div class="form-group">
                                    <label for="cni">Numéro de CNI</label>
                                    <input type="text" placeholder="{{ $booking->cni }}" class="form-control" id="cni" name="cni">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="tel">Téléphone</label>
                                    <input type="text" placeholder="{{ $booking->tel }}" class="form-control" name="tel" id="tel">
                                </div>
                                <div class="form-group">
                                    <label for="trip_id">Voyage</label>
                                    <select name="trip_id" id="trip_id" class="form-control">
                                        @foreach ($trips as $trip)
                                            <option value="{{ $trip->id }}" class="for-control">Ligne {{ $trip->departure }} - {{ $trip->destination }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <button type="reset" class="btn btn-warning pull-right">Reinitialiser</button>
                        <button onclick="window.location.href='javascript:history.back()'" class="btn btn-dark">Retour</button>
                        <button class="btn btn-primary">Enregistrer</button>
                    </div>
                </form>
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
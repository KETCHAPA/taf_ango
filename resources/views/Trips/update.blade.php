@extends('layouts.template')
@section('title', 'Mise à jour')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Mise à jour du voyage {{ $trip->departure }} vers {{ $trip->destination }}</div>
                </div>
                <form action="/trip/update/{{ $trip->id }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="departure">Ville de départ</label>
                                    <input type="text" name="departure" placeholder="{{ $trip->departure }}" class="form-control" id="departure">
                                </div>
                                <div class="form-group">
                                    <label for="destination">Ville de destination</label>
                                    <input type="text" placeholder="{{ $trip->destination }}" class="form-control" id="destination" name="destination">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="date">Date</label>
                                    <input type="date" value="{{ $trip->date }}" min="2019-07-07" id="date" class="form-control" name="date">
                                </div>
                                <div class="form-group">
                                    <label for="time">Time</label>
                                    <input type="time" value="{{ $trip->time }}" id="time" class="form-control" name="time">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="amount">Montant</label>
                                    <input type="type" placeholder="{{ $trip->amount }}" name="amount" class="form-control" id="amount">
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
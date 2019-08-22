@extends('layouts.template')
@section('title', 'Nouvel employé')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Nouveau voyage</div>
                </div>
                <form action="/trip/store" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="departure">Ville de départ</label>
                                    <input required type="text" name="departure" class="form-control" id="departure">
                                </div>
                                <div class="form-group">
                                    <label for="destination">Ville de destination</label>
                                    <input required type="text" class="form-control" id="destination" name="destination">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="date">Date</label>
                                    <input required type="date" min="2019-07-07" name="date" class="form-control" id="date">
                                </div>
                                <div class="form-group">
                                    <label for="time">Time</label>
                                    <input required type="time" class="form-control" id="time" name="time">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="amount">Montant</label>
                                    <input required type="text" name="amount" class="form-control" id="amount">
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
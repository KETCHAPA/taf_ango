@extends('layouts.template')
@section('title', 'Nouveau passager')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Nouveau passager</div>
                </div>
                <form action="/ticket/store/{{ $trip->id }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="first_name">Nom</label>
                                    <input required type="text" name="first_name" class="form-control" id="first_name">
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Prénom</label>
                                    <input required type="text" class="form-control" id="last_name" name="last_name">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="email">email</label>
                                    <input required type="email" name="email" class="form-control" id="email">
                                </div>
                                <div class="form-group">
                                    <label for="cni">Numéro de CNI</label>
                                    <input required type="text" class="form-control" id="cni" name="cni">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="tel">Téléphone</label>
                                    <input required type="text" class="form-control" name="tel" id="tel">
                                </div>
                                <div class="form-group">
                                    <label>Voyage</label>
                                    <input disabled type="text" class="form-control" value="{{ $trip->departure }} -> {{ $trip->destination }}">
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
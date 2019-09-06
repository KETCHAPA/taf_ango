@extends('layouts.template')
@section('title', 'Nouvel incident')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Nouvel incident</div>
                </div>
                <form action="/sinister/store" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="label">Intitulé</label>
                                    <input required type="text" name="label" class="form-control" id="label">
                                </div>
                                <div class="form-group">
                                    <label for="ticket_id">Utilisateur concerné</label>
                                    <select name="ticket_id" id="ticket_id" class="form-control">
                                        @foreach ($customers as $customer)
                                            <option value="{{$customer->id}}" class="form-control">{{ $customer->id}} - {{ $customer->first_name }} {{ $customer->last_name}}</option>
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
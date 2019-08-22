@extends('layouts.template')
@section('title', 'Employé {{ $employee->id }}')
@section('content')
    <div class="page-inner">
        <h4 class="page-title">Employé n° {{ $employee->id }}</h4>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-with-nav">
                    <div class="card-header">
                        <div class="row row-nav-line">
                            <ul class="nav nav-tabs nav-line nav-color-secondary w-100 pl-3" role="tablist">
                            <strong><li class="nav-item"> <a class="nav-link" data-toggle="tab" role="tab" aria-selected="false"><span style="font-size: 125%">M/Mlle</span> {{ $employee->first_name }} {{ $employee->last_name }}</a></li></strong>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label>Login</label>
                                    <input type="text" class="form-control" value = "{{ $employee->login }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label>Email</label>
                                    <input type="email" class="form-control"  value="{{ $employee->email }}">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <div class="form-group form-group-default">
                                    <label>Age</label>
                                    <input type="text" class="form-control" value="{{ $employee->age }} ans">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group form-group-default">
                                    <label>Carte nationale</label>
                                    <input type="text" class="form-control" value="{{ $employee->cni }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group form-group-default">
                                    <label>Téléphone</label>
                                    <input type="text" class="form-control" value=" (+237) {{ $employee->tel }}">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label>Adresse</label>
                                    <input type="text" class="form-control" value="{{ $employee->address }}">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3 mb-1">
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label>Poste</label>
                                    <input type="text" class="form-control" value="{{ $employee->role }}">
                                </div>
                            </div>
                        </div>
                        <div class="text-right mt-3 mb-3">
                            <a href="/employee/edit/{{ $employee->id }}" class="btn btn-success">Modifier</a>
                            <button onclick="window.location.href='/employees'" class="btn btn-danger">Retour</button>
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
@extends('layouts.template')

@section('title')
    Nouvelle location
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h5 class="card-title">Enregistrer une location de véhicule</h5>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('vehicles.updateLocation', $location->id) }}" id="saveForm" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <div class="row">
                            <div class="col-md-12 pr-0">
                                <div class="form-group form-group-default">
                                    <label>Immatriculation du véhicule</label>
                                    <input type="text" value="{{ $location->vehicle->registration }}" disabled name="registration" required class="form-control"
                                        placeholder="CE 176 DV">
                                </div>
                            </div>
                            <input type="hidden" name="vehicle_id" value="{{ $location->vehicle->id }}">
                            <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label>Nom de l'emprunteur</label>
                                    <input type="text" name="borrower_name" value="{{ $location->borrower_name }}" class="form-control"
                                        placeholder="Ango Simplice">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group form-group-default">
                                    <label>Date d'emprunt</label>
                                    <input id="addName" type="date" name="location_date" value="{{ $location->location_date }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6 pr-0">
                                <div class="form-group form-group-default">
                                    <label>Durée de l'emprunt</label>
                                    <input id="addPosition" type="number" value="{{ $location->duration }}" name="duration" required class="form-control"
                                        placeholder="Durée en jours">
                                </div>
                            </div>
                            <div class="col-md-6 pr-0">
                                <div class="form-group form-group-default">
                                    <label>Montant</label>
                                    <input id="addPosition" type="number" value="{{ $location->amount }}" name="amount" required class="form-control"
                                        placeholder="Ex: 200000">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <button id="saveBtn" class="btn btn-primary btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Enregistrer l'emprunt</button>
                    <a href="{{ route('vehicles.index') }}" class="btn btn-danger btn-sm"><i class="fa fa-reply" aria-hidden="true"></i> Retour</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        $("#saveBtn").click(function(){
            $("#saveForm").submit()
        })
    </script>
@endsection

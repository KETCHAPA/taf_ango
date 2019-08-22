@extends('layouts.template')

@section('title')
    Nouveau véhicule
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h5 class="card-title">Enregistrer un véhicule</h5>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('vehicles.store') }}" id="saveForm" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 pr-0">
                                <div class="form-group form-group-default">
                                    <label>Immatriculation</label>
                                    <input type="text" name="registration" required class="form-control"
                                        placeholder="CE 176 DV">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label>Modèle</label>
                                    <input type="text" name="model" class="form-control"
                                        placeholder="FIAT">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group form-group-default">
                                    <label>Description</label>
                                    <input id="addName" type="text" name="description" class="form-control"
                                        placeholder="Description du véhicule">
                                </div>
                            </div>
                            <div class="col-md-6 pr-0">
                                <div class="form-group form-group-default">
                                    <label>Marque</label>
                                    <input id="addPosition" type="text" name="brand" required class="form-control"
                                        placeholder="Ex: Opel">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label>Carburant</label>
                                    <select name="fuel" id="" class="form-control">
                                        <option value="Diesel">Diesel</option>
                                        <option value="Super">Super</option>
                                        <option value="Gazoil">Gazoil</option>
                                        <option value="Autre">Autre</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group form-group-default">
                                    <label>Numbre de places</label>
                                    <input id="addName" type="number" name="places" required class="form-control"
                                        placeholder="Ex: 70">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group form-group-default">
                                    <label>Date de mise en circulation</label>
                                    <input type="date" name="FCD" required class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group form-group-default">
                                    <label>Couleur</label>
                                    <input type="text" name="color" required class="form-control">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <button id="saveBtn" class="btn btn-primary btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Enregistrer le véhicule</button>
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

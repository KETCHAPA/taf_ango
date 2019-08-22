@extends('layouts.template')
@section('title', 'Tableau de bord')
@section('content')
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Tableau de bord</h2>
                    <h5 class="text-white op-7 mb-2">Agence de voyage</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row mt--2">
            <div class="col-md-6">
                <div class="card full-height">
                    <div class="card-body">
                        <a href="/trips"><div class="card-title">Gestion des voyages</div></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card full-height">
                    <div class="card-body">
                        <a href="/sinistres"><div class="card-title">Gestion des sinistres</div></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt--2">
            <div class="col-md-6">
                <div class="card full-height">
                    <div class="card-body">
                        <a href="/employees"><div class="card-title">Gestion des employés</div></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card full-height">
                    <div class="card-body">
                        <a href="/users"><div class="card-title">Gestion des Clients</div></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
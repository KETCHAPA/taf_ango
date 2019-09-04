@extends('layouts.template')
@section('title', 'Editer la facture')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Editer la facture</div>
                </div>
                <form action="{{ route('bills.update', $bill->id) }}" method="POST">
                    @csrf
                    @method("PUT")
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="label">Montant</label>
                                    <input required type="number" value="{{ $bill->amount }}"  name="amount" class="form-control" id="label">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="ticket_id">Description</label>
                                    <input required type="text" value="{{ $bill->description }}" name="description" class="form-control" id="label">
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

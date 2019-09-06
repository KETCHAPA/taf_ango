@extends('layouts.template')
@section('title', 'Liste des factures')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Listes de factures</h4>
                    <button class="btn btn-primary btn-sm btn-round ml-auto" onclick="window.location.href='{{ route('bills.create') }}'" >
                        <i class="fa fa-plus"></i>
                        Nouveau
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover" >
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Montant</th>
                                <th>Description</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bills as $bill)
                                <tr>
                                    <td>{{ $bill->id }}</td>
                                    <td>{{ $bill->amount }}</td>
                                    <td>{{ $bill->description }}</td>

                                    <td style="min-width: 250px">
                                        <a href="{{ route('bills.edit', $bill->id) }}" style=""><button class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </button></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        $(".delete").on("submit", function(e){
           return confirm("Supprimer cet incident ?");
        });

        $("#basic-datatables").DataTable()
    </script>
@endsection

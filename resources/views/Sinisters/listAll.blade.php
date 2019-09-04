@extends('layouts.template')
@section('title', 'Listes des sinistres')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Listes de sinistres</h4>
                    <button onclick="window.location.href='/sinister/create'" class="btn btn-primary btn-round ml-auto">
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover" >
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Intitulé</th>
                                <th>Concerné</th>
                                <th>Etat</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sinisters as $sinister)
                                <tr>
                                    <td>{{ $sinister->id }}</td>
                                    <td>{{ $sinister->label }}</td>
                                    <td>{{ $sinister->ticket->passenger->first_name }} {{ $sinister->ticket->passenger->last_name }}</td>
                                    <td>
                                        @if ($sinister->isClose == 1)
                                            Résolu <i style="margin-left: 6px" class="fas fa-circle text-success"></i>
                                        @else
                                            En cours <i style="margin-left: 6px" class="fas fa-circle text-warning"></i>
                                        @endif
                                    </td>
                                    <td style="min-width: 250px">
                                        <a href="/sinister/show/{{$sinister->id}}" style=""><button class="btn btn-sm btn-info">
                                            <i class="fas fa-eye"></i>
                                        </button></a>
                                        <form style="display:inline-block" action="/sinister/close/{{$sinister->id}}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-warning">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </form>
                                        <form style="display:inline-block" class="delete" action="/sinister/destroy/{{$sinister->id}}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $sinisters->links() }}
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
    <script>
        $(".delete").on("submit", function(e){
           return confirm("Supprimer cet incident ?");
        });
    </script>
@endsection

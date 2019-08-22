@extends('layouts.template')
@section('title', 'Listes des tickets')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Passagers du voyage {{ $trip->departure }} vers {{ $trip->destination }} </h4>
                    <div class="ml-auto">
                        <button onclick="window.location.href='/tickets/print/{{ $trip->id}}'" class="btn btn-dark btn-round">
                            <i class="fas fa-print"></i>
                        </button>
                        <button onclick="window.location.href='/ticket/create/{{ $trip->id }}'" class="btn btn-primary btn-round">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover" >
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>email</th>
                                <th>Téléphone</th>
                                <th>CNI</th>
                                <th>Status</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tickets as $ticket)
                                <tr>
                                    <td>{{ $ticket->id }}</td>
                                    <td>{{ $ticket->first_name }}</td>
                                    <td>{{ $ticket->last_name }}</td>
                                    <td>{{ $ticket->email }}</td>
                                    <td>{{ $ticket->tel }}</td>
                                    <td>{{ $ticket->cni }}</td>
                                    <td style="min-width: 155px">
                                        @if ($ticket->isValidate == 0)
                                            Non validé <span style="margin-left: 7px" class="text-warning"><i class="fas fa-circle"></i></span>
                                        @else
                                            Validé <span style="margin-left: 7px" class="text-success"><i class="fas fa-circle"></i></span>
                                        @endif
                                    </td>
                                    <td style="min-width: 248px">
                                        @if ($ticket->isValidate == 0)
                                            <a href="/ticket/validate/{{$ticket->id}}"><button class="btn btn-success">
                                                <i class="fas fa-check"></i>
                                            </button></a>
                                        @endif
                                        <a href="/ticket/show/{{$ticket->id}}" style=""><button class="btn btn-primary">
                                            <i class="fas fa-eye"></i>
                                        </button></a>
                                        <a href="/ticket/edit/{{$ticket->id}}" style=""><button class="btn btn-warning">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button></a>
                                        <form style="display:inline-block" class="delete" action="/ticket/destroy/{{$ticket->id}}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
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
           return confirm("Supprimer cet ticket");
        });
    </script>
@endsection
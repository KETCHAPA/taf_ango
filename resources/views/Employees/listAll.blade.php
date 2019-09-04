@extends('layouts.template')
@section('title', 'Listes des employés')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Listes de employés</h4>
                    <button onclick="window.location.href='/employee/create'" class="btn btn-primary btn-round ml-auto">
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
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Login</th>
                                <th>Age</th>
                                <th>Téléphone</th>
                                <th>Email</th>
                                <th>Adresse</th>
                                <th>Numero de CNI</th>
                                <th>Poste</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $employee)
                                <tr>
                                    <td>{{ $employee->id }}</td>
                                    <td>{{ $employee->first_name }}</td>
                                    <td>{{ $employee->last_name }}</td>
                                    <td>{{ $employee->login }}</td>
                                    <td>{{ $employee->age }}</td>
                                    <td>{{ $employee->tel }}</td>
                                    <td>{{ $employee->email }}</td>
                                    <td>{{ $employee->address }}</td>
                                    <td>{{ $employee->cni }}</td>
                                    <td>{{ $employee->fonction }}</td>
                                    <td style="min-width: 200px">
                                        <a href="/employee/show/{{$employee->id}}"><button class="btn btn-sm btn-primary">
                                            <i class="fa fa-eye"></i>
                                        </button></a>
                                        <a href="/employee/edit/{{$employee->id}}" style=""><button class="btn btn-sm btn-warning">
                                            <i class="fa fa-pencil"></i>
                                        </button></a>
                                        <form style="display:inline-block" class="delete" action="/employee/destroy/{{$employee->id}}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $employees->links() }}
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
           return confirm("Supprimer cet employé");
        });
    </script>
@endsection

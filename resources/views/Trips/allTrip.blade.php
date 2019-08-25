@extends('layouts.template')
@section('title', 'Listes des voyages')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Listes de voyages</h4>
                    <button onclick="window.location.href='/trip/create'" class="btn btn-primary btn-round ml-auto">
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
                                <th>Ville départ</th>
                                <th>Ville destination</th>
                                <th>Heure départ</th>
                                <th>Date </th>
                                <th>Montant</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($trips as $trip)
                                <tr>
                                    <td>{{ $trip->id }}</td>
                                    <td>{{ $trip->departure }}</td>
                                    <td>{{ $trip->destination }}</td>
                                    <td>{{ $trip->time }}</td>
                                    <td>{{ $trip->date }}</td>
                                    <td>{{ $trip->amount }}</td>
                                    <td style="min-width: 250px">
                                        <a href="/trip/show/{{$trip->id}}"><button class="btn btn-primary">
                                                <i class="fas fa-eye"></i>
                                            </button></a>
                                        <a href="/tickets/{{$trip->id}}"><button class="btn btn-dark">
                                            <i class="fas fa-ticket-alt"></i>
                                        </button></a>
                                        <a href="/trip/edit/{{$trip->id}}" style=""><button class="btn btn-warning">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button></a>
                                        <form style="display:inline-block" class="delete" action="/trip/destroy/{{$trip->id}}" method="POST">
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
                    {{ $trips->links() }}
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
           return confirm("Supprimer ce voyage ?");
        });
    </script>
@endsection
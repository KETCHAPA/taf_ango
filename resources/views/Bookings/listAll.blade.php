@extends('layouts.template')
@section('title', 'Listes des réservations')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Listes de reservations</h4>
                    <button class="btn btn-primary btn-sm btn-round ml-auto" onclick="window.location.href='/booking/create'">
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
                                <th>Nom</th>
                                <th>email</th>
                                <th>CNI</th>
                                <th>téléphone</th>
                                <th>Ligne</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bookings as $booking)
                                <tr>
                                    <td>{{ $booking->id }}</td>
                                    <td>{{ $booking->passenger->first_name }} {{ $booking->passenger->last_name }}</td>
                                    <td>{{ $booking->passenger->email }}</td>
                                    <td>{{ $booking->passenger->cni }}</td>
                                    <td>{{ $booking->passenger->tel }}</td>
                                    <td>{{ $booking->trip->departure }} - {{ $booking->trip->destination }}</td>
                                    <td style="min-width: 250px">
                                        <a href="/booking/show/{{$booking->id}}"><button class="btn btn-sm btn-primary">
                                                <i class="fas fa-eye"></i>
                                            </button></a>
                                        <form style="display:inline-block" action="/booking/confirm/{{$booking->id}}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-dark">
                                                <i class="fas fa-check"></i>
                                            </button>
                                        </form>
                                        <a href="/booking/edit/{{$booking->id}}"><button class="btn btn-sm btn-warning">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button></a>
                                        <form style="display:inline-block" class="delete" action="/booking/destroy/{{$booking->id}}" method="POST">
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
                    {{ $bookings->links() }}
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
           return confirm("Supprimer cette réservation ?");
        });
    </script>
@endsection

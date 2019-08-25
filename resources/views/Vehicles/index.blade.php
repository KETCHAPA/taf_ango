@extends('layouts.template')

@section('title')
    Gestion des véhicules
@endsection

@section('content')
    @include('Vehicles.location')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Gestion des véhicules</h4>
                            <a href="{{ route('vehicles.create') }}" class="btn btn-primary btn-sm btn-round ml-auto">
                                <i class="fa fa-plus"></i>
                                Nouveau véhicule
                            </a>
                            &nbsp;
                            <a href="" class="btn btn-success btn-sm btn-round"  data-toggle="modal"
                            data-target="#locationModal"><i class="fa fa-bus" aria-hidden="true"></i> Location</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="add-row" class="display table table-striped table-hover dataTable"
                                            role="grid" aria-describedby="add-row_info">
                                            <thead>
                                                <tr role="row">
                                                    <th scope="col">#</th>
                                                    <th scope="col">Immatriculation</th>
                                                    <th scope="col">Marque</th>
                                                    <th scope="col">Couleur</th>
                                                    <th scope="col">Modèle</th>
                                                    <th scope="col">Options</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($vehicles as $v)

                                                    <tr>
                                                        <td>{{ $v->id }}</td>
                                                        <td>{{ $v->registration }}</td>
                                                        <td>{{ $v->brand }}</td>
                                                        <td>{{ $v->color }}</td>
                                                        <td>{{ $v->model }}</td>
                                                        <td>
                                                            <a class="btn btn-primary btn-sm" href="{{ route('vehicles.show', $v->id) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                            <a href="{{ route('vehicles.addLocation', $v->id) }}" class="btn btn-success btn-sm" title="Nouvelle location"><i class="icon icon-drop"></i></a>
                                                            <form method="POST" action="{{ route('vehicles.destroy', $v->id) }}" style="display: inline;">
                                                                @csrf
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <button class="btn btn-danger deleteBtn btn-sm"><i class="fa fa-trash"></i></button>
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
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script src="\js/plugin/datatables/datatables.min.js"></script>
<script>
    $(".dataTable").DataTable({
        "language": {
            "emptyTable": "Aucun élément à afficher pour le moment."
        }
    })

    $("#locationsTable").DataTable({
        "language": {
            "emptyTable": "Aucun élément à afficher pour le moment."
        }
    })

    $('.deleteBtn').click(function(e) {
        e.preventDefault()
        var $this = $(this).closest("form")
        swal({
            title: "Êtes-vous sûr ?",
            text: "Une fois supprimé il vous sera impossible de revenir en arrière!",
            icon: 'warning',
            buttons:{
                confirm: {
                    text : 'Oui Supprimer',
                    className : 'btn btn-danger'
                },
                cancel: {
                    visible: true,
                    className: 'btn btn-success'
                }
            }
        }).then((Delete) => {
            if (Delete) {
                $this.submit()
            } else {
                swal.close();
            }
        });
    });

    $('.cancelResa').click(function(e) {
        e.preventDefault()
        var $this = $(this).closest("form")
        swal({
            title: "Êtes-vous sûr ?",
            text: "Une fois annulée il vous sera impossible de revenir en arrière!",
            icon: 'warning',
            buttons:{
                confirm: {
                    text : 'Oui annuler',
                },
                cancel: {
                    visible: true,
                }
            }
        }).then((Delete) => {
            if (Delete) {
                //$this.submit()
                $this.submit()
            } else {
                swal.close();
            }
        });
    });
</script>
@endsection

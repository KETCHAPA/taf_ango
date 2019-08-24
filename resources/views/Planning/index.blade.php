@extends('layouts.template')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Gestion du planning des voyages</h4>
                        <button class="btn btn-primary btn-sm btn-round ml-auto" data-toggle="modal"data-target="#addRowModal">
                            <i class="fa fa-plus"></i>
                            Nouveau
                        </button>
                        &nbsp;
                        <button class="btn btn-success btn-sm btn-round">
                            <i class="fa fa-print" aria-hidden="true"></i>
                            Imprimer le calendrier
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Modal -->
                    <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" style="display: none;"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header border-0">
                                    <h5 class="modal-title">
                                        <span class="fw-mediumbold">
                                            Nouveau</span>
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('plannings.store') }}"id="addForm" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 pr-0">
                                                <div class="form-group form-group-default">
                                                    <label>Date</label>
                                                    <input type="date" name="date" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-group-default">
                                                    <label>Heure</label>
                                                    <input type="time" name="time" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Voyage</label>
                                                    <select name="trip_id" id="" class="form-control">
                                                        @foreach ($trips as $trip)
                                                            <option value="{{ $trip->id }}">{{ $trip->departure }} - {{ $trip->destination }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer border-0">
                                    <button type="button" id="addRowButton" class="btn btn-primary">Sauvegarder</button>
                                    <button type="reset" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="add-row" class="display table table-striped table-hover dataTable"
                                        role="grid" aria-describedby="add-row_info">
                                        <thead>
                                            <tr role="row">
                                                <th scope="col">#</th>
                                                <th scope="col">Départ</th>
                                                <th scope="col">Arrivée</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Heure</th>
                                                <th scope="col">Etat</th>
                                                <th scope="col">Options</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($elements as $item)
                                                <tr>
                                                    <td>{{ $item->id }}</td>
                                                    <td>{{ $item->trip->departure }}</td>
                                                    <td>{{ $item->trip->destination }}</td>
                                                    <td>{{ $item->date }}</td>
                                                    <td>{{ $item->time  }}</td>
                                                    <td><span class="badge badge-{{ $item->getColor() }}">{{ $item->getState() }}</span></td>
                                                    <td>
                                                        @if ($item->cancelled == 0)
                                                            <a href="{{ route('planning.cancel', $item->id) }}" class="btn btn-round btn-danger btn-sm"><i class="icon icon-close"></i></a>
                                                        @else
                                                            <a href="{{ route('planning.cancel', $item->id) }}" class="btn btn-round btn-success btn-sm"><i class="fa fa-check" aria-hidden="true"></i></a>
                                                        @endif
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

    $("#addRowButton").on("click", function(){
        $("#addForm").submit()
    })

    $(".editview").click(function(){
        var id = $(this).attr("data-id")
        $("#viewModal").modal("show")
        $.ajax({
            method: "GET",
            beforeSend: function(xhr){
                $("#viewForm").hide()
            },
            url: "/discipline/"+id,
            success: function(personnel){
                $("#viewNom").val(personnel.first_name)
                $("#viewPrenom").val(personnel.last_name)
                $("#viewAddress").val(personnel.address)
                $("#viewPhone").val(personnel.phone)
                $("#viewPhone").val(personnel.tel)
                $("#viewCNI").val(personnel.cni)
                $("#viewAge").val(personnel.age)
                $("#viewEmail").val(personnel.email)

                $("#viewForm").show()
                $(".preloader").hide()

                $("#presenceBody").empty()
                if(personnel.presences != undefined && personnel.presences.length > 0){
                    for(var p of personnel.presences){
                        console.log(p)
                        $("#presenceBody").append(
                            "<tr>"+
                                `<td>${p.arrival_date}</t>`+
                                `<td>${p.departure_date}</t>`+
                                `<td>-</t>`+
                            "</tr>"
                        )
                    }
                }
                $("#presenceTable").DataTable()
            }, error: function(err){
                console.log(err)
                $("#viewModal").modal("hide")
            }
        })
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
</script>
@endsection

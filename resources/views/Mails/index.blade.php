@extends('layouts.template')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Gestion du courrier/colis</h4>
                        <button class="btn btn-primary btn-sm btn-round ml-auto" data-toggle="modal"data-target="#addRowModal">
                            <i class="fa fa-plus"></i>
                            Nouveau
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
                                    <p class="small">Enregistrer un nouveau courrier/colis</p>
                                    <form action="{{ route('mails.store') }}"id="addForm" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 pr-0">
                                                <div class="form-group form-group-default">
                                                    <label>Expéditeur</label>
                                                    <input id="addPosition" type="text" name="sender" class="form-control"
                                                        placeholder="Jefferson">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-group-default">
                                                    <label>Destinataire</label>
                                                    <input id="addOffice" type="text" name="receiver" class="form-control"
                                                        placeholder="Noé Doe">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Type</label>
                                                    <select name="type" id="" class="form-control">
                                                        <option value="Courrier">Courrier</option>
                                                        <option value="Colis">Colis</option>
                                                        <option value="Autre">Autre</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 pr-0">
                                                <div class="form-group form-group-default">
                                                    <label>Description</label>
                                                    <input id="addPosition" type="text" name="description" required class="form-control"
                                                        placeholder="Ex: Brève description">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-group-default">
                                                    <label>Montant</label>
                                                    <input id="addOffice" type="text" name="amount" required class="form-control"
                                                        placeholder="Ex: 5000">
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
                                                <th scope="col">Expéditeur</th>
                                                <th scope="col">Récepteur</th>
                                                <th scope="col">Type</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">Montant</th>
                                                <th scope="col">Date d'envoi</th>
                                                <th scope="col">Statut</th>
                                                <th scope="col">Options</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($mails as $mail)

                                                <tr>
                                                    <td>{{ $mail->id }}</td>
                                                    <td>{{ $mail->sender }}</td>
                                                    <td>{{ $mail->receiver }}</td>
                                                    <td>{{ $mail->type }}</td>
                                                    <td>{!! $mail->description ?? "<i>Non défini</i>" !!}</td>
                                                    <td>{{ $mail->amount }}</td>
                                                    <td>{{ explode(" ", $mail->created_at)[0] }}</td>
                                                    <td>
                                                        @if ($mail->status == 0)
                                                            <span class="badge badge-default">En attente</span>
                                                        @elseif($mail->status == 1)
                                                            <span class="badge badge-success">Envoyé</span>
                                                        @elseif($mail->status == 2)
                                                            <span class="badge badge-primary">Reçu</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('mails.send', $mail->id) }}" class="btn {{ $mail->status != 0 ? "btn-default" : "btn-success" }} btn-round btn-sm" title="Expédier"><i class="fa fa-paper-plane" aria-hidden="true"></i></a>
                                                        <a href="{{ route('mails.receive', $mail->id) }}" class="btn {{ $mail->status != 2 ? "btn-success" : "btn-default" }} btn-round btn-sm" title="Accusé de réception"><i class="fa fa-reply" aria-hidden="true"></i></a>
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

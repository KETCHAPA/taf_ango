@extends('layouts.template')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Gestion de la discipline</h4>
                        <button class="btn btn-primary btn-sm btn-round ml-auto" data-toggle="modal"
                            data-target="#addRowModal">
                            <i class="fa fa-plus"></i>
                            Nouveau personnel
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
                                        <span class="fw-light">
                                            Personnel
                                        </span>
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p class="small">Enregistrer un nouveau personnel sur l'application.</p>
                                    <form action="{{ route('discipline.store') }}" id="addForm" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 pr-0">
                                                <div class="form-group form-group-default">
                                                    <label>Nom</label>
                                                    <input id="addPosition" type="text" name="first_name"
                                                        class="form-control" placeholder="Jefferson">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-group-default">
                                                    <label>Prenom</label>
                                                    <input id="addOffice" type="text" name="last_name"
                                                        class="form-control" placeholder="Noé">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Adresse</label>
                                                    <input id="addName" type="text" name="address" class="form-control"
                                                        placeholder="Ex: 3ème maison après le collège Monti">
                                                </div>
                                            </div>
                                            <div class="col-md-6 pr-0">
                                                <div class="form-group form-group-default">
                                                    <label>Téléphone</label>
                                                    <input id="addPosition" type="text" name="phone" required
                                                        class="form-control" placeholder="Ex: +237 656 412 854">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-group-default">
                                                    <label>Email</label>
                                                    <input id="addOffice" type="text" name="email" required
                                                        class="form-control" placeholder="Ex: xyz@gmail.com">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group form-group-default">
                                                    <label>CNI</label>
                                                    <input id="addName" type="text" name="cni" required
                                                        class="form-control" placeholder="Ex: 115245128">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group form-group-default">
                                                    <label>Age</label>
                                                    <input type="text" name="age" required class="form-control"
                                                        placeholder="Ex: 26">
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
                                                <th scope="col">Nom</th>
                                                <th scope="col">Prenom</th>
                                                <th scope="col">Téléphone</th>
                                                <th scope="col">E-mail</th>
                                                <th scope="col">Options</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($personnels as $p)

                                            <tr>
                                                <td>{{ $p->id }}</td>
                                                <td>{{ $p->first_name }}</td>
                                                <td>{{ $p->last_name }}</td>
                                                <td>{!! $p->phone ?? "<i>Non défini</i>" !!}</td>
                                                <td>{{ $p->email }}</td>
                                                <td>
                                                    <button data-id="{{ $p->id }}"
                                                        class="btn btn-primary editview btn-sm"><i
                                                            class="icon icon-options"></i>
                                                    </button>
                                                    <button class="btn btn-success btn-sm employeeReport" data-id="{{ $p->id }}" title="Rapport">
                                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                                    </button>
                                                    <form method="POST"
                                                        action="{{ route('discipline.destroy', $p->id) }}"
                                                        style="display: inline;">
                                                        @csrf
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button class="btn btn-danger deleteBtn btn-sm"><i
                                                                class="fa fa-trash"></i></button>
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

<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="small">Détails sur le personnel</p>
                <div class="preloader">
                    <i class="icon icon-disc fa fa-spin"
                        style="vertical-align: middle;line-height: 100px;font-size: 30px;"></i>
                </div>


                <div class="row">
                    <div class="col-5 col-md-4">
                        <div class="nav flex-column nav-pills nav-secondary nav-pills-no-bd nav-pills-icons"
                            id="v-pills-tab-with-icon" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active show" id="v-pills-home-tab-icons" data-toggle="pill"
                                href="#v-pills-home-icons" role="tab" aria-controls="v-pills-home-icons"
                                aria-selected="true">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                Détails
                            </a>
                            <a class="nav-link" id="v-pills-profile-tab-icons" data-toggle="pill"
                                href="#v-pills-profile-icons" role="tab" aria-controls="v-pills-profile-icons"
                                aria-selected="false">
                                <i class="icon icon-map"></i>
                                Présences
                            </a>
                            <a class="nav-link" id="v-pills-add-tab-icons" data-toggle="pill" href="#v-pills-add-icons"
                                role="tab" aria-controls="v-pills-add-icons" aria-selected="false">
                                <i class="icon icon-plus"></i>
                                Nouvelle présence
                            </a>
                            <a class="nav-link" id="v-pills-reports-tab-icons" data-toggle="pill" href="#v-pills-reports-icons"
                                role="tab" aria-controls="v-pills-reports-icons" aria-selected="false">
                                <i class="fa fa-folder" aria-hidden="true"></i>
                                Rapports
                            </a>
                        </div>
                    </div>
                    <div class="col-7 col-md-8">
                        <div class="tab-content" id="v-pills-with-icon-tabContent">
                            <div class="tab-pane fade active show" id="v-pills-home-icons" role="tabpanel"
                                aria-labelledby="v-pills-home-tab-icons">
                                <div class="row">
                                    <div class="col-md-6 pr-0">
                                        <div class="form-group form-group-default">
                                            <label>Nom</label>
                                            <input id="viewNom" type="text" name="first_name" class="form-control"
                                                placeholder="Jefferson">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>Prenom</label>
                                            <input id="viewPrenom" type="text" name="last_name" class="form-control"
                                                placeholder="Noé">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group form-group-default">
                                            <label>Adresse</label>
                                            <input id="viewAddress" type="text" name="address" class="form-control"
                                                placeholder="Ex: 3ème maison après le collège Monti">
                                        </div>
                                    </div>
                                    <div class="col-md-6 pr-0">
                                        <div class="form-group form-group-default">
                                            <label>Téléphone</label>
                                            <input id="viewPhone" type="text" name="phone" required class="form-control"
                                                placeholder="Ex: +237 656 412 854">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>Email</label>
                                            <input id="viewEmail" type="text" name="email" required class="form-control"
                                                placeholder="Ex: xyz@gmail.com">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-group-default">
                                            <label>CNI</label>
                                            <input id="viewCNI" type="text" name="cni" required class="form-control"
                                                placeholder="Ex: 115245128">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-group-default">
                                            <label>Age</label>
                                            <input type="text" name="age" id="viewAge" required class="form-control"
                                                placeholder="Ex: 26">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-profile-icons" role="tabpanel"
                                aria-labelledby="v-pills-profile-tab-icons">
                                <div class="row">
                                    <table id="presenceTable" class="display table table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Date</th>
                                                <th>Heure</th>
                                            </tr>
                                        </thead>
                                        <tbody id="presenceBody">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-add-icons" role="tabpanel"
                                aria-labelledby="v-pills-add-tab-icons">
                                <form action="{{ route('presences.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="user_id" id="userId">
                                    <div class="row">
                                        <div class="col-md-12 pr-0">
                                            <div class="form-group form-group-default">
                                                <label>Personnel</label>
                                                <input id="viewNomPresence" type="text" name="first_name"
                                                    class="form-control" placeholder="Jefferson">
                                            </div>
                                        </div>
                                        <div class="col-md-6 pr-0">
                                            <div class="form-group form-group-default">
                                                <label>Date de présence</label>
                                                <input type="date" name="presence_date" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-6 pr-0">
                                            <div class="form-group form-group-default">
                                                <label>Heure de présence</label>
                                                <input type="time" name="presence_time" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <button class="btn btn-primary">Enregistrer</button>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="v-pills-reports-icons" role="tabpanel"
                                aria-labelledby="v-pills-reports-tab-icons">
                                <table id="reportTable" class="table display table-striped">
                                        <thead>
                                            <tr>
                                            <th>#</th>
                                            <th>Titre</th>
                                            <th>Description</th>
                                        </tr>
                                    </thead>
                                    <tbody id="reportRows">
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

<div class="modal fade" id="reportModal" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="reportForm" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 pr-0">
                            <div class="form-group form-group-default">
                                <label>Type de rapport</label>
                                <select name="report_type_id" id="" class="form-control">
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 pr-0">
                            <div class="form-group form-group-default">
                                <label>Employé</label>
                                <select name="employe_id" id="" class="form-control">
                                    @foreach ($personnels as $item)
                                        <option value="{{ $item->id }}">{{ $item->first_name }} {{ $item->last_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 pr-0">
                            <div class="form-group form-group-default">
                                <label>Titre</label>
                                <input type="text" name="title" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>Rapport</label>
                                <textarea name="description" class="form-control" id="" cols="30" rows="10" placeholder="Contenu du rapport"></textarea>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-sm">Sauvegarder</button>
                    <button class="btn btn-default btn-sm" data-dismiss="modal">Fermer</button>
                </form>
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

    $("#addRowButton").on("click", function () {
        $("#addForm").submit()
    })

    $(".editview").click(function () {
        var id = $(this).attr("data-id")
        $("#viewModal").modal("show")
        $.ajax({
            method: "GET",
            beforeSend: function (xhr) {
                $("#viewForm").hide()
            },
            url: "/discipline/" + id,
            success: function (personnel) {
                $("#viewNomPresence").val(`${personnel.first_name} ${personnel.last_name}`)
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

                $("#userId").val(personnel.id)

                $("#presenceBody").empty()
                if (personnel.presences != undefined && personnel.presences.length > 0) {
                    for (var p of personnel.presences) {
                        $("#presenceBody").append(
                            "<tr>" +
                            `<td>${p.id}</t>` +
                            `<td>${p.presence_date}</t>` +
                            `<td>${p.presence_time}</t>` +
                            "</tr>"
                        )
                    }
                }

                $("#reportRows").empty()
                if(personnel.reports != undefined && personnel.reports.length > 0){
                    for(var r of personnel.reports){
                        $("#reportRows").append(
                            "<tr>" +
                                `<td>${r.id}</t>` +
                                `<td>${r.title}</t>` +
                                `<td>${r.description}</t>` +
                            "</tr>"
                        )
                    }
                }
                $("#reportTable").DataTable()
                $("#presenceTable").DataTable()
            }, error: function (err) {
                console.log(err)
                $("#viewModal").modal("hide")
            }
        })
    })

    $('.deleteBtn').click(function (e) {
        e.preventDefault()
        var $this = $(this).closest("form")
        swal({
            title: "Êtes-vous sûr ?",
            text: "Une fois supprimé il vous sera impossible de revenir en arrière!",
            icon: 'warning',
            buttons: {
                confirm: {
                    text: 'Oui Supprimer',
                    className: 'btn btn-danger'
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

    $(".employeeReport").click(function(){
        var id = $(this).attr("data-id")
        var uri = `personnel/${id}/report`
        $("#reportForm").attr("action", uri)
        $("#reportModal").modal("show")
    })
</script>
@endsection

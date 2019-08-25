<div class="modal fade" id="locationModal" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">
                        Locations</span>
                    <span class="fw-light">
                        de véhicules
                    </span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="small">Détails sur les locations de véhicules</p>
                    <div class="row">
                        <div class="col-2 col-md-2">
                            <div class="nav flex-column nav-pills nav-secondary nav-pills-no-bd nav-pills-icons"
                                id="v-pills-tab-with-icon" role="tablist" aria-orientation="vertical">
                                <a class="nav-link active show" id="v-pills-home-tab-icons" data-toggle="pill"
                                    href="#v-pills-home-icons" role="tab" aria-controls="v-pills-home-icons"
                                    aria-selected="true">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                    Tout
                                </a>
                            </div>
                        </div>
                        <div class="col-10 col-md-10">
                            <div class="tab-content" id="v-pills-with-icon-tabContent">
                                <div class="tab-pane fade active show" id="v-pills-home-icons" role="tabpanel"
                                    aria-labelledby="v-pills-home-tab-icons">

                                    <table id="locationsTable" class="display table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Véhicule</th>
                                                <th>Nom de l'emprunteur</th>
                                                <th>Date d'emprunt</th>
                                                <th>Durée</th>
                                                <th>Montant</th>
                                                <th>Statut</th>
                                                <th>Options</th>
                                            </tr>
                                        </thead>
                                        <tbody class="shortified-table">
                                            @foreach ($locations as $location)
                                                <tr>
                                                    <td>{{ $location->vehicle->registration }}</td>
                                                    <td>{{ $location->borrower_name }}</td>
                                                    <td>{{ $location->location_date }}</td>
                                                    <td>{{ $location->duration }}</td>
                                                    <td>{{ $location->amount }}</td>
                                                    <td>
                                                        <span class="badge badge-{{ $location->getColor() }}">
                                                                {{ $location->getStatus() }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('locations.edit', $location->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                        @if (!$location->cancelled)
                                                            <form action="{{ route('locations.cancel', $location->id) }}" method="POST">
                                                                @csrf
                                                                <button class="btn btn-danger btn-sm cancelResa" title="Annuler la réservation"><i class="icon icon-close"></i></button>
                                                            </form>
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
            <div class="modal-footer border-0">
                <button type="reset" class="btn btn-default" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>

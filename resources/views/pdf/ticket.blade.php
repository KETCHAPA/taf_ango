<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="\css/bootstrap.min.css">
    <style>
    td {
        text-align: left;
        padding-right: 200px;
    }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <h2>Ticket du passager n° {{ $ticket->id }}</h2>
        </div>
        <div class="row">
            <h3>Informations sur le voyage</h3>
        </div>
        <br />
        <table>
            <tbody>
                <tr>
                    <td>Ville de départ: <strong>{{ $trip->departure }}</strong></td>
                    <td>Ville de destination: <strong>{{ $trip->destination }}</strong></td>
                </tr>
                <tr>
                    <td>Date: <strong>{{ $trip->date }}</strong></td>
                    <td>Heure: <strong>{{ $trip->time }}</strong></td>
                </tr>
                <td>Montant: <strong>{{ $trip->amount }} Frs</strong></td>
            </tbody>
        </table>
        <br />
        <div class="row">
            <h3>Informations sur le client</h3>
        </div>
        <br />
        <table>
            <tbody>
                <tr>
                    <td>Nom du client: <strong>{{ strtoupper($ticket->first_name) }} {{ strtoupper($ticket->last_name) }}</strong></td>
                    <td>Email: <strong>{{ $ticket->email }}</strong></td>
                </tr>
                <tr>
                    <td>Numéro de CNI: <strong>{{ $ticket->cni }}</strong></td>
                    <td>Téléphone: <strong>{{ $ticket->tel }}</strong></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
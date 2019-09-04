<!DOCTYPE html>
<html>
    <head>
        <style>
            table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            td, th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }

            tr:nth-child(even) {
                background-color: #dddddd;
            }
        </style>
    </head>
    <body>

        <h2>Listes des passagers du voyage {{ $trip->departure }} - {{ $trip->destination }} </h2>

        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>email</th>
                    <th>Téléphone</th>
                    <th>CNI</th>
                    <th>Bagages</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tickets as $ticket)
                    <tr>
                        <td>{{ $ticket->id }}</td>
                        <td>{{ $ticket->passenger->first_name }}</td>
                        <td>{{ $ticket->passenger->last_name }}</td>
                        <td>{{ $ticket->passenger->email }}</td>
                        <td>{{ $ticket->passenger->tel }}</td>
                        <td>{{ $ticket->passenger->cni }}</td>
                        <td>
                            <ul>
                                @foreach ($ticket->passenger->bagages as $bagage)
                                    <li>{{ $bagage->poids }} Kg - {{ $bagage->description }}</li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </body>
</html>

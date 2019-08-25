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
                </tr>
            </thead>
            <tbody>
                @foreach ($tickets as $ticket)
                    <tr>
                        <td>{{ $ticket->id }}</td>
                        <td>{{ $ticket->first_name }}</td>
                        <td>{{ $ticket->last_name }}</td>
                        <td>{{ $ticket->email }}</td>
                        <td>{{ $ticket->tel }}</td>
                        <td>{{ $ticket->cni }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </body>
</html>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <title>Calendrier de voyages</title>
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    </head>
    <body>
        <h4 class="text-center">Calendrier de voyages</h4>
        <br>
        <br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Départ</th>
                    <th>Arrivée</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Etat</th>
                </tr>
            </thead>
            <tbody>
               @foreach ($plannings as $planning)
               <tr>
                    <td>{{ $planning->id }}</td>
                    <td>{{ $planning->trip->departure }}</td>
                    <td>{{ $planning->trip->destination }}</td>
                    <td>{{ $planning->date }}</td>
                    <td>{{ $planning->time }}</td>
                    <td>
                        <span class="badge badge-{{ $planning->getColor() }}">
                            {{ $planning->getState() }}
                        </span>
                    </td>
                </tr>
               @endforeach
            </tbody>
        </table>
    </body>
</html>

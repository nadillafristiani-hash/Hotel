<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dataTables.dataTables.min.css') }}">
    <script src="{{ asset('js/dataTables.min.js') }}"></script>
    <title>Document</title>
</head>
<body>
    @include('nav')
    <div class="container mt-5">
        <div class="card shadow p-4" >
        <table class="table" id="homeadmin">
            <thead>
                <tr>
                    <th>Nomer</th>
                    <th>Nama Tamu</th>
                    <th>No Telpon</th>
                    <th>No Identitas</th>
                    <th>email</th>
                    <th>checkin</th>
                    <th>checkout</th>
                    <th>total_harga</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($reservation as $c)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$c->customer->name}}</td>
                    <td>{{$c->customer->no_hp}}</td>
                    <td>{{$c->customer->no_identitas}}</td>
                    <td>{{$c->customer->email}}</td>
                    <td>{{$c->checkin}}</td>
                    <td>{{$c->checkout}}</td>
                    <td>{{$c->total_harga}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
    <script>new DataTable('#homeadmin');</script>
</body>
</html>
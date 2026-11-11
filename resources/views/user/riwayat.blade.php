<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dataTables.dataTables.min.css') }}">
    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('js/dataTables.min.js') }}"></script>
    <title>Document</title>
</head>
<body>
    @include('nav')
    <div class="container mt-5">
    <h3>Riwayat Booking</h3>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered" id="riwayat">
        <thead>
            <tr>
                <th>Customer</th>
                <th>Kamar</th>
                <th>Check In</th>
                <th>Check Out</th>
                <th>Total Harga</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservations as $item)
            <tr>
                <td>{{ $item->customer->name }}</td>
                <td>{{ $item->room->name }}</td>
                <td>{{ $item->checkin }}</td>
                <td>{{ $item->checkout }}</td>
                <td>Rp{{ number_format($item->total_harga) }}</td>
                <td>{{ $item->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('home') }}" class="btn btn-primary">Kembali</a>
</div>
    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
    <script>new DataTable('#riwayat');</script>
</body>
</html>
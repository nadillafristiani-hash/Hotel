<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>Document</title>
</head>
<body>
    <div class="container mt-5">
        <form action="" method="POST">
            @csrf
            <div class="row">
            <div class="col-6">
                <div class="card">
                    <img src="{{ asset('storage/'. $room->foto) }}" alt="" class="card-img-top" width="500px" height="500px">
                </div>
            </div>

            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">{{$room->name}}</h3>
                            <h5 class="card-text">{{$room->type}}</h5>
                            <p class="card-text">Rp.{{number_format($room->harga, 0,',', '.')}}</p>
                                <input type="number" class="form-control" name="banyak" placeholder="berapa lama menginap" required>
                                <hr>
                                <h5>Deskripsi</h5>
                            <p class="card-title">{{$room->deskripsi}}</p>
                            <h5>Fasilitas Tersedia:</h5>
                            <p class="card-title">{{$room->fasilitas}}</p>
                    </div>
                </div>
                <a href="{{ route('reservasi', $room->id) }}" class="btn btn-success">Booking Sekarang</a>
            </div>
                
        </div>
        </form>
    </div>
    
    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservasi Kamar</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
@include('nav')

@php
    $lama = (strtotime($checkout) - strtotime($checkin)) / (60 * 60 * 24);
    $total = $type->harga * $lama;
@endphp

<div class="container mt-5 mb-5">
    <h3 class="mb-4">Reservasi Kamar</h3>

    <div class="row">
        <div class="col-md-5">
            <div class="card">
                <img src="{{ asset('storage/'.$type->foto) }}"
                     class="card-img-top"
                     style="height: 280px; object-fit: cover;">

                <div class="card-body">
                    <h4>{{ $room->name }}</h4>
                    <p>Tipe: {{ $type->name }}</p>
                    <p>{{ $type->deskripsi }}</p>
                    <p>Fasilitas: {{ $type->fasilitas }}</p>

                    <h5 class="text-primary">
                        Rp{{ number_format($type->harga, 0, ',', '.') }} / malam
                    </h5>
                </div>
            </div>
        </div>

        <div class="col-md-7">
            <div class="card p-4">
                <form action="{{ route('booking') }}" method="POST">
                    @csrf

                    <input type="hidden" name="room_id" value="{{ $room->id }}">

                    <h5 class="mb-3">Data Customer</h5>

                    <div class="mb-3">
                        <label>Nama Lengkap</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Nomor HP</label>
                        <input type="text" name="no_hp" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Nomor Identitas</label>
                        <input type="text" name="no_identitas" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control" required></textarea>
                    </div>

                    <hr>

                    <h5 class="mb-3">Data Reservasi</h5>

                    <div class="mb-3">
                        <label>Check In</label>
                        <input type="date" name="checkin"
                            class="form-control"
                            value="{{ $checkin }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label>Check Out</label>
                        <input type="date" name="checkout"
                            class="form-control"
                            value="{{ $checkout }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label>Harga / Malam</label>
                        <input type="text" class="form-control"
                            value="Rp{{ number_format($type->harga, 0, ',', '.') }}"
                            readonly>
                    </div>

                    <div class="mb-3">
                        <label>Lama Menginap</label>
                        <input type="text" class="form-control"
                            value="{{ $lama }} Hari"
                            readonly>
                    </div>

                    <div class="mb-3">
                        <label>Total Harga</label>
                        <input type="text" class="form-control fw-bold text-primary"
                            value="Rp{{ number_format($total, 0, ',', '.') }}"
                            readonly>
                    </div>

                    @if($sudahDipesan)
                        <button type="button" class="btn btn-secondary" disabled>
                            Sudah Terisi
                        </button>
                    @else
                        <button type="submit" class="btn btn-primary">
                            Booking Sekarang
                        </button>
                    @endif

                    <a href="{{ route('home') }}" class="btn btn-secondary">
                        Kembali
                    </a>

                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>




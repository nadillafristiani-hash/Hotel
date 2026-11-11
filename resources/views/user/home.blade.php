
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dataTables.dataTables.min.css') }}">
    <script src="{{ asset('js/dataTables.min.js') }}"></script>
    <title>Home</title>
</head>
<body>

    @include('nav')

    @include('user.filter')

    <div class="container">
        <div class="row">
            @if(request('checkin') && request('checkout'))

                {{-- TAMPILKAN ROOM SETELAH FILTER --}}
                @foreach ($type as $t)
                    @foreach (($t->room ?? collect()) as $r)
                        <div class="col-3 mt-5">
                            <div class="card" style="18rem;">

                                <img src="{{ asset('storage/'.$t->foto) }}"
                                    height="250px" width="300px">

                                <div class="card-body">
                                    <h4>{{ $r->name }}</h4>
                                    <h6>{{ $t->name }}</h6>
                                    <h6>Rp. {{ $t->harga }} / malam</h6>
                                    <p>{{ $t->deskripsi }}</p>
                                    <p>Fasilitas: {{ $t->fasilitas }}</p>

                                    <a href="{{ route('reservasi', $r->id) }}?checkin={{ request('checkin') }}&checkout={{ request('checkout') }}"
                                        class="btn btn-primary w-100">
                                        Reservasi
                                    </a>
                                </div>

                            </div>
                        </div>
                    @endforeach
                @endforeach

                @if($type->sum(fn($t) => $t->room->count()) == 0)
                    <p class="text-center mt-5">Tidak ada kamar tersedia.</p>
                @endif

            @else

                {{-- TAMPILKAN TYPE SEBELUM FILTER --}}
                @foreach ($type as $t)
                    <div class="col-3 mt-5">
                        <div class="card" style="18rem;">

                            <img src="{{ asset('storage/'.$t->foto) }}"
                                height="250px" width="300px">

                            <div class="card-body">
                                <h6>{{ $t->name }}</h6>
                                <h6>Rp. {{ $t->harga }} / malam</h6>
                                <p>{{ $t->deskripsi }}</p>
                                <p>Fasilitas: {{ $t->fasilitas }}</p>
                            </div>

                        </div>
                    </div>
                @endforeach

            @endif

        </div>
    </div>

    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>

</body>
</html>

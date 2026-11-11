<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dataTables.dataTables.min.css') }}">

    <title>Data Room</title>
</head>
<body>

    @include('nav')

    <div class="container mt-5 mb-5">
        <div class="card shadow p-4">

            <h3>Data Room</h3>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <a href="{{ route('tambah') }}" class="btn btn-success mb-3">
                Tambah Room
            </a>

            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="room">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kamar</th>
                            <th>Harga</th>
                            <th>Type</th>
                            <th>Deskripsi</th>
                            <th>Fasilitas</th>
                            <th>Foto</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($room as $c)
                        @php
                            $reservasi = $c->reservations->sortByDesc('id')->first();
                        @endphp

                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td>{{ $c->name }}</td>

                            <td>
                                Rp{{ number_format($c->type->harga, 0, ',', '.') }}
                            </td>

                            <td>{{ $c->type->name }}</td>

                            <td>{{ $c->type->deskripsi }}</td>

                            <td>{{ $c->type->fasilitas }}</td>

                            <td>
                                <img src="{{ asset('storage/'.$c->type->foto) }}"
                                    width="100" alt="Foto Kamar">
                            </td>

                            <td>
                                @if ($reservasi)
                                    <form action="{{ route('poststatus', $reservasi->id) }}" method="POST">
                                        @csrf

                                        <select name="status" class="form-select"
                                            onchange="this.form.submit()">

                                            <option value="kosong"
                                                {{ $reservasi->status == 'kosong' ? 'selected' : '' }}>
                                                Kosong
                                            </option>

                                            <option value="terisi"
                                                {{ $reservasi->status == 'terisi' ? 'selected' : '' }}>
                                                Terisi
                                            </option>

                                        </select>
                                    </form>
                                @else
                                    <span class="badge bg-success">Kosong</span>
                                @endif
                            </td>

                            <td>
                                @if (!$reservasi || $reservasi->status == 'kosong')
                                    <a href="{{ route('edit', $c->id) }}"
                                        class="btn btn-warning btn-sm">
                                        Edit
                                    </a>
                                @else
                                    <button class="btn btn-warning btn-sm" disabled>
                                        Edit
                                    </button>
                                @endif

                                <a href="{{ route('hapus', $c->id) }}"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus kamar ini?')">
                                    Hapus
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('js/dataTables.min.js') }}"></script>

    <script>
        new DataTable('#room');
    </script>

</body>
</html>
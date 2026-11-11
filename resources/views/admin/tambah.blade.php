<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>Tambah Room</title>
</head>
<body>

    @include('nav')

    <div class="container mt-5 mb-5">
        <div class="card shadow p-4">

            <h3>Tambah Room</h3>

            <form action="{{ route('posttambah') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label>Nama Kamar</label>
                    <input type="text" name="name" class="form-control"
                        placeholder="Masukkan nama kamar" required>
                </div>

                <div class="mb-3">
                    <label>Type Kamar</label>
                    <select name="type_id" class="form-control" required>
                        <option value="">Pilih Type Kamar</option>
                        @foreach ($type as $t)
                            <option value="{{ $t->id }}">
                                {{ $t->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">
                    Simpan
                </button>

                <a href="{{ route('rooma') }}" class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>
    </div>

</body>
</html>
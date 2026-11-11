<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>Edit Room</title>
</head>
<body>

    <div class="container min-vh-100 d-flex justify-content-center align-items-center">
        <div class="card shadow p-4" style="width: 50rem;">

            <form action="{{ route('postedit', $room->id) }}" method="POST">
                @csrf

                <div class="d-flex justify-content-center mb-3">
                    <h3>Edit Room</h3>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Kamar</label>
                    <input type="text" name="name"
                        value="{{ $room->name }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Type Kamar</label>
                    <select name="type_id" class="form-control" required>
                        <option value="">Pilih Type</option>

                        @foreach ($type as $t)
                            <option value="{{ $t->id }}"
                                {{ $room->type_id == $t->id ? 'selected' : '' }}>
                                {{ $t->name }}
                            </option>
                        @endforeach

                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Edit</button>
                <a href="{{ route('rooma') }}" class="btn btn-secondary">Kembali</a>

            </form>

        </div>
    </div>

    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>

</body>
</html>

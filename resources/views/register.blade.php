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
    <div class="container min-vh-100 d-flex justify-content-center align-items-center">
        <div class="card shadow p-4" style="width: 25rem;">
            <form action="{{ route('postregister') }}" method="POST" class="form-control">
                @csrf

                <h4>Register</h4>

                <div class="mb-3">
                    <div class="form-label">Nama Lengkap</div>
                    <input type="name" name="name" class="form-control">
                </div>

                <div class="mb-3">
                    <div class="form-label">Email</div>
                    <input type="email" name="email" class="form-control">
                </div>

                <div class="mb-3">
                    <div class="form-label">Password</div>
                    <input type="password" name="password" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
                <p>sudah punya akun? <a href="{{ route('login') }}">Login</a></p>
            </form>
        </div>
    </div>
    
    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f9;
        }

        .login-card {
            max-width: 400px;
            margin: 100px auto;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card login-card shadow-sm border-0">
            <div class="card-body p-4">
                <h5 class="fw-bold mb-1 text-center">Sistem Manajemen Blog</h5>
                <p class="text-muted text-center mb-4" style="font-size:13px;">Silakan login untuk melanjutkan</p>

                @if($errors->any())
                <div class="alert alert-danger py-2" style="font-size:13px;">
                    {{ $errors->first() }}
                </div>
                @endif

                <form action="{{ route('login.proses') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-semibold" style="font-size:13px;">Username</label>
                        <input type="text" name="user_name" class="form-control"
                            value="{{ old('user_name') }}" placeholder="Masukkan username">
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-semibold" style="font-size:13px;">Password</label>
                        <input type="password" name="password" class="form-control"
                            placeholder="Masukkan password">
                    </div>
                    <button type="submit" class="btn btn-success w-100">Masuk</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background-color: #fff4f2;
            font-family: 'Segoe UI', sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-card {
            background-color: #fff;
            padding: 30px 40px;
            border-radius: 15px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            max-width: 900px;
            width: 100%;
            display: flex;
            overflow: hidden;
        }

        .login-image {
            flex: 1;
            background: url('img/cherry-blossom.png') center center/cover no-repeat;
            border-top-left-radius: 15px;
            border-bottom-left-radius: 15px;
            min-height: 350px;
        }

        .login-form {
            flex: 1;
            padding: 20px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .btn-login {
            background-color: #ffc7bd;
            color: #3a3a3a;
            font-weight: 600;
            transition: background-color 0.3s ease;
            border: none;
        }

        .btn-login:hover {
            background-color: #e6a69b;
            color: #222;
        }

        .form-label {
            font-weight: 600;
            color: #c75b5b;
        }

        .form-links {
            margin-top: 15px;
            text-align: center;
            font-size: 0.9rem;
        }

        .form-links a {
            color: #c75b5b;
            text-decoration: none;
            margin: 0 10px;
            transition: color 0.3s ease;
        }

        .form-links a:hover {
            color: #a94442;
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .login-card {
                flex-direction: column;
                max-width: 400px;
            }

            .login-image {
                border-radius: 15px 15px 0 0;
                min-height: 200px;
            }

            .login-form {
                padding: 30px 20px;
            }
        }
    </style>
</head>

<body>
    <div class="login-card">
        <div class="login-image"></div>
        <div class="login-form">
            <h3 class="mb-4 text-center" style="color:#c75b5b;">Masuk ke Akun</h3>
            @if ($errors->has('login_fail'))
                <div class="alert alert-danger">
                    {{ $errors->first('login_fail') }}
                </div>
            @endif
            <form action="/login" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Alamat Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukan Email"
                        value="{{ old('email') }}" />
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label">Kata Sandi</label>
                    <input type="password" class="form-control" id="password" name="password"
                        placeholder="Masukkan kata sandi" />
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-login w-100 py-2 rounded-pill">Masuk</button>
            </form>

            <div class="form-links">
                <a href="/lupa-password">Lupa Password?</a>
                <span>|</span>
                <a href="/registrasi">Registrasi</a>
            </div>
        </div>
    </div>
</body>

</html>

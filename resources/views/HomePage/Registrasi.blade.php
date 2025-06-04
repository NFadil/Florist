<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Registrasi</title>
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

        .register-card {
            background-color: #fff;
            padding: 30px 40px;
            border-radius: 15px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
        }

        .form-label {
            font-weight: 600;
            color: #c75b5b;
        }

        .btn-register {
            background-color: #ffc7bd;
            color: #3a3a3a;
            font-weight: 600;
            transition: background-color 0.3s ease;
            border: none;
        }

        .btn-register:hover {
            background-color: #e6a69b;
            color: #222;
        }

        .required-star {
            color: #c75b5b;
            margin-left: 2px;
        }
    </style>
</head>

<body>
    <div class="register-card">
        <h3 class="mb-4 text-center" style="color:#c75b5b;">Form Registrasi</h3>
        <form action="/registrasi" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username<span class="required-star">*</span></label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username Anda"
                    required />
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email<span class="required-star">*</span></label>
                <input type="email" class="form-control" id="email" name="email" placeholder="email@example.com"
                    required />
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap<span class="required-star">*</span></label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama lengkap Anda"
                    required />
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat<span class="required-star">*</span></label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Alamat lengkap" required></textarea>
            </div>
            <div class="mb-3">
                <label for="kodepos" class="form-label">Kode Pos</label>
                <input type="text" class="form-control" id="kodepos" name="kodepos" placeholder="Kode Pos" />
            </div>
            <div class="mb-3">
                <label for="nohp" class="form-label">No. HP</label>
                <input type="tel" class="form-control" id="nohp" name="nohp" placeholder="08xxxxxxxxxx" />
            </div>
            <button type="submit" class="btn btn-register w-100 py-2 rounded-pill">Daftar</button>
        </form>
    </div>
</body>

</html>

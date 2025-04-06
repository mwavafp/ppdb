<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registration Details</title>
    <style>
        body {
            background-color: #f3f4f6;
            font-family: Arial, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
        }

        .card {
            background-color: #ffffff;
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 32px;
            width: 100%;
            max-width: 500px;
        }

        .header {
            display: flex;
            align-items: center;
            margin-bottom: 24px;
        }

        .header img {
            height: 48px;
            width: 48px;
            margin-right: 16px;
        }

        .header h2 {
            font-size: 20px;
            font-weight: bold;
            color: #1f2937;
            margin: 0;
        }

        .header p {
            font-size: 14px;
            color: #6b7280;
            margin: 4px 0 0;
        }

        .divider {
            border-bottom: 1px solid #000;
            margin: 16px 0;
        }

        .field-group {
            margin-bottom: 16px;
        }

        .label {
            font-size: 14px;
            color: #6b7280;
            margin: 0;
        }

        .value {
            font-size: 18px;
            font-weight: 500;
            color: #1f2937;
            margin: 4px 0 0;
        }

        .footer {
            margin-top: 24px;
            font-size: 12px;
            color: #6b7280;
        }
    </style>
</head>

<body>
    <div class="card">
        <!-- Header -->
        <div class="header">
            <img src="images/logo-yysn.png" alt="Logo">

            <div>
                <h2>YAYASAN NURUL HUDA</h2>
                <p>Kartu Akun Siswa</p>
            </div>
        </div>

        <div class="divider"></div>

        <!-- User Info -->
        <div class="field-group">
            <p class="label">Name</p>
            <p class="value">{{ $user->name }}</p>
        </div>
        <div class="field-group">
            <p class="label">Alamat</p>
            <p class="value">{{ $user->alamat }}</p>
        </div>
        <div class="field-group">
            <p class="label">Unit Pendidikan Terdaftar</p>
            <p class="value">{{ $identity['unitPendidikan'] }}</p>
        </div>
        <div class="field-group">
            <p class="label">Status Terdaftar Siswa</p>
            <p class="value">{{ $identity['tipeSiswa'] }}</p>
        </div>

        <div class="divider"></div>

        <!-- Account Info -->
        <div class="field-group">
            <p class="label">Username</p>
            <p class="value">{{ $user->username }}</p>
        </div>
        <div class="field-group">
            <p class="label">Password</p>
            <p class="value">{{ $identity['plainPassword'] }}</p>
        </div>

        <!-- Note -->
        <div class="footer">
            TOLONG SIMPAN KARTU INI!!!
        </div>
    </div>
</body>

</html>

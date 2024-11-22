<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Jenjang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            width: 100%;
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: orange;
            color: white;
            text-align: center;
            padding: 10px 0;
        }
        .container {
            display: flex;
            justify-content: space-between;
            padding: 20px;
        }
        .column {
            width: 45%;
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
        }
        .column h3 {
            background-color: orange;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .checkbox {
            display: flex;
            align-items: center;
            margin: 10px 0;
        }
        .checkbox input {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Informasi Jenjang</h1>
    </div>
    <div class="container">
        <div class="column">
            <h3>Alur Pendaftaran dan Jadwal</h3>
            <ul>
                <li>Prestasi Akademik</li>
                <li>Prestasi Non Akademik</li>
            </ul>
        </div>
        <div class="column">
            <h3>Berkas yang Harus Disiapkan</h3>
            <div class="checkbox">
                <input type="checkbox" id="akademik">
                <label for="akademik">Prestasi Akademik</label>
            </div>
            <div class="checkbox">
                <input type="checkbox" id="non-akademik">
                <label for="non-akademik">Prestasi Non Akademik</label>
            </div>
            <div class="checkbox">
                <input type="checkbox" id="disabilitas">
                <label for="disabilitas">Penyandang Disabilitas</label>
            </div>
            <div class="checkbox">
                <input type="checkbox" id="dtks">
                <label for="dtks">Kip Plus / Nurul Huda / KPJ / PIP (terdaftar dalam DTKS)</label>
            </div>
        </div>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>TANGGAL</th>
                <th>NAMA DONATUR</th>
                <th>NOMINAL</th>
                <th>SALDO</th>
                <th>BUKTI TRANSFER</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ Carbon\Carbon::parse($data->created_at)->isoFormat('dddd'.', ' .'D MMMM Y') }}</td>
                <td>{{$data->nama_donatur}}</td>
                <td>Rp, {{ number_format($data->nominal_donasi) }}</td>
                <td>Rp, {{ number_format($data->saldo) }}</td>
                <td>
                    <img src="{{ public_path('file/bukti_transfer/'.$data->bukti_transfer)}}" alt="" width="120px">
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>
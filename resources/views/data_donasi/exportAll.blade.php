<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
                <th>No</th>
                <th>NAMA DONATUR</th>
                <th>NOMINAL DONASI</th>
                <th>TANGGAL</th>
                <th>BUKTI TRANSFER</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $row)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$row->nama_donatur}}</td>
                    <td>Rp, {{ number_format($row->nominal_donasi) }}</td>
                    <td>{{ Carbon\Carbon::parse($row->created_at)->isoFormat('dddd'.', ' .'D MMMM Y') }}</td>
                    <td>
                        <img src="{{ public_path('file/bukti_transfer/'.$row->bukti_transfer)}}" alt="" width="120px">
                    </td> 
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
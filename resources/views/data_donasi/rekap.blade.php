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
<h2>DATA DONASI</h2>
<body>
    <table>
        <thead>
            <tr>
                <th style="width: 3px">NO</th>
                <th>TANGGAL</th>
                <th>NOMINAL</th>
                <th>NAMA DONATUR</th>
                <th>SALDO</th>
                <th>BUKTI</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($donasi as $row)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{Carbon\Carbon::parse($row->tanggal_donasi)->isoformat('D-MMMM-YYYY')}}</td>
                    <td>{{number_format($row->nominal_donasi)}}</td>
                    <td>{{$row->nama_donatur}}</td>
                    <td>{{number_format($row->saldo)}}</td>
                    <td>
                        <img src="{{asset('file/bukti_transfer/'.$row->bukti_transfer)}}" alt="" width="100px">
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="6" class="alert alert-info">Total Donasi : Rp, {{number_format($totalDonasi)}}</td>
                </tr>
        </tbody>
    </table>
</body>
</html>
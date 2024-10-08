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
        <h2>DATA PENGELUARAN</h2>
        <thead>
            <tr>
                <th style="width: 3px">NO</th>
                <th>TANGGAL</th>
                <th>NOMINAL</th>
                <th>KETERANGAN</th>
                <th>BUKTI</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengeluaran as $row)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{Carbon\Carbon::parse($row->tanggal_pengeluaran)->isoformat('D-MMMM-YYYY')}}</td>
                    <td>{{$row->nominal}}</td>
                    <td>{{$row->keterangan}}</td>
                    <td>
                        <img src="{{asset('file/bukti_pembayaran/'.$row->bukti_pembayaran)}}" alt="" width="100px">
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
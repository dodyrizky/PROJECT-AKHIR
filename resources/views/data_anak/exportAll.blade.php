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
                <th>Nama</th>
                <th>NIK</th>
                <th>NO KK</th>
                <th>Jenis Kelamin</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Umur</th>
                <th>Status Anak</th>
                <th>Hubungan Dalam Keluarga</th>
                <th>Asal Desa</th>
                <th>Tahun Masuk</th>
                <th>Kelas</th>
                <th>Sekolah</th>
                <th>Perkiraan Tahun Keluar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $row)
                <tr>
                    <td>{{$loop->iteration}}</td>  
                    <td>{{$row->nama}}</td>  
                    <td>{{$row->NIK}}</td>  
                    <td>{{$row->no_kk}}</td>  
                    <td>{{$row->jenis_kelamin}}</td>  
                    <td>{{$row->tempat_lahir}}</td>  
                    <td>{{$row->tanggal_lahir}}</td>  
                    <td>{{$row->umur}} Tahun</td>  
                    <td>{{$row->status_anak}}</td>  
                    <td>{{$row->hubungan_dalam_keluarga}}</td>  
                    <td>{{$row->asal_desa}}</td>  
                    <td>{{$row->tahun_masuk}}</td>  
                    <td>{{$row->kelas}}</td>  
                    <td>{{$row->sekolah}}</td>  
                    <td>{{$row->tahun_keluar_panti}}</td>  
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
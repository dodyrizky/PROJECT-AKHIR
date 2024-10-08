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
            <tr>
                <td>{{$data->nama}}</td>  
                <td>{{$data->NIK}}</td>  
                <td>{{$data->no_kk}}</td>  
                <td>{{$data->jenis_kelamin}}</td>  
                <td>{{$data->tempat_lahir}}</td>  
                <td>{{$data->tanggal_lahir}}</td>  
                <td>{{$data->umur}} Tahun</td>  
                <td>{{$data->status_anak}}</td>  
                <td>{{$data->hubungan_dalam_keluarga}}</td>  
                <td>{{$data->asal_desa}}</td>  
                <td>{{$data->tahun_masuk}}</td>  
                <td>{{$data->kelas}}</td>  
                <td>{{$data->sekolah}}</td>  
                <td>{{$data->tahun_keluar_panti}}</td>  
            </tr>
        </tbody>
    </table>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
    @extends('sidebar')
    @section('content')
    <div class="conatiner-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-600">Alumni</h1>
        </div>
        <div class="card">
            <div class="card-header">
                <h6 class="m-0 font-bold text-primary">Data Alumni</h6>
            </div>
            <div class="card-header"></div>
            <a href="{{ url('alumni/add') }}" class="btn btn-primary">
            <i class="bi bi-person-plus-fill mr-2">

            </i>
            Tambah Data
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered table-stiped">
                    <thead>
                        <tr class="text-center" style="background-color: aqua">
                        <th>No</th>
                        <th>Nis</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Jurusan</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                        <th>Tahun Ajaran</th>
                        <th>Foto</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($alumni as $key => $item)
                        <tr class="text-center">
                            <td>{{ $key +=1 }}</td>
                            <td>{{ $item->nis }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->jk }}</td>
                            <td>{{ $item->jurusan }}</td>
                            <td>{{ $item->tgl_lahir }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->telepon }}</td>
                            <td>{{ $item->thn_ajaran }}</td>
                            <td>
                                <img src="/storage/{{ $item->foto }}" alt="" width="100">
                            </td>
                            <td>
                                <a href="/alumni/edit/{{ $item->id }}" class="btn btn-success">
                                    <i class="bi bi-pencil"></i>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                      </svg>  
                                    edit</a>
                                <a href="/alumni/delete/{{ $item->id }}" class="btn btn-danger" onclick="return window.confirm('hapus data ini')">
                                    <i class="bi bi-trash3"></i>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                      </svg>
                                    hapus</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
</body>
</html>
@endsection
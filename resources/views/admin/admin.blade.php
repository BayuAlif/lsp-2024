<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

<nav class="navbar bg-body-tertiary shadow-lg ">
    <div class="container-fluid">
      <a class="navbar-brand">Admin</a>
<a href="{{route('showHome')}}">
    <button class="btn btn-outline-success" type="button">logout</button>
</a>
    </div>
  </nav>
    <div class="p-5">
        <table class="table">
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Nis</th>
                <th scope="col">Kategori</th>
                <th scope="col">Foto</th>
                <th scope="col">Ket</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach($data as $item)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $item->siswa ? $item->siswa->nama : '' }}</td>
                <td>{{ $item->nis ? $item->siswa->nis : '' }}</td>
                <td >{{ $item->kategori ? $item->kategori->ket_kategori : '' }}</td>
                <td>
                    @if($item->foto)
                        <img src="{{ asset('storage/img/'.$item->foto) }}" alt="Foto" style="max-width: 200px;">
                    @else
                        <span>No Photo</span>
                    @endif
                </td>
                <td class="text-truncate" style="max-width: 200px;" >{{ $item->ket }}</td>

                <td>{{ $item->aspirasi ? $item->aspirasi->status : '' }}</td>
                <th>
                    <div class="d-flex">
                        <a href="{{ route('admin.edit', ['id' => $item->id_pelaporan]) }}"><button class="btn btn-warning me-2">Edit</button></a>

                    </div>
                </th>
            </tr>
            @endforeach
        </tbody>
        
    </table>   

</body>

</html>

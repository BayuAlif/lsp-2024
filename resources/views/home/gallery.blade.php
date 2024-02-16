<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    @include('partials.Navbar')
    <div class="d-flex justify-content-center p-5">
        <div class="card mx-5" style="width: 18rem;">
            <img src="https://awsimages.detik.net.id/community/media/visual/2023/05/30/ilustrasi-sekolah-di-blitar_169.jpeg?w=1200" class="card-img-top"
                alt="...">
            <div class="card-body">
                <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ex iure, blanditiis
                    tempore suscipit consectetur temporibus atque explicabo libero ea aspernatur possimus quis delectus
                    voluptatum quo doloribus natus sint in maxime!</p>
            </div>
        </div>
        <div class="card mx-5" style="width: 18rem;">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcROaZs7MjLz4GaJI2wQdHsTu1uGuHvvO4aFPhP3ruS_8w&s" class="card-img-top"
                alt="...">
            <div class="card-body">
                <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ex iure, blanditiis
                    tempore suscipit consectetur temporibus atque explicabo libero ea aspernatur possimus quis delectus
                    voluptatum quo doloribus natus sint in maxime!</p>
            </div>
        </div>
        <div class="card mx-5" style="width: 18rem;">
            <img src="https://sumutpos.jawapos.com/wp-content/uploads/2023/01/IMG-20221215-WA0024-1068x713.jpg" class="card-img-top"
                alt="...">
            <div class="card-body">
                <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ex iure, blanditiis
                    tempore suscipit consectetur temporibus atque explicabo libero ea aspernatur possimus quis delectus
                    voluptatum quo doloribus natus sint in maxime!</p>
            </div>
        </div>
        <div class="card mx-5" style="width: 18rem;">
            <img src="https://assets.kompasiana.com/items/album/2023/02/19/anak-sekolah-afp-ricky-prakoso-kompas-63f105a908a8b512b7109f42.jpg?t=o&v=300" class="card-img-top"
                alt="...">
            <div class="card-body">
                <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ex iure, blanditiis
                    tempore suscipit consectetur temporibus atque explicabo libero ea aspernatur possimus quis delectus
                    voluptatum quo doloribus natus sint in maxime!</p>
            </div>
        </div>
    </div>


    <div class="p-5">
        <form action="{{ route('showGallery') }}" method="GET">
            <div class="row">
                <div class="col-md-4">
                    <label for="tanggal">Tanggal:</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control">
                </div>
                <div class="col-md-4">
                    <label for="kategori">Kategori:</label>
                    <select name="id_kategori" id="kategori" class="form-control">
                        <option value="">Pilih Kategori</option>
                        @foreach($kategori as $kat)
                            <option value="{{ $kat->id }}">{{ $kat->ket_kategori }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label>&nbsp;</label><br>
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>

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
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach($data as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->siswa ? $item->siswa->nama : '' }}</td>
                    <td>{{ $item->nis ? $item->siswa->nis : '' }}</td>
                    <td>{{ $item->kategori ? $item->kategori->ket_kategori : '' }}</td>
                    <td>
                        @if($item->foto)
                            <img src="{{ asset('storage/img/'.$item->foto) }}" alt="Foto" style="max-width: 150px;">
                        @else
                            <span>No Photo</span>
                        @endif
                    </td>
                    <td class="text-truncate" style="max-width: 200px;" >{{ $item->ket }}</td>

                    <td>{{ $item->aspirasi ? $item->aspirasi->status : '' }}</td>
                </tr>
                @endforeach
            </tbody>
            
        </table>    
    </div>
    </table>
    <div>

    </div>
</body>

</html>

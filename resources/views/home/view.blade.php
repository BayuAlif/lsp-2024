<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data Input Aspirasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h3>Data Input Aspirasi</h3>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p>ID Pelaporan: {{ $inputAspirasi->id_pelaporan }}</p>
                        <p>NIS: {{ $inputAspirasi->nis }}</p>
                        <p>Kategori: {{ $inputAspirasi->kategori->ket_kategori }}</p>
                        <p>Lokasi: {{ $inputAspirasi->lokasi }}</p>
                        <p>Keterangan: {{ $inputAspirasi->ket }}</p>
                    </div>
                    <div class="col-md-6">
                        <p>Foto:</p>
                        @if ($inputAspirasi->foto)
                            <img src="{{ asset('storage/img/'.$inputAspirasi->foto) }}" alt="Foto" style="max-width: 200px;">
                        @else
                            <span>No Photo</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('showHome') }}" class="btn btn-outline-primary">Back</a>
            </div>
        </div>
    </div>
    
</body>

</html>

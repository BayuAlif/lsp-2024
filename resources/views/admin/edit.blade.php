<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Aspirasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Edit Data Aspirasi</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <form action="{{ route('admin.update', ['id' => $data->id_pelaporan]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nis" class="form-label">NIS</label>
                <input type="text" class="form-control" id="nis" name="nis" value="{{ $data->siswa->nis }}" readonly>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $data->siswa->nama }}" readonly>
            </div>
            <div class="mb-3">
                <label for="kelas" class="form-label">Kelas</label>
                <input type="text" class="form-control" id="kelas" name="kelas" value="{{ $data->siswa->kelas }}" readonly>
            </div>
            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <select class="form-select" id="kategori" name="kategori" disabled>
                    <option selected>{{ $data->kategori->ket_kategori }}</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="lokasi" class="form-label">Lokasi</label>
                <input type="text" class="form-control" id="lokasi" name="lokasi" value="{{ $data->lokasi }}" readonly>
            </div>
            <div class="mb-3">
                <label for="ket" class="form-label">Keterangan</label>
                <textarea class="form-control " id="ket" name="ket" rows="3" readonly>{{ $data->ket }}</textarea>
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label><br>
                @if ($data->foto)
                    <img src="{{ asset('storage/img/'.$data->foto) }}" alt="Foto" style="max-width: 200px;"><br>
                @else
                    <span>No Photo</span><br>
                @endif
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" id="status" name="status">
                    @foreach(['menunggu', 'proses', 'berhasil', 'ditolak'] as $status)
                        <option value="{{ $status }}" {{ $status == $data->aspirasi->status ? 'selected' : '' }}>{{ ucfirst($status) }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
</body>
</html>

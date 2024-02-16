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

    <div class="container mt-5 d-flex flex-column justify-content-center">
        <div class="card m-5 bg-secondary-subtle shadow">
            <div class="card-header bg-body-secondary p-3">
                <h1 class="text-center fs-2">LOGIN PENGURUS PENGADUAN</h1>
            </div>
            <div class="card-body bg-body-tertiary ">
                <form class="" method="POST" action="{{ Route('sendLogin') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputUsername1" class="form-label">Username</label>
                        <input type="text" class="form-control" id="exampleInputusername1" name="username">
        
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                    </div>
        
                    <button type="submit" class="w-100 btn btn-primary">Submit</button>
        
                </form>
            </div>
        </div>
    </div>

    {{-- Sweet Alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    @if (Session::has('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Kesalahan',
                text: '{{ Session::get('error') }}',
                confirmButtonText: '...Ok'
            })
        </script>
    @endif

</body>

</html>

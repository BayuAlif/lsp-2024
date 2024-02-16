<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex justify-content-center text-center" id="navbarNav">
            <ul class="navbar-nav ">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href={{ Route('showHome') }}>Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ Route('showGallery') }}">Gallery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href={{ Route('login') }}>Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

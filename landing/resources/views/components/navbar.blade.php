<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link" href="{{ route('home') }}">Home</a>
                <a class="nav-link" href="{{ route('about') }}">About</a>
                <a class="nav-link" href="{{ route('contacts') }}">Contacts</a>
                <a class="nav-link" href="{{ route('detail') }}">Detail</a>
                <a class="nav-link" href="{{ route('info') }}">Info</a>
                <a class="nav-link" href="{{ route('list') }}">List</a>
                <a class="nav-link" href="{{ route('admin.activity') }}">Activity</a>
            </div>
        </div>
    </div>
</nav>

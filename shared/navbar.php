<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-lg">
        <a class="navbar-brand" href="/">Library System</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-lg-flex justify-content-lg-between" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link <?= str_contains($_SERVER['REQUEST_URI'], '/books') ? 'active' : null ?>" href="/books">Books</a>
                <a class="nav-item nav-link <?= str_contains($_SERVER['REQUEST_URI'], '/categories') ? 'active' : null ?>" href="/categories">Categories</a>
                <a class="nav-item nav-link <?= str_contains($_SERVER['REQUEST_URI'], '/members') ? 'active' : null ?>" href="/members">Members</a>
                <a class="nav-item nav-link <?= str_contains($_SERVER['REQUEST_URI'], '/book-borrowers') ? 'active' : null ?>" href="/book-borrowers">Book Borrowers</a>
                <a class="nav-item nav-link <?= str_contains($_SERVER['REQUEST_URI'], '/fines') ? 'active' : null ?>" href="/fines">Fines</a>
                <a class="nav-item nav-link <?= str_contains($_SERVER['REQUEST_URI'], '/users') ? 'active' : null ?>" href="/users">Users</a>
            </div>
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="./../auth/process.php?logout=true">Logout</a>
            </div>
        </div>
    </div>
</nav>
<nav class="navbar navbar-expand-lg navbar-dark"
    style="background-color: #302ebd; background: linear-gradient(to top, transparent, #008bc2);
">
    <div class="container mt-2">
        <ul>
            <li>
                <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/" style="color: #fff"><svg
                        xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                        class="bi bi-house-door" viewBox="0 0 16 16">
                        <path
                            d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146ZM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5Z" />
                    </svg></a>
            </li>
        </ul>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse ms-4" id="navbarNav">
            <ul class="navbar-nav me-auto">
            </ul>
            <form class="d-flex align-items-end" action="{{ route('productlines') }}" method="GET">
                <input class="form-control me-2" type="search" name="productLine" placeholder="Search by Product Line"
                    aria-label="Search">
                <button class="btn btn__main" style="background-color: #0300c2; color: #fff"
                    type="submit"><span></span>Search</button>
            </form>
        </div>
    </div>
</nav>

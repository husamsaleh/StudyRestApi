<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
                @if (!Request::is('/')) <!-- Check if current URL is not the home page -->
                <li class="nav-item">
                    <a class="nav-link" href="{{route('addresses')}}">Address</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('frontend.tables.cars')}}">Cars</a>
                </li>
                @endif

                @auth <!-- Check if user is authenticated -->
                <li class="nav-item">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-link border border-dark rounded" style="background: none; text-decoration: none; cursor: pointer;" >Logout</button>
                    </form>
                </li>
                @else
                    <li class="nav-item">
                        <a href="{{ url('/login') }}" class="nav-link">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/register') }}" class="nav-link">Register</a>
                    </li>
                @endauth

            </ul>
        </div>
    </div>
</nav>

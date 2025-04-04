<nav class="navbar navbar-expand-lg main_menu">
    <div class="container">
        <a class="navbar-brand" href="{{ route('index') }}">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Freeit" class="img-fluid">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="far fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav m-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Portfolio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="blogs.html">Blog</a>
                </li>
            </ul>
            <ul class="right_menu d-flex flex-wrap align-items-center">
                <li>
                    <a href="#" class="wsus__manu_cart icon">
                        <span>
                            <img src="{{ asset('assets/images/cart_icon_black.svg') }}" alt="cart" class="img-fluid">
                            <b>2</b>
                        </span>
                    </a>
                </li>
                @guest
                    <li>
                        <a href="{{ route('login') }}" class="common_btn">Login</a>
                    </li>
                @else
                    <li>
                        <a href="{{ route('profile.edit') }}" class="common_btn">Profile</a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" class="common_btn" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endguest
                <li>
                    <a href="#" class="common_btn">Let’s Talk</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

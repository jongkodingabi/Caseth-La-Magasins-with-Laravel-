<!-- Navbar Start -->
<nav class="navbar" x-data>
    <a href="#" class="navbar-logo">Caseth<span> La Magasin's</span>.</a>
    <a href="#" class="navbar-logo"></a>

    <div class="navbar-nav">
        @auth
            {{-- Jika sudah login --}}
            <a href="/home">Home</a>
        @else
            {{-- Jika belum login --}}
            <a href="/">Home</a>
        @endauth

        <a href="/boquette">Boquette</a>
        <a href="/phoneStrap">Phone Strap</a>
        <a href="/casing">Casing</a>
    </div>

    <div class="navbar-extra">
        @auth
            <a href="/cart" id="shopping-cart-button">
                <i data-feather="shopping-cart"></i>
                <span class="quantity-badge" x-text="$store.cart.quantity" x-show="$store.cart.quantity > 0"></span>
            </a>

            <a href="{{ route('profile.edit') }}">
                <label for="profil" class="cursor-pointer" id="userIcon" style="cursor: pointer;">
                    <i data-feather="user" class="fill_current"></i>
                </label>
            </a>
        </div>
    @endauth

    @guest
        <a href="{{ route('login') }}"
            style="background-color: #dbb5b5;
                   border-radius: 5px;
                   padding: 10px 20px;
                   color: white;
                   text-decoration: none;
                   display: inline-block;">
            Log in
        </a>
        |
        @if (Route::has('register'))
            <a href="{{ route('register') }}"
                style="background-color: white;
                       border-radius: 5px;
                       padding: 10px 20px;
                       color: #dbb5b5;
                       text-decoration: none;
                       display: inline-block;
                       margin-left: 10px;">
                Register
            </a>
        @endif
    @endguest

    <a href="#" id="hamburger-menu">
        <i data-feather="menu"></i>
    </a>
    </div>
</nav>
<!-- Navbar End -->

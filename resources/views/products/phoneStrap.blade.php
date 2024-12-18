<x-header>
    <link rel="stylesheet" href="{{ asset('asset-views/css/style2.css?v=1.0') }}" />
    @vite('resources/css/app.css')
</x-header>

<body>
    <x-navbar></x-navbar>
    <section class="relative h-[50vh] bg-cover bg-center"
        style="background-image: url(' {{ asset('asset-views/img/category/Phonestrap.png') }} ')">
        <div class="absolute inset-0 bg-black/40 flex flex-col items-center justify-center">
            <h1 class="text-white text-4xl font-bold"><span>Phone Strap</span> Products</h1>
            <p class="py-3 text-base text-rose-300">Offers Phone Strap that can beautify your day.</p>
            <p class="text-white cursor-pointer">Back / <span class="text-rose-400 hover:underline"><a
                        href="/home">Home</a></span></p>
        </div>
    </section>
    <section id="casing" class="menu">
        <div id="custom-pagination" class="pagination">
            {{ $products->links() }} <!-- Pagination links -->
        </div>

        <div class="row">
            @foreach ($products as $product)
                <div class="product-card">
                    <a class="product-image-wrapper" href="#">
                        <img class="product-image" src="{{ asset('asset-views/img/products/' . $product->picture) }}"
                            alt="{{ $product->product }}" />
                    </a>
                    <div class="product-details">
                        <a href="#">
                            <h5 class="product-title">{{ $product->product }}</h5>
                            <h4>{{ $product->category }}</h4>
                        </a>
                        <div class="product-pricing">
                            <p>
                                <span class="product-price">Rp {{ number_format($product->price, 2) }}</span>
                                <span class="product-original-price">{{ number_format($product->price, 2) }}</span>
                            </p>
                            {{-- <div class="product-rating">
                      <span class="product-star">&#9733;</span>
                      <span class="product-star">&#9733;</span>
                      <span class="product-star">&#9733;</span>
                      <span class="product-star">&#9733;</span>
                      <span class="product-star">&#9733;</span>
                      <span class="product-rating-value">5.0</span>
                    </div> --}}
                        </div>
                        @if (Auth::check())
                            <form action="{{ route('cart.add') }}" method="POST" style="display: inline;">
                                @csrf
                                <input type="hidden" name="id" value="{{ $product->id }}">
                                <button type="submit" class="product-add-to-cart-btn" id="add-to-cart">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="product-cart-icon" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                    Add to cart
                                </button>
                            </form>
                        @else
                            <form id="alert-auth-id" style="display: inline;">
                                @csrf
                                <button type="button" class="product-add-to-cart-btn" onclick="confirmAuth()">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="product-cart-icon" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                    Add to cart
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
        </div>
    </section>
    <x-alert></x-alert>
    <x-footer></x-footer>
    <x-icon-j-s></x-icon-j-s>
</body>

<x-header>
    <link rel="stylesheet" href="{{ asset('asset-views/css/style2.css?v=1.0') }}" />
    @vite('resources/css/app.css')
</x-header>
<x-navbar></x-navbar>

{{-- Hero Start --}}
<section class="relative h-[50vh] bg-cover bg-center"
    style="background-image: url(' {{ asset('asset-views/img/hero-bg.jpg') }} ')">
    <div class="absolute inset-0 bg-black/40 flex flex-col items-center justify-center">
        <h1 class="text-white text-4xl font-bold">Our Products</h1>
        <h1 class="text-white text-xl font-light py-3 tracking-wide">Temukan Stye Anda</h1>
        <p class="text-white cursor-pointer">Back / <span class="text-rose-400 hover:underline"><a
                    href="/home">Home</a></span></p>
    </div>
</section>
{{-- Hero End --}}

{{-- Search Field Start --}}
<section class="flex justify-center items-center">
    <div class="mt-11 w-full max-w-md">
        <form action="{{ route('products.search') }}" method="GET" class="max-w-md mx-auto w-full">
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
            <div class="relative flex items-center">
                <div class="absolute inset-y-0 left-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="text" name="keyword" value="{{ request('keyword') }}"
                    class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-rose-300 focus:border-rose-400"
                    placeholder="Search Casing, Phone Strap..." required />
                <button type="submit"
                    class="text-white absolute end-2.5 bottom-2.5 bg-red-500 hover:bg-red-400 focus:ring-4 focus:outline-none focus:ring-rose-300 font-medium rounded-lg text-sm px-4 py-2">Search</button>
            </div>
        </form>
    </div>
</section>
{{-- Search Field End --}}

{{-- Product Section Start --}}
<div id="custom-pagination" class="pagination">
    {{ $products->links() }} <!-- Pagination links -->
</div>

<div class="flex flex-wrap justify-center">
    @forelse ($products as $product)
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
    @empty
        <p>Produk Tidak Ditemukan</p>
    @endforelse
</div>
{{-- Product Section Start --}}

<x-alert></x-alert>
<x-icon-j-s></x-icon-j-s>

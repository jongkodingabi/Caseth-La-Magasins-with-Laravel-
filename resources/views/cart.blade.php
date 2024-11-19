<!-- Shopping Cart start -->
<x-header>
    <link rel="stylesheet" href="{{ asset('asset-views/css/style2.css?v=1.0') }}" />
    @vite('resources/css/app.css')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</x-header>

<body>
    <x-navbar></x-navbar>

    <section
        class="mt-20 relative z-10 after:contents-[''] after:absolute after:z-0 after:h-full xl:after:w-1/3 after:top-0 after:right-0 after:bg-gray-50">
        <div class="w-full max-w-7xl px-4 md:px-5 lg-6 mx-auto relative z-10">
            <div class="grid grid-cols-12">
                <div
                    class="col-span-12 xl:col-span-8 lg:pr-8 pt-14 pb-8 lg:py-24 w-full max-xl:max-w-3xl max-xl:mx-auto">
                    <div class="flex items-center justify-between pb-8 border-b border-gray-300">
                        @if ($cartItems->isNotEmpty())
                            <!-- Menggunakan data dari database -->
                            @php
                                $totalPrice = 0;
                            @endphp
                            <h2 class="font-manrope font-bold text-3xl leading-10 text-black">Shopping Cart</h2>
                            <h2 class="font-manrope font-bold text-xl leading-8 text-gray-600">{{ $totalItems }} Items
                            </h2>
                    </div>
                    <div class="grid grid-cols-12 mt-8 max-md:hidden pb-6 border-b border-gray-200">
                        <div class="col-span-12 md:col-span-7">
                            <p class="font-normal text-lg leading-8 text-gray-400">Product Details</p>
                        </div>
                        <div class="col-span-12 md:col-span-5">
                            <div class="grid grid-cols-5">
                                <div class="col-span-3">
                                    <p class="font-normal text-lg leading-8 text-gray-400 text-center">Quantity</p>
                                </div>
                                <div class="col-span-2">
                                    <p class="font-normal text-lg leading-8 text-gray-400 text-center">Total</p>
                                </div>
                            </div>
                        </div>
                    </div>


                    @foreach ($cartItems as $item)
                        <div
                            class="flex flex-col min-[500px]:flex-row min-[500px]:items-center gap-5 py-6 border-b border-gray-200 group">
                            <div class="w-full md:max-w-[126px]">
                                <img src="{{ asset('asset-views/img/products/' . $item->product->picture) }}"
                                    alt="" class="mx-auto rounded-xl object-cover">
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-4 w-full">
                                <div class="md:col-span-2">
                                    <div class="flex flex-col max-[500px]:items-center gap-3">
                                        <h6 class="font-semibold text-base leading-7 text-black">
                                            {{ $item->product->product }}</h6>
                                        <h6 class="font-normal text-base leading-7 text-gray-500">
                                            {{ $item->product->category }}</h6>
                                        <h6
                                            class="font-medium text-base leading-7 text-gray-600 transition-all duration-300 group-hover:text-rose-300">
                                            Rp {{ number_format($item->product->price, 2) }}</h6>
                                    </div>
                                </div>
                                <div class="flex items-center max-[500px]:justify-center h-full max-md:mt-3">
                                    <div class="flex items-center justify-center h-full" style="flex-direction: row;">
                                        <form action="{{ route('cart.remove') }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $item->product->id }}">
                                            <button type="submit" name="quantity" value="{{ $item->quantity - 1 }}"
                                                class="group rounded-l-xl px-5 py-[18px] border border-gray-200 flex items-center justify-center shadow-sm transition-all duration-500 hover:bg-gray-50 hover:border-gray-300 focus-within:outline-gray-300">
                                                <svg class="stroke-gray-900 transition-all duration-500 group-hover:stroke-black"
                                                    xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                                    viewBox="0 0 22 22" fill="none">
                                                    <path d="M16.5 11H5.5" stroke-width="1.6" stroke-linecap="round" />
                                                </svg>
                                            </button>
                                        </form>

                                        <input type="text"
                                            class="border-y border-gray-200 outline-none text-gray-900 font-semibold text-lg w-full max-w-[73px] min-w-[60px] text-center bg-transparent"
                                            value="{{ $item->quantity }}" readonly>

                                        <form action="{{ route('cart.update') }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $item->product->id }}">
                                            <button type="submit" name="quantity" value="{{ $item->quantity + 1 }}"
                                                class="group rounded-r-xl px-5 py-[18px] border border-gray-200 flex items-center justify-center shadow-sm transition-all duration-500 hover:bg-gray-50 hover:border-gray-300 focus-within:outline-gray-300">
                                                <svg class="stroke-gray-900 transition-all duration-500 group-hover:stroke-black"
                                                    xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                                    viewBox="0 0 22 22" fill="none">
                                                    <path d="M11 5.5V16.5M16.5 11H5.5" stroke-width="1.6"
                                                        stroke-linecap="round" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <div
                                    class="flex items-center max-[500px]:justify-center md:justify-end max-md:mt-3 h-full">
                                    <p
                                        class="font-bold text-lg leading-8 text-gray-600 text-center transition-all duration-300 group-hover:text-rose-300">
                                        Rp {{ number_format($item->product->price * $item->quantity, 2) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @php
                            $totalPrice += $item->product->price * $item->quantity;
                        @endphp
                    @endforeach

                    <div class="flex justify-end mt-4">
                        <h3 class="font-bold text-xl">Total: Rp {{ number_format($totalPrice, 2) }}</h3>
                    </div>

                    <div class="flex items-center justify-end mt-8">
                        <button
                            class="flex items-center px-5 py-3 rounded-full gap-2 border-none outline-0 group font-semibold text-lg leading-8 text-indigo-600 shadow-sm shadow-transparent transition-all duration-500 hover:text-indigo-700">
                            Add Coupon Code
                            <svg class="transition-all duration-500 group-hover:translate-x-2"
                                xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22"
                                fill="none">
                                <path
                                    d="M12.7757 5.5L18.3319 11.0562M18.3319 11.0562L12.7757 16.6125M18.3319 11.0562L1.83203 11.0562"
                                    stroke="#4F46E5" stroke-width="1.6" stroke-linecap="round" />
                            </svg>
                        </button>
                    </div>
                </div>
                {{-- DETAIL ORDER --}}
                <div
                    class="col-span-12 xl:col-span-4 bg-gray-50 w-full max-xl:px-6 max-w-3xl xl:max-w-lg mx-auto lg:pl-8 py-24">
                    <h2 class="font-manrope font-bold text-3xl leading-10 text-black pb-8 border-b border-gray-300">
                        Order Summary</h2>
                    <div class="mt-8">
                        <div class="flex items-center justify-between pb-6">
                            <p class="font-normal text-lg leading-8 text-black">{{ $totalItems }} Items</p>
                            <p class="font-medium text-lg leading-8 text-black">Rp {{ number_format($totalPrice, 2) }}
                            </p>
                        </div>

                        <form action="{{ route('cart.checkCost') }}" method="POST">
                            @csrf
                            <label for="origin"
                                class="flex items-center mb-1.5 text-gray-600 text-sm font-medium">Pilih Kota Asal
                            </label>
                            <div class="flex pb-6">
                                <div class="relative w-full z-10">
                                    <select name="origin" id="origin"
                                        class="block w-full h-11 pr-10 pl-4 text-base font-normal
                                shadow-xs text-gray-900 bg-white border border-gray-300 rounded-lg focus:outline-gray-400"
                                        required>
                                        <option value="">Pilih Kota Asal</option>
                                        @if (!@empty($cities))
                                            @foreach ($cities as $city)
                                                <option value="{{ $city['city_id'] }}">{{ $city['city_name'] }}
                                                </option>
                                            @endforeach
                                        @else
                                            <option value="">Data Kota Tidak tersedia</option>
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <label for="destination"
                                class="flex items-center mb-1.5 text-gray-600 text-sm font-medium">Pilih Kota Tujuan
                            </label>
                            <div class="flex pb-6">
                                <div class="relative w-full z-10">
                                    <select name="destination" id="destination"
                                        class="block w-full h-11 pr-10 pl-4 text-base font-normal
                                shadow-xs text-gray-900 bg-white border border-gray-300 rounded-lg focus:outline-gray-400"
                                        required>
                                        <option value="">Pilih Kota Tujuan</option>
                                        @if (!@empty($cities))
                                            @foreach ($cities as $city)
                                                <option value="{{ $city['city_id'] }}">{{ $city['city_name'] }}
                                                </option>
                                            @endforeach
                                        @else
                                            <option value="">Data Kota Tidak tersedia</option>
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <label for="courier"
                                class="flex items-center mb-1.5 text-gray-600 text-sm font-medium">Courier
                            </label>
                            <div class="flex pb-6">
                                <div class="relative w-full z-10">
                                    <select name="courier" id="courier"
                                        class="block w-full h-11 pr-10 pl-4 text-base font-normal
                                shadow-xs text-gray-900 bg-white border border-gray-300 rounded-lg focus:outline-gray-400"
                                        required>
                                        <option value="">Choose Courier</option>
                                        <option value="jne">JNE</option>
                                        <option value="pos">POS</option>
                                        <option value="tiki">TIKI</option>
                                    </select>
                                </div>
                            </div>


                            <label class="flex items-center mb-1.5 text-gray-400 text-sm font-medium">Berat Paket
                            </label>
                            <div class="flex pb-4 w-full">
                                <div class="relative w-full ">
                                    <div class=" absolute left-0 top-0 py-2.5 px-4 text-gray-300">
                                    </div>
                                    <input type="number" name="weight" id="weight"
                                        class="block w-full h-11 pr-11 pl-5 py-2.5 text-base font-normal shadow-xs text-gray-900 bg-white border border-gray-300 rounded-lg placeholder-gray-500 focus:outline-gray-400 "
                                        placeholder="Berat paket">
                                </div>
                            </div>

                            <label class="flex items-center mb-1.5 text-gray-400 text-sm font-medium">Code Promo
                            </label>
                            <div class="flex pb-4 w-full">
                                <div class="relative w-full ">
                                    <div class=" absolute left-0 top-0 py-2.5 px-4 text-gray-300">
                                    </div>
                                    <input type="text" name="code"
                                        class="block w-full h-11 pr-11 pl-5 py-2.5 text-base font-normal shadow-xs text-gray-900 bg-white border border-gray-300 rounded-lg placeholder-gray-500 focus:outline-gray-400 "
                                        placeholder="xxxx xxxx xxxx">
                                </div>
                            </div>

                            <label class="flex items-center mb-1.5 text-gray-400 text-sm font-medium">Alamat
                            </label>
                            <div class="flex pb-4 w-full">
                                <div class="relative w-full ">
                                    <div class=" absolute left-0 top-0 py-2.5 px-4 text-gray-300">
                                    </div>
                                    <textarea id="" rows="4"
                                        class="block p-2.5 w-full text-sm text-gray-700 bg-gray-50 rounded-lg border border-gray-300 focus:border-rose-300"
                                        placeholder="Mohon Berikan Alamat lengkap" required></textarea>
                                </div>
                            </div>
                            <div class="flex items-center border-b border-gray-200">
                                <input type="submit" name="checkCost"
                                    class="rounded-lg w-full bg-rose-400 py-2.5 px-4 text-white text-sm font-semibold text-center mb-8 transition-all duration-500 hover:bg-rose-300">
                            </div>
                            <div class="mt-5">
                                @if ($cost != '')
                                    <h4 class="mb-3 font-bold">Rincian Ongkir</h4>
                                    <h2 class="mb-3">
                                        <ul>
                                            <li class="font-semibold">Asal Kota: <span
                                                    class="font-light">{{ $cost['origin_details']['city_name'] }}</span>
                                            </li>
                                            <li class="font-semibold">Kota Tujuan: <span
                                                    class="font-light">{{ $cost['destination_details']['city_name'] }}</span>
                                            </li>
                                            <li class="font-semibold">Berat Paket: <span
                                                    class="font-light">{{ $cost['query']['weight'] }} gram</span></li>
                                        </ul>
                                    </h2>

                                    @foreach ($cost['results'] as $TotalCost)
                                        <div>
                                            <label for="name">Name: {{ $TotalCost['name'] }}</label>
                                            @foreach ($TotalCost['costs'] as $costs)
                                                <div class="mb-3">
                                                    <label for="service">Service: {{ $costs['service'] }}</label>
                                                    @foreach ($costs['cost'] as $value)
                                                        <div class="mb-3">
                                                            <label for="value">
                                                                Price: Rp.{{ number_format($value['value'], 2) }} (est:
                                                                {{ $value['etd'] }} day)
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @break
                                        @endforeach
                                    </div>
                                @endforeach
                        </div>
                        <div class="flex items-center justify-between py-8">
                            <p class="font-medium text-xl leading-8 text-black">{{ $totalItems }} Items</p>
                            <p class="font-semibold text-xl leading-8 text-rose-300">Rp
                                {{ number_format($totalPrice, 2) }}</p>
                        </div>
                        <button
                            class="w-full text-center bg-rose-200 rounded-xl py-3 px-6 font-semibold text-lg text-white transition-all duration-500 hover:bg-rose-300">Checkout</button>
                    </form>
                </div>
            </div>
            @endif
        @else
            <p class="text-center font-semibold text-lg">Your cart is empty.</p>
            @endif
        </div>
</section>
<x-footer></x-footer>
<x-alert></x-alert>
<x-icon-j-s></x-icon-j-s>
</body>

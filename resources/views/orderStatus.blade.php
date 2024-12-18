<x-header>
    <link rel="stylesheet" href="{{ asset('asset-views/css/style2.css?v=1.0') }}" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</x-header>

<body>
    <x-navbar></x-navbar>
    {{-- Hero Section Start --}}
    <section class="relative h-[50vh] bg-cover bg-center"
        style="background-image: url(' {{ asset('asset-views/img/hero-bg.jpg') }} ')">
        <div class="absolute inset-0 bg-black/40 flex flex-col items-center justify-center">
            <h1 class="text-white text-4xl font-bold">Order Status</h1>
            <p class="text-white cursor-pointer">Back / <span class="text-rose-400 hover:underline">Home</span></p>
        </div>
    </section>

    <section class="py-24 relative">
        <div class="w-full max-w-7xl px-4 md:px-5 lg:px-5 mx-auto">
            <div class="w-full flex-col justify-start items-start  gap-12 inline-flex">
                <div class="w-full justify-end items-start gap-8 inline-flex mb-5 space-y-5">
                    <div
                        class="w-full p-8 bg-white rounded-xl flex-col justify-start items-start space-y-5 gap-5 flex mb-5">
                        <h2
                            class="w-full text-gray-900 text-2xl font-semibold font-manrope leading-9 border-b border-gray-200">
                            Order Status</h2>

                        <!-- Loop untuk semua order -->
                        @foreach ($orders as $order)
                            <div class="w-full flex-col justify-center items-center mb-12">
                                <!-- Perbesar margin bottom -->
                                <ol
                                    class="flex md:flex-row flex-col md:items-start items-center justify-between w-full md:gap-1 gap-4">
                                    <li class="flex items-center justify-start gap-2">
                                        <h5 class="text-gray-900 text-lg font-medium leading-normal">Status:</h5>
                                        <span
                                            class="bg-rose-300 text-white text-lg font-medium px-4 py-2 mb-2 rounded-lg">
                                            {{ $order->status }}
                                        </span>
                                    </li>
                                </ol>

                                <!-- Menampilkan order items -->
                                <div
                                    class="w-full flex-col justify-start items-start gap-5 flex pb-5 border-b border-gray-200">
                                    @foreach ($order->orderItems as $item)
                                        <div
                                            class="w-full justify-start items-center lg:gap-8 gap-4 grid md:grid-cols-12 grid-cols-1 mb-6">
                                            <!-- Menambah margin bottom pada item -->
                                            <div
                                                class="md:col-span-8 col-span-12 w-full justify-start items-center lg:gap-5 gap-4 flex md:flex-row flex-col">
                                                <img class="rounded-md object-cover ml-2"
                                                    src="{{ asset('asset-views/img/products/' . $item->product->picture) }}"
                                                    alt="{{ $item->product->name }}"
                                                    style="width: 100px; height: 100px;" />
                                                <div
                                                    class="w-full flex-col justify-start md:items-start items-center gap-3 inline-flex">
                                                    <h4 class="text-gray-900 text-xl font-medium leading-8">
                                                        {{ $item->product->name }}
                                                    </h4>
                                                    <h6 class="text-gray-500 text-base font-normal leading-relaxed">
                                                        Category: {{ $item->product->category }}
                                                    </h6>
                                                </div>
                                            </div>
                                            <div
                                                class="md:col-span-4 col-span-12 justify-between items-center gap-4 flex md:flex-row flex-col">
                                                <h4 class="text-gray-500 text-xl font-semibold leading-8">
                                                    Rp{{ number_format($item->price, 0, ',', '.') }} x
                                                    {{ $item->quantity }}
                                                </h4>
                                                <h4 class="text-gray-900 text-xl font-semibold leading-8">
                                                    Rp{{ number_format($item->price * $item->quantity, 0, ',', '.') }}
                                                </h4>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <!-- Menampilkan ongkir dan total -->
                                <div class="w-full flex-col justify-start items-start gap-5 flex">
                                    <div class="w-full pb-1.5 flex-col justify-start items-start gap-4 flex">
                                        <div class="w-full justify-between items-start gap-6 inline-flex">
                                            <h6 class="text-gray-500 text-base font-normal leading-relaxed">Service</h6>
                                            <h6 class="text-right text-gray-500 text-base font-medium leading-relaxed">
                                                {{ $order->service }}</h6>
                                        </div>
                                    </div>

                                    <div class="w-full pb-1.5 flex-col justify-start items-start gap-4 flex">
                                        <div class="w-full justify-between items-start gap-6 inline-flex">
                                            <h6 class="text-gray-500 text-base font-normal leading-relaxed">Kota Tujuan
                                            </h6>
                                            <h6 class="text-right text-gray-500 text-base font-medium leading-relaxed">
                                                {{ $order->destination }}</h6>
                                        </div>
                                    </div>

                                    <div class="w-full pb-1.5 flex-col justify-start items-start gap-4 flex">
                                        <div class="w-full justify-between items-start gap-6 inline-flex">
                                            <h6 class="text-gray-500 text-base font-normal leading-relaxed">Alamat</h6>
                                            <h6 class="text-right text-gray-500 text-base font-medium leading-relaxed">
                                                {{ $order->alamat }}</h6>
                                        </div>
                                    </div>

                                    <div class="w-full pb-1.5 flex-col justify-start items-start gap-4 flex">
                                        <div class="w-full justify-between items-start gap-6 inline-flex">
                                            <h6 class="text-gray-500 text-base font-normal leading-relaxed">Pesan Khusus
                                            </h6>
                                            <h6 class="text-right text-gray-500 text-base font-medium leading-relaxed">
                                                {{ $order->masukkan }}</h6>
                                        </div>
                                    </div>

                                    <div class="w-full justify-between items-start gap-6 inline-flex">
                                        <h5 class="text-gray-900 text-lg font-semibold leading-relaxed">Total</h5>
                                        <h5 class="text-right text-gray-900 text-lg font-semibold leading-relaxed">
                                            Rp{{ number_format($order->total_price, 0, ',', '.') }}
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>



    <x-icon-j-s></x-icon-j-s>
</body>

</html>

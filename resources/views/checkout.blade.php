<x-header>
    <link rel="stylesheet" href="{{ asset('asset-views/css/style2.css?v=1.0') }}" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @vite('resources/css/app.css')

</x-header>

<body>

    <div class="w-full max-w-7xl px-4 md:px-5 lg:px-5 mx-auto mt-5">
        <div class="w-full flex-col justify-start items-start  gap-12 inline-flex">
            <div class="w-full justify-end items-start gap-8 inline-flex space-y-5">
                <div
                    class="w-full p-8 bg-green-200 rounded-xl flex-col justify-start items-start space-y-5 gap-5 flex mb-5">
                    <p class="text-green-900"><span
                            class="w-full text-green-700 text-xl font-semibold font-manrope leading-9 border-b border-gray-200">
                            Selangkah lagii!!</span>, Produk kami akan jadi milik anda.</p>
                </div>
            </div>
        </div>
    </div>
    <form action="{{ route('checkout.store') }}" method="POST" enctype="multipart/form-data"
        class="max-w-2xl mx-auto px-6 py-8">
        @csrf
        <div class="space-y-6 p-6 bg-white shadow-lg rounded-lg">
            <!-- Data Asal dan Tujuan -->
            <div>
                <label for="origin" class="block text-sm font-semibold text-gray-700">Kota
                    Asal</label>
                <input type="text" id="origin" name="origin" value="{{ session('origin_name') }}"
                    class="mt-2 border border-gray-300 rounded-md p-3 w-full bg-gray-100 text-gray-700" readonly>
            </div>

            <div>
                <label for="destination" class="block text-sm font-semibold text-gray-700">Kota
                    Tujuan</label>
                <input type="text" id="destination" name="destination" value="{{ session('destination_name') }}"
                    class="mt-2 border border-gray-300 rounded-md p-3 w-full bg-gray-100 text-gray-700" readonly>
            </div>

            <!-- Pilihan Kurir -->
            <div>
                <label for="courier" class="block text-sm font-semibold text-gray-700">Kurir yang
                    Dipilih</label>
                <input type="text" id="courier" name="courier" value="{{ session('courier') }}"
                    class="mt-2 border border-gray-300 rounded-md p-3 w-full bg-gray-100 text-gray-700" readonly>
            </div>

            <!-- Pilihan Service Berdasarkan Kurir -->
            @php
                $totalPrice = session('totalPrice');
                $discount = session('discount');
            @endphp

            <div>
                <label for="service" class="block text-sm font-semibold text-gray-700">Pilih
                    Layanan</label>
                <select id="service" name="service"
                    class="mt-2 border border-gray-300 rounded-md p-3 w-full bg-white text-gray-700"
                    onchange="updateTotal()">
                    <option value="" data-cost="0">-- Pilih Layanan --</option>
                    @foreach (session('courierServices') as $service)
                        @php
                            $cost = $service['cost'][0]['value'] ?? 0; // Biaya layanan
                            $etd = $service['cost'][0]['etd'] ?? 'N/A'; // Estimasi pengiriman
                        @endphp
                        <option value="{{ $service['service'] }}" data-cost="{{ $cost }}">
                            {{ $service['service'] }} - Rp {{ number_format($cost, 0, ',', '.') }} (ETD:
                            {{ $etd }} hari)
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Berat Paket -->
            <div>
                <label for="weight" class="block text-sm font-semibold text-gray-700">Berat Paket
                    (gram)</label>
                <input type="number" id="weight" name="weight" value="{{ session('weight') }}"
                    class="mt-2 border border-gray-300 rounded-md p-3 w-full text-gray-700" required>
            </div>

            <!-- Data Tipe HP -->
            <div>
                <label for="tipe_hp" class="block text-sm font-semibold text-gray-700">Tipe HP</label>
                <input type="text" id="tipe_hp" name="tipe_hp" value="{{ session('tipe_hp') }}"
                    class="mt-2 border border-gray-300 rounded-md p-3 w-full bg-white text-gray-700">
            </div>

            <!-- Masukkan -->
            <div>
                <label for="masukkan" class="block text-sm font-semibold text-gray-700">Pesan
                    Khusus</label>
                <textarea id="masukkan" name="masukkan" class="mt-2 border border-gray-300 rounded-md p-3 w-full text-gray-700">{{ session('masukkan') }}</textarea>
            </div>

            <!-- Alamat Pengiriman -->
            <div>
                <label for="alamat" class="block text-sm font-semibold text-gray-700">Alamat
                    Pengiriman</label>
                <textarea id="alamat" name="alamat" class="mt-2 border border-gray-300 rounded-md p-3 w-full text-gray-700"
                    required>{{ session('alamat') }}</textarea>
            </div>

            <!-- Foto Bukti Pembayaran -->
            <div>
                <label for="payment_photo" class="block text-sm font-semibold text-gray-700">Foto Bukti
                    Pembayaran</label>
                <input type="file" id="payment_photo" name="payment_photo"
                    class="mt-2 border border-gray-300 rounded-md p-3 w-full bg-white text-gray-700" accept="image/*"
                    required>
            </div>

            <!-- QRIS Image -->
            <div class="mt-4">
                <img src="{{ asset('asset-views/img/category/Buket.png') }}" alt="QRIS" class="w-11 h-11 mx-auto">
            </div>

            <!-- Data Produk di Cart -->
            <div class="space-y-4 mt-6">
                <h3 class="text-lg font-semibold text-gray-800">Produk dalam Cart</h3>
                @foreach (session('cartItems') as $item)
                    <div class="border-b py-2">
                        <p class="text-sm text-gray-700">{{ $item->product->name }}
                            ({{ $item->quantity }} x
                            {{ number_format($item->product->price, 0, ',', '.') }})
                        </p>
                    </div>
                @endforeach
            </div>

            <!-- Total Harga -->
            <div class="mt-6 font-semibold text-gray-800">
                <p>Total Harga: <span
                        class="font-normal">{{ number_format(session('totalPrice'), 0, ',', '.') }}</span>
                </p>
                <p>Diskon: <span class="font-normal">{{ number_format(session('discount'), 0, ',', '.') }}</span>
                </p>
                <!-- Tampilkan Total -->
                <div class="mt-4">
                    <p class="text-lg font-semibold">
                        Total Semua: <span id="totalAll" class="font-normal">
                            {{ number_format(session('totalAll'), 0, ',', '.') }}
                        </span>
                    </p>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="mt-6">
                <button type="submit"
                    class="w-full py-3 bg-rose-300 text-white rounded-md hover:bg-rose-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                    Submit Pesanan
                </button>
            </div>
        </div>
    </form>
    <script>
        function updateTotal() {
            // Ambil harga total dan diskon dari session
            const totalPrice = {{ session('totalPrice') }};
            const discount = {{ session('discount') }};

            // Ambil elemen service yang dipilih
            const serviceSelect = document.getElementById('service');
            const selectedOption = serviceSelect.options[serviceSelect.selectedIndex];

            // Ambil biaya (cost) dari atribut data
            const cost = parseInt(selectedOption.getAttribute('data-cost')) || 0;

            // Hitung total semua
            const totalAll = totalPrice + cost - discount;

            // Update tampilan total
            const totalAllElement = document.getElementById('totalAll');
            totalAllElement.textContent = totalAll.toLocaleString('id-ID', {
                style: 'currency',
                currency: 'IDR'
            });
        }
    </script>

    <x-alert></x-alert>
    <x-icon-j-s></x-icon-j-s>
</body>

</html>

{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}

<x-header></x-header>

<body>
    <x-navbar></x-navbar>
    <!-- Hero Section start -->
    <section class="hero" id="home">
        <main class="content">
            <h1>Best destination <span>for your Accsesoris.</span></h1>
            <p>Make your beauty with caseth</p>
        </main>
    </section>
    <!-- Hero Section end -->

    <!-- About section start -->
    <section id="about" class="about">
        <h2><span>About</span> Us</h2>

        <div class="row">
            <div class="about-img">
                <img src="{{ asset('asset-views/img/logo-caseth.png') }}" alt="About Us" />
            </div>
            <div class="content">
                <h3>Why Caseth?</h3>
                <p>
                    Caseth la Magasin is the perfect choice for consumers seeking high-quality and
                    unique phone accessories like phone straps, cases, and boquettes.
                    The store not only offers products with exclusive designs that can be customized to suit each
                    customer's personal style and preferences, but it also guarantees durable, functional items that
                    stand the test of time. With competitive prices, Caseth la Magasin provides excellent value without
                    compromising on quality.
                </p>
            </div>
        </div>
    </section>
    <!-- About section end -->

    <!-- Menu Section Start -->
    <section id="menu" class="menu">
        <h2><span>Our</span> Products</h2>
        <p>
            Offers accessories that can beautify your day.
        </p>

        <div class="row">
            <div class="menu-card">
                <img src="{{ asset('asset-views/img/category/casing.jpg') }}" alt="boquette"
                    style="width: 300px; height: 300px" class="menu-card-img" />
                <h3 class="menu-card-title">- Casing -</h3>
            </div>

            <div class="menu-card">
                <img src="{{ asset('asset-views/img/category/boquette.jpg') }}" alt="boquette"
                    style="width: 300px; height: 300px" class="menu-card-img" />
                <h3 class="menu-card-title">- Booquette -</h3>
            </div>

            <div class="menu-card">
                <img src="{{ asset('asset-views/img/category/phone-strap.jpg') }}" alt="boquette"
                    style="width: 300px; height: 300px" class="menu-card-img" />
                <h3 class="menu-card-title">- Phone Strap -</h3>
            </div>


        </div>
    </section>

    <!-- Menu Section End -->

    <marquee behavior="scroll" direction="left">October Halloween Edition !!!</marquee>

    {{-- carousel ads section start --}}
    <x-carousel></x-carousel>
    {{-- carousel ads section end --}}

    <!--Superiority  Section -->
    <section>
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl py-16 sm:py-24 lg:max-w-none lg:py-32">
                <h2 class="text-2xl font-bold text-gray-900">Superiority</h2>

                <div class="mt-6 space-y-12 lg:grid lg:grid-cols-3 lg:gap-x-6 lg:space-y-0">
                    <div class="group relative">
                        <img src="{{ asset('asset-views/img/keunggulan/content_1.png') }}"
                            alt="Desk with leather desk pad, walnut desk organizer, wireless keyboard and mouse, and porcelain mug."
                            class="w-full rounded-lg bg-white object-cover group-hover:opacity-75 max-sm:h-80 sm:aspect-[2/1] lg:aspect-square">
                        <h3 class="mt-6 text-base text-gray-900">
                            <a href="#">
                                <span class="absolute inset-0"></span>
                                Design Trendy
                            </a>
                            <p class="text-sm font-semibold text-gray-500">In the world of design, trends change
                                rapidly, and we are committed to staying at the forefront with Trendy Design. We present
                                attractive innovations and prioritize modern styles that follow the latest developments.
                            </p>
                        </h3>
                    </div>
                    <div class="group relative">
                        <img src="{{ asset('asset-views/img/keunggulan/content_2.png') }}"
                            alt="Wood table with porcelain mug, leather journal, brass pen, leather key ring, and a houseplant."
                            class="w-full rounded-lg bg-white object-cover group-hover:opacity-75 max-sm:h-80 sm:aspect-[2/1] lg:aspect-square">
                        <h3 class="mt-6 text-base text-gray-900">
                            <a href="#">
                                <span class="absolute inset-0"></span>
                                Friendly Prices
                            </a>
                        </h3>
                        <p class="text-sm font-semibold text-gray-500">We believe that getting quality products doesn't
                            have to empty your wallet. We are committed to providing goods of the best quality but still
                            at pocket-friendly prices. Now, you can enjoy superior products without having to pay more.
                        </p>
                    </div>
                    <div class="group relative">
                        <img src="{{ asset('asset-views/img/keunggulan/content_3.png') }}"
                            alt="Collection of four insulated travel bottles on wooden shelf."
                            class="w-full rounded-lg bg-white object-cover group-hover:opacity-75 max-sm:h-80 sm:aspect-[2/1] lg:aspect-square">
                        <h3 class="mt-6 text-base text-gray-900">
                            <a href="#">
                                <span class="absolute inset-0"></span>
                                Effortless style
                            </a>
                        </h3>
                        <p class="text-sm font-semibold text-gray-500">we feature products designed to provide stunning
                            style with minimal effort. Each of our items is created to provide an elegant and
                            effortlessly coordinated feel, so you can look fashionable every day without any hassle.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact section start -->

    <section id="contact" class="contact">
        <h2><span>Contact</span> Us</h2>
        <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Adipisci,
            exercitationem?
        </p>

        <div class="row">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d573.9122442793729!2d106.75836778409546!3d-6.582311911440475!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c5ea0cde9023%3A0xa2193cca1e0fa3a8!2sJl.%20Raya%20Laladon%20Gg.%20Barokah%20No.46%2C%20RT.01%2FRW.01%2C%20Laladon%2C%20Kec.%20Ciomas%2C%20Kabupaten%20Bogor%2C%20Jawa%20Barat%2016610!5e0!3m2!1sid!2sid!4v1728094456459!5m2!1sid!2sid"
                allowfullscreen="" loading="lazy" class="map" referrerpolicy="no-referrer-when-downgrade"></iframe>

            <form action="">
                <div class="input-group">
                    <i data-feather="user"></i>
                    <input type="text" placeholder="Name" />
                </div>

                <div class="input-group">
                    <i data-feather="mail"></i>
                    <input type="text" placeholder="Email" />
                </div>

                <div class="input-group">
                    <i data-feather="phone"></i>
                    <input type="text" placeholder="Phone Number" />
                </div>

                <button type="submit" class="btn">Submit</button>
            </form>
        </div>
    </section>

    <!-- Contact section end -->

    <x-footer></x-footer>

    <x-icon-j-s></x-icon-j-s>
</body>

</html>

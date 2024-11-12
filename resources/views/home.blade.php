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
            The store not only offers products with exclusive designs that can be customized to suit each customer's personal style and preferences, but it also guarantees durable, functional items that stand the test of time. With competitive prices, Caseth la Magasin provides excellent value without compromising on quality.
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
          <img
            src="{{ asset('asset-views/img/category/casing.jpg') }}"
            alt="boquette"
            style="width: 300px; height: 300px"
            class="menu-card-img"
          />
          <h3 class="menu-card-title">- Casing -</h3>
        </div>

        <div class="menu-card">
          <img
            src="{{ asset('asset-views/img/category/boquette.jpg') }}"
            alt="boquette"
            style="width: 300px; height: 300px"
            class="menu-card-img"
          />
          <h3 class="menu-card-title">- Booquette -</h3>
        </div>

        <div class="menu-card">
          <img
            src="{{ asset('asset-views/img/category/phone-strap.jpg') }}"
            alt="boquette"
            style="width: 300px; height: 300px"
            class="menu-card-img"
          />
          <h3 class="menu-card-title">- Phone Strap -</h3>
        </div>


      </div>
    </section>

    <!-- Menu Section End -->

    <marquee behavior="scroll" direction="left">October Halloween Edition !!!</marquee>

    {{-- carousel ads section start --}}
    <x-carousel></x-carousel>
    {{-- carousel ads section end --}}

    <!-- Products Section -->
    <section class="products" id="products" x-data="products">
      <h2><span>Best</span> Seller</h2>
      <p>
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Adipisci,
        exercitationem?
      </p>

      <div class="row">
        <template x-for="(item, index) in items" x-key="index">
          <div class="product-card">
            <div class="product-icon">
              <a href="#" @click.prevent="$store.cart.add(item)">
                <svg
                  width="24"
                  height="24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                >
                  <use href="{{ asset('asset-views/img/feather-sprite.svg#shopping-cart') }}" />
                </svg>
              </a>
              <a
                href="#"
                class="item-detail-button"
                @click.prevent="setSelectedItem(item)"
              >
                <svg
                  width="24"
                  height="24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                >
                  <use href="{{ asset('asset-views/img/feather-sprite.svg#eye') }}" />
                </svg>
              </a>
            </div>

            <div class="product-image">
              <img :src="`{{ asset('asset-views/img/category/${item.img}') }}`" :alt="item.name" />
            </div>
            <div class="product-conten">
              <h3 x-text="item.name"></h3>
              <div class="product-stars">
                <svg
                  width="24"
                  height="24"
                  fill="currentColor"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                >
                  <use href="{{ ('asset-views/img/feather-sprite.svg#star') }}" />
                </svg>
                <svg
                  width="24"
                  height="24"
                  fill="currentColor"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                >
                  <use href="{{ ('asset-views/img/feather-sprite.svg#star') }}" />
                </svg>
                <svg
                  width="24"
                  height="24"
                  fill="currentColor"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                >
                  <use href="{{ ('asset-views/img/feather-sprite.svg#star') }}" />
                </svg>
                <svg
                  width="24"
                  height="24"
                  fill="currentColor"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                >
                  <use href="{{ ('asset-views/img/feather-sprite.svg#star') }}" />
                </svg>
                <svg
                  width="24"
                  height="24"
                  fill="currentColor"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                >
                  <use href="{{ ('asset-views/img/feather-sprite.svg#star') }}" />
                </svg>
              </div>
              <div class="product-price">
                <span x-text="rupiah(item.price)"></span>
              </div>
            </div>
          </div>
        </template>
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
          allowfullscreen=""
          loading="lazy"
          class="map"
          referrerpolicy="no-referrer-when-downgrade"
        ></iframe>

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

    <!-- Modal box item detail start -->
    <div
      class="modal"
      id="item-detail-modal"
      x-show="itemDetailModal"
      x-transition
    >
      <div class="modal-container">
        <a href="#" @click="itemDetailModal = false" class="close-icon"
          ><i data-feather="x-circle"></i
        ></a>
        <div class="modal-content">
          <!-- Sesuai item yang dipilih -->
          <img :src="`./img/products/${selectedItem.img}`" alt="Produk 1" />
          <div class="product-content">
            <h3 x-text="selectedItem.name"></h3>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias
              quam, distinctio aliquid veniam sapiente aperiam minus quaerat
              aspernatur? Itaque distinctio, blanditiis asperiores adipisci
              optio consectetur.
            </p>
            <div class="product-stars">
              <i data-feather="star" class="star-full"></i>
              <i data-feather="star" class="star-full"></i>
              <i data-feather="star" class="star-full"></i>
              <i data-feather="star" class="star-full"></i>
              <i data-feather="star"></i>
            </div>
            <div class="product-price">
              <span x-text="rupiah(selectedItem.price)"></span>
            </div>
            <a href="#">
              <i data-feather="shopping-cart"></i> <span>Add to cart</span>
            </a>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal box item detail end -->
    <x-icon-j-s></x-icon-j-s>
  </body>
</html>


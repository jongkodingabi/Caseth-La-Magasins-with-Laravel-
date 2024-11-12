// Toggle class active for hamburger menu
const navbarNav = document.querySelector(".navbar-nav");
document.querySelector("#hamburger-menu").onclick = () => {
    navbarNav.classList.toggle("active");
};

// Toggle class active for search form
const searchForm = document.querySelector(".search-form");
const searchBox = document.querySelector("#search-box");
document.querySelector("#search-button").onclick = (e) => {
    searchForm.classList.toggle("active");
    searchBox.focus();
    e.preventDefault();
};

// Toggle class active shopping cart
const shoppingCart = document.querySelector(".shopping-cart");
document.querySelector("#shopping-cart-button").onclick = (e) => {
    shoppingCart.classList.toggle("active");
    e.preventDefault();
};

// Click outside elements to close
const hm = document.querySelector("#hamburger-menu");
const sb = document.querySelector("#search-button");
const sc = document.querySelector("#shopping-cart-button");
const dm = document.querySelector("#dropdownMenu");
document.addEventListener("click", function (e) {
    if (!hm.contains(e.target) && !navbarNav.contains(e.target)) {
        navbarNav.classList.remove("active");
    }
    if (!sb.contains(e.target) && !searchForm.contains(e.target)) {
        searchForm.classList.remove("active");
    }
    if (!sc.contains(e.target) && !shoppingCart.contains(e.target)) {
        shoppingCart.classList.remove("active");
    }
    if (!dm.contains(e.target) && !dropdown.contains(e.target)) {
        dropdownMenu.classList.remove("active");
    }
});

// Modal box functionality
document.addEventListener("DOMContentLoaded", function () {
    const itemDetailModal = document.querySelector("#item-detail-modal");
    const itemDetailButtons = document.querySelectorAll(".item-detail-button");

    itemDetailButtons.forEach((btn) => {
        btn.onclick = (e) => {
            itemDetailModal.style.display = "flex";
            e.preventDefault();
        };
    });

    // Close button
    document.querySelector(".modal .close-icon").onclick = (e) => {
        itemDetailModal.style.display = "none";
        e.preventDefault();
    };

    // Click outside modal to close
    window.onclick = (e) => {
        if (e.target === itemDetailModal) {
            itemDetailModal.style.display = "none";
        }
    };
});

// Carousel functionality
let currentSlide = 0;
const slides = document.querySelectorAll(".slide");

function showSlide(index) {
    slides[currentSlide].classList.remove("active"); // Hapus kelas aktif dari slide sebelumnya
    currentSlide = (index + slides.length) % slides.length; // Perbarui indeks slide
    slides[currentSlide].classList.add("active"); // Tambahkan kelas aktif ke slide baru
    updateSlidePosition();
}

function updateSlidePosition() {
    const offset = -currentSlide * 100; // Hitung offset untuk slide
    document.querySelector(
        ".slides"
    ).style.transform = `translateX(${offset}%)`; // Terapkan transformasi
}

function changeSlide(direction) {
    showSlide(currentSlide + direction);
}

// Fungsi untuk mengatur auto slide
function autoSlide() {
    changeSlide(1); // Pindah ke slide berikutnya
}

// Atur interval untuk auto slide setiap 3 detik
setInterval(autoSlide, 3000);

// Tampilkan slide pertama
showSlide(currentSlide);

//dropdown
document.getElementById("userIcon").addEventListener("click", function () {
    var dropdown = document.getElementById("dropdownMenu");
    if (dropdown.style.display === "none") {
        dropdown.style.display = "block";
    } else {
        dropdown.style.display = "none";
    }
});

document.addEventListener("alpine:init", () => {
    // Fungsi untuk menyimpan cart ke localStorage
    const saveCartToLocalStorage = (cart) => {
        localStorage.setItem(
            "cart",
            JSON.stringify({
                items: cart.items,
                total: cart.total,
                quantity: cart.quantity,
            })
        );
    };

    // Fungsi untuk mengambil cart dari localStorage
    const getCartFromLocalStorage = () => {
        const cart = localStorage.getItem("cart");
        return cart ? JSON.parse(cart) : { items: [], total: 0, quantity: 0 };
    };

    Alpine.data("products", () => ({
        items: [
            {
                id: 1,
                name: "Costum casing",
                img: "casing.jpg",
                price: 25000,
            },
            {
                id: 2,
                name: "Satin Boquette",
                img: "boquette.jpg",
                price: 40000,
            },
            {
                id: 3,
                name: "Blue Phone Strap",
                img: "phone-strap.jpg",
                price: 33000,
            },
        ],
    }));

    Alpine.store("cart", {
        // Inisialisasi cart dari localStorage atau mulai dari kosong
        ...getCartFromLocalStorage(),

        add(newItem) {
            const cartItem = this.items.find((item) => item.id === newItem.id);

            if (!cartItem) {
                // Menambahkan item baru ke cart
                this.items.push({
                    ...newItem,
                    quantity: 1,
                    total: newItem.price,
                });
                this.quantity++;
                this.total += newItem.price;
            } else {
                // Jika item sudah ada, tambahkan kuantitas dan perbarui total
                this.items = this.items.map((item) => {
                    if (item.id !== newItem.id) {
                        return item;
                    } else {
                        item.quantity++;
                        item.total = item.price * item.quantity;
                        this.total += item.price;
                        return item;
                    }
                });
            }

            // Simpan perubahan ke localStorage
            saveCartToLocalStorage(this);
        },

        remove(id) {
            const cartItem = this.items.find((item) => item.id === id);

            if (cartItem.quantity > 1) {
                this.items = this.items.map((item) => {
                    if (item.id !== id) {
                        return item;
                    } else {
                        item.quantity--;
                        item.total = item.price * item.quantity;
                        this.quantity--;
                        this.total -= item.price;
                        return item;
                    }
                });
            } else if (cartItem.quantity === 1) {
                this.items = this.items.filter((item) => item.id != id);
                this.quantity--;
                this.total -= cartItem.price;
            }

            // Simpan perubahan ke localStorage
            saveCartToLocalStorage(this);
        },
    });
});

// Fungsi konversi harga ke Rupiah
const rupiah = (number) => {
    return new Intl.NumberFormat("id-ID", {
        style: "currency",
        currency: "IDR",
        minimumFractionDigits: 0,
    }).format(number);
};

// Modal Produk
document.addEventListener("alpine:init", () => {
    Alpine.data("productModal", () => ({
        itemDetailModal: false,
        selectedItem: {},

        setSelectedItem(item) {
            this.selectedItem = item;
            this.itemDetailModal = true;
        },
    }));
});

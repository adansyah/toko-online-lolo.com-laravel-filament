@extends('layouts.app')
@section('content')
    {{-- TOAST --}}
    <div id="toast"
        class="hidden fixed right-5 px-4 py-3 rounded-lg shadow-lg text-white text-sm opacity-0 
    transition-all duration-300 z-[9999]">
    </div>

    <div class="max-w-[1300px] mx-auto mt-10 px-4 grid grid-cols-1 lg:grid-cols-4 gap-6">

        <!-- ====================== SIDEBAR ====================== -->
        <aside class="lg:col-span-1 space-y-6">

            <!-- HOT DEALS -->
            <div class="bg-white p-5 rounded-xl shadow-md">
                <h3 class="text-xl font-bold text-[#ff6f00] mb-4 text-center">🔥 Hot Deals</h3>

                @forelse ($hotDeals as $item)
                    <div class="mb-6">

                        <!-- Gambar -->
                        <a href="{{ route('detail-produk', $item->id) }}" class="block relative">
                            <img src="{{ asset('storage/' . $item->image1) }}" class="w-full h-60 object-cover rounded-lg">

                            <!-- Badge -->
                            <span
                                class="absolute top-3 right-3 bg-red-500 text-white text-xs font-bold px-3 py-1 rounded-full">
                                SALE
                            </span>
                        </a>

                        <!-- Nama Produk -->
                        <p class="text-lg ">{{ $item->nama }}</p>
                        <p class="text-lg ">⭐⭐⭐⭐⭐</p>

                        <!-- Harga -->
                        <p class=" text-xl font-semibold">
                            Rp {{ number_format($item->harga, 0, ',', '.') }}
                        </p>

                        <p class="text-sm line-clamp-2">{{ $item->deskripsi }}</p>
                        <!-- Add to Cart -->
                        <div class="grid grid-cols-2 mt-3">


                            <!-- Add to Cart -->
                            <form action="/cart/add/{{ $item->id }}" method="POST">
                                @csrf
                                <button
                                    class="bg-[#0400ff] hover:bg-blue-600 text-white w-full py-2 rounded-md font-bold flex items-center justify-center gap-2">
                                    Add to Cart
                                </button>
                            </form>

                        </div>

                    </div>

                @empty
                    <p class="text-gray-500 text-sm">Belum ada hot deals.</p>
                @endforelse

            </div>

            <!-- BEST SELLER -->
            <div class="bg-white p-5 rounded-xl shadow-md">
                <h3 class="text-xl font-bold text-[#ff6f00] mb-4">🏆 Best Seller</h3>

                <div class="grid grid-cols-2 lg:grid-cols-1 gap-4">

                    @forelse ($bestSeller as $item)
                        <div class="mb-4">

                            <!-- Gambar Produk -->
                            <a href="{{ route('detail-produk', $item->id) }}" class="block relative">
                                <img src="{{ asset('storage/' . $item->image1) }}"
                                    class="w-full h-32 object-cover rounded-lg" />

                                <!-- BADGE -->
                                <span
                                    class="absolute top-2 left-2 bg-yellow-400 text-black text-xs font-bold px-2 py-1 rounded-full">
                                    BEST
                                </span>
                            </a>

                            <!-- Nama -->
                            <p class="text-sm font-semibold mt-2 leading-tight">
                                {{ $item->nama }}
                            </p>

                            <!-- Harga -->
                            <p class="text-green-600 font-bold text-sm">
                                Rp {{ number_format($item->harga, 0, ',', '.') }}
                            </p>

                            <!-- Tombol Keranjang -->
                            <form action="{{ route('cart.add', $item->id) }}" method="POST">
                                @csrf
                                <button
                                    class="mt-2 w-full flex items-center justify-center gap-2 bg-[#ff6f00] hover:bg-[#e65c00] text-white py-1.5 rounded-lg text-sm shadow transition">

                                    <!-- Icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3
                                                                                                                                                                                                3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684
                                                                                                                                                                                                2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5
                                                                                                                                                                                                14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5
                                                                                                                                                                                                0 .75.75 0 0 1 1.5 0Zm12.75
                                                                                                                                                                                                0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                    </svg>

                                    Tambah
                                </button>
                            </form>

                        </div>
                    @empty
                        <p class="text-gray-500 text-sm">Belum ada best seller.</p>
                    @endforelse

                </div>
            </div>



        </aside>

        <!-- ====================== KANAN ====================== -->
        <main class="lg:col-span-3">

            <!-- BANNER -->
            <section id="bannerSection" class="rounded-xl overflow-hidden shadow-xl relative mb-8">
                <div class="flex">
                    @php $latestVideo = $informasi->first(); @endphp
                    @if ($latestVideo && $latestVideo->video)
                        <video class="w-full h-[260px] lg:h-[330px] object-cover" autoplay muted loop>
                            <source src="{{ asset('storage/' . $latestVideo->video) }}" type="video/mp4">
                        </video>
                    @else
                        <p class="text-center py-10 text-gray-500">Video banner belum tersedia.</p>
                    @endif
                </div>
            </section>


            <!-- 🔥 BANNER TAMBAHAN 1 & 2 -->
            <section class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">

                <!-- BANNER 1 -->
                <div class="rounded-xl overflow-hidden shadow-md">
                    <img src="https://images.unsplash.com/photo-1542838132-92c53300491e?auto=format&fit=crop&w=800&q=80"
                        class="w-full h-40 md:h-48 object-cover">
                </div>

                <!-- BANNER 2 -->
                <div class="rounded-xl overflow-hidden shadow-md">
                    <img src="https://images.unsplash.com/photo-1542838132-92c53300491e?auto=format&fit=crop&w=800&q=80"
                        class="w-full h-40 md:h-48 object-cover">
                </div>

            </section>

            <!-- PRODUK UNGGULAN -->
            <section>

                <!-- PRODUK -->
                <div class="bg-white p-5 rounded-xl shadow-md mt-6">
                    <h3 class="text-xl font-bold text-[#ff6f00] mb-4">🛒 Produk Terbaru</h3>

                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">

                        @forelse ($unggulanProducts as $item)
                            <div>

                                <!-- Gambar -->
                                <a href="{{ route('detail-produk', $item->id) }}" class="block relative">
                                    <img src="{{ asset('storage/' . $item->image1) }}"
                                        class="w-full h-[150px] object-cover rounded-lg">

                                    <!-- Badge -->
                                    <span
                                        class="absolute top-2 left-2 bg-yellow-400 text-black text-xs font-bold px-2 py-1 rounded-full">
                                        BEST
                                    </span>
                                </a>

                                <!-- Nama Produk -->
                                <p class="text-sm mt-1">{{ $item->nama }}</p>
                                <p class="text-sm mt-1">⭐⭐⭐⭐⭐</p>

                                <!-- Harga -->
                                <p class=" font-bold text-sm mt-1">
                                    Rp {{ number_format($item->harga, 0, ',', '.') }}
                                </p>

                                <!-- Add Cart Icon Only -->
                                {{-- <form action="/cart/add/{{ $item->id }}" method="POST" class="mt-1">
                                    @csrf
                                    <button
                                        class="bg-[#ff6f00] hover:bg-orange-600 text-white p-2 rounded-lg w-full flex items-center justify-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.293 2.293a1 1 0 00.707 1.707H19m-12 0a1 1 0 110 2 1 1 0 010-2zm10 0a1 1 0 110 2 1 1 0 010-2z" />
                                        </svg>
                                        Keranjang
                                    </button>
                                </form> --}}

                            </div>
                        @empty
                            <p class="text-gray-500 text-sm">Belum ada produk.</p>
                        @endforelse

                    </div>
                </div>

            </section>

        </main>

    </div>

    <footer class="bg-[#ff6f00] text-white mt-12 px-6 py-10">
        <div class="max-w-[1200px] mx-auto grid md:grid-cols-3 gap-4"> <!-- COL 1 -->
            <div>
                <div class="flex justify-center md:justify-start items-center gap-3 mb-3 text-center"> <svg
                        xmlns="http://www.w3.org/2000/svg" fill="white" class="w-9 h-9" viewBox="0 0 24 24">
                        <path
                            d="M7 18c-1.104 0-2 .896-2 2s.896 2 2 2c1.104 0 2-.896 2-2s-.896-2-2-2zm9 0c-1.104 0-2 .896-2 2s.896 2 2 2c1.104 0 2-.896 2-2s-.896-2-2-2zM19.727 7.586l-9-1.5a1 1 0 00-1.146.832L7 10H5a1 1 0 100 2h1l1.2 6.4a1 1 0 00.98.8h10a1 1 0 000-2H9.8l-.4-2h8.673a1 1 0 00.98-.804l1-5a1 1 0 00-.326-1.006zM7 12h10.4l-.8 4H8l-.8-4z" />
                    </svg>
                    <h3 class="font-bold text-lg">LOLO.com</h3>
                </div>
                <p> LOLO.com adalah platform e-commerce yang menyediakan berbagai kebutuhan Anda dengan mudah dan nyaman.
                </p>
            </div> <!-- COL 2 -->
            <div class="text-center">
                <h3 class="font-bold text-lg mb-3 ">Metode Pembayaran</h3>
                <div class="flex gap-3 items-center"> <img
                        src="https://www.freelogovectors.net/wp-content/uploads/2023/02/bri-logo-freelogovectors.net_.png"
                        class="h-9" /> <img
                        src="https://iconape.com/wp-content/png_logo_vector/bca-bank-central-asia.png" class="h-9" />
                    <img src="https://logos-world.net/wp-content/uploads/2023/02/Dana-Logo.png" class="h-9" /> <img
                        src="https://www.pngkit.com/png/full/989-9894994_ovo-logo-ovo-indonesia.png" class="h-9" />
                    <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjhvTtjN1Bj37W3jTiire9jlqgP046Je6-JPvIVEMjW6avji3kH1eC5HyUDIY8q1l6z89kidy_XZz4cX7-d_rdSentSrY94naUFcRo-NhiEvMUWmevEbQz-xRdMLUFSr61dHVvbVDq58GmxM0UAIgwnfCak8KWr0wTa0UmmjdUQTTcm2pEd3YjuHtPj9Q/s2161/Logo%20QRIS.png"
                        class="h-6 md:h-9" />
                </div>
            </div> <!-- COL 3 -->
            <div class=" text-center">
                <h3 class="font-bold text-lg mb-3">Layanan Pelanggan</h3>
                <p>LOLO@example.com</p>
                <p class=" text-white text-sm"> 📱 +62 858 9987 0978 </p>
                <p class=" text-white text-sm"> ✉️ belanja@example.com </p>
            </div>
        </div>
        <div
            class="bg-[#d6cfc9] rounded-lg text-[#222] text-sm mt-10 py-3 px-6 flex justify-between max-w-[1200px] mx-auto">
            <div>LOLO</div>
            <div class="flex gap-4">
                <p class="text-[#222] font-semibold">Privacy Policy</p>
                <p class="text-[#222] font-semibold">Terms & Conditions</p>
            </div>
        </div>
    </footer>


    {{-- ================= toast script ================= --}}
    <script>
        function showToast(message, type = "success") {
            const toast = document.getElementById("toast");

            toast.className =
                "fixed top-5 right-5 px-4 py-3 rounded-lg shadow-lg text-white text-sm opacity-0 transition-all duration-300 z-[9999]";

            toast.classList.add(type === "error" ? "bg-red-600" : "bg-green-600");
            toast.textContent = message;

            toast.classList.remove("hidden");
            setTimeout(() => toast.style.opacity = "1", 50);

            setTimeout(() => toast.style.opacity = "0", 3000);
            setTimeout(() => toast.classList.add("hidden"), 3500);
        }
    </script>

    <script>
        @if (session('toast_success'))
            showToast("{{ session('toast_success') }}", "success");
        @endif

        @if (session('toast_error'))
            showToast("{{ session('toast_error') }}", "error");
        @endif
    </script>
@endsection

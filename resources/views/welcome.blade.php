<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMAK Syuradikara - Pencipta Pahlawan Utama</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        html {
            scroll-behavior: smooth;
        }

        .dropdown-menu {
            display: none;
        }

        .dropdown-menu.show {
            display: block;
        }

        .modal {
            transition: opacity 0.3s ease;
        }
    </style>
</head>

<body class="bg-white">
    <!-- Navbar -->
    <nav class="bg-white border-b-4 border-black fixed w-full top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <div class="flex items-center">
                    <div
                        class="w-12 h-12 bg-yellow-400 border-4 border-black rounded-full flex items-center justify-center text-black font-black text-xl mr-4">
                        S
                    </div>
                    <h1 class="text-xl font-black text-black">SMAK Syuradikara Ende</h1>
                </div>

                <!-- Menu Desktop -->
                <div class="hidden md:flex items-center space-x-3">
                    <a href="#home"
                        class="text-black hover:bg-yellow-400 px-3 py-2 rounded-lg transition font-bold text-sm">Beranda</a>
                    <a href="/profil"
                        class="text-black hover:bg-yellow-400 px-3 py-2 rounded-lg transition font-bold text-sm">Profil</a>
                    <a href="/berita"
                        class="text-black hover:bg-yellow-400 px-3 py-2 rounded-lg transition font-bold text-sm">Akademik</a>
                    <a href="/berita"
                        class="text-black hover:bg-yellow-400 px-3 py-2 rounded-lg transition font-bold text-sm">Berita</a>
                    <a href="/galeri"
                        class="text-black hover:bg-yellow-400 px-3 py-2 rounded-lg transition font-bold text-sm">Galeri</a>
                    <a href="/ppdb"
                        class="text-black hover:bg-yellow-400 px-3 py-2 rounded-lg transition font-bold text-sm">PPDB</a>
                    <a href="/kontak"
                        class="text-black hover:bg-yellow-400 px-3 py-2 rounded-lg transition font-bold text-sm">Kontak</a>
                </div>

                <!-- Login Button -->
                <div class="flex items-center">
                    <button onclick="openLoginModal()"
                        class="bg-yellow-400 hover:bg-yellow-500 text-black font-black py-2 px-6 border-4 border-black rounded-full transition duration-200 text-sm">
                        Login
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Login Modal -->
    <div id="loginModal"
        class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center modal">
        <div class="bg-white border-4 border-black rounded-3xl shadow-xl w-full max-w-md mx-4">
            <div class="flex justify-between items-center p-6 border-b-4 border-black">
                <div>
                    <h2 class="text-2xl font-black text-black">Login</h2>
                    <p class="text-black text-sm mt-1">Masuk ke sistem informasi sekolah</p>
                </div>
                <button onclick="closeLoginModal()" class="text-black hover:text-yellow-400">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
            <div class="p-6">
                @if ($errors->any())
                    <div class="bg-yellow-100 border-4 border-yellow-400 text-black px-4 py-3 rounded-xl mb-4">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('login') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label for="email" class="block text-sm font-black text-black mb-2">Email</label>
                        <input type="email" name="email" id="email" required
                            class="w-full px-4 py-3 border-4 border-black rounded-xl focus:ring-4 focus:ring-yellow-400 focus:border-yellow-400"
                            placeholder="nama@syuradikara.sch.id">
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-black text-black mb-2">Password</label>
                        <input type="password" name="password" id="password" required
                            class="w-full px-4 py-3 border-4 border-black rounded-xl focus:ring-4 focus:ring-yellow-400 focus:border-yellow-400"
                            placeholder="••••••••">
                    </div>
                    <button type="submit"
                        class="w-full bg-yellow-400 hover:bg-yellow-500 text-black font-black py-3 px-4 border-4 border-black rounded-xl transition duration-200">
                        Masuk ke Sistem
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Hero Section -->
    <section id="home" class="pt-28 pb-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white border-4 border-black rounded-3xl p-8 md:p-12">
                <div class="grid md:grid-cols-2 gap-8 items-center">
                    <!-- Left Content -->
                    <div>
                        <h1 class="text-6xl md:text-7xl font-black text-black mb-2 leading-none">SMAK</h1>
                        <h2 class="text-5xl md:text-6xl font-black text-black mb-8 leading-none">Syuradikara</h2>

                        <div class="bg-white border-4 border-black rounded-2xl p-6 mb-8">
                            <p class="text-black font-black text-lg mb-2">Pencipta Pahlawan Utama</p>
                            <p class="text-black text-base leading-relaxed">
                                Mendidik generasi muda sejak 1953 untuk menjadi pemimpin yang berkarakter, beriman kuat,
                                dan berprestasi di Nusa Tenggara Timur.
                            </p>
                        </div>

                        <div class="flex flex-wrap gap-4">
                            <a href="/ppdb"
                                class="bg-yellow-400 hover:bg-yellow-500 text-black font-black py-4 px-8 border-4 border-black rounded-2xl transition text-lg">
                                Daftar PPDB 2026
                            </a>
                            <a href="#sambutan"
                                class="bg-white hover:bg-gray-100 text-black font-black py-4 px-8 border-4 border-black rounded-2xl transition text-lg">
                                Jelajahi Sekolah
                            </a>
                        </div>
                    </div>

                    <!-- Right Stats -->
                    <div>
                        <p class="text-black font-black text-xl mb-6 text-center">Banner Sekolah</p>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-white border-4 border-black rounded-2xl p-6 text-center">
                                <div class="text-5xl font-black text-black mb-2">70+</div>
                                <div class="text-black text-sm font-black">Tahun Berdiri</div>
                            </div>
                            <div class="bg-white border-4 border-black rounded-2xl p-6 text-center">
                                <div class="text-5xl font-black text-black mb-2">1000+</div>
                                <div class="text-black text-sm font-black">Alumni Sukses</div>
                            </div>
                            <div class="bg-white border-4 border-black rounded-2xl p-6 text-center">
                                <div class="text-5xl font-black text-black mb-2">50+</div>
                                <div class="text-black text-sm font-black">Guru & Pegawai</div>
                            </div>
                            <div class="bg-white border-4 border-black rounded-2xl p-6 text-center">
                                <div class="text-5xl font-black text-black mb-2">A</div>
                                <div class="text-black text-sm font-black">Akreditasi</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sambutan Kepala Sekolah -->
    <section id="sambutan" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-8">
                <!-- Foto Kepala Sekolah -->
                <div class="bg-white border-4 border-black rounded-3xl overflow-hidden aspect-square">
                    @if (isset($profil) && $profil->foto_kepala)
                        <img src="{{ asset('storage/' . $profil->foto_kepala) }}" alt="Kepala Sekolah"
                            class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full bg-gray-100 flex items-center justify-center">
                            <div class="text-center">
                                <svg class="w-32 h-32 text-black mx-auto mb-4" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                <p class="text-black font-black text-xl">Foto Kepala Sekolah</p>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Kata Sambutan -->
                <div class="bg-white border-4 border-black rounded-3xl p-8 md:p-12 flex flex-col justify-center">
                    <h3 class="text-4xl font-black text-black mb-6">Kata Sambutan Kepala Sekolah</h3>
                    <div class="space-y-4 text-black leading-relaxed text-lg">
                        @if (isset($profil) && $profil->sambutan)
                            <p>{{ $profil->sambutan }}</p>
                        @else
                            <p>Selamat datang di SMAK Syuradikara Ende, sekolah Katolik yang telah mendidik generasi
                                muda sejak tahun 1953.</p>
                            <p>Kami berkomitmen untuk menciptakan lingkungan belajar yang kondusif, membentuk karakter
                                siswa yang kuat, dan mempersiapkan mereka menjadi pemimpin masa depan yang beriman dan
                                berprestasi.</p>
                            <p>Dengan dukungan tenaga pendidik yang profesional dan fasilitas yang memadai, kami yakin
                                setiap siswa dapat mengembangkan potensi terbaik mereka.</p>
                            <p class="font-black mt-6">- Kepala SMAK Syuradikara</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Berita Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h3 class="text-4xl font-black text-black mb-12 text-center uppercase tracking-wider">Berita</h3>
            <div class="grid md:grid-cols-3 gap-8">
                @forelse($berita ?? [] as $item)
                    <a href="/berita/{{ $item->slug ?? $item->id }}"
                        class="bg-white border-4 border-black rounded-3xl overflow-hidden hover:shadow-2xl transition group">
                        <div class="aspect-video bg-gray-100 flex items-center justify-center border-b-4 border-black">
                            @if ($item->foto)
                                <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->judul }}"
                                    class="w-full h-full object-cover">
                            @else
                                <svg class="w-20 h-20 text-black" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                                    </path>
                                </svg>
                            @endif
                        </div>
                        <div class="p-6">
                            <h4
                                class="font-black text-black text-xl mb-3 line-clamp-2 group-hover:text-yellow-400 transition">
                                {{ $item->judul }}</h4>
                            <p class="text-black text-base line-clamp-3">{{ Str::limit($item->isi, 120) }}</p>
                        </div>
                    </a>
                @empty
                    <div class="bg-white border-4 border-black rounded-3xl p-16 text-center">
                        <p class="text-black font-black text-xl">Belum ada berita</p>
                    </div>
                    <div class="bg-white border-4 border-black rounded-3xl p-16 text-center">
                        <p class="text-black font-black text-xl">Belum ada berita</p>
                    </div>
                    <div class="bg-white border-4 border-black rounded-3xl p-16 text-center">
                        <p class="text-black font-black text-xl">Belum ada berita</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Prestasi Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h3 class="text-4xl font-black text-black mb-12 text-center uppercase tracking-wider">Prestasi</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div
                    class="bg-white border-4 border-black rounded-3xl p-8 text-center hover:bg-yellow-400 transition group">
                    <div
                        class="w-20 h-20 bg-yellow-400 group-hover:bg-white border-4 border-black rounded-full flex items-center justify-center mx-auto mb-6 transition">
                        <span class="text-4xl">🏆</span>
                    </div>
                    <h4 class="font-black text-black text-lg">Juara 1 Olimpiade Sains</h4>
                </div>
                <div
                    class="bg-white border-4 border-black rounded-3xl p-8 text-center hover:bg-yellow-400 transition group">
                    <div
                        class="w-20 h-20 bg-yellow-400 group-hover:bg-white border-4 border-black rounded-full flex items-center justify-center mx-auto mb-6 transition">
                        <span class="text-4xl">🥇</span>
                    </div>
                    <h4 class="font-black text-black text-lg">Best School Award</h4>
                </div>
                <div
                    class="bg-white border-4 border-black rounded-3xl p-8 text-center hover:bg-yellow-400 transition group">
                    <div
                        class="w-20 h-20 bg-yellow-400 group-hover:bg-white border-4 border-black rounded-full flex items-center justify-center mx-auto mb-6 transition">
                        <span class="text-4xl">🎖️</span>
                    </div>
                    <h4 class="font-black text-black text-lg">Juara Umum Lomba</h4>
                </div>
                <div
                    class="bg-white border-4 border-black rounded-3xl p-8 text-center hover:bg-yellow-400 transition group">
                    <div
                        class="w-20 h-20 bg-yellow-400 group-hover:bg-white border-4 border-black rounded-full flex items-center justify-center mx-auto mb-6 transition">
                        <span class="text-4xl">⭐</span>
                    </div>
                    <h4 class="font-black text-black text-lg">Sekolah Adiwiyata</h4>
                </div>
            </div>
        </div>
    </section>

    <!-- Foto Kegiatan Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h3 class="text-4xl font-black text-black mb-12 text-center uppercase tracking-wider">Foto Kegiatan</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                @forelse($galeri ?? [] as $item)
                    <div
                        class="bg-white border-4 border-black rounded-3xl overflow-hidden hover:shadow-2xl transition group">
                        <div class="aspect-square bg-gray-100">
                            @if ($item->foto)
                                <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->judul }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                            @else
                                <div class="flex items-center justify-center h-full">
                                    <svg class="w-16 h-16 text-black" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </div>
                            @endif
                        </div>
                        <div class="p-4 border-t-4 border-black">
                            <p class="text-black font-black text-sm text-center line-clamp-2">{{ $item->judul }}</p>
                        </div>
                    </div>
                @empty
                    <div class="bg-white border-4 border-black rounded-3xl p-12 text-center">
                        <p class="text-black font-black">Belum ada foto</p>
                    </div>
                    <div class="bg-white border-4 border-black rounded-3xl p-12 text-center">
                        <p class="text-black font-black">Belum ada foto</p>
                    </div>
                    <div class="bg-white border-4 border-black rounded-3xl p-12 text-center">
                        <p class="text-black font-black">Belum ada foto</p>
                    </div>
                    <div class="bg-white border-4 border-black rounded-3xl p-12 text-center">
                        <p class="text-black font-black">Belum ada foto</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Kontak Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-8">
                <!-- Informasi Kontak -->
                <div class="bg-white border-4 border-black rounded-3xl p-8 md:p-12">
                    <h3 class="text-3xl font-black text-black mb-8 uppercase">Informasi Kontak</h3>
                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div
                                class="w-14 h-14 bg-yellow-400 border-4 border-black rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                                <svg class="w-7 h-7 text-black" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="font-black text-black mb-1 text-lg">Alamat</p>
                                <p class="text-black">Jl. Wirajaya, Kel. Onekore, Kec. Ende Tengah, Kabupaten Ende, NTT
                                    86312</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div
                                class="w-14 h-14 bg-yellow-400 border-4 border-black rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                                <svg class="w-7 h-7 text-black" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <p class="font-black text-black mb-1 text-lg">Telepon</p>
                                <p class="text-black">(0381) 21648</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div
                                class="w-14 h-14 bg-yellow-400 border-4 border-black rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                                <svg class="w-7 h-7 text-black" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <p class="font-black text-black mb-1 text-lg">Email</p>
                                <p class="text-black">smakswastasyuradikara@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Kirim Pesan -->
                <div class="bg-white border-4 border-black rounded-3xl p-8 md:p-12">
                    <h3 class="text-3xl font-black text-black mb-8 uppercase">Kirim Pesan</h3>
                    <form class="space-y-5">
                        <input type="text" placeholder="Nama Lengkap"
                            class="w-full px-5 py-4 border-4 border-black rounded-xl focus:ring-4 focus:ring-yellow-400 focus:border-yellow-400 text-lg font-bold">
                        <input type="email" placeholder="Email Anda"
                            class="w-full px-5 py-4 border-4 border-black rounded-xl focus:ring-4 focus:ring-yellow-400 focus:border-yellow-400 text-lg font-bold">
                        <input type="text" placeholder="Subjek"
                            class="w-full px-5 py-4 border-4 border-black rounded-xl focus:ring-4 focus:ring-yellow-400 focus:border-yellow-400 text-lg font-bold">
                        <textarea placeholder="Pesan Anda" rows="4"
                            class="w-full px-5 py-4 border-4 border-black rounded-xl focus:ring-4 focus:ring-yellow-400 focus:border-yellow-400 text-lg font-bold"></textarea>
                        <button type="submit"
                            class="w-full bg-yellow-400 hover:bg-yellow-500 text-black font-black py-4 px-6 border-4 border-black rounded-xl transition duration-200 text-lg">
                            Kirim Pesan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-white border-t-4 border-black py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-3 gap-12 mb-12">
                <!-- Tentang Sekolah -->
                <div>
                    <h3 class="text-2xl font-black text-black mb-6">SMAK Syuradikara</h3>
                    <p class="text-black font-black mb-6">Pencipta Pahlawan Utama</p>
                    <p class="text-black leading-relaxed">
                        Jl. Wirajaya, Kel. Onekore, Kec. Ende Tengah<br>
                        Kabupaten Ende, Nusa Tenggara Tim. 86312<br>
                        Telp: (0381) 21648
                    </p>
                </div>

                <!-- Link Cepat -->
                <div>
                    <h3 class="text-2xl font-black text-black mb-6">Link Cepat</h3>
                    <ul class="space-y-3">
                        <li><a href="/profil" class="text-black hover:text-yellow-400 transition font-bold">Profil
                                Sekolah</a></li>
                        <li><a href="/guru" class="text-black hover:text-yellow-400 transition font-bold">Guru &
                                Pegawai</a></li>
                        <li><a href="/ppdb" class="text-black hover:text-yellow-400 transition font-bold">PPDB
                                Online</a></li>
                        <li><a href="/berita" class="text-black hover:text-yellow-400 transition font-bold">Berita</a>
                        </li>
                        <li><a href="/galeri" class="text-black hover:text-yellow-400 transition font-bold">Galeri</a>
                        </li>
                        <li><a href="/kontak" class="text-black hover:text-yellow-400 transition font-bold">Kontak</a>
                        </li>
                    </ul>
                </div>

                <!-- Jam Operasional -->
                <div>
                    <h3 class="text-2xl font-black text-black mb-6">Jam Operasional</h3>
                    <ul class="space-y-3 text-black font-bold">
                        <li>Senin - Jumat: 07:00 - 15:00</li>
                        <li>Sabtu: 07:00 - 12:00</li>
                        <li>Minggu: Tutup</li>
                    </ul>
                </div>
            </div>

            <div class="border-t-4 border-black pt-8 text-center">
                <p class="text-black font-black text-lg">&copy; 2026 SMAK Syuradikara - Pencipta Pahlawan Utama. All
                    rights reserved.</p>
                <p class="text-black font-bold mt-2">Ende, Nusa Tenggara Timur, Indonesia</p>
            </div>
        </div>
    </footer>

    <!-- JavaScript for Login Modal -->
    <script>
        function openLoginModal() {
            document.getElementById('loginModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeLoginModal() {
            document.getElementById('loginModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        document.getElementById('loginModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeLoginModal();
            }
        });

        @if ($errors->any())
            openLoginModal();
        @endif
    </script>
</body>

</html>

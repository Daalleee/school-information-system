<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guru & Pegawai SMAK Syuradikara</title>
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

<body class="bg-gray-50">
    <!-- Navbar -->
    <nav class="bg-white shadow-md fixed w-full top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="/" class="flex items-center">
                        <div
                            class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center text-white font-bold mr-3">
                            S</div>
                        <div>
                            <h1 class="text-lg font-bold text-blue-600">SMAK Syuradikara</h1>
                            <p class="text-xs text-gray-500">Pencipta Pahlawan Utama</p>
                        </div>
                    </a>
                </div>
                <div class="hidden md:flex items-center space-x-6">
                    <a href="/" class="text-gray-700 hover:text-blue-600 transition font-medium">Beranda</a>
                    <div class="relative dropdown">
                        <button onclick="toggleDropdown(this)"
                            class="text-gray-700 hover:text-blue-600 transition font-medium flex items-center">Profil
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div class="dropdown-menu absolute bg-white shadow-lg rounded-lg mt-2 py-2 min-w-[200px]">
                            <a href="/profil#visi-misi"
                                class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600">Visi &
                                Misi</a>
                            <a href="/profil#sejarah"
                                class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600">Sejarah</a>
                            <a href="/profil#sambutan"
                                class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600">Sambutan
                                Kepala Sekolah</a>
                            <a href="/profil#tujuan"
                                class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600">Tujuan
                                Sekolah</a>
                        </div>
                    </div>
                    <a href="/guru" class="text-blue-600 font-medium">Guru & Pegawai</a>
                    <a href="/fasilitas" class="text-gray-700 hover:text-blue-600 transition font-medium">Fasilitas</a>
                    <div class="relative dropdown">
                        <button onclick="toggleDropdown(this)"
                            class="text-gray-700 hover:text-blue-600 transition font-medium flex items-center">Akademik
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div class="dropdown-menu absolute bg-white shadow-lg rounded-lg mt-2 py-2 min-w-[200px]">
                            <a href="/berita"
                                class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600">Berita</a>
                            <a href="/pengumuman"
                                class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600">Pengumuman</a>
                            <a href="/galeri"
                                class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600">Galeri</a>
                        </div>
                    </div>
                    <a href="/ppdb" class="text-gray-700 hover:text-blue-600 transition font-medium">PPDB</a>
                    <a href="/kemitraan" class="text-gray-700 hover:text-blue-600 transition font-medium">Kemitraan</a>
                    <a href="/kontak" class="text-gray-700 hover:text-blue-600 transition font-medium">Kontak</a>
                </div>
                <div class="flex items-center">
                    <button onclick="openLoginModal()"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-lg transition duration-200">Login</button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Login Modal -->
    <div id="loginModal"
        class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center modal">
        <div class="bg-white rounded-lg shadow-xl w-full max-w-md mx-4">
            <div class="flex justify-between items-center p-6 border-b">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">Login</h2>
                    <p class="text-gray-600 text-sm mt-1">Masuk ke sistem informasi sekolah</p>
                </div>
                <button onclick="closeLoginModal()" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
            <div class="p-6">
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('login') }}" method="POST" class="space-y-4">@csrf
                    <div><label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label><input
                            type="email" name="email" id="email" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            placeholder="nama@syuradikara.sch.id"></div>
                    <div><label for="password"
                            class="block text-sm font-medium text-gray-700 mb-2">Password</label><input type="password"
                            name="password" id="password" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            placeholder="••••••••"></div>
                    <div class="flex items-center"><input type="checkbox" name="remember" id="remember"
                            class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"><label
                            for="remember" class="ml-2 block text-sm text-gray-700">Ingat saya</label></div>
                    <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition duration-200">Masuk
                        ke Sistem</button>
                </form>
                <div class="mt-4 p-4 bg-blue-50 rounded-lg">
                    <p class="text-sm text-gray-700 font-medium mb-2">Demo Login:</p>
                    <p class="text-xs text-gray-600">Admin: admin@sekolah.com / admin123</p>
                    <p class="text-xs text-gray-600">Guru: guru@sekolah.com / guru123</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Hero Section -->
    <section class="pt-16">
        <div class="relative bg-gradient-to-br from-green-600 via-green-700 to-green-900 text-white overflow-hidden">
            <div class="absolute inset-0 opacity-10">
                <div class="absolute top-20 left-10 w-64 h-64 bg-white rounded-full blur-3xl"></div>
                <div class="absolute bottom-20 right-10 w-96 h-96 bg-white rounded-full blur-3xl"></div>
            </div>
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
                <div class="text-center">
                    <div class="inline-block bg-white bg-opacity-20 px-4 py-2 rounded-full text-sm font-medium mb-6">
                        Tenaga Pendidik</div>
                    <h1 class="text-5xl md:text-6xl font-bold mb-6">Guru & Pegawai</h1>
                    <p class="text-xl text-green-100 max-w-3xl mx-auto">Para pendidik profesional dan berdedikasi yang
                        membentuk generasi "Pencipta Pahlawan Utama"</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats -->
    <section class="py-12 bg-white -mt-8 relative z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="bg-white rounded-xl shadow-lg p-6 text-center">
                    <div class="text-4xl font-bold text-green-600 mb-1">35+</div>
                    <div class="text-gray-600 text-sm">Guru Tetap</div>
                </div>
                <div class="bg-white rounded-xl shadow-lg p-6 text-center">
                    <div class="text-4xl font-bold text-green-600 mb-1">15+</div>
                    <div class="text-gray-600 text-sm">Pegawai</div>
                </div>
                <div class="bg-white rounded-xl shadow-lg p-6 text-center">
                    <div class="text-4xl font-bold text-green-600 mb-1">90%</div>
                    <div class="text-gray-600 text-sm">Bergelar Sarjana</div>
                </div>
                <div class="bg-white rounded-xl shadow-lg p-6 text-center">
                    <div class="text-4xl font-bold text-green-600 mb-1">15+</div>
                    <div class="text-gray-600 text-sm">Tahun Rata-rata Mengajar</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Filter -->
    <section class="py-8 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-wrap gap-3">
                <button class="px-5 py-2 bg-green-600 text-white rounded-full text-sm font-medium">Semua</button>
                <button
                    class="px-5 py-2 bg-white text-gray-700 rounded-full text-sm font-medium hover:bg-gray-100 transition">Guru</button>
                <button
                    class="px-5 py-2 bg-white text-gray-700 rounded-full text-sm font-medium hover:bg-gray-100 transition">Pegawai</button>
                <button
                    class="px-5 py-2 bg-white text-gray-700 rounded-full text-sm font-medium hover:bg-gray-100 transition">Laki-laki</button>
                <button
                    class="px-5 py-2 bg-white text-gray-700 rounded-full text-sm font-medium hover:bg-gray-100 transition">Perempuan</button>
            </div>
        </div>
    </section>

    <!-- Guru Grid -->
    <section class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Card 1 -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="h-48 bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                        <svg class="w-20 h-20 text-white opacity-80" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <div class="p-5">
                        <h3 class="text-lg font-bold text-gray-800 mb-1">Br. Kristianus Riberu, SVD, M.Pd.</h3>
                        <p class="text-sm text-blue-600 font-medium mb-2">Kepala Sekolah</p>
                        <div class="space-y-1 text-sm text-gray-600">
                            <p><span class="font-medium">NIP:</span> 197506152000011002</p>
                            <p><span class="font-medium">Jenis Kelamin:</span> Laki-laki</p>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="h-48 bg-gradient-to-br from-green-400 to-green-600 flex items-center justify-center">
                        <svg class="w-20 h-20 text-white opacity-80" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <div class="p-5">
                        <h3 class="text-lg font-bold text-gray-800 mb-1">Maria Theresia, S.Pd.</h3>
                        <p class="text-sm text-green-600 font-medium mb-2">Matematika</p>
                        <div class="space-y-1 text-sm text-gray-600">
                            <p><span class="font-medium">NIP:</span> 198203102005012001</p>
                            <p><span class="font-medium">Jenis Kelamin:</span> Perempuan</p>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="h-48 bg-gradient-to-br from-purple-400 to-purple-600 flex items-center justify-center">
                        <svg class="w-20 h-20 text-white opacity-80" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <div class="p-5">
                        <h3 class="text-lg font-bold text-gray-800 mb-1">Yohanes Pae, S.Si.</h3>
                        <p class="text-sm text-purple-600 font-medium mb-2">Fisika</p>
                        <div class="space-y-1 text-sm text-gray-600">
                            <p><span class="font-medium">NIP:</span> 198905212010011003</p>
                            <p><span class="font-medium">Jenis Kelamin:</span> Laki-laki</p>
                        </div>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="h-48 bg-gradient-to-br from-orange-400 to-orange-600 flex items-center justify-center">
                        <svg class="w-20 h-20 text-white opacity-80" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <div class="p-5">
                        <h3 class="text-lg font-bold text-gray-800 mb-1">Anastasius Blego, S.Pd.</h3>
                        <p class="text-sm text-orange-600 font-medium mb-2">Bahasa Indonesia</p>
                        <div class="space-y-1 text-sm text-gray-600">
                            <p><span class="font-medium">NIP:</span> 198701152011011004</p>
                            <p><span class="font-medium">Jenis Kelamin:</span> Laki-laki</p>
                        </div>
                    </div>
                </div>

                <!-- Card 5 -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="h-48 bg-gradient-to-br from-pink-400 to-pink-600 flex items-center justify-center">
                        <svg class="w-20 h-20 text-white opacity-80" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <div class="p-5">
                        <h3 class="text-lg font-bold text-gray-800 mb-1">Theresia Nonga, S.Pd.</h3>
                        <p class="text-sm text-pink-600 font-medium mb-2">Bahasa Inggris</p>
                        <div class="space-y-1 text-sm text-gray-600">
                            <p><span class="font-medium">NIP:</span> 199002282014012005</p>
                            <p><span class="font-medium">Jenis Kelamin:</span> Perempuan</p>
                        </div>
                    </div>
                </div>

                <!-- Card 6 -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="h-48 bg-gradient-to-br from-teal-400 to-teal-600 flex items-center justify-center">
                        <svg class="w-20 h-20 text-white opacity-80" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <div class="p-5">
                        <h3 class="text-lg font-bold text-gray-800 mb-1">Robertus Do, S.Kom.</h3>
                        <p class="text-sm text-teal-600 font-medium mb-2">Teknologi Informasi</p>
                        <div class="space-y-1 text-sm text-gray-600">
                            <p><span class="font-medium">NIP:</span> 199112052016011006</p>
                            <p><span class="font-medium">Jenis Kelamin:</span> Laki-laki</p>
                        </div>
                    </div>
                </div>

                <!-- Card 7 -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="h-48 bg-gradient-to-br from-indigo-400 to-indigo-600 flex items-center justify-center">
                        <svg class="w-20 h-20 text-white opacity-80" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <div class="p-5">
                        <h3 class="text-lg font-bold text-gray-800 mb-1">Sikola Mude, S.Pd.</h3>
                        <p class="text-sm text-indigo-600 font-medium mb-2">Biologi</p>
                        <div class="space-y-1 text-sm text-gray-600">
                            <p><span class="font-medium">NIP:</span> 198506172009012007</p>
                            <p><span class="font-medium">Jenis Kelamin:</span> Perempuan</p>
                        </div>
                    </div>
                </div>

                <!-- Card 8 -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="h-48 bg-gradient-to-br from-red-400 to-red-600 flex items-center justify-center">
                        <svg class="w-20 h-20 text-white opacity-80" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <div class="p-5">
                        <h3 class="text-lg font-bold text-gray-800 mb-1">Dominikus Kleden, S.Pd.</h3>
                        <p class="text-sm text-red-600 font-medium mb-2">Pendidikan Agama</p>
                        <div class="space-y-1 text-sm text-gray-600">
                            <p><span class="font-medium">NIP:</span> 198304192008011008</p>
                            <p><span class="font-medium">Jenis Kelamin:</span> Laki-laki</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="py-16 bg-green-600 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold mb-4">Bergabunglah dengan Tim Kami</h2>
            <p class="text-green-100 text-lg mb-8 max-w-2xl mx-auto">Kami selalu membuka kesempatan bagi pendidik yang
                berdedikasi untuk bergabung bersama SMAK Syuradikara</p>
            <a href="/kontak"
                class="inline-block bg-white text-green-700 font-medium py-3 px-8 rounded-lg hover:bg-gray-100 transition duration-200">Hubungi
                Kami</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-3 gap-8 mb-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">SMAK Syuradikara</h3>
                    <p class="text-gray-400 mb-4">Pencipta Pahlawan Utama</p>
                    <p class="text-gray-400 text-sm">Jl. Wirajaya, Kel. Onekore, Kec. Ende Tengah<br>Kabupaten Ende,
                        Nusa Tenggara Tim. 86312<br>Telp: (0381) 21648</p>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Link Cepat</h3>
                    <ul class="space-y-2">
                        <li><a href="/profil" class="text-gray-400 hover:text-white transition">Profil Sekolah</a>
                        </li>
                        <li><a href="/guru" class="text-gray-400 hover:text-white transition">Guru & Pegawai</a>
                        </li>
                        <li><a href="/ppdb" class="text-gray-400 hover:text-white transition">PPDB Online</a></li>
                        <li><a href="/berita" class="text-gray-400 hover:text-white transition">Berita</a></li>
                        <li><a href="/galeri" class="text-gray-400 hover:text-white transition">Galeri</a></li>
                        <li><a href="/kontak" class="text-gray-400 hover:text-white transition">Kontak</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Jam Operasional</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li>Senin - Jumat: 07:00 - 15:00</li>
                        <li>Sabtu: 07:00 - 12:00</li>
                        <li>Minggu: Tutup</li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-700 pt-8 text-center">
                <p class="text-gray-400">&copy; 2026 SMAK Syuradikara - Pencipta Pahlawan Utama. All rights reserved.
                </p>
                <p class="text-gray-500 text-sm mt-2">Ende, Nusa Tenggara Timur, Indonesia</p>
            </div>
        </div>
    </footer>

    <script>
        // Dropdown Menu Functions
        function toggleDropdown(button) {
            const dropdown = button.closest('.dropdown');
            const menu = dropdown.querySelector('.dropdown-menu');

            document.querySelectorAll('.dropdown-menu').forEach(m => {
                if (m !== menu) {
                    m.classList.remove('show');
                }
            });

            menu.classList.toggle('show');
        }

        document.addEventListener('click', function(e) {
            if (!e.target.closest('.dropdown')) {
                document.querySelectorAll('.dropdown-menu').forEach(m => {
                    m.classList.remove('show');
                });
            }
        });

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

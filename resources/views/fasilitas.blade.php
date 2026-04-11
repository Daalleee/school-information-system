<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fasilitas SMAK Syuradikara</title>
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
                            class="w-10 h-10 bg-yellow-400 rounded-full flex items-center justify-center text-white font-bold mr-3">
                            S</div>
                        <div>
                            <h1 class="text-lg font-bold text-yellow-600">SMAK Syuradikara</h1>
                            <p class="text-xs text-gray-500">Pencipta Pahlawan Utama</p>
                        </div>
                    </a>
                </div>
                <div class="hidden md:flex items-center space-x-6">
                    <a href="/" class="text-gray-700 hover:text-yellow-600 transition font-medium">Beranda</a>
                    <div class="relative dropdown">
                        <button onclick="toggleDropdown(this)"
                            class="text-gray-700 hover:text-yellow-600 transition font-medium flex items-center">Profil<svg
                                class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg></button>
                        <div class="dropdown-menu absolute bg-white shadow-lg rounded-lg mt-2 py-2 min-w-[200px]">
                            <a href="/profil#visi-misi"
                                class="block px-4 py-2 text-gray-700 hover:bg-yellow-50 hover:text-yellow-600">Visi &
                                Misi</a>
                            <a href="/profil#sejarah"
                                class="block px-4 py-2 text-gray-700 hover:bg-yellow-50 hover:text-yellow-600">Sejarah</a>
                            <a href="/profil#sambutan"
                                class="block px-4 py-2 text-gray-700 hover:bg-yellow-50 hover:text-yellow-600">Sambutan
                                Kepala Sekolah</a>
                            <a href="/profil#tujuan"
                                class="block px-4 py-2 text-gray-700 hover:bg-yellow-50 hover:text-yellow-600">Tujuan
                                Sekolah</a>
                        </div>
                    </div>
                    <a href="/guru" class="text-gray-700 hover:text-yellow-600 transition font-medium">Guru &
                        Pegawai</a>
                    <a href="/fasilitas" class="text-yellow-600 font-medium">Fasilitas</a>
                    <div class="relative dropdown">
                        <button onclick="toggleDropdown(this)"
                            class="text-gray-700 hover:text-yellow-600 transition font-medium flex items-center">Akademik<svg
                                class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg></button>
                        <div class="dropdown-menu absolute bg-white shadow-lg rounded-lg mt-2 py-2 min-w-[200px]">
                            <a href="/berita"
                                class="block px-4 py-2 text-gray-700 hover:bg-yellow-50 hover:text-yellow-600">Berita</a>
                            <a href="/pengumuman"
                                class="block px-4 py-2 text-gray-700 hover:bg-yellow-50 hover:text-yellow-600">Pengumuman</a>
                            <a href="/galeri"
                                class="block px-4 py-2 text-gray-700 hover:bg-yellow-50 hover:text-yellow-600">Galeri</a>
                        </div>
                    </div>
                    <a href="/ppdb" class="text-gray-700 hover:text-yellow-600 transition font-medium">PPDB</a>
                    <a href="/kemitraan"
                        class="text-gray-700 hover:text-yellow-600 transition font-medium">Kemitraan</a>
                    <a href="/kontak" class="text-gray-700 hover:text-yellow-600 transition font-medium">Kontak</a>
                </div>
                <div class="flex items-center"><button onclick="openLoginModal()"
                        class="bg-yellow-400 hover:bg-yellow-500 text-black font-bold py-2 px-6 rounded-lg transition duration-200">Login</button>
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
                </div><button onclick="closeLoginModal()" class="text-gray-400 hover:text-gray-600"><svg class="w-6 h-6"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg></button>
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
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-400 focus:border-transparent"
                            placeholder="nama@syuradikara.sch.id"></div>
                    <div><label for="password"
                            class="block text-sm font-medium text-gray-700 mb-2">Password</label><input type="password"
                            name="password" id="password" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-400 focus:border-transparent"
                            placeholder="••••••••"></div>
                    <div class="flex items-center"><input type="checkbox" name="remember" id="remember"
                            class="h-4 w-4 text-yellow-600 focus:ring-yellow-400 border-gray-300 rounded"><label
                            for="remember" class="ml-2 block text-sm text-gray-700">Ingat saya</label></div>
                    <button type="submit"
                        class="w-full bg-yellow-400 hover:bg-yellow-500 text-black font-bold py-2 px-4 rounded-lg transition duration-200">Masuk
                        ke Sistem</button>
                </form>
                <div class="mt-4 p-4 bg-yellow-50 rounded-lg">
                    <p class="text-sm text-gray-700 font-medium mb-2">Demo Login:</p>
                    <p class="text-xs text-gray-600">Admin: admin@sekolah.com / admin123</p>
                    <p class="text-xs text-gray-600">Guru: guru@sekolah.com / guru123</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Hero -->
    <section class="pt-16">
        <div
            class="relative bg-gradient-to-br from-yellow-400 via-yellow-500 to-yellow-600 text-white overflow-hidden">
            <div class="absolute inset-0 opacity-10">
                <div class="absolute top-20 left-10 w-64 h-64 bg-white rounded-full blur-3xl"></div>
                <div class="absolute bottom-20 right-10 w-96 h-96 bg-white rounded-full blur-3xl"></div>
            </div>
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
                <div class="text-center">
                    <div class="inline-block bg-white bg-opacity-20 px-4 py-2 rounded-full text-sm font-medium mb-6">
                        Sarana & Prasarana</div>
                    <h1 class="text-5xl md:text-6xl font-bold mb-6">Fasilitas Sekolah</h1>
                    <p class="text-xl text-yellow-100 max-w-3xl mx-auto">Sarana dan prasarana lengkap untuk mendukung
                        proses belajar mengajar yang berkualitas</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Facilities Grid -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center py-20">
                <svg class="w-24 h-24 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                    </path>
                </svg>
                <h3 class="text-2xl font-bold text-gray-700 mb-2">Fasilitas Sekolah</h3>
                <p class="text-gray-500 text-lg">Informasi fasilitas akan segera tersedia.</p>
                <p class="text-gray-400 text-sm mt-2">Data fasilitas akan dikelola melalui panel admin.</p>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="py-16 bg-yellow-400 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold mb-4">Ingin Melihat Lebih Dekat?</h2>
            <p class="text-yellow-100 text-lg mb-8 max-w-2xl mx-auto">Kunjungi sekolah kami dan rasakan langsung
                fasilitas yang tersedia</p>
            <div class="flex flex-wrap gap-4 justify-center">
                <a href="/kontak"
                    class="inline-block bg-yellow-400 text-black font-medium py-3 px-8 rounded-lg hover:bg-yellow-500 transition duration-200">Jadwalkan
                    Kunjungan</a>
                <a href="/ppdb"
                    class="inline-block bg-yellow-400 text-black font-medium py-3 px-8 rounded-lg hover:bg-yellow-500 transition duration-200 border-2 border-white">Daftar
                    PPDB</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-black text-white py-12">
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

    <!-- Include Lightbox -->
    @include('components.lightbox')
</body>

</html>

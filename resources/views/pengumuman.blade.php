<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengumuman - SMAK Syuradikara</title>
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
                    <a href="/#home" class="text-gray-700 hover:text-blue-600 transition font-medium">Beranda</a>

                    <div class="relative dropdown">
                        <button onclick="toggleDropdown(this)"
                            class="text-gray-700 hover:text-blue-600 transition font-medium flex items-center">
                            Profil
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

                    <a href="/guru" class="text-gray-700 hover:text-blue-600 transition font-medium">Guru &
                        Pegawai</a>
                    <a href="/fasilitas" class="text-gray-700 hover:text-blue-600 transition font-medium">Fasilitas</a>

                    <div class="relative dropdown">
                        <button onclick="toggleDropdown(this)"
                            class="text-gray-700 hover:text-blue-600 transition font-medium flex items-center">
                            Akademik
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
                        class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-lg transition duration-200">
                        Login
                    </button>
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

                <form action="{{ route('login') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <input type="email" name="email" id="email" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            placeholder="nama@syuradikara.sch.id">
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                        <input type="password" name="password" id="password" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            placeholder="••••••••">
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" name="remember" id="remember"
                            class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <label for="remember" class="ml-2 block text-sm text-gray-700">Ingat saya</label>
                    </div>
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

    <!-- Hero -->
    <section class="pt-24 pb-12 bg-gradient-to-br from-orange-600 to-orange-800 text-white">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-5xl font-bold mb-4">Pengumuman</h1>
            <p class="text-xl text-orange-100">Informasi resmi dari SMAK Syuradikara</p>
        </div>
    </section>

    <!-- Content -->
    <section class="py-12">
        <div class="max-w-4xl mx-auto px-4">
            <div class="space-y-6">
                <!-- Pengumuman Item -->
                <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition">
                    <div class="flex items-center justify-between mb-4">
                        <span
                            class="bg-orange-100 text-orange-800 px-3 py-1 rounded-full text-sm font-medium">Penting</span>
                        <span class="text-gray-500 text-sm">10 April 2026</span>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-800 mb-2">Pendaftaran PPDB 2026/2027 Dibuka</h2>
                    <p class="text-gray-600 mb-4">Pendaftaran siswa baru tahun ajaran 2026/2027 telah resmi dibuka.
                        Silakan daftar melalui halaman PPDB atau datang langsung ke sekolah.</p>
                    <a href="/ppdb" class="text-orange-600 hover:text-orange-700 font-medium">Baca selengkapnya
                        →</a>
                </div>

                <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition">
                    <div class="flex items-center justify-between mb-4">
                        <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-medium">Info</span>
                        <span class="text-gray-500 text-sm">5 April 2026</span>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-800 mb-2">Jadwal Ujian Tengah Semester Genap</h2>
                    <p class="text-gray-600 mb-4">UTS Semester Genap akan dilaksanakan pada tanggal 15-20 April 2026.
                        Siswa diharapkan mempersiapkan diri dengan baik.</p>
                    <a href="#" class="text-orange-600 hover:text-orange-700 font-medium">Baca selengkapnya
                        →</a>
                </div>

                <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition">
                    <div class="flex items-center justify-between mb-4">
                        <span
                            class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">Kegiatan</span>
                        <span class="text-gray-500 text-sm">1 April 2026</span>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-800 mb-2">Perayaan Hari Pendidikan Nasional</h2>
                    <p class="text-gray-600 mb-4">SMAK Syuradikara akan mengadakan berbagai lomba dan kegiatan dalam
                        rangka Hari Pendidikan Nasional 2 Mei.</p>
                    <a href="#" class="text-orange-600 hover:text-orange-700 font-medium">Baca selengkapnya
                        →</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-3 gap-8 mb-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">SMAK Syuradikara</h3>
                    <p class="text-gray-400 mb-4">Pencipta Pahlawan Utama</p>
                    <p class="text-gray-400 text-sm">
                        Jl. Wirajaya, Kel. Onekore, Kec. Ende Tengah<br>
                        Kabupaten Ende, Nusa Tenggara Tim. 86312<br>
                        Telp: (0381) 21648
                    </p>
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
                        <li><a href="/pengumuman" class="text-gray-400 hover:text-white transition">Pengumuman</a>
                        </li>
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

    <!-- JavaScript -->
    <script>
        // Login Modal
        function openLoginModal() {
            document.getElementById('loginModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeLoginModal() {
            document.getElementById('loginModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
        document.getElementById('loginModal').addEventListener('click', function(e) {
            if (e.target === this) closeLoginModal();
        });

        // Dropdown Menu
        function toggleDropdown(button) {
            const dropdown = button.closest('.dropdown');
            const menu = dropdown.querySelector('.dropdown-menu');
            document.querySelectorAll('.dropdown-menu').forEach(m => {
                if (m !== menu) m.classList.remove('show');
            });
            menu.classList.toggle('show');
        }
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.dropdown')) {
                document.querySelectorAll('.dropdown-menu').forEach(m => m.classList.remove('show'));
            }
        });

        @if ($errors->any())
            openLoginModal();
        @endif
    </script>
</body>

</html>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMAK Syuradikara - Sistem Informasi Sekolah</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">
    <!-- Navbar -->
    <nav class="bg-white shadow-md fixed w-full top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <h1 class="text-xl font-bold text-blue-600">SMAK Syuradikara</h1>
                </div>

                <!-- Menu -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#home" class="text-gray-700 hover:text-blue-600 transition">Beranda</a>
                    <a href="#profil" class="text-gray-700 hover:text-blue-600 transition">Profil</a>
                    <a href="#berita" class="text-gray-700 hover:text-blue-600 transition">Berita</a>
                    <a href="#galeri" class="text-gray-700 hover:text-blue-600 transition">Galeri</a>
                    <a href="#kontak" class="text-gray-700 hover:text-blue-600 transition">Kontak</a>
                </div>

                <!-- Login Button -->
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
    <div id="loginModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center">
        <div class="bg-white rounded-lg shadow-xl w-full max-w-md mx-4">
            <!-- Modal Header -->
            <div class="flex justify-between items-center p-6 border-b">
                <h2 class="text-2xl font-bold text-gray-800">Login</h2>
                <button onclick="closeLoginModal()" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="p-6">
                <!-- Error Messages -->
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Login Form -->
                <form action="{{ route('login') }}" method="POST" class="space-y-4">
                    @csrf

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                            Email
                        </label>
                        <input type="email" name="email" id="email" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            placeholder="nama@sekolah.com">
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                            Password
                        </label>
                        <input type="password" name="password" id="password" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            placeholder="••••••••">
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center">
                        <input type="checkbox" name="remember" id="remember"
                            class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <label for="remember" class="ml-2 block text-sm text-gray-700">
                            Ingat saya
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition duration-200">
                        Login
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Hero Section -->
    <section id="home" class="pt-24 pb-20 bg-gradient-to-br from-blue-600 to-blue-800 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-5xl font-bold mb-4">Selamat Datang di SMAK Syuradikara</h1>
            <p class="text-xl mb-8">Mencetak Generasi Unggul, Berkarakter, dan Berprestasi</p>
            <a href="#profil"
                class="inline-block bg-white text-blue-600 font-medium py-3 px-8 rounded-lg hover:bg-gray-100 transition">
                Pelajari Lebih Lanjut
            </a>
        </div>
    </section>

    <!-- Profil Section -->
    <section id="profil" class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Profil Sekolah</h2>
                <p class="text-gray-600 text-lg">Mengenal lebih dekat SMAK Syuradikara</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Visi -->
                <div class="bg-white p-8 rounded-lg shadow-md">
                    <h3 class="text-2xl font-bold text-blue-600 mb-4">Visi</h3>
                    <p class="text-gray-600">Menjadi sekolah unggulan yang menghasilkan lulusan berkarakter, cerdas, dan
                        berdaya saing global.</p>
                </div>

                <!-- Misi -->
                <div class="bg-white p-8 rounded-lg shadow-md">
                    <h3 class="text-2xl font-bold text-blue-600 mb-4">Misi</h3>
                    <p class="text-gray-600">Menyelenggarakan pendidikan berkualitas, mengembangkan potensi siswa, dan
                        membentuk karakter mulia.</p>
                </div>

                <!-- Sejarah -->
                <div class="bg-white p-8 rounded-lg shadow-md">
                    <h3 class="text-2xl font-bold text-blue-600 mb-4">Sejarah</h3>
                    <p class="text-gray-600">SMAK Syuradikara telah menghasilkan ribuan alumni yang
                        sukses di berbagai bidang.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Berita Section -->
    <section id="berita" class="py-20 bg-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Berita & Pengumuman</h2>
                <p class="text-gray-600 text-lg">Informasi terbaru dari SMAK Syuradikara</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Berita 1 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="h-48 bg-gray-300"></div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Penerimaan Peserta Didik Baru 2026</h3>
                        <p class="text-gray-600 mb-4">Pendaftaran siswa baru telah dibuka. Segera daftar dan raih masa
                            depan cerah!</p>
                        <a href="#" class="text-blue-600 hover:text-blue-700 font-medium">Baca selengkapnya
                            →</a>
                    </div>
                </div>

                <!-- Berita 2 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="h-48 bg-gray-300"></div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Juara 1 Olimpiade Sains Nasional</h3>
                        <p class="text-gray-600 mb-4">Siswa SMAK Syuradikara berhasil meraih juara 1 OSN bidang
                            Matematika.
                        </p>
                        <a href="#" class="text-blue-600 hover:text-blue-700 font-medium">Baca selengkapnya
                            →</a>
                    </div>
                </div>

                <!-- Berita 3 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="h-48 bg-gray-300"></div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Gelar Karya Seni & Budaya</h3>
                        <p class="text-gray-600 mb-4">Pameran karya seni siswa akan diadakan pada akhir bulan ini.</p>
                        <a href="#" class="text-blue-600 hover:text-blue-700 font-medium">Baca selengkapnya
                            →</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Galeri Section -->
    <section id="galeri" class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Galeri Sekolah</h2>
                <p class="text-gray-600 text-lg">Dokumentasi kegiatan dan fasilitas sekolah</p>
            </div>

            <div class="grid md:grid-cols-4 gap-4">
                <div class="h-48 bg-gray-300 rounded-lg"></div>
                <div class="h-48 bg-gray-300 rounded-lg"></div>
                <div class="h-48 bg-gray-300 rounded-lg"></div>
                <div class="h-48 bg-gray-300 rounded-lg"></div>
            </div>
        </div>
    </section>

    <!-- Kontak Section -->
    <section id="kontak" class="py-20 bg-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Hubungi Kami</h2>
                <p class="text-gray-600 text-lg">Kami siap membantu Anda</p>
            </div>

            <div class="grid md:grid-cols-2 gap-8">
                <!-- Info Kontak -->
                <div class="bg-white p-8 rounded-lg shadow-md">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">Informasi Kontak</h3>
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <svg class="w-6 h-6 text-blue-600 mr-3 mt-1" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <div>
                                <p class="font-medium text-gray-800">Alamat</p>
                                <p class="text-gray-600">Jl. Wirajaya, Kel. Onekore, Kec. Ende Tengah, Kabupaten Ende,
                                    Nusa Tenggara Tim.</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <svg class="w-6 h-6 text-blue-600 mr-3 mt-1" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                </path>
                            </svg>
                            <div>
                                <p class="font-medium text-gray-800">Telepon</p>
                                <p class="text-gray-600">(0381) 21648</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <svg class="w-6 h-6 text-blue-600 mr-3 mt-1" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                            <div>
                                <p class="font-medium text-gray-800">Email</p>
                                <p class="text-gray-600">info@syuradikara.sch.id</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <svg class="w-6 h-6 text-blue-600 mr-3 mt-1" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <div>
                                <p class="font-medium text-gray-800">Provinsi</p>
                                <p class="text-gray-600">Nusa Tenggara Timur</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Kontak -->
                <div class="bg-white p-8 rounded-lg shadow-md">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">Kirim Pesan</h3>
                    <form class="space-y-4">
                        <input type="text" placeholder="Nama Anda"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <input type="email" placeholder="Email Anda"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <textarea placeholder="Pesan Anda" rows="4"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"></textarea>
                        <button type="submit"
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition duration-200">
                            Kirim Pesan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p class="text-gray-400">&copy; 2026 SMAK Syuradikara. All rights reserved.</p>
        </div>
    </footer>

    <!-- JavaScript for Login Modal -->
    <script>
        function openLoginModal() {
            document.getElementById('loginModal').classList.remove('hidden');
        }

        function closeLoginModal() {
            document.getElementById('loginModal').classList.add('hidden');
        }

        // Close modal when clicking outside
        document.getElementById('loginModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeLoginModal();
            }
        });

        // Show modal if there are validation errors
        @if ($errors->any())
            openLoginModal();
        @endif
    </script>
</body>

</html>

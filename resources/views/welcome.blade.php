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

<body class="bg-gray-50">
    <!-- Navbar -->
    <nav class="bg-white shadow-md fixed w-full top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="/" class="flex items-center">
                        <div
                            class="w-10 h-10 bg-yellow-400 rounded-full flex items-center justify-center text-black font-bold mr-3">
                            S
                        </div>
                        <div>
                            <h1 class="text-lg font-bold text-yellow-600">SMAK Syuradikara</h1>
                            <p class="text-xs text-gray-500">Pencipta Pahlawan Utama</p>
                        </div>
                    </a>
                </div>

                <!-- Menu Desktop -->
                <div class="hidden md:flex items-center space-x-6">
                    <a href="#home" class="text-gray-700 hover:text-yellow-600 transition font-medium">Beranda</a>

                    <!-- Profil Dropdown -->
                    <div class="relative dropdown">
                        <button onclick="toggleDropdown(this)"
                            class="text-gray-700 hover:text-yellow-600 transition font-medium flex items-center">
                            Profil
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
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
                    <a href="/fasilitas"
                        class="text-gray-700 hover:text-yellow-600 transition font-medium">Fasilitas</a>

                    <!-- Akademik Dropdown -->
                    <div class="relative dropdown">
                        <button onclick="toggleDropdown(this)"
                            class="text-gray-700 hover:text-yellow-600 transition font-medium flex items-center">
                            Akademik
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
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

                <!-- Login Button -->
                <div class="flex items-center">
                    <button onclick="openLoginModal()"
                        class="bg-yellow-400 hover:bg-yellow-500 text-black font-bold py-2 px-6 rounded-lg transition duration-200">
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
            <!-- Modal Header -->
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

            <!-- Modal Body -->
            <div class="p-6">
                <!-- Success Message -->
                @if (session('success'))
                    <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Error Messages -->
                @if ($errors->any())
                    <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded mb-4">
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
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-transparent"
                            placeholder="nama@syuradikara.sch.id">
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                            Password
                        </label>
                        <input type="password" name="password" id="password" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-transparent"
                            placeholder="••••••••">
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center">
                        <input type="checkbox" name="remember" id="remember"
                            class="h-4 w-4 text-yellow-600 focus:ring-yellow-500 border-gray-300 rounded">
                        <label for="remember" class="ml-2 block text-sm text-gray-700">
                            Ingat saya
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="w-full bg-yellow-400 hover:bg-yellow-500 text-black font-bold py-2 px-4 rounded-lg transition duration-200">
                        Masuk ke Sistem
                    </button>
                </form>

                <div class="mt-4 p-4 bg-yellow-50 rounded-lg">
                    <p class="text-sm text-gray-700 font-medium mb-2">Demo Login:</p>
                    <p class="text-xs text-gray-600">Admin: admin@sekolah.com / admin123</p>
                    <p class="text-xs text-gray-600">Guru: guru@sekolah.com / guru123</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Hero Section -->
    <section id="home" class="relative pt-16">
        <div class="relative overflow-hidden">
            <!-- Background Image -->
            <div class="absolute inset-0 z-0">
                <img src="{{ asset('images/sekolah/sekolah.png') }}" alt="SMAK Syuradikara"
                    class="w-full h-full object-cover min-h-[600px]">
            </div>

            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32 z-10">
                <div class="grid md:grid-cols-2 gap-12 items-center">
                    <!-- Left Content -->
                    <div class="text-white">
                        <div
                            class="inline-block bg-white bg-opacity-20 px-4 py-2 rounded-full text-sm font-medium mb-6">
                            🎓 Sekolah Katolik Terbaik di Ende
                        </div>
                        <h1 class="text-5xl md:text-6xl font-bold mb-6 leading-tight">
                            SMAK<br>
                            <span class="text-yellow-300">Syuradikara</span>
                        </h1>
                        <p class="text-2xl font-light mb-4">Pencipta Pahlawan Utama</p>
                        <p class="text-lg text-yellow-100 mb-8">
                            Mendidik generasi muda sejak 1953 untuk menjadi pemimpin yang berkarakter,
                            beriman kuat, dan berprestasi di Nusa Tenggara Timur.
                        </p>
                        <div class="flex flex-wrap gap-4">
                            <a href="/ppdb"
                                class="inline-block bg-yellow-400 text-black font-bold py-3 px-8 rounded-lg hover:bg-yellow-500 transition">
                                Daftar PPDB 2026
                            </a>
                            <a href="#profil"
                                class="inline-block bg-white bg-opacity-20 text-white font-medium py-3 px-8 rounded-lg hover:bg-opacity-30 transition border-2 border-white">
                                Pelajari Lebih Lanjut
                            </a>
                        </div>
                    </div>

                    <!-- Right Stats -->
                    <div class="hidden md:block">
                        <div class="grid grid-cols-2 gap-6">
                            <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-xl p-6 text-center">
                                <div class="text-5xl font-bold text-yellow-300 mb-2">70+</div>
                                <div class="text-yellow-100">Tahun Berdiri</div>
                            </div>
                            <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-xl p-6 text-center">
                                <div class="text-5xl font-bold text-yellow-300 mb-2">1000+</div>
                                <div class="text-yellow-100">Alumni Sukses</div>
                            </div>
                            <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-xl p-6 text-center">
                                <div class="text-5xl font-bold text-yellow-300 mb-2">50+</div>
                                <div class="text-yellow-100">Guru & Pegawai</div>
                            </div>
                            <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-xl p-6 text-center">
                                <div class="text-5xl font-bold text-yellow-300 mb-2">A</div>
                                <div class="text-yellow-100">Akreditasi</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Access Cards -->
    <section class="py-16 -mt-20 relative z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-6">
                <a href="/profil"
                    class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl hover:shadow-yellow-200 transition duration-300 border border-yellow-200">
                    <div class="w-14 h-14 bg-yellow-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Profil Sekolah</h3>
                    <p class="text-gray-600 text-sm">Visi, Misi, Sejarah & Sambutan Kepala Sekolah</p>
                </a>

                <a href="/guru"
                    class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl hover:shadow-yellow-200 transition duration-300 border border-yellow-200">
                    <div class="w-14 h-14 bg-yellow-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Guru & Pegawai</h3>
                    <p class="text-gray-600 text-sm">Tenaga pendidik profesional dan berdedikasi</p>
                </a>

                <a href="/ppdb"
                    class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl hover:shadow-yellow-200 transition duration-300 border border-yellow-200">
                    <div class="w-14 h-14 bg-yellow-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-2">PPDB Online</h3>
                    <p class="text-gray-600 text-sm">Pendaftaran siswa baru tahun ajaran 2026/2027</p>
                </a>

                <a href="/fasilitas"
                    class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl hover:shadow-yellow-200 transition duration-300 border border-yellow-200">
                    <div class="w-14 h-14 bg-yellow-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Fasilitas</h3>
                    <p class="text-gray-600 text-sm">Sarana dan prasarana lengkap untuk belajar</p>
                </a>
            </div>
        </div>
    </section>

    <!-- Visi Misi Section -->
    <section id="profil" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Visi & Misi Sekolah</h2>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">Landasan dan arah pengembangan SMAK Syuradikara</p>
            </div>

            <div class="grid md:grid-cols-2 gap-8 mb-12">
                <!-- Visi -->
                <div class="bg-gradient-to-br from-yellow-400 to-yellow-600 rounded-2xl p-8 text-black">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 bg-white bg-opacity-20 rounded-xl flex items-center justify-center mr-4">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-3xl font-bold">Visi</h3>
                    </div>
                    <p class="text-2xl font-light leading-relaxed">
                        "Pencipta Pahlawan Utama"
                    </p>
                </div>

                <!-- Misi -->
                <div class="bg-white border-2 border-yellow-200 rounded-2xl p-8">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 bg-yellow-100 rounded-xl flex items-center justify-center mr-4">
                            <svg class="w-10 h-10 text-yellow-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-3xl font-bold text-gray-800">Misi</h3>
                    </div>
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-yellow-600 mr-2 mt-0.5 flex-shrink-0" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-700">Menciptakan kondisi yang kondusif bagi terwujudnya Kerajaan
                                Allah dengan benih-benih Kerajaan Allah dalam diri generasi muda</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-yellow-600 mr-2 mt-0.5 flex-shrink-0" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-700">Menyiapkan pendidikan umum yang sesuai dan diselaraskan dengan
                                program kurikulum untuk pengembangan aspek intelektual, keterampilan, dan mental
                                kepribadian</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-yellow-600 mr-2 mt-0.5 flex-shrink-0" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-700">Menyiapkan mutu pendidikan melalui pendekatan interdisiplin
                                ilmu yang terpadu, kreatif dan inovatif</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-yellow-600 mr-2 mt-0.5 flex-shrink-0" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-700">Mempromosikan pelayanan kepada masyarakat luas dengan membuka
                                peluang bagi semua siswa tanpa memandang perbedaan agama, budaya, status sosial dan
                                jenis kelamin</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-yellow-600 mr-2 mt-0.5 flex-shrink-0" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-700">Menjadikan Syuradikara sebagai Pusat Belajar bagi lembaga
                                pendidikan lainnya di kawasan Nusa Tenggara Timur</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Tujuan Sekolah -->
            <div id="tujuan"
                class="bg-gradient-to-r from-yellow-50 to-white rounded-2xl p-8 border-2 border-yellow-200">
                <div class="flex items-center mb-6">
                    <div class="w-16 h-16 bg-yellow-100 rounded-xl flex items-center justify-center mr-4">
                        <svg class="w-10 h-10 text-yellow-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold text-gray-800">Tujuan Sekolah</h3>
                </div>
                <p class="text-lg text-gray-700 leading-relaxed">
                    Terciptanya suatu masyarakat Nusa Tenggara Timur baru yang terbebas dari belenggu:
                    <strong>ketidaktahuan, kebodohan, kemiskinan, ketidakadilan, penindasan atas gender dan ketakutan
                        SARA</strong>.
                </p>
            </div>
        </div>
    </section>

    <!-- Berita Terbaru Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Berita & Pengumuman Terbaru</h2>
                <p class="text-gray-600 text-lg">Informasi terbaru dari SMAK Syuradikara</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                @forelse($berita ?? [] as $item)
                    <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300">
                        <div
                            class="h-48 bg-gradient-to-br from-yellow-400 to-yellow-600 flex items-center justify-center relative">
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
                            @if ($item->kategori)
                                <div class="absolute top-3 right-3">
                                    <span
                                        class="bg-yellow-100 text-yellow-800 text-xs font-bold px-3 py-1 rounded-full">{{ $item->kategori->nama_kategori }}</span>
                                </div>
                            @endif
                        </div>
                        <div class="p-6">
                            <div class="text-sm text-gray-500 mb-2">{{ $item->created_at->format('d M Y') }}</div>
                            <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $item->judul }}</h3>
                            <p class="text-gray-600 mb-4">{{ Str::limit(strip_tags($item->isi), 100) }}</p>
                            <a href="{{ route('berita.detail', $item->slug) }}"
                                class="text-yellow-600 hover:text-yellow-500 font-medium">Baca selengkapnya →</a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-12">
                        <p class="text-gray-500">Belum ada berita</p>
                    </div>
                @endforelse
            </div>

            <div class="text-center mt-12">
                <a href="/berita"
                    class="inline-block bg-yellow-400 hover:bg-yellow-500 text-black font-bold py-3 px-8 rounded-lg transition duration-200">
                    Lihat Semua Berita
                </a>
            </div>
        </div>
    </section>

    <!-- Galeri Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Galeri Sekolah</h2>
                <p class="text-gray-600 text-lg">Dokumentasi kegiatan dan fasilitas sekolah</p>
            </div>

            @php
                $homeGalleryImages = [];
            @endphp

            <div class="grid md:grid-cols-4 gap-4">
                @forelse($galeri ?? [] as $index => $item)
                    @php
                        $homeGalleryImages[] = [
                            'src' => asset('storage/' . $item->gambar),
                            'alt' => $item->judul,
                            'caption' => $item->judul . ($item->kategori ? ' - ' . $item->kategori : ''),
                        ];
                    @endphp
                    <div class="relative group overflow-hidden rounded-xl cursor-pointer"
                        onclick="openLightboxFromData('#homeGallery > div', this.dataset.index))">
                        <div class="h-64">
                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}"
                                class="w-full h-full object-cover hover:scale-110 transition duration-500">
                        </div>
                        <div
                            class="absolute inset-0 bg-black bg-opacity-60 group-hover:bg-opacity-60 transition duration-300 flex items-center justify-center">
                            <span
                                class="text-white text-lg font-bold opacity-0 group-hover:opacity-100 transition">{{ $item->judul }}</span>
                        </div>
                    </div>
                @empty
                    <div class="col-span-4 text-center py-12">
                        <p class="text-gray-500">Belum ada foto galeri</p>
                    </div>
                @endforelse
            </div>

            @if (count($galeri ?? []) > 0)
                @include('components.lightbox')
            @endif

            <div class="text-center mt-12">
                <a href="/galeri"
                    class="inline-block bg-yellow-400 hover:bg-yellow-500 text-black font-bold py-3 px-8 rounded-lg transition duration-200">
                    Lihat Semua Galeri
                </a>
            </div>
        </div>
    </section>

    <!-- Kontak Section -->
    <section id="kontak" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Hubungi Kami</h2>
                <p class="text-gray-600 text-lg">Kami siap membantu Anda</p>
            </div>

            <div class="grid md:grid-cols-2 gap-8">
                <!-- Info Kontak -->
                <div class="bg-white p-8 rounded-xl shadow-md">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">Informasi Kontak</h3>
                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div
                                class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                                <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="font-bold text-gray-800 mb-1">Alamat</p>
                                <p class="text-gray-600">Jl. Wirajaya, Kel. Onekore, Kec. Ende Tengah, Kabupaten Ende,
                                    Nusa Tenggara Tim.</p>
                                <p class="text-gray-600">Indonesia 86312</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div
                                class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                                <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <p class="font-bold text-gray-800 mb-1">Telepon / Fax</p>
                                <p class="text-gray-600">(0381) 21648</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div
                                class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                                <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <p class="font-bold text-gray-800 mb-1">Email</p>
                                <p class="text-gray-600">smakswastasyuradikara@gmail.com</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div
                                class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                                <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="font-bold text-gray-800 mb-1">Provinsi</p>
                                <p class="text-gray-600">Nusa Tenggara Timur</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Kontak -->
                <div class="bg-white p-8 rounded-xl shadow-md">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">Kirim Pesan</h3>
                    <form class="space-y-4">
                        <input type="text" placeholder="Nama Lengkap"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-transparent">
                        <input type="email" placeholder="Email Anda"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-transparent">
                        <input type="text" placeholder="Subjek"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-transparent">
                        <textarea placeholder="Pesan Anda" rows="4"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-transparent"></textarea>
                        <button type="submit"
                            class="w-full bg-yellow-400 hover:bg-yellow-500 text-black font-bold py-3 px-4 rounded-lg transition duration-200">
                            Kirim Pesan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-black text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-3 gap-8 mb-8">
                <!-- Tentang Sekolah -->
                <div>
                    <h3 class="text-xl font-bold mb-4">SMAK Syuradikara</h3>
                    <p class="text-gray-400 mb-4">Pencipta Pahlawan Utama</p>
                    <p class="text-gray-400 text-sm">
                        Jl. Wirajaya, Kel. Onekore, Kec. Ende Tengah<br>
                        Kabupaten Ende, Nusa Tenggara Tim. 86312<br>
                        Telp: (0381) 21648
                    </p>
                </div>

                <!-- Link Cepat -->
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

                <!-- Jam Operasional -->
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

    <!-- JavaScript for Dropdown -->
    <script>
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
    </script>

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

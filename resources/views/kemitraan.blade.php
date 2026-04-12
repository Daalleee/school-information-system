<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kemitraan SMAK Syuradikara</title>
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
                            <p class="text-xs text-black">Pencipta Pahlawan Utama</p>
                        </div>
                    </a>
                </div>
                <div class="hidden md:flex items-center space-x-6">
                    <a href="/" class="text-black hover:text-yellow-600 transition font-medium">Beranda</a>
                    <div class="relative dropdown">
                        <button onclick="toggleDropdown(this)"
                            class="text-black hover:text-yellow-600 transition font-medium flex items-center">Profil<svg
                                class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg></button>
                        <div class="dropdown-menu absolute bg-white shadow-lg rounded-lg mt-2 py-2 min-w-[200px]">
                            <a href="/profil#visi-misi"
                                class="block px-4 py-2 text-black hover:bg-yellow-100 hover:text-black">Visi &
                                Misi</a>
                            <a href="/profil#sejarah"
                                class="block px-4 py-2 text-black hover:bg-yellow-100 hover:text-black">Sejarah</a>
                            <a href="/profil#sambutan"
                                class="block px-4 py-2 text-black hover:bg-yellow-100 hover:text-black">Sambutan
                                Kepala Sekolah</a>
                            <a href="/profil#tujuan"
                                class="block px-4 py-2 text-black hover:bg-yellow-100 hover:text-black">Tujuan
                                Sekolah</a>
                        </div>
                    </div>
                    <a href="/guru" class="text-black hover:text-yellow-600 transition font-medium">Guru &
                        Pegawai</a>
                    <a href="/fasilitas" class="text-black hover:text-yellow-600 transition font-medium">Fasilitas</a>
                    <div class="relative dropdown">
                        <button onclick="toggleDropdown(this)"
                            class="text-black hover:text-yellow-600 transition font-medium flex items-center">Akademik<svg
                                class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg></button>
                        <div class="dropdown-menu absolute bg-white shadow-lg rounded-lg mt-2 py-2 min-w-[200px]">
                            <a href="/berita"
                                class="block px-4 py-2 text-black hover:bg-yellow-100 hover:text-black">Berita</a>
                            <a href="/pengumuman"
                                class="block px-4 py-2 text-black hover:bg-yellow-100 hover:text-black">Pengumuman</a>
                            <a href="/galeri"
                                class="block px-4 py-2 text-black hover:bg-yellow-100 hover:text-black">Galeri</a>
                        </div>
                    </div>
                    <a href="/ppdb" class="text-black hover:text-yellow-600 transition font-medium">PPDB</a>
                    <a href="/kemitraan" class="text-yellow-600 font-medium">Kemitraan</a>
                    <a href="/kontak" class="text-black hover:text-yellow-600 transition font-medium">Kontak</a>
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
                    <h2 class="text-2xl font-bold text-black">Login</h2>
                    <p class="text-black text-sm mt-1">Masuk ke sistem informasi sekolah</p>
                </div><button onclick="closeLoginModal()" class="text-black hover:text-black"><svg class="w-6 h-6"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg></button>
            </div>
            <div class="p-6">
                @if ($errors->any())
                    <div class="bg-yellow-100 border border-black text-black px-4 py-3 rounded mb-4">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('login') }}" method="POST" class="space-y-4">@csrf
                    <div><label for="email" class="block text-sm font-medium text-black mb-2">Email</label><input
                            type="email" name="email" id="email" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-400 focus:border-transparent"
                            placeholder="nama@syuradikara.sch.id"></div>
                    <div><label for="password"
                            class="block text-sm font-medium text-black mb-2">Password</label><input type="password"
                            name="password" id="password" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-400 focus:border-transparent"
                            placeholder="••••••••"></div>
                    <div class="flex items-center"><input type="checkbox" name="remember" id="remember"
                            class="h-4 w-4 text-yellow-600 focus:ring-yellow-400 border-gray-300 rounded"><label
                            for="remember" class="ml-2 block text-sm text-black">Ingat saya</label></div>
                    <button type="submit"
                        class="w-full bg-yellow-400 hover:bg-yellow-500 text-black font-bold py-2 px-4 rounded-lg transition duration-200">Masuk
                        ke Sistem</button>
                </form>
                <div class="mt-4 p-4 bg-yellow-50 rounded-lg">
                    <p class="text-sm text-black font-medium mb-2">Demo Login:</p>
                    <p class="text-xs text-black">Admin: admin@sekolah.com / admin123</p>
                    <p class="text-xs text-black">Guru: guru@sekolah.com / guru123</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Hero -->
    <section class="pt-16">
        <div
            class="relative bg-gradient-to-br bg-yellow-400 text-white overflow-hidden">
            <div class="absolute inset-0 opacity-10">
                <div class="absolute top-20 left-10 w-64 h-64 bg-white rounded-full blur-3xl"></div>
                <div class="absolute bottom-20 right-10 w-96 h-96 bg-white rounded-full blur-3xl"></div>
            </div>
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
                <div class="text-center">
                    <div class="inline-block bg-white bg-opacity-20 px-4 py-2 rounded-full text-sm font-medium mb-6">
                        Kolaborasi</div>
                    <h1 class="text-5xl md:text-6xl font-bold mb-6">Kemitraan</h1>
                    <p class="text-xl text-black max-w-3xl mx-auto">Membangun jaringan kerjasama untuk
                        meningkatkan kualitas pendidikan dan membuka peluang lebih luas bagi siswa</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Program Kemitraan -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-black mb-4">Program Kemitraan</h2>
                <p class="text-black text-lg max-w-2xl mx-auto">Berbagai bentuk kerjasama yang kami bangun untuk
                    kemajuan pendidikan</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div
                    class="bg-gradient-to-br bg-yellow-50 rounded-xl p-8 border  hover:shadow-lg transition duration-300">
                    <div class="w-14 h-14 bg-yellow-100 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-black mb-3">Kemitraan Akademik</h3>
                    <p class="text-black">Kerjasama dengan universitas dan institusi pendidikan untuk pengembangan
                        kurikulum, pelatihan guru, dan program magang siswa.</p>
                </div>

                <div
                    class="bg-gradient-to-br bg-yellow-50 rounded-xl p-8 border border-yellow-400 hover:shadow-lg transition duration-300">
                    <div class="w-14 h-14 bg-yellow-100 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-black mb-3">Kemitraan Industri</h3>
                    <p class="text-black">Kerjasama dengan perusahaan dan organisasi untuk program beasiswa,
                        kunjungan industri, dan penempatan karir bagi lulusan.</p>
                </div>

                <div
                    class="bg-gradient-to-br bg-yellow-50 rounded-xl p-8 border  hover:shadow-lg transition duration-300">
                    <div class="w-14 h-14 bg-yellow-100 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-black mb-3">Kemitraan Komunitas</h3>
                    <p class="text-black">Kerjasama dengan organisasi masyarakat, gereja, dan LSM untuk program
                        sosial, bakti masyarakat, dan pengembangan karakter siswa.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Mitra -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-black mb-4">Mitra Kami</h2>
                <p class="text-black text-lg max-w-2xl mx-auto">Institusi dan organisasi yang telah bekerjasama
                    dengan SMAK Syuradikara</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Mitra 1 -->
                <div class="bg-white rounded-xl shadow-md p-6 text-center hover:shadow-xl transition duration-300">
                    <div
                        class="w-20 h-20 bg-yellow-100 rounded-full mx-auto mb-4 flex items-center justify-center">
                        <svg class="w-10 h-10 text-yellow-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                            </path>
                        </svg>
                    </div>
                    <h3 class="font-bold text-black mb-1">Universitas Flores</h3>
                    <p class="text-sm text-black">Kemitraan Akademik</p>
                </div>

                <!-- Mitra 2 -->
                <div class="bg-white rounded-xl shadow-md p-6 text-center hover:shadow-xl transition duration-300">
                    <div
                        class="w-20 h-20 bg-yellow-100 rounded-full mx-auto mb-4 flex items-center justify-center">
                        <svg class="w-10 h-10 text-yellow-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="font-bold text-black mb-1">UNDANA Kupang</h3>
                    <p class="text-sm text-black">Kemitraan Akademik</p>
                </div>

                <!-- Mitra 3 -->
                <div class="bg-white rounded-xl shadow-md p-6 text-center hover:shadow-xl transition duration-300">
                    <div
                        class="w-20 h-20 bg-yellow-100 rounded-full mx-auto mb-4 flex items-center justify-center">
                        <svg class="w-10 h-10 text-yellow-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"></path>
                        </svg>
                    </div>
                    <h3 class="font-bold text-black mb-1">Yayasan SVD</h3>
                    <p class="text-sm text-black">Pemilik Yayasan</p>
                </div>

                <!-- Mitra 4 -->
                <div class="bg-white rounded-xl shadow-md p-6 text-center hover:shadow-xl transition duration-300">
                    <div
                        class="w-20 h-20 bg-yellow-100 rounded-full mx-auto mb-4 flex items-center justify-center">
                        <svg class="w-10 h-10 text-yellow-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                            </path>
                        </svg>
                    </div>
                    <h3 class="font-bold text-black mb-1">Dinas Pendidikan NTT</h3>
                    <p class="text-sm text-black">Pemerintah</p>
                </div>

                <!-- Mitra 5 -->
                <div class="bg-white rounded-xl shadow-md p-6 text-center hover:shadow-xl transition duration-300">
                    <div
                        class="w-20 h-20 bg-yellow-100 rounded-full mx-auto mb-4 flex items-center justify-center">
                        <svg class="w-10 h-10 text-yellow-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="font-bold text-black mb-1">Karitas Ende</h3>
                    <p class="text-sm text-black">Organisasi Sosial</p>
                </div>

                <!-- Mitra 6 -->
                <div class="bg-white rounded-xl shadow-md p-6 text-center hover:shadow-xl transition duration-300">
                    <div
                        class="w-20 h-20 bg-yellow-100 rounded-full mx-auto mb-4 flex items-center justify-center">
                        <svg class="w-10 h-10 text-black" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                            </path>
                        </svg>
                    </div>
                    <h3 class="font-bold text-black mb-1">Perpustakaan Daerah</h3>
                    <p class="text-sm text-black">Kemitraan Literasi</p>
                </div>

                <!-- Mitra 7 -->
                <div class="bg-white rounded-xl shadow-md p-6 text-center hover:shadow-xl transition duration-300">
                    <div
                        class="w-20 h-20 bg-yellow-100 rounded-full mx-auto mb-4 flex items-center justify-center">
                        <svg class="w-10 h-10 text-yellow-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="font-bold text-black mb-1">Alumni Syuradikara</h3>
                    <p class="text-sm text-black">Ikatan Alumni</p>
                </div>

                <!-- Mitra 8 -->
                <div class="bg-white rounded-xl shadow-md p-6 text-center hover:shadow-xl transition duration-300">
                    <div
                        class="w-20 h-20 bg-gradient-to-br from-yellow-200 to-yellow-300 rounded-full mx-auto mb-4 flex items-center justify-center">
                        <svg class="w-10 h-10 text-yellow-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="font-bold text-black mb-1">Paroki Ende</h3>
                    <p class="text-sm text-black">Kemitraan Pastoral</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Form Kerjasama -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-black mb-4">Ajukan Kerjasama</h2>
                <p class="text-black text-lg max-w-2xl mx-auto">Tertarik untuk bermitra dengan SMAK Syuradikara? Isi
                    formulir di bawah ini</p>
            </div>

            <div class="max-w-3xl mx-auto">
                <div class="bg-white rounded-2xl p-8 md:p-12 shadow-sm">
                    <form class="space-y-6">
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-black mb-2">Nama Lengkap /
                                    Institusi</label>
                                <input type="text"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-400 focus:border-transparent"
                                    placeholder="Nama atau nama institusi">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-black mb-2">Email</label>
                                <input type="email"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-400 focus:border-transparent"
                                    placeholder="email@example.com">
                            </div>
                        </div>
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-black mb-2">No. Telepon</label>
                                <input type="tel"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-400 focus:border-transparent"
                                    placeholder="08123456789">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-black mb-2">Jenis Kemitraan</label>
                                <select
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-400 focus:border-transparent">
                                    <option value="">Pilih jenis kemitraan</option>
                                    <option>Kemitraan Akademik</option>
                                    <option>Kemitraan Industri</option>
                                    <option>Kemitraan Komunitas</option>
                                    <option>Program Beasiswa</option>
                                    <option>Lainnya</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-black mb-2">Subjek Kerjasama</label>
                            <input type="text"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-400 focus:border-transparent"
                                placeholder="Ringkasan proposal kerjasama">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-black mb-2">Detail Kerjasama</label>
                            <textarea rows="5"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-400 focus:border-transparent"
                                placeholder="Jelaskan secara singkat bentuk kerjasama yang diusulkan..."></textarea>
                        </div>
                        <button type="submit"
                            class="w-full bg-yellow-400 hover:bg-yellow-500 text-black font-bold py-3 px-4 rounded-lg transition duration-200">Kirim
                            Proposal Kerjasama</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-yellow-400 text-black py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-3 gap-8 mb-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">SMAK Syuradikara</h3>
                    <p class="text-black mb-4">Pencipta Pahlawan Utama</p>
                    <p class="text-black text-sm">Jl. Wirajaya, Kel. Onekore, Kec. Ende Tengah<br>Kabupaten Ende,
                        Nusa Tenggara Tim. 86312<br>Telp: (0381) 21648</p>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Link Cepat</h3>
                    <ul class="space-y-2">
                        <li><a href="/profil" class="text-black hover:text-white transition">Profil Sekolah</a>
                        </li>
                        <li><a href="/guru" class="text-black hover:text-white transition">Guru & Pegawai</a>
                        </li>
                        <li><a href="/ppdb" class="text-black hover:text-white transition">PPDB Online</a></li>
                        <li><a href="/berita" class="text-black hover:text-white transition">Berita</a></li>
                        <li><a href="/galeri" class="text-black hover:text-white transition">Galeri</a></li>
                        <li><a href="/kontak" class="text-black hover:text-white transition">Kontak</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Jam Operasional</h3>
                    <ul class="space-y-2 text-black">
                        <li>Senin - Jumat: 07:00 - 15:00</li>
                        <li>Sabtu: 07:00 - 12:00</li>
                        <li>Minggu: Tutup</li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-black pt-8 text-center">
                <p class="text-black">&copy; 2026 SMAK Syuradikara - Pencipta Pahlawan Utama. All rights reserved.
                </p>
                <p class="text-black text-sm mt-2">Ende, Nusa Tenggara Timur, Indonesia</p>
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

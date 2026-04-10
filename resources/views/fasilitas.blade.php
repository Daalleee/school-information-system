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
                            class="text-gray-700 hover:text-blue-600 transition font-medium flex items-center">Profil<svg
                                class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg></button>
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
                    <a href="/fasilitas" class="text-blue-600 font-medium">Fasilitas</a>
                    <div class="relative dropdown">
                        <button onclick="toggleDropdown(this)"
                            class="text-gray-700 hover:text-blue-600 transition font-medium flex items-center">Akademik<svg
                                class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg></button>
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
                <div class="flex items-center"><button onclick="openLoginModal()"
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

    <!-- Hero -->
    <section class="pt-16">
        <div
            class="relative bg-gradient-to-br from-orange-500 via-orange-600 to-orange-800 text-white overflow-hidden">
            <div class="absolute inset-0 opacity-10">
                <div class="absolute top-20 left-10 w-64 h-64 bg-white rounded-full blur-3xl"></div>
                <div class="absolute bottom-20 right-10 w-96 h-96 bg-white rounded-full blur-3xl"></div>
            </div>
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
                <div class="text-center">
                    <div class="inline-block bg-white bg-opacity-20 px-4 py-2 rounded-full text-sm font-medium mb-6">
                        Sarana & Prasarana</div>
                    <h1 class="text-5xl md:text-6xl font-bold mb-6">Fasilitas Sekolah</h1>
                    <p class="text-xl text-orange-100 max-w-3xl mx-auto">Sarana dan prasarana lengkap untuk mendukung
                        proses belajar mengajar yang berkualitas</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Facilities Grid -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Kelas -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="h-40 bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                        <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                            </path>
                        </svg>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Ruang Kelas</h3>
                        <p class="text-gray-600">18 ruang kelas yang nyaman dengan ventilasi baik, dilengkapi papan
                            tulis modern dan pencahayaan optimal untuk kegiatan belajar.</p>
                        <div class="mt-4 flex items-center text-sm text-blue-600 font-medium"><svg
                                class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>18 Ruang</div>
                    </div>
                </div>

                <!-- Lab Komputer -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="h-40 bg-gradient-to-br from-green-400 to-green-600 flex items-center justify-center">
                        <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Laboratorium Komputer</h3>
                        <p class="text-gray-600">Lab komputer dengan perangkat terkini dan koneksi internet untuk
                            mendukung pembelajaran teknologi informasi dan praktikum digital.</p>
                        <div class="mt-4 flex items-center text-sm text-green-600 font-medium"><svg
                                class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>30 Unit Komputer</div>
                    </div>
                </div>

                <!-- Lab IPA -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="h-40 bg-gradient-to-br from-purple-400 to-purple-600 flex items-center justify-center">
                        <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z">
                            </path>
                        </svg>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Laboratorium IPA</h3>
                        <p class="text-gray-600">Lab IPA lengkap dengan peralatan untuk praktikum Fisika, Kimia, dan
                            Biologi. Mendukung pembelajaran sains yang interaktif.</p>
                        <div class="mt-4 flex items-center text-sm text-purple-600 font-medium"><svg
                                class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>Fisika, Kimia, Biologi</div>
                    </div>
                </div>

                <!-- Perpustakaan -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="h-40 bg-gradient-to-br from-yellow-400 to-yellow-600 flex items-center justify-center">
                        <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                            </path>
                        </svg>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Perpustakaan</h3>
                        <p class="text-gray-600">Koleksi ribuan buku pelajaran, novel, ensiklopedia, dan referensi
                            ilmiah. Ruang baca yang nyaman dengan area diskusi.</p>
                        <div class="mt-4 flex items-center text-sm text-yellow-600 font-medium"><svg
                                class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>5000+ Buku</div>
                    </div>
                </div>

                <!-- Lapangan Olahraga -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="h-40 bg-gradient-to-br from-red-400 to-red-600 flex items-center justify-center">
                        <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Lapangan Olahraga</h3>
                        <p class="text-gray-600">Lapangan serbaguna untuk bola voli, basket, dan futsal. Tersedia juga
                            area untuk latihan atletik dan senam.</p>
                        <div class="mt-4 flex items-center text-sm text-red-600 font-medium"><svg class="w-4 h-4 mr-1"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>Voli, Basket, Futsal</div>
                    </div>
                </div>

                <!-- Kantin -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="h-40 bg-gradient-to-br from-pink-400 to-pink-600 flex items-center justify-center">
                        <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Kantin Sehat</h3>
                        <p class="text-gray-600">Kantin bersih dengan menu makanan bergizi dan harga terjangkau.
                            Mendukung program sekolah sehat.</p>
                        <div class="mt-4 flex items-center text-sm text-pink-600 font-medium"><svg
                                class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>Menu Bergizi</div>
                    </div>
                </div>

                <!-- Aula -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="h-40 bg-gradient-to-br from-indigo-400 to-indigo-600 flex items-center justify-center">
                        <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Aula Serbaguna</h3>
                        <p class="text-gray-600">Aula besar untuk kegiatan upacara, seminar, pentas seni, dan berbagai
                            acara sekolah. Dilengkapi sound system yang baik.</p>
                        <div class="mt-4 flex items-center text-sm text-indigo-600 font-medium"><svg
                                class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>Kapasitas 300 Orang</div>
                    </div>
                </div>

                <!-- Ruang Guru -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="h-40 bg-gradient-to-br from-teal-400 to-teal-600 flex items-center justify-center">
                        <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Ruang Guru</h3>
                        <p class="text-gray-600">Ruang guru yang nyaman untuk rapat, persiapan mengajar, dan konsultasi
                            antar pendidik. Dilengkapi fasilitas yang memadai.</p>
                        <div class="mt-4 flex items-center text-sm text-teal-600 font-medium"><svg
                                class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>AC & WiFi</div>
                    </div>
                </div>

                <!-- UKS -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="h-40 bg-gradient-to-br from-rose-400 to-rose-600 flex items-center justify-center">
                        <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                            </path>
                        </svg>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Unit Kesehatan Sekolah</h3>
                        <p class="text-gray-600">UKS dengan peralatan P3K lengkap dan tenaga kesehatan untuk menangani
                            kebutuhan medis siswa dan staf sekolah.</p>
                        <div class="mt-4 flex items-center text-sm text-rose-600 font-medium"><svg
                                class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>P3K Lengkap</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="py-16 bg-orange-600 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold mb-4">Ingin Melihat Lebih Dekat?</h2>
            <p class="text-orange-100 text-lg mb-8 max-w-2xl mx-auto">Kunjungi sekolah kami dan rasakan langsung
                fasilitas yang tersedia</p>
            <div class="flex flex-wrap gap-4 justify-center">
                <a href="/kontak"
                    class="inline-block bg-white text-orange-700 font-medium py-3 px-8 rounded-lg hover:bg-gray-100 transition duration-200">Jadwalkan
                    Kunjungan</a>
                <a href="/ppdb"
                    class="inline-block bg-orange-700 text-white font-medium py-3 px-8 rounded-lg hover:bg-orange-800 transition duration-200 border-2 border-white">Daftar
                    PPDB</a>
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

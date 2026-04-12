<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil SMAK Syuradikara - Pencipta Pahlawan Utama</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        html {
            scroll-behavior: smooth;
        }

        .modal {
            transition: opacity 0.3s ease;
        }

        .dropdown-menu {
            display: none;
        }

        .dropdown-menu.show {
            display: block;
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
                            class="w-10 h-10 bg-yellow-400 rounded-full flex items-center justify-center text-black font-bold mr-3">
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
                            class="text-black hover:text-yellow-600 transition font-medium flex items-center">
                            Profil
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div class="dropdown-menu absolute bg-white shadow-lg rounded-lg mt-2 py-2 min-w-[200px]">
                            <a href="#visi-misi"
                                class="block px-4 py-2 text-black hover:bg-yellow-100 hover:text-black">Visi &
                                Misi</a>
                            <a href="#sejarah"
                                class="block px-4 py-2 text-black hover:bg-yellow-100 hover:text-black">Sejarah</a>
                            <a href="#sambutan"
                                class="block px-4 py-2 text-black hover:bg-yellow-100 hover:text-black">Sambutan
                                Kepala Sekolah</a>
                            <a href="#tujuan"
                                class="block px-4 py-2 text-black hover:bg-yellow-100 hover:text-black">Tujuan
                                Sekolah</a>
                        </div>
                    </div>

                    <a href="/guru" class="text-black hover:text-yellow-600 transition font-medium">Guru &
                        Pegawai</a>
                    <a href="/fasilitas" class="text-black hover:text-yellow-600 transition font-medium">Fasilitas</a>

                    <div class="relative dropdown">
                        <button class="text-black hover:text-yellow-600 transition font-medium flex items-center">
                            Akademik
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div
                            class="dropdown-menu absolute hidden bg-white shadow-lg rounded-lg mt-2 py-2 min-w-[200px]">
                            <a href="/berita"
                                class="block px-4 py-2 text-black hover:bg-yellow-100 hover:text-black">Berita</a>
                            <a href="/pengumuman"
                                class="block px-4 py-2 text-black hover:bg-yellow-100 hover:text-black">Pengumuman</a>
                            <a href="/galeri"
                                class="block px-4 py-2 text-black hover:bg-yellow-100 hover:text-black">Galeri</a>
                        </div>
                    </div>

                    <a href="/ppdb" class="text-black hover:text-yellow-600 transition font-medium">PPDB</a>
                    <a href="/kemitraan" class="text-black hover:text-yellow-600 transition font-medium">Kemitraan</a>
                    <a href="/kontak" class="text-black hover:text-yellow-600 transition font-medium">Kontak</a>
                </div>

                <div class="flex items-center">
                    <button onclick="openLoginModal()"
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
                </div>
                <button onclick="closeLoginModal()" class="text-black hover:text-black">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
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
                <form action="{{ route('login') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label for="email" class="block text-sm font-medium text-black mb-2">Email</label>
                        <input type="email" name="email" id="email" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-400 focus:border-transparent"
                            placeholder="nama@syuradikara.sch.id">
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-black mb-2">Password</label>
                        <input type="password" name="password" id="password" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-400 focus:border-transparent"
                            placeholder="••••••••">
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" name="remember" id="remember"
                            class="h-4 w-4 text-yellow-600 focus:ring-yellow-400 border-gray-300 rounded">
                        <label for="remember" class="ml-2 block text-sm text-black">Ingat saya</label>
                    </div>
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

    <!-- Hero Section -->
    <section class="pt-16">
        <div class="relative bg-yellow-400 text-black overflow-hidden">
            <div class="absolute inset-0 opacity-10">
                <div class="absolute top-20 left-10 w-64 h-64 bg-white rounded-full blur-3xl"></div>
                <div class="absolute bottom-20 right-10 w-96 h-96 bg-white rounded-full blur-3xl"></div>
            </div>
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
                <div class="text-center">
                    <div class="inline-block bg-white bg-opacity-20 px-4 py-2 rounded-full text-sm font-medium mb-6">
                        Tentang Kami</div>
                    <h1 class="text-5xl md:text-6xl font-bold mb-6">Profil
                        {{ $profil->nama_sekolah ?? 'SMAK Syuradikara' }}</h1>
                    <p class="text-xl text-black max-w-3xl mx-auto">Mengenal lebih dekat sekolah Katolik terbaik
                        di
                        Ende yang telah mencetak generasi unggul sejak tahun 1953</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Anchor Navigation -->
    <section class="bg-white shadow-sm sticky top-16 z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex space-x-4 overflow-x-auto py-3">
                <a href="#visi-misi"
                    class="whitespace-nowrap px-4 py-2 bg-yellow-400 text-black rounded-full text-sm font-medium hover:bg-yellow-500 transition">Visi
                    & Misi</a>
                <a href="#sejarah"
                    class="whitespace-nowrap px-4 py-2 bg-white text-black rounded-full text-sm font-medium hover:bg-black transition">Sejarah</a>
                <a href="#sambutan"
                    class="whitespace-nowrap px-4 py-2 bg-white text-black rounded-full text-sm font-medium hover:bg-black transition">Sambutan
                    Kepala Sekolah</a>
                <a href="#tujuan"
                    class="whitespace-nowrap px-4 py-2 bg-white text-black rounded-full text-sm font-medium hover:bg-black transition">Tujuan
                    Sekolah</a>
            </div>
        </div>
    </section>

    <!-- Visi & Misi Section -->
    <section id="visi-misi" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-5xl font-black text-black mb-4">VISI & MISI</h2>
                <div class="h-1 w-24 bg-yellow-400 mx-auto mb-6"></div>
                <p class="text-black text-lg max-w-2xl mx-auto">Landasan dan arah pengembangan SMAK Syuradikara</p>
            </div>

            <div class="space-y-8">
                <!-- Visi Card -->
                <div class="bg-yellow-400 rounded-3xl overflow-hidden">
                    <div class="grid md:grid-cols-5">
                        <div class="md:col-span-2 bg-black p-10 md:p-12 flex items-center">
                            <div>
                                <span class="block text-sm font-black tracking-[0.4em] uppercase text-yellow-400 mb-4">VISI</span>
                                <div class="h-1 w-16 bg-yellow-400 mb-6"></div>
                                <p class="text-yellow-400 text-sm uppercase tracking-wider">Arah & Tujuan</p>
                            </div>
                        </div>
                        <div class="md:col-span-3 p-10 md:p-12 flex items-center">
                            <div>
                                <h3 class="text-3xl md:text-4xl lg:text-5xl font-black text-black leading-tight">
                                    {{ $profil->visi ?? 'Pencipta Pahlawan Utama' }}
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Misi Card -->
                <div class="bg-black rounded-3xl overflow-hidden">
                    <div class="grid md:grid-cols-5">
                        <div class="md:col-span-2 bg-yellow-400 p-10 md:p-12 flex items-center">
                            <div>
                                <span class="block text-sm font-black tracking-[0.4em] uppercase text-black mb-4">MISI</span>
                                <div class="h-1 w-16 bg-black mb-6"></div>
                                <p class="text-black text-sm uppercase tracking-wider">Langkah Strategis</p>
                            </div>
                        </div>
                        <div class="md:col-span-3 p-10 md:p-12">
                            @if ($profil?->misi)
                                <div class="text-white whitespace-pre-line leading-relaxed text-lg">{{ $profil->misi }}</div>
                            @else
                                <ol class="space-y-5">
                                    <li class="text-white leading-relaxed border-l-4 border-yellow-400 pl-6">
                                        <span class="block text-yellow-400 font-black text-lg mb-1">01</span>
                                        Menciptakan kondisi yang kondusif bagi terwujudnya Kerajaan Allah dengan benih-benih (nilai-nilai) Kerajaan Allah dalam diri generasi muda.
                                    </li>
                                    <li class="text-white leading-relaxed border-l-4 border-yellow-400 pl-6">
                                        <span class="block text-yellow-400 font-black text-lg mb-1">02</span>
                                        Menyiapkan pendidikan umum yang cukup/sesuai dan diselaraskan dengan program kurikulum untuk pengembangan aspek intelektual, keterampilan, dan mental kepribadian.
                                    </li>
                                    <li class="text-white leading-relaxed border-l-4 border-yellow-400 pl-6">
                                        <span class="block text-yellow-400 font-black text-lg mb-1">03</span>
                                        Menyiapkan mutu pendidikan melalui pendekatan interdisiplin ilmu yang terpadu, kreatif dan inovatif.
                                    </li>
                                    <li class="text-white leading-relaxed border-l-4 border-yellow-400 pl-6">
                                        <span class="block text-yellow-400 font-black text-lg mb-1">04</span>
                                        Menyiapkan siswa untuk berpartisipasi aktif dan efektif dalam kegiatan-kegiatan sosial dan masalah-masalah sosial.
                                    </li>
                                    <li class="text-white leading-relaxed border-l-4 border-yellow-400 pl-6">
                                        <span class="block text-yellow-400 font-black text-lg mb-1">05</span>
                                        Mempromosikan pelayanan kepada masyarakat luas dengan membuka peluang bagi semua siswa tanpa memandang perbedaan agama, budaya, status sosial dan jenis kelamin.
                                    </li>
                                    <li class="text-white leading-relaxed border-l-4 border-yellow-400 pl-6">
                                        <span class="block text-yellow-400 font-black text-lg mb-1">06</span>
                                        Menjadikan Syuradikara sebagai Pusat Belajar bagi lembaga pendidikan lainnya teristimewa di kawasan Nusa Tenggara Timur.
                                    </li>
                                </ol>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sejarah Section -->
    <section id="sejarah" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-black mb-4">Sejarah SMAK Syuradikara</h2>
                <p class="text-black text-lg max-w-2xl mx-auto">Perjalanan panjang sekolah sejak tahun 1948 hingga
                    menjadi pusat pendidikan unggulan di Ende, Flores</p>
            </div>

            <div class="bg-white rounded-2xl shadow-lg p-8 md:p-12">
                <div class="prose prose-lg max-w-none">
                    <!-- Timeline items -->
                    <div class="space-y-8">
                        <div class="flex items-start">
                            <div class="flex-shrink-0 w-24 text-center">
                                <div
                                    class="inline-block bg-yellow-400 text-black font-bold px-4 py-2 rounded-full text-sm">
                                    1948</div>
                            </div>
                            <div class="ml-6">
                                <h3 class="text-xl font-bold text-black mb-2">Awal Mula Pemikiran</h3>
                                <p class="text-black leading-relaxed">Rencana untuk mendirikan sebuah Sekolah
                                    Menengah Atas di Ende Flores dimulai tiga tahun setelah merdeka, sejak awal tahun
                                    1948. Catatan tentangnya terbaca dalam surat Bahasa Belanda, tertanggal 10 Februari
                                    1948. Surat ini dikirimkan oleh Superior Generalis SVD yang berkedudukan di Roma,
                                    ditujukan kepada Pater Regional Anton Thijssen di Ende Flores.</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="flex-shrink-0 w-24 text-center">
                                <div
                                    class="inline-block bg-yellow-400 text-black font-bold px-4 py-2 rounded-full text-sm">
                                    1948</div>
                            </div>
                            <div class="ml-6">
                                <h3 class="text-xl font-bold text-black mb-2">Surat Pertama dari Mgr. Thijssen</h3>
                                <p class="text-black leading-relaxed">Surat pertama dari Roma menjawab surat pertama
                                    dari Ende, yang memberi tanda dimulainya pikiran-pikiran maju tentang sebuah sekolah
                                    baru. Meskipun surat dari Mgr. Thijssen tidak dapat dibaca karena tersimpan di Roma,
                                    namun dari jawabannya dapat diketahui bahwa pemikiran mengenai perlunya sebuah
                                    sekolah menengah sudah ada dan disampaikan secara serius sejak tahun 1948.</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="flex-shrink-0 w-24 text-center">
                                <div
                                    class="inline-block bg-yellow-400 text-black font-bold px-4 py-2 rounded-full text-sm">
                                    1950-an</div>
                            </div>
                            <div class="ml-6">
                                <h3 class="text-xl font-bold text-black mb-2">Pertumbuhan Sekolah di Flores</h3>
                                <p class="text-black leading-relaxed">Awal tahun 1950-an pertumbuhan dan
                                    perkembangan persekolahan di Flores sangat menggembirakan. Sekolah-sekolah SMP, SKP,
                                    SGB, dan SGD sudah ada. Namun hal ini dirasa kurang karena belum ada satu SMA pun di
                                    Flores sebagai jalan penting untuk masuk ke Universitas. Ketiadaan SMA di Flores
                                    memacu semangat misionaris SVD untuk mulai.</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="flex-shrink-0 w-24 text-center">
                                <div
                                    class="inline-block bg-yellow-400 text-black font-bold px-4 py-2 rounded-full text-sm">
                                    1953</div>
                            </div>
                            <div class="ml-6">
                                <h3 class="text-xl font-bold text-black mb-2">Dua Kemungkinan</h3>
                                <p class="text-black leading-relaxed">Bersama Kuasa Usaha pengurus Persekolahan
                                    Katolik, Pimpinan regional SVD Flores mengambil langkah-langkah penting. Mgr. A.
                                    Thijssen bersurat sekaligus mengundang Kepala Bagian Pengajaran Kantor Misi Pusat
                                    (KWI sekarang), Pater B. Schouten SJ agar datang ke Ende. Ada dua kemungkinan
                                    penting yang dibahas: memohon Pemerintah untuk membuka sebuah SMA Negeri di Flores,
                                    atau Regional SVD akan berusaha mengerahkan segala kemampuannya untuk membuka sebuah
                                    SMA Katolik di Ende Flores.</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="flex-shrink-0 w-24 text-center">
                                <div
                                    class="inline-block bg-yellow-400 text-black font-bold px-4 py-2 rounded-full text-sm">
                                    1953</div>
                            </div>
                            <div class="ml-6">
                                <h3 class="text-xl font-bold text-black mb-2">Pemerintah Belum Bisa</h3>
                                <p class="text-black leading-relaxed">Pada tanggal 6 Januari 1953 P. Schouten SJ
                                    menulis surat kepada Mgr. A. Thijssen. Isinya menjelaskan bahwa pemerintah, dalam
                                    hal ini Kementrian Pendidikan, Pengajaran, dan Kebudayaan belum bermaksud serta
                                    belum bisa membuka SMA Negeri di Flores. Hal ini dapat dimaklumi karena RI Indonesia
                                    baru berusia 8 tahun.</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="flex-shrink-0 w-24 text-center">
                                <div
                                    class="inline-block bg-yellow-400 text-black font-bold px-4 py-2 rounded-full text-sm">
                                    1953</div>
                            </div>
                            <div class="ml-6">
                                <h3 class="text-xl font-bold text-black mb-2">Maklumat Pendirian</h3>
                                <p class="text-black leading-relaxed">Sampai tanggal 24 Januari 1953 P. Regional E.
                                    Kuhne dan Kuasa Usaha Pengurus Persekolahan Katolik di Flores, P. Fransiskus
                                    Cornelissen mengeluarkan sebuah surat maklumat tentang akan didirikannya sebuah SMA
                                    Katolik di Ende. Maklumat yang dikeluarkan mendapat reaksi luas di kalangan
                                    masyarakat Flores dan Ende khususnya.</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="flex-shrink-0 w-24 text-center">
                                <div
                                    class="inline-block bg-yellow-500 text-black font-bold px-4 py-2 rounded-full text-sm">
                                    1953</div>
                            </div>
                            <div class="ml-6">
                                <h3 class="text-xl font-bold text-black mb-2">Peresmian SMAK Syuradikara</h3>
                                <p class="text-black leading-relaxed">Gaung akan berdirinya SMAK Syuradikara membuat
                                    kota Ende menjadi lebih hidup. Maklumat itu berisi adanya sebuah sekolah SMA Katolik
                                    di Ende demi kepentingan pendidikan di wilayah Flores secara umum. Maka Serikat
                                    Sabda Allah (SVD) mendirikan sebuah SMA di kota Ende yang diresmikan pada tanggal
                                    <strong>01 September 1953</strong> dengan nama <strong>"SMAK SYURADIKARA"</strong>,
                                    yang berarti <strong>"PENCIPTA PAHLAWAN UTAMA"</strong>, dalam bahasa Sanskrit.
                                    <strong>Pater Yohanes Ebben, SVD</strong> adalah Kepala SMA Katolik yang pertama.
                                    Sejak awal berdirinya SMAK Syuradikara sudah hadir sebagai simbol prestasi akademik.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Key Figures -->
                    <div class="mt-12 p-6 bg-yellow-50 rounded-xl">
                        <h3 class="text-xl font-bold text-black mb-4">Tokoh Pendiri</h3>
                        <div class="grid md:grid-cols-3 gap-6">
                            <div class="text-center">
                                <div
                                    class="w-24 h-24 bg-yellow-200 rounded-full mx-auto mb-3 flex items-center justify-center">
                                    <svg class="w-12 h-12 text-yellow-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                        </path>
                                    </svg>
                                </div>
                                <h4 class="font-bold text-black">Mgr. Antonius Thijssen</h4>
                                <p class="text-sm text-black">Pater Regional SVD yang memprakarsai pendirian SMA</p>
                            </div>
                            <div class="text-center">
                                <div
                                    class="w-24 h-24 bg-yellow-200 rounded-full mx-auto mb-3 flex items-center justify-center">
                                    <svg class="w-12 h-12 text-yellow-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                        </path>
                                    </svg>
                                </div>
                                <h4 class="font-bold text-black">Pater Yohanes Ebben, SVD</h4>
                                <p class="text-sm text-black">Kepala SMAK Syuradikara yang pertama</p>
                            </div>
                            <div class="text-center">
                                <div
                                    class="w-24 h-24 bg-yellow-200 rounded-full mx-auto mb-3 flex items-center justify-center">
                                    <svg class="w-12 h-12 text-yellow-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                        </path>
                                    </svg>
                                </div>
                                <h4 class="font-bold text-black">Pater B. Schouten SJ</h4>
                                <p class="text-sm text-black">Kepala Bagian Pengajaran Kantor Misi Pusat</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sambutan Kepala Sekolah -->
    <section id="sambutan" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-black mb-4">Sambutan Kepala Sekolah</h2>
                <p class="text-black text-lg max-w-2xl mx-auto">Pesan dari pimpinan SMAK Syuradikara</p>
            </div>

            <div class="bg-gradient-to-br from-yellow-50 to-white rounded-2xl shadow-lg overflow-hidden">
                <div class="grid md:grid-cols-3">
                    <!-- Foto Kepala Sekolah -->
                    <div class="bg-yellow-400 p-8 flex items-center justify-center">
                        <div class="text-center text-black">
                            <div
                                class="w-40 h-40 bg-white bg-opacity-20 rounded-full mx-auto mb-4 flex items-center justify-center">
                                <svg class="w-20 h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold mb-2">Br. Kristianus Riberu, SVD, M.Pd.</h3>
                            <p class="text-black">Kepala SMAK Syuradikara</p>
                        </div>
                    </div>

                    <!-- Sambutan Text -->
                    <div class="md:col-span-2 p-8 md:p-12">
                        <div class="prose prose-lg max-w-none">
                            <p class="text-black leading-relaxed mb-4"><em>Sahabat Kuning Putih yang saya
                                    banggakan...</em></p>
                            <p class="text-black leading-relaxed mb-4">Menjadi hebat mesti dimulai dari bagaimana
                                manusia itu "sehat" berpikir tanpa harus "sesat" berpikir. Oleh karena itu, SMA Swasta
                                Katolik Syuradikara hadir meretas kebodohan dan mencetak para "Pencipta Pahlawan Utama"
                                sesuai dengan visinya sejak 1953, tahun pertama sekolah ini berdiri.</p>
                            <p class="text-black leading-relaxed mb-4">Dalam perjalanan dari tahun ke tahun, sampai
                                pada titik ini, SMA Swasta Katolik Syuradikara telah menjadi pusat pembentukan nilai,
                                pertukaran gagasan, kerja sama, dan berinovasi. Mengapa demikian? Hal ini menyata ketika
                                lembaga ini membangun jaringan yang kuat di antara para profesional, akademisi, dan
                                praktisi dari berbagai sektor.</p>
                            <p class="text-black leading-relaxed mb-4">Keberhasilan Syuradikara juga tercermin dalam
                                sejumlah tamatan alumni baik di dalam dan luar negeri, juga pembentukan nilai melalui
                                spiritualitas St. Arnoldus Janssen yang dihidupkan sejak awal berdirinya.</p>
                            <p class="text-black leading-relaxed mb-4">Oleh karena betapa penting melihat dan
                                mencintai lembaga ini sebagai rumah yang selalu memanggilmu pulang, maka inilah rumah
                                besar kita, rumah yang mengingatkan kepada kita bahwa sekolah dan alumni hendaknya
                                bersatu hati berjalan bersama dalam terang Sang Sabda.</p>

                            <h3 class="text-xl font-bold text-yellow-600 mt-8 mb-4">Lima Program Utama</h3>

                            <div class="space-y-4 mt-4">
                                <div class="flex items-start p-4 bg-white rounded-lg shadow-sm">
                                    <div
                                        class="w-8 h-8 bg-yellow-400 rounded-full flex items-center justify-center text-black font-bold mr-3 flex-shrink-0">
                                        1</div>
                                    <p class="text-black">Penguatan pendidikan karakter berbasis spiritualitas
                                        misioner dengan empat matra khas SVD: Animasi Misi, Kitab Suci, Komunikasi, dan
                                        JPIC.</p>
                                </div>
                                <div class="flex items-start p-4 bg-white rounded-lg shadow-sm">
                                    <div
                                        class="w-8 h-8 bg-yellow-400 rounded-full flex items-center justify-center text-black font-bold mr-3 flex-shrink-0">
                                        2</div>
                                    <p class="text-black">Penguatan skill melalui seni dan budaya, pembelajaran
                                        berbasis proyek, etos kerja, dedikasi, dan kedisiplinan lingkungan.</p>
                                </div>
                                <div class="flex items-start p-4 bg-white rounded-lg shadow-sm">
                                    <div
                                        class="w-8 h-8 bg-yellow-400 rounded-full flex items-center justify-center text-black font-bold mr-3 flex-shrink-0">
                                        3</div>
                                    <p class="text-black">Program sekolah sehat - insan yang sehat dalam semua
                                        aspek, kebijakan yang sehat, komunikasi sehat, dan perilaku sehat.</p>
                                </div>
                                <div class="flex items-start p-4 bg-white rounded-lg shadow-sm">
                                    <div
                                        class="w-8 h-8 bg-yellow-400 rounded-full flex items-center justify-center text-black font-bold mr-3 flex-shrink-0">
                                        4</div>
                                    <p class="text-black">Literasi yang membebaskan - me-literasi-kan semua hal
                                        untuk melawan malas berpikir agar tetap "waras".</p>
                                </div>
                                <div class="flex items-start p-4 bg-white rounded-lg shadow-sm">
                                    <div
                                        class="w-8 h-8 bg-yellow-400 rounded-full flex items-center justify-center text-black font-bold mr-3 flex-shrink-0">
                                        5</div>
                                    <p class="text-black">Pastoral sekolah sebagai senjata iman, harap, dan kasih
                                        yang mewadahi kerohanian dan nilai-nilai religiositas.</p>
                                </div>
                            </div>

                            <p class="text-black leading-relaxed mt-6">Pada akhir kata, mari kita melangkah bersama
                                dan meneropong jauh ke depan. Di website ini, dan rumah besar Syuradikara, kami akan
                                selalu "membuat kalian bangga" dengan kisah-kisah yang akan kami wartakan kepada Anda
                                sekalian. <strong>Dari Syuradikara untuk Nusantara dan dunia.</strong></p>
                            <p class="text-black font-medium mt-4"><em>Salam dalam terang Sang Sabda. Semoga Hati
                                    Yesus hidup dalam hati semua manusia.</em></p>
                            <p class="text-black text-sm mt-4">Ende, Kamis, 18 April 2024</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Tujuan Sekolah -->
    <section id="tujuan" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-black mb-4">Tujuan Sekolah</h2>
                <p class="text-black text-lg max-w-2xl mx-auto">Misi besar yang kami emban untuk masyarakat NTT</p>
            </div>

            <div
                class="bg-gradient-to-r from-yellow-50 to-yellow-100 rounded-2xl p-8 md:p-12 border-2  max-w-4xl mx-auto">
                <div class="flex items-center mb-6">
                    <div class="w-16 h-16 bg-yellow-100 rounded-xl flex items-center justify-center mr-4">
                        <svg class="w-10 h-10 text-yellow-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold text-black">Tujuan Sekolah</h3>
                </div>
                <p class="text-lg text-black leading-relaxed">
                    Terciptanya suatu masyarakat Nusa Tenggara Timur baru yang terbebas dari belenggu:
                    <strong>ketidaktahuan, kebodohan, kemiskinan, ketidakadilan, penindasan atas gender dan ketakutan
                        SARA</strong>.
                </p>
            </div>

            <!-- CTA -->
            <div class="text-center mt-12">
                <a href="/ppdb"
                    class="inline-block bg-yellow-400 hover:bg-yellow-500 text-black font-bold py-3 px-8 rounded-lg transition duration-200">Daftar
                    Sekarang di SMAK Syuradikara</a>
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
                        <li><a href="/profil" class="text-black hover:text-black transition">Profil Sekolah</a>
                        </li>
                        <li><a href="/guru" class="text-black hover:text-black transition">Guru & Pegawai</a>
                        </li>
                        <li><a href="/ppdb" class="text-black hover:text-black transition">PPDB Online</a></li>
                        <li><a href="/berita" class="text-black hover:text-black transition">Berita</a></li>
                        <li><a href="/galeri" class="text-black hover:text-black transition">Galeri</a></li>
                        <li><a href="/kontak" class="text-black hover:text-black transition">Kontak</a></li>
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
        // Login Modal Functions
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

        // Dropdown Menu Functions
        function toggleDropdown(button) {
            const dropdown = button.closest('.dropdown');
            const menu = dropdown.querySelector('.dropdown-menu');

            // Close all other dropdowns
            document.querySelectorAll('.dropdown-menu').forEach(m => {
                if (m !== menu) {
                    m.classList.remove('show');
                }
            });

            // Toggle this dropdown
            menu.classList.toggle('show');
        }

        // Close dropdowns when clicking outside
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.dropdown')) {
                document.querySelectorAll('.dropdown-menu').forEach(m => {
                    m.classList.remove('show');
                });
            }
        });

        @if ($errors->any())
            openLoginModal();
        @endif
    </script>
</body>

</html>

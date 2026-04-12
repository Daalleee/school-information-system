<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPDB SMAK Syuradikara - Pendaftaran 2026</title>
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
                    <a href="/ppdb" class="text-yellow-600 font-medium">PPDB</a>
                    <a href="/kemitraan" class="text-black hover:text-yellow-600 transition font-medium">Kemitraan</a>
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
                    <div
                        class="inline-block bg-yellow-400 text-yellow-900 px-4 py-2 rounded-full text-sm font-bold mb-6">
                        PENDAFTARAN DIBUKA</div>
                    <h1 class="text-5xl md:text-6xl font-bold mb-6">PPDB 2026/2027</h1>
                    <p class="text-xl text-black max-w-3xl mx-auto">Penerimaan Peserta Didik Baru SMAK
                        Syuradikara. Bergabunglah menjadi bagian dari "Pencipta Pahlawan Utama"</p>
                    <div class="flex flex-wrap gap-4 justify-center mt-8">
                        <a href="#form-pendaftaran"
                            class="inline-block bg-yellow-400 text-yellow-900 font-bold py-3 px-8 rounded-lg hover:bg-yellow-300 transition">Daftar
                            Sekarang</a>
                        <a href="#alur"
                            class="inline-block bg-white bg-opacity-20 text-white font-medium py-3 px-8 rounded-lg hover:bg-opacity-30 transition border-2 border-white">Lihat
                            Alur Pendaftaran</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Info Cards -->
    <section class="py-12 bg-white -mt-8 relative z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-3 gap-6">
                <div
                    class="bg-gradient-to-br from-yellow-50 to-white rounded-xl p-6 border  text-center">
                    <div class="text-3xl font-bold text-yellow-600 mb-1">1 Mar - 30 Jun 2026</div>
                    <div class="text-black">Periode Pendaftaran</div>
                </div>
                <div
                    class="bg-gradient-to-br from-yellow-50 to-white rounded-xl p-6 border  text-center">
                    <div class="text-3xl font-bold text-yellow-600 mb-1">Rp 150.000</div>
                    <div class="text-black">Biaya Pendaftaran</div>
                </div>
                <div
                    class="bg-gradient-to-br from-yellow-50 to-white rounded-xl p-6 border  text-center">
                    <div class="text-3xl font-bold text-yellow-600 mb-1">120 Siswa</div>
                    <div class="text-black">Kuota Tersedia (4 Rombel)</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Alur Pendaftaran -->
    <section id="alur" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-black mb-4">Alur Pendaftaran</h2>
                <p class="text-black text-lg max-w-2xl mx-auto">Ikuti langkah-langkah berikut untuk mendaftar
                    sebagai siswa baru</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Step 1 -->
                <div class="text-center">
                    <div
                        class="w-16 h-16 bg-yellow-400 rounded-full flex items-center justify-center text-white text-2xl font-bold mx-auto mb-4">
                        1</div>
                    <h3 class="text-lg font-bold text-black mb-2">Daftar Online</h3>
                    <p class="text-black text-sm">Isi formulir pendaftaran online di bawah ini dengan data yang
                        lengkap dan benar</p>
                </div>
                <!-- Step 2 -->
                <div class="text-center">
                    <div
                        class="w-16 h-16 bg-yellow-400 rounded-full flex items-center justify-center text-white text-2xl font-bold mx-auto mb-4">
                        2</div>
                    <h3 class="text-lg font-bold text-black mb-2">Verifikasi Berkas</h3>
                    <p class="text-black text-sm">Serahkan berkas persyaratan ke panitia PPDB di sekolah untuk
                        diverifikasi</p>
                </div>
                <!-- Step 3 -->
                <div class="text-center">
                    <div
                        class="w-16 h-16 bg-yellow-400 rounded-full flex items-center justify-center text-white text-2xl font-bold mx-auto mb-4">
                        3</div>
                    <h3 class="text-lg font-bold text-black mb-2">Tes Seleksi</h3>
                    <p class="text-black text-sm">Ikuti tes seleksi akademik dan wawancara sesuai jadwal yang
                        ditentukan</p>
                </div>
                <!-- Step 4 -->
                <div class="text-center">
                    <div
                        class="w-16 h-16 bg-yellow-400 rounded-full flex items-center justify-center text-white text-2xl font-bold mx-auto mb-4">
                        4</div>
                    <h3 class="text-lg font-bold text-black mb-2">Diterima & Daftar Ulang</h3>
                    <p class="text-black text-sm">Jika diterima, lakukan daftar ulang dan selamat menjadi bagian
                        Syuradikara!</p>
                </div>
            </div>

            <!-- Persyaratan -->
            <div class="mt-16 bg-white rounded-2xl shadow-lg p-8">
                <h3 class="text-2xl font-bold text-black mb-6 text-center">Persyaratan Pendaftaran</h3>
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="flex items-start"><svg class="w-6 h-6 text-yellow-600 mr-3 mt-0.5 flex-shrink-0"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"></path>
                        </svg><span class="text-black">Lulus SMP/MTs atau sederajat</span></div>
                    <div class="flex items-start"><svg class="w-6 h-6 text-yellow-600 mr-3 mt-0.5 flex-shrink-0"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"></path>
                        </svg><span class="text-black">Berusia maksimal 15 tahun</span></div>
                    <div class="flex items-start"><svg class="w-6 h-6 text-yellow-600 mr-3 mt-0.5 flex-shrink-0"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"></path>
                        </svg><span class="text-black">Fotokopi Ijazah/SKHUN yang dilegalisir</span></div>
                    <div class="flex items-start"><svg class="w-6 h-6 text-yellow-600 mr-3 mt-0.5 flex-shrink-0"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"></path>
                        </svg><span class="text-black">Fotokopi Akta Kelahiran</span></div>
                    <div class="flex items-start"><svg class="w-6 h-6 text-yellow-600 mr-3 mt-0.5 flex-shrink-0"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"></path>
                        </svg><span class="text-black">Fotokopi Kartu Keluarga</span></div>
                    <div class="flex items-start"><svg class="w-6 h-6 text-yellow-600 mr-3 mt-0.5 flex-shrink-0"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"></path>
                        </svg><span class="text-black">Pas foto 3x4 sebanyak 4 lembar</span></div>
                    <div class="flex items-start"><svg class="w-6 h-6 text-yellow-600 mr-3 mt-0.5 flex-shrink-0"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"></path>
                        </svg><span class="text-black">Surat Keterangan Sehat</span></div>
                    <div class="flex items-start"><svg class="w-6 h-6 text-yellow-600 mr-3 mt-0.5 flex-shrink-0"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"></path>
                        </svg><span class="text-black">Surat Keterangan Kelakuan Baik</span></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Form Pendaftaran -->
    <section id="form-pendaftaran" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-black mb-4">Formulir Pendaftaran</h2>
                <p class="text-black text-lg max-w-2xl mx-auto">Isi data diri dengan lengkap dan benar</p>
            </div>

            <div class="max-w-3xl mx-auto">
                <div class="bg-white rounded-2xl p-8 md:p-12 shadow-sm border border-gray-100">
                    <form class="space-y-6">
                        @csrf
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-black mb-2">Nama Lengkap <span
                                        class="text-black">*</span></label>
                                <input type="text" name="nama_lengkap" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-400 focus:border-transparent"
                                    placeholder="Nama lengkap sesuai ijazah">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-black mb-2">Tempat Lahir <span
                                        class="text-black">*</span></label>
                                <input type="text" name="tempat_lahir" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-400 focus:border-transparent"
                                    placeholder="Kota tempat lahir">
                            </div>
                        </div>

                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-black mb-2">Tanggal Lahir <span
                                        class="text-black">*</span></label>
                                <input type="date" name="tanggal_lahir" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-400 focus:border-transparent">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-black mb-2">Jenis Kelamin <span
                                        class="text-black">*</span></label>
                                <select name="jenis_kelamin" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-400 focus:border-transparent">
                                    <option value="">Pilih jenis kelamin</option>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-black mb-2">Alamat Lengkap <span
                                    class="text-black">*</span></label>
                            <textarea name="alamat" rows="3" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-400 focus:border-transparent"
                                placeholder="Alamat lengkap sesuai KTP/KK"></textarea>
                        </div>

                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-black mb-2">Asal Sekolah <span
                                        class="text-black">*</span></label>
                                <input type="text" name="asal_sekolah" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-400 focus:border-transparent"
                                    placeholder="Nama SMP/MTs asal">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-black mb-2">No. HP / WhatsApp <span
                                        class="text-black">*</span></label>
                                <input type="tel" name="no_hp" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-400 focus:border-transparent"
                                    placeholder="08123456789">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-black mb-2">Email <span
                                    class="text-black">*</span></label>
                            <input type="email" name="email" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-400 focus:border-transparent"
                                placeholder="email@example.com">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-black mb-2">Nama Orang Tua / Wali</label>
                            <input type="text" name="nama_ortu"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-400 focus:border-transparent"
                                placeholder="Nama orang tua atau wali">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-black mb-2">No. HP Orang Tua / Wali</label>
                            <input type="tel" name="no_hp_ortu"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-400 focus:border-transparent"
                                placeholder="08123456789">
                        </div>

                        <div class="flex items-start">
                            <input type="checkbox" required
                                class="h-4 w-4 mt-1 text-yellow-600 focus:ring-yellow-400 border-gray-300 rounded">
                            <label class="ml-2 text-sm text-black">Saya menyatakan bahwa data yang saya isi adalah
                                benar dan saya bersedia mengikuti seluruh proses seleksi PPDB SMAK Syuradikara.</label>
                        </div>

                        <button type="submit"
                            class="w-full bg-yellow-400 hover:bg-yellow-500 text-black font-bold py-3 px-4 rounded-lg transition duration-200 text-lg">Kirim
                            Pendaftaran</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Kontak Panitia -->
    <section class="py-20 bg-yellow-400 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4">Kontak Panitia PPDB</h2>
                <p class="text-black text-lg">Hubungi kami jika ada pertanyaan seputar pendaftaran</p>
            </div>
            <div class="grid md:grid-cols-3 gap-8 max-w-4xl mx-auto">
                <div class="text-center">
                    <div
                        class="w-14 h-14 bg-white bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="font-bold mb-1">Telepon</h3>
                    <p class="text-black">(0381) 21648</p>
                </div>
                <div class="text-center">
                    <div
                        class="w-14 h-14 bg-white bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="font-bold mb-1">WhatsApp</h3>
                    <p class="text-black">0812-3456-7890</p>
                </div>
                <div class="text-center">
                    <div
                        class="w-14 h-14 bg-white bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="font-bold mb-1">Email</h3>
                    <p class="text-black">ppdb@syuradikara.sch.id</p>
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

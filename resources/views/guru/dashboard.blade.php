<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guru Dashboard - SMAK Syuradikara</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white">
    <!-- Navbar -->
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div
                        class="w-10 h-10 bg-yellow-400 rounded-full flex items-center justify-center text-white font-bold mr-3">
                        G</div>
                    <div>
                        <h1 class="text-lg font-bold text-black">SMAK Syuradikara - Guru</h1>
                        <p class="text-xs text-black">Dashboard Guru</p>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-black">{{ auth()->user()->name }}</span>
                    <span class="bg-yellow-100 text-black px-3 py-1 rounded-full text-sm font-medium">
                        {{ ucfirst(auth()->user()->role) }}
                    </span>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="bg-black hover:hover:bg-yellow-500 text-white font-medium py-2 px-4 rounded-lg transition duration-200">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        @if (session('success'))
            <div class="bg-yellow-100 border border-yellow-400 text-black px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <!-- Welcome Card -->
        <div class="bg-yellow-400 rounded-2xl shadow-lg p-8 text-white mb-8">
            <h2 class="text-3xl font-bold mb-2">Selamat Datang, {{ auth()->user()->name }}!</h2>
            <p class="text-black">Dashboard Guru - SMAK Syuradikara Ende</p>
        </div>

        <!-- Stats -->
        <div class="grid md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow p-6">
                <div class="text-black text-sm mb-2">Total Siswa Terdaftar</div>
                <div class="text-3xl font-bold text-black">-</div>
            </div>
            <div class="bg-white rounded-xl shadow p-6">
                <div class="text-black text-sm mb-2">Mata Pelajaran</div>
                <div class="text-xl font-bold text-black">-</div>
            </div>
            <div class="bg-white rounded-xl shadow p-6">
                <div class="text-black text-sm mb-2">Kelas Diampu</div>
                <div class="text-xl font-bold text-black">-</div>
            </div>
        </div>

        <!-- Menu Guru -->
        <div class="bg-white rounded-xl shadow p-8">
            <h3 class="text-2xl font-bold text-black mb-6">Menu Guru</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                <a href="#"
                    class="bg-yellow-100 hover:bg-yellow-100 border-2 border-yellow-400 rounded-xl p-6 transition">
                    <h4 class="text-lg font-bold text-black mb-2">📚 Lihat Data Siswa</h4>
                    <p class="text-black text-sm">Lihat informasi dan data siswa</p>
                </a>

                <a href="#"
                    class="bg-yellow-100 hover:bg-yellow-100 border-2 border-yellow-400 rounded-xl p-6 transition">
                    <h4 class="text-lg font-bold text-black mb-2">📝 Input Nilai</h4>
                    <p class="text-black text-sm">Input nilai siswa (akan datang)</p>
                </a>

                <a href="#"
                    class="bg-yellow-100 hover:bg-yellow-100 border-2 border-yellow-400 rounded-xl p-6 transition">
                    <h4 class="text-lg font-bold text-black mb-2">📅 Jadwal Mengajar</h4>
                    <p class="text-black text-sm">Lihat jadwal mengajar (akan datang)</p>
                </a>

                <a href="#"
                    class="bg-yellow-100 hover:bg-yellow-100 border-2 border-yellow-400 rounded-xl p-6 transition">
                    <h4 class="text-lg font-bold text-black mb-2">📊 Absensi</h4>
                    <p class="text-black text-sm">Input absensi siswa (akan datang)</p>
                </a>

                <a href="#"
                    class="bg-yellow-100 hover:bg-yellow-100 border-2 border-yellow-400 rounded-xl p-6 transition">
                    <h4 class="text-lg font-bold text-black mb-2">💬 Komunikasi</h4>
                    <p class="text-black text-sm">Komunikasi dengan wali murid (akan datang)</p>
                </a>

                <a href="/"
                    class="bg-white hover:bg-white border-2 border-gray-200 rounded-xl p-6 transition">
                    <h4 class="text-lg font-bold text-black mb-2">🌐 Website Sekolah</h4>
                    <p class="text-black text-sm">Kunjungi website publik sekolah</p>
                </a>
            </div>
        </div>

        <!-- Info -->
        <div class="mt-8 bg-yellow-100 border border-yellow-400 rounded-xl p-6">
            <h4 class="font-bold text-yellow-800 mb-2">ℹ️ Informasi</h4>
            <p class="text-black text-sm">
                Fitur guru akan segera dilengkapi. Hubungi admin untuk informasi lebih lanjut.
            </p>
        </div>
    </div>
</body>

</html>

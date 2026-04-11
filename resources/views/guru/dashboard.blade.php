<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guru Dashboard - SMAK Syuradikara</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <!-- Navbar -->
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div
                        class="w-10 h-10 bg-green-600 rounded-full flex items-center justify-center text-white font-bold mr-3">
                        G</div>
                    <div>
                        <h1 class="text-lg font-bold text-green-600">SMAK Syuradikara - Guru</h1>
                        <p class="text-xs text-gray-500">Dashboard Guru</p>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-700">{{ auth()->user()->name }}</span>
                    <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">
                        {{ ucfirst(auth()->user()->role) }}
                    </span>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="bg-red-600 hover:bg-red-700 text-white font-medium py-2 px-4 rounded-lg transition duration-200">
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
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <!-- Welcome Card -->
        <div class="bg-gradient-to-r from-green-600 to-green-800 rounded-2xl shadow-lg p-8 text-white mb-8">
            <h2 class="text-3xl font-bold mb-2">Selamat Datang, {{ auth()->user()->name }}!</h2>
            <p class="text-green-100">Dashboard Guru - SMAK Syuradikara Ende</p>
        </div>

        <!-- Stats -->
        <div class="grid md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow p-6">
                <div class="text-gray-600 text-sm mb-2">Total Siswa Terdaftar</div>
                <div class="text-3xl font-bold text-green-600">-</div>
            </div>
            <div class="bg-white rounded-xl shadow p-6">
                <div class="text-gray-600 text-sm mb-2">Mata Pelajaran</div>
                <div class="text-xl font-bold text-blue-600">-</div>
            </div>
            <div class="bg-white rounded-xl shadow p-6">
                <div class="text-gray-600 text-sm mb-2">Kelas Diampu</div>
                <div class="text-xl font-bold text-purple-600">-</div>
            </div>
        </div>

        <!-- Menu Guru -->
        <div class="bg-white rounded-xl shadow p-8">
            <h3 class="text-2xl font-bold text-gray-800 mb-6">Menu Guru</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                <a href="#"
                    class="bg-blue-50 hover:bg-blue-100 border-2 border-blue-200 rounded-xl p-6 transition">
                    <h4 class="text-lg font-bold text-blue-600 mb-2">📚 Lihat Data Siswa</h4>
                    <p class="text-gray-600 text-sm">Lihat informasi dan data siswa</p>
                </a>

                <a href="#"
                    class="bg-purple-50 hover:bg-purple-100 border-2 border-purple-200 rounded-xl p-6 transition">
                    <h4 class="text-lg font-bold text-purple-600 mb-2">📝 Input Nilai</h4>
                    <p class="text-gray-600 text-sm">Input nilai siswa (akan datang)</p>
                </a>

                <a href="#"
                    class="bg-green-50 hover:bg-green-100 border-2 border-green-200 rounded-xl p-6 transition">
                    <h4 class="text-lg font-bold text-green-600 mb-2">📅 Jadwal Mengajar</h4>
                    <p class="text-gray-600 text-sm">Lihat jadwal mengajar (akan datang)</p>
                </a>

                <a href="#"
                    class="bg-orange-50 hover:bg-orange-100 border-2 border-orange-200 rounded-xl p-6 transition">
                    <h4 class="text-lg font-bold text-orange-600 mb-2">📊 Absensi</h4>
                    <p class="text-gray-600 text-sm">Input absensi siswa (akan datang)</p>
                </a>

                <a href="#"
                    class="bg-pink-50 hover:bg-pink-100 border-2 border-pink-200 rounded-xl p-6 transition">
                    <h4 class="text-lg font-bold text-pink-600 mb-2">💬 Komunikasi</h4>
                    <p class="text-gray-600 text-sm">Komunikasi dengan wali murid (akan datang)</p>
                </a>

                <a href="/"
                    class="bg-gray-50 hover:bg-gray-100 border-2 border-gray-200 rounded-xl p-6 transition">
                    <h4 class="text-lg font-bold text-gray-600 mb-2">🌐 Website Sekolah</h4>
                    <p class="text-gray-600 text-sm">Kunjungi website publik sekolah</p>
                </a>
            </div>
        </div>

        <!-- Info -->
        <div class="mt-8 bg-blue-50 border border-blue-200 rounded-xl p-6">
            <h4 class="font-bold text-blue-800 mb-2">ℹ️ Informasi</h4>
            <p class="text-blue-700 text-sm">
                Fitur guru akan segera dilengkapi. Hubungi admin untuk informasi lebih lanjut.
            </p>
        </div>
    </div>
</body>

</html>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guru Dashboard - Sistem Sekolah</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <!-- Navbar -->
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <h1 class="text-xl font-bold text-green-600">SMAK Syuradikara - Guru</h1>
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
        <!-- Welcome Card -->
        <div class="bg-gradient-to-r from-green-600 to-green-800 rounded-lg shadow-md p-8 text-white mb-8">
            <h2 class="text-3xl font-bold mb-2">Selamat Datang, {{ auth()->user()->name }}!</h2>
            <p class="text-green-100">Anda login sebagai Guru dengan akses terbatas.</p>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white rounded-lg shadow-md p-8">
            <h3 class="text-2xl font-bold text-gray-800 mb-6">Menu Guru</h3>
            <div class="grid md:grid-cols-2 gap-6">
                <a href="#"
                    class="bg-blue-50 hover:bg-blue-100 border-2 border-blue-200 rounded-lg p-6 transition duration-200">
                    <h4 class="text-lg font-bold text-blue-600 mb-2">Lihat Data Siswa</h4>
                    <p class="text-gray-600 text-sm">Lihat informasi data siswa</p>
                </a>

                <a href="#"
                    class="bg-purple-50 hover:bg-purple-100 border-2 border-purple-200 rounded-lg p-6 transition duration-200">
                    <h4 class="text-lg font-bold text-purple-600 mb-2">Input Nilai</h4>
                    <p class="text-gray-600 text-sm">Input nilai siswa (akan datang)</p>
                </a>
            </div>
        </div>
    </div>
</body>

</html>

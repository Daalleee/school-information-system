<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Sistem Sekolah</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <!-- Navbar -->
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <h1 class="text-xl font-bold text-blue-600">SMAK Syuradikara - Admin</h1>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-700">{{ auth()->user()->name }}</span>
                    <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-medium">
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
        <div class="bg-gradient-to-r from-blue-600 to-blue-800 rounded-lg shadow-md p-8 text-white mb-8">
            <h2 class="text-3xl font-bold mb-2">Selamat Datang, {{ auth()->user()->name }}!</h2>
            <p class="text-blue-100">Anda login sebagai Administrator dengan akses penuh ke sistem.</p>
        </div>

        <!-- Stats Grid -->
        <div class="grid md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="text-gray-600 text-sm mb-2">Total Guru</div>
                <div class="text-3xl font-bold text-blue-600">0</div>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="text-gray-600 text-sm mb-2">Total Siswa</div>
                <div class="text-3xl font-bold text-green-600">0</div>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="text-gray-600 text-sm mb-2">Total Berita</div>
                <div class="text-3xl font-bold text-purple-600">0</div>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="text-gray-600 text-sm mb-2">Total Pengumuman</div>
                <div class="text-3xl font-bold text-orange-600">0</div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white rounded-lg shadow-md p-8">
            <h3 class="text-2xl font-bold text-gray-800 mb-6">Menu Admin</h3>
            <div class="grid md:grid-cols-3 gap-6">
                <a href="#"
                    class="bg-blue-50 hover:bg-blue-100 border-2 border-blue-200 rounded-lg p-6 transition duration-200">
                    <h4 class="text-lg font-bold text-blue-600 mb-2">Kelola Guru</h4>
                    <p class="text-gray-600 text-sm">Tambah, edit, dan hapus data guru</p>
                </a>

                <a href="#"
                    class="bg-green-50 hover:bg-green-100 border-2 border-green-200 rounded-lg p-6 transition duration-200">
                    <h4 class="text-lg font-bold text-green-600 mb-2">Kelola Siswa</h4>
                    <p class="text-gray-600 text-sm">Tambah, edit, dan hapus data siswa</p>
                </a>

                <a href="#"
                    class="bg-purple-50 hover:bg-purple-100 border-2 border-purple-200 rounded-lg p-6 transition duration-200">
                    <h4 class="text-lg font-bold text-purple-600 mb-2">Kelola Berita</h4>
                    <p class="text-gray-600 text-sm">Buat dan edit berita sekolah</p>
                </a>

                <a href="#"
                    class="bg-orange-50 hover:bg-orange-100 border-2 border-orange-200 rounded-lg p-6 transition duration-200">
                    <h4 class="text-lg font-bold text-orange-600 mb-2">Kelola Pengumuman</h4>
                    <p class="text-gray-600 text-sm">Buat dan edit pengumuman</p>
                </a>

                <a href="#"
                    class="bg-teal-50 hover:bg-teal-100 border-2 border-teal-200 rounded-lg p-6 transition duration-200">
                    <h4 class="text-lg font-bold text-teal-600 mb-2">Kelola Galeri</h4>
                    <p class="text-gray-600 text-sm">Upload dan kelola foto galeri</p>
                </a>

                <a href="#"
                    class="bg-pink-50 hover:bg-pink-100 border-2 border-pink-200 rounded-lg p-6 transition duration-200">
                    <h4 class="text-lg font-bold text-pink-600 mb-2">Kelola User</h4>
                    <p class="text-gray-600 text-sm">Buat akun guru dan operator</p>
                </a>
            </div>
        </div>
    </div>
</body>

</html>

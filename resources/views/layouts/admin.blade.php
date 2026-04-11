<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Dashboard') - SMAK Syuradikara</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @stack('styles')
</head>

<body class="bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar Overlay (Mobile) -->
        <div id="sidebarOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-30 hidden lg:hidden"
            onclick="toggleSidebar()"></div>

        <!-- Sidebar -->
        <aside id="sidebar"
            class="fixed lg:static inset-y-0 left-0 z-40 w-64 bg-gray-900 text-white transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out flex flex-col overflow-hidden">
            <!-- User Profile Section -->
            <div class="p-6 border-b border-gray-800">
                <div class="flex items-center space-x-4">
                    <div class="flex-shrink-0">
                        <div
                            class="w-12 h-12 rounded-full bg-blue-600 flex items-center justify-center text-white font-bold text-lg">
                            {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                        </div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-semibold text-white truncate">
                            {{ auth()->user()->name ?? 'Admin' }}
                        </p>
                        <p class="text-xs text-gray-400 truncate">
                            {{ auth()->user()->email ?? 'admin@school.com' }}
                        </p>
                        <span
                            class="inline-block mt-1 px-2 py-0.5 text-xs font-medium bg-blue-600 text-white rounded-full">
                            {{ ucwords(auth()->user()->role ?? 'admin') }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Navigation Menu -->
            <nav class="flex-1 overflow-y-auto py-4 px-3 space-y-1">
                @php
                    $menuItems = [
                        [
                            'route' => 'admin.dashboard',
                            'label' => 'Dashboard',
                            'icon' => 'home',
                        ],
                        [
                            'route' => 'admin.users.index',
                            'label' => 'Manajemen User',
                            'icon' => 'users',
                        ],
                        [
                            'route' => 'admin.guru.index',
                            'label' => 'Manajemen Guru',
                            'icon' => 'academic-cap',
                        ],
                        [
                            'route' => 'admin.siswa.index',
                            'label' => 'Manajemen Siswa',
                            'icon' => 'user-group',
                        ],
                        [
                            'route' => 'admin.berita.index',
                            'label' => 'Manajemen Berita',
                            'icon' => 'newspaper',
                        ],
                        [
                            'route' => 'admin.pengumuman.index',
                            'label' => 'Manajemen Pengumuman',
                            'icon' => 'megaphone',
                        ],
                        [
                            'route' => 'admin.galeri.index',
                            'label' => 'Manajemen Galeri',
                            'icon' => 'photo',
                        ],
                        [
                            'route' => 'admin.kategori.index',
                            'label' => 'Manajemen Kategori',
                            'icon' => 'tag',
                        ],
                        [
                            'route' => 'admin.halaman.index',
                            'label' => 'Manajemen Halaman',
                            'icon' => 'document-text',
                        ],
                        [
                            'route' => 'admin.ppdb.index',
                            'label' => 'Manajemen PPDB',
                            'icon' => 'clipboard-document',
                        ],
                        [
                            'route' => 'admin.kontak.index',
                            'label' => 'Pesan Masuk',
                            'icon' => 'envelope',
                        ],
                        [
                            'route' => 'admin.profil.index',
                            'label' => 'Profil Sekolah',
                            'icon' => 'building',
                        ],
                    ];
                @endphp

                @foreach ($menuItems as $item)
                    @php
                        $isActive =
                            request()->routeIs($item['route'] . '*') ||
                            request()->is(str_replace('.', '/', $item['route']) . '*');
                    @endphp
                    <a href="{{ route($item['route']) }}"
                        class="flex items-center px-4 py-3 text-sm font-medium rounded-lg transition-all duration-200 {{ $isActive ? 'bg-blue-600 text-white shadow-md' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                        <!-- Icon: Home -->
                        @if ($item['icon'] === 'home')
                            <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                        @endif
                        <!-- Icon: Users -->
                        @if ($item['icon'] === 'users')
                            <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        @endif
                        <!-- Icon: Academic Cap -->
                        @if ($item['icon'] === 'academic-cap')
                            <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path d="M12 14l9-5-9-5-9 5 9 5z" />
                                <path
                                    d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                            </svg>
                        @endif
                        <!-- Icon: User Group -->
                        @if ($item['icon'] === 'user-group')
                            <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        @endif
                        <!-- Icon: Newspaper -->
                        @if ($item['icon'] === 'newspaper')
                            <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                            </svg>
                        @endif
                        <!-- Icon: Megaphone -->
                        @if ($item['icon'] === 'megaphone')
                            <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                            </svg>
                        @endif
                        <!-- Icon: Photo -->
                        @if ($item['icon'] === 'photo')
                            <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        @endif
                        <!-- Icon: Tag -->
                        @if ($item['icon'] === 'tag')
                            <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                            </svg>
                        @endif
                        <!-- Icon: Document Text -->
                        @if ($item['icon'] === 'document-text')
                            <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        @endif
                        <!-- Icon: Clipboard Document -->
                        @if ($item['icon'] === 'clipboard-document')
                            <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                            </svg>
                        @endif
                        <!-- Icon: Envelope -->
                        @if ($item['icon'] === 'envelope')
                            <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                            </svg>
                        @endif
                        <!-- Icon: Building -->
                        @if ($item['icon'] === 'building')
                            <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" />
                            </svg>
                        @endif
                        <!-- Icon: Cog -->
                        @if ($item['icon'] === 'cog')
                            <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        @endif
                        <span class="truncate">{{ $item['label'] }}</span>
                    </a>
                @endforeach
            </nav>

            <!-- Sidebar Footer -->
            <div class="p-4 border-t border-gray-800">
                <p class="text-xs text-gray-500 text-center">
                    &copy; {{ date('Y') }} SMAK Syuradikara
                </p>
            </div>
        </aside>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col min-h-screen overflow-x-hidden">
            <!-- Topbar -->
            <header class="bg-white shadow-sm sticky top-0 z-20">
                <div class="flex items-center justify-between px-4 lg:px-6 py-4">
                    <!-- Left: Toggle & Title -->
                    <div class="flex items-center space-x-4">
                        <button type="button" onclick="toggleSidebar()"
                            class="lg:hidden p-2 rounded-md text-gray-600 hover:text-gray-900 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-colors"
                            aria-label="Toggle sidebar">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                        <div>
                            <h1 class="text-xl lg:text-2xl font-bold text-gray-800">
                                SMAK Syuradikara
                            </h1>
                            <p class="text-xs lg:text-sm text-gray-500 hidden sm:block">
                                Admin Panel
                            </p>
                        </div>
                    </div>

                    <!-- Right: User Info & Logout -->
                    <div class="flex items-center space-x-4">
                        <div class="hidden md:flex items-center space-x-3">
                            <div class="text-right">
                                <p class="text-sm font-semibold text-gray-800">
                                    {{ auth()->user()->name ?? 'Admin' }}
                                </p>
                                <span
                                    class="inline-block px-2 py-0.5 text-xs font-medium bg-blue-100 text-blue-800 rounded-full">
                                    {{ ucwords(auth()->user()->role ?? 'admin') }}
                                </span>
                            </div>
                            <div
                                class="w-10 h-10 rounded-full bg-blue-600 flex items-center justify-center text-white font-bold">
                                {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                            </div>
                        </div>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit"
                                class="flex items-center px-4 py-2 text-sm font-medium text-white bg-red-600 hover:bg-red-700 rounded-lg transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                <span class="hidden sm:inline">Logout</span>
                            </button>
                        </form>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 p-4 lg:p-6">
                @if (session('success'))
                    <div
                        class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-4 flex items-center justify-between">
                        <span>{{ session('success') }}</span>
                        <button type="button" onclick="this.parentElement.remove()"
                            class="text-green-700 hover:text-green-900">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                @endif

                @if (session('error'))
                    <div
                        class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-4 flex items-center justify-between">
                        <span>{{ session('error') }}</span>
                        <button type="button" onclick="this.parentElement.remove()"
                            class="text-red-700 hover:text-red-900">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-4">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');

            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        }

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const toggleBtn = event.target.closest('button[onclick="toggleSidebar()"]');

            if (window.innerWidth < 1024 && !sidebar.contains(event.target) && !toggleBtn) {
                sidebar.classList.add('-translate-x-full');
                document.getElementById('sidebarOverlay').classList.add('hidden');
            }
        });

        // Handle window resize
        window.addEventListener('resize', function() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');

            if (window.innerWidth >= 1024) {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.add('hidden');
            } else {
                sidebar.classList.add('-translate-x-full');
            }
        });
    </script>
    @stack('scripts')
</body>

</html>

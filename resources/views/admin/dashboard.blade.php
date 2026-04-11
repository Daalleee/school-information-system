@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="space-y-6">
        <!-- Page Header -->
        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Dashboard</h1>
                <p class="text-gray-600 mt-1">Selamat datang di Admin Panel SMAK Syuradikara</p>
            </div>
            <div class="text-sm text-gray-500">
                Terakhir diperbarui: {{ now()->format('d M Y, H:i') }}
            </div>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Guru Card -->
            <div
                class="bg-white rounded-xl shadow-md p-6 border-l-4 border-blue-500 hover:shadow-lg transition-shadow duration-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 uppercase tracking-wide">Total Guru</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">{{ $stats['total_guru'] }}</p>
                    </div>
                    <div class="w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center">
                        <svg class="w-7 h-7 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 14l9-5-9-5-9 5 9 5z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                        </svg>
                    </div>
                </div>
                <a href="{{ route('admin.guru.index') }}"
                    class="mt-4 inline-flex items-center text-sm font-medium text-blue-600 hover:text-blue-800 transition-colors">
                    Lihat Semua
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>

            <!-- Siswa Card -->
            <div
                class="bg-white rounded-xl shadow-md p-6 border-l-4 border-green-500 hover:shadow-lg transition-shadow duration-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 uppercase tracking-wide">Total Siswa</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">{{ $stats['total_siswa'] }}</p>
                    </div>
                    <div class="w-14 h-14 bg-green-100 rounded-full flex items-center justify-center">
                        <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                </div>
                <a href="{{ route('admin.siswa.index') }}"
                    class="mt-4 inline-flex items-center text-sm font-medium text-green-600 hover:text-green-800 transition-colors">
                    Lihat Semua
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>

            <!-- Berita Card -->
            <div
                class="bg-white rounded-xl shadow-md p-6 border-l-4 border-purple-500 hover:shadow-lg transition-shadow duration-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 uppercase tracking-wide">Total Berita</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">{{ $stats['total_berita'] }}</p>
                    </div>
                    <div class="w-14 h-14 bg-purple-100 rounded-full flex items-center justify-center">
                        <svg class="w-7 h-7 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                        </svg>
                    </div>
                </div>
                <a href="{{ route('admin.berita.index') }}"
                    class="mt-4 inline-flex items-center text-sm font-medium text-purple-600 hover:text-purple-800 transition-colors">
                    Lihat Semua
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>

            <!-- Pengumuman Card -->
            <div
                class="bg-white rounded-xl shadow-md p-6 border-l-4 border-orange-500 hover:shadow-lg transition-shadow duration-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 uppercase tracking-wide">Total Pengumuman</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">{{ $stats['total_pengumuman'] }}</p>
                    </div>
                    <div class="w-14 h-14 bg-orange-100 rounded-full flex items-center justify-center">
                        <svg class="w-7 h-7 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                        </svg>
                    </div>
                </div>
                <a href="{{ route('admin.pengumuman.index') }}"
                    class="mt-4 inline-flex items-center text-sm font-medium text-orange-600 hover:text-orange-800 transition-colors">
                    Lihat Semua
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>

            <!-- PPDB Card -->
            <div
                class="bg-white rounded-xl shadow-md p-6 border-l-4 border-teal-500 hover:shadow-lg transition-shadow duration-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 uppercase tracking-wide">Total PPDB</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">{{ $stats['total_ppdb'] }}</p>
                        @if ($stats['ppdb_pending'] > 0)
                            <p class="text-xs text-teal-600 mt-1">{{ $stats['ppdb_pending'] }} menunggu</p>
                        @endif
                    </div>
                    <div class="w-14 h-14 bg-teal-100 rounded-full flex items-center justify-center">
                        <svg class="w-7 h-7 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                        </svg>
                    </div>
                </div>
                <a href="{{ route('admin.ppdb.index') }}"
                    class="mt-4 inline-flex items-center text-sm font-medium text-teal-600 hover:text-teal-800 transition-colors">
                    Lihat Semua
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>

            <!-- Users Card -->
            <div
                class="bg-white rounded-xl shadow-md p-6 border-l-4 border-indigo-500 hover:shadow-lg transition-shadow duration-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 uppercase tracking-wide">Total Users</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">{{ $stats['total_users'] }}</p>
                    </div>
                    <div class="w-14 h-14 bg-indigo-100 rounded-full flex items-center justify-center">
                        <svg class="w-7 h-7 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                </div>
                <a href="{{ route('admin.users.index') }}"
                    class="mt-4 inline-flex items-center text-sm font-medium text-indigo-600 hover:text-indigo-800 transition-colors">
                    Lihat Semua
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>

            <!-- Pesan Masuk Card -->
            <div
                class="bg-white rounded-xl shadow-md p-6 border-l-4 border-yellow-500 hover:shadow-lg transition-shadow duration-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 uppercase tracking-wide">Pesan Masuk</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">{{ $stats['pesan_belum_dibaca'] }}</p>
                    </div>
                    <div class="w-14 h-14 bg-yellow-100 rounded-full flex items-center justify-center">
                        <svg class="w-7 h-7 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                        </svg>
                    </div>
                </div>
                <a href="{{ route('admin.kontak.index') }}"
                    class="mt-4 inline-flex items-center text-sm font-medium text-yellow-600 hover:text-yellow-800 transition-colors">
                    Lihat Semua
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>

        <!-- Recent Data Section -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Latest PPDB -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 bg-teal-50">
                    <div class="flex items-center justify-between">
                        <h2 class="text-lg font-semibold text-gray-900">Pendaftaran PPDB Terbaru</h2>
                        <svg class="w-5 h-5 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25z" />
                        </svg>
                    </div>
                </div>
                <div class="divide-y divide-gray-100">
                    @forelse($latestPpdb as $ppdb)
                        <div class="px-6 py-4 hover:bg-gray-50 transition-colors">
                            <div class="flex items-center justify-between">
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 truncate">
                                        {{ $ppdb->nama_lengkap ?? $ppdb->nama }}</p>
                                    <p class="text-xs text-gray-500 mt-1">{{ $ppdb->created_at->diffForHumans() }}</p>
                                </div>
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                {{ $ppdb->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : ($ppdb->status === 'diterima' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800') }}">
                                    {{ ucfirst($ppdb->status) }}
                                </span>
                            </div>
                        </div>
                    @empty
                        <div class="px-6 py-8 text-center text-gray-500 text-sm">
                            Belum ada data pendaftaran PPDB.
                        </div>
                    @endforelse
                </div>
                @if ($latestPpdb->count() > 0)
                    <div class="px-6 py-3 bg-gray-50 border-t border-gray-200">
                        <a href="{{ route('admin.ppdb.index') }}"
                            class="text-sm font-medium text-teal-600 hover:text-teal-800 transition-colors">
                            Lihat Semua &rarr;
                        </a>
                    </div>
                @endif
            </div>

            <!-- Latest Berita -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 bg-purple-50">
                    <div class="flex items-center justify-between">
                        <h2 class="text-lg font-semibold text-gray-900">Berita Terbaru</h2>
                        <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                        </svg>
                    </div>
                </div>
                <div class="divide-y divide-gray-100">
                    @forelse($latestBerita as $berita)
                        <div class="px-6 py-4 hover:bg-gray-50 transition-colors">
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate">{{ $berita->judul }}</p>
                                <div class="flex items-center mt-1 space-x-3 text-xs text-gray-500">
                                    <span>{{ $berita->created_at->diffForHumans() }}</span>
                                    @if ($berita->kategori)
                                        <span
                                            class="px-2 py-0.5 bg-purple-100 text-purple-700 rounded-full">{{ $berita->kategori->nama }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="px-6 py-8 text-center text-gray-500 text-sm">
                            Belum ada berita yang dipublikasikan.
                        </div>
                    @endforelse
                </div>
                @if ($latestBerita->count() > 0)
                    <div class="px-6 py-3 bg-gray-50 border-t border-gray-200">
                        <a href="{{ route('admin.berita.index') }}"
                            class="text-sm font-medium text-purple-600 hover:text-purple-800 transition-colors">
                            Lihat Semua &rarr;
                        </a>
                    </div>
                @endif
            </div>

            <!-- Latest Kontak Pesan -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 bg-yellow-50">
                    <div class="flex items-center justify-between">
                        <h2 class="text-lg font-semibold text-gray-900">Pesan Masuk Terbaru</h2>
                        <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                        </svg>
                    </div>
                </div>
                <div class="divide-y divide-gray-100">
                    @forelse($latestKontak as $kontak)
                        <div class="px-6 py-4 hover:bg-gray-50 transition-colors">
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate">{{ $kontak->nama }}</p>
                                <p class="text-xs text-gray-600 mt-1 truncate">{{ Str::limit($kontak->pesan, 60) }}</p>
                                <p class="text-xs text-gray-500 mt-1">{{ $kontak->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    @empty
                        <div class="px-6 py-8 text-center text-gray-500 text-sm">
                            Belum ada pesan masuk.
                        </div>
                    @endforelse
                </div>
                @if ($latestKontak->count() > 0)
                    <div class="px-6 py-3 bg-gray-50 border-t border-gray-200">
                        <a href="{{ route('admin.kontak.index') }}"
                            class="text-sm font-medium text-yellow-600 hover:text-yellow-800 transition-colors">
                            Lihat Semua &rarr;
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

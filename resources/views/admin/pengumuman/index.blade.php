@extends('layouts.admin')

@section('title', 'Manajemen Pengumuman')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Manajemen Pengumuman</h1>
            <p class="text-black mt-1">Kelola semua pengumuman sekolah</p>
        </div>
        <a href="{{ route('admin.pengumuman.create') }}"
            class="inline-flex items-center px-4 py-2.5 bg-yellow-400 hover:bg-yellow-500 text-white font-medium rounded-lg shadow-md hover:shadow-lg transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:ring-offset-2">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
            Tambah Pengumuman
        </a>
    </div>

    <!-- Search Card -->
    <div class="bg-white rounded-xl shadow-md p-6">
        <form method="GET" action="{{ route('admin.pengumuman.index') }}" class="space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Search Input -->
                <div>
                    <label for="search" class="block text-sm font-medium text-black mb-1">Cari Pengumuman</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <input type="text" name="search" id="search" value="{{ request('search') }}"
                            placeholder="Cari berdasarkan judul atau isi pengumuman..."
                            class="pl-10 block w-full rounded-lg border-gray-300 border focus:ring-yellow-400 focus:border-yellow-400 shadow-sm py-2.5 text-sm">
                    </div>
                </div>
            </div>

            <div class="flex items-center gap-3">
                <button type="submit"
                    class="inline-flex items-center px-4 py-2.5 bg-yellow-400 hover:bg-yellow-500 text-white font-medium rounded-lg shadow-sm transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:ring-offset-2">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    Cari
                </button>
                @if(request('search'))
                    <a href="{{ route('admin.pengumuman.index') }}"
                        class="inline-flex items-center px-4 py-2.5 bg-black hover:bg-gray-300 text-black font-medium rounded-lg transition-colors duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Reset
                    </a>
                @endif
            </div>
        </form>
    </div>

    <!-- Pengumuman Table Card -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <!-- Desktop Table -->
        <div class="hidden md:block overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-white">
                    <tr>
                        <th scope="col"
                            class="px-6 py-4 text-left text-xs font-semibold text-black uppercase tracking-wider">
                            No
                        </th>
                        <th scope="col"
                            class="px-6 py-4 text-left text-xs font-semibold text-black uppercase tracking-wider">
                            Judul Pengumuman
                        </th>
                        <th scope="col"
                            class="px-6 py-4 text-left text-xs font-semibold text-black uppercase tracking-wider">
                            Tanggal
                        </th>
                        <th scope="col"
                            class="px-6 py-4 text-right text-xs font-semibold text-black uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($pengumumans as $index => $pengumuman)
                        <tr class="hover:bg-white transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-black">{{ $pengumumans->firstItem() + $index }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-gray-900 line-clamp-2">{{ $pengumuman->judul }}</div>
                                <div class="text-sm text-black line-clamp-1 mt-1">{{ Str::limit($pengumuman->isi, 100) }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-black">{{ $pengumuman->tanggal->format('d M Y') }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right">
                                <div class="flex items-center justify-end space-x-2">
                                    <a href="{{ route('admin.pengumuman.edit', $pengumuman) }}"
                                        class="inline-flex items-center px-3 py-1.5 bg-yellow-400 hover:bg-yellow-500 text-white text-sm font-medium rounded-lg shadow-sm transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:ring-offset-2">
                                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                        Edit
                                    </a>

                                    <form method="POST" action="{{ route('admin.pengumuman.destroy', $pengumuman) }}"
                                        class="inline delete-form"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengumuman &quot;{{ $pengumuman->judul }}&quot;? Tindakan ini tidak dapat dibatalkan.')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="inline-flex items-center px-3 py-1.5 bg-black hover:bg-yellow-500 hover:text-black text-white text-sm font-medium rounded-lg shadow-sm transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:ring-offset-2">
                                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center">
                                <svg class="mx-auto h-12 w-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                                </svg>
                                <h3 class="mt-2 text-sm font-medium text-gray-900">Tidak ada data pengumuman</h3>
                                <p class="mt-1 text-sm text-black">Mulai dengan menambahkan pengumuman baru.</p>
                                <div class="mt-6">
                                    <a href="{{ route('admin.pengumuman.create') }}"
                                        class="inline-flex items-center px-4 py-2 bg-yellow-400 hover:bg-yellow-500 text-white text-sm font-medium rounded-lg shadow-sm transition-colors">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                        </svg>
                                        Tambah Pengumuman
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Mobile Cards -->
        <div class="md:hidden divide-y divide-gray-200">
            @forelse($pengumumans as $pengumuman)
                <div class="p-4 space-y-3">
                    <div>
                        <p class="text-sm font-medium text-gray-900 line-clamp-2">{{ $pengumuman->judul }}</p>
                        <p class="text-xs text-black mt-1">{{ $pengumuman->tanggal->format('d M Y') }}</p>
                    </div>
                    <div class="flex items-center justify-between pt-2 border-t border-gray-100">
                        <div class="flex items-center space-x-2">
                            <a href="{{ route('admin.pengumuman.edit', $pengumuman) }}"
                                class="inline-flex items-center px-3 py-1.5 bg-yellow-400 hover:bg-yellow-500 text-white text-xs font-medium rounded-lg transition-colors">
                                <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                Edit
                            </a>
                            <form method="POST" action="{{ route('admin.pengumuman.destroy', $pengumuman) }}"
                                class="inline delete-form"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengumuman &quot;{{ $pengumuman->judul }}&quot;?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="inline-flex items-center px-3 py-1.5 bg-black hover:bg-yellow-500 hover:text-black text-white text-xs font-medium rounded-lg transition-colors">
                                    <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="p-8 text-center">
                    <p class="text-sm text-black">Tidak ada data pengumuman.</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($pengumumans->hasPages())
            <div class="px-6 py-4 bg-white border-t border-gray-200">
                {{ $pengumumans->links() }}
            </div>
        @endif
    </div>
</div>
@endsection

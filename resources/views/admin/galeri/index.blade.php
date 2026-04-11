@extends('layouts.admin')

@section('title', 'Manajemen Galeri')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Manajemen Galeri</h1>
            <p class="text-gray-600 mt-1">Kelola foto dan galeri sekolah</p>
        </div>
        <a href="{{ route('admin.galeri.create') }}"
            class="inline-flex items-center px-4 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg shadow-md hover:shadow-lg transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
            Tambah Foto
        </a>
    </div>

    <!-- Filter & Search Card -->
    <div class="bg-white rounded-xl shadow-md p-6">
        <form method="GET" action="{{ route('admin.galeri.index') }}" class="space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <!-- Search Input -->
                <div class="md:col-span-2">
                    <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Cari Foto</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <input type="text" name="search" id="search" value="{{ request('search') }}"
                            placeholder="Cari berdasarkan judul foto..."
                            class="pl-10 block w-full rounded-lg border-gray-300 border focus:ring-blue-500 focus:border-blue-500 shadow-sm py-2.5 text-sm">
                    </div>
                </div>

                <!-- Kategori Filter -->
                <div>
                    <label for="kategori" class="block text-sm font-medium text-gray-700 mb-1">Filter Kategori</label>
                    <select name="kategori" id="kategori"
                        class="block w-full rounded-lg border-gray-300 border focus:ring-blue-500 focus:border-blue-500 shadow-sm py-2.5 text-sm">
                        <option value="">Semua Kategori</option>
                        @php
                            $categories = $galeris->pluck('kategori')->filter()->unique()->sort()->values();
                        @endphp
                        @foreach($categories as $cat)
                            <option value="{{ $cat }}" {{ request('kategori') === $cat ? 'selected' : '' }}>
                                {{ $cat }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="flex items-center gap-3">
                <button type="submit"
                    class="inline-flex items-center px-4 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg shadow-sm transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    Filter
                </button>
                @if(request('search') || request('kategori'))
                    <a href="{{ route('admin.galeri.index') }}"
                        class="inline-flex items-center px-4 py-2.5 bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium rounded-lg transition-colors duration-200">
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

    <!-- Galeri Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @forelse($galeris as $galeri)
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                <!-- Image -->
                <div class="relative h-48 bg-gray-100">
                    <img src="{{ asset('storage/' . $galeri->gambar) }}" alt="{{ $galeri->judul }}"
                        class="w-full h-full object-cover"
                        onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                    <div class="absolute inset-0 items-center justify-center hidden bg-gray-100">
                        <svg class="w-16 h-16 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <!-- Category Badge -->
                    @if($galeri->kategori)
                        <div class="absolute top-3 left-3">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-600 text-white bg-opacity-90">
                                {{ $galeri->kategori }}
                            </span>
                        </div>
                    @endif
                </div>

                <!-- Content -->
                <div class="p-4">
                    <h3 class="text-sm font-semibold text-gray-900 line-clamp-2 mb-2">{{ $galeri->judul }}</h3>
                    <p class="text-xs text-gray-500 mb-3">{{ $galeri->created_at->format('d M Y') }}</p>

                    <!-- Actions -->
                    <div class="flex items-center justify-between gap-2">
                        <a href="{{ route('admin.galeri.edit', $galeri) }}"
                            class="flex-1 inline-flex items-center justify-center px-3 py-2 bg-blue-600 hover:bg-blue-700 text-white text-xs font-medium rounded-lg shadow-sm transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Edit
                        </a>

                        <form method="POST" action="{{ route('admin.galeri.destroy', $galeri) }}"
                            class="inline delete-form"
                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus foto &quot;{{ $galeri->judul }}&quot;? Tindakan ini tidak dapat dibatalkan.')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="inline-flex items-center justify-center px-3 py-2 bg-red-600 hover:bg-red-700 text-white text-xs font-medium rounded-lg shadow-sm transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <!-- Empty State -->
            <div class="col-span-full">
                <div class="bg-white rounded-xl shadow-md p-12 text-center">
                    <svg class="mx-auto h-16 w-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <h3 class="mt-4 text-lg font-medium text-gray-900">Tidak ada data galeri</h3>
                    <p class="mt-2 text-sm text-gray-500">Mulai dengan menambahkan foto baru ke galeri.</p>
                    <div class="mt-6">
                        <a href="{{ route('admin.galeri.create') }}"
                            class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg shadow-sm transition-colors">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Tambah Foto
                        </a>
                    </div>
                </div>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($galeris->hasPages())
        <div class="bg-white rounded-xl shadow-md px-6 py-4">
            {{ $galeris->links() }}
        </div>
    @endif
</div>
@endsection

@push('scripts')
<script>
    document.getElementById('kategori')?.addEventListener('change', function() {
        this.closest('form').submit();
    });
</script>
@endpush

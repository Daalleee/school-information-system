@extends('layouts.admin')

@section('title', 'Pesan Masuk')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Pesan Masuk</h1>
            <p class="text-black mt-1">Kelola pesan dari pengunjung website</p>
        </div>
    </div>

    <!-- Search Card -->
    <div class="bg-white rounded-xl shadow-md p-6">
        <form method="GET" action="{{ route('admin.kontak.index') }}" class="space-y-4">
            <div class="flex flex-col sm:flex-row gap-4">
                <!-- Search Input -->
                <div class="flex-1">
                    <label for="search" class="block text-sm font-medium text-black mb-1">Cari Pesan</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <input type="text" name="search" id="search" value="{{ request('search') }}"
                            placeholder="Cari nama, email, atau isi pesan..."
                            class="pl-10 block w-full rounded-lg border-gray-300 border focus:ring-yellow-400 focus:border-yellow-400 shadow-sm py-2.5 text-sm">
                    </div>
                </div>

                <div class="flex items-end">
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2.5 bg-yellow-400 hover:bg-yellow-500 text-white font-medium rounded-lg shadow-sm transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:ring-offset-2">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        Cari
                    </button>
                    @if(request('search'))
                        <a href="{{ route('admin.kontak.index') }}"
                            class="ml-2 inline-flex items-center px-4 py-2.5 bg-black hover:bg-gray-300 text-black font-medium rounded-lg transition-colors duration-200">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            Reset
                        </a>
                    @endif
                </div>
            </div>
        </form>
    </div>

    <!-- Pesan Table Card -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <!-- Desktop Table -->
        <div class="hidden md:block overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-white">
                    <tr>
                        <th scope="col"
                            class="px-6 py-4 text-left text-xs font-semibold text-black uppercase tracking-wider">
                            Nama
                        </th>
                        <th scope="col"
                            class="px-6 py-4 text-left text-xs font-semibold text-black uppercase tracking-wider">
                            Email
                        </th>
                        <th scope="col"
                            class="px-6 py-4 text-left text-xs font-semibold text-black uppercase tracking-wider">
                            Pesan
                        </th>
                        <th scope="col"
                            class="px-6 py-4 text-left text-xs font-semibold text-black uppercase tracking-wider">
                            Status
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
                    @forelse($pesan as $p)
                        <tr class="hover:bg-white transition-colors {{ !$p->is_read ? 'bg-yellow-100' : '' }}">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <div class="h-10 w-10 rounded-full bg-yellow-100 flex items-center justify-center">
                                            <span class="text-sm font-semibold text-black">
                                                {{ strtoupper(substr($p->nama, 0, 1)) }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900 {{ !$p->is_read ? 'font-bold' : '' }}">
                                            {{ $p->nama }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-black">{{ $p->email }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-black line-clamp-2 max-w-xs">{{ Str::limit($p->pesan, 100) }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($p->is_read)
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                        <svg class="w-3.5 h-3.5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7" />
                                        </svg>
                                        Read
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-black">
                                        <svg class="w-3.5 h-3.5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                        Unread
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-black">{{ $p->created_at->format('d M Y') }}</div>
                                <div class="text-xs text-white">{{ $p->created_at->format('H:i') }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right">
                                <div class="flex items-center justify-end space-x-2">
                                    <a href="{{ route('admin.kontak.show', $p) }}"
                                        class="inline-flex items-center px-3 py-1.5 bg-yellow-400 hover:bg-yellow-500 text-white text-sm font-medium rounded-lg shadow-sm transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:ring-offset-2">
                                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        View
                                    </a>

                                    <form method="POST" action="{{ route('admin.kontak.destroy', $p) }}"
                                        class="inline delete-form"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesan dari &quot;{{ $p->nama }}&quot;? Tindakan ini tidak dapat dibatalkan.')">
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
                            <td colspan="6" class="px-6 py-12 text-center">
                                <svg class="mx-auto h-12 w-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                </svg>
                                <h3 class="mt-2 text-sm font-medium text-gray-900">Tidak ada pesan</h3>
                                <p class="mt-1 text-sm text-black">Belum ada pesan masuk dari pengunjung.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Mobile Cards -->
        <div class="md:hidden divide-y divide-gray-200">
            @forelse($pesan as $p)
                <div class="p-4 space-y-3 {{ !$p->is_read ? 'bg-yellow-100' : '' }}">
                    <div class="flex items-start justify-between">
                        <div class="flex items-start space-x-3">
                            <div class="flex-shrink-0">
                                <div class="h-10 w-10 rounded-full bg-yellow-100 flex items-center justify-center">
                                    <span class="text-sm font-semibold text-black">
                                        {{ strtoupper(substr($p->nama, 0, 1)) }}
                                    </span>
                                </div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 {{ !$p->is_read ? 'font-bold' : '' }}">{{ $p->nama }}</p>
                                <p class="text-xs text-black">{{ $p->email }}</p>
                                <p class="text-xs text-black mt-1 line-clamp-2">{{ Str::limit($p->pesan, 80) }}</p>
                            </div>
                        </div>
                        <div>
                            @if($p->is_read)
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                    Read
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-yellow-100 text-black">
                                    Unread
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="flex items-center justify-between pt-2 border-t border-gray-100">
                        <p class="text-xs text-black">{{ $p->created_at->format('d M Y, H:i') }}</p>
                        <div class="flex items-center space-x-2">
                            <a href="{{ route('admin.kontak.show', $p) }}"
                                class="inline-flex items-center px-3 py-1.5 bg-yellow-400 hover:bg-yellow-500 text-white text-xs font-medium rounded-lg transition-colors">
                                <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                View
                            </a>
                            <form method="POST" action="{{ route('admin.kontak.destroy', $p) }}"
                                class="inline delete-form"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesan dari &quot;{{ $p->nama }}&quot;?')">
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
                    <p class="text-sm text-black">Tidak ada pesan masuk.</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($pesan->hasPages())
            <div class="px-6 py-4 bg-white border-t border-gray-200">
                {{ $pesan->links() }}
            </div>
        @endif
    </div>
</div>
@endsection

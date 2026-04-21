@extends('layouts.admin')

@section('title', 'Detail Pesan')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Detail Pesan</h1>
            <p class="text-black mt-1">Pesan dari {{ $kontakPesan->nama }}</p>
        </div>
        <a href="{{ route('admin.kontak.index') }}"
            class="inline-flex items-center px-4 py-2.5 bg-black hover:bg-gray-300 text-black font-medium rounded-lg shadow-sm transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Detail Pesan -->
        <div class="lg:col-span-2 bg-white rounded-xl shadow-md overflow-hidden">
            <div class="px-6 py-5 border-b border-gray-200 bg-white">
                <div class="flex items-center justify-between">
                    <h2 class="text-lg font-semibold text-gray-900">Pesan</h2>
                    @if($kontakPesan->is_read)
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-black">
                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            Read
                        </span>
                    @else
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-black">
                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            Unread
                        </span>
                    @endif
                </div>
            </div>
            <div class="p-6">
                <!-- Sender Info -->
                <div class="flex items-start space-x-4 mb-6 pb-6 border-b border-gray-200">
                    <div class="flex-shrink-0">
                        <div class="h-14 w-14 rounded-full bg-yellow-100 flex items-center justify-center">
                            <span class="text-lg font-semibold text-black">
                                {{ strtoupper(substr($kontakPesan->nama, 0, 1)) }}
                            </span>
                        </div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <h3 class="text-lg font-medium text-gray-900">{{ $kontakPesan->nama }}</h3>
                        <div class="mt-1 space-y-1">
                            <div class="flex items-center text-sm text-black">
                                <svg class="w-4 h-4 mr-2 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                {{ $kontakPesan->email }}
                            </div>
                            <div class="flex items-center text-sm text-black">
                                <svg class="w-4 h-4 mr-2 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                {{ $kontakPesan->created_at->format('d M Y, H:i') }}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pesan Content -->
                <div>
                    <h4 class="text-sm font-semibold text-black mb-3">Isi Pesan</h4>
                    <div class="bg-white rounded-lg p-5 border border-gray-200">
                        <p class="text-sm text-black whitespace-pre-wrap leading-relaxed">{{ $kontakPesan->pesan }}</p>
                    </div>
                </div>

                <!-- Metadata -->
                <div class="mt-6 pt-6 border-t border-gray-200">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                        <div class="bg-white rounded-lg p-3">
                            <span class="text-black">Pesan diterima pada:</span>
                            <p class="mt-1 text-gray-900 font-medium">{{ $kontakPesan->created_at->format('d M Y, H:i') }}</p>
                        </div>
                        <div class="bg-white rounded-lg p-3">
                            <span class="text-black">Terakhir diperbarui:</span>
                            <p class="mt-1 text-gray-900 font-medium">{{ $kontakPesan->updated_at->format('d M Y, H:i') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Actions -->
        <div class="space-y-6">
            <!-- Status Actions -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="px-6 py-5 border-b border-gray-200 bg-white">
                    <h2 class="text-lg font-semibold text-gray-900">Aksi</h2>
                </div>
                <div class="p-6 space-y-3">
                    @if($kontakPesan->is_read)
                        <form method="POST" action="{{ route('admin.kontak.mark-unread', $kontakPesan) }}">
                            @csrf
                            @method('PATCH')
                            <button type="submit"
                                class="w-full inline-flex items-center justify-center px-4 py-2.5 bg-yellow-400 hover:bg-yellow-500 text-white font-medium rounded-lg shadow-sm transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:ring-offset-2">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                Tandai Belum Dibaca
                            </button>
                        </form>
                    @else
                        <form method="POST" action="{{ route('admin.kontak.mark-read', $kontakPesan) }}">
                            @csrf
                            @method('PATCH')
                            <button type="submit"
                                class="w-full inline-flex items-center justify-center px-4 py-2.5 bg-yellow-400 hover:bg-yellow-500 text-white font-medium rounded-lg shadow-sm transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:ring-offset-2">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Tandai Sudah Dibaca
                            </button>
                        </form>
                    @endif
                </div>
            </div>

            <!-- Delete Action -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="p-6">
                    <div class="text-center">
                        <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-yellow-100">
                            <svg class="h-6 w-6 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                        <h3 class="mt-3 text-sm font-medium text-gray-900">Hapus Pesan</h3>
                        <p class="mt-1 text-sm text-black">Tindakan ini tidak dapat dibatalkan.</p>
                        <form method="POST" action="{{ route('admin.kontak.destroy', $kontakPesan) }}"
                            class="mt-4 delete-form"
                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesan dari &quot;{{ $kontakPesan->nama }}&quot;? Tindakan ini tidak dapat dibatalkan.')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="w-full inline-flex items-center justify-center px-4 py-2.5 bg-black hover:bg-yellow-500 hover:text-black text-white font-medium rounded-lg shadow-sm transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:ring-offset-2">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                Hapus Pesan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

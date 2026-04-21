@extends('layouts.admin')

@section('title', 'Detail Pendaftar PPDB')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Detail Pendaftar PPDB</h1>
            <p class="text-black mt-1">Informasi lengkap pendaftar</p>
        </div>
        <a href="{{ route('admin.ppdb.index') }}"
            class="inline-flex items-center px-4 py-2.5 bg-black hover:bg-gray-300 text-black font-medium rounded-lg shadow-sm transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Detail Pendaftar -->
        <div class="lg:col-span-2 bg-white rounded-xl shadow-md overflow-hidden">
            <div class="px-6 py-5 border-b border-gray-200 bg-white">
                <h2 class="text-lg font-semibold text-gray-900">Informasi Pendaftar</h2>
            </div>
            <div class="p-6">
                <div class="space-y-5">
                    <!-- Nama Lengkap -->
                    <div class="flex flex-col sm:flex-row sm:items-start gap-2 pb-4 border-b border-gray-100">
                        <div class="sm:w-48 flex-shrink-0">
                            <span class="text-sm font-medium text-black">Nama Lengkap</span>
                        </div>
                        <div class="flex-1">
                            <span class="text-sm text-gray-900 font-medium">{{ $ppdb->nama_lengkap }}</span>
                        </div>
                    </div>

                    <!-- Tempat Lahir -->
                    <div class="flex flex-col sm:flex-row sm:items-start gap-2 pb-4 border-b border-gray-100">
                        <div class="sm:w-48 flex-shrink-0">
                            <span class="text-sm font-medium text-black">Tempat Lahir</span>
                        </div>
                        <div class="flex-1">
                            <span class="text-sm text-gray-900">{{ $ppdb->tempat_lahir ?? '-' }}</span>
                        </div>
                    </div>

                    <!-- Tanggal Lahir -->
                    <div class="flex flex-col sm:flex-row sm:items-start gap-2 pb-4 border-b border-gray-100">
                        <div class="sm:w-48 flex-shrink-0">
                            <span class="text-sm font-medium text-black">Tanggal Lahir</span>
                        </div>
                        <div class="flex-1">
                            <span class="text-sm text-gray-900">{{ $ppdb->tanggal_lahir ? $ppdb->tanggal_lahir->format('d F Y') : '-' }}</span>
                        </div>
                    </div>

                    <!-- Alamat -->
                    <div class="flex flex-col sm:flex-row sm:items-start gap-2 pb-4 border-b border-gray-100">
                        <div class="sm:w-48 flex-shrink-0">
                            <span class="text-sm font-medium text-black">Alamat</span>
                        </div>
                        <div class="flex-1">
                            <span class="text-sm text-gray-900">{{ $ppdb->alamat ?? '-' }}</span>
                        </div>
                    </div>

                    <!-- Asal Sekolah -->
                    <div class="flex flex-col sm:flex-row sm:items-start gap-2 pb-4 border-b border-gray-100">
                        <div class="sm:w-48 flex-shrink-0">
                            <span class="text-sm font-medium text-black">Asal Sekolah</span>
                        </div>
                        <div class="flex-1">
                            <span class="text-sm text-gray-900">{{ $ppdb->asal_sekolah ?? '-' }}</span>
                        </div>
                    </div>

                    <!-- No HP -->
                    <div class="flex flex-col sm:flex-row sm:items-start gap-2 pb-4 border-b border-gray-100">
                        <div class="sm:w-48 flex-shrink-0">
                            <span class="text-sm font-medium text-black">No. HP</span>
                        </div>
                        <div class="flex-1">
                            <span class="text-sm text-gray-900">{{ $ppdb->no_hp ?? '-' }}</span>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="flex flex-col sm:flex-row sm:items-start gap-2 pb-4 border-b border-gray-100">
                        <div class="sm:w-48 flex-shrink-0">
                            <span class="text-sm font-medium text-black">Email</span>
                        </div>
                        <div class="flex-1">
                            <span class="text-sm text-gray-900">{{ $ppdb->email ?? '-' }}</span>
                        </div>
                    </div>

                    <!-- Status -->
                    <div class="flex flex-col sm:flex-row sm:items-start gap-2">
                        <div class="sm:w-48 flex-shrink-0">
                            <span class="text-sm font-medium text-black">Status</span>
                        </div>
                        <div class="flex-1">
                            @if($ppdb->status === 'pending')
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
                                    Pending
                                </span>
                            @elseif($ppdb->status === 'diterima')
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-black">
                                    Diterima
                                </span>
                            @elseif($ppdb->status === 'ditolak')
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-black">
                                    Ditolak
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Metadata -->
                <div class="mt-8 pt-6 border-t border-gray-200 bg-white rounded-lg p-4">
                    <h3 class="text-sm font-semibold text-black mb-3">Informasi Pendaftaran</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                        <div>
                            <span class="text-black">Terdaftar pada:</span>
                            <span class="ml-2 text-gray-900 font-medium">{{ $ppdb->created_at->format('d M Y, H:i') }}</span>
                        </div>
                        <div>
                            <span class="text-black">Terakhir diperbarui:</span>
                            <span class="ml-2 text-gray-900 font-medium">{{ $ppdb->updated_at->format('d M Y, H:i') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Update Status & Actions -->
        <div class="space-y-6">
            <!-- Update Status Form -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="px-6 py-5 border-b border-gray-200 bg-white">
                    <h2 class="text-lg font-semibold text-gray-900">Update Status</h2>
                </div>
                <div class="p-6">
                    <form method="POST" action="{{ route('admin.ppdb.update-status', $ppdb) }}" class="space-y-4">
                        @csrf
                        @method('PATCH')

                        <div>
                            <label for="status" class="block text-sm font-medium text-black mb-2">
                                Status Pendaftar
                            </label>
                            <select name="status" id="status" required
                                class="block w-full rounded-lg border @error('status') border-yellow-400 @else border-gray-300 @enderror focus:ring-yellow-400 focus:border-yellow-400 shadow-sm py-2.5 text-sm @error('status') ring-2 ring-yellow-200 @enderror">
                                <option value="pending" {{ old('status', $ppdb->status) === 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="diterima" {{ old('status', $ppdb->status) === 'diterima' ? 'selected' : '' }}>Diterima</option>
                                <option value="ditolak" {{ old('status', $ppdb->status) === 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                            </select>
                            @error('status')
                                <p class="mt-2 text-sm text-black flex items-center">
                                    <svg class="w-4 h-4 mr-1.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <button type="submit"
                            class="w-full inline-flex items-center justify-center px-4 py-2.5 bg-yellow-400 hover:bg-yellow-500 text-white font-medium rounded-lg shadow-md hover:shadow-lg transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:ring-offset-2">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                            Update Status
                        </button>
                    </form>
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
                        <h3 class="mt-3 text-sm font-medium text-gray-900">Hapus Pendaftar</h3>
                        <p class="mt-1 text-sm text-black">Tindakan ini tidak dapat dibatalkan.</p>
                        <form method="POST" action="{{ route('admin.ppdb.destroy', $ppdb) }}"
                            class="mt-4 delete-form"
                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus pendaftar &quot;{{ $ppdb->nama_lengkap }}&quot;? Tindakan ini tidak dapat dibatalkan.')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="w-full inline-flex items-center justify-center px-4 py-2.5 bg-black hover:bg-yellow-500 hover:text-black text-white font-medium rounded-lg shadow-sm transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:ring-offset-2">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                Hapus Pendaftar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

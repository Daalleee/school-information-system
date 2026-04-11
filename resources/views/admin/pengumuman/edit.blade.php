@extends('layouts.admin')

@section('title', 'Edit Pengumuman')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Edit Pengumuman</h1>
            <p class="text-gray-600 mt-1">Perbarui informasi pengumuman</p>
        </div>
        <a href="{{ route('admin.pengumuman.index') }}"
            class="inline-flex items-center px-4 py-2.5 bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium rounded-lg shadow-sm transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali
        </a>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <form method="POST" action="{{ route('admin.pengumuman.update', $pengumuman) }}" class="p-6 space-y-6">
            @csrf
            @method('PUT')

            <!-- Judul Field -->
            <div>
                <label for="judul" class="block text-sm font-semibold text-gray-700 mb-2">
                    Judul Pengumuman <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                        </svg>
                    </div>
                    <input type="text" name="judul" id="judul" value="{{ old('judul', $pengumuman->judul) }}" required
                        placeholder="Masukkan judul pengumuman"
                        class="pl-10 block w-full rounded-lg border @error('judul') border-red-500 @else border-gray-300 @enderror focus:ring-blue-500 focus:border-blue-500 shadow-sm py-2.5 text-sm @error('judul') ring-2 ring-red-200 @enderror">
                </div>
                @error('judul')
                    <p class="mt-2 text-sm text-red-600 flex items-center">
                        <svg class="w-4 h-4 mr-1.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                clip-rule="evenodd" />
                        </svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Isi Field -->
            <div>
                <label for="isi" class="block text-sm font-semibold text-gray-700 mb-2">
                    Isi Pengumuman <span class="text-red-500">*</span>
                </label>
                <textarea name="isi" id="isi" rows="10" required
                    placeholder="Tulis isi pengumuman di sini..."
                    class="block w-full rounded-lg border @error('isi') border-red-500 @else border-gray-300 @enderror focus:ring-blue-500 focus:border-blue-500 shadow-sm py-2.5 text-sm @error('isi') ring-2 ring-red-200 @enderror">{{ old('isi', $pengumuman->isi) }}</textarea>
                @error('isi')
                    <p class="mt-2 text-sm text-red-600 flex items-center">
                        <svg class="w-4 h-4 mr-1.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                clip-rule="evenodd" />
                        </svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Tanggal Field -->
            <div>
                <label for="tanggal" class="block text-sm font-semibold text-gray-700 mb-2">
                    Tanggal Pengumuman <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <input type="date" name="tanggal" id="tanggal" value="{{ old('tanggal', $pengumuman->tanggal->format('Y-m-d')) }}" required
                        class="pl-10 block w-full rounded-lg border @error('tanggal') border-red-500 @else border-gray-300 @enderror focus:ring-blue-500 focus:border-blue-500 shadow-sm py-2.5 text-sm @error('tanggal') ring-2 ring-red-200 @enderror">
                </div>
                @error('tanggal')
                    <p class="mt-2 text-sm text-red-600 flex items-center">
                        <svg class="w-4 h-4 mr-1.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                clip-rule="evenodd" />
                        </svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Pengumuman Info Section -->
            <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                <h3 class="text-sm font-semibold text-gray-700 mb-3">Informasi Pengumuman</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                    <div>
                        <span class="text-gray-500">Dibuat pada:</span>
                        <span class="ml-2 text-gray-900 font-medium">{{ $pengumuman->created_at->format('d M Y, H:i') }}</span>
                    </div>
                    <div>
                        <span class="text-gray-500">Terakhir diperbarui:</span>
                        <span class="ml-2 text-gray-900 font-medium">{{ $pengumuman->updated_at->format('d M Y, H:i') }}</span>
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="flex items-center justify-end space-x-3 pt-6 border-t border-gray-200">
                <a href="{{ route('admin.pengumuman.index') }}"
                    class="inline-flex items-center px-5 py-2.5 bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium rounded-lg shadow-sm transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                    Batal
                </a>
                <button type="submit"
                    class="inline-flex items-center px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg shadow-md hover:shadow-lg transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 13l4 4L19 7" />
                    </svg>
                    Perbarui Pengumuman
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

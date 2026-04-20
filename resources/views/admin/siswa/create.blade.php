@extends('layouts.admin')

@section('title', 'Tambah Siswa')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Tambah Siswa Baru</h1>
            <p class="text-black mt-1">Isi form di bawah untuk menambahkan data siswa</p>
        </div>
        <a href="{{ route('admin.siswa.index') }}"
            class="inline-flex items-center px-4 py-2.5 bg-black hover:bg-gray-300 text-black font-medium rounded-lg shadow-sm transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali
        </a>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <form method="POST" action="{{ route('admin.siswa.store') }}" enctype="multipart/form-data" class="p-6 space-y-6">
            @csrf

            <!-- Nama Field -->
            <div>
                <label for="nama" class="block text-sm font-semibold text-black mb-2">
                    Nama Lengkap <span class="text-black">*</span>
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <input type="text" name="nama" id="nama" value="{{ old('nama') }}" required
                        placeholder="Masukkan nama lengkap siswa"
                        class="pl-10 block w-full rounded-lg border @error('nama') border-yellow-400 @else border-gray-300 @enderror focus:ring-yellow-400 focus:border-yellow-400 shadow-sm py-2.5 text-sm @error('nama') ring-2 ring-yellow-200 @enderror">
                </div>
                @error('nama')
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

            <!-- NIS Field -->
            <div>
                <label for="nis" class="block text-sm font-semibold text-black mb-2">
                    NIS <span class="text-white font-normal">(opsional)</span>
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                        </svg>
                    </div>
                    <input type="text" name="nis" id="nis" value="{{ old('nis') }}"
                        placeholder="Masukkan Nomor Induk Siswa"
                        class="pl-10 block w-full rounded-lg border @error('nis') border-yellow-400 @else border-gray-300 @enderror focus:ring-yellow-400 focus:border-yellow-400 shadow-sm py-2.5 text-sm @error('nis') ring-2 ring-yellow-200 @enderror">
                </div>
                @error('nis')
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

            <!-- Jenis Kelamin Field -->
            <div>
                <label class="block text-sm font-semibold text-black mb-3">
                    Jenis Kelamin <span class="text-black">*</span>
                </label>
                <div class="flex items-center space-x-6">
                    <label class="inline-flex items-center cursor-pointer">
                        <input type="radio" name="jenis_kelamin" value="L"
                            {{ old('jenis_kelamin') === 'L' ? 'checked' : '' }} required
                            class="form-radio h-4 w-4 text-black border-gray-300 focus:ring-yellow-400">
                        <span class="ml-2 text-sm text-black">
                            <svg class="w-5 h-5 inline-block mr-1 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4" />
                            </svg>
                            Laki-laki
                        </span>
                    </label>
                    <label class="inline-flex items-center cursor-pointer">
                        <input type="radio" name="jenis_kelamin" value="P"
                            {{ old('jenis_kelamin') === 'P' ? 'checked' : '' }}
                            class="form-radio h-4 w-4 text-black border-gray-300 focus:ring-yellow-400">
                        <span class="ml-2 text-sm text-black">
                            <svg class="w-5 h-5 inline-block mr-1 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4" />
                            </svg>
                            Perempuan
                        </span>
                    </label>
                </div>
                @error('jenis_kelamin')
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

            <!-- Kelas Field -->
            <div>
                <label for="kelas" class="block text-sm font-semibold text-black mb-2">
                    Kelas <span class="text-black">*</span>
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <input type="text" name="kelas" id="kelas" value="{{ old('kelas') }}" required
                        placeholder="Contoh: X-A, XI IPA 1, XII IPS 2"
                        class="pl-10 block w-full rounded-lg border @error('kelas') border-yellow-400 @else border-gray-300 @enderror focus:ring-yellow-400 focus:border-yellow-400 shadow-sm py-2.5 text-sm @error('kelas') ring-2 ring-yellow-200 @enderror">
                </div>
                @error('kelas')
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

            <!-- Alamat Field -->
            <div>
                <label for="alamat" class="block text-sm font-semibold text-black mb-2">
                    Alamat <span class="text-white font-normal">(opsional)</span>
                </label>
                <div class="relative">
                    <div class="absolute top-3 left-3 flex items-start pointer-events-none">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <textarea name="alamat" id="alamat" rows="3"
                        placeholder="Masukkan alamat lengkap siswa"
                        class="pl-10 block w-full rounded-lg border @error('alamat') border-yellow-400 @else border-gray-300 @enderror focus:ring-yellow-400 focus:border-yellow-400 shadow-sm py-2.5 text-sm @error('alamat') ring-2 ring-yellow-200 @enderror">{{ old('alamat') }}</textarea>
                </div>
                @error('alamat')
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

            <!-- Foto Field -->
            <div>
                <label class="block text-sm font-semibold text-black mb-2">
                    Foto <span class="text-white font-normal">(opsional)</span>
                </label>
                <div class="flex items-start space-x-6">
                    <div class="flex-shrink-0">
                        <div id="fotoPreview" class="h-32 w-32 rounded-lg bg-white border-2 border-dashed border-gray-300 flex items-center justify-center overflow-hidden">
                            <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center justify-center w-full">
                            <label for="foto"
                                class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-white hover:bg-white transition-colors">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                    </svg>
                                    <p class="mb-2 text-sm text-black"><span class="font-semibold">Klik untuk upload</span> atau drag & drop</p>
                                    <p class="text-xs text-black">PNG, JPG, JPEG (Maks. 2MB)</p>
                                </div>
                                <input id="foto" name="foto" type="file" accept="image/*" class="hidden"
                                    onchange="previewFoto(this)">
                            </label>
                        </div>
                    </div>
                </div>
                @error('foto')
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

            <!-- Form Actions -->
            <div class="flex items-center justify-end space-x-3 pt-6 border-t border-gray-200">
                <a href="{{ route('admin.siswa.index') }}"
                    class="inline-flex items-center px-5 py-2.5 bg-black hover:bg-gray-300 text-black font-medium rounded-lg shadow-sm transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                    Batal
                </a>
                <button type="submit"
                    class="inline-flex items-center px-5 py-2.5 bg-yellow-400 hover:bg-yellow-500 text-black font-medium rounded-lg shadow-md hover:shadow-lg transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:ring-offset-2">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 13l4 4L19 7" />
                    </svg>
                    Simpan Siswa
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function previewFoto(input) {
        const preview = document.getElementById('fotoPreview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.innerHTML = '<img src="' + e.target.result + '" class="h-full w-full object-cover rounded-lg" alt="Preview Foto">';
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endpush

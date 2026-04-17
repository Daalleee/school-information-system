@extends('layouts.admin')

@section('title', 'Edit Guru')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Edit Guru</h1>
            <p class="text-black mt-1">Perbarui informasi guru</p>
        </div>
        <a href="{{ route('admin.guru.index') }}"
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
        <form method="POST" action="{{ route('admin.guru.update', $guru) }}" enctype="multipart/form-data" class="p-6 space-y-6">
            @csrf
            @method('PUT')

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
                    <input type="text" name="nama" id="nama" value="{{ old('nama', $guru->nama) }}" required
                        placeholder="Masukkan nama lengkap guru"
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

            <!-- NIP Field -->
            <div>
                <label for="nip" class="block text-sm font-semibold text-black mb-2">
                    NIP <span class="text-white font-normal">(opsional)</span>
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                        </svg>
                    </div>
                    <input type="text" name="nip" id="nip" value="{{ old('nip', $guru->nip) }}"
                        placeholder="Masukkan Nomor Induk Pegawai"
                        class="pl-10 block w-full rounded-lg border @error('nip') border-yellow-400 @else border-gray-300 @enderror focus:ring-yellow-400 focus:border-yellow-400 shadow-sm py-2.5 text-sm @error('nip') ring-2 ring-yellow-200 @enderror">
                </div>
                @error('nip')
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
                            {{ old('jenis_kelamin', $guru->jenis_kelamin) === 'L' ? 'checked' : '' }} required
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
                            {{ old('jenis_kelamin', $guru->jenis_kelamin) === 'P' ? 'checked' : '' }}
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

            <!-- Mata Pelajaran Field -->
            <div>
                <label for="mata_pelajaran" class="block text-sm font-semibold text-black mb-2">
                    Mata Pelajaran <span class="text-black">*</span>
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M12 14l9-5-9-5-9 5 9 5z" />
                            <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                        </svg>
                    </div>
                    <input type="text" name="mata_pelajaran" id="mata_pelajaran" value="{{ old('mata_pelajaran', $guru->mata_pelajaran) }}" required
                        placeholder="Contoh: Matematika, Fisika, Bahasa Indonesia"
                        class="pl-10 block w-full rounded-lg border @error('mata_pelajaran') border-yellow-400 @else border-gray-300 @enderror focus:ring-yellow-400 focus:border-yellow-400 shadow-sm py-2.5 text-sm @error('mata_pelajaran') ring-2 ring-yellow-200 @enderror">
                </div>
                @error('mata_pelajaran')
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
                            @if($guru->foto)
                                <img id="previewImg" src="{{ asset('storage/' . $guru->foto) }}" alt="Foto {{ $guru->nama }}"
                                    class="h-full w-full object-cover rounded-lg">
                            @else
                                <svg id="previewPlaceholder" class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            @endif
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
                                    @if($guru->foto)
                                        <p class="mt-2 text-xs text-black">Foto saat ini akan diganti jika upload baru.</p>
                                    @endif
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

            <!-- Guru Info Section -->
            <div class="bg-white rounded-lg p-4 border border-gray-200">
                <h3 class="text-sm font-semibold text-black mb-3">Informasi Guru</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                    <div>
                        <span class="text-black">Dibuat pada:</span>
                        <span class="ml-2 text-gray-900 font-medium">{{ $guru->created_at->format('d M Y, H:i') }}</span>
                    </div>
                    <div>
                        <span class="text-black">Terakhir diperbarui:</span>
                        <span class="ml-2 text-gray-900 font-medium">{{ $guru->updated_at->format('d M Y, H:i') }}</span>
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="flex items-center justify-end space-x-3 pt-6 border-t border-gray-200">
                <a href="{{ route('admin.guru.index') }}"
                    class="inline-flex items-center px-5 py-2.5 bg-black hover:bg-gray-300 text-black font-medium rounded-lg shadow-sm transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                    Batal
                </a>
                <button type="submit"
                    class="inline-flex items-center px-5 py-2.5 bg-yellow-400 hover:bg-yellow-500 text-black font-medium rounded-lg shadow-md hover:shadow-lg transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:ring-offset-2">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 13l4 4L19 7" />
                    </svg>
                    Perbarui Guru
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

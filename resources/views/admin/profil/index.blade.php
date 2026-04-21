@extends('layouts.admin')

@section('title', 'Profil Sekolah')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Profil Sekolah</h1>
            <p class="text-black mt-1">Kelola informasi profil sekolah</p>
        </div>
    </div>

    @if(!$profil)
        <!-- Alert if no profile data -->
        <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-6">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-yellow-800">Data profil belum tersedia</h3>
                    <div class="mt-2 text-sm text-yellow-700">
                        <p>Silakan hubungi administrator untuk menginisialisasi data profil sekolah.</p>
                    </div>
                </div>
            </div>
        </div>
    @else
        <!-- Form Card -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <form method="POST" action="{{ route('admin.profil.update') }}" enctype="multipart/form-data" class="p-6 space-y-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Left Column -->
                    <div class="space-y-6">
                        <!-- Nama Sekolah -->
                        <div>
                            <label for="nama_sekolah" class="block text-sm font-semibold text-black mb-2">
                                Nama Sekolah <span class="text-black">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                </div>
                                <input type="text" name="nama_sekolah" id="nama_sekolah"
                                    value="{{ old('nama_sekolah', $profil->nama_sekolah) }}" required
                                    placeholder="Nama sekolah"
                                    class="pl-10 block w-full rounded-lg border @error('nama_sekolah') border-yellow-400 @else border-gray-300 @enderror focus:ring-yellow-400 focus:border-yellow-400 shadow-sm py-2.5 text-sm @error('nama_sekolah') ring-2 ring-yellow-200 @enderror">
                            </div>
                            @error('nama_sekolah')
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

                        <!-- Alamat -->
                        <div>
                            <label for="alamat" class="block text-sm font-semibold text-black mb-2">
                                Alamat <span class="text-black">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute top-3 left-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                                <textarea name="alamat" id="alamat" rows="3" required
                                    placeholder="Alamat lengkap sekolah"
                                    class="pl-10 block w-full rounded-lg border @error('alamat') border-yellow-400 @else border-gray-300 @enderror focus:ring-yellow-400 focus:border-yellow-400 shadow-sm py-2.5 text-sm @error('alamat') ring-2 ring-yellow-200 @enderror">{{ old('alamat', $profil->alamat) }}</textarea>
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

                        <!-- Telepon -->
                        <div>
                            <label for="telepon" class="block text-sm font-semibold text-black mb-2">
                                Telepon <span class="text-black">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                </div>
                                <input type="text" name="telepon" id="telepon"
                                    value="{{ old('telepon', $profil->telepon) }}" required
                                    placeholder="Nomor telepon"
                                    class="pl-10 block w-full rounded-lg border @error('telepon') border-yellow-400 @else border-gray-300 @enderror focus:ring-yellow-400 focus:border-yellow-400 shadow-sm py-2.5 text-sm @error('telepon') ring-2 ring-yellow-200 @enderror">
                            </div>
                            @error('telepon')
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

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-semibold text-black mb-2">
                                Email <span class="text-black">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <input type="email" name="email" id="email"
                                    value="{{ old('email', $profil->email) }}" required
                                    placeholder="Email sekolah"
                                    class="pl-10 block w-full rounded-lg border @error('email') border-yellow-400 @else border-gray-300 @enderror focus:ring-yellow-400 focus:border-yellow-400 shadow-sm py-2.5 text-sm @error('email') ring-2 ring-yellow-200 @enderror">
                            </div>
                            @error('email')
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
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-6">
                        <!-- Logo Upload -->
                        <div>
                            <label class="block text-sm font-semibold text-black mb-2">
                                Logo Sekolah <span class="text-white font-normal">(opsional)</span>
                            </label>
                            <div class="flex items-start space-x-6">
                                <div class="flex-shrink-0">
                                    <div id="logoPreview" class="h-32 w-32 rounded-lg bg-white border-2 border-dashed border-gray-300 flex items-center justify-center overflow-hidden">
                                        @if($profil->logo)
                                            <img id="previewImg" src="{{ asset('storage/images/sekolah/' . $profil->logo) }}" alt="Logo Sekolah"
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
                                        <label for="logo"
                                            class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-white hover:bg-white transition-colors">
                                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                <svg class="w-8 h-8 mb-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                                </svg>
                                                <p class="mb-2 text-sm text-black"><span class="font-semibold">Klik untuk upload</span> atau drag & drop</p>
                                                <p class="text-xs text-black">PNG, JPG, JPEG (Maks. 2MB)</p>
                                                @if($profil->logo)
                                                    <p class="mt-2 text-xs text-black">Logo saat ini akan diganti jika upload baru.</p>
                                                @endif
                                            </div>
                                            <input id="logo" name="logo" type="file" accept="image/*" class="hidden"
                                                onchange="previewLogo(this)">
                                        </label>
                                    </div>
                                </div>
                            </div>
                            @error('logo')
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

                        <!-- Deskripsi -->
                        <div>
                            <label for="deskripsi" class="block text-sm font-semibold text-black mb-2">
                                Deskripsi <span class="text-black">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute top-3 left-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 6h16M4 12h16M4 18h7" />
                                    </svg>
                                </div>
                                <textarea name="deskripsi" id="deskripsi" rows="4" required
                                    placeholder="Deskripsi singkat tentang sekolah"
                                    class="pl-10 block w-full rounded-lg border @error('deskripsi') border-yellow-400 @else border-gray-300 @enderror focus:ring-yellow-400 focus:border-yellow-400 shadow-sm py-2.5 text-sm @error('deskripsi') ring-2 ring-yellow-200 @enderror">{{ old('deskripsi', $profil->deskripsi) }}</textarea>
                            </div>
                            @error('deskripsi')
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

                        <!-- Visi -->
                        <div>
                            <label for="visi" class="block text-sm font-semibold text-black mb-2">
                                Visi <span class="text-black">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute top-3 left-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </div>
                                <textarea name="visi" id="visi" rows="4" required
                                    placeholder="Visi sekolah"
                                    class="pl-10 block w-full rounded-lg border @error('visi') border-yellow-400 @else border-gray-300 @enderror focus:ring-yellow-400 focus:border-yellow-400 shadow-sm py-2.5 text-sm @error('visi') ring-2 ring-yellow-200 @enderror">{{ old('visi', $profil->visi) }}</textarea>
                            </div>
                            @error('visi')
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

                        <!-- Misi -->
                        <div>
                            <label for="misi" class="block text-sm font-semibold text-black mb-2">
                                Misi <span class="text-black">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute top-3 left-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                    </svg>
                                </div>
                                <textarea name="misi" id="misi" rows="5" required
                                    placeholder="Misi sekolah (gunakan baris baru untuk setiap poin)"
                                    class="pl-10 block w-full rounded-lg border @error('misi') border-yellow-400 @else border-gray-300 @enderror focus:ring-yellow-400 focus:border-yellow-400 shadow-sm py-2.5 text-sm @error('misi') ring-2 ring-yellow-200 @enderror">{{ old('misi', $profil->misi) }}</textarea>
                            </div>
                            @error('misi')
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
                    </div>
                </div>

                <!-- Last Updated Info -->
                <div class="bg-white rounded-lg p-4 border border-gray-200">
                    <h3 class="text-sm font-semibold text-black mb-3">Informasi Profil</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                        <div>
                            <span class="text-black">Terakhir diperbarui:</span>
                            <span class="ml-2 text-gray-900 font-medium">{{ $profil->updated_at->format('d M Y, H:i') }}</span>
                        </div>
                        <div>
                            <span class="text-black">Dibuat pada:</span>
                            <span class="ml-2 text-gray-900 font-medium">{{ $profil->created_at->format('d M Y, H:i') }}</span>
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="flex items-center justify-end space-x-3 pt-6 border-t border-gray-200">
                    <button type="submit"
                        class="inline-flex items-center px-5 py-2.5 bg-yellow-400 hover:bg-yellow-500 text-white font-medium rounded-lg shadow-md hover:shadow-lg transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:ring-offset-2">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 13l4 4L19 7" />
                        </svg>
                        Update Profil Sekolah
                    </button>
                </div>
            </form>
        </div>
    @endif
</div>
@endsection

@push('scripts')
<script>
    function previewLogo(input) {
        const preview = document.getElementById('logoPreview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.innerHTML = '<img id="previewImg" src="' + e.target.result + '" class="h-full w-full object-cover rounded-lg" alt="Preview Logo">';
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endpush

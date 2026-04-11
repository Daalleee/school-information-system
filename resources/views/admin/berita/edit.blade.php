@extends('layouts.admin')

@section('title', 'Edit Berita')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Edit Berita</h1>
            <p class="text-gray-600 mt-1">Perbarui informasi berita</p>
        </div>
        <a href="{{ route('admin.berita.index') }}"
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
        <form method="POST" action="{{ route('admin.berita.update', $berita) }}" enctype="multipart/form-data" class="p-6 space-y-6">
            @csrf
            @method('PUT')

            <!-- Judul Field -->
            <div>
                <label for="judul" class="block text-sm font-semibold text-gray-700 mb-2">
                    Judul Berita <span class="text-red-500">*</span>
                </label>
                <div class="flex gap-2">
                    <div class="relative flex-1">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                            </svg>
                        </div>
                        <input type="text" name="judul" id="judul" value="{{ old('judul', $berita->judul) }}" required
                            placeholder="Masukkan judul berita"
                            class="pl-10 block w-full rounded-lg border @error('judul') border-red-500 @else border-gray-300 @enderror focus:ring-blue-500 focus:border-blue-500 shadow-sm py-2.5 text-sm @error('judul') ring-2 ring-red-200 @enderror">
                    </div>
                    <button type="button" id="generateSlug"
                        class="inline-flex items-center px-4 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg shadow-sm transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 whitespace-nowrap">
                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                        </svg>
                        Generate Slug
                    </button>
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

            <!-- Slug Field -->
            <div>
                <label for="slug" class="block text-sm font-semibold text-gray-700 mb-2">
                    Slug <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                        </svg>
                    </div>
                    <input type="text" name="slug" id="slug" value="{{ old('slug', $berita->slug) }}" required
                        placeholder="slug-berita"
                        class="pl-10 block w-full rounded-lg border @error('slug') border-red-500 @else border-gray-300 @enderror focus:ring-blue-500 focus:border-blue-500 shadow-sm py-2.5 text-sm @error('slug') ring-2 ring-red-200 @enderror">
                </div>
                @error('slug')
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
                    Isi Berita <span class="text-red-500">*</span>
                </label>
                <textarea name="isi" id="isi" rows="12" required
                    placeholder="Tulis isi berita di sini..."
                    class="block w-full rounded-lg border @error('isi') border-red-500 @else border-gray-300 @enderror focus:ring-blue-500 focus:border-blue-500 shadow-sm py-2.5 text-sm @error('isi') ring-2 ring-red-200 @enderror">{{ old('isi', $berita->isi) }}</textarea>
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

            <!-- Foto Field -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Foto Berita <span class="text-gray-400 font-normal">(opsional)</span>
                </label>
                <div class="flex items-start space-x-6">
                    <div class="flex-shrink-0">
                        <div id="fotoPreview" class="h-32 w-48 rounded-lg bg-gray-100 border-2 border-dashed border-gray-300 flex items-center justify-center overflow-hidden">
                            @if($berita->foto)
                                <img id="previewImg" src="{{ asset('storage/' . $berita->foto) }}" alt="Foto {{ $berita->judul }}"
                                    class="h-full w-full object-cover rounded-lg">
                            @else
                                <svg id="previewPlaceholder" class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            @endif
                        </div>
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center justify-center w-full">
                            <label for="foto"
                                class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition-colors">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Klik untuk upload</span> atau drag & drop</p>
                                    <p class="text-xs text-gray-500">PNG, JPG, JPEG (Maks. 2MB)</p>
                                    @if($berita->foto)
                                        <p class="mt-2 text-xs text-blue-600">Foto saat ini akan diganti jika upload baru.</p>
                                    @endif
                                </div>
                                <input id="foto" name="foto" type="file" accept="image/*" class="hidden"
                                    onchange="previewFoto(this)">
                            </label>
                        </div>
                    </div>
                </div>
                @error('foto')
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

            <!-- Kategori Field -->
            <div>
                <label for="kategori_id" class="block text-sm font-semibold text-gray-700 mb-2">
                    Kategori Berita
                </label>
                <div class="relative">
                    <select name="kategori_id" id="kategori_id"
                        class="block w-full rounded-lg border @error('kategori_id') border-red-500 @else border-gray-300 @enderror focus:ring-blue-500 focus:border-blue-500 shadow-sm py-2.5 text-sm @error('kategori_id') ring-2 ring-red-200 @enderror">
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($kategoris as $kategori)
                            <option value="{{ $kategori->id }}" {{ old('kategori_id', $berita->kategori_id) == $kategori->id ? 'selected' : '' }}>
                                {{ $kategori->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                </div>
                @error('kategori_id')
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

            <!-- Hidden User ID -->
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

            <!-- Berita Info Section -->
            <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                <h3 class="text-sm font-semibold text-gray-700 mb-3">Informasi Berita</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                    <div>
                        <span class="text-gray-500">Dibuat pada:</span>
                        <span class="ml-2 text-gray-900 font-medium">{{ $berita->created_at->format('d M Y, H:i') }}</span>
                    </div>
                    <div>
                        <span class="text-gray-500">Terakhir diperbarui:</span>
                        <span class="ml-2 text-gray-900 font-medium">{{ $berita->updated_at->format('d M Y, H:i') }}</span>
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="flex items-center justify-end space-x-3 pt-6 border-t border-gray-200">
                <a href="{{ route('admin.berita.index') }}"
                    class="inline-flex items-center px-5 py-2.5 bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium rounded-lg shadow-sm transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                    Batal
                </a>
                <button type="submit"
                    class="inline-flex items-center px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg shadow-md hover:shadow-lg transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 13l4 4L19 7" />
                    </svg>
                    Perbarui Berita
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

    // Generate slug from judul
    document.getElementById('generateSlug')?.addEventListener('click', function() {
        const judul = document.getElementById('judul').value;

        if (!judul) {
            alert('Silakan isi judul terlebih dahulu.');
            return;
        }

        this.disabled = true;
        this.innerHTML = '<svg class="animate-spin w-4 h-4 mr-1.5" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> Generating...';

        fetch('{{ route('admin.berita.generate-slug') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ judul: judul })
        })
        .then(response => response.json())
        .then(data => {
            document.getElementById('slug').value = data.slug;
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Gagal generate slug. Silakan coba lagi.');
        })
        .finally(() => {
            this.disabled = false;
            this.innerHTML = '<svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" /></svg> Generate Slug';
        });
    });
</script>
@endpush

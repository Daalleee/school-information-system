@extends('layouts.admin')

@section('title', 'Tambah Halaman')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Tambah Halaman Baru</h1>
            <p class="text-black mt-1">Buat halaman statis baru untuk website sekolah</p>
        </div>
        <a href="{{ route('admin.halaman.index') }}"
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
        <form method="POST" action="{{ route('admin.halaman.store') }}" class="p-6 space-y-6">
            @csrf

            <!-- Judul Field -->
            <div>
                <label for="judul" class="block text-sm font-semibold text-black mb-2">
                    Judul Halaman <span class="text-black">*</span>
                </label>
                <div class="flex gap-2">
                    <div class="relative flex-1">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                            </svg>
                        </div>
                        <input type="text" name="judul" id="judul" value="{{ old('judul') }}" required
                            placeholder="Masukkan judul halaman"
                            class="pl-10 block w-full rounded-lg border @error('judul') border-yellow-400 @else border-gray-300 @enderror focus:ring-yellow-400 focus:border-yellow-400 shadow-sm py-2.5 text-sm @error('judul') ring-2 ring-yellow-200 @enderror">
                    </div>
                    <button type="button" id="generateSlug"
                        class="inline-flex items-center px-4 py-2.5 bg-yellow-400 hover:bg-yellow-500 text-black text-sm font-medium rounded-lg shadow-sm transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:ring-offset-2 whitespace-nowrap">
                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                        </svg>
                        Generate Slug
                    </button>
                </div>
                @error('judul')
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

            <!-- Slug Field -->
            <div>
                <label for="slug" class="block text-sm font-semibold text-black mb-2">
                    Slug <span class="text-white font-normal">(opsional - akan di-generate otomatis jika kosong)</span>
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                        </svg>
                    </div>
                    <input type="text" name="slug" id="slug" value="{{ old('slug') }}"
                        placeholder="slug-halaman (opsional)"
                        class="pl-10 block w-full rounded-lg border @error('slug') border-yellow-400 @else border-gray-300 @enderror focus:ring-yellow-400 focus:border-yellow-400 shadow-sm py-2.5 text-sm @error('slug') ring-2 ring-yellow-200 @enderror">
                </div>
                @error('slug')
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

            <!-- Konten Field -->
            <div>
                <label for="konten" class="block text-sm font-semibold text-black mb-2">
                    Konten Halaman <span class="text-black">*</span>
                </label>
                <textarea name="konten" id="konten" rows="16" required
                    placeholder="Tulis konten halaman di sini..."
                    class="block w-full rounded-lg border @error('konten') border-yellow-400 @else border-gray-300 @enderror focus:ring-yellow-400 focus:border-yellow-400 shadow-sm py-2.5 text-sm @error('konten') ring-2 ring-yellow-200 @enderror">{{ old('konten') }}</textarea>
                @error('konten')
                    <p class="mt-2 text-sm text-black flex items-center">
                        <svg class="w-4 h-4 mr-1.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                clip-rule="evenodd" />
                        </svg>
                        {{ $message }}
                    </p>
                @enderror
                <p class="mt-2 text-xs text-black">
                    Tip: Anda dapat menggunakan tag HTML untuk memformat konten.
                </p>
            </div>

            <!-- Form Actions -->
            <div class="flex items-center justify-end space-x-3 pt-6 border-t border-gray-200">
                <a href="{{ route('admin.halaman.index') }}"
                    class="inline-flex items-center px-5 py-2.5 bg-black hover:bg-gray-300 text-black font-medium rounded-lg shadow-sm transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                    Batal
                </a>
                <button type="submit"
                    class="inline-flex items-center px-5 py-2.5 bg-yellow-400 hover:bg-yellow-500 text-black font-medium rounded-lg shadow-md hover:shadow-lg transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:ring-offset-2">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 13l4 4L19 7" />
                    </svg>
                    Simpan Halaman
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Generate slug from judul
    document.getElementById('generateSlug')?.addEventListener('click', function() {
        const judul = document.getElementById('judul').value;

        if (!judul) {
            alert('Silakan isi judul terlebih dahulu.');
            return;
        }

        this.disabled = true;
        this.innerHTML = '<svg class="animate-spin w-4 h-4 mr-1.5" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> Generating...';

        fetch('{{ route('admin.halaman.generate-slug') }}', {
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

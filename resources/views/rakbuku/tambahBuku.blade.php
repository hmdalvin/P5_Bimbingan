<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <a class="underline text-sm ml-3 text-gray-600 hover:text-gray-900" href="{{  route('rakbuku.index') }}">
            {{ __('Kembali') }}
        </a>

        <form method="POST" action="{{ route('rakbuku.store') }}" enctype="multipart/form-data">
            @csrf
            <x-label class="text-3xl text-center mb-3" for="email" :value="__('Tambah Buku')" />
            <!-- Nama Buku -->
            <div>
                <x-label for="email" :value="__('Nama Buku')" />

                <x-input class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="buku" :value="old('buku')"/>
            </div>

            <!-- Tahun Terbit -->
            <div>
                <x-label class="mt-3" for="email" :value="__('Tahun Terbit')" />

                <x-input class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="tahun" :value="old('tahun')"/>
            </div>

            <!-- Jenis Buku -->
            <div>
                <x-label class="mt-3" for="email" :value="__('Jenis Buku')" />

                <select class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="jenis">
                    <option value="1">Sejarah</option>
                    <option value="2">Novel</option>
                    <option value="3">Teknologi</option>
                </select>
            </div>

            <!-- Upload Gambar -->
            <div>
                <x-label class="mt-3" for="email" :value="__('Upload Gambar')" />

                <x-input class="block mt-1 w-full" type="file" name="gambar"/>
            </div>

            <div class="flex items-center justify-end mt-4">

                <x-button class="ml-3">
                    {{ __('Simpan Data') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>

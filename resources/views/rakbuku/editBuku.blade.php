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

        <form method="POST" action="{{ url('rakbuku/'. $editbuku->id) }}" enctype="multipart/form-data">
            @csrf
            <!-- Email Address -->
            <x-label class="text-3xl text-center mb-3" for="email" :value="__('Edit Buku')" />
            <input type="hidden" name="_method" value="patch">
            <div>
                <x-label class="mt-3" for="email" :value="__('Nama Buku')" />

                <x-input class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" value="{{ $editbuku->nama_buku }}" name="buku"/>
            </div>

            <!-- Email Address -->
            <div>
                <x-label class="mt-3" for="email" :value="__('Tahun Terbit')" />

                <x-input class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" value="{{ $editbuku->tahun_terbit }}" name="tahun"/>
            </div>

            <!-- Email Address -->
            <div>
                <x-label class="mt-3" for="email" :value="__('Jenis Buku')" />

                <select class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="jenis">
                    <option value="1">Sejarah</option>
                    <option value="2">Novel</option>
                    <option value="3">Teknologi</option>
                </select>
            </div>

            <!-- Email Address -->
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

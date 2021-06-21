<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Buku Perpustakaan') }}
        </h2>
    </x-slot>

    <div class="py-7">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="table data  w-full ">
                        <a href="{{ route('rakbuku.create') }}"
                            class="block w-full font-medium no-underline text-sm text-grey-dark hover:text-grey-darker">{{ __('Tambah Data') }}</a>
                        <table class=" table-auto border-collapse border border-gray-800 container mx-auto m-2">
                            <thead>
                                <tr>
                                    <th class="border border-gray-800 bg-gray-800 p-2 text-white font-medium">No</th>
                                    <th class="border border-gray-800 bg-gray-800 p-2 text-white font-medium">Id Rak
                                        Buku</th>
                                    <th class="border border-gray-800 bg-gray-800 p-2 text-white font-medium">Nama Buku
                                    </th>
                                    <th class="border border-gray-800 bg-gray-800 p-2 text-white font-medium">Tahun
                                        Terbit</th>
                                    <th class="border border-gray-800 bg-gray-800 p-2 text-white font-medium">Jenis Buku
                                    </th>
                                    <th class="border border-gray-800 bg-gray-800 p-2 text-white font-medium">Upload
                                        Image</th>
                                    <th class="border border-gray-800 bg-gray-800 p-2 text-white font-medium">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($rakbuku as $buku)

                                    <tr>
                                        <th class="border border-gray-800 p-2 text-gray-800 font-medium">
                                            {{ $no++ }}</th>
                                        <th class="border border-gray-800 p-2 text-gray-800 font-medium">
                                            {{ $buku->idRak }}</th>
                                        <th class="border border-gray-800 p-2 text-gray-800 font-medium">
                                            {{ $buku->nama_buku }}</th>
                                        <th class="border border-gray-800 p-2 text-gray-800 font-medium">
                                            {{ $buku->tahun_terbit }}</th>
                                        <th class="border border-gray-800 p-2 text-gray-800 font-medium">
                                            {{ $buku->jenis_buku }}</th>
                                        <td class="border border-gray-800 p-2 text-gray-800 font-medium"><img
                                                width="80px" src="{{ URL::asset('/images/' . $buku->gambar_buku) }}" />
                                            </th>
                                        <th class="border border-gray-800 p-2 text-gray-800 font-medium">
                                            <a href="{{ url('rakbuku/' . $buku->idBuku . '/edit') }}">Edit</a>
                                            <form action="{{ url('rakbuku/' . $buku->idBuku) }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="_method" value="delete">
                                                <x-button type="submmit" class="ml-3">{{ __('Hapus') }}</x-button>
                                            </form>
                                        </th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

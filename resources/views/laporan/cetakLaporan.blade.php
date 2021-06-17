<head>
    <meta name="viewport" content="width=device-width,
    initial-scale=1" />
    <style>
        table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
            border: 1px solid #ddd;
        }

        thead {
            background-color: #f2f2f2;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .tambah {
            padding: 8px 16px;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div style="overflow-x: auto">
        <br />
        <center>
            <h2>Data Buku Perpustakaan Bangsa</h2>
        </center>
        <br />
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Rak</th>
                    <th>Nama Buku</th>
                    <th>Tahun Terbit</th>
                    <th>Jenis Buku</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1 ?>
                @foreach ($rakbuku as $buku)
                <tr>
                    <th class="
                            border border-gray-800
                            p-2
                            text-gray-800
                            font-medium
                        ">
                        {{ $no++ }}
                    </th>
                    <th class="
                            border border-gray-800
                            p-2
                            text-gray-800
                            font-medium
                        ">
                        {{ $buku->idRak }}
                    </th>
                    <th class="
                            border border-gray-800
                            p-2
                            text-gray-800
                            font-medium
                        ">
                        {{ $buku->nama_buku }}
                    </th>
                    <th class="
                            border border-gray-800
                            p-2
                            text-gray-800
                            font-medium
                        ">
                        {{ $buku->tahun_terbit }}
                    </th>
                    <th class="
                            border border-gray-800
                            p-2
                            text-gray-800
                            font-medium
                        ">
                        {{ $buku->jenis_buku }}
                    </th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

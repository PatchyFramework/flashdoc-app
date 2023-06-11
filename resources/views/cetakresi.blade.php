@section('title', 'Resi Pesanan Flashpharmacy')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
       {{-- Tailwind Link --}}
       <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   
   
        {{-- JavaScript --}}
        <script>
            function cetakResi() {
                window.print(); // Cetak halaman
            }
        </script>
    <title>@yield('title') | Flashdoc</title>

</head>
<body class="font-quicksand max-h-screen">
    <div class="w-[500px] p-4 rounded border border-dashed border-gray-400 border-2">
        {{-- Detail Pemesan  --}}
        <div class="flex flex-row space-x-10 ml-[5%]">
            <h1 class="flex font-bold text-solidorange text-2xl">Flash<span class="text-tealblue">doc</span></h1>
            <h1 class="flex font-bold text-tealblue items-center justify-end text-xl">Invoice</h1>
        </div>
        {{-- End of Detail Pemesan  --}}


        <div class="w-[95%] border-b-2 border-gray mx-auto py-1"></div>


        <div class="flex flex-row text-xs my-[1%]">
            <div class="space-x-5 items-center p-4">
                <div class="flex flex-col space-y-0.5">
                    <div class="text-md">
                        <p class="font-normal">ID Pesanan</p>
                    </div>

                    <div class="text-md">
                        <p class="font-normal">Tanggal Pesanan Dibuat</p>
                    </div>

                    <div class="text-md">
                        <p class="font-normal">Nama Pemesan</p>
                    </div>

                    <div class="text-md">
                        <p class="font-normal">No. Telepon Pemesan</p>
                    </div>

                    <div class="text-md">
                        <p class="font-normal">Alamat Pemesan</p>
                    </div>
                </div>
            </div>
            <div class="space-x-5 items-center p-4">
                <div class="flex flex-col space-y-0.5">
                    <div class="text-md">
                        <span class="font-bold">{{ $flashpharmacy->id }}</span>
                    </div>

                    <div class="text-md">
                        <span class="font-bold">{{ $flashpharmacy->created_at }}</span>
                    </div>

                    <div class="text-md">
                        <span class="font-bold">{{ $flashpharmacy->user->name }}</span>
                    </div>

                    <div class="text-md">
                        <span class="font-bold">{{ $flashpharmacy->user->phone }}</span>
                    </div>

                    <div class="text-md">
                        <span class="font-bold">{{ $flashpharmacy->user->address }}</span>
                    </div>
                </div>
            </div>
        </div>


        {{-- Data Table --}}
        <div class="relative shadow-md border-gray-300 border-opacity-50 border rounded mx-[2%] my-[3%]">
            <table class="w-full text-sm text-left text-black">
                <thead class="text-xs text-black bg-gray-50 border-b border-gray-100">
                    <tr>
                        <th scope="col" class="p-2 text-center">
                            Nama Obat
                        </th>
                        <th scope="col" class="p-2 text-center">
                            Kuantitas
                        </th>
                        <th scope="col" class="p-2 text-center">
                            Harga
                        </th>
                        <th scope="col" class="p-2 text-center">
                            Jumlah
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b text-xs">
                        <td class="p-2">
                            {{ $flashpharmacy->obat->nama_obat }}
                        </td>
                        <td class="p-2 text-center">
                            {{ $flashpharmacy->kuantitas_obat }}
                        </td>
                        <td class="p-2 text-center">
                            {{ $flashpharmacy->obat->harga_obat}}
                        </td>
                        <td class="p-2 text-center font-bold">
                            {{ $flashpharmacy->total }}
                        </td>
                </tbody>
            </table>
        </div>

        <div class="w-full flex flex-row text-xs my-[1%] items-right justify-end">
            <div class="space-x-5 items-center p-4">
                <div class="flex flex-col space-y-0.5">
                    <div class="text-md ">
                        <p class="font-normal">Subtotal Barang</p>
                    </div>
                </div>
            </div>
            <div class="space-x-5 items-center p-4">
                <div class="flex flex-col space-y-0.5">
                    <div class="text-md">
                        <span class="font-bold">Rp. {{ $flashpharmacy->total }},-</span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="flex flex-row float-right text-xs my-[5%]">
            <div class="space-x-5 items-center p-4">

            </div>
            <div class="space-x-5 items-center p-4">
                <div class="flex flex-col">
                    <div class="text-md ">

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

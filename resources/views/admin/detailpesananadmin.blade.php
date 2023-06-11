@extends('./components/layoutadmin')

@section('title', 'Detail Pesanan Flashpharmacy')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
       {{-- Tailwind Link --}}
       <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   
   
    <title>@yield('title') | Flashdoc</title>

</head>
<body class="flex justify-center items-center max-h-screen">
    <div class="w-full p-4 space-y-5">
        {{-- Detail Pemesan  --}}
        <div class="w-fit flex flex-row bg-darkblue text-white font-bold rounded-lg py-2 px-2 mb-[1%]">
            <i class="fa-solid fa-bars rounded-l-lg px-2 flex items-center justify-center"></i> 
            <div class="px-3 rounded-r-lg ">
                Detail Pemesan Obat
            </div>
        </div>
        {{-- End of Detail Pemesan  --}}


        {{-- Data Pemesan --}}
        <div class="w-full bg-white pt-3 pb-2 rounded-lg shadow-lg border-gray-300 border-opacity-50 border">
            <div class="w-fit flex flex-row bg-darkblue text-white font-bold rounded-lg py-2 px-2 ml-[3%]">
                <i class="fa-solid fa-user rounded-l-lg px-2 flex items-center justify-center"></i> 
                <div class="px-3 rounded-r-lg ">
                    Data Pemesan
                </div>
            </div>

            <div class="flex flex-row">
                <div class="w-[30%] space-x-10 items-center p-4 ml-[5%]">
                    <div class="flex flex-col space-y-6">
                        <div class="text-md space-y-2">
                            <p class="font-normal">Nama Pemesan</p>
                            <span class="font-bold">{{ $flashpharmacy->user->name }}</span>
                        </div>

                        <div class="text-md space-y-2">
                            <p class="font-normal">Nomor Telepon</p>
                            <span class="font-bold">{{ $flashpharmacy->user->phone }}</span>
                        </div>
                    </div>
                </div>
                <div class="w-[30%] space-x-10 items-center p-4 ml-[5%]">
                    <div class="flex flex-col space-y-6">
                        <div class="text-md space-y-2">
                            <p class="font-normal">Alamat Email</p>
                            <span class="font-bold">{{ $flashpharmacy->user->email }}</span>
                        </div>

                        <div class="text-md space-y-2">
                            <p class="font-normal">Alamat Pemesan</p>
                            <span class="font-bold">{{ $flashpharmacy->user->address }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- End of Data Pemesan --}}

        {{-- Data Pesanan --}}
        <div class="w-full bg-white pt-3 pb-2 rounded-lg shadow-lg border-gray-300 border-opacity-50 border">
            <div class="w-fit flex flex-row bg-darkblue text-white font-bold rounded-lg py-2 px-2 ml-[3%] mb-[1%]">
                <i class="fa-solid fa-tablets rounded-l-lg px-2 flex items-center justify-center"></i>
                <div class="px-3 rounded-r-lg ">
                    Data Pesanan
                </div>
            </div>

            <div class="flex flex-row">
                <div class="w-[30%] space-x-10 items-center p-2 ml-[5%]">
                    <div class="flex flex-row space-x-3 justify-center items-center">
                        <div class="p-1 rounded shadow-lg border-gray-300 border-opacity-50 border">
                            <img src="{{ asset($flashpharmacy->obat->img_obat) }}" alt="Admin Photo" class="max-h-[60px] object-fill rounded"/>
                        </div>
                        <div class="flex flex-col text-sm">
                            <span class="font-bold">{{ $flashpharmacy->obat->nama_obat }}</span>
                            <span class="text-xs font-normal">{{ $flashpharmacy->kuantitas_obat }} pcs</span>
                            <span class="font-normal">Rp. {{ $flashpharmacy->obat->harga_obat }}.-</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-[95%] border-b-2 border-gray pb-3 mx-auto"></div>

            <div class="my-3 mr-10 font-bold text-lg text-right">
                <span>Total Rp. {{ $flashpharmacy->total }},- </span>
            </div>
        </div>
        {{-- End of Data Pesanan --}}

        {{-- Buttons --}}
        @if($flashpharmacy->status_pesanan == 'Berhasil')
            <a href="{{ route('admin.flashpharmacy.cetakresi', $flashpharmacy->id) }}" id="cetakResiButton"  class="block h-[35px] p-3 py-1.5 bg-tealblue rounded-lg text-white font-bold mr-2 float-right">
                Cetak Invoice
            </a>

            <button class="showLanjutModal block h-[35px] p-3 py-0 bg-tealblue rounded-lg text-white font-bold mr-2 float-right hidden">
                Lanjutkan Proses
            </button> 

        @elseif($flashpharmacy->status_pesanan == 'Pending')
            <button class="showLanjutModal block h-[35px] p-3 py-0 bg-tealblue rounded-lg text-white font-bold mr-2 float-right">
                Lanjutkan Proses
            </button> 
        @endif  
        {{-- End of Buttons --}}
    </div>




    {{-- Lanjut Modal --}}
    <div id="ModalLanjutkan" class="lanjutModal fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden" tabindex="-1">
    <div class="w-[30%] bg-white shadow-lg p-6 rounded">
        <!-- Konten Modal -->
        <form action="{{ route('admin.flashpharmacy.editstatus', $flashpharmacy->id) }}" method="post" class="space-y-3">
        @csrf
        @method('put')

        <div class="flex justify-center items-center text-lg font-bold text-black">
            Lanjutkan Proses?
        </div>

        <div class="w-[100%] border-b-2 border-gray pb-3"></div>

        <div class="text-md py-5">
            Jika sudah  melanjutkan proses pemesanan dan pengiriman, 
            tidak akan bisa dibatalkan kembali.
        </div>

        <div class="flex flex-row space-x-2 justify-end items-center">
            <div class="lanjutModalClose closeLanjutModal w-[15%] p-1 text-white bg-danger font-bold text-lg rounded-lg cursor-pointer focus:ring-4 text-center">
                Batal
            </div>

            <button type="submit" class="block h-[35px] p-3 py-0 bg-tealblue rounded-lg text-white font-bold mr-2 float-right">
                Lanjutkan Proses
            </button>
        </div>
        </form>
    </div>
    </div>
    {{-- End of Lanjut Modal --}}









    <script>
        // Lanjut Modal
        const lanjutModal = document.querySelector('.lanjutModal');
        const showLanjutModal = document.querySelector('.showLanjutModal');
        const closeLanjutModal = document.querySelector('.closeLanjutModal');
        showLanjutModal.addEventListener('click', function() {
        lanjutModal.classList.remove('hidden')
        });
        closeLanjutModal.addEventListener('click', function() {
        lanjutModal.classList.add('hidden')
        });
        // End of Lanjut Modal


        // Ambil tombol cetak resi
        const cetakResiButton = document.getElementById('cetakResiButton');

        // Tambahkan event listener untuk mengarahkan ke halaman cetak resi dan mencetak
        cetakResiButton.addEventListener('click', function(event) {
            event.preventDefault(); // Mencegah aksi default (pengalihan ke halaman cetak resi)

            const url = this.getAttribute('href'); // Ambil URL halaman cetak resi
            const newWindow = window.open(url); // Buka halaman cetak resi dalam jendela baru

            // Tunggu halaman cetak resi selesai dimuat
            newWindow.addEventListener('load', function() {
                newWindow.print(); // Cetak halaman cetak resi
            });
        });
    </script>
</body>
</html>
@endsection
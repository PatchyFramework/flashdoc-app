@extends('./components/layoutdokter')

@section('title', 'Janji Dokter')

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
                Detail Janji
            </div>
        </div>
        {{-- End of Detail Pemesan  --}}


        {{-- Data Pemesan --}}
        <div class="w-full bg-white pt-3 pb-2 rounded-lg shadow-lg border-gray-300 border-opacity-50 border">
            <div class="w-fit flex flex-row bg-darkblue text-white font-bold rounded-lg py-2 px-2 ml-[3%]">
                <i class="fa-solid fa-user rounded-l-lg px-2 flex items-center justify-center"></i> 
                <div class="px-3 rounded-r-lg ">
                    Data Pasien
                </div>
            </div>

            <div class="flex flex-row">
                <div class="w-[30%] space-x-10 items-center p-4 ml-[5%]">
                    <div class="flex flex-col space-y-6">
                        <div class="text-md space-y-2">
                            <p class="font-normal">Nama Pasien</p>
                            <span class="font-bold">{{ $janji->user->name }}</span>
                        </div>

                        <div class="text-md space-y-2">
                            <p class="font-normal">Nomor Telepon</p>
                            <span class="font-bold">{{ $janji->user->phone }}</span>
                        </div>

                        <div class="text-md space-y-2">
                            <p class="font-normal">Tanggal Janji</p>
                            <span class="font-bold">{{ $janji->user->phone }}</span>
                        </div>
                    </div>
                </div>
                <div class="w-[30%] space-x-10 items-center p-4 ml-[5%]">
                    <div class="flex flex-col space-y-6">
                        <div class="text-md space-y-2">
                            <p class="font-normal">Alamat Email</p>
                            <span class="font-bold">{{ $janji->user->email }}</span>
                        </div>

                        <div class="text-md space-y-2">
                            <p class="font-normal">Alamat Pemesan</p>
                            <span class="font-bold">{{ $janji->user->address }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- End of Data Pemesan --}}

        {{-- Buttons --}}
        @if($janji->status_janji == 'Berhasil')
            <a href="{{ route('admin.flashpharmacy.cetakresi', $janji->id) }}" id="cetakResiButton"  class="block h-[35px] p-3 py-1.5 bg-tealblue rounded-lg text-white font-bold mr-2 float-right">
                Cetak Invoice
            </a>

            <button class="showLanjutModal block h-[35px] p-3 py-0 bg-tealblue rounded-lg text-white font-bold mr-2 float-right hidden">
                Lanjutkan Proses
            </button> 

        @elseif($janji->status_janji == 'Pending')
            <button class="showSetujuModal block h-[35px] p-3 py-0 bg-tealblue rounded-lg text-white font-bold mr-2 float-right">
                Setujui Janji
            </button>
            
            <button class="showBatalModal block h-[35px] p-3 py-0 bg-danger rounded-lg text-white font-bold mr-2 float-right">
                Batalkan Janji
            </button> 
        @endif  
        {{-- End of Buttons --}}
    </div>




    {{-- Setuju Modal --}}
    <div id="ModalSetuju" class="setujuModal fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden" tabindex="-1">
    <div class="w-[30%] bg-white shadow-lg p-6 rounded">
        <!-- Konten Modal -->
        <form action="{{ route('dokter.janji.editsetuju', $janji->id) }}" method="post" class="space-y-3">
        @csrf
        @method('put')

        <div class="flex justify-center items-center text-lg font-bold text-black">
            Setujui Janji?
        </div>

        <div class="w-[100%] border-b-2 border-gray pb-3"></div>

        <div class="text-md py-5">
            Jika sudah  melanjutkan proses persetujuan, 
            tidak akan bisa dibatalkan kembali.
        </div>

        <div class="flex flex-row space-x-2 justify-end items-center">
            <div class="setujuModalClose closeSetujuModal w-[15%] p-1 text-white bg-danger font-bold text-lg rounded-lg cursor-pointer focus:ring-4 text-center">
                Batal
            </div>

            <button type="submit" class="block h-[35px] p-3 py-0 bg-tealblue rounded-lg text-white font-bold mr-2 float-right">
                Setujui
            </button>
        </div>
        </form>
    </div>
    </div>
    {{-- End of Setuju Modal --}}


    {{-- Batal Modal --}}
    <div id="ModalBatal" class="batalModal fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden" tabindex="-1">
        <div class="w-[30%] bg-white shadow-lg p-6 rounded">
            <!-- Konten Modal -->
            <form action="{{ route('dokter.janji.editbatal', $janji->id) }}" method="post" class="space-y-3">
            @csrf
            @method('put')
    
            <div class="flex justify-center items-center text-lg font-bold text-black">
                Batalkan Janji?
            </div>
    
            <div class="w-[100%] border-b-2 border-gray pb-3"></div>
    
            <div class="text-md py-5">
                Jika sudah  melanjutkan proses pembatalan, 
                tidak akan bisa dibatalkan kembali.
            </div>
    
            <div class="flex flex-row space-x-2 justify-end items-center">
                <div class="batalModalClose closeSetujuModal w-[15%] p-1 text-white bg-danger font-bold text-lg rounded-lg cursor-pointer focus:ring-4 text-center">
                    Batal
                </div>
    
                <button type="submit" class="block h-[35px] p-3 py-0 bg-tealblue rounded-lg text-white font-bold mr-2 float-right">
                    Batalkan Janji
                </button>
            </div>
            </form>
        </div>
    </div>
    {{-- End of Batal Modal --}}









    <script>
        // Setuju Modal
        const setujuModal = document.querySelector('.setujuModal');
        const showSetujuModal = document.querySelector('.showSetujuModal');
        const closeSetujuModal = document.querySelector('.closeSetujuModal');
        showSetujuModal.addEventListener('click', function() {
        setujuModal.classList.remove('hidden')
        });
        closeSetujuModal.addEventListener('click', function() {
        setujuModal.classList.add('hidden')
        });
        // End of Setuju Modal


        // Batal Modal
        const batalModal = document.querySelector('.batalModal');
        const showBatalModal = document.querySelector('.showBatalModal');
        const closeBatalModal = document.querySelector('.closeBatalModal');
        showBatalModal.addEventListener('click', function() {
        batalModal.classList.remove('hidden')
        });
        closeBatalModal.addEventListener('click', function() {
        batalModal.classList.add('hidden')
        });
        // End of Batal Modal

    </script>
</body>
</html>

@endsection
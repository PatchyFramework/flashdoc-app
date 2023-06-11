@extends('./components/layoutuser')

@section('title', 'Flashpharmacy')

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
    <div class="w-full p-5 h-[300px] bg-solidblue">
        <div class="flex flex-row justify-center items-center h-full space-x-5">
            <div class="w-fit space-y-1 mr-[35%] mt-3">
                <h1 class="font-bold text-xl text-white">Cari Obatmu Disini!</h1>
                <p class="text-lg text-white">Flashdoc Flashpharmacy Order</p>
                <div class="w-[100%] border-b-2 border-solidorange"></div>
            </div>

            <div class="w-fit space-y-1 ml-7">
                <img src="storage/photos/homepage1.png" alt="Homepage Photo" class="w-[327px] h-[339px] relative z-10 opacity-0">
            </div>
        </div>
    </div>


    <div class="w-full p-5 space-y-2">
        <div class="flex flex-col w-fit ml-[4%] mt-[4%]">
            <div class="font-bold text-black text-lg justify-start">
                Beta Catalog
            </div>
            <div class="w-[100%] border-b-2 border-tealblue"></div>
        </div>

        {{-- Success Alert --}}
        @if (session('success'))
        <div class="alert alert-success w-fit bg-success bg-opacity-50 border border-success text-[#4AA342] font-normal p-2 space-x-2 rounded-lg text-md ml-[4%] mt-[6%]">
        <i class="fa-regular fa-circle-check"></i>
        {{session('success')}}
        </div>
        @endif
        {{-- End of Success Alert --}}

        <div class="flex flex-wrap justify-center">
            @foreach ($obat as $index => $o)
              <div class="max-w-xs bg-white border border-gray-200 rounded-lg shadow mx-4 my-4">
                <a href="#">
                  <img class="rounded-t-lg w-[80%]" src="{{ $o->img_obat }}" alt="" />
                </a>
                <div class="p-5">
                  <a href="#">
                    <h5 class="mb-2 text-sm font-bold tracking-tight text-black">{{ $o->nama_obat }}</h5>
                  </a>
                  <p class="mb-3 text-xs font-normal text-black">Rp. {{ $o->harga_obat }},-/pcs</p>
                    <button data-id="{{ $o->id }}" data-obat-id="{{ $o->id }}" class="showCreateModal block px-3 py-1 bg-tealblue rounded text-white font-bold mr-2">
                      Pesan Sekarang
                    </button>                                  
                </div>
              </div>
              @if (($index + 1) % 4 === 0)
                <div class="w-100"></div>
              @endif
            @endforeach
        </div>          
    </div>



{{-- Edit Modal --}}
@foreach($obat as $o)
<div id="ModalCreatePesanan-{{ $o->id }}" class="createModal fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden" tabindex="-1">
  <div class="w-[30%] bg-white shadow-lg p-6 rounded">
    <!-- Konten Modal --> 
    <form action="{{ route('user.flashpharmacy.create') }}" method="post" class="space-y-3">
      @csrf
      @method('post')

      <div class="flex justify-center items-center text-lg font-bold text-black">
        Buat Pesanan
      </div>

      <div class="w-[100%] border-b-2 border-gray opacity-30 pb-3"></div>

      <div>
        <label for="user_id" class="block text-lg font-bold text-solidorange">Nama Pasien</label>
        <select name="user_id" id="user_id" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-tealblue peer">
          @foreach($user as $u)
              <option value="{{ $u->id }}">{{ Auth::user()->name }}</option>
          @endforeach
        </select>

        <label for="obat_id" class="block text-lg font-bold text-solidorange">Obat yang ingin Dipesan</label>
        <select name="obat_id" id="edit-obat_id-{{ $o->id }}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-tealblue peer">
          <option value="{{ $o->id }}" selected>{{ $o->nama_obat }}</option>
        </select>

        <label for="kuantitas_obat" class="block text-lg font-bold text-solidorange">Kuantitas Obat</label>
        <input type="number" name="kuantitas_obat" id="kuantitas_obat" placeholder="Masukkan kuantitas obat yang ingin dipesan..." class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-tealblue peer">

        <div class="my-[10%] mr-3 font-bold text-base text-right">
            <span class="total">Total Rp. {{ $o->harga_obat * $o->kuantitas_obat }},- </span>
        </div>
      </div>   

      <div class="flex flex-row space-x-2 justify-end items-center">
        <button type="submit" formaction="{{ route('user.flashpharmacy.create') }}" class="w-[30%] p-1 text-white bg-solidorange font-bold text-lg text-center rounded-lg cursor-pointer focus:ring-4">
          Buat
        </button>

        <div class="editModalCreate closeCreateModal w-[30%] p-1 text-white bg-danger font-bold text-lg rounded-lg cursor-pointer focus:ring-4 text-center">
          Batal
        </div>
      </div>
    </form>
  </div>
</div>
@endforeach
{{-- End of Edit Modal --}}

     

  


  <script>
    // Create Modal
    const showCreateModal = document.querySelectorAll('.showCreateModal');
    const closeCreateModal = document.querySelectorAll('.closeCreateModal');

    showCreateModal.forEach(button => {
    button.addEventListener('click', function() {
        const id = this.getAttribute('data-id');
        const obatId = this.getAttribute('data-obat-id');

        const modal = document.querySelector(`#ModalCreatePesanan-${id}`);
        const editObatId = modal.querySelector(`#edit-obat_id-${id}`);
        const kuantitasObatInput = modal.querySelector(`#kuantitas_obat`);

        // Menghapus semua opsi yang ada sebelumnya
        editObatId.innerHTML = "";

        // Mengisi opsi untuk obat
        @foreach($obat as $o)
        if ("{{ $o->id }}" === obatId) {
            editObatId.innerHTML += `<option value="{{ $o->id }}" selected>{{ $o->nama_obat }}</option>`;
        } else {
            editObatId.innerHTML += `<option value="{{ $o->id }}">{{ $o->nama_obat }}</option>`;
        }
        @endforeach

        // Event listener untuk menghitung total
        kuantitasObatInput.addEventListener('input', function() {
        const kuantitasObat = this.value;
        const hargaObat = {{ $o->harga_obat }};
        const total = hargaObat * kuantitasObat;

        const totalElement = modal.querySelector('.total');
        totalElement.textContent = `Total Rp. ${total},-`;
        });

        modal.classList.remove('hidden');
    });
    });

    closeCreateModal.forEach(button => {
    button.addEventListener('click', function() {
        const modal = this.closest('.createModal');
        modal.classList.add('hidden');
    });
    });
    // End of Create Modal
  </script>
</body>


@endsection
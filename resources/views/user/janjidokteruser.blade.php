@extends('./components/layoutuser')

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
  <div class="w-full p-5 h-[300px] bg-solidblue">
    <div class="flex flex-row justify-center items-center h-full space-x-5">
        <div class="w-fit space-y-1 mr-[30%] mt-3">
            <h1 class="font-bold text-xl text-white">Buat Janjimu dengan Dokter Disini!</h1>
            <div class="w-fit border-b-2 border-solidorange">
              <p class="text-lg text-white">Janji Dokter Flashdoc</p>
            </div>
        </div>

        <div class="w-fit space-y-1 ml-7">
            <img src="storage/photos/homepage1.png" alt="Homepage Photo" class="w-[327px] h-[339px] relative z-10 opacity-0">
        </div>
    </div>
  </div>


  <div class="w-full p-5 space-y-2">
    <div class="flex flex-col w-fit ml-[4%] mt-[4%]">
        <div class="font-bold text-black text-lg justify-start">
            Beta Doctors
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
        @foreach ($dokter as $index => $d)
          <div class="w-fit bg-white border border-gray-200 rounded-lg shadow mx-4 my-4">
            <div class="p-5">
              <a href="#">
                <h5 class="mb-2 text-sm font-bold tracking-tight text-black">Dr. {{ $d->name }}</h5>
              </a>
              <p class="mb-3 text-xs font-normal text-black text-wra">Spesialis {{ $d->spesialis->spesialis }}</p>
              <p class="mb-3 text-xs font-bold text-black"> {{ $d->faskes->nama_faskes }}</p>
                <button data-id="{{ $d->id }}" data-dokter-id="{{ $d->id }}" class="showCreateModal block px-3 py-1 bg-tealblue rounded text-white font-bold mr-2">
                  Buat Janji
                </button>                                  
            </div>
          </div>
          @if (($index + 1) % 4 === 0)
            <div class="w-100"></div>
          @endif
        @endforeach
    </div>




    {{-- Create Modal --}}
    @foreach($dokter as $d)
    <div id="ModalCreateJanji-{{ $d->id }}" class="createModal fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden" tabindex="-1">
      <div class="w-[30%] bg-white shadow-lg p-6 rounded">
        <!-- Konten Modal --> 
        <form action="{{ route('user.janji.create') }}" method="post" class="space-y-3">
          @csrf
          @method('post')

          <div class="flex justify-center items-center text-lg font-bold text-black">
            Buat Janji
          </div>

          <div class="w-[100%] border-b-2 border-gray opacity-30 pb-3"></div>

          <div>
            <label for="user_id" class="block text-lg font-bold text-solidorange">Nama Pasien</label>
            <select name="user_id" id="user_id" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-tealblue peer">
              @foreach($user as $u)
                  <option value="{{ $u->id }}">{{ Auth::user()->name }}</option>
              @endforeach
            </select>

            <label for="dokter_id" class="block text-lg font-bold text-solidorange">Nama Dokter</label>
            <select name="dokter_id" id="edit-dokter_id-{{ $d->id }}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-tealblue peer">
              <option value="{{ $d->id }}" selected>{{ $d->name }}</option>
            </select>

            <label for="tanggal_janji" class="block text-lg font-bold text-solidorange">Tanggal Janji</label>
            <input type="date" name="tanggal_janji" id="tanggal_janji" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-tealblue peer">
          </div>   

          <div class="flex flex-row space-x-2 justify-end items-center">
            <button type="submit" formaction="{{ route('user.janji.create') }}" class="w-[30%] p-1 text-white bg-solidorange font-bold text-lg text-center rounded-lg cursor-pointer focus:ring-4">
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
    {{-- End of Create Modal --}}
  </div>
<script>
    // Create Modal
    const showCreateModal = document.querySelectorAll('.showCreateModal');
    const closeCreateModal = document.querySelectorAll('.closeCreateModal');

    showCreateModal.forEach(button => {
    button.addEventListener('click', function() {
        const id = this.getAttribute('data-id');
        const dokterId = this.getAttribute('data-dokter-id');

        const modal = document.querySelector(`#ModalCreateJanji-${id}`);
        const editDokterId = modal.querySelector(`#edit-dokter_id-${id}`);

        // Menghapus semua opsi yang ada sebelumnya
        editDokterId.innerHTML = "";

        // Mengisi opsi untuk obat
        @foreach($dokter as $d)
        if ("{{ $d->id }}" === dokterId) {
            editDokterId.innerHTML += `<option value="{{ $d->id }}" selected>{{ $d->name }}</option>`;
        } else {
            editDokterId.innerHTML += `<option value="{{ $d->id }}">{{ $d->name }}</option>`;
        }
        @endforeach

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
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
    {{-- Daftar Janji Dokter  --}}
    <div class="w-fit flex flex-row bg-darkblue text-white font-bold rounded-lg py-2 px-2 mb-[1%]">
      <i class="fa-solid fa-bars rounded-l-lg px-2 flex items-center justify-center"></i> 
      <div class="px-3 rounded-r-lg ">
          Daftar Janji Dokter
      </div>
    </div>
    {{-- End of Daftar Janji Dokter  --}}


    {{-- Create Modal Toggle --}}
    {{-- <button href="#" class="showCreateModal block text-black bg-success hover:bg-black hover:text-success hover:duration-300 font-bold rounded-lg text-sm px-3 py-2 text-center mb-4">
      <i class="fa-solid fa-plus"></i> Tambah Janji
    </button> --}}
    {{-- End of Create Modal Toggle --}}

    {{-- Success Alert --}}
    @if (session('success'))
      <div class="alert alert-success w-fit bg-success bg-opacity-50 border border-success text-[#4AA342] font-normal p-2 space-x-2 rounded-lg text-md">
        <i class="fa-regular fa-circle-check"></i>
        {{session('success')}}
      </div>
    @endif
    {{-- End of Success Alert --}}
    
    {{-- Data Table --}}
    <div class="relative shadow-md border-gray-300 border-opacity-50 border rounded overflow-y-auto max-h-[400px] scroll-smooth">
        <table class="w-full text-sm text-left text-black">
            <thead class="sticky top-0 text-xs text-black bg-gray-50 border-b border-gray-100">
                <tr>
                    <th scope="col" class="px-6 py-2">
                        ID Janji
                    </th>
                    <th scope="col" class="px-6 py-2">
                        Nama Pasien
                    </th>
                    <th scope="col" class="px-6 py-2">
                        Nama Dokter
                    </th>
                    <th scope="col" class="px-6 py-2">
                        Spesialis
                    </th>
                    <th scope="col" class="px-6 py-2">
                        Fasilitas Kesehatan
                    </th>
                    <th scope="col" class="px-6 py-2">
                        Tanggal Janji
                    </th>
                    <th scope="col" class="px-6 py-2">
                        Status Janji
                    </th>
                    <th scope="col" class="px-6 py-2 text-center">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($janji as $j)
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $j->id }}
                        </th>
                        <td class="px-6 py-3">
                            {{ $j->user->name }}
                        </td>
                        <td class="px-6 py-3">
                            {{ $j->dokter->name }}
                        </td>
                        <td class="px-6 py-3">
                            {{ $j->dokter->spesialis->spesialis }}
                        </td>
                        <td class="px-6 py-3">
                            {{ $j->dokter->faskes->nama_faskes }}
                        </td>
                        <td class="px-6 py-3">
                            {{ date('j F Y', strtotime($j->tanggal_janji)) }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex flex-row justify-center items-center">
                              @if ($j->status_janji == 'Pending')
                                <div class="h-[10px] w-[10px] bg-solidyellow bg-opacity-50 border border-solidyellow rounded-full mr-2"></div>
                                <span class="text-solidyellow">{{ $j->status_janji }}</span>
                              @elseif ($j->status_janji == 'Ditolak')
                                <div class="h-[10px] w-[10px] bg-danger bg-opacity-50 border border-danger rounded-full mr-2"></div>
                                <span class="text-danger">{{ $j->status_janji }}</span>
                              @elseif ($j->status_janji == 'Berhasil')
                                <div class="h-[10px] w-[10px] bg-success bg-opacity-50 border border-success rounded-full mr-2"></div>
                                <span class="text-success">{{ $j->status_janji }}</span>
                              @else
                                <span>{{ $j->status_janji }}</span>
                              @endif
                            </div>
                          </td>
                        <td class="flex flex-row px-6 py-4 justify-center">
                            <a href="janjidokter/{{ $j->id }}" class="block h-[25px] p-2 py-0.5 bg-tealblue rounded text-white font-bold mr-2 space-x-3">
                                <i class="fa-solid fa-eye"></i> Lihat Janji
                              </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- End of Data Table --}}
  </div>


      
      



  {{-- Create Modal --}}
  <div id="ModalCreateJanji" class="createModal fixed inset-0 flex hidden items-center justify-center bg-black bg-opacity-50" tabindex="-1">
    <div class="w-[30%] bg-white shadow-lg p-6 rounded">
      <!-- Konten Modal -->
        <form action="{{ route('admin.janji.create') }}" method="post" class="space-y-3">
          @csrf

          
          <div class="flex justify-center items-center text-lg font-bold text-black">
            Tambah Janji
          </div>

          <div class="w-[100%] border-b-2 border-gray opacity-30 pb-3"></div>

          <div>
            <label for="user_id" class="block text-lg font-bold text-solidorange">Nama Pasien</label>
            <select name="user_id" id="user_id" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-tealblue peer">
              @foreach($user as $u)
                <option value="{{ $u->id }}">{{ $u->name }}</option>
              @endforeach
            </select>

            <label for="dokter_id" class="block text-lg font-bold text-solidorange">Nama Dokter</label>
            <select name="dokter_id" id="dokter_id" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-tealblue peer">
              @foreach($dokter as $d)
                <option value="{{ $d->id }}">{{ $d->name }}</option>
              @endforeach
            </select>

            <label for="tanggal_janji" class="block text-lg font-bold text-solidorange">Tanggal Janji</label>
            <input type="date" name="tanggal_janji" id="tanggal_janji" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-tealblue peer">
          </div>

          <div>

          </div>

          <div class="flex flex-row space-x-2 justify-end items-center">
            <button type="submit" class="w-[30%] p-1 text-white bg-solidorange font-bold text-lg rounded-lg cursor-pointer focus:ring-4">
              Tambah
            </button>
            
            <div class="closeCreateModal w-[30%] p-1 text-white bg-danger font-bold text-lg rounded-lg cursor-pointer focus:ring-4 text-center">
              Batal
            </div> 
          </div>
        </form>
    </div>
  </div>
  {{-- End of Create Modal --}}






{{-- Edit Modal --}}
@foreach($janji as $j)
<div id="ModalEditJanji-{{ $j->id }}" class="editModal fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden" tabindex="-1">
  <div class="w-[30%] bg-white shadow-lg p-6 rounded">
    <!-- Konten Modal -->
    <form action="janjidokter/{{$j->id}}" method="post" class="space-y-3">
      @csrf
      @method('put')

      <div class="flex justify-center items-center text-lg font-bold text-black">
        Ubah Janji
      </div>

      <div class="w-[100%] border-b-2 border-gray opacity-30 pb-3"></div>

      <div>
        <label for="user_id" class="block text-lg font-bold text-solidorange">Nama Pasien</label>
        <select disabled name="user_id" id="edit-user_id-{{ $j->id }}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-tealblue peer">
          <option value="{{ $j->user->id }}">{{ $j->user->name }}</option>
        </select>

        <label for="dokter_id" class="block text-lg font-bold text-solidorange">Nama Dokter</label>
        <select name="dokter_id" id="edit-dokter_id-{{ $j->id }}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-tealblue peer">
          <option value="{{ $j->dokter->id }}" selected>{{ $j->dokter->name }}</option>
        </select>
      </div>

      <div class="flex flex-row space-x-2 justify-end items-center">
        <button type="submit" class="w-[30%] p-1 text-white bg-solidorange font-bold text-lg rounded-lg cursor-pointer focus:ring-4">
          Ubah
        </button>

        <div class="editModalClose closeEditModal w-[30%] p-1 text-white bg-danger font-bold text-lg rounded-lg cursor-pointer focus:ring-4 text-center">
          Batal
        </div>
      </div>
    </form>
  </div>
</div>
@endforeach
{{-- End of Edit Modal --}}



{{-- Delete Modal --}}
@foreach($janji as $j)
<div id="ModalHapusJanji-{{ $j->id }}" class="deleteModal fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden" tabindex="-1">
  <div class="w-[30%] bg-white shadow-lg p-6 rounded">
    <!-- Konten Modal -->
    <form action="janjidokter/{{$j->id}}" method="post" class="space-y-3">
      @csrf
      @method('delete')

      <div class="flex justify-center items-center text-lg font-bold text-black">
        Hapus Janji
      </div>

      <div class="w-[100%] border-b-2 border-gray opacity-30 pb-3"></div>

      <div class="text-md py-5">
        Apakah Anda yakin akan menghapus data ini?
      </div>

      <div class="flex flex-row space-x-2 justify-end items-center">
        <button type="submit" class="w-[30%] p-1 text-white bg-danger font-bold text-lg rounded-lg cursor-pointer focus:ring-4">
          Hapus
        </button>

        <div class="deleteModalClose closeDeleteModal w-[30%] p-1 text-white bg-tealblue font-bold text-lg rounded-lg cursor-pointer focus:ring-4 text-center">
          Batal
        </div>
      </div>
    </form>
  </div>
</div>
@endforeach
{{-- End of Delete Modal --}}








  <script>
    // Create Modal
    const createModal = document.querySelector('.createModal');
    const showCreateModal = document.querySelector('.showCreateModal');
    const closeCreateModal = document.querySelector('.closeCreateModal');
    showCreateModal.addEventListener('click', function() {
      createModal.classList.remove('hidden')
    });
    closeCreateModal.addEventListener('click', function() {
      createModal.classList.add('hidden')
    });
    // End of Create Modal




    // Edit Modal
    const showEditModal = document.querySelectorAll('.showEditModal');
    const closeEditModal = document.querySelectorAll('.closeEditModal');

    showEditModal.forEach(button => {
      button.addEventListener('click', function() {
        const id = this.getAttribute('data-id');
        const pasien = this.getAttribute('data-pasien');
        const dokterId = this.getAttribute('data-dokter-id');

        const modal = document.querySelector(`#ModalEditJanji-${id}`);
        const editUserId = modal.querySelector(`#edit-user_id-${id}`);
        const editDokterId = modal.querySelector(`#edit-dokter_id-${id}`);

        // Menghapus semua opsi yang ada sebelumnya
        editUserId.innerHTML = "";
        editDokterId.innerHTML = "";

        // Mengisi opsi untuk pasien
        const pasienOption = document.createElement("option");
        pasienOption.value = id;
        pasienOption.textContent = pasien;
        pasienOption.selected = true;
        editUserId.appendChild(pasienOption);

        // Mengisi opsi untuk dokter
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

    closeEditModal.forEach(button => {
      button.addEventListener('click', function() {
        const modal = this.closest('.editModal');
        modal.classList.add('hidden');
      });
    });
    // End of Edit Modal



    // Delete Modal
    const showDeleteModal = document.querySelectorAll('.showDeleteModal');
    const closeDeleteModal = document.querySelectorAll('.closeDeleteModal');

    showDeleteModal.forEach(button => {
      button.addEventListener('click', function() {
        const id = this.getAttribute('data-id');
        const modal = document.querySelector(`#ModalHapusJanji-${id}`);
        modal.classList.remove('hidden');
      });
    });

    closeDeleteModal.forEach(button => {
      button.addEventListener('click', function() {
        const modal = this.closest('.deleteModal');
        modal.classList.add('hidden');
      });
    });
    // End of Delete Modal



  </script>
</body>
</html>
@endsection
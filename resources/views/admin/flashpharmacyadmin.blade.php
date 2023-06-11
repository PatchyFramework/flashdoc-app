@extends('./components/layoutadmin')

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
  <div class="w-full p-4 space-y-5">
    {{-- Daftar Pesanan Obat  --}}
    <div class="w-fit flex flex-row bg-darkblue text-white font-bold rounded-lg py-2 px-2 mb-[1%]">
      <i class="fa-solid fa-bars rounded-l-lg px-2 flex items-center justify-center"></i> 
      <div class="px-3 rounded-r-lg ">
          Daftar Pesanan Obat
      </div>
    </div>
    {{-- End of Daftar Pesanan Obat  --}}


    {{-- Create Modal Toggle --}}
    <button href="#" class="showCreateModal block text-black bg-success hover:bg-black hover:text-success hover:duration-300 font-bold rounded-lg text-sm px-3 py-2 text-center mb-4">
      <i class="fa-solid fa-plus"></i> Tambah Pesanan
    </button>
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
          <thead class="text-xs text-black bg-gray-50 border-b border-gray-100">
              <tr>
                  <th scope="col" class="px-6 py-3">
                      ID Pesanan
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Nama Pasien
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Nomor Telepon
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Alamat Pasien
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Tanggal Pesanan
                  </th>
                  <th scope="col" class="px-6 py-3 text-center">
                      Status
                  </th>
                  <th scope="col" class="px-6 py-3 text-center">
                      Aksi
                  </th>
              </tr>
          </thead>
          <tbody>
            @foreach($flashpharmacy as $fp)
              <tr class="bg-white border-b">
                  <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-center">
                      {{ $fp->id }}
                  </th>
                  <td class="px-6 py-4">
                      {{ $fp->user->name }}
                  </td>
                  <td class="px-6 py-4">
                      {{ $fp->user->phone }}
                  </td>
                  <td class="px-6 py-4">
                      {{ $fp->user->address }}
                  </td>
                  <td class="px-6 py-4">
                      {{ date('j F Y', strtotime($fp->created_at)) }}
                  </td>
                  <td class="px-6 py-4">
                    <div class="flex flex-row justify-center items-center">
                      @if ($fp->status_pesanan == 'Pending')
                        <div class="h-[10px] w-[10px] bg-solidyellow bg-opacity-50 border border-solidyellow rounded-full mr-2"></div>
                        <span class="text-solidyellow">{{ $fp->status_pesanan }}</span>
                      @elseif ($fp->status_pesanan == 'Ditolak')
                        <div class="h-[10px] w-[10px] bg-danger bg-opacity-50 border border-danger rounded-full mr-2"></div>
                        <span class="text-danger">{{ $fp->status_pesanan }}</span>
                      @elseif ($fp->status_pesanan == 'Berhasil')
                        <div class="h-[10px] w-[10px] bg-success bg-opacity-50 border border-success rounded-full mr-2"></div>
                        <span class="text-success">{{ $fp->status_pesanan }}</span>
                      @else
                        <span>{{ $fp->status_pesanan }}</span>
                      @endif
                    </div>
                  </td>
                  <td class="flex flex-row px-6 py-4 justify-center">
                    <a href="flashpharmacy/{{ $fp->id }}" class="block h-[25px] p-2 py-0.5 bg-tealblue rounded text-white font-bold mr-2 space-x-3">
                      <i class="fa-solid fa-eye"></i> Lihat Pesanan
                    </a>
        
                    <button data-id="{{ $fp->id }}" data-pasien="{{ $fp->user->name }}" data-obat-id="{{ $fp->obat->id }}" data-pasien-data="{{ $fp->user->name }}" class="showEditModal block h-[25px] p-2 py-0 bg-tealblue rounded text-white font-bold mr-2">
                      <i class="fa-solid fa-pen-to-square"></i>
                    </button>  

                    <button data-id="{{ $fp->id }}" class="showDeleteModal block h-[25px] p-2 py-0 bg-danger rounded text-white font-bold">
                      <i class="fa-solid fa-trash"></i>
                    </button>
                  </td>
              </tr>
            @endforeach
          </tbody>
      </table>
    </div>
    {{-- End of Data Table --}}
  </div>


      
      






  {{-- Create Modal --}}
  <div id="ModalCreatePesanan" class="createModal fixed inset-0 flex hidden items-center justify-center bg-black bg-opacity-50" tabindex="-1">
    <div class="w-[40%] bg-white shadow-lg p-6 rounded">
      <!-- Konten Modal -->
        <form action="{{ route('admin.flashpharmacy.create') }}" method="post" class="space-y-3">
          @csrf
          

          
          <div class="flex justify-center items-center text-lg font-bold text-black">
            Tambah Pesanan
          </div>

          <div class="w-[100%] border-b-2 border-gray opacity-50 pb-3"></div>

          <div>
            <label for="user_id" class="block text-lg font-bold text-solidorange">Nama Pasien</label>
            <select name="user_id" id="user_id" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-tealblue peer">
              @foreach($user as $u)
                  <option value="{{ $u->id }}">{{ $u->name }}</option>
              @endforeach
            </select>


            <label for="obat_id" class="block text-lg font-bold text-solidorange">Obat yang Dipesan</label>
            <select name="obat_id" id="obat_id" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-tealblue peer">
              @foreach($obat as $o)
                <option value="{{ $o->id }}">{{ $o->nama_obat }}</option>
              @endforeach
            </select>


            <label for="kuantitas_obat" class="block text-lg font-bold text-solidorange">Kuantitas Obat</label>
            <input type="number" name="kuantitas_obat" id="kuantitas_obat" placeholder="Masukkan kuantitas obat yang ingin dipesan..." class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-tealblue peer">
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
  @foreach($flashpharmacy as $fp)
  <div id="ModalEditPesanan-{{ $fp->id }}" class="editModal fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden" tabindex="-1">
    <div class="w-[30%] bg-white shadow-lg p-6 rounded">
      <!-- Konten Modal -->
      <form action="flashpharmacy/{{$fp->id}}" method="post" class="space-y-3">
        @csrf
        @method('put')

        <div class="flex justify-center items-center text-lg font-bold text-black">
          Ubah Pesanan
        </div>

        <div class="w-[100%] border-b-2 border-gray opacity-30 pb-3"></div>

        <div>
          <label for="user_id" class="block text-lg font-bold text-solidorange">Nama Pasien</label>
          <select disabled name="user_id" id="edit-user_id-{{ $fp->id }}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-tealblue peer">
            <option value="{{ $fp->user->id }}">{{ $fp->user->name }}</option>
          </select>

          <label for="obat_id" class="block text-lg font-bold text-solidorange">Obat yang ingin Dipesan</label>
          <select name="obat_id" id="edit-obat_id-{{ $fp->id }}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-tealblue peer">
            <option value="{{ $fp->obat->id }}" selected>{{ $fp->obat->nama_obat }}</option>
          </select>

          <label for="kuantitas_obat" class="block text-lg font-bold text-solidorange">Kuantitas Obat</label>
          <input type="number" name="kuantitas_obat" id="kuantitas_obat" value="{{ $fp->kuantitas_obat }}" placeholder="Masukkan kuantitas obat yang ingin dipesan..." class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-tealblue peer">
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
  @foreach($flashpharmacy as $fp)
  <div id="ModalHapusPesanan-{{ $fp->id }}" class="deleteModal fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden" tabindex="-1">
    <div class="w-[30%] bg-white shadow-lg p-6 rounded">
      <!-- Konten Modal -->
      <form action="flashpharmacy/{{$fp->id}}" method="post" class="space-y-3">
        @csrf
        @method('delete')

        <div class="flex justify-center items-center text-lg font-bold text-black">
          Hapus Pesanan
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
        const obatId = this.getAttribute('data-obat-id');

        const modal = document.querySelector(`#ModalEditPesanan-${id}`);
        const editUserId = modal.querySelector(`#edit-user_id-${id}`);
        const editObatId = modal.querySelector(`#edit-obat_id-${id}`);

        // Menghapus semua opsi yang ada sebelumnya
        editUserId.innerHTML = "";
        editObatId.innerHTML = "";

        // Mengisi opsi untuk pasien
        const pasienOption = document.createElement("option");
        pasienOption.value = id;
        pasienOption.textContent = pasien;
        pasienOption.selected = true;
        editUserId.appendChild(pasienOption);

        // Mengisi opsi untuk dokter
        @foreach($obat as $o)
          if ("{{ $o->id }}" === obatId) {
            editObatId.innerHTML += `<option value="{{ $o->id }}" selected>{{ $o->nama_obat }}</option>`;
          } else {
            editObatId.innerHTML += `<option value="{{ $o->id }}">{{ $o->nama_obat }}</option>`;
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
        const modal = document.querySelector(`#ModalHapusPesanan-${id}`);
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
@extends('./components/layoutadmin')

@section('title', 'Fasilitas Kesehatan')

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
          Daftar Fasilitas Kesehatan
      </div>
    </div>
    {{-- End of Daftar Janji Dokter  --}}


    {{-- Create Modal Toggle --}}
    <button href="#" class="showCreateModal block text-black bg-success hover:bg-black hover:text-success hover:duration-300 font-bold rounded-lg text-sm px-3 py-2 text-center mb-4">
      <i class="fa-solid fa-plus"></i> Tambah Faskes
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
    <div class="shadow-md border-gray-300 border-opacity-50 border rounded overflow-y-auto max-h-[400px] scroll-smooth">
      <table class="w-full text-sm text-left text-black">
          <thead class="sticky top-0 text-xs text-black bg-gray-50 border-b border-gray-100">
              <tr>
                  <th scope="col" class="px-6 py-3">
                      ID Faskes
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Nama Fasilitas Kesehatan
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Hotline Number
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Alamat Fasilitas Kesehatan
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Image Cover
                  </th>
                  <th scope="col" class="px-6 py-3 text-center">
                      Aksi
                  </th>
              </tr>
          </thead>
          <tbody>
            @foreach($faskes as $f)
              <tr class="bg-white border-b">
                  <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                      {{ $f->id }}
                  </th>
                  <td class="px-6 py-4">
                      {{ $f->nama_faskes }}
                  </td>
                  <td class="px-6 py-4">
                      {{ $f->phone_hotline }}
                  </td>
                  <td class="px-6 py-4">
                      {{ $f->alamat_faskes }}
                  </td>
                  <td class="px-6 py-4">
                    <img src="{{ asset($f->img_faskes) }}" class="h-[50px] max-h-[50px] object-fill"/>
                  </td>
                  <td class="flex flex-row px-6 py-4 justify-center">
                    <button data-id="{{ $f->id }}" class="showEditModal block h-[25px] p-2 py-0 bg-tealblue rounded text-white font-bold mr-2">
                      <i class="fa-solid fa-pen-to-square"></i>
                    </button>
        
                    <button data-id="{{ $f->id }}" class="showDeleteModal block h-[25px] p-2 py-0 bg-danger rounded text-white font-bold">
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
  <div id="ModalCreateJanji" class="createModal fixed inset-0 flex hidden items-center justify-center bg-black bg-opacity-50" tabindex="-1">
    <div class="w-[30%] bg-white shadow-lg p-6 rounded">
      <!-- Konten Modal -->
        <form action="{{ route('admin.faskes.create') }}" method="post" enctype="multipart/form-data" class="space-y-3">
          @csrf

          
          <div class="flex justify-center items-center text-lg font-bold text-black">
            Tambah Fasilitas Kesehatan
          </div>

          <div class="w-[100%] border-b-2 border-gray pb-3"></div>

          <div>
            <label for="nama_faskes" class="block text-lg font-bold text-solidorange">Nama Fasilitas Kesehatan</label>
            <input type="text" name="nama_faskes" id="nama_faskes" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-tealblue peer" required/>
          </div>

          <div>
            <label for="phone_hotline" class="block text-lg font-bold text-solidorange">Hotline Fasilitas Kesehatan</label>
            <input type="text" name="phone_hotline" id="phone_hotline" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-tealblue peer" required/>
          </div>


          <div>
            <label for="alamat_faskes" class="block text-lg font-bold text-solidorange">Alamat Fasilitas Kesehatan</label>
            <input type="text" name="alamat_faskes" id="alamat_faskes" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-tealblue peer" required/>
          </div>


          <div>
            <label for="img_faskes" class="block text-lg font-bold text-solidorange">Foto Fasilitas Kesehatan</label>
            <input type="file" name="img_faskes" id="img_faskes" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-tealblue peer" required/>
          </div>


          <div class="flex flex-row space-x-2 justify-end items-center">
            <button type="submit" class="w-[30%] p-1 text-white bg-tealblue font-bold text-lg rounded-lg cursor-pointer focus:ring-4">
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
    @foreach($faskes as $f)
      <div id="ModalEditFaskes-{{ $f->id }}" class="editModal fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden" tabindex="-1">
        <div class="w-[30%] bg-white shadow-lg p-6 rounded">
          <!-- Konten Modal -->
          <form action="faskes/{{$f->id}}" method="post" class="space-y-3">
            @csrf
            @method('put')

            <div class="flex justify-center items-center text-lg font-bold text-black">
              Ubah Pesanan
            </div>

            <div class="w-[100%] border-b-2 border-gray opacity-30 pb-3"></div>

            <div>
              <label for="nama_faskes" class="block text-lg font-bold text-solidorange">Nama Fasilitas Kesehatan</label>
              <input type="text" value="{{ $f->nama_faskes }}" name="nama_faskes" id="nama_faskes" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-tealblue peer" required/>
            </div>
  
            <div>
              <label for="phone_hotline" class="block text-lg font-bold text-solidorange">Hotline Fasilitas Kesehatan</label>
              <input type="text" value="{{ $f->phone_hotline }}"  name="phone_hotline" id="phone_hotline" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-tealblue peer" required/>
            </div>
  
  
            <div>
              <label for="alamat_faskes" class="block text-lg font-bold text-solidorange">Alamat Fasilitas Kesehatan</label>
              <input type="text" value="{{ $f->alamat_faskes }}"  name="alamat_faskes" id="alamat_faskes" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-tealblue peer" required/>
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
  @foreach($faskes as $f)
  <div id="ModalHapusFaskes-{{ $f->id }}" class="deleteModal fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden" tabindex="-1">
    <div class="w-[30%] bg-white shadow-lg p-6 rounded">
      <!-- Konten Modal -->
      <form action="faskes/{{$f->id}}" method="post" class="space-y-3">
        @csrf
        @method('delete')

        <div class="flex justify-center items-center text-lg font-bold text-black">
          Hapus Faskes
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

          const modal = document.querySelector(`#ModalEditFaskes-${id}`);

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
        const modal = document.querySelector(`#ModalHapusFaskes-${id}`);
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
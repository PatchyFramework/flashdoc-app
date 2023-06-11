  {{-- Edit Modal --}}
  @foreach ($user as $u)
    <div id="ModalEditJanji{{$u->id}}" class="editModal fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden" tabindex="-1">
      <div class="w-[30%] bg-white shadow-lg p-6 rounded">
        <!-- Konten Modal -->
        <form action="{{ route('admin.edit', ['id' => $u->id]) }}" method="post" class="space-y-3">
          @method('put')
          @csrf
          <div class="flex justify-center items-center text-lg font-bold text-black">
            Edit Pasien
          </div>

          <div class="w-[100%] border-b-2 border-gray opacity-50 pb-3"></div>

          <div>
            <label for="name" class="block text-lg font-bold text-solidorange">Nama Pasien</label>
            <input type="text" name="name" id="name" value="{{$u->name}}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-tealblue peer">
          </div>

          <div>
            <label for="phone" class="block text-lg font-bold text-solidorange">Nomor Telepon</label>
            <input type="text" name="phone" id="phone" value="{{$u->phone}}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-tealblue peer">
          </div>

          <div>
            <label for="email" class="block text-lg font-bold text-solidorange">Email</label>
            <input type="email" name="email" id="email" value="{{$u->email}}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-tealblue peer">
          </div>

          <div>
            <label for="address" class="block text-lg font-bold text-solidorange">Alamat</label>
            <input type="textarea" name="address" id="address" value="{{$u->address}}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-tealblue peer">
          </div>

          <div class="flex flex-row space-x-2 justify-end items-center">
            <button type="submit" class="w-[30%] p-1 text-white bg-solidorange font-bold text-lg rounded-lg cursor-pointer focus:ring-4">
              Tambah
            </button>
            
            <div class="closeEditModal w-[30%] p-1 text-white bg-danger font-bold text-lg rounded-lg cursor-pointer focus:ring-4 text-center">
              Batal
            </div> 
          </div>
        </form>
      </div>
    </div>
  @endforeach
  {{-- End of Create Modal --}}
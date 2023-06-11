  {{-- Create Modal --}}
  {{-- <div id="ModalCreateJanji" class="createModal fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden" tabindex="-1">
    <div class="w-[30%] bg-white shadow-lg p-6 rounded">
      <!-- Konten Modal -->
      <form action="{{ route('admin.create') }}" method="post" class="space-y-3">
        @csrf --}}
        
        {{-- <div>
          <label for="name" class="block text-lg font-bold text-solidorange">Nama Pasien</label>
          <select name="user_id" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-tealblue peer">
            @foreach($user as $u)
                <option value="{{ $u->id }}">{{ $u->name }}</option>
            @endforeach
          </select>
        </div> --}}

{{--         
        <div class="flex justify-center items-center text-lg font-bold text-black">
          Tambah Pasien
        </div>

        <div class="w-[100%] border-b-2 border-gray opacity-50 pb-3"></div>

        <div>
          <label for="name" class="block text-lg font-bold text-solidorange">Nama Pasien</label>
          <input type="text" name="name" id="name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-tealblue peer">
        </div>

        <div>
          <label for="phone" class="block text-lg font-bold text-solidorange">Nomor Telepon</label>
          <input type="text" name="phone" id="phone" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-tealblue peer">
        </div>

        <div>
          <label for="email" class="block text-lg font-bold text-solidorange">Email</label>
          <input type="email" name="email" id="email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-tealblue peer">
        </div>

        <div>
          <label for="address" class="block text-lg font-bold text-solidorange">Alamat</label>
          <input type="textarea" name="address" id="address" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-tealblue peer">
        </div>

        <div>
          <label for="password" class="block text-lg font-bold text-solidorange">Password</label>
          <input type="password" name="password" id="password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-tealblue peer">
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
  </div> --}}
  {{-- End of Create Modal --}}



  <!-- Main modal -->
<div id="defaultModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Terms of Service
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="defaultModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    With less than a month to go before the European Union enacts new consumer privacy laws for its citizens, companies around the world are updating their terms of service agreements to comply.
                </p>
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    The European Union’s General Data Protection Regulation (G.D.P.R.) goes into effect on May 25 and is meant to ensure a common set of data rights in the European Union. It requires organizations to notify users as soon as possible of high-risk data breaches that could personally affect them.
                </p>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="defaultModal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                <button data-modal-hide="defaultModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
            </div>
        </div>
    </div>
</div>
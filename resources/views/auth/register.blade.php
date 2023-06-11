<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Tailwind Link --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <title>Register | Flashdoc Authentication</title>
</head>
<body class="font-quicksand">
    <div class="w-screen max-h-screen bg-white">
        <h1 class="flex font-bold text-solidorange my-3 text-4xl justify-center items-center">Flash<span class="text-tealblue">doc</span></h1>
        
        
        <h1 class="flex font-bold text-solidorange my-3 text-xl justify-center items-center">Regis<span class="text-tealblue">ter</span></h1>

        
        <div class="flex justify-center items-center">
            <div class="w-[30%] bg-white shadow-lg p-6 rounded">
                <!-- Konten Modal -->
                  <form action="{{ route('registerpost') }}" method="post" class="space-y-3">
                    @csrf
          
                    <div>
                        <label for="name" class="block text-lg font-bold text-solidorange">Nama Lengkap</label>
                        <input type="text" name="name" id="name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-tealblue peer" placeholder="Masukkan Nama Lengkap...." required>
          

                        <label for="phone" class="block text-lg font-bold text-tealblue">Nomor Telepon</label>
                        <input type="text" name="phone" id="phone" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-solidorange peer" placeholder="Masukkan Nomor Telepon...." required>
                        

                        <label for="email" class="block text-lg font-bold text-solidorange">Email</label>
                        <input type="email" name="email" id="email"  class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-tealblue peer" placeholder="Masukkan Email...." required>
          

                        <label for="address" class="block text-lg font-bold text-tealblue">Alamat Lengkap</label>
                        <input type="text" name="address" id="address" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-solidorange peer" placeholder="Masukkan Nama Lengkap...." required>


                        <label for="password" class="block text-lg font-bold text-solidorange">Password</label>
                        <input type="password" name="password" id="password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-solidorange peer" placeholder="Masukkan Password...." required>


                        <label for="confirm_password" class="block text-lg font-bold text-tealblue">Confirm Password</label>
                        <input type="password" name="confirm_password" id="confirm_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-tealblue peer" placeholder="Masukkan Kembali Password...." required>
                    </div>
          
                    <div class="flex flex-col space-x-2 justify-end items-center">
                      <button type="submit" class="w-full p-1 text-white bg-tealblue font-bold text-lg rounded-lg cursor-pointer focus:ring-4">
                        Register
                      </button>

                      <p class="flex mt-2 mb-0 justify-center items-center text-sm">Sudah punya akun? <a href="login" class="text-tealblue font-bold">Login</a></p>
                    </div>
                  </form>
            </div>
        </div>
    </div>
</body>
</html>
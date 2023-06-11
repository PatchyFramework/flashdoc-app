




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Tailwind Link --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <title>Login | Flashdoc Authentication</title>
</head>
<body class="font-quicksand">
    <div class="w-screen max-h-screen bg-white">
        <h1 class="flex font-bold text-solidorange my-7 text-4xl justify-center items-center">Flash<span class="text-tealblue">doc</span></h1>
        
        
        <h1 class="flex font-bold text-solidorange my-7 text-2xl justify-center items-center">Log<span class="text-tealblue">in</span></h1>

        
        <div class="flex justify-center items-center">
            <div class="w-full max-w-sm p-6 bg-white drop-shadow-lg rounded-lg">
                <form action="{{ route('loginpost')}}" method="post" class="space-y-3">
                    @csrf
                    <div>
                        <label for="email" class="block text-lg font-bold text-solidorange">Email</label>
                        <input type="email" name="email" id="email"  class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-tealblue peer" placeholder="Masukkan Email....">
                    </div>
                    <div>
                        <label for="password" class="block text-lg font-bold text-tealblue">Password</label>
                        <input type="password" name="password" id="password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-solidorange peer" placeholder="Masukkan Password....">
                    </div>

                    <button type="submit" class="w-full p-1 text-white bg-solidorange font-bold text-lg rounded-lg cursor-pointer focus:ring-4">
                        Login
                    </button>   
                </form>

                <div class="mt-2">
                    <div class="flex items-center opacity-50 mb-2">
                        <hr class="flex-grow border-gray-300">
                        <span class="mx-4 text-gray-300">or</span>
                        <hr class="flex-grow border-gray-300">
                    </div>
                    <a href="register" class="flex justify-center w-full p-1 text-white bg-tealblue font-bold text-lg rounded-lg cursor-pointer focus:ring-4">Register</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>




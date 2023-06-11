<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
        {{-- Tailwind Link --}}
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    

        {{-- Script Font Awesome --}}
        <script src="https://kit.fontawesome.com/2356e25dd7.js" crossorigin="anonymous"></script>
    
        <title>@yield('title')| Flashdoc</title>
    </head>
    <body class="font-quicksand">
        <div class="flex-col h-[70px]">
            <div class="flex justify-center items-center h-full shadow-lg border border-b-2 border-gray-300">
                <div class="items-center font-normal text-xl mx-4 px-5">
                    <a href="{{ route('user.homepage') }}" class="flex font-bold text-solidorange my-7 text-3xl justify-start items-center">Flash<span class="text-tealblue">doc</span></a>
                </div>
    
                <div class="flex flex-row space-x-4 bg-white font-normal text-lg justify-center items-center flex-grow px-5">
                    <a href="{{ route('user.janji') }}" class="text-black hover:text-tealblue">Janji Dokter</a>
                    <a href="{{ route('user.flashpharmacy') }}" class="text-black hover:text-solidorange">Flashpharmacy</a>
                </div>
    
                <div class="flex items-center justify-center space-x-3 text-md font-normal px-5">
                    @guest
                        <!-- Tampilkan tombol login jika user belum login -->
                        <a href="{{ route('login') }}" class="bg-tealblue text-white hover:bg-white hover:text-tealblue hover:border-none hover:transition hover:duration-300 text-sm p-2 font-bold rounded">
                            Login
                        </a>
                    @else
                        <!-- Tampilkan nama user dan tombol logout jika user sudah login -->
                        <img src="{{ asset('storage/photos/placeholder.png') }}" alt="Admin Photo" class="h-[50px] max-h-[50px] object-fill"/>
                        <p class="text-md font-bold">{{ Auth::user()->name }}</p> 
                        <a href="{{ route('logout') }}" class="bg-danger text-black hover:bg-black hover:text-danger hover:border-none hover:transition hover:duration-300 text-sm p-2 font-bold rounded">
                            Logout
                        </a>
                    @endguest
                </div>
            </div>
    
            @yield('content')
        </div>
    </body>
    
    
</html>
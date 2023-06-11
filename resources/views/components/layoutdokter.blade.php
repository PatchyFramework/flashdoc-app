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
        <div class="flex mx-auto">
            <div class="flex-row my-auto basis-[20%] bg-darkblue h-screen pt-10">
                <h1 class="flex font-bold text-solidorange text-4xl justify-center items-center">Flash<span class="text-tealblue">doc</span></h1>
                <h1 class="flex font-bold text-solidorange text-xl justify-center items-center">Doctor</h1>



                <div class="h-[600px] flex items-center justify-center">
                    <div class="h-[200px] w-[250px] flex flex-col items-center justify-center rounded-xl text-white bg-[#042A3E] p-3 space-y-5">
                        <div class="border-b-2 border-white p-2 w-[90%] space-x-2 hover:text-solidorange">
                            <i class="fa-solid fa-house"></i>
                            <a href="dashboard" class="focus:text-solidorange">Dashboard</a>
                        </div>



                        <div class="border-b-2 border-white p-2 w-[90%] space-x-2 hover:text-solidorange">
                            <i class="fa-solid fa-user-doctor"></i>
                            <a href="janjidokter" class="hover:text-solidorange focus:text-solidorange">Janji Dokter</a>
                        </div>



                        <div class="border-b-2 border-white p-2 w-[90%] space-x-2 hover:text-solidorange">
                            <i class="fa-solid fa-mortar-pestle"></i>
                            <a href="flashpharmacy" class="hover:text-solidorange focus:text-solidorange">Flashpharmacy</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex-col h-[70px] shadow-lg basis-[80%] px-5">
                <div class="flex justify-between items-center h-full">
                    <div class="flex-grow items-center font-normal text-xl mx-4">
                        @yield('title')
                    </div>



                    <div class="flex items-center justify-center space-x-3 text-md font-normal">
                        <img src="{{ asset('storage/photos/placeholder.png') }}" alt="Admin Photo" class="h-[50px] max-h-[50px] object-fill"/>
                        <p class="text-md font-bold">{{ Auth::guard('dokter')->user()->name }}</p> 
                        <a href="{{ route('logout') }}" class="bg-danger text-black hover:bg-black hover:text-danger hover:border-none hover:transition hover:duration-300 text-sm p-2 font-bold rounded">
                            Logout
                        </a>
                    </div>

                </div>


                
                @yield('content')
            </div>
        </div>
</body>
</html>
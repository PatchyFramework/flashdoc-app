@extends('./components/layoutuser')

@section('title', 'Homepage')

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
    <div class="w-full p-5 bg-solidblue h-[400px]">
        <div class="flex flex-row justify-center items-center h-full space-x-5">
            <div class="w-fit space-y-1 mr-7">
                <h1 class="font-bold text-xl text-white">Cari Layanan Kesehatan di Bogor <br> Hanya Dengan Satu Klik!</h1>
                <p class="text-lg text-white">Layanan Bantuan Kesehatan Daerah Bogor</p>
            </div>

            <div class="w-fit space-y-1 ml-7">
                <img src="storage/photos/homepage1.png" alt="Homepage Photo" class="w-[327px] h-[339px] relative z-10">
            </div>
        </div>
    </div>

    <div class="w-fit p-4 h-[191px] mx-auto">
        <div class="flex flex-row justify-center items-center bg-white rounded-lg shadow-lg space-x-4 p-6 -mt-20 relative z-20">
            <div class="flex flex-col w-[300px] space-y-3 text-solidblue justify-center items-center">
                <i class="fa-solid fa-user-doctor fa-3x"></i>
                <a href="{{route('user.janji')}}" class="text-lg" >Janji Dokter</a>
            </div>

            <div class="flex flex-col w-[300px] space-y-3 text-solidorange justify-center items-center">
                <i class="fa-solid fa-mortar-pestle fa-3x"></i>
                <a href="{{route('user.flashpharmacy')}}" class="text-lg" >Flashpharmacy</a>
            </div>
        </div>
    </div>
</body>

@endsection
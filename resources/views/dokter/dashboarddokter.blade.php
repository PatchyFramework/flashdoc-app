@extends('./components/layoutdokter')

@section('title', 'Dashboard Dokter')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
       {{-- Tailwind Link --}}
       <link href="{{ asset('css/app.css') }}" rel="stylesheet">


   
    <title>@yield('title')| Flashdoc</title>

</head>
<body class="max-h-screen">
  <div class="mx-auto w-[95%] p-4">

  {{-- Overview --}}
    <div class="p-2">
      <div class="w-fit flex flex-row bg-darkblue text-white font-bold rounded-lg py-2 px-2 mb-[1%]">
        <i class="fa-solid fa-bars rounded-l-lg px-2 flex items-center justify-center"></i> 
        <div class="px-3 rounded-r-lg ">
            Overview
        </div>
      </div>

      <div class="w-full h-[30%] flex flex-row justify-center items-center rounded-lg py-2 px-2 space-x-10">
        <div class="w-[35%] bg-white pt-8 pb-2 rounded-lg shadow-lg border-gray-300 border-opacity-50 border">
          <div class="flex justify-center items-center  space-x-10">
            <div class="font-bold text-4xl text-solidorange -ml-4">{{ $janjicount }}</div>

            <div class="flex flex-col text-black">
              <p class="font-bold text-base">Janji Dokter</p>
              <p class="font-normal text-sm">Tersedia</p>
            </div>
          </div>

          <a href="{{ route('dokter.janji.index') }}" class="flex justify-end text-solidorange text-xs mr-5 mt-3">Lihat Data ></a>

        </div>




        <div class="w-[35%] bg-white pt-8 pb-2 rounded-lg shadow-lg border-gray-300 border-opacity-50 border">
          <div class="flex justify-center items-center space-x-5">
            <div class="font-bold text-4xl text-solidorange ml-4">{{ $flashpharmacycount }}</div>

            <div class="flex flex-col text-black">
              <p class="font-bold text-base">Order Flashpharmacy</p>
              <p class="font-normal text-sm">Telah Dibuat</p>
            </div>
          </div>

          <a href="{{ route('dokter.flashpharmacy.index') }}" class="flex justify-end text-solidorange text-xs mr-5 mt-3">Lihat Data ></a>

        </div>
      </div>
    </div>
  {{-- End of Overview --}}
  

  {{-- Grafik Progres Flashdoc --}}
    <div class="p-2">
      <div class="w-fit flex flex-row bg-darkblue text-white font-bold rounded-lg py-2 px-2 mb-[1%]">
        <i class="fa-solid fa-bars rounded-l-lg px-2 flex items-center justify-center"></i> 
        <div class="px-3 rounded-r-lg ">
            Grafik Progres Janji dan Flashpharmacy
        </div>
      </div>

      <div class="bg-white rounded-lg shadow-md w-full h-[350px] border-gray-300 border-opacity-50 border">
        <canvas id="myChart"></canvas>
      </div>
    </div>
  {{-- End of Grafik Progres Flashdoc --}}
  </div>


  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember', 'Januari', 'Februari', 'Maret', 'April', 'Mei'],
            datasets: [
                {
                    label: 'Janji',
                    data: [{{$janjicount}}],
                    backgroundColor: 'rgba(255, 99, 132, 0.2)', // Warna latar belakang untuk data janji
                    borderColor: 'rgba(255, 99, 132, 1)', // Warna border untuk data janji
                    borderWidth: 1
                },
                {
                    label: 'Flashpharmacy',
                    data: [{{$flashpharmacycount}}],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)', // Warna latar belakang untuk data flash pharmacy
                    borderColor: 'rgba(54, 162, 235, 1)', // Warna border untuk data flash pharmacy
                    borderWidth: 1
                },
            ]
        },
        options: {
            maintainAspectRatio: false,
            layout: {
                padding: 20,
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
  </script>
</body>
</html>


@endsection
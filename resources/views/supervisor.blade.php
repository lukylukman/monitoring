{{-- <x-app-layout>
    <x-slot name="header">
        {{ __('Dashboard') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">
        {{ __('You are logged in!') }}
    </div>
    

            <div class="container">
                @yield('field')
                </div>
</x-app-layout> --}}
<x-app-layout>
  <x-slot name="header">
    {{ __('Dashboard') }}
</x-slot>

<div class="p-4 bg-white rounded-lg shadow-xs">
    {{-- {{ __('Login Sebagai Supervisor') }} --}}
    Login Sebagai Supervisor
</div>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
      <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/>
      <!--Replace with your tailwind.css once created-->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js" integrity="sha256-XF29CBwU1MWLaGEnsELogU6Y6rcc5nCkhhx89nFMIDQ=" crossorigin="anonymous"></script>
  
      <div class="flex flex-wrap mt-7">
          <div class="w-full md:w-1/2 xl:w-1/3 p-3">
              <!--Metric Card-->
              <a href="{{ route('lihatLaporan') }}">
              <div class="bg-white rounded shadow-md p-2 hover:bg-green-100 hover:scale-110  hover:bg-green-100 hover:scale-110 duration-300">
                  <div class="flex flex-row items-center">
                          <div class="flex-shrink pr-4">
                              <div class="rounded p-3 bg-indigo-600"><i class="fas fa-tasks fa-2x fa-fw fa-inverse"></i></div>
                          </div>
                      <div class="flex-1 text-right md:text-center">
                          <h5 class="font-bold uppercase text-gray-500">Lihat</h5>
                          <h3 class="font-bold text-3xl"> <span class="text-green-500">Laporan<i class="fas fa-caret-up"></i></span></h3>
                      </div>
                  </div>
              </div>
          </a>
              <!--/Metric Card-->
          </div>
          <div class="w-full md:w-1/2 xl:w-1/3 p-3">
              <!--Metric Card-->
              <a href="{{ route('users.index') }}">
              <div class="bg-white rounded shadow-md p-2 hover:bg-green-100 hover:scale-110 duration-300">
                  <div class="flex flex-row items-center">
                      <div class="flex-shrink pr-4">
                          <div class="rounded p-3 bg-pink-600"><i class="fas fa-users fa-2x fa-fw fa-inverse"></i></div>
                      </div>
                      <div class="flex-1 text-right md:text-center">
                          <h5 class="font-bold uppercase text-gray-500">Manage</h5>
                          <h3 class="font-bold text-3xl">Users <span class="text-pink-500"><i class="fas fa-exchange-alt"></i></span></h3>
                      </div>
                  </div>
              </div>
          </a>
              <!--/Metric Card-->
          </div>
          {{-- <div class="w-full md:w-1/2 xl:w-1/3 p-3">
              <!--Metric Card-->
              <div class="bg-white rounded shadow-md p-2 hover:bg-green-100 hover:scale-110 duration-300">
                  <div class="flex flex-row items-center">
                      <div class="flex-shrink pr-4">
                          <div class="rounded p-3 bg-yellow-600"><i class="fas fa-user-plus fa-2x fa-fw fa-inverse"></i></div>
                      </div>
                      <div class="flex-1 text-right md:text-center">
                          <h5 class="font-bold uppercase text-gray-500">Update Data Order</h5>
                          <h3 class="font-bold text-3xl">2 <span class="text-yellow-600"><i class="fas fa-caret-up"></i></span></h3>
                      </div>
                  </div>
              </div>
              <!--/Metric Card-->
          </div> --}}
          <a href="{{ route('about') }}">
          <div class="w-full md:w-1/2 xl:w-1/3 p-3">
              <!--Metric Card-->
              
              <div class="bg-white rounded shadow-md p-2 hover:bg-green-100 hover:scale-110 duration-300">
                  <div class="flex flex-row items-center">
                      <div class="flex-shrink pr-4">
                          <div class="rounded p-3 bg-blue-600"><i class="fas fa-server fa-2x fa-fw fa-inverse"></i></div>
                      </div>
                      <div class="flex-1 text-right md:text-center">
                          <h5 class="font-bold uppercase text-gray-500">Update</h5>
                          <h3 class="font-bold text-3xl">Data Order</h3>
                      </div>
                  </div>
              </div>
          </a>
              <!--/Metric Card-->
          </div>
         
              <!--Metric Card-->
              
              <!--/Metric Card-->
              <div class="bg-white border rounded shadow m-2 w-full  hover:bg-gray-200 duration-200">
                  <a href="{{ route('monitor') }}">
                  <div class="border-b p-3 duration-200 hover:bg-teal-400 ">
                      <h5 class="font-bold uppercase text-center hover:scale-110 duration-200 text-gray-600">Graph</h5>
                  </div>
                  <div class="p-5">
                      <canvas id="chartjs-0" class="chartjs" width="undefined" height="undefined"></canvas>
                      <script>
                      new Chart(document.getElementById("chartjs-0"), {
                          "type": "line",
                          "data": {
                              "labels": ["January", "February", "March", "April", "May", "June", "July"],
                              "datasets": [{
                                  "label": "Views",
                                  "data": [65, 59, 80, 81, 56, 55, 40],
                                  "fill": false,
                                  "borderColor": "rgb(75, 192, 192)",
                                  "lineTension": 0.1
                              }]
                          },
                          "options": {}
                      });
                      </script>
                  </div>
                  </a>
              </div>
  
              
              <div class="bg-white border rounded shadow m-2 w-full mt-3">
                  <div class="border-b p-3">
                      <h5 class="font-bold uppercase text-gray-600">Graph</h5>
                  </div>
                  <div class="p-5">
                      <canvas id="chartjs-1" class="chartjs" width="undefined" height="undefined"></canvas>
                      <script>
                      new Chart(document.getElementById("chartjs-1"), {
                          "type": "bar",
                          "data": {
                              "labels": ["January", "February", "March", "April", "May", "June", "July"],
                              "datasets": [{
                                  "label": "Likes",
                                  "data": [65, 59, 80, 81, 56, 55, 40],
                                  "fill": false,
                                  "backgroundColor": ["rgba(255, 99, 132, 0.2)", "rgba(255, 159, 64, 0.2)", "rgba(255, 205, 86, 0.2)", "rgba(75, 192, 192, 0.2)", "rgba(54, 162, 235, 0.2)", "rgba(153, 102, 255, 0.2)", "rgba(201, 203, 207, 0.2)"],
                                  "borderColor": ["rgb(255, 99, 132)", "rgb(255, 159, 64)", "rgb(255, 205, 86)", "rgb(75, 192, 192)", "rgb(54, 162, 235)", "rgb(153, 102, 255)", "rgb(201, 203, 207)"],
                                  "borderWidth": 1
                              }]
                          },
                          "options": {
                              "scales": {
                                  "yAxes": [{
                                      "ticks": {
                                          "beginAtZero": true
                                      }
                                  }]
                              }
                          }
                      });
                      </script>
                  </div>
              </div>
              </div>
         
          </x-app-layout>
  
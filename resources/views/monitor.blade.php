<!DOCTYPE html>
<html lang="en">
  <meta http-equiv="content-type" content="text/html;charset=utf-8" />
  <head>
    <!-- Meta tags  -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
    />

    <title>Monitoring</title>
    <link rel="icon" type="image/png" href="{{ asset('/images/favicon.ico') }}" alt="Logo" />

    <!-- CSS Assets -->
    @vite(['resources/css/style_monitor.css', 'resources/js/app_monitor.js', 'resources/js/script.js', 'resources/images/favicon.ico'])
        <!-- Scripts -->
        <script src="{{ asset('js/init-alpine.js') }}"></script>
        <link rel="stylesheet" href="{{('../css/style_monitor.css')}}"/>

    <!-- Javascript Assets -->


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap"
      rel="stylesheet"
    />
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  </head>

  <body x-data class="is-header-blur" x-bind="$store.global.documentBody">
    <!-- App preloader-->
    <div
      id="preloader"
      class="app-preloader fixed z-50 grid h-full w-full place-content-center bg-slate-50 dark:bg-navy-900"
    >
      <div class="app-preloader-inner relative inline-block h-48 w-48"></div>
    </div>

    <!-- Page Wrapper -->
    <div
      id="root"
      class="min-h-100vh flex grow bg-slate-50 dark:bg-navy-900"
      x-cloak
    >
      <!-- App Header Wrapper-->
      <nav class="header print:hidden">
        <!-- App Header  -->
        <div
          class="header-container relative flex w-full bg-white dark:bg-navy-700 print:hidden"
        >
          <!-- Header Items -->
          <div class="flex w-full items-center justify-between">
            <!-- Left: Sidebar Toggle Button -->
            <div class="flex items-center space-x-2">
              <div>
                <div
                  class="h-15 w-15 rounded-full"
                  id="header_logo"
                  >
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                    <path fill-rule="evenodd" d="M2.25 5.25a3 3 0 013-3h13.5a3 3 0 013 3V15a3 3 0 01-3 3h-3v.257c0 .597.237 1.17.659 1.591l.621.622a.75.75 0 01-.53 1.28h-9a.75.75 0 01-.53-1.28l.621-.622a2.25 2.25 0 00.659-1.59V18h-3a3 3 0 01-3-3V5.25zm1.5 0v7.5a1.5 1.5 0 001.5 1.5h13.5a1.5 1.5 0 001.5-1.5v-7.5a1.5 1.5 0 00-1.5-1.5H5.25a1.5 1.5 0 00-1.5 1.5z" clip-rule="evenodd" />
                  </svg>
                  
                  
                </div>
              </div>
              <h1
                class="text-2xl font-bold tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100 text-center"
                
              >
                Monitoring Order
              </h1>
            </div>
            <div class="justify-items-center hover:bg-green-700 hover:scale-110 duration-300">
              <a href="{{ url('/dashboard') }}">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 hover:fill-blue-900">
                <path d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z" />
                <path d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z" />
              </svg>
            </a>
            </div>

            <!-- Right: Header buttons -->
            <div class="-mr-1.5 flex items-center space-x-2">
              <!-- Dark Mode Toggle -->
              <button
                @click="$store.global.isDarkModeEnabled = !$store.global.isDarkModeEnabled"
                class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
              >
                <svg
                  x-show="$store.global.isDarkModeEnabled"
                  x-transition:enter="transition-transform duration-200 ease-out absolute origin-top"
                  x-transition:enter-start="scale-75"
                  x-transition:enter-end="scale-100 static"
                  class="h-6 w-6 text-amber-400"
                  fill="currentColor"
                  viewbox="0 0 24 24"
                >
                  <path
                    d="M11.75 3.412a.818.818 0 01-.07.917 6.332 6.332 0 00-1.4 3.971c0 3.564 2.98 6.494 6.706 6.494a6.86 6.86 0 002.856-.617.818.818 0 011.1 1.047C19.593 18.614 16.218 21 12.283 21 7.18 21 3 16.973 3 11.956c0-4.563 3.46-8.31 7.925-8.948a.818.818 0 01.826.404z"
                  />
                </svg>
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  x-show="!$store.global.isDarkModeEnabled"
                  x-transition:enter="transition-transform duration-200 ease-out absolute origin-top"
                  x-transition:enter-start="scale-75"
                  x-transition:enter-end="scale-100 static"
                  class="h-6 w-6 text-amber-400"
                  viewbox="0 0 20 20"
                  fill="currentColor"
                >
                  <path
                    fill-rule="evenodd"
                    d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                    clip-rule="evenodd"
                  />
                </svg>
              </button>
            </div>
          </div>
        </div>
      </nav>

      <!-- Main Content Wrapper -->
      <main class="main-content p-8 space-y-3 w-full">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-3">
          <!-- Security Culture/Avatar/Risk/ -->
          <div class="lg:col-span-3 grid grid-cols-1 lg:grid-cols-3 gap-3">
            <!-- Security Culture Avatar -->
            
           
              <!-- Total Phishing Simulations -->
              <div class="card rounded-lg p-4 text-white space-y-4">
                <div class="border-b border-slate-200 dark:border-navy-500 pb-3">
                  <h2
                    class="font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100 lg:text-base text-center"
                  >
                    Total Order Bulan Ini
                  </h2>
                </div>
                <div class="total_phishing_container">
                  <p
                    class="text-4xl tracking-tight text-primary dark:text-accent-light text-center"
                  >
                 {{ number_format($totalOrder,0) }}

                  </p>
                </div>
              </div>
    
              <!-- Total Reported Simulations -->
              <div class="card rounded-lg p-4 text-white space-y-4">
                <div class="border-b border-slate-200 dark:border-navy-500 pb-3">
                  <h2
                    class="font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100 lg:text-base text-center"
                  >
                    Sisa Order Bulan Ini
                  </h2>
                </div>
                <div class="total_reported_container">
                  <p
                    class="text-4xl tracking-tight text-primary dark:text-accent-light text-center"
                  >
                  {{ number_format($totalOrderKirim,0) }}
                  </p>
                </div>
              </div>
    
              <!-- Total Breaches Simulations -->
              <div class="card rounded-lg p-4 text-white space-y-4">
                <div class="border-b border-slate-200 dark:border-navy-500 pb-3">
                  <h2
                    class="font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100 lg:text-base text-center"
                  >
                  Total Selesai Kemarin
                  </h2>
                </div>
                <div class="total_breaches_container">
                  <p
                    class="text-4xl tracking-tight text-primary dark:text-accent-light text-center"
                  >
                    {{-- {{ number_format($totalKemasHariSebelumnya,0) }} --}}
                    {{ number_format($totalKemasHariSebelumnya,0) }}
                  </p>
                </div>
              </div>
    
              <!-- -->
              {{-- <div class="card rounded-lg p-4 text-white space-y-4">
                <div class="border-b border-slate-200 dark:border-navy-500 pb-3">
                  <h2
                    class="font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100 lg:text-base text-center"
                  >
                    Total Target Order Hari ini
                  </h2>
                </div>
                <div class="total_reported_real_phishing_container">
                  <p
                    class="text-4xl tracking-tight text-primary dark:text-accent-light text-center"
                  >
                    -
                  </p>
                </div>
              </div> --}}
            <!-- Security Culture Timeline Chart -->
            {{-- <div class="lg:col-span-2 card px-4 pb-4">
              <div class="my-3 flex h-8 items-center justify-between">
                <h2
                  class="font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100 lg:text-base"
                >
                  Graph
                </h2>
              </div>
              <div>
                <div class="mt-5" id="security_culture_activity">
                  <div
                    x-init="$nextTick(() => { $el._x_chart = new ApexCharts($el,pages.charts.influencerActivity); $el._x_chart.render() });"
                  ></div>
                </div>
              </div>
            </div> --}}

            

        <!-- Activity Layout -->
        

            <!-- KNOWLEDGE ACTIVITY -->
            

        <!-- Total Simulations Layout -->
        
      </main>
    </div>
    <!-- 
        This is a place for Alpine.js Teleport feature 
        @see https://alpinejs.dev/directives/teleport
      -->
    <div id="x-teleport-target"></div>
    <script src="{{ asset('js/script.js') }}"></script>
    <script>
      window.addEventListener('DOMContentLoaded', async () => {
        // Test Request:

        const headers = new Headers()
        headers.append('X-Requested-With', 'XMLHttpRequest')

        fetch(
          'https://proxy.cors.sh/https://fotka.com/v3/users/schools?name=uni',
          {
            method: 'GET',
            headers: headers,
          }
        )
          .then((response) => response.json())
          .then((data) => console.log(data))
          .catch((error) => console.error(error))

        Alpine.start()
      })
    </script>
  </body>
</html>

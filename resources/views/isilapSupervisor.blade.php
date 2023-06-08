<x-app-layout>
  <x-slot name="header">
      {{ __('Detail Laporan') }}
  </x-slot>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"
  <div class="p-4 bg-white rounded-lg shadow-xs">
      <div class="container">
          <center>
              
          </center>
   
          
   
          

          <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
              <div class="p-4">
                  <label for="table-search" class="sr-only">Search</label>
                  <div class="relative mt-1">
                      
                      <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                          <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                              xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd"
                                  d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                  clip-rule="evenodd"></path>
                          </svg>
                      </div>
                      <input type="text" id="table-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 pl-10 p-2.5   dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for items">
              </div>
                  </div>
                  <div class="px-4 py-2 -mx-3 bg-gray-100 shadow-md">
                    {{-- @auth
                    <form method="post" action="/isilaporan" class="w-full max-w-sm">
                      <div class="flex items-center border-b border-teal-500 py-2 w-50">
                        @csrf
                        @method('POST')
                        <input type="text" class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" aria-label="Full name" id="scanbar" name="scanbar" autofocus='true' placeholder="Scan here"/>
                        <input type="hidden" value="{{ $laporan['id'] }}" id="idlaporan" name="idlaporan"/>
                      </div>
                    </form>
                    @else
                        <input style="margin-bottom: 5px; margin-top: 5px;" type="text" id="scanbar" name="scanbar" autofocus='true' placeholder="Scan here" readonly/>
                    @endauth --}}
                  </div>
                  <table class="m-2" border="0" style="margin-bottom: 5px;margin-top: 25px;">
                    <tr>
                        <td>ID Laporan
                        </td>
                        <td>&nbsp;:&nbsp;&nbsp;</td>
                        <td> {{ $laporan['id'] }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal
                        </td>
                        <td>&nbsp;:&nbsp;&nbsp;</td>
                        <td>{{ $laporan['tanggal_laporan'] }}</td>
                    </tr>
                    <tr>
                        <td>Petugas
                        </td>
                        <td>&nbsp;:&nbsp;&nbsp;</td>
                        <td> {{ $laporan->user->name }}</td>
                        <td>
                          <form action="{{ auth()->user()->role === 'supervisor' ? route('printSupervisor', ['id' => $laporan['id']]) : (auth()->user()->role === 'admin' ? route('printAdmin', ['id' => $laporan['id']]) : '') }}" target="_blank">
                              <input type="submit" value="Print" />
                          </form></td>
                    </tr>
                </table>
                <table border="0">
                    <tr>
                        
                    </tr>
                </table>
                
                  <table class="w-full mb-5 text-sm text-center text-left text-gray-600 ">
                      <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                          <tr class="bg-primary text-white">
                              <th scope="col" class="px-6 py-3">
                                  No
                              </th>
                              <th scope="col" class="px-6 py-3">
                                  PO
                              </th>
                              <th scope="col" class="px-6 py-3">
                                  OBC
                              </th> 
                              <th scope="col" class="px-6 py-3">
                                  SERI
                              </th>
                              <th scope="col" class="px-6 py-3">
                                  PERSONALISASI
                              </th>
                              <th scope="col" class="px-6 py-3">
                                JUMLAH
                                </th>
                              
                          </tr>
                      </thead>
                      <tbody>
                        <?php $no = 1; ?>
                        @foreach ($isilaporan as $isi)
                              
                          <tr
                              class="bg-white border-b hover:bg-gray-50 ">
                              
                              <th scope="row" class="px-6 py-4 font-medium text-gray-900  whitespace-nowrap">
                                <?php echo $no++;?>
                              </th>
                              <td class="px-6 py-4">
                                  {{$isi->nopo}}
                              </td>
                              <td class="px-6 py-4">
                                  {{$isi->OBC}}
                              </td>
                              <td class="px-6 py-4">
                                  {{$isi->SERI}}
                              </td>
                              <td class="px-6 py-4">
                                {{$isi->Personalisasi}}
                            </td>
                            <td>
                              {{$isi->GR}}
                          </td>
                          
                              {{-- <td class="px-6 py-4 text-right">
                                  <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                              </td> --}}
                          </tr>
                          @endforeach
                        <div class="">
                              <tr>
                                <td colspan="7">
                                    Jumlah P : {{ $jumlah_p }}
                                </td>
                            </tr>
                            <tr>
                                <td colspan="7">
                                    Jumlah NP : {{ $jumlah_np }}
                                </td>
                            </tr>
                            <tr>
                                <td colspan="7">
                                    Jumlah Total : {{ $jumlah_total }}
                                </td>
                            </tr>
                          </div>
                      </tbody>
                  </table>
              </div>
              <script src="https://unpkg.com/flowbite@1.3.4/dist/flowbite.js"></script>
          <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

   
          
          
      </div>
  </div>

</x-app-layout>

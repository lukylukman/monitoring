<x-app-layout>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"
    <div class="p-4 bg-white rounded-lg shadow-xs">
        <div class="container">
            {{-- notifikasi form validasi --}}
            @if ($errors->has('file'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('file') }}</strong>
            </span>
            @endif
     
            {{-- notifikasi sukses --}}
            @if ($sukses = Session::get('sukses'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>{{ $sukses }}</strong>
            </div>
            @endif
     
            <!-- Import Excel -->
            <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form method="post" action="/data_import" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                            </div>
                            <div class="modal-body">
     
                                {{ csrf_field() }}
     
                                <label>Pilih file excel</label>
                                <div class="form-group">
                                    <input type="file" name="file" required="required">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Import</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-3">
                <div class="p-4">
                    <button type="button" class="btn btn-outline-primary hover:scale-105 duration-200" data-toggle="modal" data-target="#importExcel">
                        <i data-feather="upload" width="20px"></i>.XlS
                    </button><h5></h5>
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
                        <div class="m-1">
                            {{ $dataOD->links() }}
                            </div>
                    </div>
                    <table class="w-full text-sm text-center text-left text-gray-600 ">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                            <tr class="bg-primary text-white">
                                <th scope="col" class="px-6 py-3">
                                    TGL OBC
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    NOPO
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    OBC
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    KODE PABRIK
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    QTY PESAN
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dataOD as $w)
                                
                            <tr
                                class="bg-white border-b hover:bg-gray-50 ">
                                
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900  whitespace-nowrap">
                                    {{$w->Tgl_OBC}}
                                </th>
                                <td class="px-6 py-4">
                                    {{$w->NOPO}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$w->OBC}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$w->KODE_PABRIK}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$w->QTY_PESAN}}
                                </td>
                            </tr>
                            @endforeach
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


<x-app-layout>
  <x-slot name="header">
		{{ __('Laporan Harian') }}
</x-slot>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"
<div class="p-4 bg-white rounded-lg shadow-xs">
		<div class="container">

				<button type="button"  class="mb-2 btn btn-primary mr-5" data-toggle="modal" data-target="#importExcel">
					<i data-feather="file-plus"></i>
				</button>
				<a href="{{ route('laporan_w&m') }}" class="mb-2 btn btn-primary mr-5">
					Laporan Mingguan & Bulanan
			</a>
 
				<!-- modal buat LAPORAN -->
				<div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
								<form action="/buatlaporan" method="POST">
										@csrf
										<div class="modal-content">
												<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel">Buat Laporan</h5>
												</div>
												<div class="modal-body">
 
														{{ csrf_field() }}
 
														<div class="form-floating">
															<label for="floatingInput">Tanggal Laporan</label>
															<input type="date" class="form-control" id="floatingInput" value="{{ date('Y-m-d') }}" name="id">
															
														</div>
														<div class="form-floating mt-1">
															<label for="floatingInput">Petugas</label>
															<input type="text" class="form-control" id="floatingInput" name="petugas" value="{{ auth()->user()->name }}" readonly>
															<label class="mt-1" for="floatingInput">ID Petugas</label>
															<input type="text" class="form-control" name="user_id" id="user_id" value="{{ auth()->user()->id }}" readonly>
														</div>
												</div>
												<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
														<button type="submit" class="btn btn-primary">Buat</button>
												</div>
										</div>
								</form>
						</div>
				</div>
				<div class="relative overflow-x-auto shadow-md sm:rounded-lg mb-5">
						<div class="p-4">
								
								<div class="relative mt-1">
										
									@if(session()->has('success'))
										<div id="alert-4" class="flex p-4 mb-4 text-white rounded-lg bg-green-600 " role="alert">
											{{ session('success') }}
											<svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
											<span class="sr-only">Info</span>
											<div class="ml-3 text-sm font-medium">
											</div>
											<button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-yellow-50 text-white rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8 " data-dismiss-target="#alert-4" onclick="closeAlert(event)" aria-label="Close">
												<span class="sr-only">Close</span>
												<svg aria-hidden="true" class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
											</button>
										</div>
										@endif

										<form action="/laporan">
											<div class="input-group mt-2">
												<input type="text" placeholder="Cari Laporan.." name="search" value="{{  request('search') }}" id="table-search" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 pl-10 p-2 m-2">
												<button class="btn btn-primary ml-2 " type="submit"><svg class="w-5 h-5 text-gray-500 " fill="white" viewBox="0 0 20 20"
													xmlns="http://www.w3.org/2000/svg">
													<path fill-rule="evenodd"
															d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
															clip-rule="evenodd"></path>
											</svg></button>
											</div>
										</form>
										{{-- <form action="{{ route('laporan.filter') }}" method="GET">
											<input type="text" name="tanggal" id="tanggal-picker" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 pl-10 p-2 m-2">
											<button type="submit" class="btn btn-primary m-2">Filter</button>
									</form> --}}
								</div>
								</div>
								
								<table class="w-full text-sm text-left text-gray-100 ">
										<thead class=" text-xs text-gray-100 uppercase bg-blue-500">
												<tr>
														
														<th scope="col" class="px-6 py-3">
																ID
														</th>
														<th scope="col" class="px-6 py-3">
																User ID
														</th>
														<th scope="col" class="px-6 py-3">
																Tanggal Laporan
														</th>
														<th scope="col" class="px-6 py-3">
																Created At
														</th>
														<th scope="col" class="px-6 py-3">
															Update At
													</th>
													<th scope="col" class="px-6 py-3">
														Status
												</th>
												<th scope="col" class="px-6 py-3">
													Action
												</th>
										</thead>
										<tbody>
											@foreach ($laporans as $laporan)
												<tr
														class="bg-white border-b hover:bg-gray-50 text-black">
														
														<th scope="row" class="px-6 py-4 font-medium text-gray-900  whitespace-nowrap">
															<a href="/isilaporan/{{ $laporan['id'] }}" class="text-decoration-none">{{ $laporan['id'] }}
														</th>
														<td class="px-6 py-4">
															{{ $laporan->user->name }}
														</td>
														<td class="px-6 py-4">
															{{ $laporan->tanggal_laporan }}
														</td>
														<td class="px-6 py-4">
															{{ $laporan->created_at }}
														</td>
														<td class="px-6 py-4">
															{{ $laporan->updated_at }}
														</td>
														<td class="px-6 py-4">
															@if($laporan->approval == true)
																	<span type="submit" class="btn btn-success">Checked</span>
																@else
																	<span type="submit" class="btn btn-warning">Not Checked</button>
																@endif
														</td>
														<td class="px-6 py-4 text-center">
															<form action="/isilaporan/{{ $laporan['id'] }}" style="display: inline">
																<button type="submit" class=" font-medium btn btn-warning type="submit" value="Lihat & Edit"><i data-feather="eye"></i></button>
																{{-- <input class="font-medium text-blue-600 type="submit" value="Lihat & Edit" /> --}}
															</form>
																{{-- <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a> --}}
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
		<script src="https://unpkg.com/flowbite@1.3.4/dist/flowbite.js"></script>
		<script>
			function closeAlert(event){
				let element = event.target;
				while(element.nodeName !== "BUTTON"){
					element = element.parentNode;
				}
				element.parentNode.parentNode.removeChild(element.parentNode);
			}
		</script>
		
		<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0"></script>
<script src="https://cdn.jsdelivr.net/npm/moment@2.29.1"></script>
<script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script>
$(function() {
  $('#tanggal-picker').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    autoUpdateInput: false,
    locale: {
      format: 'YYYY-MM-DD',
      cancelLabel: 'Clear'
    }
  });

  $('#tanggal-picker').on('apply.daterangepicker', function(ev, picker) {
    $(this).val(picker.startDate.format('YYYY-MM-DD'));
    $(this).closest('form').submit(); // Submit form on date selection
  });

  $('#tanggal-picker').on('cancel.daterangepicker', function(ev, picker) {
    $(this).val('');
    $(this).closest('form').submit(); // Submit form on date cancelation
  });
});
</script>
	</div>
</x-app-layout>



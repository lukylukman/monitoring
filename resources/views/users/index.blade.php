<x-app-layout>
    <x-slot name="header">
        {{ __('Users') }}
    </x-slot>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <div class="p-4 bg-white rounded-lg shadow-xs">
        
        {{-- <div class="inline-flex overflow-hidden mb-4 w-full bg-white rounded-lg shadow-md">
            <div class="flex justify-center items-center w-12 bg-blue-500">
                <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z"></path>
                </svg>
            </div>

            <div class="px-4 py-2 -mx-3">
                <div class="mx-3">
                    <span class="font-semibold text-blue-500">Info</span>
                    <p class="text-sm text-gray-600">Sample table page</p>
                </div>
            </div>
        </div> --}}
        <button type="button" class="mb-2 btn btn-primary mr-5" data-toggle="modal" data-target="#modaluser">
            <i data-feather="user-plus"></i>
        </button> 
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

        <!-- MODAL FORM -->
        <div class="modal fade" id="modaluser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="modal-content">
                                        <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Tambah user</h5>
                                        </div>
                                        <div class="modal-body">

                                                {{ csrf_field() }}
                                                <div class="mt-4">
                                                    <x-input-label for="nip" :value="__('nip')"/>
                                                    <x-text-input type="text"
                                                             id="nip"
                                                             name="nip"
                                                             class="block w-full"
                                                             value="{{ old('nip') }}"
                                                             required
                                                             autofocus/>
                                                    <x-input-error :messages="$errors->get('nip')" class="mt-2" />
                                                </div>

                                                <div class="mt-4">
                                                    <x-input-label for="name" :value="__('Name')"/>
                                                    <x-text-input type="text"
                                                             id="name"
                                                             name="name"
                                                             class="block w-full"
                                                             value="{{ old('name') }}"
                                                             required
                                                             autofocus/>
                                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                                </div>
                            
                                                <div class="mt-4">
                                                    <x-input-label for="email" :value="__('Email')"/>
                                                    <x-text-input name="email"
                                                             type="email"
                                                             class="block w-full"
                                                             value="{{ old('email') }}"/>
                                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                                </div>

                                                <div class="mt-4">
                                                    <x-input-label for="role" :value="__('Role')"/>
                                                    <select class="form-select" name="role" aria-label="Default select example">
                                                        <option value="admin">Admin</option>
                                                        <option value="supervisor">Supervisor</option>
                                                        <option selected value="user">User</option>
                                                    </select>
                                                </div>
                            
                                                <div class="mt-4">
                                                    <x-input-label for="password" :value="__('Password')"/>
                                                    <x-text-input type="password"
                                                             name="password"
                                                             class="block w-full"
                                                             required/>
                                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                                </div>
                            
                                                <div class="mt-4">
                                                    <x-input-label id="password_confirmation" :value="__('Confirm Password')"/>
                                                    <x-text-input type="password"
                                                             name="password_confirmation"
                                                             class="block w-full"
                                                             required/>
                                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                                </div>
                                        </div>
                                        
                                        <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <div class="">
                                                    <x-primary-button class="block w-30">
                                                        {{ __('Register') }}
                                                    </x-primary-button>
                                                </div>
                                        </div>
                                </div>
                        </form>
                </div>
        </div>
        <div class="overflow-hidden mb-8 w-full rounded-lg border shadow-xs">
            <div class="overflow-x-auto w-full">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase bg-gray-100 border-b">
                        <th class="px-4 py-3">NIP</th>
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Email</th>
                        <th class="px-4 py-3">Role</th>
                        <th class="px-4 py-3">Action</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                    @foreach($users as $user)
                        <tr class="text-gray-700">
                            <td class="px-4 py-3 text-sm">
                                {{ $user->nip }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $user->name }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $user->email }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $user->role }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                @method('delete')
                                    <form action="{{ route('users.delete', ['id' => $user->id]) }}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger" type="submit" value="Hapus" id="delete" name="delete" onclick="return confirm('Anda yakin ingin menghapus User?')"><i data-feather="trash-2"></i></button>
                                    </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase bg-gray-50 border-t sm:grid-cols-9">
                {{ $users->links() }}
            </div>
        </div>

    </div>
    <script>
        function closeAlert(event){
          let element = event.target;
          while(element.nodeName !== "BUTTON"){
            element = element.parentNode;
          }
          element.parentNode.parentNode.removeChild(element.parentNode);
        }
      </script>
    <script src="https://unpkg.com/flowbite@1.3.4/dist/flowbite.js"></script>
				<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</x-app-layout>

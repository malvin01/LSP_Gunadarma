<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="flex justify-end">
            <a href="{{ route('admin.index') }}" class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200">Back</a>
          </div>

            <form action="{{ route('admin.store') }}" method="POST">
                @csrf
                <div class="shadow overflow-hidden sm:rounded-md">
                  <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">
                      <div class="col-span-6">
                        <label for="username" class="block text-sm font-medium text-gray-700 
                        {{ $errors->has('username') ? 'text-red-600' : '' }}">Username</label>
                        <input type="text" name="username" id="username" value="{{ old('username') }}"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md
                        {{ $errors->has('username') ? 'bg-red-50 border border-red-500 text-red-900 focus:ring-red-500 focus:border-red-500' : '' }}">
                        @error('username')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                      </div>
                      <div class="col-span-6">
                        <label for="nama" class="block text-sm font-medium text-gray-700 
                        {{ $errors->has('nama') ? 'text-red-600' : '' }}">Nama</label>
                        <input type="text" name="nama" id="nama" value="{{ old('nama') }}"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md
                        {{ $errors->has('nama') ? 'bg-red-50 border border-red-500 text-red-900 focus:ring-red-500 focus:border-red-500' : '' }}">
                        @error('nama')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                      </div>
                      <div class="col-span-6">
                        <label for="nik" class="block text-sm font-medium text-gray-700 
                        {{ $errors->has('nik') ? 'text-red-600' : '' }}">NIK</label>
                        <input type="text" name="nik" id="nik" value="{{ old('nik') }}"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md
                        {{ $errors->has('nik') ? 'bg-red-50 border border-red-500 text-red-900 focus:ring-red-500 focus:border-red-500' : '' }}">
                        @error('nik')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                      </div>
                      <div class="col-span-6">
                        <label for="alamat" class="block text-sm font-medium text-gray-700
                        {{ $errors->has('alamat') ? 'text-red-600' : '' }}">Alamat</label>
                        <textarea name="alamat" rows="4" id="alamat"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 focus:ring-transparent
                        block w-full shadow-sm sm:text-sm border-gray-300 rounded-md 
                        {{ $errors->has('alamat') ? 'bg-red-50 border border-red-500 text-red-900 focus:ring-red-500 focus:border-red-500' : '' }}">{{ old('alamat') }}</textarea>
                        @error('alamat')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                      </div>
                      <div class="col-span-6">
                        <label for="nomor_telepon" class="block text-sm font-medium text-gray-700 
                        {{ $errors->has('nomor_telepon') ? 'text-red-600' : '' }}">Nomor Telepon</label>
                        <input type="text" name="nomor_telepon" id="nomor_telepon" value="{{ old('nomor_telepon') }}"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md
                        {{ $errors->has('nomor_telepon') ? 'bg-red-50 border border-red-500 text-red-900 focus:ring-red-500 focus:border-red-500' : '' }}">
                        @error('nomor_telepon')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                      </div>
        
                      <div class="col-span-6">
                        <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700 
                        {{ $errors->has('jenis_kelamin') ? 'text-red-600' : '' }}">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md
                        {{ $errors->has('jenis_kelamin') ? 'bg-red-50 border border-red-500 text-red-900 focus:ring-red-500 focus:border-red-500' : '' }}">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option {{ old('jenis_kelamin') == 0 ? "selected" : "" }} value="0">Perempuan</option>
                            <option {{ old('jenis_kelamin') == 1 ? "selected" : "" }} value="1">Pria</option>
                        </select>
                        @error('jenis_kelamin')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                      </div>

                      <div class="col-span-6">
                        <label for="password" class="block text-sm font-medium text-gray-700
                        {{ $errors->has('password') ? 'text-red-600' : '' }}">Password</label>
                        <input type="password" name="password" id="password" 
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md
                        {{ $errors->has('password') ? 'bg-red-50 border border-red-500 text-red-900 focus:ring-red-500 focus:border-red-500' : '' }}">
                        @error('password')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                      </div>

                      <div class="col-span-6">
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                      </div>
                    </div>
                  </div>
                  <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent 
                    shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 
                    focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
                  </div>
                </div>
              </form>
        </div>
    </div>
</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Kursus') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="flex justify-end">
            <a href="{{ route('kursus.index') }}" class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200">Back</a>
          </div>

            <form action="{{ route('kursus.store') }}" method="POST">
                @csrf
                <div class="shadow overflow-hidden sm:rounded-md">
                  <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">
                      <div class="col-span-6">
                        <label for="nama" class="block text-sm font-medium text-gray-700 
                        {{ $errors->has('nama') ? 'text-red-600' : '' }}">Nama Kursus</label>
                        <input type="text" name="nama" id="nama" value="{{ old('nama') }}"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md
                        {{ $errors->has('nama') ? 'bg-red-50 border border-red-500 text-red-900 focus:ring-red-500 focus:border-red-500' : '' }}">
                        @error('nama')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                      </div>
        
                      <div class="col-span-6">
                        <label for="keterangan" class="block text-sm font-medium text-gray-700
                        {{ $errors->has('keterangan') ? 'text-red-600' : '' }}">Keterangan</label>
                        <textarea name="keterangan"  rows="4" id="keterangan"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 focus:ring-transparent
                        block w-full shadow-sm sm:text-sm border-gray-300 rounded-md 
                        {{ $errors->has('keterangan') ? 'bg-red-50 border border-red-500 text-red-900 focus:ring-red-500 focus:border-red-500' : '' }}">{{ old('keterangan') }}</textarea>
                        @error('keterangan')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                      </div>

                      <div class="col-span-6">
                        <label for="lama_kursus" class="block text-sm font-medium text-gray-700
                        {{ $errors->has('lama_kursus') ? 'text-red-600' : '' }}">Lama Kursus</label>
                        <input type="number" min="1" name="lama_kursus" id="lama_kursus" value="{{ old('lama_kursus') }}"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md
                        {{ $errors->has('lama_kursus') ? 'bg-red-50 border border-red-500 text-red-900 focus:ring-red-500 focus:border-red-500' : '' }}">
                        @error('lama_kursus')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
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
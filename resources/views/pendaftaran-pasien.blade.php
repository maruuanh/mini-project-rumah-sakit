@extends('layout')

@section('title', 'Form Pendaftaran Pasien')

@section('content')

    <form class="p-8 border border-gray-300 rounded-md shadow-sm" action="{{ route('pendaftaran.daftar') }}" class="space-y-6"
        method="POST">
        @csrf
        <div>
            <label for="no_rekam_medis" class="block text-sm/6 font-medium text-gray-900">NIK:</label>
            <div class="mt-2">
                <input type="text" id="nik" name="nik" required value="{{ old('nik') }}"
                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 border border-gray-200 sm:text-sm/6">
            </div>
            @error('nik')
                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="mt-2">
            <div class="flex items-center justify-between">
                <label for="nama_lengkap" class="block text-sm/6 font-medium text-gray-900">Nama Lengkap:</label>
            </div>
            <div class="mt-2">
                <input type="text" name="nama_lengkap" id="nama_lengkap" required value="{{ old('nama_lengkap') }}"
                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 border border-gray-200 sm:text-sm/6">
            </div>
            @error('nama_lengkap')
                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="mt-2">
            <div class="flex items-center justify-between">
                <label for="alamat" class="block text-sm/6 font-medium text-gray-900">Alamat:</label>
            </div>
            <div class="mt-2">
                <input type="text" name="alamat" id="alamat" value="{{ old('alamat') }}"
                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 border border-gray-200 sm:text-sm/6">
            </div>
            @error('alamat')
                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="mt-2">
            <div class="flex items-center justify-between">
                <label for="jenis_kelamin" class="block text-sm/6 font-medium text-gray-900">Jenis Kelamin:</label>
            </div>
            <div class="mt-2">
                <select id="jenis_kelamin" name="jenis_kelamin" required>
                    <option value="Laki-laki" value="{{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}">Laki-laki
                    </option>
                    <option value="Perempuan" value="{{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}">Perempuan
                    </option>
                </select>
            </div>

            @error('jenis_kelamin')
                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="mt-2">
            <div class="flex items-center justify-between">
                <label for="tanggal_lahir" class="block text-sm/6 font-medium text-gray-900">Tanggal Lahir:</label>
            </div>
            <div class="mt-2">
                <input type="date" name="tanggal_lahir" id="tanggal_lahir" required value="{{ old('tanggal_lahir') }}"
                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 border border-gray-200 sm:text-sm/6">
            </div>
            @error('tanggal_lahir')
                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="mt-2">
            <div class="flex items-center justify-between">
                <label for="no_telepon" class="block text-sm/6 font-medium text-gray-900">No. Telepon:</label>
            </div>
            <div class="mt-2">
                <input type="text" name="no_telepon" id="no_telepon" required value="{{ old('no_telepon') }}"
                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 border border-gray-200 sm:text-sm/6">
            </div>
            @error('no_telepon')
                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>


        <div class="mt-2">
            <button type="submit"
                class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Daftar</button>
        </div>
    </form>
@endsection

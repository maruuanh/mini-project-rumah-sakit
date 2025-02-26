@extends('layout')

@section('title', 'Form Pendaftaran Pasien')

@section('content')
    {{-- <form action="{{ route('pendaftaran.daftar') }}" method="POST">
        @csrf
        <label for="nik">NIK:</label>
        <input type="text" id="nik" name="nik" required><br><br>

        <label for="nama_lengkap">Nama:</label>
        <input type="text" id="nama_lengkap" name="nama_lengkap" required><br><br>
        
        <label for="alamat">Alamat:</label>
        <input type="text" id="alamat" name="alamat" required><br><br>

        <label for="jenis_kelamin">Jenis Kelamin:</label>
        <select id="jenis_kelamin" name="jenis_kelamin" required>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select><br><br>

        <label for="tanggal_lahir">Tanggal Lahir:</label>
        <input type="date" id="tanggal_lahir" name="tanggal_lahir" required><br><br>

        <label for="no_telepon">No Telepon:</label>
        <input type="number" id="no_telepon" name="no_telepon" required><br><br>

        <button type="submit">Daftar</button>
    </form> --}}
    <form class="p-8 border border-gray-300 rounded-md shadow-sm" action="{{ route('pendaftaran.daftar') }}" class="space-y-6"
        method="POST">
        @csrf
        <div>
            <label for="no_rekam_medis" class="block text-sm/6 font-medium text-gray-900">NIK:</label>
            <div class="mt-2">
                <input type="text" id="nik" name="nik" required
                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 border border-gray-200 sm:text-sm/6">
            </div>
        </div>

        <div class="mt-2">
            <div class="flex items-center justify-between">
                <label for="nama_lengkap" class="block text-sm/6 font-medium text-gray-900">Nama Lengkap:</label>
            </div>
            <div class="mt-2">
                <input type="text" name="nama_lengkap" id="nama_lengkap" required
                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 border border-gray-200 sm:text-sm/6">
            </div>
        </div>

        <div class="mt-2">
            <div class="flex items-center justify-between">
                <label for="alamat" class="block text-sm/6 font-medium text-gray-900">Alamat:</label>
            </div>
            <div class="mt-2">
                <input type="text" name="alamat" id="alamat"
                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 border border-gray-200 sm:text-sm/6">
            </div>
        </div>

        <div class="mt-2">
            <div class="flex items-center justify-between">
                <label for="jenis_kelamin" class="block text-sm/6 font-medium text-gray-900">Jenis Kelamin:</label>
            </div>
            <div class="mt-2">
                <select id="jenis_kelamin" name="jenis_kelamin" required>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
        </div>

        <div class="mt-2">
            <div class="flex items-center justify-between">
                <label for="tanggal_lahir" class="block text-sm/6 font-medium text-gray-900">Tanggal Lahir:</label>
            </div>
            <div class="mt-2">
                <input type="date" name="tanggal_lahir" id="tanggal_lahir" required
                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 border border-gray-200 sm:text-sm/6">
            </div>
        </div>

        <div class="mt-2">
            <div class="flex items-center justify-between">
                <label for="no_telepon" class="block text-sm/6 font-medium text-gray-900">No. Telepon:</label>
            </div>
            <div class="mt-2">
                <input type="text" name="no_telepon" id="no_telepon" required
                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 border border-gray-200 sm:text-sm/6">
            </div>
        </div>


        <div class="mt-2">
            <button type="submit"
                class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Daftar</button>
        </div>
    </form>
@endsection

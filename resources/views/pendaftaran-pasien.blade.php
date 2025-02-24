@extends('layout')

@section('title', 'Form Pendaftaran Pasien')

@section('content')
    <form action="{{ route('pendaftaran.daftar') }}" method="POST">
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
    </form>
@endsection

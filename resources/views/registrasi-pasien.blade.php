@extends('layout')

@section('title', 'Form Registrasi Pasien')

@section('content')


    @if ($errors->any())
        <div class="bg-red-500 border border-red-400 text-white px-4 py-3 rounded relative mb-4">
            <strong>Error!</strong>
            <ul class="mt-2">
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="bg-green-500 border border-green-400 text-white px-4 py-3 rounded relative mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form class="p-8 border border-gray-300 rounded-md shadow-sm" action="{{ route('registrasi.regis') }}" class="space-y-6"
        method="POST">
        @csrf
        <input type="hidden" name="no_rekam_medis" id="no_rekam_medis" value="{{ $pasien->no_rekam_medis }}" required
            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 border border-gray-200 sm:text-sm/6">
        <div class="mt-2">
            <div class="flex items-center justify-between">
                <label for="nama_lengkap" class="block text-sm/6 font-medium text-gray-900">Nama Lengkap:</label>
            </div>
            <div class="mt-2">
                <input type="text" name="nama_lengkap" id="nama_lengkap" value="{{ $pasien->nama_lengkap }}" disabled
                    required
                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 border border-gray-200 sm:text-sm/6">
            </div>
        </div>

        <div class="mt-2">
            <div class="flex items-center justify-between">
                <label for="alamat" class="block text-sm/6 font-medium text-gray-900">Alamat:</label>
            </div>
            <div class="mt-2">
                <input type="text" name="alamat" id="alamat" value="{{ $pasien->alamat }}" disabled required
                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 border border-gray-200 sm:text-sm/6">
            </div>
        </div>

        <div class="mt-2">
            <div class="flex items-center justify-between">
                <label for="jenis_kelamin" class="block text-sm/6 font-medium text-gray-900">Jenis Kelamin:</label>
            </div>
            <div class="mt-2">
                <input type="text" name="jenis_kelamin" id="jenis_kelamin" value="{{ $pasien->jenis_kelamin }}" disabled
                    required
                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 border border-gray-200 sm:text-sm/6">
            </div>
        </div>

        <div class="mt-2">
            <div class="flex items-center justify-between">
                <label for="tanggal_lahir" class="block text-sm/6 font-medium text-gray-900">Tanggal Lahir:</label>
            </div>
            <div class="mt-2">
                <input type="text" name="tanggal_lahir" id="tanggal_lahir" value="{{ $pasien->tanggal_lahir }}" disabled
                    required
                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 border border-gray-200 sm:text-sm/6">
            </div>
        </div>

        <div class="mt-2">
            <div class="flex items-center justify-between">
                <label for="no_telepon" class="block text-sm/6 font-medium text-gray-900">No. Telepon:</label>
            </div>
            <div class="mt-2">
                <input type="text" name="no_telepon" id="no_telepon" value="{{ $pasien->no_telepon }}" disabled required
                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 border border-gray-200 sm:text-sm/6">
            </div>
        </div>
        <div
            x-data='{ 
            openPoliklinik: false,  
            openDokter: false,
            openJadwal: false,
            selectedPoliklinik: { id: "", name: "Pilih Poliklinik" },
            selectedDokter: { id: "", name: "Pilih Dokter" },
            selectedJadwal: { id: "", name: "Pilih Jam" },
            polikliniks: @json(
                $jadwalPraktikDokter->map(fn($jadwal) => [
                            'id' => $jadwal->dokter->poliklinik->id,
                            'name' => $jadwal->dokter->poliklinik->nama_poliklinik,
                        ])->unique()->values()),
            dokters: [],
            allDokters:  {{ $jadwalPraktikDokter->map(
                    fn($jadwal) => [
                        'id' => $jadwal->dokter->id,
                        'name' => $jadwal->dokter->nama_dokter,
                        'poliklinik_id' => $jadwal->dokter->poliklinik_id,
                    ],
                )->unique() }},
            jadwals: [],
            allJadwals: {{ $jadwalPraktikDokter->map(
                fn($jadwal) => [
                    'id' => $jadwal->id,
                    'dokter_id' => $jadwal->dokter_id,
                    'jam_mulai' => $jadwal->jam_mulai,
                    'jam_selesai' => $jadwal->jam_selesai,
                ],
            ) }}
            }'>
            <div class="mt-2">
                <div class="flex items-center justify-between">
                    <label for="poli_klinik" class="block text-sm/6 font-medium text-gray-900">Poliklinik :</label>
                </div>

                <div class="mt-1">
                    <div class="relative mt-2">
                        <!-- Tombol Select -->
                        <button @click="openPoliklinik = !openPoliklinik" @click.away="openPoliklinik = false"
                            type="button"
                            class="grid w-full cursor-default grid-cols-1 rounded-md bg-white py-1.5 pr-2 pl-3 text-left text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">

                            <span class="col-start-1 row-start-1 flex items-center gap-3 pr-6">
                                <span class="block truncate font-normal"
                                    x-text="selectedPoliklinik.name ?? 'Pilih Poliklinik'"></span>
                            </span>

                            <svg class="col-start-1 row-start-1 size-5 self-center justify-self-end text-gray-500 sm:size-4"
                                viewBox="0 0 16 16" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M5.22 10.22a.75.75 0 0 1 1.06 0L8 11.94l1.72-1.72a.75.75 0 1 1 1.06 1.06l-2.25 2.25a.75.75 0 0 1-1.06 0l-2.25-2.25a.75.75 0 0 1 0-1.06ZM10.78 5.78a.75.75 0 0 1-1.06 0L8 4.06 6.28 5.78a.75.75 0 0 1-1.06-1.06l2.25-2.25a.75.75 0 0 1 1.06 0l2.25 2.25a.75.75 0 0 1 0 1.06Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>

                        <!-- Input hidden untuk form -->
                        <input type="hidden" name="poliklinik_id" x-model="selectedPoliklinik.id">

                        <!-- Dropdown -->
                        <ul x-show="openPoliklinik" x-transition
                            class="absolute z-10 mt-1 max-h-56 w-full overflow-auto rounded-md bg-white py-1 text-base ring-1 shadow-lg ring-black/5 focus:outline-hidden sm:text-sm">
                            <template x-for="poliklinik in polikliniks" :key="poliklinik.id">
                                <li @click='selectedPoliklinik = poliklinik; open = false;
                                    dokters = allDokters.filter(d => d.poliklinik_id === poliklinik.id)'
                                    class="relative cursor-default py-2 pr-9 pl-3 text-gray-900 select-none hover:bg-indigo-600 hover:text-white">
                                    <div class="flex items-center">
                                        <span class="ml-3 block truncate font-normal" x-text="poliklinik.name"></span>
                                    </div>
                                </li>
                            </template>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="mt-2">
                <div class="flex items-center justify-between">
                    <label for="poli_klinik" class="block text-sm/6 font-medium text-gray-900">Dokter :</label>
                </div>

                <div class="mt-1">
                    <div class="relative mt-2">
                        <!-- Tombol Select -->
                        <button @click="openDokter = !openDokter" @click.away="openDokter = false" type="button"
                            class="grid w-full cursor-default grid-cols-1 rounded-md bg-white py-1.5 pr-2 pl-3 text-left text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">

                            <span class="col-start-1 row-start-1 flex items-center gap-3 pr-6">
                                <span class="block truncate font-normal"
                                    x-text="selectedDokter.name ?? 'Pilih Dokter'"></span>
                            </span>

                            <svg class="col-start-1 row-start-1 size-5 self-center justify-self-end text-gray-500 sm:size-4"
                                viewBox="0 0 16 16" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M5.22 10.22a.75.75 0 0 1 1.06 0L8 11.94l1.72-1.72a.75.75 0 1 1 1.06 1.06l-2.25 2.25a.75.75 0 0 1-1.06 0l-2.25-2.25a.75.75 0 0 1 0-1.06ZM10.78 5.78a.75.75 0 0 1-1.06 0L8 4.06 6.28 5.78a.75.75 0 0 1-1.06-1.06l2.25-2.25a.75.75 0 0 1 1.06 0l2.25 2.25a.75.75 0 0 1 0 1.06Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>

                        <!-- Input hidden untuk form -->
                        <input type="hidden" name="dokter_id" x-model="selectedDokter.id">

                        <!-- Dropdown -->
                        <ul x-show="openDokter" x-transition
                            class="absolute z-10 mt-1 max-h-56 w-full overflow-auto rounded-md bg-white py-1 text-base ring-1 shadow-lg ring-black/5 focus:outline-hidden sm:text-sm">
                            <template x-for="dokter in dokters" :key="dokter.id">
                                <li @click='selectedDokter = dokter; open = false;
                                jadwals = allJadwals.filter(j => j.dokter_id === dokter.id)'
                                    class="relative cursor-default py-2 pr-9 pl-3 text-gray-900 select-none hover:bg-indigo-600 hover:text-white">
                                    <div class="flex items-center">
                                        <span class="ml-3 block truncate font-normal" x-text="dokter.name"></span>
                                    </div>
                                </li>
                            </template>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="mt-2">
                <div class="flex items-center justify-between">
                    <label for="poli_klinik" class="block text-sm/6 font-medium text-gray-900">Jadwal :</label>
                </div>

                <div class="mt-1">
                    <div class="relative mt-2">
                        <!-- Tombol Select -->
                        <button @click="openJadwal = !openJadwal" @click.away="openJadwal = false" type="button"
                            class="grid w-full cursor-default grid-cols-1 rounded-md bg-white py-1.5 pr-2 pl-3 text-left text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">

                            <span class="col-start-1 row-start-1 flex items-center gap-3 pr-6">
                                <span class="block truncate font-normal"
                                    x-text="selectedJadwal.name ?? 'Pilih Jam'"></span>
                            </span>

                            <svg class="col-start-1 row-start-1 size-5 self-center justify-self-end text-gray-500 sm:size-4"
                                viewBox="0 0 16 16" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M5.22 10.22a.75.75 0 0 1 1.06 0L8 11.94l1.72-1.72a.75.75 0 1 1 1.06 1.06l-2.25 2.25a.75.75 0 0 1-1.06 0l-2.25-2.25a.75.75 0 0 1 0-1.06ZM10.78 5.78a.75.75 0 0 1-1.06 0L8 4.06 6.28 5.78a.75.75 0 0 1-1.06-1.06l2.25-2.25a.75.75 0 0 1 1.06 0l2.25 2.25a.75.75 0 0 1 0 1.06Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>

                        <!-- Input hidden untuk form -->
                        <input type="hidden" name="jadwal_id" x-model="selectedJadwal.id">

                        <!-- Dropdown -->
                        <ul x-show="openJadwal" x-transition
                            class="absolute z-10 mt-1 max-h-56 w-full overflow-auto rounded-md bg-white py-1 text-base ring-1 shadow-lg ring-black/5 focus:outline-hidden sm:text-sm">
                            <template x-for="jadwal in jadwals" :key="jadwal.id">
                                <li @click='selectedJadwal = {id: jadwal.id, name: jadwal.jam_mulai + " - " + jadwal.jam_selesai}; open = false;'
                                    class="relative cursor-default py-2 pr-9 pl-3 text-gray-900 select-none hover:bg-indigo-600 hover:text-white">
                                    <div class="flex items-center">
                                        <span class="ml-3 block truncate font-normal"
                                            x-text="jadwal.jam_mulai + ' - ' + jadwal.jam_selesai"></span>
                                    </div>
                                </li>
                            </template>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-2">
            <button type="submit"
                class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Registrasi</button>
        </div>
    </form>


    <form class="my-3" action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit"
            class="flex w-full justify-center rounded-md bg-red-600 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-red-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">Batalkan
            Registrasi</button>
    </form>
@endsection

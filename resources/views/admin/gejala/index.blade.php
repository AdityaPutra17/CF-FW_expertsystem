@extends('admin.tamplate')
@section('title', 'Kelola Gejala')
@section('content')

<section  class="text-start">
    <div class="flex mb-5 justify-between">
        <h1 class="font-bold text-4xl text-blue-900">Kelola Gejala</h1>
        <button id="modalCreateForm" class="bg-green-500 text-white font-bold text-center px-5 py-2 rounded">Tambah Gejala</button>
    </div>

    @if(session()->has('success'))
        <div class="bg-green-500 text-white px-5 py-4 mb-5 rounded-lg" role="alert">
            {{session('success')}}
        </div>
    @endif

    <div class="p-5 bg-white rounded-lg shadow-lg">

        <table class="min-w-max w-full table-auto bg-white">
            <thead>
                <tr class="bg-blue-950 text-white uppercase text-sm leading-normal rounded-lg">
                    <th class="py-3 px-6 text-left">No.</th>
                    <th class="py-3 px-6 text-left">Nama Gejala</th>
                    <th class="py-3 px-6 text-left">Kode Gejala</th>
                    <th class="py-3 px-6 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-sm font-light">
                @foreach ($gejalas as $index => $gejala)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left">{{$index + 1 }}</td>
                        <td class="py-3 px-6 text-left font-bold">{{$gejala->nama}}</td>
                        <td class="py-3 px-6 text-left">{{$gejala->kode}}</td>
                        <td class="py-3 px-6 text-center">
                            <button data-id="{{ $gejala->id }}" data-nama="{{ $gejala->nama }}" data-kode="{{ $gejala->kode }}" class="editModalBtn bg-blue-500 text-white px-3 py-1 rounded">Edit</button>
                            <form action="{{route('gejala.destroy', $gejala->id)}}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-500 text-white px-3 py-1 rounded">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
</section>

{{-- modal create form --}}

<div id="createGejalaModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center hidden">
    <div class="bg-white p-6 rounded-lg w-96">
        <h2 class="text-2xl font-bold mb-4">Tambah Gejala</h2>
        <form action="{{ route('gejala.store') }}" method="POST">
            @csrf
            <!-- Kode Gejala -->
            <div class="mb-4">
                <label for="kode_gejala" class="block text-sm font-medium text-gray-700">Kode Gejala</label>
                <input type="text" id="kode_gejala" name="kode" required class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" value="G{{$newId}}"/>
            </div>

            <!-- Nama Gejala -->
            <div class="mb-4">
                <label for="nama_gejala" class="block text-sm font-medium text-gray-700">Nama Gejala</label>
                <input type="text" id="nama_gejala" name="nama" required class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" />
            </div>

            <!-- Tombol Submit -->
            <div class="flex justify-between">
                <button type="submit" class="px-6 py-2 text-white bg-blue-600 hover:bg-blue-700 rounded-lg">Simpan</button>
                <button type="button" id="closeModalCreateForm" class="px-6 py-2 text-white bg-red-600 hover:bg-red-700 rounded-lg">Batal</button>
            </div>
        </form>
    </div>
</div>

{{-- Modal Edit Form --}}
<div id="editGejalaModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center hidden">
    <div class="bg-white p-6 rounded-lg w-96">
        <h2 class="text-2xl font-bold mb-4">Edit Gejala</h2>
        <form id="editGejalaForm" action="{{ route('gejala.update', $gejala->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Kode Gejala -->
            <div class="mb-4">
                <label for="kode_gejala" class="block text-sm font-medium text-gray-700">Kode Gejala</label>
                <input type="text" id="edit_kode_gejala" name="kode" required class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" readonly />
            </div>

            <!-- Nama Gejala -->
            <div class="mb-4">
                <label for="edit_nama_gejala" class="block text-sm font-medium text-gray-700">Nama Gejala</label>
                <input type="text" id="edit_nama_gejala" name="nama" required class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" />
            </div>

            <!-- Tombol Submit -->
            <div class="flex justify-between">
                <button type="submit" class="px-6 py-2 text-white bg-blue-600 hover:bg-blue-700 rounded-lg">Update</button>
                <button type="button" id="closeModalEdit" class="px-6 py-2 text-white bg-red-600 hover:bg-red-700 rounded-lg">Batal</button>
            </div>
        </form>
    </div>
</div>


<script>
    // Ambil elemen modal dan tombol
    const openModalCreateBtn = document.getElementById("modalCreateForm");
    const closeModalCreateBtn = document.getElementById("closeModalCreateForm");
    const modalCreate = document.getElementById("createGejalaModal");

    // Menampilkan modal saat tombol tambah gejala diklik
    openModalCreateBtn.addEventListener("click", function() {
        modalCreate.classList.remove("hidden");
    });

    // Menutup modal saat tombol batal diklik
    closeModalCreateBtn.addEventListener("click", function() {
        modalCreate.classList.add("hidden");
    });

    const openModalEditBtn = document.querySelectorAll('.editModalBtn');
    const closeModalEditlBtn = document.getElementById('closeModalEdit');
    const modalEdit = document.getElementById('editGejalaModal');
    const editForm = document.getElementById('editGejalaForm');
    const editKode = document.getElementById('edit_kode_gejala');
    const editNama = document.getElementById('edit_nama_gejala');


    // Menampilkan modal saat tombol edit diklik
    openModalEditBtn.forEach(btn => {
        btn.addEventListener('click', function () {
            const gejalaId = this.getAttribute('data-id');
            const gejalaNama = this.getAttribute('data-nama');
            const gejalaKode = this.getAttribute('data-kode');

            // Mengisi field form dengan data gejala yang dipilih
            editKode.value = gejalaKode;
            editNama.value = gejalaNama;

            // Set action form untuk mengarah ke route update
            editForm.action = `/admin/gejala/${gejalaId}`;

            // Menampilkan modal
            modalEdit.classList.remove('hidden');
        });
    });

    // Menutup modal saat tombol batal diklik
    closeModalEditlBtn.addEventListener('click', function () {
        modalEdit.classList.add('hidden');
    });
</script>






@endsection
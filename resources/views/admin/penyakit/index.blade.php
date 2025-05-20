@extends('admin.tamplate')
@section('title', 'Kelola Penyakit')
@section('content')

<section  class="text-start">
    <div class="flex mb-5 justify-between">
        <h1 class="font-bold text-4xl text-blue-900">Kelola Penyakit</h1>
        <button id="modalCreateForm" class="bg-green-500 text-white font-bold text-center px-5 py-2 rounded">Tambah Penyakit</button>
    </div>

    @if(session()->has('success'))
        <div class="bg-green-500 text-white px-5 py-4 mb-5 rounded-lg" role="alert">
            {{session('success')}}
        </div>
    @endif

    <div class="p-5 bg-white rounded-lg shadow-lg">
        <table class="min-w-max w-full table-fixed ">
            <thead>
                <tr class="bg-blue-950 text-white uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">No.</th>
                    <th class="py-3 px-6 text-left">Nama Penyakit</th>
                    <th class="py-3 px-6 text-left">Kode Penyakit</th>
                    <th class="py-3 px-6 text-left">Deskripsi</th>
                    <th class="py-3 px-6 text-left">Solusi</th>
                    <th class="py-3 px-6 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-sm font-light">
                @foreach ($penyakits as $index => $penyakit)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left">{{$index + 1 }}</td>
                        <td class="py-3 px-6 text-left font-bold">{{$penyakit->nama}}</td>
                        <td class="py-3 px-6 text-left">{{$penyakit->kode}}</td>
                        <td class="py-3 px-6 text-left">{{$penyakit->deskripsi}}</td>
                        <td class="py-3 px-6 text-left">{{$penyakit->solusi}}</td>
                        <td class="py-3 px-6 text-center">
                            <button data-id="{{ $penyakit->id }}" data-nama="{{ $penyakit->nama }}" data-kode="{{ $penyakit->kode }}" data-desk ="{{$penyakit->deskripsi}}" data-solusi=" {{$penyakit->solusi}} " class="editModalBtn bg-blue-500 text-white px-3 py-1 rounded">Edit</button>
                            <form action="{{route('penyakit.destroy', $penyakit->id)}}" method="POST" class="inline-block">
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

<div id="createPenyakitModal" class="fixed inset-0 px-60 bg-gray-800 bg-opacity-50 flex justify-center items-center hidden">
    <div class="bg-white p-6 rounded-lg w-full">
        <h2 class="text-2xl font-bold mb-4">Tambah Penyakit</h2>
        <form action="{{ route('penyakit.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="nama_penyakit" class="block text-sm font-medium text-gray-700">Kode Penyakit</label>
                <input type="text" id="kode_penyakit" name="kode" required class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" value="P{{ $newId }}" readonly />
            </div>

            <div class="mb-4">
                <label for="nama_penyakit" class="block text-sm font-medium text-gray-700">Nama Penyakit</label>
                <input type="text" id="nama_penyakit" name="nama" required class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" />
            </div>

            <div class="mb-4">
                <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi Penyakit</label>
                <textarea id="deskripsi" name="deskripsi" required class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"></textarea>
            </div>

            <div class="mb-4">
                <label for="solusi" class="block text-sm font-medium text-gray-700">Solusi</label>
                <textarea id="solusi" name="solusi" required class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"></textarea>
            </div>

            <div class="flex justify-between">
                <button type="submit" class="px-6 py-2 text-white bg-blue-600 hover:bg-blue-700 rounded-lg">Simpan</button>
                <button type="button" id="closeModalCreateForm" class="px-6 py-2 text-white bg-red-600 hover:bg-red-700 rounded-lg">Batal</button>
            </div>
        </form>
    </div>
</div>

{{-- Modal Edit Form --}}
<div id="editpenyakitModal" class="fixed inset-0 px-60 bg-gray-800 bg-opacity-50 flex justify-center items-center hidden">
    <div class="bg-white p-6 rounded-lg w-full">
        <h2 class="text-2xl font-bold mb-4">Edit Penyakit</h2>
        <form id="editpenyakitForm" action="{{ route('penyakit.update', $penyakit->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="kode_penyakit" class="block text-sm font-medium text-gray-700">Kode Penyakit</label>
                <input type="text" id="edit_kode_penyakit" name="kode" required class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" readonly />
            </div>

            <div class="mb-4">
                <label for="edit_nama_penyakit" class="block text-sm font-medium text-gray-700">Nama Penyakit</label>
                <input type="text" id="edit_nama_penyakit" name="nama" required class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" />
            </div>

            <div class="mb-4">
                <label for="edit_deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi Penyakit</label>
                <textarea id="edit_deskripsi" name="deskripsi" required class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 h-48"></textarea>
            </div>

            <div class="mb-4">
                <label for="edit_solusi" class="block text-sm font-medium text-gray-700">Solusi</label>
                <textarea id="edit_solusi" name="solusi" required class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 h-48"></textarea>
            </div>

            <div class="flex justify-between">
                <button type="submit" class="px-6 py-2 text-white bg-blue-600 hover:bg-blue-700 rounded-lg">Update</button>
                <button type="button" id="closeModalEdit" class="px-6 py-2 text-white bg-red-600 hover:bg-red-700 rounded-lg">Batal</button>
            </div>
        </form>
    </div>
</div>

<script>
    // modal create form
    const openModalCreateBtn = document.getElementById("modalCreateForm");
    const closeModalCreateBtn = document.getElementById("closeModalCreateForm");
    const modalCreate = document.getElementById("createPenyakitModal");

    openModalCreateBtn.addEventListener("click", function() {
        modalCreate.classList.remove("hidden");
    });

    closeModalCreateBtn.addEventListener("click", function() {
        modalCreate.classList.add("hidden");
    });

    // end modal create form

    const openModalEditBtn = document.querySelectorAll('.editModalBtn');
    const closeModalEditlBtn = document.getElementById('closeModalEdit');
    const modalEdit = document.getElementById('editpenyakitModal');
    const editForm = document.getElementById('editpenyakitForm');
    const editKode = document.getElementById('edit_kode_penyakit');
    const editNama = document.getElementById('edit_nama_penyakit');
    const deskripsi = document.getElementById('edit_deskripsi');
    const editSolusi = document.getElementById('edit_solusi');

    // Menampilkan modal saat tombol edit diklik
    openModalEditBtn.forEach(btn => {
        btn.addEventListener('click', function () {
            const penyakitId = this.getAttribute('data-id');
            const penyakitNama = this.getAttribute('data-nama');
            const penyakitKode = this.getAttribute('data-kode');
            const penyakitDesc = this.getAttribute('data-desk');
            const penyakitSolusi = this.getAttribute('data-solusi');

            editKode.value = penyakitKode;
            editNama.value = penyakitNama;
            deskripsi.value = penyakitDesc;
            editSolusi.value = penyakitSolusi;

            editForm.action = `/admin/penyakit/${penyakitId}`;

            modalEdit.classList.remove('hidden');
        });
    });

    // Menutup modal saat tombol batal diklik
    closeModalEditlBtn.addEventListener('click', function () {
        modalEdit.classList.add('hidden');
    });
</script>

@endsection

@extends('admin.tamplate')
@section('title', 'Kelola Aturan')
@section('content')

<section  class="text-start">
    <div class="flex mb-5 justify-between">
        <h1 class="font-bold text-4xl text-blue-900">Kelola Aturan</h1>
        <button id="modalCreateForm" class="bg-green-500 text-white font-bold text-center px-5 py-2 rounded">Tambah Aturan</button>
    </div>

    @if(session()->has('success'))
        <div class="bg-green-500 text-white px-5 py-4 mb-5 rounded-lg" role="alert">
            {{session('success')}}
        </div>
    @endif

    <div class="p-5 bg-white rounded-lg shadow-lg">
        <table class="min-w-max w-full table-auto ">
            <thead>
                <tr class="bg-blue-950 text-white uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">No.</th>
                    <th class="py-3 px-6 text-left">Nama Penyakit</th>
                    <th class="py-3 px-6 text-left">Nama Gejala</th>
                    <th class="py-3 px-6 text-center">Certainty Factor</th>
                    <th class="py-3 px-6 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-sm font-light">
                @foreach ($aturans as $index => $aturan)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left">{{$index + 1 }}</td>
                        <td class="py-3 px-6 text-left font-bold">{{$aturan->penyakit->nama}}</td>
                        <td class="py-3 px-6 text-left ">{{$aturan->gejala->nama}}</td>
                        <td class="py-3 px-6 text-center ">{{$aturan->cf}}</td>
                        <td class="py-3 px-6 text-center">
                            <button data-id="{{ $aturan->id }}" data-gejala="{{ $aturan->gejala_id }}" data-penyakit="{{ $aturan->penyakit_id }}" class="editModalBtn bg-blue-500 text-white px-3 py-1 rounded">Edit</button>
                            <form action="{{route('aturan.destroy', $aturan->id)}}" method="POST" class="inline-block">
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

<div id="createAturanModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center hidden">
    <div class="bg-white p-6 rounded-lg w-96">
        <h2 class="text-2xl font-bold mb-4">Tambah Aturan</h2>
        <form action="{{ route('aturan.store') }}" method="POST">
            @csrf
            <!-- Kode Gejala -->
            <div class="mb-4">
                <label for="gejala_id" class="block text-sm font-medium text-gray-700">Kode Gejala</label>
                
                <select name="gejala_id" id="gejala_id" class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="" >Pilih Gejala</option>
                    @foreach ($gejalas as $gejala)
                        <option value="{{ $gejala->id }}">{{ $gejala->nama }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Nama Gejala -->
            <div class="mb-4">
                <label for="penyakit_id" class="block text-sm font-medium text-gray-700">Kode Aturan</label>
               
                <select name="penyakit_id" id="penyakit_id" class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="" >Pilih Penyakit</option>
                    @foreach ($penyakits as $penyakit)
                        <option value="{{ $penyakit->id }}">{{ $penyakit->nama }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="mb-4">
                <label for="cf" class="block text-sm font-medium text-gray-700">Nilai Certainty Factor (CF)</label>
               
                <select name="cf" id="cf" class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                    <option selected  disabled >Pilih Kepastian</option>
                    <option value=0.8>Pasti</option>
                    <option value=0.6>Hampir Pasti</option>
                    <option value=0.4>Kemungkina Besar</option>
                    <option value=0.2>Mungkin</option>
                    <option value=0.0>Tidak Tahu</option>
                </select>
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
<div id="editAturanModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center hidden">
    <div class="bg-white p-6 rounded-lg w-96">
        <h2 class="text-2xl font-bold mb-4">Edit Aturan</h2>
        <form id="editAturanForm" action="{{ route('aturan.update', $aturan->id) }}" method="POST">
            @csrf
            @method('PUT')

            
            <div class="mb-4">
                <label for="kode_gejala" class="block text-sm font-medium text-gray-700">Kode Gejala</label>
                
                <select name="gejala_id" id="edit_kode_gejala" class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">adf</option>
                    @foreach ($gejalas as $gejala)
                        <option value="{{ $gejala->id }}">{{ $gejala->nama }}</option>   
                    @endforeach
                </select>
            </div>

            
            <div class="mb-4">
                <label for="edit_nama_gejala" class="block text-sm font-medium text-gray-700">Kode Penyakit</label>
                
                <select name="penyakit_id" id="edit_kode_penyakit" class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                   
                    @foreach ($penyakits as $penyakit)
                        <option value="{{ $penyakit->id }}">{{ $penyakit->nama }}</option>   
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="cf" class="block text-sm font-medium text-gray-700">Nilai Certainty Factor (CF)</label>
               
                <select name="cf" id="cf" class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                    <option selected  disabled >Pilih Kepastian</option>
                    <option value=0.8>Pasti</option>
                    <option value=0.6>Hampir Pasti</option>
                    <option value=0.4>Kemungkina Besar</option>
                    <option value=0.2>Mungkin</option>
                    <option value=0.0>Tidak Tahu</option>
                </select>
            </div>

            
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
    const modalCreate = document.getElementById("createAturanModal");

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
    const modalEdit = document.getElementById('editAturanModal');
    const editForm = document.getElementById('editAturanForm');
    const editKodeGejala = document.getElementById('edit_kode_gejala');
    const editKodePenyakit = document.getElementById('edit_kode_penyakit');


    // Menampilkan modal saat tombol edit diklik
    openModalEditBtn.forEach(btn => {
        btn.addEventListener('click', function () {
            const aturanId = this.getAttribute('data-id');
            const dataGejala = this.getAttribute('data-gejala');
            const dataPenyakit = this.getAttribute('data-penyakit');

            // Mengisi field form dengan data gejala yang dipilih
            editKodeGejala.value = dataGejala;
            editKodePenyakit.value = dataPenyakit;

            // Set action form untuk mengarah ke route update
            editForm.action = `/admin/aturan/${aturanId}`;

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
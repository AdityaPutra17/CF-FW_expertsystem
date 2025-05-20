@extends('client.tamplate')

@section('content')
<section class="min-h-[500px] flex items-center justify-center">
    <div class="max-w-md mx-auto p-6 bg-white shadow-lg rounded-lg text-center ">
        
        @if($allZero)
            <h2 class="text-xl mb-4 font-bold">Terimaksih Telah Melakukan Diagnosa</h2>
            <p class="text-lg font-bold text-green-600">Tidak ditemukan indikasi penyakit berdasarkan jawaban Anda.</p>
        @else
        <h2 class="text-xl mb-4 font-bold">Terimaksih Telah Melakukan Diagnosa</h2>
        <p>Dari hasil diagnosa yang dilakukan. <br> Sistem menyatakan bahwa terdapat Kemungkinan yaitu :</p>
            @foreach ($detectedDiseases as $data)
                @if ($data['percentage'] != 0)
                        <div x-data="{open: false}"  class="mt-2 border rounded-xl shadow-lg">
                            <button @click="open = !open" class="text-lg p-4 font-bold text-white bg-blue-700 w-full mx-auto rounded-xl">
                                {{ $data['penyakit']->nama }} 
                                <span class="block text-sm text-yellow-200 font-semibold">
                                    Kemungkinan: {{ $data['percentage'] }}%
                                </span>
                                <p class="font-semibold text-green-400 text-sm">Certainty Factor (CF): {{ $data['cf'] }}%</p>
                                <p class="font-semibold text-green-400 text-sm">Yuk klik dan baca Informasi lebih lengkapnya</p>
                            </button>
                            <div x-show="open" class="p-4 bg-gray-100 border rounded">
                                <p class="text-red-500 font-bold">Deskripsi</p>
                                <p class="text-gray-800 mt-2">{{ $data['penyakit']->deskripsi }}</p>
                                <hr>
                                <p class="mt-2 font-bold">Tenang aja ga Perlu Takut, kamu hanya perlu ikuti solusi berikut :</p>
                                <p class="mt-2 text-red-500 font-bold">Solusi</p>
                                <p class="text-gray-800 mt-2">{{ $data['penyakit']->solusi }}</p>
                            </div>
                        </div>
                        @endif
                        @endforeach
                        <p class="text-sm text-gray-500 mt-2">Jika Anda merasa tidak nyaman, silakan berkonsultasi dengan psikolog atau psikiater   .</p>
        @endif

        <a href="/" class="block w-full mt-4 bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-600">Kembali</a>
        
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

@endsection

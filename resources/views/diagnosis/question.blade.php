@extends('client.tamplate')

@section('content')

<section class="min-h-[500px] flex items-center justify-center">
    <div class="max-w-md mx-auto p-6 bg-white shadow-lg rounded-lg max-h-screen">
        <h2 class="text-xl font-semibold mb-4">Apakah Anda mengalami gejala berikut?</h2>
        <p class="text-gray-800 text-lg font-semibold">{{ $gejala->nama }}</p>
        
        <form action="{{ route('diagnosis.process') }}" method="POST" class="mt-4">
            @csrf
            <input type="hidden" name="idgejala" value="{{ $gejala->id }}">
            
            <button type="submit" name="answer" value="1" class="w-full bg-green-500 text-white p-2 rounded-lg hover:bg-green-600 mt-2">
                Ya
            </button>
            <button type="submit" name="answer" value="0" class="w-full bg-red-500 text-white p-2 rounded-lg hover:bg-red-600 mt-2">
                Tidak
            </button>
        </form>
    </div>
</section>
@endsection
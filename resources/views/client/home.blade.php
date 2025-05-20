@extends('client.tamplate')
@section('title', 'Home')
@section('content')
    <section class="flex py-28 ">   
        <div class="container mx-auto">
            <div class="flex flex-col-reverse md:flex md:flex-row lg:flex lg:flex-row items-center justify-between gap-10 px-0 md:px-10 lg:px-20">
                <div class="w-full md:w-1/2 lg:w-1/2 flex flex-col justify-center ">
                    <h1 class="text-xl/tight text-center md:text-3xl/tight md:text-left lg:text-5xl/tight lg:text-left font-bold text-blue-500">MentalCare Platform Tepat untuk Kesehatan Mentalmu</h1>
                    <p class="text-sm text-center md:text-md/normal md:text-left lg:text-xl/normal lg:text-left mt-5 text-slate-600">Temukan jawaban tentang kesehatan mental Anda dengan sistem pakar. Dapatkan analisis cepat dan rekomendasi yang akurat. Coba sekarang, gratis!</p>
                    <div class="w-full mt-10 text-center md:text-left lg:text-left">
                        <a href="{{route('diagnosis.form')}}" class="items-center text-xs md:text-md lg:text-lg px-8 py-3 bg-gradient-to-r from-blue-500 to-purple-500 text-white font-bold rounded-full shadow-md hover:from-blue-600 hover:to-purple-600 ">                    
                            Coba Diagnosa Sekarang
                        </a>
                    </div>
                </div>
                <div class="hidden md:inline md:w-1/2 lg:inline lg:w-1/3 items-center justify-end mt-[-50px]">
                    <img src="{{ asset('image/orang.png') }}" alt="">
                </div>
            </div>
        </div>
    </section>
@endsection
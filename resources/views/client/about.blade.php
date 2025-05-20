@extends('client.tamplate')
@section('title', 'Tentang MentalCare')
@section('content')
<div class="container mx-auto px-6 py-12">
    <div class="text-center mb-12">
        <h1 class="text-4xl font-extrabold text-blue-600">Tentang MentalCare</h1>
        <p class="text-xl text-gray-600 mt-4">Solusi Cerdas untuk Kesehatan Mental Anda</p>
    </div>
    <div class="grid md:grid-cols-2 gap-12">
        <!-- Deskripsi MentalCare -->
        <div class="space-y-6">
            <h2 class="text-3xl font-semibold text-gray-800">Apa itu MentalCare?</h2>
            <p class="text-lg text-gray-700">
                <strong>MentalCare</strong> adalah platform inovatif yang menyediakan layanan diagnosis kesehatan mental berbasis teknologi canggih. Menggunakan sistem pakar dengan metode <strong>Forward Chaining</strong>, MentalCare membantu Anda mendiagnosis kondisi kesehatan mental secara lebih akurat dan mudah.
            </p>
            <p class="text-lg text-gray-700">
                Kami menyadari bahwa kesehatan mental sangat penting untuk kualitas hidup yang baik. Oleh karena itu, kami menyediakan solusi yang dapat diakses kapan saja dan di mana saja, untuk memberikan wawasan yang lebih dalam tentang kondisi mental Anda dan rekomendasi langkah-langkah yang bisa diambil.
            </p>
        </div>

        <!-- Metode Forward Chaining -->
        <div class="space-y-6">
            <h2 class="text-3xl font-semibold text-gray-800">Metode Forward Chaining</h2>
            <p class="text-lg text-gray-700">
                Di MentalCare, kami menggunakan <strong>Forward Chaining</strong> sebagai metode utama dalam sistem pakar kami. Forward chaining adalah pendekatan berbasis aturan yang digunakan untuk menarik kesimpulan berdasarkan serangkaian fakta atau gejala yang diketahui.
            </p>
            <p class="text-lg text-gray-700">
                Saat Anda mulai melakukan diagnosa, sistem akan memulai dengan gejala yang Anda pilih. Kemudian, berdasarkan informasi yang dikumpulkan, sistem akan terus mengaitkan gejala dengan kemungkinan kondisi atau penyakit mental, hingga akhirnya memberikan diagnosis yang sesuai.
            </p>
            <p class="text-lg text-gray-700">
                Dengan menggunakan metode ini, sistem pakar dapat secara otomatis menghasilkan hasil diagnosa yang lebih akurat dan relevan dengan kondisi yang Anda alami.
            </p>
        </div>
    </div>

    <!-- Bagian Visi dan Misi -->
    <div class="mt-12 text-center">
        <h2 class="text-3xl font-semibold text-gray-800">Visi dan Misi</h2>
        <div class="grid md:grid-cols-2 gap-12 mt-6">
            <!-- Visi -->
            <div class="space-y-4">
                <h3 class="text-2xl font-semibold text-blue-600">Visi</h3>
                <p class="text-lg text-gray-700">
                    Menjadi platform terpercaya dalam memberikan diagnosa dan solusi terkait kesehatan mental melalui teknologi yang mudah diakses dan berbasis pengetahuan ilmiah.
                </p>
            </div>

            <!-- Misi -->
            <div class="space-y-4">
                <h3 class="text-2xl font-semibold text-blue-600">Misi</h3>
                <ul class="list-disc pl-5 text-lg text-gray-700">
                    <li>Menyediakan diagnosa kesehatan mental yang akurat dan berbasis data.</li>
                    <li>Memberikan akses kepada semua orang untuk memahami kondisi mental mereka dengan cara yang mudah dan nyaman.</li>
                    <li>Mengedukasi masyarakat mengenai pentingnya menjaga kesehatan mental dan memberikan solusi nyata untuk menghadapinya.</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Call to Action -->
    <div class="mt-12 text-center">
        <h2 class="text-3xl font-semibold text-gray-800">Siap Memulai Diagnosa Anda?</h2>
        <p class="text-lg text-gray-700 mt-4">Jangan biarkan kesehatan mental Anda terabaikan. Cobalah diagnosa dengan menggunakan platform kami yang mudah digunakan dan hasil yang akurat.</p>
        <a href="{{ route('diagnosis.form') }}" class="mt-6 inline-block bg-blue-600 text-white py-3 px-6 rounded-lg text-lg hover:bg-blue-700 transition duration-300">Mulai Diagnosa</a>
    </div>
</div>
@endsection

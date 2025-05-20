<aside class=" bg-white shadow-xl h-screen p-4 flex flex-col">
  <div class="flex items-center justify-between gap-2 px-6 py-5.5 lg:py-6.5">
    <a href="/admin">
      <img src="{{ asset('image/logo.png') }}" alt="Logo" />
    </a>
  </div>

  <div class="flex-1 overflow-y-auto mt-5 px-4 py-4 lg:mt-9 lg:px-6">
    <!-- Sidebar Menu -->
    <hr class="border-t-2 border-gray-500 mb-4" />
    <div>
      <ul class="mb-6 flex flex-col gap-1.5">
        <li>
          <a class="flex gap-4 mx-4 text-lg items-center {{ Request::is('admin') ? 'bg-blue-600 text-white px-4 py-2 rounded-lg' : 'text-gray-500 ' }}" href="/admin">
            <i class="fa-solid fa-house"></i> Dashboard
          </a>
        </li>
        <li>
          <a class="flex gap-4 mx-4 text-lg items-center {{ Request::is('admin/gejala*') ? 'bg-blue-600 text-white px-4 py-2 rounded-lg' : 'text-gray-500 ' }}" href="/admin/gejala">
            <i class="fa-solid fa-book"></i> Gejala
          </a>
        </li>
        <li>
          <a class="flex gap-4 mx-4 text-lg items-center {{ Request::is('admin/penyakit*') ? 'bg-blue-600 text-white px-4 py-2 rounded-lg' : 'text-gray-500' }}" href="/admin/penyakit">
            <i class="fa-solid fa-virus"></i> Penyakit
          </a>
        </li>
        <li>
          <a class="flex gap-4 mx-4 text-lg items-center {{ Request::is('admin/aturan*') ? 'bg-blue-600 text-white px-4 py-2 rounded-lg' : 'text-gray-500 ' }}" href="/admin/aturan">
            <i class="fa-solid fa-notes-medical"></i> Aturan
          </a>
        </li>
        <li>
          <a class="flex gap-4 mx-4 text-lg items-center {{ Request::is('admin/result*') ? 'bg-blue-600 text-white px-4 py-2 rounded-lg' : 'text-gray-500 ' }}" href="/admin/result">
            <i class="fa-solid fa-book-medical"></i> Hasil Diagnosa
          </a>
        </li>
      </ul>
    </div>
    <!-- Sidebar Menu -->
  </div>

  <form action="/logout" method="POST" class="mb-6">
    @csrf
    <ul class="flex flex-col gap-1.5">
      <li>
        <button class="flex gap-4 px-8 text-lg items-center text-red-500">
          <i class="fa-solid fa-right-from-bracket"></i> Sign Out
        </button>
      </li>
    </ul>
  </form>
</aside>

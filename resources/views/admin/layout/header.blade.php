<div class="flex justify-end p-4 bg-white shadow-xl">
    <div class="relative ">
        <button onclick="toggleDropdown()" class=" text-grey-500 flex justify-end items-center gap-6 py-2 px-4 rounded-md">
            Profil
            <img src="{{asset('image/orang.png')}}" width="5%" alt="">
        </button>
        <div id="dropdown" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg hidden">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="block px-4 py-2 text-red-700 font-bold w-full">Logout</button>
            </form>
            
        </div>
    </div>
</div>

<script>
    function toggleDropdown() {
        const dropdown = document.getElementById("dropdown");
        dropdown.classList.toggle("hidden");
    }

    
</script>

<!-- component -->
	<nav class="container mx-auto relative py-4 flex justify-between items-center bg-[#F2F7FF]">
		<a class="text-3xl font-bold leading-none" href="/">
			<img src="{{asset('image/logo.png')}} "  alt="">
			<p class="text-blue-900 text-sm font-normal">Peduli Mental, Peduli Masa Depan</p>
		</a>
		<div class="lg:hidden">
			<button class="navbar-burger flex items-center text-blue-600 p-3">
				<svg class="block h-4 w-4 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
					<title>Mobile menu</title>
					<path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
				</svg>
			</button>
		</div>
		<ul class="hidden absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 lg:flex lg:mx-auto lg:flex lg:items-center lg:w-auto lg:space-x-6">
			<li>
				<a class="text-lg  hover:text-gray-500 
					@if(Route::is('home')) text-blue-600 font-bold @else text-gray-400 @endif" href="{{ route('home') }}">Beranda</a>
			</li>
			<li class="text-gray-300">
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill" viewBox="0 0 24 24">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
				</svg>
			</li>
			<li>
				<a class="text-lg hover:text-gray-500 
					@if(Route::is('about')) text-blue-600 font-bold @else text-gray-400  @endif" href="/about">Tentang Kami</a>
			</li>
			<li class="text-gray-300">
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill" viewBox="0 0 24 24">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
				</svg>
			</li>
			<li>
				<a class="text-lg  hover:text-gray-500 
					@if(Route::is('diagnosis.form')) text-blue-600 font-bold @else text-gray-400 @endif" href="{{ route('diagnosis.form') }}">Diagnosa</a>
			</li>
		</ul>
		
	</nav>
	<div class="navbar-menu relative z-50 hidden">
		<div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
		<nav class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-white border-r overflow-y-auto">
			<div class="flex items-center mb-8">
				<a class="mr-auto text-3xl font-bold leading-none" href="#">
					<img src="{{asset('image/logo.png')}} "  alt="">
					<p class="text-blue-900 text-sm font-normal">Peduli Mental, Peduli Masa Depan</p>
				</a>
				<button class="navbar-close">
					<svg class="h-6 w-6 text-gray-400 cursor-pointer hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
					</svg>
				</button>
			</div>
			<div>
				<ul>
					<li class="mb-1">
						<a class="block p-4 text-lg font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded" href="/">Beranda</a>
					</li>
					<li class="mb-1">
						<a class="block p-4 text-lg font-semibold text-gray-400  hover:bg-blue-50 hover:text-blue-600 rounded" href="/about">Tentang Kami</a>
					</li>
					<li class="mb-1">
						<a class="block p-4 text-lg font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded" href="/diagnosis">Diagnosa</a>
					</li>
					</li>
				</ul>
			</div>
			<div class="mt-auto">
				<div class="pt-6 ">
                    <button class="flex items-center mx-auto px-6 py-3 bg-gradient-to-r from-blue-500 to-purple-500 text-white font-semibold rounded-full shadow-md hover:from-blue-600 hover:to-purple-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">                    
                        Register Pasien
                    </button>
				</div>
				<p class="my-4 text-xs text-center text-gray-400">
					<span>Copyright © 2021</span>
				</p>
			</div>
		</nav>
	</div>


<script>
// Burger menus
document.addEventListener('DOMContentLoaded', function() {
    // open
    const burger = document.querySelectorAll('.navbar-burger');
    const menu = document.querySelectorAll('.navbar-menu');

    if (burger.length && menu.length) {
        for (var i = 0; i < burger.length; i++) {
            burger[i].addEventListener('click', function() {
                for (var j = 0; j < menu.length; j++) {
                    menu[j].classList.toggle('hidden');
                }
            });
        }
    }

    // close
    const close = document.querySelectorAll('.navbar-close');
    const backdrop = document.querySelectorAll('.navbar-backdrop');

    if (close.length) {
        for (var i = 0; i < close.length; i++) {
            close[i].addEventListener('click', function() {
                for (var j = 0; j < menu.length; j++) {
                    menu[j].classList.toggle('hidden');
                }
            });
        }
    }

    if (backdrop.length) {
        for (var i = 0; i < backdrop.length; i++) {
            backdrop[i].addEventListener('click', function() {
                for (var j = 0; j < menu.length; j++) {
                    menu[j].classList.toggle('hidden');
                }
            });
        }
    }
});
</script>
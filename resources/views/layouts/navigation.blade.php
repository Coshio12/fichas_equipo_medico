<nav x-data="{ open: false }" class="fixed top-0 left-0 h-screen w-64 bg-[#34bcb0]  border-r shadow-xl">
    <div class="flex items-center justify-center h-16 mt-4 w-full">
        <a href="{{ route('dashboard') }}">
            <img src="{{ asset('img/bmd.png') }}" class="w-full h-full object-cover" alt="BMD Logo">
        </a>
    </div> 
    <div class="p-4">
        
        <div class="mt-1">
            <h1 class="mx-0.5 text-white text-2xl">Cuenta</h1>
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="flex items-center p-2 text-xl font-normal text-gray-500 bg-gray-50 hover:bg-[#2a9992] hover:text-white w-full rounded-2xl mt-2">
                        <span>{{ Auth::user()->name }}</span>
                        <svg class="w-6 h-6 ml-auto fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('profile.edit')" class="text-xl">
                        {{ __('Modificar Perfil') }}
                    </x-dropdown-link>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="text-xl">
                            {{ __('Cerrar Sesion') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>

        <hr class="text-white m-2">
        
        <div class="mt-4 space-y-2">
            <h1 class="mx-0.5 text-white text-2xl">Aplicaciones</h1>
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="flex items-center p-1 text-xl font-normal text-gray-600 rounded-lg  hover:bg-[#2a9992] hover:text-white w-full bg-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" viewBox="0 0 24 24"><path fill="currentColor" d="M13 9V3h8v6zM3 13V3h8v10zm10 8V11h8v10zM3 21v-6h8v6z"/></svg>
                <span class="ml-3">{{ __('Dashboard') }}</span>
            </x-nav-link>

            <x-nav-link :href="route('equipos.index')" :active="request()->routeIs('equipos.index')" class="flex items-center p-1 text-xl font-normal text-gray-600 rounded-lg  hover:bg-[#2a9992] hover:text-white w-full bg-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" viewBox="0 0 48 48"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M38.5 5.5h-29a4 4 0 0 0-4 4v29a4 4 0 0 0 4 4h29a4 4 0 0 0 4-4v-29a4 4 0 0 0-4-4"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M5.5 21.05s.723-.25 1.058-.428c.225-.12.38-.395.631-.429c.229-.03.431.167.654.226c.236.062.48.091.721.135c.21.039.428.045.631.113c.223.074.418.216.631.315c.275.128.531.358.834.36c.219.003.39-.225.609-.247c.532-.054 1.058.423 1.577.293c.14-.035.206-.213.338-.27c.41-.18.907-.053 1.33-.203c.14-.05.256-.15.383-.226c.318-.191.664-.345.947-.586c.174-.148.296-.349.45-.518c.147-.161.346-.283.451-.473c.206-.373.233-.822.316-1.24c.051-.26.051-.53.112-.789c.082-.346.338-1.014.338-1.014l.631.338l.383.97s.361.45.406.653s.36 1.127.36 1.127l.249.653l.315.226l.88-.113l.472.068l.361-.113l.766-.113l.36.248s.091.248.181.293s.474.113.474.113l.901-2.862l.654-3.223l.518 4.53l.428 1.51l.609-.158l.405-2.006l.722-.72l.608.9l.226.992l.946-1.487l1.014 2.05l.338.249l.429.112l.788-.27l.27.27l1.398-1.397l.766 1.285l.834-.767l.609 1.262l.879-1.059l.789.721l.653-.158l.428.586l.136.564l.405-.068l.541-1.645l.519.811l.45.045l.744.09l.36.361h.784m-37 7.303l1.351.36l.564.563l.901-.586l.699.248l.586-.293l.789-.608l.518.405l1.78-.248l1.736.384l1.082.653l1.375 1.33l.563 2.907l1.532-1.487l.722-2.57l2.14.293l.79-.157l.608-.519l.924 2.186l.676 3.651l.811-5.77l.36-.225l.61.519l.382 2.299l.654.36l.473-.518l.451-1.352l.721 1.465l.834-1.398l.699-1.036l.811.383l.564-.203l.788.496l.609.63l.901-1.33l.631 1.038l.79-1.51l.698 1.172l.789-.834l.608.112l.992-1.15l.586 1.691l.721-.879l.789.135l.676-.563h.716"/></svg>
                <span class="ml-3">{{ __('Equipos Medicos') }}</span>
            </x-nav-link>

            <x-nav-link :href="route('fichas.index')" :active="request()->routeIs('fichas.index')" class="flex items-center p-1 text-xl font-normal text-gray-600 rounded-lg  hover:bg-[#2a9992] hover:text-white w-full bg-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" viewBox="0 0 20 20"><path fill="currentColor" d="m19.398 7.415l-7.444-1.996L10.651.558c-.109-.406-.545-.642-.973-.529L.602 2.461c-.428.114-.686.538-.577.944l3.23 12.051c.109.406.544.643.971.527l3.613-.967l-.492 1.838c-.109.406.149.83.577.943l8.11 2.174c.428.115.862-.121.972-.529l2.97-11.084c.108-.406-.15-.83-.578-.943M1.633 3.631l7.83-2.096l2.898 10.818l-7.83 2.096zm14.045 14.832L8.864 16.6l.536-2.002l3.901-1.047c.428-.113.688-.537.578-.943l-1.508-5.627l5.947 1.631z"/></svg>
                <span class="ml-3">{{ __('Fichas Tecnicas') }}</span>
            </x-nav-link>

            <x-nav-link :href="route('proveedor.index')" :active="request()->routeIs('proveedor.index')" class="flex items-center p-1 text-xl font-normal text-gray-600 rounded-lg  hover:bg-[#2a9992] hover:text-white w-full bg-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" viewBox="0 0 24 24"><path fill="currentColor" d="M21 20h2v2H1v-2h2V3a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1zM11 8H9v2h2v2h2v-2h2V8h-2V6h-2zm3 12h2v-6H8v6h2v-4h4z"/></svg>
                <span class="ml-3">{{ __('Proveedor de Equipos') }}</span>
            </x-nav-link>

            <x-nav-link :href="route('areas.index')" :active="request()->routeIs('areas.index')" class="flex items-center p-1 text-xl font-normal text-gray-600 rounded-lg  hover:bg-[#2a9992] hover:text-white w-full bg-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" viewBox="0 0 14 14"><path fill="currentColor" fill-rule="evenodd" d="M0 7a7 7 0 1 1 14 0A7 7 0 0 1 0 7m8.833-.5A1.667 1.667 0 1 0 7.32 4.137a1.25 1.25 0 1 0 .385 1.922a1.66 1.66 0 0 0 1.13.441Zm-5.07 2.196a.5.5 0 0 0-.187.04a.625.625 0 0 1-.545-1.126c.167-.08.416-.155.694-.164a1.5 1.5 0 0 1 .965.3c.321.248.472.58.536.857c.063.27.054.53.018.712a.5.5 0 0 0 .01.19c.018.08.049.124.081.149c.033.025.082.043.165.04a.5.5 0 0 0 .186-.039a.625.625 0 1 1 .545 1.125a1.8 1.8 0 0 1-.693.164a1.5 1.5 0 0 1-.966-.3a1.5 1.5 0 0 1-.536-.856a1.8 1.8 0 0 1-.018-.713a.5.5 0 0 0-.01-.19c-.018-.08-.049-.123-.081-.148c-.033-.025-.082-.044-.165-.041ZM8 7.49a.875.875 0 1 0 0 1.75a.875.875 0 0 0 0-1.75M2.664 5.084a.875.875 0 1 1 1.75 0a.875.875 0 0 1-1.75 0m7.586 3.871a.875.875 0 1 0 0 1.75a.875.875 0 0 0 0-1.75" clip-rule="evenodd"/></svg>
                <span class="ml-3">{{ __('Areas de Equipos') }}</span>
            </x-nav-link>
            
            <x-nav-link :href="route('categorias.index')" :active="request()->routeIs('categorias.index')" class="flex items-center p-1 text-xl font-normal text-gray-600 rounded-lg  hover:bg-[#2a9992] hover:text-white w-full bg-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" viewBox="0 0 24 24"><path fill="currentColor" d="M6 7.5a5.5 5.5 0 1 1 11 0a5.5 5.5 0 0 1-11 0M11.75 22H2v-2a6 6 0 0 1 6-6h3.75zm2-8h8.5v2h-8.5zm0 3h8.5v2h-8.5zm0 3h8.5v2h-8.5z"/></svg>
                <span class="ml-3">{{ __('Categorias de Equipos') }}</span>
            </x-nav-link>
            
            

            
        </div>

        
    </div>
</nav>

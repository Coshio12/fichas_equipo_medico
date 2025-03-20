@extends('theme.base')

<body class="bg-gray-100 bg-no-repeat bg-center sm:bg-cover" style="background-image: url('../img/bio.png')">
    <div class="w-full h-screen font-sans bg-cover bg-center bg-[url('/img/bio.png')]">
        <div class="container flex items-center justify-center flex-1 h-full mx-auto">
            <div class="w-full max-w-lg">
                <div class="leading-loose">
                    <form method="POST" action="{{ route('register') }}" class="max-w-sm p-10 m-auto rounded shadow-xl bg-white/85">
                        @csrf
                        <p class="mb-8 text-2xl font-light text-center text-gray-500">
                            Registrar Contraseña
                        </p>
                    
                        {{-- Name --}}
                        <div class="mb-2">
                            <div class="relative">
                                <label for="name">Nombre Completo</label>
                                <input id="name" type="text" name="name" :value="old('name')" class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-transparent" placeholder="Digita tu nombre de Usuario" required autofocus autocomplete="name" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                        </div>
                    
                        {{-- Email --}}
                        <div class="mb-2">
                            <div class="relative">
                                <label for="email">Correo Electrónico</label>
                                <input id="email" type="email" name="email" :value="old('email')" required autocomplete="username" class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-transparent" placeholder="Digita el correo" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                        </div>
                    
                        {{-- Password --}}
                        <div class="mb-2">
                            <div class="relative">
                                <label for="password">Contraseña</label>
                                <input id="password" type="password" name="password" required autocomplete="new-password" class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-transparent" placeholder="Digita la Contraseña" />
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                        </div>
                    
                        {{-- Confirm Password --}}
                        <div class="mb-2">
                            <div class="relative">
                                <label for="password_confirmation">Confirmar Contraseña</label>
                                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-transparent" placeholder="Confirma Contraseña" />
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>
                        </div>
                    
                        {{-- Boton --}}
                        <div class="flex items-center justify-between mt-4">
                            <button type="submit" class="py-2 px-4 bg-white hover:bg-indigo-900 hover:text-white focus:ring-indigo-500 text-black w-full ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg border-2 border-indigo-500">
                                Registrar Cuenta
                            </button>
                        </div>
                        <div class="text-center">
                            <label for="text">¿Tienes una cuenta? </label>
                            <a href="{{ route('login') }}" class="right-0 inline-block text-sm font-light align-baseline text-gray-500 hover:text-blue-500">Inicia Sesión</a>
                        </div>
                    </form>
                    

                </div>
            </div>
        </div>
    </div>
</body>
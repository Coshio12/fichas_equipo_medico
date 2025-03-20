{{-- <!-- Session Status -->
<x-auth-session-status class="mb-4" :status="session('status')" />

<form >
    @csrf

    <!-- Email Address -->
    <div>
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- Password -->
    <div class="mt-4">
        <x-input-label for="password" :value="__('Password')" />

        <x-text-input id="password" class="block mt-1 w-full"
                        type="password"
                        name="password"
                        required autocomplete="current-password" />

        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <!-- Remember Me -->
    <div class="block mt-4">
        <label for="remember_me" class="inline-flex items-center">
            <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
            <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
        </label>
    </div>

    <div class="flex items-center justify-end mt-4">
        @if (Route::has('password.request'))
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
        @endif

        <x-primary-button class="ms-3">
            {{ __('Log in') }}
        </x-primary-button>
    </div>
    
</form>

 --}}

@extends('theme.base')
<div class="w-full h-screen font-sans bg-cover bg-center" style="background-image: url(../img/bio.png)">

    <div class="container flex items-center justify-center flex-1 h-full mx-auto">
        <div class="w-full max-w-lg">
        <div class="leading-loose">
            <form class="max-w-sm p-10 m-auto rounded shadow-xl bg-white/85" method="POST" action="{{ route('login') }}">
                @csrf
                        <p class="mb-8 text-2xl font-light text-center text-black-500">
                            Iniciar Sesión
                        </p>
                        <div class="mb-2">
                            <div class=" relative ">
                                {{-- Email --}}
                            <label for="email">Correo Electronico</label>
                                <input id="email" type="email" name='email' class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-transparent" :value="old('email')" placeholder="Digita el correo" required autocomplete="current-password"/>
                            </div>
                        </div>
                            <div class="mb-2">
                                {{-- passoword --}}
                                <div class=" relative ">
                                <label for="password">Contraseña</label>
                                    <input id="password" type="password" name='password' class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-transparent" placeholder="Digita la Contraseña"/>
                                    </div>
                                </div>
                                {{-- boton --}}
                                <div class="flex items-center justify-between mt-4">
                                    <button type="submit" class="py-2 px-4 bg-white hover:bg-indigo-900 hover:text-white focus:ring-indigo-500 text-black w-full ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg border-2 border-indigo-500">

                                        Iniciar Sesión
                                    </button>
                                </div>
                                <div class="text-center">
                                <label htmlFor="text">No tienes Cuenta? </label>
                                    
                                    <a href="{{route('register')}}" class="right-0 inline-block text-sm font-light align-baseline text-500 hover:text-blue-500">Registrate!</a>
                                </div>
            </form>
        </div>
        </div>
    </div>
    </div>
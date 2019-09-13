@extends('layouts.app')

@section('content')
<div class="h-full flex justify-center items-center bg-gray-300 mx-auto">
    <div class="w-96 bg-blue-900 rounded-lg shadow-xl p-6">
        <svg class="fill-current text-white w-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path d="M3.9 4.2c-.5 0-.8.3-.8.8s.4.8.8.8c.5 0 .8-.4.8-.8.1-.5-.3-.8-.8-.8zM3.3 18.6c0 1.4-.2 2.1-1.5 2.1-.3 0-.7 0-.9-.1l-.3 1.1c.3.1.7.2 1.1.2 1.9 0 2.7-1.2 2.7-3.2V8.1H3.3v10.5zM9.4 17.5c1.4 0 2.3-.4 3-1.2.8-1 1.1-2.1 1.1-3.8 0-1.4-.2-2.7-1-3.5-.6-.7-1.5-1.1-2.9-1.1s-2.3.4-3 1.2c-.8 1-1.1 2.2-1.1 3.8 0 1.5.2 2.6 1 3.5.6.7 1.5 1.1 2.9 1.1zM7.5 9.7c.3-.4.9-.8 2-.8 1 0 1.6.3 1.9.7.5.6.7 1.7.7 2.9s-.2 2.4-.7 3.1c-.3.4-.9.8-2 .8-1 0-1.6-.3-1.9-.7-.5-.6-.7-1.6-.7-2.9 0-1.2.2-2.4.7-3.1zM15 14.4c0 2.1.4 3.1 2.5 3.1.6 0 1.3-.1 1.8-.2l-.1-1c-.5.1-1 .2-1.5.2-1.4 0-1.5-.6-1.5-2.1v-5h3V8.3h-3v-3l-1.2.2v2.7h-1.8v1.1H15v5.1zM6 18h17v1H6z"/>
        </svg>
        <h1 class="text-white pt-8 text-3xl">Join Us</h1>
        <h2 class="text-blue-300">Enter you information below</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="relative pt-8">
                <label for="name" class="uppercase text-blue-500 text-xs font-bold absolute pl-3 pt-2">Full Name</label>
                <div>
                    <input id="name" type="text" class="pt-8 w-full p-3 bg-blue-800 rounded text-gray-100 outline-none focus:bg-blue-700" name="name" value="{{ old('name') }}" autofocus>
                    @error('name')
                        <span class="text-red-400 text-sm pl-3 pt-1" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>
            <div class="relative pt-2">
                <label for="email" class="uppercase text-blue-500 text-xs font-bold absolute pl-3 pt-2">Email Address</label>
                <div>
                    <input id="email" type="email" class="pt-8 w-full p-3 bg-blue-800 rounded text-gray-100 outline-none focus:bg-blue-700" name="email" value="{{ old('email') }}">
                    @error('email')
                        <span class="text-red-400 text-sm pl-3 pt-1" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="relative pt-2">
                <label for="password" class="uppercase text-blue-500 text-xs font-bold absolute pl-3 pt-2">Password</label>
                <div>
                    <input id="password" type="password" class="pt-8 w-full p-3 bg-blue-800 rounded text-gray-100 outline-none focus:bg-blue-700" name="password" autocomplete="new-password">
                    @error('password')
                        <span class="text-red-400 text-sm pl-3 pt-1" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>
            <div class="relative pt-2">
                <label for="password-confirm" class="uppercase text-blue-500 text-xs font-bold absolute pl-3 pt-2">Re-Enter Password</label>
                <div><input id="password-confirm" type="password" class="pt-8 w-full p-3 bg-blue-800 rounded text-gray-100 outline-none focus:bg-blue-700" name="password_confirmation"></div>
            </div>
            <div class="relative pt-8">
                <div>
                    <button type="submit" class="w-full rounded uppercase text-blue-800 font-bold bg-gray-400 pt-2 pb-2">Register</button>
                </div>
            </div>
            <div class="flex justify-between pt-8 text-white font-bold text-sm">
                <a class="btn btn-link hover:text-blue-300" href="{{ route('password.request') }}">Forgot Your Password?</a>
                <a class="btn btn-link hover:text-blue-300" href="{{ route('login') }}">Login</a>
            </div>
        </form>
    </div>
</div>
@endsection
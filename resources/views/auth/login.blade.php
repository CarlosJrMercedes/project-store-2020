@extends('layouts.main')

@section('content-body')
<div class="flex flex-wrap justify-center pt-10">
    <div class="flex flex-wrap  p-10 justify-center border-2 border-black w-1/2 bg-black 
    bg-opacity-25 rounded">
    <div class="flex w-full justify-center pb-5">
        <img src="{{asset('src/img/layouts/usuario.png')}}" width="100px" height="100px">
    </div>
        <form method="POST" action="{{ route('login') }}" class="w-full max-w-sm pb-10 pl-5 pr-5">
            @csrf

            <div class="w-full">
                <label for="email" class="text-flugreen-500 ">{{ __('E-Mail Address :') }}</label>
                <br>
                <div class="col-md-6">
                    <input id="email" type="email" class="bg-gray-800 appearance-none border-2 border-black 
                    rounded w-full py-2 px-2 text-flugreen-500  leading-tight 
                    focus:outline-none focus:bg-gray-700 focus:border-gray-500 
                    @error('email') is-invalid @enderror" name="email" 
                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="text-red-800" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="">
                <label for="password" class="text-flugreen-500 ">{{ __('Password :') }}</label>
                <br>
                <div class="col-md-6">
                    <input id="password" type="password" class="bg-gray-800 appearance-none border-2 border-black 
                    rounded w-full py-2 px-2 text-flugreen-500  leading-tight 
                    focus:outline-none focus:bg-gray-700 focus:border-gray-500 w-1/2
                        @error('password') is-invalid @enderror" 
                        name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="text-red-800" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="">
                <div class="md:w-1/3"></div>
                <label class="md:w-2/3 block text-gray-500">
                    <input class="mr-2 leading-tight" type="checkbox" 
                    name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <span class="text-xs text-flugreen-500">
                    {{ __('Remember Me') }}
                    </span>
                </label>
                </div>

            <div class="pt-5">
                <div class="">
                    <button type="submit" class="border-2 border-black hover:bg-flugreen-500 hover:text-black 
                    text-flugreen-500 font-bold py-2 px-4 w-full rounded transform motion-reduce:transform-none 
                    hover:-translate-y-1 hover:scale-110 transition ease-in-out duration-300">
                        {{ __('Login') }}
                    </button>
                    <br>

                    @if (Route::has('password.request'))
                        <div class="flex-shrink">
                            <a class="text-red-800 underline hover:text-blue-500" 
                            href="{{ route('password.request') }}">
                                {{ __('Olvidastes tu contraseña?') }}
                            </a>
                            <br>
                            <a class="text-red-800 underline hover:text-blue-500" 
                            href="{{ route('register') }}">{{ __('Registrate') }}</a>
                            <a class="text-red-800 underline hover:text-blue-500" 
                            href="{{ route('index') }}">{{ __('Regresar') }}</a>
                        </div>
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>
<div class="h-48">

</div>
@endsection

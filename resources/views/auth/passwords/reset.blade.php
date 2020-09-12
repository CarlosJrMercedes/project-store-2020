@extends('layouts.main')

@section('content-body')
<div class="flex flex-grap justify-center pt-10">
    <div class="flex flex-wrap bg-black bg-opacity-25 border-2 border-black w-1/2 rounded-md
    items-center justify-center">
        <div class="flex flex-col w-full p-2 items-center justify-center p-10 pb-10">
            <div class="text-flugreen-500 text-xl uppercase">
                {{ __('Reset Password') }}
            </div>
            <form method="POST" action="{{ route('password.update') }}"
             class="flex flex-col w-full items-center justify-center">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="w-1/2">
                    <label for="email" class="text-flugreen-500">
                        {{ __('E-Mail :') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" 
                        class="bg-gray-800 appearance-none border-2 border-black 
                        rounded w-full py-2 px-2 text-flugreen-500  leading-tight 
                        focus:outline-none focus:bg-gray-700 focus:border-gray-500  @error('email') is-invalid @enderror" 
                        name="email" value="{{ $email ?? old('email') }}" 
                        required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="w-1/2">
                    <label for="password" class="text-flugreen-500">{{ __('Contraseña') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="bg-gray-800 appearance-none border-2 border-black 
                    rounded w-full py-2 px-2 text-flugreen-500  leading-tight 
                    focus:outline-none focus:bg-gray-700 focus:border-gray-500  @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="text-red-800" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="w-1/2">
                    <label for="password-confirm" class="text-flugreen-500">{{ __('Confirm contraseña') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="bg-gray-800 appearance-none border-2 border-black 
                    rounded w-full py-2 px-2 text-flugreen-500  leading-tight 
                    focus:outline-none focus:bg-gray-700 focus:border-gray-500 " name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>
                <div class="m-3"></div>
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="border-2 border-black hover:bg-flugreen-500 
                        hover:text-black text-flugreen-500 font-bold py-2 px-2 rounded transform 
                        motion-reduce:transform-none hover:-translate-y-1 hover:scale-110 transition 
                        ease-in-out duration-300 text-center">
                            {{ __('Reset Password') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

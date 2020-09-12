@extends('layouts.main')

@section('content-body')
<div class="flex flex-grap justify-center pt-10">
    <div class="flex flex-wrap bg-black bg-opacity-25 border-2 border-black w-1/2 h-64 rounded-md
        items-center justify-center">
        <div class="flex flex-col w-full p-2 items-center justify-center">
                @if (session('status'))
                    <div class="text-blue-800" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
            <div class="text-xl text-flugreen-500 uppercase">
                {{ __('Reset Password') }}
            </div>
            <form method="POST" action="{{ route('password.email') }}"
             class="w-1/2"> 
                @csrf
    
                <div class="w-full">
                    <label for="email" class="text-flugreen-500 uppercase">
                        {{ __('E-Mail :') }}
                    </label>
    
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
                <div class="m-4"></div>
                <div class="">
                    <button type="submit" class="border-2 border-black hover:bg-flugreen-500 
                    hover:text-black text-flugreen-500 font-bold py-2 px-2 rounded transform 
                    motion-reduce:transform-none hover:-translate-y-1 hover:scale-110 transition 
                    ease-in-out duration-300 text-center">
                        {{ __('Send Password Reset Link') }}
                    </button>
                    <div class="m-3"></div>
                    <a href="{{ route('index') }}" class="border-2 border-black 
                        hover:bg-blue-500 hover:text-black 
                        text-flugreen-500 py-2 px-4 w-full rounded text-center">
                        cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

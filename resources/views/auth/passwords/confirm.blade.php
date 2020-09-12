@extends('layouts.main')

@section('content')
<div class="flex flex-grap justify-center pt-10">
    <div class="flex flex-wrap bg-black bg-opacity-25 border-2 border-black w-1/2 h-64 rounded-md
    items-center justify-center">
        <div class="flex flex-col w-full p-2 items-center justify-center">
            <div class="text-flugreen-500">{{ __('Confirm Password') }}</div>

            <div class="text-flugreen-500">
                {{ __('Please confirm your password before continuing.') }}

                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="bg-gray-800 appearance-none border-2 border-black 
                            rounded w-full py-2 px-2 text-flugreen-500  leading-tight 
                            focus:outline-none focus:bg-gray-700 focus:border-gray-500  @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="text-red-800" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Confirm Password') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

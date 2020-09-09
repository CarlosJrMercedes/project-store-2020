@extends('layouts.perfil-main')
@section('content-body')


        @if ($errors->any() != false )
            
        
        @endif
    <div class="flex justify-center pt-5">
        <div class="P-4 pt-5 flex justify-center pl-6 bg-gray-700 w-5/6 rounded-md bg-opacity-25">
            <form action="{{ route( 'users.update', $users->id) }}" method="POST" 
            class="w-5/6" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                <div class="flex flex-wrap w-full uppercase text-xl justify-start text-flugreen-500">
                    <p><strong>Editar usuario :</strong></p>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-flugreen-500 text-md 
                        font-sans mb-2" for="grid-first-name">
                            Nombre Completo :
                        </label>
                        <input class="bg-gray-800 appearance-none border-2 border-black 
                        rounded w-full py-2 px-2 text-flugreen-500  leading-tight 
                        focus:outline-none focus:bg-gray-700 focus:border-gray-500" 
                        id="grid-first-name" type="text" name="name"  value="{{$users->name}}">
                        @if ($errors->first('name'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-2 py-2 
                        rounded relative" role="alert" id="errorName">
                            <div class="flex flex-col">
                                <strong class="font-bold">Error!</strong>
                                <span class="block sm:inline">
                                    {{$errors->first('name')}}
                                </span>
                            </div>
                            <span class="absolute top-0 bottom-0 right-0 px-4 py-3" id="closeName">
                                <svg class="fill-current h-6 w-6 text-red-500" role="button" 
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <title>Close</title>
                                    <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 
                                    1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 
                                    8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 
                                    1.2 0 0 1 0 1.698z"/>
                                </svg>
                            </span>
                        </div>
                        @endif
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-flugreen-500 text-md 
                        font-sans mb-2" for="grid-last-name">
                            E-Mail
                        </label>
                        <input class="bg-gray-800 appearance-none border-2 border-black 
                        rounded w-full py-2 px-2 text-flugreen-500  leading-tight 
                        focus:outline-none focus:bg-gray-700 focus:border-gray-500" 
                        id="grid-last-name" type="email" name="email" value="{{$users->email}}">
                        @if ($errors->first('email'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-2 py-2 
                        rounded relative" role="alert" id="errorEmail">
                            <div class="flex flex-col">
                                <strong class="font-bold">Error!</strong>
                                <span class="block sm:inline">
                                    {{$errors->first('email')}}
                                </span>
                            </div>
                            <span class="absolute top-0 bottom-0 right-0 px-4 py-3" id="closeEmai">
                                <svg class="fill-current h-6 w-6 text-red-500" role="button" 
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <title>Close</title>
                                    <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 
                                    1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 
                                    8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 
                                    1.2 0 0 1 0 1.698z"/>
                                </svg>
                            </span>
                        </div>
                        @endif
                    </div>

                </div>
                <div class="flex flex-wrap -mx-3 mb-2">
                    <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-flugreen-500 text-md 
                        font-sans mb-2" for="grid-city">
                            Contraseña :
                        </label>
                        <input class="bg-gray-800 appearance-none border-2 border-black 
                        rounded w-full py-3 px-3 text-flugreen-500  leading-tight 
                        focus:outline-none focus:bg-gray-700 focus:border-gray-500" 
                        id="grid-city" type="password" name="pass" value="{{old('pass')}}">
                        @if ($errors->first('pass'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-2 py-2 
                        rounded relative" role="alert" id="errorPass">
                            <div class="flex flex-col">
                                <strong class="font-bold">Error!</strong>
                                <span class="block sm:inline">
                                    {{$errors->first('pass')}}
                                </span>
                            </div>
                            <span class="absolute top-0 bottom-0 right-0 px-4 py-3" id="closePass">
                                <svg class="fill-current h-6 w-6 text-red-500" role="button" 
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <title>Close</title>
                                    <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 
                                    1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 
                                    8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 
                                    1.2 0 0 1 0 1.698z"/>
                                </svg>
                            </span>
                        </div>
                        @endif
                    </div>
                    <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-flugreen-500 text-md 
                        font-sans mb-2" for="grid-state">
                            Rol :
                        </label>
                        <div class="relative">
                            <select class="bg-gray-800 appearance-none border-2 border-black 
                            rounded w-full py-3 px-3 text-flugreen-500  leading-tight 
                            focus:outline-none focus:bg-gray-700 focus:border-gray-500"
                            id="grid-state" name="rol" value="{{$users->id_rol}}">
                                <option disabled selected>..SELECCIONE..</option>
                                @foreach ($roles as $value)
                                    <option value="{{$value->id}}"{{ old('rol') == $value->id ? 'selected' : '' }}
                                        {{ $users->id_rol == $value->id ? 'selected' : '' }}>{{ $value->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @if ($errors->first('rol'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-2 py-2 
                        rounded relative" role="alert" id="errorRol">
                            <div class="flex flex-col">
                                <strong class="font-bold">Error!</strong>
                                <span class="block sm:inline">
                                    {{$errors->first('rol')}}
                                </span>
                            </div>
                            <span class="absolute top-0 bottom-0 right-0 px-4 py-3" id="closeRole">
                                <svg class="fill-current h-6 w-6 text-red-500" role="button" 
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <title>Close</title>
                                    <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 
                                    1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 
                                    8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 
                                    0 0 1 0 1.698z"/>
                                </svg>
                            </span>
                        </div>
                        @endif
                    </div>
                    <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-flugreen-500 text-md 
                        font-sans mb-2" for="grid-zip">
                            Foto :
                        </label>
                        <input type="text" hidden readonly value="{{$users->photo}}" name="urlfoto">
                        <input class="bg-gray-800 appearance-none border-2 border-black 
                        rounded w-full py-3 px-3 text-flugreen-500  leading-tight 
                        focus:outline-none focus:bg-gray-700 focus:border-gray-500 " id="grid-zip" 
                        type="file" accept="image/*" name="foto">
                        @if ($errors->first('foto'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-2 py-2 
                        rounded relative" role="alert" id="errorPhoto" >
                            <div class="flex flex-col">
                                <strong class="font-bold">Error!</strong>
                                <span class="block sm:inline">
                                    {{$errors->first('foto')}}
                                </span>
                            </div>
                            <span class="absolute top-0 bottom-0 right-0 px-4 py-3" id="closePhoto">
                                <svg class="fill-current h-6 w-6 text-red-500" role="button" 
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <title>Close</title>
                                    <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 
                                    3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 
                                    1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 
                                    2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/>
                                </svg>
                            </span>
                        </div>
                        @endif
                    </div>
                    <div class="flex w-full md:w-1/4 px-3 mb-6 md:mb-0 justify-center">
                        <img src="{{asset("storage/src/img/user-images/{$users->photo}")}}" alt="" 
                        width="100px" height="50px">
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <button class="bg-teal-800 border-solid border-2 border-black py-3 px-3 cursor-pointer
                    rounded-md hover:bg-opacity-0 hover:text-flugreen-500 " name="send" type="submit">
                        <strong>Ingresar Datos</strong>
                    </button>
                    <div class="m-2"></div>
                    <a class="bg-blue-800 border-solid border-2  border-black py-3 px-3 cursor-pointer
                    rounded-md hover:bg-opacity-0 hover:text-flugreen-500 " title="Cancelar" 
                    href="{{route('users.index')}}">
                        <strong>Cancelar</strong>
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scrippt')
@parent
    <script src="{{asset('js/user-create.js')}}"></script>
    <script>
        $(document).ready(function(){
            // Swal.fire("ERROR",,"error");
        });
    </script>
@endsection
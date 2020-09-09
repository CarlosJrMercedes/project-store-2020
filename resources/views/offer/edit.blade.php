@extends('layouts.perfil-main')
@section('content-body')


        @if ($errors->any() != false )
            
        
        @endif
    <div class="flex justify-center pt-5">
        <div class="P-4 pt-5 flex justify-center pl-6 bg-gray-700 w-5/6 rounded-md bg-opacity-25">
            <form action="{{ route( 'offer.update',$offer->id ) }}" method="POST" 
                class="w-5/6" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="flex flex-wrap w-full uppercase text-xl justify-start text-flugreen-500">
                    <p><strong>Editar oferta :</strong></p>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-flugreen-500 text-md 
                        font-sans mb-2" for="grid-last-name">
                            Descripción :
                        </label>
                        <textarea name="descripcion" id="description" class="bg-gray-800 appearance-none border-2 border-black 
                        rounded w-full py-1 px-1 text-flugreen-500  leading-tight 
                        focus:outline-none focus:bg-gray-700 focus:border-gray-500">{{old('descripcion',$offer->description)}}</textarea>
                        @if ($errors->first('descripcion'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-2 py-2 
                        rounded relative" role="alert" id="errorDescripcion">
                            <div class="flex flex-col">
                                <strong class="font-bold">Error!</strong>
                                <span class="block sm:inline">
                                    {{$errors->first('descripcion')}}
                                </span>
                            </div>
                            <span class="absolute top-0 bottom-0 right-0 px-4 py-3" id="closeDescripcion">
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
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-flugreen-500 text-md 
                        font-sans mb-2" for="grid-state">
                            Producto :
                        </label>
                        <div class="relative">
                            <select class="bg-gray-800 appearance-none border-2 border-black 
                            rounded w-full py-3 px-3 text-flugreen-500  leading-tight 
                            focus:outline-none focus:bg-gray-700 focus:border-gray-500"
                            id="" name="producto">
                                <option disabled selected>..SELECCIONE..</option>
                                @foreach ($product as $value)
                                <option value="{{$value->id}}"{{ old('producto') == $value->id ? 'selected' : ''}}
                                        {{$offer->product_id == $value->id ? 'selected' :''}}>{{ $value->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @if ($errors->first('producto'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-2 py-2 
                        rounded relative" role="alert" id="errorProducto">
                            <div class="flex flex-col">
                                <strong class="font-bold">Error!</strong>
                                <span class="block sm:inline">
                                    {{$errors->first('producto')}}
                                </span>
                            </div>
                            <span class="absolute top-0 bottom-0 right-0 px-4 py-3" id="closeProducto">
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
                </div>
                <div class="flex flex-wrap -mx-3 mb-2">
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-flugreen-500 text-md 
                        font-sans mb-2" for="grid-city">
                            Inicio :
                        </label>
                        <input class="bg-gray-800 appearance-none border-2 border-black
                        rounded w-full py-3 px-3 text-flugreen-500  leading-tight 
                        focus:outline-none focus:bg-gray-700 focus:border-gray-500" 
                        type="date" name="start"  value="{{old('start',$offer->start)}}">
                        @if ($errors->first('start'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-2 py-2 
                        rounded relative" role="alert" id="errorStart">
                            <div class="flex flex-col">
                                <strong class="font-bold">Error!</strong>
                                <span class="block sm:inline">
                                    {{$errors->first('start')}}
                                </span>
                            </div>
                            <span class="absolute top-0 bottom-0 right-0 px-4 py-3" id="closeStart">
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
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-flugreen-500 text-md 
                        font-sans mb-2" for="grid-city">
                            Termina :
                        </label>
                        <input class="bg-gray-800 appearance-none border-2 border-black
                        rounded w-full py-3 px-3 text-flugreen-500  leading-tight 
                        focus:outline-none focus:bg-gray-700 focus:border-gray-500" 
                        id="grid-city" type="date" name="end" value="{{old('end',$offer->end)}}">
                        @if ($errors->first('end'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-2 py-2 
                        rounded relative" role="alert" id="errorEndend">
                            <div class="flex flex-col">
                                <strong class="font-bold">Error!</strong>
                                <span class="block sm:inline">
                                    {{$errors->first('end')}}
                                </span>
                            </div>
                            <span class="absolute top-0 bottom-0 right-0 px-4 py-3" id="closeEnd">
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
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-flugreen-500 text-md 
                        font-sans mb-2" for="grid-city">
                            Precio oferta :
                        </label>
                        <input class="bg-gray-800 appearance-none border-2 border-black
                        rounded w-full py-3 px-3 text-flugreen-500  leading-tight 
                        focus:outline-none focus:bg-gray-700 focus:border-gray-500" 
                        id="grid-city" type="text" name="offerPrice" value="{{old('offerPrice',$offer->offer_price)}}">
                        @if ($errors->first('offerPrice'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-2 py-2 
                        rounded relative" role="alert" id="errorOfferPrice">
                            <div class="flex flex-col">
                                <strong class="font-bold">Error!</strong>
                                <span class="block sm:inline">
                                    {{$errors->first('offerPrice')}}
                                </span>
                            </div>
                            <span class="absolute top-0 bottom-0 right-0 px-4 py-3" id="closOfferPrice">
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
                <div class="flex flex-wrap -mx-3 mb-6">
                    <button class="bg-teal-800 border-solid border-2 border-black py-3 px-3 cursor-pointer
                    rounded-md hover:bg-opacity-0 hover:text-flugreen-500 " name="send" type="submit">
                        <strong>Ingresar Datos</strong>
                    </button>
                    <div class="m-2"></div>
                    <a class="bg-red-800 border-solid border-2  border-black py-3 px-3 cursor-pointer
                    rounded-md hover:bg-opacity-0 hover:text-black " title="Cancelar" 
                    href="{{route('offer.index')}}">
                        <strong>Cancelar</strong>
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scrippt')
@parent
    <script src="{{asset('js/product-create.js')}}"></script>
    <script>
        $(document).ready(function(){
            // Swal.fire("ERROR",,"error");
        });
    </script>
@endsection
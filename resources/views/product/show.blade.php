@extends('layouts.perfil-main')

@section('content-body')
<div class="flex flex-wrap w-auto h-auto bg-gray-800 opacity-24 border-2 border-gray-700
rounded-md">
    <div class="flex-initial w-full text-uppercase text-3xl text-center">
        <span><strong>{{$product->name}}</strong></span>
    </div>
</div>
<div class="mt-2"></div>
<div class="flex flex-wrap">
    <div class="w-1/2">
        <div class="flex flex-wrap w-full bg-gray-800 opacity-24 border-2 border-gray-700 p-5
        rounded-md text-2xl h-32">
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-full px-3 mb-6 md:mb-0">
                    <p><strong>Descripción :</strong></p>
                </div>
                <div class="w-full md:w-full px-3 mb-6 md:mb-0">
                    <p>{{$product->description}}</p>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap w-full bg-gray-800 opacity-24 border-2 border-gray-700 p-5
             rounded-md text-2xl h-32">
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-full px-3 mb-6 md:mb-0">
                    <p><strong>Sub categoria :</strong></p>
                </div>
                <div class="w-full md:w-full px-3 mb-6 md:mb-0">
                    <p>{{$product->find($product->id)->subCategory->name}}</p>
                </div>
            </div>
        </div>
        <div class="flex w-full flex-shirink-0">
            <div class="flex flex-wrap w-1/3 bg-gray-800 opacity-24 border-2 border-gray-700 p-5
             rounded-md text-xl h-40">
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-full px-3 mb-6 md:mb-0">
                        <p><strong>Precio :</strong></p>
                    </div>
                    <div class="w-full md:w-full px-3 mb-6 md:mb-0">
                        <p>${{$product->price}}</p>
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap w-1/3 bg-gray-800 opacity-24 border-2 border-gray-700 p-5
                rounded-md text-xl h-40">
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-full px-3 mb-6 md:mb-0">
                        <p><strong>Existencias :</strong></p>
                    </div>
                    <div class="w-full md:w-full px-3 mb-6 md:mb-0">
                        <p>{{$product->quantity}}</p>
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap w-1/3 bg-gray-800 opacity-24 border-2 border-gray-700 p-5
                rounded-md text-xl h-40">
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-full px-3 mb-6 md:mb-0">
                        <p><strong>Stop :</strong></p>
                    </div>
                    <div class="w-full md:w-full px-3 mb-6 md:mb-0">
                        <p>{{$product->stop}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap w-full bg-gray-800 opacity-24 border-2 border-gray-700 p-2
            rounded-md text-xl h-20">
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-full px-3 mb-6 md:mb-0">
                    <p><strong>Creado :</strong></p>
                </div>
                <div class="w-full md:w-full px-3 mb-6 md:mb-0">
                    <p>${{$product->created_at}}</p>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap w-full bg-gray-800 opacity-24 border-2 border-gray-700 p-2
            rounded-md text-xl h-20">
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-full px-3 mb-6 md:mb-0">
                    <p><strong>Modificado :</strong></p>
                </div>
                <div class="w-full md:w-full px-3 mb-6 md:mb-0">
                    <p>${{$product->updated_at}}</p>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap w-full bg-gray-800 opacity-24 border-2 border-gray-700 p-2
            rounded-md text-xl justify-center items-center">
            <div class="flex flex-wrap -mx-3 mb-6 ">
                <form action="{{ route('product.edit', $product->id  ) }}" method="GET">
                    @csrf
                    <button title="Editar" class="bg-green-600 border-2 border-gray-800 
                    rounded-md py-3 px-3 hover:bg-opacity-25 hover:border-blue-700 uppercase" 
                    type="submit">
                        editar
                    </button>
                </form>
                <div class="m-2"></div>
                <form action="{{ route('product.destroy',$product->id) }}" method="POST"
                    onsubmit="return confirm('¿Realmente quieres eliminar este usuario?');">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <button title="Inhabilitar" class="bg-red-800 border-2 border-gray-800 
                    rounded-md py-3 px-3 hover:bg-opacity-25 hover:border-blue-700 uppercase" 
                    type="submit">
                    inhabilitar
                    </button>
                </form>
                <div class="m-2"></div>
               
                <a title="Cancelar" class="bg-blue-800 border-2 border-gray-800 
                rounded-md py-3 px-3 hover:bg-opacity-25 hover:border-blue-700 uppercase" 
                type="submit" href="{{ route('product.index')}}">
                    Cancelar
                </a>
            </div>
        </div>
    </div>
    <div class="flex flex-wrap w-1/2 bg-gray-800 opacity-24 border-2 border-gray-700 p-5
    rounded-md text-2xl justify-center items-center " >
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-full px-3 mb-6 md:mb-0" class="w-full h-full">
                <img src="{{asset("storage/src/img/product-images/{$product->photo1}")}}" alt="">
            
            </div>
        </div>
    </div>
    
</div>

@endsection
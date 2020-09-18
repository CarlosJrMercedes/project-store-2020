@extends('layouts.perfil-main')
@section('content-body')

    <div class="flex justify-center items-center w-full h-auto">
        <div class="flex w-full justify-center items-center p-5">

            <table class="">
                <table class="table-fixed bg-gray-700 w-full h-auto rounded-md border-t-2 border-black">
                    <tbody>
                      <tr>
                        <td class="px-4 py-2 text-xl" colspan="5"><strong> Factura Nº : </strong>FACTCF{{$invoi->id}}</td>
                      </tr>
                      <tr>
                        <td class="px-4 py-2 text-xl" colspan="5"><strong> NombreCliente : </strong>{{$invoi->usuario->name}}</td>
                      </tr>
                      <tr>
                        <td class="px-4 py-2 text-xl" colspan="5"><strong> E-Mail Cliente : </strong>{{$invoi->usuario->email}}</td>
                      </tr>
                      <tr>
                        <th class="w-12 px-4 py-2 border-r-2  border-b-2 border-black">Cantidad</th>
                        <th class="px-4 py-2 border-r-2  border-b-2 border-black">Prodcuto</th>
                        <th class="px-4 py-2 border-r-2  border-b-2 border-black">Precio Unitario</th>
                        <th class="px-4 py-2 border-r-2  border-b-2 border-black">Total</th>
                        <th class="px-4 py-2 border-r-2  border-b-2 border-black">accion</th>
                      </tr>
                    @foreach ($factura as $item)
                        <tr class="text-center">
                            <td class="border-r-2 border-black px-4 py-2">{{$item->quantity}}</td>
                            <td class="border-r-2 border-black px-4 py-2">{{$item->product->name}}</td>
                            <td class="border-r-2 border-black px-4 py-2">$ {{$item->unit_price}}</td>
                            <td class="border-r-2 border-black px-4 py-2">$ {{$item->unit_price}}</td>
                            <td class="px-4 py-2">
                                <div class="flex flex-wrap flex-shrink-0 justify-center">
                                    <form action="{{ route('product.show',$item->product->id) }}" method="POST">
                                        @csrf
                                        @method('GET')
                                        <button title="Ver" class="bg-red-800 border-2 border-gray-800 
                                        rounded-md py-3 px-3 hover:bg-opacity-25 hover:border-blue-700 " 
                                        type="submit">
                                            <img src="{{asset("src/img/forms/ver.png")}}" alt="" 
                                            width="18px" height="18px" >
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    <tr class="text-center">
                        <td class="px-4 py-2 " colspan="3">Total Factura :</td>
                        <td class="px-4 py-2">$ {{$invoi->total_invoice}}</td>
                    </tr>
                    <tr class="text-center font-semibold">
                        <td class="px-4 py-2" colspan="2">Estado : Cancelado</td>
                        <td class="px-4 py-2" colspan="2">Proceso : Tramitando envio</td>
                    </tr>
                    </tbody>
                  </table>
            </table>
        </div>
    </div>


    @endsection
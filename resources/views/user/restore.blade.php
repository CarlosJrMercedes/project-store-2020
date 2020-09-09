@extends('layouts.perfil-main')
@section('content-body')
<div class="p-6">
    <div class="pb-4">
        <a class="bg-flugreen-500 border-solid border-2 font-bold text-md
                  border-black py-2 px-2 rounded hover:bg-black hover:text-flugreen-500" 
            href="{{ route('users.index') }}">Regresar</a>
    </div>
    <table class="table-fixed bg-gray-700 w-full h-auto text-center rounded-md">
        <thead>
          <tr>
            <th class="w-12 px-4 py-2 border-r-2  border-b-2 border-black"> Nª </th>
            <th class="w-1/2 px-4 py-2 border-r-2  border-b-2 border-black">Nombre</th>
            <th class="w-1/2 px-4 py-2 border-r-2  border-b-2 border-black">E-Mail</th>
            <th class="w-1/2 px-4 py-2 border-r-2  border-b-2 border-black">Eliminado</th>
            <th class="w-1/6 px-4 py-2 border-r-2  border-b-2 border-black">Foto</th>
            <th class="w-1/6 px-4 py-2 border-b-2 border-black">Accion</th>
          </tr>
        </thead>
        <tbody>

            @foreach ($users as $value)
                <tr class="text-center">
                    <td class="border-r-2 border-black px-4 py-2">{{$loop->iteration}} </td>
                    <td class="border-r-2 border-black px-4 py-2">{{ $value->name }}</td>
                    <td class="border-r-2 border-black px-4 py-2">{{ $value->email }}</td>
                    <td class="border-r-2 border-black px-4 py-2">{{ $value->deleted_at }}</td>
                    <td class="flex border-r-2 border-black px-4 py-2 justify-center">
                        <img src="{{asset("storage/src/img/user-images/{$value->photo}")}}" alt="" 
                        width="50px" height="50px">
                    </td>
                    <td>
                        <div class="flex flex-wrap flex-shrink-0 justify-center">
                            <a title="Habilitar" class="bg-green-600 border-2 border-gray-800 rounded-md py-1 px-2 
                            hover:bg-opacity-25 hover:border-blue-700   "
                            href="{{ route('users.enable',$value->id) }}">
                                <img src="{{asset("src/img/forms/habilitar.png")}}" alt="" 
                                width="25px" height="25px">
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
</div>
@endsection
@section('scrippt')
@parent
    
    
    @if (session('exito'))
        <script>Swal.fire("Exito","Se realizo la accion con exito","success");</script>            
        @endif
        
    @if (session('failed'))   
        <script>Swal.fire("ERROR","No se pudo realizar la accion, sucedio un error","error");</script>
    @endif
    
@endsection
@extends('layouts.perfil-main')
@section('content-body')
<div class="p-6">
    <div class="pb-4">
        <a class="bg-flugreen-500 border-solid border-2 font-bold text-md
                  border-black py-2 px-2 rounded hover:bg-black hover:text-flugreen-500" 
            href="{{ url('users/create') }}">Nuevo Usuario</a>
            <a class="bg-flugreen-500 border-solid border-2 font-bold text-md
                  border-black py-2 px-2 rounded hover:bg-black hover:text-flugreen-500" 
            href="{{ route('users.restore') }}">Ver usuarios desactivados</a>
    </div>
    <table class="table-fixed bg-gray-700 w-full h-auto text-center rounded-md">
        <thead>
          <tr>
            <th class="w-12 px-4 py-2 border-r-2  border-b-2 border-black"> Nª </th>
            <th class="w-1/2 px-4 py-2 border-r-2  border-b-2 border-black">Nombre</th>
            <th class="w-1/3 px-4 py-2 border-r-2  border-b-2 border-black">E-Mail</th>
            <th class="w-1/6 px-4 py-2 border-r-2  border-b-2 border-black">Creado</th>
            <th class="w-1/6 px-4 py-2 border-r-2  border-b-2 border-black">Modificado</th>
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
                    <td class="border-r-2 border-black px-4 py-2">{{ $value->created_at }}</td>
                    <td class="border-r-2 border-black px-4 py-2">{{ $value->updated_at }}</td>
                    <td class="flex border-r-2 border-black px-4 py-2 justify-center">
                        <img src="{{asset("storage/src/img/user-images/{$value->photo}")}}" alt="" 
                        width="50px" height="50px">
                    </td>
                    <td>
                        <div class="flex flex-wrap flex-shrink-0 justify-center">
                            <form action="{{ url('users/' . $value->id . '/edit' ) }}" method="GET">
                                @csrf
                                <button title="Desabilitar" class="bg-green-600 border-2 border-gray-800 rounded-md py-1 px-2 
                                hover:bg-opacity-25 hover:border-blue-700 " type="submit">
                                    <img src="{{asset("src/img/forms/edit.png")}}" alt="" 
                                    width="18px" height="18px" >
                                </button>
                            </form>
                            <div class="m-2"></div>
                            <form action="{{ route('users.destroy',$value->id) }}" method="POST"
                                onsubmit="return confirm('¿Realmente quieres eliminar este usuario?');">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button title="Desabilitar" class="bg-red-800 border-2 border-gray-800 rounded-md py-1 px-2 
                                hover:bg-opacity-25 hover:border-blue-700 " type="submit">
                                    <img src="{{asset("src/img/forms/desabilitar.png")}}" alt="" 
                                    width="18px" height="18px" >
                                </button>
                            </form>
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
        <script>Swal.fire("Exito","Proceso realizado sastifactoriamente","success");</script>            
    @endif

    @if (session('failed'))   
        <script>Swal.fire("ERROR","No se pudo realizar el proceso","error");</script>
    @endif
    
@endsection
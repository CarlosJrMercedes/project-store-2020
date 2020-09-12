@extends('layouts.main')


@section('scrippt')
@parent
    
    {{-- @dd(session('error')) --}}
    @if (session('exito'))
        <script>Swal.fire("Exito","Proceso realizado sastifactoriamente","success");</script>            
    @endif

    @if (session('failed'))   
        <script>Swal.fire("ERROR","No se pudo realizar el proceso","error");</script>
    @endif
    @if (session('error'))
        <script>Swal.fire("Error","{{session('error')}}","error");</script>
    @endif
    
@endsection
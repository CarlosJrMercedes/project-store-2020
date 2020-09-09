@extends('layouts.main')

@section('scrippt')
@parent
    
    {{-- @dd(session('error')) --}}
    @if (session('error'))
        <script>Swal.fire("Error","{{session('error')}}","error");</script>
    @endif
    
@endsection

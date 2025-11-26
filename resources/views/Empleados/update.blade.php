@extends('layouts.app')
@section('content')
<div class="container">

FORMULARIO PARA ACTUALIAZAR EMPLEADO
<form action="{{url('Empleados/'.$empleado->id)}}" method="POST" enctype="multipart/form-data">
    @csrf 
    {{method_field('PATCH')}}
    @include('Empleados.form', ['modo' => 'Actualizar'])


</form>

</div>
@endsection
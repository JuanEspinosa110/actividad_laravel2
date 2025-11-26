@extends('layouts.app')
@section('content')
<div class="container"> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Empleado</title>
</head>
<body>
    FORMULARIO PARA CREAR EMPLEADOS

<form action="{{url('/Empleados')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('Empleados.form', ['modo' => 'Guardar'])
</form>

</body>
</html>

</div>
@endsection
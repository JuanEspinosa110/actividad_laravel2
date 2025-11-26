@extends('layouts.app')
@section('content')
<div class="container mt-4">

    <a href="{{ url('/Empleados/create') }}" class="btn btn-success mb-3">
        Registrar Nuevo Empleado
    </a>

    @if(Session::has('mensaje'))
        <div class="alert alert-info">
            {{Session::get('mensaje')}}

    <table class="table table-bordered table-hover text-center align-middle">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Foto</th>
                <th>Nombre</th>
                <th>P. Apellido</th>
                <th>S. Apellido</th>
                <th>Correo</th>
                <th>Acción</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($Empleados as $datos)
            <tr>
                <td>{{ $datos->id }}</td>

                <td>
                    <img src="{{asset('storage').'/'.$datos->foto}}" 

                         class="img-thumbnail"
                         style="width: 120px; height:120px; object-fit:cover;">
                </td>

                <td>{{ $datos->Nombres }}</td>
                <td>{{ $datos->PrimerApel }}</td>
                <td>{{ $datos->SegundoApel }}</td>
                <td>{{ $datos->Email }}</td>

                <td>
                    <a href="{{ url('/Empleados/'.$datos->id.'/edit') }}" 
                       class="btn btn-primary btn-sm mb-1">
                        Editar
                    </a>

                    <form action="{{ url('/Empleados/'.$datos->id) }}" 
                          method="POST" 
                          style="display:inline">
                        @csrf
                        {{ method_field('DELETE') }}

                        <button type="submit" 
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('¿Deseas Eliminar?')">
                            Eliminar
                        </button>
                    </form>
                </td>
            </tr>
            <br>
            @endforeach
        </tbody>
    </table>

</div>
@endsection

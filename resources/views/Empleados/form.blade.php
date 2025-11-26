<br>

@if(count($errors) > 0)
    <div class="alert alert-danger" role="alert">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<h1 class="mb-4">{{ $modo }} Empleados</h1>

<div class="mb-3">
    <input type="text" 
           class="form-control"
           value="{{ isset($empleado->Nombres) ? $empleado->Nombres : old('Nombres') }}" 
           name="Nombres" 
           id="Nombres" 
           placeholder="Introduzca Nombre">
</div>

<div class="mb-3">
    <input type="text" 
           class="form-control"
           value="{{ isset($empleado->PrimerApel) ? $empleado->PrimerApel : old('PrimerApel') }}" 
           name="PrimerApel" 
           id="PrimerApel" 
           placeholder="Introduzca Primer Apellido">
</div>

<div class="mb-3">
    <input type="text" 
           class="form-control"
           value="{{ isset($empleado->SegundoApel) ? $empleado->SegundoApel : old('SegundoApel') }}" 
           name="SegundoApel" 
           id="SegundoApel" 
           placeholder="Introduzca Segundo Apellido">
</div>

<div class="mb-3">
    <input type="text" 
           class="form-control"
           value="{{ isset($empleado->correo) ? $empleado->correo : old('correo') }}" 
           name="correo" 
           id="correo" 
           placeholder="Introduzca Email">
</div>

<div class="mb-3">
    <input type="file" 
           class="form-control"
           name="foto" 
           id="foto">
</div>

@if(isset($empleado->foto))
    <div class="mb-3">
        <img src="{{ asset('storage').'/'.$empleado->foto }}" 
             alt="" 
             class="img-thumbnail" 
             style="width: 220px; height: 220px; object-fit: cover;">
    </div>
@endif

<div class="mt-3">
    <input type="submit" 
           value="{{ $modo }} Registro" 
           class="btn btn-primary">
</div>

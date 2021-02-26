@extends('layouts.app') @section('content')

<div class="container">
    {{-- Se verifica si la variable errors esta vacía o no, si no lo esta quiere decir que se ha tratado de envíar el algún campo del formulario vacío --}}
    <div class="row justify-content-center">
        @if(count($errors) > 0)
        <div>
            <ul>
                {{-- Si hay errores se pintan en la vista --}}
                @foreach($errors->all() as $error)
                <li style="list-style: none;" class="alert-danger mb-1">
                    {{ $error }}
                </li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            {!! Form::open(['route' => ['contacts.store'], 'method' => 'POST'])
            !!}
            <div class="row form-group">
                {!! Form::label('nombre', 'Nombre')!!} {!! Form::text('nombre',
                null, ['class' => 'form-control'] )!!}
            </div>
            <div class="row form-group">
                {!! Form::label('ape_pat', 'Apellido Paterno')!!} {!!
                Form::text('ape_pat', null, ['class' => 'form-control'] )!!}
            </div>
            <div class="row form-group">
                {!! Form::label('ape_mat', 'Apellido Materno')!!} {!!
                Form::text('ape_mat', null, ['class' => 'form-control'] )!!}
            </div>
            <div class="row form-group">
                {!! Form::label('fecha_nacimiento', 'Fecha Nacimiento')!!} {!!
                Form::date('fecha_nacimiento', null, ['class' => 'form-control']
                )!!}
            </div>
            <div class="row form-group">
                <div class="col-sm-6">
                    {!! Form::submit('Guardar Contacto',["class" => "btn
                    btn-success btn-lg"]) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection

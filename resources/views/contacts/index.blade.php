@extends('layouts.app') @section('content')
<div class="container mx-auto">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a
                class="btn btn-primary mb-5"
                href="{{ route('contacts.create') }}"
                >Agregar Contacto</a
            >
            {{-- Se verifica si la variable contacts cuenta con al menos un registro para poder mostrar la tabla --}}
            @if(count($contacts) > 0)
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    {{-- Se recorre la variable persona para obtener cada uno de los registros obtenidos y poderlos mostrar --}}
                    @foreach ($contacts as $contact)
                    <tr>
                        <td>{{$contact->id}}</td>
                        <td>{{$contact->nombre}}</td>
                        <td>{{$contact->ape_pat}}</td>
                        <td>{{$contact->ape_mat}}</td>
                        <td>{{$contact->fecha_nacimiento}}</td>
                        <td
                            class="d-flex justify-content-between align-content-between"
                        >
                            <a
                                class="btn btn-warning mb-2"
                                href="{{route('contacts.edit',$contact->id)}}"
                                >Editar</a
                            >
                            {!! Form::open(['method' => 'DELETE', 'route'
                            =>['contacts.destroy', $contact->id], 'style' =>
                            'display:inline']) !!} {!!
                            Form::submit('Eliminar',['class' => 'btn
                            btn-danger']) !!} {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach @else
                    <h2>No hay Registros</h2>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

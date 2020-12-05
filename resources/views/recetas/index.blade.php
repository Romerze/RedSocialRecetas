@extends('layouts.app')

@section('botones')
    <a href="{{ route('recetas.create') }}" class="btn btn-primary mr-2">
        <span><i class="fas fa-plus-circle"></i></span>
        Crear Receta
    </a>
@endsection

@section('content')
    <h2 class="text-center mb-5">
        <span><i class="fas fa-book"></i></span>
        Administra tus recetas
    </h2>
    <div class="col-md-10 mx-auto p-3">
        <table class="table table-striped text-center shadow">
            <thead class="bg-primary text-light">
                <tr>
                    <th scope="col">Título</th>
                    <th scope="col">Categoría</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($recetas as $receta)
                    <tr>
                        <td>{{ $receta->titulo }}</td>
                        <td>{{ $receta->categoria->nombre }}</td>
                        <td>

                            <eliminar-receta
                              receta-id = {{ $receta->id }}>
                            </eliminar-receta>
                            <a href="{{ route('recetas.edit', ['receta' => $receta->id]) }}" class="btn btn-outline-success"><i class="far fa-edit"></i> </a>
                            <a href="{{ route('recetas.show', ['receta' => $receta->id]) }}" class="btn btn-outline-dark"><i class="fas fa-book-open"></i> </a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

            <div class="mt-3">
                {{ $recetas->links() }}
            </div>

            <h2 class="text-center my-5">Recetas que te gustan</h2>
            <div class="col-md-10 mx-auto p-3">
                @if( count($usuario->meGusta) > 0)
                    <ul class="list-group">
                        @foreach ($usuario->meGusta as $receta)
                            <li class="list-group-item d-flex justify-content-between align-items-cener">
                                <p>{{ $receta->titulo }} </p>
                                <a class="btn btn-outline-success" href="{{ route('recetas.show',['receta' => $receta->id]) }}">Ver</a>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-center">Aún no tienes recetas guardadas <small>Dale me gusta a las recetas y aparecerán aquí</small></p>
                @endif
            </div>

    </div>

@endsection

@extends('layouts.app')


@section('content')
    <article class="contenido-receta shadow p-3">
        <h1 class="text-center mb-4">{{ $receta->titulo }}</h1>

        <div class="imagen-receta">
            <img src="/storage/{{ $receta->imagen }}" class="w-100" alt="imagenreceta">
        </div>

        <div class="receta-meta mt-5">
            <p>
                <span class="font-weigth-bold text-primary">Escrito en:</span>
                <a class="text-dark" href="{{ route('categorias.show', ['categoriaReceta'=>$receta->categoria->id]) }}">
                    {{ Str::title($receta->categoria->nombre) }}
                </a>
            </p>
            <p>
                <span class="font-weigth-bold text-primary">Autor:</span>
                <a class="text-dark" href="{{ route('perfiles.show',['perfil' =>$receta->autor->id]) }}">
                    {{ Str::title($receta->autor->name) }}
                </a>
            </p>
            <p>
                <span class="font-weigth-bold text-primary">Fecha:</span>
                @php
                    $fecha = $receta->created_at
                @endphp
                <fecha-receta fecha="{{ $fecha }}"></fecha-receta>
            </p>

            <div class="ingredientes">
                <h2 class="my-3 text-primary">Ingredientes</h2>

                {!! $receta->ingredientes !!}
            </div>

            <div class="preparacion">
                <h2 class="my-3 text-primary">Preparación</h2>

                {!! $receta->preparacion !!}
            </div>

            <div class="justify-content-center row text-center">
                <like-button
                    receta-id="{{ $receta->id }}"
                    like="{{ $like }}"
                    likes="{{ $likes }}">
                </like-button>
            </div>

        </div>
    </article>
@endsection

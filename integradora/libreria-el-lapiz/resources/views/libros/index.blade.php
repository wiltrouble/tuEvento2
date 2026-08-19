@extends('layouts.app')

@section('title', 'Libros')

@section('content')
    <h2>Librería El Lápiz</h2>

    <p>Bienvenido a nuestra librería. Aquí puedes consultar el catálogo de libros disponibles y agregar nuevos títulos.</p>

    <p>Hay {{ count($libros) }} libro(s) en el catálogo.</p>

    <p>
        <a href="/libros/nuevo" style="display: inline-block; padding: 8px 16px; background: #333; color: #fff; text-decoration: none; border-radius: 4px;">Agregar un libro nuevo</a>
    </p>

    <ul>
        @foreach ($libros as $libro)
            <li>
                {{ $libro->titulo }} — Bs {{ $libro->precio }}
            </li>
        @endforeach
    </ul>

    <p>Catálogo atendido por Wilson Lopez</p>
@endsection

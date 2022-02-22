@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">

            <h1>Los ultimos 10 enlaces añadidos</h1>

            @auth
                <a href="{{ route('links.create')}}" class="btn btn-success m-2">
                    <i class="bi bi-plus-lg"></i> Enlace
                </a>
            @endauth

            <last-links :linksdata="{{ $links }}"
                :isauth="@auth 1 @endauth @guest 0 @endguest">
        </div>
        <div class="col-md-3">
            <h2 class="text-center">Categorías reciente</h2>

            @auth
                <a href="{{ route('categories.create')}}" class="btn btn-success m-2">
                    <i class="bi bi-plus-lg"></i> Categoría
                </a>
            @endauth

            <last-categories :categoriesdata="{{ $categories }}"
                :isauth="@auth 1 @endauth @guest 0 @endguest">
        </div>
    </div>
</div>
@endsection

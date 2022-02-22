@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Todas las categorías</h1>

            @auth
                <a href="{{ route('categories.create')}}" class="btn btn-success m-2">
                    <i class="bi bi-plus-lg"></i> Categoría
                </a>
            @endauth

            <categories-list :categoriesdata="{{ $categories }}"
                :isauth="@auth 1 @endauth @guest 0 @endguest">
        </div>
    </div>
</div>
@endsection

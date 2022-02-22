@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Links de la categoría de <span class="text-primary"> {{ $category->name }} </span></h1>

            <p class="mb-2">{{ $category->description }}</p>
            @auth
                <div class="mb-2">
                    <a href="{{ route('links.create', $category->id)}}" class="btn btn-success m-2">
                        <i class="bi bi-plus-lg"></i> Enlace
                    </a>
                </div>

                <div class="mb-2">
                    <categories-action :categoryid="{{ $category->id }}">
                </div>
            @endauth

            <div >
                <links-list :linksdata="{{ $links }}"
                    :isauth="@auth 1 @endauth @guest 0 @endguest">
            </div>
        </div>
    </div>
</div>
@endsection

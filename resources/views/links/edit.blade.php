@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">Editar enlace</div>
                <div class="card-body">
                    <links-edit :categoriesdata="{{$categories}}" :linkdata="{{ $link}}"
                        :selectedcategoriesdata="{{$selectedCategories}}" />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

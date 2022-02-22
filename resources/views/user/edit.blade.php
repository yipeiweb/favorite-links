@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">Editar usuario</div>
                <div class="card-body">
                    <user-edit
                        :userdata="{{ $user }}" />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

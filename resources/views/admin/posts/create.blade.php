@extends('layouts.app')

@section('content')
    <div class="container">
        @include('includes.errors_alert')
        <header>
            <h1>Crea Nuovo Post</h1>
            <div class="d-flex justify-content-end"><a class="btn btn-secondary"
                    href="{{ route('admin.posts.index') }}">Torna
                    alla lista</a></div>
        </header>
        <section id="form">
            @include('includes.admin.post.form')
        </section>
    </div>
@endsection

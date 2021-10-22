@extends('layouts.app')

@section('content')
    <div class="container">
        <header>
            <h1>Crea Nuovo Post</h1>
        </header>
        <section id="form">
            <form method="POST" action="{{ route('admin.posts.store') }}">
                @csrf
                <div class="form-group">
                    <label for="title"></label>
                    <input type="text" class="form-control" id="title" placeholder="Inserire il nome del post"
                        name="title">
                </div>
                <div class="form-group">
                    <label for="content">Contenuto del post</label>
                    <textarea class="form-control" id="content" name="content" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="image">inderire url dell'immagine</label>
                    <input type="text" class="form-control" id="image" placeholder="Inserire url della immagine desiderata"
                        name="image">
                </div>
                <button type="submit" class="btn btn-success">Salva</button>
            </form>
        </section>
    </div>
@endsection

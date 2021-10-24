@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->content }}</p>
        <address>{{ $post->getCreatedDate('created_at') }}</address>
        <div class="d-flex justify-content-end"><a class="btn btn-secondary" href="{{ route('admin.posts.index') }}">Torna
                alla lista</a>
            <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-warning ml-2">Modifica</a>
            <form class="delete-button" action="{{ route('admin.posts.destroy', $post->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger ml-2">Elimina</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/confirm-delete.js') }}"></script>
@endsection

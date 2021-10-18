@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->content }}</p>
        <address>{{ $post->getCreatedDate('created_at') }}</address>
        <div class="d-flex justify-content-end"><a class="btn btn-secondary" href="{{ route('admin.posts.index') }}">Torna
                alla lista</a></div>
    </div>
@endsection

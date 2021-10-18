@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>I miei Post</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Titolo</th>
                    <th scope="col">Creato il</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->getCreatedDate('created_at', 'd-m-Y') }}</td>
                        <td><a class="btn btn-primary" href="{{ route('admin.posts.show', $post->id) }}">Dettagli</a></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">Non ci sono Post da visualizzare</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('alert-message'))
            <div class="alert alert-{{ session('alert-type') }}">{{ session('alert-message') }}</div>
        @endif
        <header class="my-4 d-flex justify-content-between align-items-center">
            <h1>I miei Post</h1>
            <a href="{{ route('admin.posts.create') }}" class="btn btn-success">Nuovo Post</a>
        </header>
        <table class="table table-dark rounded">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Creato il</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                    <tr>
                        <th scope="row">{{ $post->id }}</th>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->getCreatedDate('created_at', 'd-m-Y') }}</td>
                        <td class="d-flex justify-content-end">
                            <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-primary ml-2">Dettagli</a>
                            <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-warning ml-2">Modifica</a>
                            <form class="delete-button" action="{{ route('admin.posts.destroy', $post->id) }}"
                                method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger ml-2">Elimina</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">Non ci sono Post da visualizzare</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <footer class="d-flex justify-content-end">
            {{ $posts->links() }}
        </footer>
    </div>
    @section('scripts')
        <script src="{{ asset('js/confirm-delete.js') }}"></script>
    @endsection
@endsection

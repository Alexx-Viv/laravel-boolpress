@if ($post->exists)
    <form method="POST" action="{{ route('admin.posts.update', $post->id) }}">
        @method('PATCH')
    @else
        <form method="POST" action="{{ route('admin.posts.store') }}">
@endif

@csrf
<div class="form-group">
    <label for="title">Titolo</label>
    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
        placeholder="Inserire il nome del post" name="title" value="{{ old('title', $post->title) }}">
    @error('title')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="form-group">
    <label for="content">Contenuto del post</label>
    <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content"
        rows="3">{{ old('content', $post->content) }}</textarea>
    @error('content')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="form-group">
    <label for="image">inderire url dell'immagine</label>
    <input type="text" class="form-control @error('image') is-invalid @enderror" id="image"
        placeholder="Inserire url della immagine desiderata" name="image" value="{{ old('image', $post->image) }}">
    @error('image')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="form-group">
    <label for="category_id">Categoria</label>
    <select class="form-control" id="category_id" name="category_id">
        <option>Nessuna Categoria</option>
        @foreach ($categories as $category)
            <option @if (old('category_id', $post->category_id) == $category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
</div>
<button type="submit" class="btn btn-success">Salva</button>
</form>

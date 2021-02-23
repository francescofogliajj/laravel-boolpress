@extends('layouts.main')

@section('header')
    <h1 class="mt-5">Aggiorna</h1>
@endsection

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Titolo</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Titolo" value="{{ $post->title }}">
        </div>
        {{-- @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror --}}

        <div class="form-group">
            <label for="subtitle">Sottotitolo</label>
            <input type="text" class="form-control" name="subtitle" id="subtitle" placeholder="Sottotitolo" value="{{ $post->subtitle }}">
        </div>
        
        <div class="form-group">
            <label for="text">Testo</label>
            <textarea class="form-control" name="text" id="text" rows="10">{{ $post->text }}</textarea>
        </div>

        <div class="form-group">
            <label for="author">Autore</label>
            <input type="text" class="form-control" name="author" id="author" placeholder="Autore" value="{{ $post->author }}">
        </div>

        <div class="form-group">
            <label for="img_path">Immagine</label>
            <input type="text" class="form-control" name="img_path" id="img_path" placeholder="Immagine" value="{{ $post->img_path }}">
        </div>

        <div class="form-group">
            <label for="pubblication_date">Data di pubblicazione</label>
            <input type="date" class="form-control" name="pubblication_date" id="pubblication_date" placeholder="Data di pubblicazione" value="{{ $post->pubblication_date }}">
        </div>

        <div class="form-group">
            <label for="post_status">Stato del post</label>
            <select class="custom-select" name="post_status" id="post_status">
                <option value="draft" {{ ($post->infoPost->post_status == 'draft') ? 'selected' : '' }}>draft</option>
                <option value="private" {{ ($post->infoPost->post_status == 'private') ? 'selected' : '' }}>private</option>
                <option value="public" {{ ($post->infoPost->post_status == 'public') ? 'selected' : '' }}>public</option>
            </select>
        </div>

        <div class="form-group">
            <label for="comment_status">Stato dei commenti</label>
            <select class="custom-select" name="comment_status" id="comment_status">
                <option value="open" {{ ($post->infoPost->comment_status == 'open') ? 'selected' : '' }}>open</option>
                <option value="closed" {{ ($post->infoPost->comment_status == 'closed') ? 'selected' : '' }}>closed</option>
                <option value="private" {{ ($post->infoPost->comment_status == 'private') ? 'selected' : '' }}>private</option>
            </select>
        </div>

        <h2 class="mt-4">Tags</h2>
        @foreach ($tags as $tag)
            <div class="form-group">
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" id="tag-{{ $tag->id }}" name="tags[]" value="{{ $tag->id }}" @if($post->tags->contains($tag->id)) checked @endif>
                    <label class="custom-control-label" for="tag-{{ $tag->id }}">{{ $tag->name }}</label>
                </div>
            </div>
        @endforeach

        <button type="submit" class="btn btn-primary">Salva</button>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Indietro</a>
    </form>
@endsection
@extends('layouts.main')

@section('header')
    <h1 class="mt-5">Crea</h1>
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

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        @method('POST')

        <div class="form-group">
            <label for="title">Titolo</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Titolo" value="{{ old('title') }}">
        </div>
        {{-- @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror --}}

        <div class="form-group">
            <label for="subtitle">Sottotitolo</label>
            <input type="text" class="form-control" name="subtitle" id="subtitle" placeholder="Sottotitolo" value="{{ old('subtitle') }}">
        </div>

        <div class="form-group">
            <label for="text">Testo</label>
            <textarea class="form-control" name="text" id="text" placeholder="Testo" rows="10">{{ old('text') }}</textarea>
        </div>

        <div class="form-group">
            <label for="author">Autore</label>
            <input type="text" class="form-control" name="author" id="author" placeholder="Autore" value="{{ old('author') }}">
        </div>

        <div class="form-group">
            <label for="img_path">Immagine</label>
            <input type="text" class="form-control" name="img_path" id="img_path" placeholder="Immagine" value="{{ old('img_path') }}">
        </div>

        <div class="form-group">
            <label for="pubblication_date">Data di pubblicazione</label>
            <input type="date" class="form-control" name="pubblication_date" id="pubblication_date" placeholder="Data di pubblicazione" value="{{ old('pubblication_date') }}">
        </div>

        <div class="form-group">
            <label for="post_status">Stato del post</label>
            <select class="custom-select" name="post_status" id="post_status">
                <option value="draft" {{ (old('post_status') == 'draft') ? 'selected' : '' }}>draft</option>
                <option value="private" {{ (old('post_status') == 'private') ? 'selected' : '' }}>private</option>
                <option value="public" {{ (old('post_status') == 'public') ? 'selected' : '' }}>public</option>
            </select>
        </div>

        <div class="form-group">
            <label for="comment_status">Stato dei commenti</label>
            <select class="custom-select" name="comment_status" id="comment_status">
                <option value="open" {{ (old('comment_status') == 'open') ? 'selected' : '' }}>open</option>
                <option value="closed" {{ (old('comment_status') == 'closed') ? 'selected' : '' }}>closed</option>
                <option value="private" {{ (old('comment_status') == 'private') ? 'selected' : '' }}>private</option>
            </select>
        </div>

        <h2 class="mt-4">Tags</h2>
        @foreach ($tags as $tag)
            <div class="form-group">
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" id="tag-{{ $tag->id }}" name="tags[]" value="{{ $tag->id }}">
                    <label class="custom-control-label" for="tag-{{ $tag->id }}">{{ $tag->name }}</label>
                </div>
            </div>
        @endforeach
        
        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Invia</button>
            <a href="{{ route('posts.index') }}" class="btn btn-secondary">Indietro</a>
        </div>
    </form>
@endsection
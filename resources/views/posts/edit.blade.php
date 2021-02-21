@extends('layouts.main')

@section('header')
    <h1 class="mt-5">Aggiorna</h1>
@endsection

@section('content')
    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}

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
        {{-- @error('subtitle')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror --}}

        <div class="form-group">
            <label for="text">Testo</label>
            <textarea class="form-control" name="text" id="text" rows="10">{{ $post->text }}</textarea>
        </div>

        <div class="form-group">
            <label for="author">Autore</label>
            <input type="text" class="form-control" name="author" id="author" placeholder="Autore" value="{{ $post->author }}">
        </div>
        {{-- @error('author')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror --}}

        <button type="submit" class="btn btn-primary">Salva</button>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Indietro</a>
    </form>
@endsection
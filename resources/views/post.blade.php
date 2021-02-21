@extends('layouts.main')

@section('content')

    <section>
        <header class="text-center mb-5">
            <h1 class="mt-5">{{ $post->title }}</h1>
            <h3>{{ $post->subtitle }}</h3>
            <small>{{ $post->author }}</small>
        </header>
        <main>
            {{ $post->text }}
        </main>
    </section>

    <section class="my-5">
        <h2>Commenti</h2>
        @foreach ($post->comments as $comment)
            <div>
                <small>{{ $comment->author }} - {{ $comment->created_at }}</small>
                <p>{{ $comment->text }}</p>
            </div>
        @endforeach
    </section>

    <section>
        <form action="{{ route('add-comment', $post->id) }}" method="POST">
            @method('POST')
            @csrf
            <div class="form-group">
                <label for="author">Autore</label>
                <input type="text" class="form-control" name="author" id="author" placeholder="Scrivi qui il tuo nome utente" value="">
            </div>
            <div class="form-group">
                <label for="text">Testo</label>
                <textarea class="form-control" name="text" id="text" rows="5" placeholder="Scrivi qui il tuo commento"></textarea>
            </div>
            <input type="submit" value="Invia" class="btn btn-secondary">
        </form>
    </section>

@endsection
@extends('layouts.main')

@section('content')

    <section>
        <header class="text-center mb-5">
            <img src="{{ $post->img_path }}" alt="{{ $post->title }}" class="my-3">
            <h1>{{ $post->title }}</h1>
            <h3>{{ $post->subtitle }}</h3>
            <small>{{ $post->author }} - {{ $post->pubblication_date }}</small>
            {{-- <small>{{ $post->infoPost->post_status }} - {{ $post->infoPost->comment_status }}</small> --}}

            <div class="text-center">
                @foreach ($post->tags as $tag)
                    <span class="badge badge-info">{{ $tag->name }}</span>
                @endforeach
            </div>
        </header>
        <main>
            {{ $post->text }}
        </main>
    </section>

    {{-- @if ($post->infoPost->comment_status == 'open') --}}
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
    {{-- @endif --}}

    @section('footer')
        <a class="btn btn-primary" href="{{ route('blog') }}">Blog</a> 
    @endsection
    
@endsection
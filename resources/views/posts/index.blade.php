@extends('layouts.main')

@section('header')
    <h1 class="mt-5">Posts</h1>
@endsection

@section('content')
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titolo</th>
                <th>Sottotitolo</th>
                <th>Autore</th>
                <th>Creato il</th>
                <th>Aggiornato il</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->subtitle }}</td>
                    <td>{{ $post->author }}</td>
                    <td>{{ $post->created_at }}</td>
                    <td>{{ $post->updated_at }}</td>
                    <td>
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-success">
                            <i class="fas fa-search-plus"></i>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-success">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onSubmit="return confirm('Sei sicuro di voler eliminare questo post?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>  
                </tr> 
            @endforeach
        </tbody>
    </table>
@endsection

@section('footer')
    <div class="text-right">
        <a href="{{ route('posts.create') }}" class="btn btn-lg btn-primary">Crea un post</a>
    </div>
@endsection
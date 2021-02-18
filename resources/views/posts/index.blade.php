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
                </tr> 
            @endforeach
        </tbody>
    </table>
@endsection
@extends('layouts.main')

@section('header')
    <h1 class="mt-5">Post</h1>
    <p class="mt-4"><strong>Post status: </strong>{{ $post->infoPost->post_status }}</p>
    <p class="mb-4"><strong>Comment status: </strong>{{ $post->infoPost->comment_status }}</p>
@endsection

@section('content')
    <table class="table table-striped table-bordered">
        @foreach ($post->getAttributes() as $key => $value)
            <tr>
                <td><strong>{{ $key }}</strong></td>
                <td>{{ $value }}</td>
            </tr>
        @endforeach
    </table>

    <h2 class="mt-5">Commenti</h2>
    <ul>
        @foreach ($post->comments as $comment)
            <li>
                <p class="mt-4">{{ $comment->text }}</p>
                <small>{{ $comment->author }}</small>
            </li>
        @endforeach
    </ul>
@endsection

@section('footer')
    <div class="text-right">
        <a href="{{ route('posts.index') }}" class="btn btn-lg btn-primary">Posts</a>
    </div>
@endsection
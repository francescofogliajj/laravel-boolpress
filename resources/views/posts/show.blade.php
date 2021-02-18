@extends('layouts.main')

@section('header')
    <h1 class="mt-5">Post</h1>
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
@endsection

@section('footer')
    <div class="text-right">
        <a href="{{ route('posts.index') }}" class="btn btn-lg btn-primary">Posts</a>
    </div>
@endsection
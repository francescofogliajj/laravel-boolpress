@extends('layouts.main')

@section('content')
    <div class="container">
        <h1 class="mt-5">Blog</h1>
        <div class="row">
            @foreach ($posts as $post)
                <div class="col-4 my-3 d-flex align-content-stretch">
                    <div class="card">
                        <img src="{{ $post->img_path }}" class="card-img-top" alt="{{ $post->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <h6 class="card-title">{{ $post->subtitle }}</h6>
                            {{-- <p class="card-text"></p> --}}
                            <div class="text-left my-3">
                                @foreach ($post->tags as $tag)
                                    <span class="badge badge-info">{{ $tag->name }}</span>
                                @endforeach
                            </div>
                            <a href="{{ route('post', $post->slug) }}" class="btn btn-primary">Leggi</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
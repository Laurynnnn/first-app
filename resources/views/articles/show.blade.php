@extends('layout')

@section('content')
    <div class="container">
        <h1>{{ $article->title }}</h1>
        <p>{{ $article->content }}</p>
        <h3>Tags:</h3>
        @foreach ($article->tags as $tag)
            <span class="badge badge-secondary">{{ $tag->name }}</span>
        @endforeach
        <br>
        <a href="{{ route('articles.index') }}" class="btn btn-primary mt-3">Back to Articles</a>
    </div>
@endsection

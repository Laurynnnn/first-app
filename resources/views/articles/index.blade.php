@extends('layout')

@section('content')
    <div class="container">
        <a href="{{ route('articles.create') }}" class="btn btn-primary">Create Article</a>
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Tags</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($articles as $article)
                    <tr>
                        <td>{{ $article->title }}</td>
                        <td>
                            @foreach($article->tags as $tag)
                                <span class="badge badge-secondary">{{ $tag->name }}</span>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('articles.show', $article->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

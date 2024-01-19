@extends('layout')

@section('content')
    <h2>{{ $article->title }}</h2>
    <article>
        {{ $article->body }}
    </article>
    <form method="POST" action="{{ route('articles.destroy', $article) }}">
        @csrf
        @method('DELETE')
        <input type="submit" value="Supprimer l'article">
    </form>
    <form method="GET" action="{{ route('bids.create', $article) }}">
        @csrf
        @method('GET')
        <input type="submit" value="Faire une enchère">
    </form>

    <a href="{{ route('articles.edit', $article) }}">Modifier cet article</a>

    <h3>Commentaires</h3>

    @unless ($article->archived_at)
        <form method="POST" action="{{ route('articles.comments.store', $article) }}">
            @csrf
            <textarea name="body"></textarea>
            <input type="submit" value="Ajouter le commentaire">
        </form>
    @endunless

    <ul>
    @foreach ($article->comments as $comment)
        <li>
            <p>{{ $comment->body  }}</p>
        </li>
    @endforeach
    </ul>

@endsection

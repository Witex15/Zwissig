@extends('layout')

@section('content')
<h1>Voici les 5 articles les plus vus</h1>
<ul>
    @foreach ($articles->take(5) as $article)
    <li><a href="{{ route('articles.show', $article) }}">{{ $article->title }}</a><span> Vu: {{ $article->reads }}</span></li>
    @endforeach
</ul>
@endsection

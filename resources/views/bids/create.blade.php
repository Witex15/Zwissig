@extends('layout')

@section('content')
    <h1>Nouvelle enchère</h1>
    <form method="POST" action="{{ route('bids.store') }}">
        @csrf
        @include('bids.fields')
        <input type="submit" value="Ajouter">
    </form>
@endsection

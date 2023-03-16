@extends('layouts.app')


@section('title', 'Article list')


@section('content')

    @foreach($articles as $article)
        <h1>{{ $article['title'] }}</h1>
        <h3>{{ $article['content'] }}</h3>
        <br>
    @endforeach

@endsection
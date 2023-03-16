@extends('layouts.app')


@section('title', 'Article')


@section('content')

    @php
        $html = '<h2>test</h2>';
    @endphp

    {!!$html!!}
    <h1>{{ $title }}</h1>
    <h3>{{ $content }}</h3>

@endsection
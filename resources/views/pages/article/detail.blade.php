@extends('layouts.master')

@section('content')
<a href="/article" class="btn btn-warning btn-sm btn-icon-split">
    <span class="icon">
        <i class="fas fa-arrow-left"></i>
    </span>
    <span class="text">Back</span>
</a>
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ $article->title }}</h1>

<div class="card">
    <div class="card-body">
        <i class="fas fa-link"></i> slug: {{ $article->slug }}<br>
        <i class="far fa-user"></i> Written by {{ $article->created_by }}<br>
        <i class="far fa-clock"></i> Created at {{ date_format(date_create($article->created_at), 'd M Y H:i') }}<br>
        <i class="fas fa-history"></i> Last updated at {{ date_format(date_create($article->updated_at), 'd M Y H:i') }}
        <hr>
        <p>{{ $article->content }}</p>
        @foreach ($tags as $tag)
            <button class="btn btn-info btn-sm">{{ $tag }}</button>
        @endforeach
    </div>
</div>
@endsection

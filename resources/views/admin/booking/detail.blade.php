@extends('admin.layouts.app')
@section('content')

    <h1> <strong>{{ $news->title }}</strong></h1> <hr>
    <h2>Id: {{ $news->id }}</h2>
    <h2>Content: {{ $news->content }}</h2>
    <h2>Image: </h2>
    <img style="max-height: 200px; margin: 2px" src="{{ asset($news->img1) }}" alt="">
    <img style="max-height: 200px; margin: 2px" src="{{ asset($news->img2) }}" alt="">
    <img style="max-height: 200px; margin: 2px" src="{{ asset($news->img3) }}" alt="">
    <img style="max-height: 200px; margin: 2px" src="{{ asset($news->img4) }}" alt="">
    <hr>
    <a href="{{ route('news.index') }}" class="btn btn-secondary">Back</a>
@endsection

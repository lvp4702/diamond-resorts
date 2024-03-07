@extends('admin.layouts.app')
@section('content')

    <h1> <strong style="word-wrap: break-word;">{{ $room->name }}</strong></h1> <hr>
    <h2>Id: {{ $room->id }}</h2>
    <h2>Price: {{ $room->price }}</h2>
    <h2 style="word-wrap: break-word;">Describe: {{ $room->describe }}</h2>
    <h2>Image: </h2>
    <img style="max-height: 200px; margin: 2px" src="{{ asset($room->img1) }}" alt="">
    <img style="max-height: 200px; margin: 2px" src="{{ asset($room->img2) }}" alt="">
    <img style="max-height: 200px; margin: 2px" src="{{ asset($room->img3) }}" alt="">
    <hr>
    <a href="{{ route('room.index') }}" class="btn btn-secondary">Back</a>
@endsection

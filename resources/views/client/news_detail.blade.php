@extends('client.layouts.app')

@section('title', $news->title)

@section('content')
    <div class="news_1">
        <h1>TIN TỨC</h1>
    </div>
    <div class="news_2">
        <div class="news_detail">
            <h3><a href="{{ route('client.news') }}">TIN TỨC</a></h3>
            <h1>{{ $news->title }}</h1>
            <div class="divider"></div>
            <img src="{{ asset($news->img1) }}" alt="">
            <code>{{ $news->content }}</code>
            @if ($news->img2)
            <img src="{{ asset($news->img2) }}" alt="">
            @endif
            <div class="news_detail-link">
                <div class="news_detail-link-container">
                    <div class="news_detail-link-item">
                        <a href="">
                            <i class="fa-brands fa-facebook-f"></i>
                            Facebook
                        </a>
                    </div>
                    <div class="news_detail-link-item">
                        <a href="">
                            <i class="fa-brands fa-twitter"></i>
                            Twitter
                        </a>
                    </div>
                    <div class="news_detail-link-item">
                        <a href="">
                            <i class="fa-brands fa-google-plus-g"></i>
                            Google+
                        </a>
                    </div>
                    <div class="news_detail-link-item">
                        <a href="">
                            <i class="fa-brands fa-pinterest-p"></i>
                            Pinterest
                        </a>
                    </div>
                    <div class="news_detail-link-item">
                        <a href="">
                            <i class="fa-brands fa-linkedin-in"></i>
                            linkedln
                        </a>
                    </div>
                </div>
            </div>
            <div class="new_detail-bot">
                @if ($news_pre != null)
                    <div class="new_detail-bot-left">
                        <a href="{{ route('client.news_detail', $news_pre->id) }}">
                            <i class="fa-solid fa-chevron-left"></i>
                            <span>{{ $news_pre->title }}</span>
                        </a>
                    </div>
                @endif
                @if ($news_next != null)
                    <div class="new_detail-bot-right">
                        <a href="{{ route('client.news_detail', $news_next->id) }}">
                            <span>{{ $news_next->title }}</span>
                            <i class="fa-solid fa-chevron-right"></i>
                        </a>
                    </div>
                @endif
            </div>
        </div>
        <div class="news_2-right">
            <h2>BÀI VIẾT MỚI</h2>
            <div class="divider"></div>
            <div class="news_2-right-list">
                @foreach ($newsDesc as $item)
                    <a href="{{ route('client.news_detail', $item->id) }}" class="news_2-right-item">
                        {{ $item->title }}
                    </a>
                @endforeach
            </div>
        </div>

    </div>
@endsection

@extends('client.layouts.app')

@section('title', $room->name)

@section('content')
    <div class="room_1">
        <img src="{{ asset('images/introduce-1.jpg') }}" alt="">
        <h1>
            <a href="{{ route('client.rooms') }}">PHÒNG</a> / <span>{{ $room->name }}</span>
        </h1>
    </div>

    <div class="room_detail">
        <div class="room_detail-container">
            <div class="room_detail-content">
                @if ($room->img1)
                    <div class="room_detail-img">
                        <img src="{{ asset($room->img1) }}" alt="">
                    </div>
                @endif
                @if ($room->img2)
                    <div class="room_detail-img">
                        <img src="{{ asset($room->img2) }}" alt="">
                    </div>
                @endif
                @if ($room->img3)
                    <div class="room_detail-img">
                        <img src="{{ asset($room->img3) }}" alt="">
                    </div>
                @endif
                <a class="prev" onclick="plusSlides(-1)">❮</a>
                <a class="next" onclick="plusSlides(1)">❯</a>

                <div class="room_detail-img-row">
                    @if ($room->img1)
                        <div class="room_detail-img-column">
                            <img class="demo cursor" src="{{ asset($room->img1) }}" style="width:100%"
                                onclick="currentSlide(1)">
                        </div>
                    @endif
                    @if ($room->img2)
                        <div class="room_detail-img-column">
                            <img class="demo cursor" src="{{ asset($room->img2) }}" style="width:100%"
                                onclick="currentSlide(2)">
                        </div>
                    @endif
                    @if ($room->img3)
                        <div class="room_detail-img-column">
                            <img class="demo cursor" src="{{ asset($room->img3) }}" style="width:100%"
                                onclick="currentSlide(3)">
                        </div>
                    @endif
                </div>

                <h1 class="room_detail-name">{{ $room->name }}</h1>
                <p class="room_detail-price"><span>{{ $room->price }}$</span> / đêm</p>
                <div class="room_detail-describe">{{ $room->describe }}</div>
            </div>

            <div class="room-booking">
                <form action="{{ route('client.booking') }}" method="post" enctype="multipart/form-data">
                    <h1>ĐẶT PHÒNG</h1>
                    @csrf
                    <input type="hidden" name="room_id" value="{{ $room->id }}">
                    @if (Auth::user())
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    @endif

                    <p>Họ & Tên</p>
                    <input type="text" name="fullname" value="{{ old('fullname') }}"
                        class="text_input @error('fullname') border-danger @enderror">
                    @error('fullname')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <p>Số điện thoại</p>
                    <input type="text" name="phoneNumber" value="{{ old('phoneNumber') }}"
                        class="text_input @error('phoneNumber') border-danger @enderror">
                    @error('phoneNumber')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <p>Ngày nhận</p>
                    <input type="date" name="check_inDate" value="{{ old('check_inDate') }}"
                        class="text_input @error('check_inDate') border-danger @enderror">
                    @error('check_inDate')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <p>Ngày trả</p>
                    <input type="date" name="check_outDate" value="{{ old('check_outDate') }}"
                        class="text_input @error('check_outDate') border-danger @enderror">
                    @error('check_outDate')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <p>Số người</p>
                    <input type="number" name="amountOfPeople" value="{{ old('amountOfPeople') }}"
                        class="text_input @error('amountOfPeople') border-danger @enderror">
                    @error('amountOfPeople')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <button type="submit">GỬI</button>
                </form>
            </div>
        </div>
    </div>



    <script>
        let slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            let i;
            let slides = document.getElementsByClassName("room_detail-img");
            let dots = document.getElementsByClassName("demo");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
        }
    </script>
@endsection

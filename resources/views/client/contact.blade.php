@extends('client.layouts.app')

@section('title', 'Liên hệ')

@section('content')
    <div class="contact_1">
        <img src="{{ asset('images/contact-1.jpg') }}" alt="">
        <h1>LIÊN HỆ</h1>
    </div>
    <div class="contact_2">
        <div class="contact_2-left contact-left">
            <form action="{{ route('client.send_contact') }}" method="post" class="contact_form">
                @csrf
                <div>
                    <input type="text" name="fullname" id="fullname" value="{{ old('fullname') }}"
                        class="text_input @error('fullname') border-danger @enderror" placeholder="Họ và tên">
                    @error('fullname')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <input type="text" name="email" id="email" value="{{ old('email') }}"
                        class="text_input @error('email') border-danger @enderror" placeholder="Email">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <input type="text" name="phoneNumber" id="phoneNumber" value="{{ old('phoneNumber') }}"
                        class="text_input @error('phoneNumber') border-danger @enderror" placeholder="Số điện thoại">
                    @error('phoneNumber')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <input type="text" name="address" id="address" value="{{ old('address') }}"
                        class="text_input @error('address') border-danger @enderror" placeholder="Địa chỉ">
                    @error('address')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <textarea name="message" id="message" placeholder="Lời nhắn" rows="8" value="{{ old('message') }}"
                        class="text_input @error('message') border-danger @enderror"></textarea>
                    @error('message')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="button">GỬI</button>
                </div>
            </form>
        </div>
        <div class="contact_2-right contact-right">
            <h1>THÔNG TIN LIÊN HỆ</h1>
            <div class="contact_2-right-item">
                <i class="fa-solid fa-location-dot"></i>
                <div class="contact_2-right-text">
                    <h2>Địa chỉ:</h2>
                    <p>Tuân chính, Vĩnh Tường, Vĩnh Phúc</p>
                </div>
            </div>
            <div class="contact_2-right-item">
                <i class="fa-solid fa-phone"></i>
                <div class="contact_2-right-text">
                    <h2>Điện thoại:</h2>
                    <p>037 636 5516</p>
                </div>
            </div>
            <div class="contact_2-right-item">
                <i class="fa-solid fa-envelope"></i>
                <div class="contact_2-right-text">
                    <h2>Email:</h2>
                    <p>phucvanle472002@gamil.com</p>
                </div>
            </div>
        </div>

    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const contact_left = document.querySelectorAll('.contact-left');

            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('leftToRight');
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                root: null,
                rootMargin: '0px',
                threshold: 0.1
            });

            contact_left.forEach(contact_left => {
                observer.observe(contact_left);
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            const contact_right = document.querySelectorAll('.contact-right');

            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('rightToLeft');
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                root: null,
                rootMargin: '0px',
                threshold: 0.1
            });

            contact_right.forEach(contact_right => {
                observer.observe(contact_right);
            });
        });
    </script>
@endsection

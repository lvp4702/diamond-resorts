@extends('client.layouts.app')

@section('title', 'Thông tin cá nhân')

@section('content')
    <h1 class="profile_title">THÔNG TIN CÁ NHÂN</h1>
    <form action="{{ route('client.up_profile', Auth::user()) }}" method="post" class="profile_form">
        @csrf
        @method('PUT')
        <div>
            <p>Username</p>
            <input type="text" name="username" id="username" value="{{ old('username', Auth::user()->username) }}"
                class="text_input @error('username') border-danger @enderror">
            @error('username')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <p>Email</p>
            <input type="text" name="email" id="email" value="{{ old('email', Auth::user()->email) }}"
                class="text_input @error('email') border-danger @enderror">
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <p>Full name</p>
            <input type="text" name="fullname" id="fullname" value="{{ old('fullname', Auth::user()->fullname) }}"
                class="text_input @error('fullname') border-danger @enderror">
            @error('fullname')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <p>Phone number</p>
            <input type="text" name="phoneNumber" id="phoneNumber"
                value="{{ old('phoneNumber', Auth::user()->phoneNumber) }}"
                class="text_input @error('phoneNumber') border-danger @enderror">
            @error('phoneNumber')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <p>Address</p>
            <input type="text" name="address" id="address" value="{{ old('address', Auth::user()->address) }}"
                class="text_input @error('address') border-danger @enderror">
            @error('address')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <p>Password*</p>
            <input type="password" name="password" id="password"
                class="text_input @error('password') border-danger @enderror">
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <span>*Nhập mật khẩu của bạn để cập nhật thông tin cá nhân</span>
        </div>

        <div style="display: flex; justify-content: right;">
            <a class="button" href="{{ route('change_password') }}">Đổi mật khẩu</a>
            <button type="submit" class="button">Update</button>
        </div>
    </form>
@endsection

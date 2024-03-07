@extends('admin.layouts.app')
@section('content')

<h1 class="modal-title fw-bolder text-center" id="modal-add-label">Add a new user</h1>

    <form action="{{ route('user.store') }}" method="POST" style="width: 700px; margin: auto;">
        @csrf
        <div class="mb-3 fs-4">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control @error('username') border-danger @enderror" id="username" name="username" value="{{ old('username') }}">
            @error('username')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3 fs-4">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control @error('password') border-danger @enderror" id="password" name="password">
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3 fs-4">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control @error('email') border-danger @enderror"  id="email" name="email" value="{{ old('email') }}">
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3 fs-4">
            <label for="fullname" class="form-label">Fullname</label>
            <input type="text" class="form-control @error('fullname') border-danger @enderror"  id="fullname" name="fullname" value="{{ old('fullname') }}">
            @error('fullname')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3 fs-4">
            <label for="phoneNumber" class="form-label">Phone number</label>
            <input type="text" class="form-control @error('phoneNumber') border-danger @enderror"  id="phoneNumber" name="phoneNumber" value="{{ old('phoneNumber') }}">
            @error('phoneNumber')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3 fs-4">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control @error('address') border-danger @enderror"  id="address" name="address" value="{{ old('address') }}">
            @error('address')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3 fs-4">
            <label for="role" class="form-label">Role</label>
            <select class="form-select" aria-label="Default select example" name="role">
                <option selected value="0">Guests</option>
                <option value="1">Admin</option>
              </select>
        </div>

        <button type="submit" class="btn btn-primary ms-2">Add</button>
        <a href="{{ route('user.index') }}" class="btn btn-secondary">Back</a>
    </form>

@endsection

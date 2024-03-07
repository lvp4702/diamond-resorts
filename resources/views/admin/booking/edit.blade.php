@extends('admin.layouts.app')
@section('content')
    <h1 class="modal-title fw-bolder text-center" id="modal-add-label">Booking information editing</h1>

    <form action="{{ route('booking.update', $booking) }}" method="POST" style="width: 700px; margin: auto;" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3 fs-4">
            <label for="fullname" class="form-label">Fullname</label>
            <input type="text" class="form-control @error('fullname') border-danger @enderror" id="fullname"
                name="fullname" value="{{ old('fullname', $booking->fullname) }}">
            @error('fullname')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3 fs-4">
            <label for="phoneNumber" class="form-label">Phone number</label>
            <input type="text" class="form-control @error('phoneNumber') border-danger @enderror" id="phoneNumber"
                name="phoneNumber" value="{{ old('phoneNumber', $booking->phoneNumber) }}">
            @error('phoneNumber')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3 fs-4">
            <label for="check_inDate" class="form-label">Check-in date</label>
            <input type="date" class="form-control @error('check_inDate') border-danger @enderror" id="check_inDate"
                name="check_inDate" value="{{ $booking->check_inDate }}">
            @error('check_inDate')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3 fs-4">
            <label for="check_outDate" class="form-label">Check-out date</label>
            <input type="date" class="form-control @error('check_outDate') border-danger @enderror" id="check_outDate"
                name="check_outDate" value="{{ $booking->check_outDate }}">
            @error('check_outDate')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3 fs-4">
            <label for="amountOfPeople" class="form-label">Amount of people</label>
            <input type="text" class="form-control @error('amountOfPeople') border-danger @enderror" id="amountOfPeople"
                name="amountOfPeople" value="{{ old('amountOfPeople', $booking->amountOfPeople) }}">
            @error('amountOfPeople')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3 fs-4">
            <label for="user_id" class="form-label">Username</label>
            <select name="user_id" id="user_id" class="form-select">
                <option>Choose the username</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ $booking->user_id == $user->id ? "selected" : "" }}>{{ $user->username }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3 fs-4">
            <label for="room_id" class="form-label">Room</label>
            <select name="room_id" id="room_id" class="form-select">
                <option>Choose the room</option>
                @foreach ($rooms as $room)
                    <option value="{{ $room->id }}" {{ $booking->room_id == $room->id ? "selected" : "" }}>{{ $room->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary ms-2">Update</button>
        <a href="{{ route('booking.index') }}" class="btn btn-secondary">Back</a>
    </form>

@endsection

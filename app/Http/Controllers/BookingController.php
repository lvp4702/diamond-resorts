<?php

namespace App\Http\Controllers;

use App\Http\Requests\Booking\StoreBookingRequest;
use App\Http\Requests\Booking\UpdateBookingRequest;
use App\Models\Booking;
use App\Models\User;
use App\Models\Room;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::with(['user', 'room'])->orderByDesc('id')->paginate(5);

        return view('admin.booking.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $rooms = Room::all();
        return view('admin.booking.create', compact('users', 'rooms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookingRequest $request)
    {
        $checkInDate = $request->check_inDate;
        $checkOutDate = $request->check_outDate;
        $roomID = $request->room_id;

        $existingBooking = Booking::where('room_id', $roomID)
            ->whereBetween('check_inDate', [$checkInDate, $checkOutDate])
            ->orWhereBetween('check_outDate', [$checkInDate, $checkOutDate])
            ->first();

        if($existingBooking)
        {
            return redirect()->back()->with('error', 'Phòng đã có người đặt trong khoảng thời gian bạn chọn !');
        }

        Booking::create($request->all());
        return redirect()->route('booking.index')->with('message', 'Thêm mới thành công !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        $users = User::all();
        $rooms = Room::all();
        return view('admin.booking.edit', compact('users', 'rooms', 'booking'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookingRequest $request, Booking $booking)
    {
        $booking->update($request->all());
        return redirect()->route('booking.index')->with('message', 'Cập nhật thành công !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->route('booking.index')->with('message', 'Xóa thành công !');
    }
}

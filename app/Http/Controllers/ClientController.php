<?php

namespace App\Http\Controllers;

use App\Http\Requests\Booking\StoreBookingRequest;
use App\Http\Requests\Contact\ContactRequest;
use App\Http\Requests\Profile\ProfileRequest;
use App\Models\Booking;
use App\Models\News;
use App\Models\Room;
use App\Models\Slide;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    public function index()
    {
        $slides = Slide::all();
        $rooms = Room::orderByDesc('id')->take(3)->get();
        $latestNews = News::orderByDesc('id')->take(2)->get();
        $skienNoiBat = News::orderBy('id')->take(3)->get();

        return view('client.index', compact('slides', 'rooms', 'latestNews', 'skienNoiBat'));
    }

    public function profile()
    {
        return view('client.profile');
    }

    public function up_profile(ProfileRequest $request, User $user)
    {
        $body = $request->except('password');
        $user->update($body);
        return redirect()->back()->with('message', 'Cập nhật thông tin cá nhân thành công !');
    }

    public function introduce()
    {
        return view('client.introduce');
    }

    public function rooms()
    {
        $rooms = Room::all();
        return view('client.rooms', compact('rooms'));
    }

    public function room_detail($id)
    {
        $room = Room::where('id', $id)->first();

        return view('client.room_detail', compact('room'));
    }

    public function booking(StoreBookingRequest $request)
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
        return redirect()->back()->with('message', 'Đặt phòng thành công !');
    }

    public function news()
    {
        $news = News::orderBy('id')->take(6)->get();
        $newsDesc = News::orderByDesc('id')->take(5)->get();

        return view('client.news', compact('news', 'newsDesc'));
    }

    public function news_detail($id)
    {
        $newsDesc = News::orderByDesc('id')->take(5)->get();
        $news = News::where('id', $id)->first();
        // Lấy bản ghi trước đó
        $news_pre = News::where('id', '<', $id)->orderBy('id', 'desc')->first();
        // Lấy bản ghi tiếp theo
        $news_next = News::where('id', '>', $id)->orderBy('id')->first();

        return view('client.news_detail', compact('news', 'newsDesc', 'news_next', 'news_pre'));
    }

    public function contact()
    {
        return view('client.contact');
    }

    public function send_contact(ContactRequest $request)
    {
        $time = Carbon::now()->toDateTimeString();
        $data = "Time to send: $time - Name: $request->fullname - Email: $request->email - Phone number: $request->phoneNumber - Address: $request->address - Message: $request->message\n\n";

        Storage::append('contacts.txt', $data);

        return redirect()->route('client.contact')->with('message', 'Gửi thông tin thành công !');
    }
}

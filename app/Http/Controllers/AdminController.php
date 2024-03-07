<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\News;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalBookingsToday = Booking::whereDate('created_at', Carbon::today())->count();
        $totalNewsToday = News::whereDate('created_at', Carbon::today())->count();
        return view('admin.index', compact('totalUsers', 'totalBookingsToday', 'totalNewsToday'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\order;
use App\Models\form;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $num_users = User::get()->count();
        $num_answers = order::get()->count();
        $num_forms = form::get()->count();
        return view('home',compact('num_users','num_answers','num_forms'));
    }

    public function notification_read($id)
    {
        foreach (auth()->user()->unreadNotifications as $notification) {
            if ($notification->id == $id){
                $notification->markAsRead();
            }
        }
    }
}

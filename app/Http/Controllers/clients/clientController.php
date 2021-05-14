<?php

namespace App\Http\Controllers\clients;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\client;

class clientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }

    public function index()
    {
        $clients = client::orderBy('id')->latest()->paginate(5);
        return view('clients.index',compact('clients'));
    }
}

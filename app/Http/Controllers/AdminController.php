<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//implementig logic for admin page
class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    //
    public function index() {
        return view('admin.dashboard');
    }


}

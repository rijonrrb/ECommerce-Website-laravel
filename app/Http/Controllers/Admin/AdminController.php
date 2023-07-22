<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function admin()
    {
        return view('Admin.home');
    }

    public function logout()
    {
        Auth::logout();
        $notification= array('messege' => 'Successfully logout', 'alert-type' => 'success');
        return redirect()->route('admin.login')->with($notification);
    }
}

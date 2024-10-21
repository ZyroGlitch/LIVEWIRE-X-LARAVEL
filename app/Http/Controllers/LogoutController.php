<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LogoutController extends Controller
{
    public function logout(){
        Session::flush(); // Remove all session
        return redirect()->route('livewire.signIn');
    }

    public function signout(){
        Session::flush(); // Remove all session
        return redirect()->route('livewire.signIn');
    }
}
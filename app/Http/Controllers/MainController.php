<?php

namespace App\Http\Controllers;

use App\Models\Raspisanie;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index() {
        return view('auth.login');
    }


public function raspisanie() {
    $raspisanies = Raspisanie::get();
    return view('login', compact('raspisanies'));
}
}

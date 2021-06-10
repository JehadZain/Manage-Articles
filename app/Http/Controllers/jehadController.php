<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class jehadController extends Controller
{


    public function jehad()
    {
        $this->middleware('auth');
        return view('jehad');
    }
}

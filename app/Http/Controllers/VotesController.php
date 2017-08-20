<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guide;

class VotesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Guide $guide)
    {
        auth()->user()->votes()->toggle($guide);

        return back();
    }
}

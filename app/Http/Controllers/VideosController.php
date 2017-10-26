<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;

class VideosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::get();

        return view('videos.index', compact('videos'));
    }
}

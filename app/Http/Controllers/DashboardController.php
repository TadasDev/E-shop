<?php

namespace App\Http\Controllers;


use App\Models\Post;

class DashboardController extends Controller
{
    const PAGE_SIZE = 6;

    public function __construct()
    {
        $this->middleware('auth', ['except' => [
            'Pages'
        ]]);
    }
    public function index()
    {
        return view('dashboard',[
            'posts'=> Post::paginate(self::PAGE_SIZE)
        ]);
    }
}

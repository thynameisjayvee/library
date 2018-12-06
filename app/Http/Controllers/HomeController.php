<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $books = Book::Paginate(3);

        if ($request->ajax()){
          return view('bookdecks', compact('books'));
        }

        return view('home')->with(compact('books'));
    }
}

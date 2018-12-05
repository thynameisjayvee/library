<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use App\Category;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::Paginate(4);
        return view('librarian.addBooks')->with(compact('books'));
    }

    public function searchBook(Request $request)
    {
        return Book::where('title', 'LIKE', '%'.$request->q.'%')->get();
    }

    public function showBook($id){
        $books = Book::where('id', $id)->Paginate(1);
        return view('librarian.addBooks')->with(compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
          'title'=>'required',
          'author'=> 'required',
          'synopsis' => 'required',
          'quantity' => 'required',
          'img_url' => 'required',
          'categories' => 'required'
        ]);

        if ($this->ifExist($request->get('title')) == true){
          return redirect()->back()->with('error', 'The Book already exist!');
        }
        else{

          $book = new Book();
          $book->title = $request->get('title');
          $book->author = $request->get('author');
          $book->synopsis = $request->get('synopsis');
          $book->quantity = $request->get('quantity');
          $file = $request->file('img_url');
          $book->img_url = $file->getClientOriginalName();
          $book->save();

          $file->move('books',$file->getClientOriginalName());

          $categories = $request->get('categories');
          foreach ($categories as $category) {
            $data = Category::findOrFail($category);
            $book->categories()->attach($data);
          }
          return redirect()->back()->with('success', 'The Book has been added Successfully!');
        }
    }

    public function ifExist($booktitle){
        $book = Book::where('title', $booktitle)->count();
        if ($book == 0){
          return false;
        }
        else{
          return true;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id)->update($request->all());
        return response()->json(['success'=>'Data is successfully added']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }
}

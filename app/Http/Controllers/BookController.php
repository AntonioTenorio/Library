<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    protected $rules = [
        'name' => 'required',
        'author' => 'required',
        'category_id' => 'required|numeric',
        'published_date' => 'required',
    ];
    
    protected $messages = [
        'name.required' => 'El campo username es requerido',
        'author.required'  => 'El campo autor es requerido',
        'category_id.required'  => 'El campo categoría es requerido',
        'category_id.required'  => 'El campo categoría debe ser numérico',
        'published_date.required'  => 'El campo frcha de publicación es requerido'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('filter')){
            $books = Books::where('name', 'like', '%' . $request->filter . '%')
                ->orWhere('author', 'like', '%' . $request->filter . '%')
                ->latest()->paginate(10);

            return view('pages.books.list',['books' => $books]);
        }else{
            $books = Books::latest()->paginate(10);
            return view('pages.books.list',['books' => $books]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories= Categories::all();
        return view('pages.books.create', ["categories" => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {     
        $validator = Validator::make($request->all(), $this->rules, $this->messages);

        if($validator->fails()){
            return back()->withErrors($validator);
        }
        
        try {
            $book = new Books();

            $book->name = $request->name;
            $book->author = $request->author;
            $book->category_id = $request->category_id;
            $book->published_date = $request->published_date;

            $book->save();

            return redirect()->route('book.index');
        } catch (QueryException $e) {
            return back()->with('error', $e->getMessage());
        }     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Books::where('id', $id)->first(); 
        return view('pages.books.show',['book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Books::where('id', $id)->first();       
        $categories= Categories::all();
        return view('pages.books.edit',['book' => $book, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), $this->rules, $this->messages);

        if($validator->fails()){
            return back()->withErrors($validator);
        }
        
        try {
            $book = Books::where('id', $id)->first();

            $book->name = $request->name;
            $book->author = $request->author;
            $book->category_id = $request->category_id;
            $book->published_date = $request->published_date;

            $book->save();

            return redirect()->route('book.index');
        } catch (QueryException $e) {
            return back()->with('error', $e->getMessage());
        }  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Books::where('id', $id)->delete();
        return redirect()->route('book.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request)
    {
        try {
            $book = Books::where('id', $request->book_id)->first();

            $book->status = $request->status;
            $book->save();

            return redirect()->route('book.index');
        } catch (QueryException $e) {
            return back()->with('error', $e->getMessage());
        }  
    }
}

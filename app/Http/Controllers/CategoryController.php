<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    protected $rules = [
        'name' => 'required',
        'description' => 'required',
    ];
    
    protected $messages = [
        'name.required' => 'El campo nombre de la categoría es requerido',
        'description.required'  => 'El campo descripción es requerido'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categories::latest()->paginate(10);
        return view('pages.categories.list',['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.categories.create');
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
            $category = new Categories();

            $category->name = $request->name;
            $category->description = $request->description;

            $category->save();

            return redirect()->route('category.index');
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
        $category = Categories::where('id', $id)->first(); 
        return view('pages.categories.show',['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Categories::where('id', $id)->first(); 
        return view('pages.categories.edit',['category' => $category]);
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
            $category = Categories::where('id', $id)->first();

            $category->name = $request->name;
            $category->description = $request->description;

            $category->save();

            return redirect()->route('category.index');
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
        Categories::where('id', $id)->delete();
        return redirect()->route('category.index');
    }
}

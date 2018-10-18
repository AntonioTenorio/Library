<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lends;

use Carbon\Carbon;
use App\User as User;
use App\Models\Books;
use Illuminate\Support\Facades\Validator;

class LendController extends Controller
{
    protected $rules = [
        'user_id' => 'required',
        'book_id' => 'required',
    ];
    
    protected $messages = [
        'user_id.required' => 'El campo nombre de usuario es requerido',
        'book_id.required'  => 'El campo titulo del libro es requerido',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date = Carbon::now();
        $date = explode(' ', $date->toDateTimeString());
        $lends =  Lends::latest()->orderBy('delivery_date', 'asc')->paginate(10);
        return view('pages.lend.list', ['lends' => $lends, "today" => $date[0]]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('type', 'user')->select('id', 'full_name')->get();
        $books = Books::select('id', 'name')->where('status', 1)->get();
        return view('pages.lend.create', ['users' => $users, 'books' => $books]);
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
            
            $date = Carbon::now();
            $today = explode(' ', $date->toDateTimeString());
            
            $delivery_date = Carbon::parse($request->delivery_date)->format('Y-m-d');

            $max_delivery_date = strtotime ( '+20 day' , strtotime ( date('Y-m-d') ) ) ;
            $max_delivery_date = date ( 'Y-m-d' , $max_delivery_date );
            
            $lend = new Lends();

            $lend->user_id = $request->user_id;
            $lend->book_id = $request->book_id;
            $lend->departure_date = $today[0];
            $lend->max_delivery_date = $max_delivery_date;

            $lend->save();

            return redirect()->route('lend.index');
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
        $lend =  Lends::where('id', $id)->first();
        return view('pages.lend.show', ['lend' => $lend]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Lends::where('id', $id)->delete();
        return redirect()->route('lend.index');
    }

    /**
     * delivery the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delivery(Request $request, $id)
    {          
        try {
            
            $date = Carbon::now();
            $today = explode(' ', $date->toDateTimeString());
            
            $lend = Lends::where('id', $id)->first();
            $lend->delivery_date = $today[0];
            $lend->save();

            return redirect()->route('lend.index');
        } catch (QueryException $e) {
            return back()->with('error', $e->getMessage());
        }  
    }
}

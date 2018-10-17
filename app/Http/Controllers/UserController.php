<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User as User;

//Request
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    protected $rules = [
        'name' => 'required',
        'address' => 'required',
        'full_name' => 'required',
        'phone' => 'required',
        'email' => 'required|email'
    ];
    
    protected $messages = [
        'name.required' => 'El campo username es requerido',
        'address.required'  => 'El campo dirección es requerido',
        'full_name.required'  => 'El campo nombre es requerido',
        'phone.required'  => 'El campo teléfono es requerido',
        'email.required'  => 'El campo email es requerido',
        'email.email'  => 'El campo email no tiene un formato correcto',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('type', 'user')->latest()->paginate(2);
        return view('pages.users.list',['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.users.create');
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
            $user = new User();

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = '';
            $user->full_name = $request->full_name;
            $user->address = $request->address;
            $user->phone = $request->phone;
            $user->type = 'user';

            $user->save();

            return redirect()->route('user.index');
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
        $users = User::where('id', $id)->first();
        return view('pages.users.show', ['users' => $users]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        return view('pages.users.edit', ['user' => $user]);
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
            $user = User::where('id', $id)->first();

            $user->name = $request->name;
            $user->email = $request->email;
            $user->full_name = $request->full_name;
            $user->address = $request->address;
            $user->phone = $request->phone;

            $user->save();

            return redirect()->route('user.index');
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
        User::where('id', $id)->delete();
        return redirect()->route('user.index');
    }
}

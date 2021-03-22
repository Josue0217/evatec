<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(7);
   

        return view('users.index',['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create', ['user' => new User()]);
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
            'name'      => 'required|min:3',
            'lastname'  => 'required|min:3',
            'user_name' => 'required|min:3|unique:users',
            'email'     => 'required|string|email|max:255|unique:users',
            'password'  => 'required|min:3|string'
        ]);
        

        User::create([
            'name'      => $request['name'],
            'lastname'  => $request['lastname'],
            'user_name' => $request['user_name'],
            'email'     => $request['email'],
            'password'  => Hash::make($request['password']),
        ]);

        return redirect('users')->with('status', 'Usuario creado con exito!');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->update([
            'name'      => $request['name'],
            'lastname'  => $request['lastname'],
            'user_name' => $request['user_name'],
            'email'     => $request['email'],
            'password'  => Hash::make($request['password']),
        ]);

        return redirect('users')->with('status', 'Usuario actualizado con exito!');

        
    }

    public function changePasswordForm($id)
    {

        $user = User::find($id);
        
        return view('users.password', ['user' => $user]);
    }

    public function changePassword(Request $request)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect('users')->with('status', 'Usuario eliminado con exito!');

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Outlet;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    //
    public function index()
    {
        //
        $users = User::all();
        return view('user.index', compact('users'));
    }

    public function home()
    {
        //
        return view('welcome');
    }

    public function sidebar()
    {
        //
        $users = user::all();
        return view('welcome', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $outlet = Outlet::all();
        return view('user.create', compact('outlet'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'nama' => 'required',
            'username' => 'required',
            'password' => 'required',
            'role' => 'required',
            'outlet_id' => 'required',
        ]);
            User::create([
                'nama' => ($data['nama']),
                'username' => ($data['username']),
                'password' => bcrypt($data['password']),
                'role' => ($data['role']),
                'outlet_id' => $request->outlet_id,
            ]);
            return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        //
        $users = user::find($user->id);
        return view('user.show', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
        //
        $users = user::find($user->id);
        return view('user.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user $user)
    {
        //
        $request->validate([
            'nama' => 'required',
            'username' => 'required',
            'password' => 'required',
            'role' => 'required',
            'outlet_id' => 'required',
        ]);
        $users = User::find($user->id);
        $users->nama = $request->nama;
        $users->username = $request->username;
        $users->password = $request->password;
        $users->role = $request->role;
        $users->update();
        return redirect('/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        //
        $users = user::find($user->id);
        $users->delete();
        return redirect('user');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $params = [
            'users' => User::all(),
        ];

        return view('admin.users', $params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createUser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'email' => ['required','unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $user = new User();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $user->save();

        return Redirect::back()->with('status', "Usuario creado");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $params = [
            'user' => $user,
        ];

        return view('admin.editUser', $params);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'email' => ['required','unique:users'],
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $user = User::where('_id', '=', $id)->get()[0];
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->save();

        return Redirect::back()->with('status', "Usuario actualizado");
    }

    public function updatePassword(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        $user = User::where('_id', '=', $id)->get()[0];
        $user->password = Hash::make($request['password']);
        $user->save();

        return Redirect::back()->with('statusPassword', "Contraseña actualizado");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}

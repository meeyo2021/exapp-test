<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->simplePaginate(1);
        return view('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        
        return view('users.create')->with('roles', $roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'uname' => 'required',
            'email' => 'required',
            'npw' => 'required',
            'cpw' => 'required',
            'roleId' => 'required',
        ]);

        $user = new User;
        $user->name = $request->input('uname');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('npw'));
        $user->nominatedPassword = Hash::make($request->input('cpw'));
        $user->roleId = $request->input('roleId');

        $user->save();

        return redirect('/users')->with('success', 'User Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $user = User::find($id);
        

        $user = DB::table('users')
            ->join('roles', 'users.roleId', '=', 'roles.id')
            ->select('users.*', 'users.name', 'users.email', 'roles.roleName')
            ->where('users.id', $id)
            ->get();
        
        return view('users.show')->with('user', $user);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::all();
        $user = DB::table('users')
            ->join('roles', 'users.roleId', '=', 'roles.id')
            ->select('users.*', 'users.name', 'users.email', 'roles.roleName')
            ->where('users.id', $id)
            ->get();
        
        return view('users.edit')->with('user', $user)->with('roles', $roles);
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
        $this->validate($request, [
            'uname' => 'required',
            'email' => 'required',
            'npw' => 'required',
            'cpw' => 'required',
            'roleId' => 'required',
        ]);

        $user = User::find($id);
        $user->name = $request->input('uname');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('npw'));
        $user->nominatedPassword = Hash::make($request->input('cpw'));
        $user->roleId = $request->input('roleId');

        $user->save();

        return redirect('/users')->with('success', 'User Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/users')->with('success', 'User Removed');
    }
}

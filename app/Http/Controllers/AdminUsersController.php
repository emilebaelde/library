<?php

namespace App\Http\Controllers;

use App\Address;
use App\Http\Requests\UserEditRequest;
use App\Http\Requests\UsersRequest;
use App\Photo;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users= User::paginate(10);
        //admin/users/index.blade.php
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        ////admin/users/create.blade.php
        $roles = Role::pluck('name', 'id')->all();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        /* //
         User::create([
            'name'=>$request['name'],
         'email'=>$request['email'],
         'password'=>Hash::make($request['password']),
         //'password'=>bcrypt($request['password']),
             'role_id'=>$request['role_id'],
             'is_active'=>$request['is_active'],
         ]);*/

        $input_user = $request->only(['first_name','last_name','password', 'email', 'nin', 'password','role_id']); // is hetzelfde als hierboven maar in 1 lijn enkel password word hieronder nog gehasht
        $input_address = $request->only(['city','street', 'number','bus_number', 'postal_code', 'country']);
        $input_user['password']= Hash::make($request['password']);

        Address::create($input_address);
        $last_adress= DB::table('addresses')->orderBy('id', 'desc')->first();
        $input_user['address_id']=$last_adress->id;

        User::create($input_user);

        return redirect('/admin/users');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::findOrFail($id);
        $address =Address::findOrFail($user->address_id);
        $roles = Role::pluck('name', 'id')->all();
        return view('admin.users.edit', compact('user', 'roles', 'address')); //data overdragen naar view (blade files)
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, $id)
    {
        //
        $user =User::findOrFail($id);
        $address = Address::findOrFail($user->address_id);
        $input_user = $request->only(['first_name','last_name','password', 'email', 'nin', 'password','role_id']); // is hetzelfde als hierboven maar in 1 lijn enkel password word hieronder nog gehasht
        $input_address = $request->only(['city','street', 'number','bus_number', 'postal_code', 'country']);
        $input_user['password']= Hash::make($request['password']);
        $user->update($input_user);
        $address->update($input_address);
        return redirect('admin/users');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 2 manieren
        //User::findOrFail($id)->delete();

        $user=User::findOrFail($id);
        $user->delete();
        Session::flash('deleted_user', 'The user is deleted');
        return redirect('/admin/users');
    }
}

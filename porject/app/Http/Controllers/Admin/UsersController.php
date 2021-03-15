<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
   public function __construct()
   {
       $this->middleware('auth');
       $this->middleware('checkAdmin');
   }


    public function index()
    {
        $users =User::all();
        return view('admin.users.index')->with('users',$users);
    }

    public function show(User $user){
        $roles= Role::all();
        return view('admin.users.show')->with([
            'user'=> $user,
            'roles'=>$roles
        ]);
    }

    public function create(){
        $roles= Role::all();
        return view('admin.users.create',compact($roles));
    }

    public function store(){
        $data= request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'confirm_password' => 'required|same:password|min:6',
        ]);

        $role=request()->validate([
            'role'=>'required',
        ]);

        $user = User::create([
            'name'=> $data['name'],
            'email'=> $data['email'],
            'password'=>Hash::make($data['password'])
        ]);
        $getRole= Role::select('id')->where('name',$role['role'])->first();
        $user->roles()->attach($getRole);

        $users=User::all();
        return view('admin.users.index')->with('users',$users);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(User $user)
    {
        if(gate::denies('edit-users'))
        {
            return redirect(route('admin.users.index'));
        }
        $roles= Role::all();
        return view('admin.users.edit')->with([
            'user'=> $user,
            'roles'=>$roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        $user->roles()->sync($request->roles);
        $user->name= $request->name;
        $user->email=$request->email;
        $user->save();
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if(gate::denies('edit-users'))
        {
            return redirect(route('admin.users.index'));
        }
        $user->roles()->detach();
        $user->delete();
        return redirect()->route('admin.users.index');
    }
}

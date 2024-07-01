<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;


class UsersController extends Controller
{


    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {

        if (is_null($this->user) || !$this->user->can('user.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any user !');
        }


        $users = User::all();
        return view('backend.pages.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {


        if (is_null($this->user) || !$this->user->can('user.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create user !');
        }


        $roles  = Role::all();
        return view('backend.pages.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (is_null($this->user) || !$this->user->can('user.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any user !');
        }

        // Validation Data
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|max:100|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'phone' => 'required',
            'session' => 'nullable',
            'department' => 'nullable',
            'gender' => 'nullable',
            'date_of_birth' => 'nullable|date',
            'blood_group' => 'nullable',
            'class_roll' => 'nullable',
            'father_name' => 'nullable|max:50',
            'mother_name' => 'nullable|max:50',
            'current_address' => 'nullable',
            'permanent_address' => 'nullable',
            'image' => 'nullable',
            'skills' => 'nullable',
            'transaction_id' => 'required',
        ]);

        // Create New User
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->usertype = 'member'; // Default usertype
        $user->session = $request->session;
        $user->department = $request->department;
        $user->gender = $request->gender;
        $user->date_of_birth = $request->date_of_birth;
        $user->blood_group = $request->blood_group;
        $user->class_roll = $request->class_roll;
        $user->father_name = $request->father_name;
        $user->mother_name = $request->mother_name;
        $user->current_address = $request->current_address;
        $user->permanent_address = $request->permanent_address;
        // Handle image upload if needed
        // $user->image = $request->file('image')->store('images'); // Example
        $user->skills = $request->skills;
        $user->transaction_id = $request->transaction_id;
        $user->save();

        if ($request->roles) {
            $user->assignRole($request->roles);
        }

        session()->flash('success', 'User has been created !!');
        return redirect()->route('admin.users.index');
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


        if (is_null($this->user) || !$this->user->can('user.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any user !');
        }

        $user = User::find($id);
        $roles  = Role::all();
        return view('backend.pages.users.edit', compact('user', 'roles'));
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


        if (is_null($this->user) || !$this->user->can('user.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any user !');
        }
        // Create New User
        $user = User::find($id);

        // Validation Data
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|max:100|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6|confirmed',
        ]);


        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        $user->roles()->detach();
        if ($request->roles) {
            $user->assignRole($request->roles);
        }

        session()->flash('success', 'User has been updated !!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if (is_null($this->user) || !$this->user->can('user.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any user !');
        }
        $user = User::find($id);
        if (!is_null($user)) {
            $user->delete();
        }

        session()->flash('success', 'User has been deleted !!');
        return back();
    }
}

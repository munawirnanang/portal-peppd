<?php

namespace App\Http\Controllers;

use App\User;
use App\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_users = User::all();
        return view('admin.user.index', compact('list_users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list_users = User::all();
        return view('admin.user.create', compact('list_users'));
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
            'name' => 'required',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $create_user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        //log
        Log::create([
            'page' => 'User',
            'action' => 'create',
            'description' => Auth::user()->email.' menambahkan user dengan id = '.$create_user->id,
            'database' => 'users',
            'author' => Auth::user()->email,
        ]);

        return redirect('/user/create')->with('status', 'Data user berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)   
    {
        $list_users = User::all();
        $user = User::find($id);
        return view('admin.user.show', compact('list_users', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $list_users = User::all();
        $user = User::find($id);
        return view('admin.user.edit', compact('list_users', 'user'));
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
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|confirmed',
        ]);

        $update_user = User::where('id', $user->id)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

        if($update_user == 1) {
            $get_user = $user = User::find($user->id);

            //log
            Log::create([
                'page' => 'User',
                'action' => 'update',
                'description' => Auth::user()->email.' mengubah user dengan id = '.$get_user->id,
                'database' => 'users',
                'author' => Auth::user()->email,
            ]);
        }

        return redirect('/user/'.$user->id)->with('status', 'Data user berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //log
        Log::create([
            'page' => 'User',
            'action' => 'delete',
            'description' => Auth::user()->email.' menghapus user dengan nama = '.$user->name,
            'database' => 'users',
            'author' => Auth::user()->email,
        ]);

        User::destroy($user->id);

        return redirect('/user')->with('status', 'Data user berhasil dihapus!');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Gate;

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
        $this->middleware(function($request,$next){
            if (Gate::allows('pemilik')) return $next($request);
            abort('403','Anda Tidak Memiliki Akses kesini');
                # code..
        });
    }
    public function index()
    {
        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation=\Validator::make($request->all(),[
            "username"=>"required|unique:users,username|regex:/^[A-Za-z][A-Za-z0-9]*$/|max:10",
            "password"=>"required",
            "password_confirmation"=>"same:password",
            ],['username.required' => 'Username harus diisi',
            'username.unique'=>'Username telah ada',
            'username.regex'=>'Username tidak valid',
            'username.max'=>'Tidak boleh lebih dari 10',
            'password.required'=>'Tidak boleh kosong',
            'password_confirmation.same'=>'Harus sama dengan passoword']

           )->validate();

        $user=new \App\User;
        $user->username=$request->get('username');
        $user->password=\Hash::make($request->get('password'));
        $user->save();
        return $user;
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
        $user=\App\User::findOrFail($id);
        return view('users.edit',['user'=>$user]);
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
        $validation=\Validator::make($request->all(),[
            "username"=>"required|unique:users,username,{$id}|regex:/^[A-Za-z][A-Za-z0-9]*$/|max:10,",
            "password_confirmation"=>"same:password",
            ],['username.required' => 'Username harus diisi',
            'username.unique'=>'Username telah ada',
            'username.regex'=>'Username tidak valid',
            'username.max'=>'Tidak boleh lebih dari 10',
            'password_confirmation.same'=>'Harus sama dengan passoword']

           )->validate();

        $user=\App\User::findOrFail($id);
        $user->username=$request->get('username');
        if ($request->get('password')) {
            $user->password=\Hash::make($request->get('password'));
            
        }
        $user->save();
        return $user;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=\App\User::findOrFail($id);
        $user->delete();
        return 'Success';
    }

    public function data(){
        $users=\App\User::query();
        return DataTables::of($users)
        ->addColumn('action', function($users){
            return view('action.action',
                ['url_edit' => route('users.edit',['id'=>$users->id]),
                 'url_delete' => route('users.destroy',['id'=>$users->id]),
                 'data'=>'user'
                ]);
        })
        ->rawColumns(['action'])
        ->make(true);
    }
}

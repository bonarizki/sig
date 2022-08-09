<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddParentRequest;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use App\Services\AddUpdateUserServices;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.register');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterRequest $request)
    {
        $request->merge([
            "id_card" => $request->nik,
            "password" => bcrypt($request->pass),
            "family_code" => 'FC-'.Str::random(10)
        ]);
        $request->request->remove('nik');
        $request->request->remove('pass');
        $request->request->remove('re_pass');
        $request->request->remove('signup');
        User::create($request->except('_token'));
        if (Auth::attempt($request->except(['_token','remember']))) {
            $request->session()->regenerate();
            if (Auth::user()->role == 'user') {
                return redirect()->intended('/');
            }else{
                return redirect('admin_dashboard');
            }
        }

        return redirect()->route('login')->with('status', 'Register Success!');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function AddParent(AddParentRequest $request, AddUpdateUserServices $AddUpdateUserServices)
    {
        $AddUpdateUserServices->addParents($request,Auth::user());
        return redirect()->route('login')->with('status', 'Register Success!');

    }
}
